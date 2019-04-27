<?php

namespace App\Http\Controllers;

use App\Models\Lunch;
use App\Models\LunchUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LunchController extends Controller
{
    public function scheduled(Request $request) {
        $own = Lunch::where('user_id', $request->user()->id)->where("date", ">=", now())->orderBy('date')
            ->with(["restaurant", "author", 'participants', 'participants.user'])->get();

        $participant = $lunches = Lunch::whereHas('participants', function ($query) use ($request) {
            $query->where('user_id', $request->user()->id)->whereNotNull("accepted_at");
        })->where("date", ">=", now())->orderBy('date')
            ->with(["restaurant", "author", 'participants', 'participants.user'])->get();

        $lunches = $own->merge($participant);

        return $lunches->map(function (Lunch $lunch) {
            return $this->lunchToArray($lunch);
        });
    }

    private function lunchToArray(Lunch $lunch) {
        return [
            "id" => $lunch->id,
            "description" => $lunch->description,
            "restaurant" => [
                "id" => $lunch->restaurant->id,
                "name" => $lunch->restaurant->name,
            ],
            "date" => $lunch->date->toISOString(),
            "author" => [
                "id" => $lunch->author->id,
                "name" => $lunch->author->name,
            ],
            "participants" => $lunch->participants->map(function ($l) {
                return  [
                    "id" => $l->user->id,
                    "name" => $l->user->name,
                    "accepted" => $l->accepted_at ? true : false,
                ];
            })
        ];
    }

    public function search(Request $request) {
        if ($request->has("date") && $request->has("restaurant")) {
            $date = Carbon::parse($request->date);
            $lunches = Lunch::where('restaurant_id', $request->restaurant)->where("date", ">=", $date)->with(["restaurant", "author", 'participants', 'participants.user'])->orderBy('date')->get();

            return $lunches->map(function (Lunch $lunch) {
                return $this->lunchToArray($lunch);
            });
        }
    }

    public function delete(Request $request, Lunch $lunch) {
        if ($request->user()->id == $lunch->author->id) {
            $lunch->delete();
            return response(null, 204);
        }

        return response(null, 401);
    }

    public function join(Request $request, Lunch $lunch) {
        $lunchUser = new LunchUser();

        $lunchUser->user()->associate($request->user());
        $lunch->participants()->save($lunchUser);

        return response(null, 204);
    }

    public function accept(Request $request, Lunch $lunch, User $user) {
        if ($request->user()->id == $lunch->author->id) {
            $lunchUser = $lunch->participants->where("user_id", $user->id)->first();
            $lunchUser->accepted_at = now();
            $lunchUser->save();

            return response(null, 204);
        }

        return response(null, 401);
    }

    public function create(Request $request) {

        $request->validate([
            "date" => "required|date",
            "restaurant" => "required|exists:restaurants,id",
            "description" => "required"
        ]);

        $lunch = new Lunch();

        $lunch->description = $request->description;
        $lunch->date = $request->date;
        $lunch->restaurant_id = $request->restaurant;
        $lunch->author()->associate($request->user());

        $lunch->save();

        return response(null, 204);
    }

    public function leave(Request $request, Lunch $lunch) {
        $participation = $lunch->participants->where("user_id", $request->user()->id)->first();

        if ($participation) {
            $participation->delete();
            return response(null, 204);
        }

        return response(null, 404);
    }

    public function get(Request $request, Lunch $lunch) {
        $lunch->load(["restaurant", "author", 'participants', 'participants.user']);

        return $this->lunchToArray($lunch);
    }
}

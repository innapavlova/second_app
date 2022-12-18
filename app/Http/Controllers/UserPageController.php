<?php

namespace App\Http\Controllers;

use App\Models\UserBonus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class UserPageController extends Controller
{
    public function table(Request $request) {
        $userId = $request->get('user_id');
        if ($userId) {
            $nextBonusDate = null;
            $userLastBonus = UserBonus::where('user_id', $userId)->latest('created_at')->first();
            if (!$userLastBonus) {
                $addBonus = true;
            } else {
                $date = Carbon::createFromFormat('Y-m-d H:i:s', $userLastBonus['created_at']);
                $nextBonusDate = $date->addDay();
                $currentDate = Carbon::now();
                $addBonus = $currentDate->gt($nextBonusDate);
            }

            if ($addBonus) {
                $bonus = new UserBonus();
                $bonus->user_id = $userId;
                $bonus->daily_bonus = 1000;
                $bonus->save();
                $nextBonusDate = Carbon::createFromFormat('Y-m-d H:i:s', $bonus->created_at)->addDay();
            }

            $userBonusesTotal = UserBonus::where('user_id', $userId)->sum('daily_bonus');
            $userData = UserBonus::where('user_id', $userId)->get();

            return view('user_page', [
                'userBonusesData' => $userData,
                'userBonusesTotal' => $userBonusesTotal,
                'userNextBonusTime' => $nextBonusDate
            ]);
        } else {
            return $this->checkLogin();
        }
    }

    public function logout() {
        $link = env('REDIRECT_APP', "http://127.0.0.1:8000/");
        $redirectLink = rtrim($link,"/")."/api/logout";
        $redirectToLoginLink = rtrim($link,"/")."/login";
        Http::get($redirectLink);
        return Redirect::to($redirectToLoginLink);
    }

    public function checkLogin() {
        return "GO AWAY";
//        $link = env('REDIRECT_APP', "http://127.0.0.1:8000/");
//        $redirectLink = rtrim($link,"/")."/api/checkLogin";
//        return Http::get($redirectLink);
    }

    public function getUserBonuses($id) {

    }

    public function softDeleteUserBonuses($id) {

    }
}

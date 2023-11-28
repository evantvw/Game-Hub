<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Games;
use App\Models\myGames;

class GameController extends Controller
{
    public function gameDetail($gameID){
        $userID = session()->get('userID');
        $details = Games::getGameDetails($gameID);
        $rating = myGames::getGameRating($userID, $gameID);
        $count = myGames::scoreAverage($gameID);
        $check = myGames::hasGame($userID, $gameID);

        if($details != NULL){
            return view('nav.games', [
                'rating' => $rating,
                'data' => $details,
                'saved'=> $check,
                'count'=> $count,
                'id' => $gameID
            ]);
        } else {
            return view('errors.404');
        }

    }

    public function addRating(Request $request, $gameID){
        $userID = session()->get('userID');
        $rate = $request -> input('rate');
        $setRating = myGames::updateUserRating($userID, $gameID, $rate);

        $details = Games::getGameDetails($gameID);
        $rating = myGames::getGameRating($userID, $gameID);
        $count = myGames::scoreAverage($gameID);
        $check = myGames::hasGame($userID, $gameID);

        return redirect('/mygames');
    }

    public function done($gameID){
        $userID = session()->get('userID');
        $done = myGames::gameCompleted($userID, $gameID);

        return redirect('/mygames');
    }

    public function searchresult(Request $request){
        $input = $request -> input('search');
        $games = Games::searchResult($input);
        $check = Games::checkSearch($input);
        // dd($check);
        if($check != null){
            return view('nav.searchresult',[
                'result' => $input,
                'data' => $games
            ]);
        } else {
            return view('nav.searchnotfound',[
                'result' => $input
            ]);
        }
    }

    public function home(){
        $gamerec = Games::sortbyrec();
        $gamenew = Games::sortbynew();

        return view('nav.home',[
            'gamerec' => $gamerec,
            'gamenew' => $gamenew
        ]);
    }
}

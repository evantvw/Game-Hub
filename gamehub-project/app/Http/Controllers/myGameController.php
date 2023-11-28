<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\myGames;

class myGameController extends Controller
{
    public function showMyGames(){
        $id = session()->get('userID');
        $gamelist = myGames::getGamesDetail($id);
        $check = myGames::check($id);

        if($check != null){
            return view('nav.mygames',[
                'data' => $gamelist
            ]);
        }else{
            return view('nav.gamenotfound');
        }
    }

    public function addGame($gameID){
        $userID = session()->get('userID');
        $process = myGames::addNew($userID, $gameID);

        return back()->with('msg', 'Game Has Been Added To MyGame');
    }

    public function delGame($gameID){
        $userID = session()->get('userID');
        $process = myGames::del($userID, $gameID);

        return back()->with('msg', 'Game Has Been Removed from MyGame');
    }
}

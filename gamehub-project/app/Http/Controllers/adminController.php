<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\myGames;
use App\Models\Users;
use App\Models\comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function index(){
        return view('admin.adminHome');
    }

    public function gameList(){
        $games = Games::showAll();
        return view('admin.gameList',[
            'games' => $games
        ]);
    }

    public function userList(){
        $user = Users::showAll();
        return view('admin.userList',[
            'user' => $user
        ]);
    }

    public function addGame(){
        return view ('admin.addgame');
    }

    public function addGameProcess(Request $request){
        $data      = $request -> input();

        $name      = $data['gameName'];
        $dev       = $data['DevName'];
        $release   = $data['GameRls'];
        $desc      = $data['GameDesc'];
        $platform  = implode(',', $data['platform']);
        $genre     = implode(',', $data['genre']);
        $rated     = $data['rated'];
        $trailer   = $data['gameTrailer'];
        $gameCover = $data['gameCover'];
        $upload    = Games::addNewGame($name, $dev, $release, $desc, $platform, $genre, $rated, $trailer, $gameCover);

        return redirect('/admin/gameList')->with('msg2', 'New Game Has Been Added To GameHub Database!!');
    }

    public function editGame($id){
        $gameData = Games::getGameDetails($id);
        return view('admin.editgame',[
            'data' => $gameData
        ]);
    }

    public function editGameProcess($id, Request $request){
        $in = $request -> input();

        $name       = $in['gameName'];
        $dev        = $in['DevName'];
        $release    = $in['GameRls'];
        $desc       = $in['GameDesc'];
        $platform   = implode(',', $in['platform']);
        $genre      = implode(',', $in['genre']);
        $rated      = $in['rated'];
        $trailer    = $in['gameTrailer'];
        $gameCover  = $in['gameCover'];

        $update = Games::editGameProcess($id, $name, $dev, $release, $desc, $platform, $genre, $rated, $trailer, $gameCover);
        return redirect('/admin/gameList') -> with('msg2', 'Game has been edited!');
    }

    public function deleteGameConfirmation($id){
        $data = Games::getGameDetails($id);
        return view('admin.deleteGame',[
            'data' => $data
        ]);
    }

    public function deleteGame($id){
        $delete1 = MyGames::deleteGameData($id);
        $delete2 = Games::deleteGameDB($id);
        return redirect('/admin/gameList') -> with('msg2', 'Game has been deleted!');
    }

    public function commentView(){
        $comments = comment::getAll();
        return view('admin.message', [
            'data' => $comments
        ]);
    }

}

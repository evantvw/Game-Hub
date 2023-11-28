<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Games extends Model
{
    use HasFactory;
    protected $table = 'dataGame';

    public static function showAll(){
        $data = Games::get();
        return $data;
    }

    public static function getGameDetails($gameID){
        $data = Games::where('gameID', $gameID) -> first();
        return $data;
    }

    public static function addNewGame($name, $dev, $release, $desc, $platform, $genre, $rated, $trailer , $gameCover){
        $add = Games::insert([
            'gameName' => $name,
            'gameDeveloper' => $dev,
            'gameRelease' => $release,
            'gameDesc' => $desc,
            'gamePlatform' => $platform,
            'gameGenre' => $genre,
            'gameRating' => $rated,
            'linkTrailer' => $trailer,
            'linkCover' => $gameCover
        ]);
        return $add;
    }

    public static function GetGameID($name, $dev, $genre, $rated){
        $search = Games::select('gameID')
                  ->where('gameName', $name)
                  ->where('gameDeveloper', $dev)
                  ->where('gameGenre', $genre)
                  ->where('gameRating', $rated)
                  ->first();
        return $search;
    }

    public static function editGameProcess($id, $name, $dev, $release, $desc, $platform, $genre, $rated, $trailer, $gameCover){
        $edit = Games::where('gameID', $id)
             -> update([
                'gameName' => $name,
                'gameDeveloper' => $dev,
                'gameRelease' => $release,
                'gameDesc' => $desc,
                'gamePlatform' => $platform,
                'gameGenre' => $genre,
                'gameRating' => $rated,
                'linkTrailer' => $trailer,
                'linkCover' => $gameCover
             ]);
        return $edit;
    }

    public static function deleteGameDB($id){
        $delete = Games::where('gameID', $id) -> delete();
        return $delete;
    }

    public static function searchResult($input){
        $search = Games::where('gameName', 'like', '%'. $input. '%')
            -> get();
        // dd($search);
        return $search;
    }

    public static function checkSearch($input){
        $check = Games::where('gameName', 'like', '%'. $input. '%')
        -> first();
        return $check;
    }

    public static function sortbynew(){
        $data = Games::orderby('gameRelease', 'DESC')
             -> take(10)
             -> get();
        return $data;
    }

    public static function sortbyrec(){


        $data = Games::join('dataSimpan', 'dataGame.gameID', '=', 'dataSimpan.gameID')
        ->select("dataGame.gameName", 'dataGame.gameDeveloper', 'dataGame.gameID', 'dataGame.linkCover', DB::raw('AVG(dataSimpan.score) AS score_average'))
        ->groupBy("dataGame.gameName",'dataGame.gameDeveloper', 'dataGame.gameID', 'dataGame.linkCover')
        ->orderby("score_average", 'DESC')
        ->take(10)
        ->get();
        // dd($data);
        return $data;
    }
}

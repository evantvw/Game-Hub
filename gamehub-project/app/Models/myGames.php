<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class myGames extends Model
{
    use HasFactory;
    protected $table = 'dataSimpan';

    public static function getGamesDetail($userID){
        $data = mygames::crossJoin('dataGame')->crossJoin('dataUser')
        ->select('dataGame.gameID', 'dataGame.gameName', 'dataGame.gamePlatform', 'dataGame.gameDeveloper', 'dataSimpan.done', 'dataGame.linkCover')
        ->where('dataSimpan.userID', $userID)
        ->where('dataGame.gameID', DB::raw('dataSimpan.gameID'))
        ->where('dataUser.UserID', DB::raw('dataSimpan.userID'))
        ->get();
        return $data;
    }

    public static function check($userID){
        $data = mygames::where('userID', $userID)->first();
        return $data;
    }

    public static function hasGame($userID, $gameID){
        $check = myGames::where('userID', $userID)
        -> where('gameID', $gameID)
        -> get();
        return $check;
    }

    public static function addNew($userID, $gameID){
        $process = myGames::insert(['userID' => $userID, 'gameID' => $gameID]);
        return $process;
    }

    public static function del($userID, $gameID){
        $process = myGames::where('userID', $userID)
                   -> where('gameID', $gameID)
                   -> delete();
        return $process;
    }

    public static function scoreAverage($gameID){
        $average = myGames::where('gameID', $gameID)
                ->groupBy('gameID')
                ->avg('score');
        return number_format((float)$average, 2, '.', '');
    }

    public static function deleteSavedBy($id){
        $delete = myGames::where('userID', $id) -> delete();
        return $delete;
    }

    public static function getGameRating($userID, $gameID){
        $rating = myGames::where('userID', $userID)
                    -> where('gameID', $gameID)
                    -> first();
        return $rating;
    }

    public static function updateUserRating($userID, $gameID, $rate){
        $update = myGames::where('userID', $userID)
        -> where('gameID', $gameID)
        -> update(['score' => $rate]);
    }

    public static function gameCompleted($userID, $gameID){
        $done = myGames::where('userID', $userID)
        -> where('gameID', $gameID)
        -> update(['done' => '1']);

        return $done;
    }

    public static function deleteGameData($id){
        $delete = myGames::where('gameID', $id)->delete();
        return $delete;
    }
}

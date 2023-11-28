<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table = 'messages';


    public static function getAll(){
        $view = comment::orderBy('messageID', 'DESC')
        -> get();
        return $view;
    }

    public static function send($email, $msg){
        $add = comment::insert([
            'email_msg'   => $email,
            'msg_content' => $msg
        ]);
        return $add;
    }
}

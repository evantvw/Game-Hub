<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class resetPassword extends Model
{
    use HasFactory;
    protected $table = 'resetPassword';

    public static function setResetToken($email){
        $token = base64_encode(Str::random(64));
        $set = resetPassword::insert([
            'email' => $email,
            'token' => $token
        ]);
        return $set;
    }
    public static function getResetToken($email){
        $get = resetPassword::where('email', $email)
        -> first();
        return $get;
    }

    public static function checkToken($token){
        $get = resetPassword::where('token', $token)
        -> select('token')
        -> first();
        return $get;
    }

    public static function getEmail($token){
        $get = resetPassword::where('token', $token)
        -> first();
        return $get;
    }

    public static function updatePassword($password, $token, $email){
        // dd($email);
        $update = resetPassword::crossjoin('dataUser')
                ->where('resetPassword.token', $token)
                ->where('dataUser.email', $email)
                ->update([
                    'dataUser.user_password'=>$password
                ]);
        return $update;
    }

    public static function deleteToken($token){
        $delete = resetPassword::where('token', $token)->delete();
        return $delete;
    }
}

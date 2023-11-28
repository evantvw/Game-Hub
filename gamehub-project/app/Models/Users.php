<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'dataUser';

    public static function getUserDetails($email){
        $data = Users::where('email', $email) -> first();
        return $data;
    }

    public static function showAll(){
        $data = Users::get();
        return $data;
    }

    public static function editUserData($id, $name, $birth, $email, $number, $gender){
        $edit = Users::where('userID', $id)->update([
            'fullname' => $name,
            'DOB' => $birth,
            'email' => $email,
            'phonenumber' => $number,
            'gender' => $gender
        ]);
        return $edit;
    }

    public static function deleteUser($id){
        $delete = Users::where('userID', $id)->delete();
        return $delete;
    }

    public static function editProfilePicture($id, $ppID){
        $edit = Users::where('userID', $id)->update([
            'ppid' => $ppID
        ]);
        return $edit;
    }

    public static function signUpUser($name, $phonenumber, $dob, $gender, $email, $hashed_password){
        $add = Users::insert([
            'fullname' => $name,
            'phonenumber' => $phonenumber,
            'DOB' => $dob,
            'gender' => $gender,
            'email' => $email,
            'user_password' => $hashed_password
        ]);
        return $add;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\myGames;
use App\Models\Users;
use App\Models\comment;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function profile(){
        $email         = session()->get('email');
        $id            = session()->get('userID');
        $user_profile  = Users::getUserDetails($email);

        return view('nav.profile',[
            'data' => $user_profile,
            'id'   => $id
        ]);
    }
    public function edit_profile(){
        $email         = session()->get('email');
        $id            = session()->get('userID');
        $user_profile  = Users::getUserDetails($email);

        return view('nav.editprofile',[
            'data' => $user_profile,
            'id'   => $id
        ]);
    }

    public function save_edit(Request $request){
        $id     = session()->get('userID');
        $name   = $request -> input('name');
        $birth  = $request -> input('dob');
        $email  = $request -> input('email');
        $number = $request -> input('phonenumber');
        $gender = $request -> input('gender');

        $save_data = Users::editUserData($id, $name, $birth, $email, $number, $gender);

        $user_profile  = Users::getUserDetails($email);
        return redirect('/profile') -> with([
            'data' => $user_profile,
            'id'   => $id
        ]);
    }

    public function delete_profile(){
        $id = session() -> get('userID');
        $deletesaved = myGames::deleteSavedBy($id);
        $delete = Users::deleteUser($id);
        session()->invalidate();
        session()->regenerate();
        return redirect('/');
    }

    public function save_profile(Request $request){
        $id            = session() -> get('userID');
        $ppID          = $request -> input('ppid');
        $editprofile   = Users::editProfilePicture($id, $ppID);
        $email         = session()->get('email');
        $id            = session()->get('userID');
        $user_profile  = Users::getUserDetails($email);

        return redirect('/profile') -> with([
            'data' => $user_profile,
            'id'   => $id
        ]);

        // return view('nav.profile',[
        //     'data' => $user_profile,
        //     'id'   => $id
        // ]);
    }

    public function sendEmail(Request $request){
        $in = $request -> input();

        $email = $in['email'];
        $msg   = $in['message'];

        $send = comment::send($email, $msg);

        return back() -> with('msgsent', 'Message Has Been Sent!');
    }
}

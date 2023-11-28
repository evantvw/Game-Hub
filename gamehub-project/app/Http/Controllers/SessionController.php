<?php

namespace App\Http\Controllers;

use App\Models\resetPassword;
use App\Models\Users;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function index(){
        if(session()->get('email') != null){
            session()->invalidate();
            session()->regenerate();
            return redirect('/signin')->with('msg', 'You have been signed out');
        } else {
        return view('access.signin');
        }
    }
    public function signupindex(){
        if(session()->get('email') != null){
            session()->invalidate();
            session()->regenerate();
            return redirect('/signup')->with('msg', 'You have been signed out');
        } else {

            return view('access.signup');
        }
    }

    public function signin(Request $request){
        $email     = $request -> input('email');
        $password  = $request -> input('password');
        $user_data = Users::getUserDetails($email);

        if($user_data != NULL){
            if(password_verify($password, $user_data['user_password'])){
                session()->invalidate();
                session()->regenerate();
                session()->put('email', $email);
                session()->put('userID', $user_data['userID']);
                session()->put('userRole', $user_data['userRole']);
                return redirect('/');
            } else {
                return back() -> with('msg', 'Incorrect Email / Password');
            }
        } else {
            return back()->with('msg', 'Incorrect Email / Password');
        }
    }

    public function signout(Request $request){
        session()->invalidate();
        return redirect('/');
    }

    public function signup(Request $request){
        session()->invalidate();
        session()->regenerate();
        $in = $request -> input();
        // dd($in);

        $name           = $in['name'];
        $phonenumber    = $in['phonenumber'];
        $dob            = $in['DOB'];
        $gender         = $in['gender'];
        $email          = $in['email'];
        $password1      = $in['password'];
        $password2      = $in['confirmpassword'];

        if($password1 == $password2){
            $hashed_password = Hash::make($password2);
            $signup = Users::signUpUser($name, $phonenumber, $dob, $gender, $email, $hashed_password);
            return redirect('/signin')->with('msg2', 'Sign Up Succesfull!');
        } else {
            return redirect('/signup')->with('msg', "Password Doesn't Match");
        }
    }

    public function forgetpassword(Request $request){
        $email     = $request -> input('email');
        $userData  = Users::getUserDetails($email);

        if($userData != null){
            $user = $userData['fullname'];
            $setToken = resetPassword::setResetToken($email);
            $getToken = resetPassword::getResetToken($email);

            $data = array(
                'name' => $userData['fullname'],
                'email' => $email,
                'token' => $getToken['token'],
            );

            Mail::send('access.forgetpass-email', $data, function ($message) use ($user, $email){
                $message->from('contact.gamehubid@gmail.com', 'GameHub ID');
                $message->to($email, $user)
                        ->subject('Reset Password');
            });
            return redirect('/forgotPassword')->with('msg2', 'Succesfully send password reset request');
        } else {
            return redirect('/forgotPassword')->with('msg', "Email Doesn't Match");
        }
    }

    public function resetpassword($token){
        $check = resetPassword::checkToken($token);
        if($check != null){
            $email = resetPassword::getEmail($token);
            return view('access.resetpassword',[
                'token' => $token,
                'email' => $email
            ]);
        } else {
            return view('access.unknowntoken');
        }

    }

    public function resetpassprocess(Request $request){
        $input = $request -> input();

        $email = $input['email'];
        $token = $input['token'];

        $password1 = $input['password'];
        $password2 = $input['confirmpassword'];

        if($password1 == $password2){
            $hashed_password = Hash::make($password2);
            $reset = resetPassword::updatePassword($hashed_password, $token, $email);
            // dd($reset);
            $deltoken = resetPassword::deleteToken($token);
            return redirect('/signin') -> with('msg2', 'Password Reset Succesful!');
        } else {
            return back() -> with('msg', 'Password Doesn\'t Match');
        }
    }
}


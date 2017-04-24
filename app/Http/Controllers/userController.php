<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Session\Store;

class userController extends Controller
{
    public function verifyUser(Request $request){
      $usermail = $request->input('usermail');
      $password = $request->input('password');
      $user_record = User::where('email', '=', $usermail)->get();

      // CHecking if the user exists with the entered email, if yes, checking the hashed password with the password stored in the DB
      if(count($user_record) && password_verify($password, $user_record[0]['password']))
      {
        // Saving the user Id and name in session variable
        $request->session()->put(['id'=>$user_record[0]['id'] ,'name'=>$user_record[0]['name']]);
        // redirecting to the Dashboard router
        return redirect('dashBoard');
      }
      else {
        return redirect('/')->with('error', 'Invalid Credentials');
      }
    }

    public function logout(Request $request){
      // Deleting the session and routing to login page
      $request->Session()->flush();
      return redirect('/');
    }
}

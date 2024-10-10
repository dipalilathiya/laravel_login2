<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class admincontroller extends Controller
{
    public function view()
    {
          return view('register');
    }
    public function loginpage() 
     {
        return view('welcome');
    }
    public function dashboard()
    {
          return view('dashboard');
    }
    
    public function register(Request $req)
    {  
        // dd();

        $password = Hash::make($req->password);
       if(isset($req->submit))
       {
           $arr=User::create([
            "name" => $req->name,
            "email"=>$req->email,
            "password"=>$password,
           ]);     
        //    dd();
       }
       return redirect()->route('view');
     
    }
    public function login(Request $request) 
    {
       $user = User::where('email',$request->email)->first();
    //    dd($user);

        if($user->email == $request->email)
        {
                $userData = Auth::attempt(['email' => $request->email , 'password' => $request->password]);
                if($userData)
                {
                    return redirect() ->route('dashboard');
                }
                else
                {
                    return redirect() ->back();
                }
        } 
        else
        {
            return redirect() -> back();
        }
   }
   public function logout()
    {
        Auth::logout();
        return redirect() -> route('loginpage');
    }
}

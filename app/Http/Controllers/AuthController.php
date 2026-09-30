<?php

namespace App\Http\Controllers;
use App\Http\Requests\forgetpasswordRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\changepasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mailer\Transport\Smtp\Auth\LoginAuthenticator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Mail\forgetpasswordMail;

use Illuminate\Support\Facades\Mail;
class AuthController extends Controller
{
    public function login(LoginRequest$request)
    {
        $credentials=$request->validated();
        $auth=Auth::attempt($credentials);
        if($auth){
             $user= auth()->user();
             $abilites= $user->roles;
             $token= $user->createToken('login',$abilites)->plainTextToken;
             $user->token =$token;
       return $user;
        } else{
            return response ('user not exists');
        }

       
    }

    public function register(RegisterRequest $req)
    { 
        $data= $req->validated();
        $abilites=['guest'];
      $data['roles'] = $abilites;
     $user= user::create($data);
     $token= $user->createToken('login',[$abilites])->plainTextToken;

             $user->token =$token;
             return $user;
    }
    public function forget_password(forgetpasswordRequest $request)
{
    $email = $request->email;

    $user = User::where('email',$email)->first();
    $token=password::createToken($user);
    $expireMinutes="10";
    $userName=$user->name;
    $reseturl="https://www.mywebsite.com/reset-password?token=$token";

   if(Mail::to($email)->send(new forgetpasswordMail($expireMinutes,$userName,$reseturl,$email))){
    return "[The reset email was sent successfully,$token]";}
     else{
    return "The reset email was sent  not successfully.";}
    
}


   public function reset_password(resetpasswordRequest $request)
    {
      $credentials= $request->validated();

      $user=user::where('email',$credentials['email'])->first();

     $result= password::reset($credentials,function($user,$new_password){
        
      $user->password=Hash::make($new_password);
      ($user->save());
         
     
      if($result='password.reset'){
        return' password reset successfully';
      }else{
        return 'can not reset the password';
      }
     
    });
    }


   public function change_password(ChangePasswordRequest $request)
{

    $user = auth()->user();

    $hashed = $user->password;

    if (Hash::check($request->current_password, $hashed)) {

        $user['password'] = $request->new_password;

        if ($user->save()) {
            return 'Password changed successfully';
        }

        return 'Cannot change the password at the moment!!!';
    }

    return 'Wrong Password!!!';
}
    public function active_sessions()
    {
        $current= auth()->user()->currentAccessToken();
        $all= auth()->user()->tokens;
        return[
            'current'=>$current,
           'all'=>$all,

        ];
    }
  public function logout_sessions(int $id)
{
    $deleted = auth()->user()
        ->tokens()
        ->where('id', $id)
        ->delete();

    if ($deleted) {
        return "Selected session was revoked successfully.";
    }

    return "Session not found.";
}
    public function logout_all()
    {
      if(auth()->user()->tokens()->delete()){
        return"logged out from all acounts";
      }  
      return "cannot log out from the momment";

       }

    public function logout_current()
    {
        if (auth()->user()->currentAccessToken()->delete()){
            return"logget out successfully";
        }
        return"cannot log out now";
    }
    public function logout_others()
    {
    $current=auth()->user()->currentAccessToken()->id;
    $all=auth()->user()->tokens()->whereNot('id',$current)->get();
    return $all;
    }
}
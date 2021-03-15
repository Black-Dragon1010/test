<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Blog;
use App\User;

class ProfileController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('user.profile_index');
    }
    public function creditsPageGet()
    {
        return view('user.account_credits');
    }
    public function ordersPageGet()
    {
        $data['orders'] = DB::table('purchase_logs')->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        
        return view('user.account_orders', $data);
    }
    public function messagesPageGet()
    {
        $data['messages'] = DB::table('email_sents')->where('email', Auth::user()->email)->orderBy('created_at', 'DESC')->get();
        return view('user.account_messages');
    }
    public function infoChange(Request $request)
    {
        $user = Auth::user();
        $user->firstname = $request->account_first_name;
        $user->lastname = $request->account_last_name;
        $user->name = $request->account_display_name;
        $user->save();
        // $user->update(['firstname'=>$request->account_first_name, 'lastname'=>$request->account_last_name, 'name'=>$request->account_display_name]);
        $data['message'] = 'success';
        return json_encode($data);
    }
    public function passwordChange(Request $request)
    {
        $currentPassword = Auth::user()->password;
        if(Hash::check($request->password_current, $currentPassword))
        {
            $userId = Auth::User()->id;
            $user = User::find($userId);
            $user->password = Hash::make($request->password_1);
            $user->save();
            $data['message'] = 'success';
            $data['token'] = csrf_token();
        }
        else
        {
            $data['message'] = 'pwd-error';
            $data['token'] = csrf_token();
        }
        return json_encode($data);
    }
    public function avatarChange(Request $request)
    {
        if($request->new_avatar != ""){
            $userId = Auth::User()->id;
            $user = User::find($userId);
            $user->avatar = $this->saveImage($request->new_avatar);
            $user->save();
            $data['message'] = 'success';
            $data['token'] = csrf_token();
        }
        return json_encode($data);
    }
    public function saveImage($img)
    {
        
        $folderPath = public_path();
        $bs64='base64';
        if (strpos($img,$bs64) == true){
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $d_name = "/uploads/logo/".uniqid(). '.'.$image_type;
            $file = $folderPath . $d_name; 

            file_put_contents($file, $image_base64);
            return $d_name;
        }
    }
}

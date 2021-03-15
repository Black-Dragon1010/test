<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMailable;

use Illuminate\Http\Request;
use App\Contact;
use App\Blog;
use App\User;
use App\Comment;
use App\SiteInfo;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        SiteInfo::increaseVisits();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['mostAnswered'] = Blog::getMostAnswered(12);
        $data['mostViewed'] = Blog::getMostViewed(5);
        $data['mostCreditted'] = Blog::getMostCredits(5);
        $data['latestPosts'] = Blog::getLatests(8,0);
        $data['user_counts'] = User::all()->count();
        $data['comment_counts'] = Comment::count();
        $data['post_counts'] = Blog::count();
        $data['category_info'] = Blog::getCategoryWithCount();
        return view('home', $data);
    }
    public function contactGet()
    {
        
        return view('user.contactus');
    }
    public function contactPost(Request $request)
    {
        
        $new_contact = new Contact;
        $new_contact->first_name = $request->first_name;
        $new_contact->last_name = $request->last_name;
        $new_contact->email = $request->email;
        $new_contact->phone = $request->phone;
        $new_contact->content = $request->content;
        $new_contact->ip_address = $request->ip();
        $new_contact->save();
        return redirect(route('contact'));
    }
    public function send()
    {
        $name = 'Krunal';
        Mail::to('krunal@appdividend.com')->send(new SendMailable($name));
        
        return 'Email was sent';
    }
    public function subscribePost(Request $request)
    {
        $email = $request->email;
        DB::table('subscribers')->insert(['email'=>$email]);
        return redirect(route('home'));
    }
}

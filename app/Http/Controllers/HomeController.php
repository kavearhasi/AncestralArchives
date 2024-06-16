<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $userCount = User::all()->count();
        $blog = Blog::orderBy('created_at', 'desc')->get();
        $event = Event::orderBy('created_at', 'desc')->get();
       
        return view("pages.index", compact("userCount", 'blog','event'));
    }
}

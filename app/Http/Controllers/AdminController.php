<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Event;
use App\Models\Blog;
use Illuminate\Validation\Rules;
use Hash;
class AdminController extends Controller
{
   public function index()
   {
      $userid = auth()->user()->getAuthIdentifier();
       $currentUser =  User::findOrFail($userid);
      // $user->assignRole('super-admin');
      $users = User::all();
      return view("pages.admin.users", compact("users","currentUser"));
   }
   public function shopActivity($id)
   {
      $user = User::find($id);
      $shop = Shop::where('user_id', '=', $user->id)->get();
      return view("pages.admin.shop-activity", compact("user", "shop"));
   }
   public function destroyShopActivity($id)
   {
      $shop = Shop::findOrFail($id);
      $shop->delete();
      return redirect()->back()->with('shopActivityDeleted', ' Deleted successfully');
   }
   public function shopApproval($status, $id)
   {
      
      $user = User::findOrFail($id);
      if ($status == true) {
         $user->is_shop_approved = 1;
         $user->save();
      } else {
         $user->is_shop_approved = 0;
         $user->save();
      }
      return redirect()->route('pages.admin.users')->with('shopStatus','Shop Status Updated');
   }

   public function eventActivity($id){
      $user = User::find($id);
      $event = Event::where('user_id', '=', $user->id)->get();
      return view("pages.admin.event-activity", compact("user", "event"));
   }
   public function destroyEventActivity($id){
      $event = Event::findOrFail($id);
      $event->delete();
      return redirect()->back()->with('EventActivityDeleted', ' Deleted successfully');
   }
    
   public function adminAccess($id){
      $user =  User::findOrFail($id);
     
       $user->assignRole('admin');
       return redirect()->back()->with('adminAccess', ' Admin Accesss Granted');
   }
   public function adminRemoval($id){
      $user =  User::findOrFail($id);
     
      $user->removeRole('writer');
      return redirect()->back()->with('adminRemove', ' Admin Accesss Removed');
   }

   public function removAccess($id){
      $user =  User::findOrFail($id);
     
      $user->removeRole('admin');
      return redirect()->back()->with('adminRemove', ' Admin Accesss Removed');
   }

   public function shopSingleApproval($id,$status){
      $shop = Shop::findOrFail($id);
     if($status){
           $shop->shop_approved_status	 = 1;
           $shop->save();
     }

     else{
      $shop->shop_approved_status	 = 0;
      $shop->save();
     }

     return redirect()->back()->with('shopSingleApproved', ' Shop Status Updated');

   }
   public function eventpSingleApproval($id,$status){
     
      $event = Event::findOrFail($id);
     if($status){
           $event->event_approved_status	 = 1;
           $event->save();
     }

     else{
      $event->event_approved_status	 = 0;
      $event->save();
     }

     return redirect()->back()->with('eventSingleApproved', ' Event Status Updated');

   }
   public function blogActivity($id){
      $user = User::find($id);
      $blog = Blog::where('user_id', '=', $user->id)->get();
      return view("pages.admin.blog-activity", compact("user", "blog"));
   }

   public function blogSingleApproval($id,$status){
      $blog = Blog::findOrFail($id);
      if($status){
            $blog->blog_approved_status	 = 1;
            $blog->save();
      }
 
      else{
       $blog->blog_approved_status	 = 0;
       $blog->save();
      }
 
      return redirect()->back()->with('blogSingleApproved', ' Blog Status Updated');
 
   }
}

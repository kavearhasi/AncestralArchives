<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::all();
        return view('pages.blog',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user-pages.blogs.add-blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData = $request->all();
       $formData['blog_approved_status'] = 0;
        if (!empty($formData['blog_banner'])) {
            $fileName = time() . '-' . $request->file('blog_banner')->getClientOriginalName();
            $path = $request->file('blog_banner')->storeAs('blog-images', $fileName, 'public');
            $formData['blog_banner'] = '/storage/' . $path;
        } else {
            $formData['blog_banner'] = null;
        }
        $blog = Blog::create($formData);
        return redirect()->route('pages.user.my-blogs')->with('blogAdded', 'Blog Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('pages.blog-single',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('pages.user-pages.blogs.edit-blog',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $updateFormData = $request->all();
        $blog = Blog::findOrFail($id);
        $updateFormData['blog_approved_status'] = 0;
         if (!empty($updateFormData['blog_banner'])) {
             $fileName = time() . '-' . $request->file('blog_banner')->getClientOriginalName();
             $path = $request->file('blog_banner')->storeAs('blog-images', $fileName, 'public');
             $formData['blog_banner'] = '/storage/' . $path;
         } else {
             $formData['blog_banner'] = null;
         }
         $blog->update($updateFormData);
         return redirect()->route('pages.user.my-blogs')->with('blogEdited', 'Blog Edidted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('pages.user.my-blogs')->with('blogDeleted', 'Blog  Deleted successfully');
    }

    public function showMyBlogs(){
        $userId = Auth::user()->id;
        $blogs = Blog::where('user_id', '=', $userId)->get();
        return view("pages.user-pages.blogs.my-blogs", compact("blogs"));
       
    }
}

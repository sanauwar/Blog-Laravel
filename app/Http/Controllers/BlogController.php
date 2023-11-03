<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function view()
    {
        // dd('innnnnn');
        return view('custom_auth.blog');
    }
    public function store(Request $request)
    {
        // echo "hello";
        // $this->validate($request, [
        //     'title' => 'required|max:12',
        //     'description' => 'required',
        // ]);
        try {
            $user = Auth::user()->id;
            // dd($request->all());
            if ($user) {
                $blog = new Blog();
                $blog->userId = $user;
                $blog->title = $request->title;
                $blog->description = $request->description;
                // dd('not save');
                $blog->save();
                return response()->json(['message' => 'Blog added Successfully']);
                // return redirect('/home')->with('success', 'Blog added Successfully');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function allblog()
    {
        $userId = Auth::id();
        // dd($userId);
        $allblogs = Blog::all()->where('userId', '!=', $userId);
        return view('custom_auth.allblog', ['allblogs' => $allblogs]);
    }

    public function like()
    {   
        

        print_r($_GET);
    }
}

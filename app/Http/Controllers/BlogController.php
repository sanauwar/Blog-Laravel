<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\blog_likes;
use PhpParser\Node\Stmt\Return_;

class BlogController extends Controller
{
    public function view()
    {
        return view('custom_auth.blog');
    }
    public function store(Request $request)
    {

        try {
            $user = Auth::user()->id;
            if ($user) {
                $blog = new Blog();
                $blog->userId = $user;
                $blog->title = $request->title;
                $blog->description = $request->description;
                $blog->save();
                return response()->json(['message' => 'Blog added Successfully']);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function allblog()
    {
        $userId = Auth::id();
        $allblogs = Blog::where('userId', '!=', $userId)
            ->orderBy('title', 'desc')
            ->get();
        foreach ($allblogs as $key => $value) {
            $blogCount = $this->getAllLikeCount($value->id);
            if ($blogCount == 0) {
                $value['blogCount'] = '';
            } else {
                $value['blogCount'] = $blogCount;
            }
        }
        return view('custom_auth.allblog', ['allblogs' => $allblogs]);
    }

    public function like(Request $request)
    {
        $user_id = Auth::id();
        $blogId = $request->input('blog_id');
        if ($user_id) {
            $likeCount = blog_likes::where('user_id', $user_id)   // Fetch data Num Rows Count like 0,1,2..
                ->where('blogId', $blogId)
                ->count();

            if ($likeCount == 0) {
                $newLike = new blog_likes();                // Save Data using Modal..
                $newLike->user_id = $user_id;
                $newLike->blogId = $blogId;
                $newLike->like_count = 1;
                $newLike->save();
                $lcount = $this->getAllLikeCount($blogId);
                // dd($lcount);
                return response()->json(['success' => true, 'lcount' => $lcount, 'message' => 'Like successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Already Liked']);
            }
        }
        return response()->json(['success' => false, 'error' => 'User not authenticated'], 401);
    }

    /**
     * Get the all blog like count
     * @param {$blogId}
     */
    function getAllLikeCount($blogId)
    {
        $blog_count = blog_likes::where('blogId', $blogId)->count();
        return $blog_count;
    }
}

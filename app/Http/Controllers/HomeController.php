<?php

namespace App\Http\Controllers;

use App\Post;
Use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
            ->join('users','users.id', '=', 'posts.author_id')
            ->select('users.id', 'users.name', 'posts.id', 'posts.title', 'posts.created_at', 'posts.body')
            ->paginate(1);

        $comments = DB::table('comments')->get();

        $dates =  DB::table("posts")
            ->select('created_at','title', 'id', DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, MONTHNAME(created_at) month_name, COUNT(*) post_count'))
            ->groupBy('created_at', 'title', 'id')
            ->groupBy('year')
            ->groupBy('month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('blog.index', compact('posts', 'comments', 'dates'));
    }

    public function storeComment(Request $request)
    {
            $id = Auth::id();
            $comment = new Comment();
            $comment->post_id = $request->postId;
            $comment->user_id = $id;
            $comment->comment = $request->comment;
            $comment->save();
        return back()
            ->with('success','Comment added');
    }

}

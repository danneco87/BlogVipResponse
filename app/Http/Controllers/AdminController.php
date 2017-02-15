<?php

namespace App\Http\Controllers\admin;

namespace App\Http\Controllers;
use App\Comment;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\EditCommentsRequest;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     * Authentication of user
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = DB::table('comments')
            ->join('users','users.id', '=', 'comments.user_id')
            ->join('posts', 'posts.id', '=', 'comments.post_id')
            ->select('users.name', 'comments.id', 'comments.post_id', 'comments.comment', 'posts.title')
            ->paginate(10);
        $posts = DB::table('posts')
            ->join('users','users.id', '=', 'posts.author_id')
            ->select('users.name', 'posts.id', 'posts.body', 'posts.title')
            ->paginate(10);

        return view('admin.index', compact('comments', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $user_id = Auth::id();

        $user = new Post();
        $user->title = $request['title'];
        $user->body = $request['body'];
        $user->author_id = $user_id;
        $user->save();

       return Redirect::to('admin')->with('success','Post added');
    }

    /**
     * Show the form for editing the specified comment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('admin.edit', compact('comment'));
    }

    /**
     * Update the specified comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCommentsRequest $request, $id, Redirector $redirector)
    {
        $comment = Comment::findOrFail($id);
        //dd($comment);
        DB::table('comments')
            ->where('id', $comment->id)
            ->update(['comment' => $request['comment']]);

        return $redirector->route('admin');
    }
    /**
     * Destroy comments and redirect to admin page
     * @param $id
     * @param Redirector $redirector
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id, Redirector $redirector)
    {
        if(Auth::user()->role == 'admin'){
            DB::table('comments')->where('id', $id)->delete();
        }
        return $redirector->route('admin');
    }


}

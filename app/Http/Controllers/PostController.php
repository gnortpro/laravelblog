<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
	public $successStatus = 200;
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$posts = Post::get();
		return view('post.index', ['posts' => $posts]);
	}
	public function submitPost(Request $request)
	{
		$this->validate($request, [
			'post_name' => 'required',
			'post_content' => 'required',
			'post_thumbnail' => 'required'
		]);
		$post = new Post([
			'name' => $request->get('post_name'),
			'author_id' => Auth::id(),
			'content' => $request->get('post_content'),
			'thumbnail' => $request->get('post_thumbnail'),
			'slug' => str_slug($request->get('post_name'))
		]);
		$post->save();
		return response()->json(['success' => 'success'], $this->successStatus);
	}
}

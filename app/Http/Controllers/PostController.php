<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Validator;

class PostController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Request $request)
	{
		if (null != $request->query('action')) {
			$action = $request->query('action');
			switch ($action) {
				case 'add':
					return view('post.action.add');
					break;
				case 'edit':
					return view('post.action.edit');
					break;
				case 'delete':
					// return view('post.delete');
					break;
				default:
					abort(404);
			}
		} else {
			$posts = Post::get();
			return view('post.index', ['posts' => $posts]);
		}
	}

	public function categories()
	{
		// $posts = Post::get();
		return view('post.categories');
	}

	public function tags()
	{
		// $posts = Post::get();
		return view('post.tags');
	}

	public function submitPost(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'post_name' => 'required',
			'post_content' => 'required',
			'post_thumbnail' => 'required'
		]);
		if ($validator->fails()) {
			return $this->errorResponse(self::ERROR_BAD_REQUEST, [], self::getErrorMessage(self::ERROR_BAD_REQUEST));
		}
		$post = new Post([
			'name' => $request->get('post_name'),
			'author_id' => Auth::id(),
			'content' => $request->get('post_content'),
			'thumbnail' => $request->get('post_thumbnail'),
			'slug' => str_slug($request->get('post_name'))
		]);
		$post->save();
		return $this->successResponse(
			[],
			'Create new post successfully'
		);
	}
}

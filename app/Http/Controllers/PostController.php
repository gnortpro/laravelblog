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
		// $this->middleware('auth');
	}
	public function index(Request $request, $slug = null)
	{
		if (null != $request->query('action')) {
			$action = $request->query('action');
			switch ($action) {
				case 'add':
					return view('post.action.add');
					break;
				case 'edit':
					$post_by_slug = Post::where('slug', $slug)->first();
					if (null != $post_by_slug) {
						return view('post.action.edit', ['post_by_slug' =>  $post_by_slug]);
					} else {
						abort(404);
					}

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
			'post_thumbnail' => 'required',
			'post_author' => 'required',
			'post_slug' => 'required'
		]);
		if ($validator->fails()) {
			return $this->errorResponse(self::ERROR_BAD_REQUEST, [], self::getErrorMessage(self::ERROR_BAD_REQUEST));
		}
		$check_slug_duplicate = Post::where('slug', $request->get('post_slug'))->first();
		if ($check_slug_duplicate != null) {
			return $this->errorResponse(self::ERROR_SLUG_DUPICATED, [], self::getErrorMessage(self::ERROR_SLUG_DUPICATED));
		}
		$post = new Post([
			'name' => $request->get('post_name'),
			'author_id' => $request->get('post_author'),
			'content' => $request->get('post_content'),
			'thumbnail' => $request->get('post_thumbnail'),
			'slug' => $request->get('post_slug')
		]);
		$post->save();
		return $this->successResponse(
			[],
			'Create new post successfully'
		);
	}


	public function editPost(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'post_slug' => 'required',
			'post_name' => 'required',
			'post_content' => 'required',
			'post_thumbnail' => 'required',
			'post_slug_new' => 'required'
		]);
		if ($validator->fails()) {
			return $this->errorResponse(self::ERROR_BAD_REQUEST, [], self::getErrorMessage(self::ERROR_BAD_REQUEST));
		}
		Post::where('slug', $request->get('post_slug'))
			->update([
				'name' => $request->get('post_name'),
				'content' => $request->get('post_content'),
				'thumbnail' => $request->get('post_thumbnail'),
				'slug' => $request->get('post_slug_new')
			]);
		return $this->successResponse(
			[],
			'Edit post successfully'
		);
	}

	public function previewPost(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'post_slug' => 'required',
		]);
		if ($validator->fails()) {
			return $this->errorResponse(self::ERROR_BAD_REQUEST, [], self::getErrorMessage(self::ERROR_BAD_REQUEST));
		}
		$post = Post::where('slug', $request->post_slug)->first();
		return $this->successResponse(
			$post,
			'Preview post successfully'
		);
	}
}

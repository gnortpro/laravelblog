<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Validator;

class PostController extends Controller
{
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
				case 'categories':
					return view('post.categories');
					break;

				case 'tags':
					return view('post.tags');
					break;

				case 'trash':
					$trash = Post::where('status', 1)->get();
					return view('post.trash',  ['posts' => $trash]);
					break;

				default:
					abort(404);
			}
		} else {
			// status 0 is show
			// status 1 is hidden post
			$posts = Post::where('status', 0)->get();
			return view('post.index', ['posts' => $posts]);
		}
	}

	// public function categories()
	// {
	// 	// $posts = Post::get();
	// 	return view('post.categories');
	// }

	// public function tags()
	// {
	// 	// $posts = Post::get();
	// 	return view('post.tags');
	// }

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


	public function actionPost(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'option' => 'required',
			'post_slug' => 'required',
			'author_id' => 'required'
		]);
		if ($validator->fails()) {
			return $this->errorResponse(self::ERROR_BAD_REQUEST, [], self::getErrorMessage(self::ERROR_BAD_REQUEST));
		}
		if ($request->option == 'movetotrash') {
			foreach ($request->post_slug as $value) {
				Post::where('slug', $value)->update(['status' => 1]);
			}
			return $this->successResponse(
				[],
				'Move to trash successfully'
			);
		}
		if ($request->option == 'clone') {
			foreach ($request->post_slug as $value) {
				$post = Post::where('slug', $value)->first();
				$clone = new Post([
					'name' => $post->name,
					'author_id' => $request->author_id,
					'content' => $post->content,
					'thumbnail' => $post->thumbnail,
					'slug' => $post->slug . '-clone-' . time()
				]);
				$clone->save();
			}
			return $this->successResponse(
				[],
				'Clone post successfully'
			);
		}
		// Delete permanently
		if ($request->option == 'delete') {
			foreach ($request->post_slug as $value) {
				Post::where('slug', $value)->update(['status' => 99]);
			}
			return $this->successResponse(
				[],
				'Delete to trash successfully'
			);
		}

		if ($request->option == 'restore') {
			foreach ($request->post_slug as $value) {
				Post::where('slug', $value)->update(['status' => 0]);
			}
			return $this->successResponse(
				[],
				'Restore to trash successfully'
			);
		}
	}
}

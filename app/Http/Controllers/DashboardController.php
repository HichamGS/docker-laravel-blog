<?php

/**
 * @author hicham ajarif <hicham.ajarif@gmail.com>
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Tag;
use Auth;
/**
 * Class DashboardController
 */
class DashboardController extends Controller
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{

		// $blogs_count = Blog::count();
		$stats['last_blog_updated'] = '';
		$stats['last_blogs'] = [];
		$stats['blogs_count'] = Blog::count();

		$last_blogs = Blog::orderBy('id', 'desc')->take(5)->get();

		// $last_blogs = $last_blogs->toArray();
		// if( $last_blogs ){
		// 	$stats['last_blog_time'] = $this->getTimeAgo($last_blogs[0]['updated_at']);
		// 	dd($stats);

		// }
		if( !$last_blogs->isEmpty() ){
			$stats['last_blog_updated'] = $this->getTimeAgo($last_blogs->first()->updated_at);
			$blogs = $last_blogs->map(function($blog) {
			    return array(
			    	'blog_id' => $blog->id,
			    	'blog_slug' => $blog->slug,
			    	'blog_title' => $blog->title,
			    	'blog_updated' => $this->getTimeAgo($blog->updated_at)
			    );
			});
			$stats['last_blogs'] = $blogs;
		}
		return view('dashboard.index')->withStats($stats);
	}
	/**
	 * [users description]
	 * @return [type] [description]
	 */
	public function users()
	{
		$users = \App\Models\User::all();
		return view('dashboard.users.index')->withUsers($users);
	}
	/**
	 * [blogs description]
	 * @return [type] [description]
	 */
	public function blogs()
	{
		$blogs = Blog::with('author')->with('categories')->with('tags')->get();
		return view('dashboard.blogs.index')->withBlogs($blogs);
	}
	/**
	 * [categories description]
	 * @return [type] [description]
	 */
	public function categories()
	{
		$categories = Category::with('parent_category')->get();
 		return view('dashboard.categories.index')->withCategories($categories);	
	}
	/**
	 * [categories description]
	 * @return [type] [description]
	 */
	public function tags()
	{
		$tags = Tag::all();
 		return view('dashboard.tags.index')->withTags($tags);	
	}
	/**
	 * [getTimeAgo description]
	 * @param  [type] $carbonObject
	 * @return [type]               [description]
	 */
	public function getTimeAgo($carbonObject) {
	    return str_ireplace(
	        [' seconds', ' second', ' minutes', ' minute', ' hours', ' hour', ' days', ' day', ' weeks', ' week'], 
	        ['s', 's', 'm', 'm', 'h', 'h', 'd', 'd', 'w', 'w'], 
	        $carbonObject->diffForHumans()
	    );
	}
}
<?php

/**
 * @author hicham ajarif <hicham.ajarif@gmail.com>
 */

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
	/**
	 * [newBlog description]
	 * @return [type] [description]
	 */
	public function newBlog()
	{
		$categories = Category::all();
		$tags = Tag::all();
		return view('dashboard.blogs.new')->withCategories($categories)->withTags($tags);	
	}
	/**
	 * [registerBlog description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function createBlog(Request $request)
	{
		$data = $request->all();
		$validator = Validator::make($data, [
        	'title' => ['required', 'string', 'max:100'],
	        'content' => ['required', 'string'],
	        'image' => 'mimes:jpeg,png|max:1014'
		]);

		if ($validator->fails()) {
			return redirect('/dashboard/blogs/new')
			->withErrors($validator)
			->withInput();
		}
		$blog = new Blog();
		$blog->title = $data['title'];
		$blog->content = $data['content'];
		$blog->excerpt = $data['excerpt'] ? $data['excerpt'] : substr($data['content'], 100);
		$blog->slug = $data['slug'] ? $data['slug']: $this->slugify($data['title']);
		$blog->author_id = Auth::user()->id;
		$blog->save();
    	$blog->categories()->attach($request->categories);
    	$blog->tags()->attach($request->tags);
		if( $request->hasFile('image') ) {
            $image_path = Storage::disk('uploads')->put('blogs/'.Auth()->user()->id, $request->image);

			BlogImage::create([
		        "blog_id" => $blog->id,
		        "blog_image_caption" => $blog->title,
		        "blog_image_path" => "/uploads/".$image_path
		    ]);

		}
    	// $blog->image()->associate($blogImage);
		return redirect()->to('/dashboard/blogs');
	}
	/**
	 * [slugify description]
	 * @param  [type] $text [description]
	 * @return [type]       [description]
	 */
	public function slugify($text)
	{
		return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
	}
	/**
	 * [editBlog description]
	 * @param  [type] $blog_id [description]
	 * @return [type]          [description]
	 */
	public function editBlog($blog_id)
	{
		$categories = Category::all();
		$tags = Tag::all();
		$blog = Blog::with('categories')->with('tags')->with('image')->find($blog_id);
		$blog_categories = $blog->categories ? $blog->categories->pluck('id')->toArray() : array();
		$blog_tags = $blog->tags ? $blog->tags->pluck('id')->toArray() : array();
		return view('dashboard.blogs.edit')->withBlog($blog)->withCategories($categories)->withTags($tags)->withBlogCategories($blog_categories)->withBlogTags($blog_tags);
	}

	/**
	 * [UpdateBlog description]
	 * @param Request $request [description]
	 */
	public function UpdateBlog(Request $request){
		$blog = Blog::findOrFail($request->id);
		$input = $request->all();
	    $blog->fill($input)->save();
    	$blog->categories()->sync($request->categories);
    	$blog->tags()->sync($request->tags);
    	if( $request->hasFile('image') ) {
            $image_path = Storage::disk('uploads')->put('blogs/'.Auth()->user()->id, $request->image);

    		$blog_image = $blog->image;
            if( $blog_image ) {
            	// Storage::delete('/public' . $blog_image->blog_image_path);
            	unlink( public_path(). $blog_image->blog_image_path );
            	$blog->image->blog_image_path = "/uploads/".$image_path;
            	$blog->image->save();
            } else {
            	BlogImage::create([
			        "blog_id" => $blog->id,
			        "blog_image_caption" => $blog->title,
			        "blog_image_path" => "/uploads/".$image_path
		    	]);
            }
        }
	    return back()->with('message', 'Blog Successfully Updated!');
	}
	
	/**
	 * [deleteBlog description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function deleteBlog(Request $request){
		$blog = Blog::findOrFail($request->id);
		$blog->categories->detach();
	    $blog->delete();
	    return redirect('/dashboard/blogs'); 
	}

	public function ShowBlog($id,$slug)
	{
		$blog=Blog::with('author')->where('id','=',$id)->where('slug', '=', $slug)->first();
		if( !$blog ) abort(404);
		return view('blog')->withBlog($blog);
	}
}
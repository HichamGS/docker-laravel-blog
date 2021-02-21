<?php

/**
 * @author hicham ajarif <hicham.ajarif@gmail.com>
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    	/**
	 * [newCategory description]
	 * @return [type] [description]
	 */
	public function newTag()
	{
		$tags = Tag::all();
		return view('dashboard.tags.new')->withTags($tags);
	}
	/**
	 * [registerCategory description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function registerTag(Request $request)
	{
		Tag::create($request->all());
		return redirect()->to('/dashboard/tags');
	}
	/**
	 * [editCategory description]
	 * @param  [type] $category_id [description]
	 * @return [type]          [description]
	 */
	public function editTag($tag_id)
	{
		$tag = Tag::findOrFail($tag_id);
		return view('dashboard.tags.edit')->withTag($tag);
	}
	/**
	 * [UpdateCategory description]
	 * @param Request $request [description]
	 */
	public function UpdateTag(Request $request){
		$input = $request->all();
		$tag = Tag::findOrFail($request->id);
	    $tag->fill($input)->save();
	    return back()->withTag($tag)->with('message', 'Record Successfully Updated!');
	}
	/**
	 * [deleteCategory description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function deleteTag(Request $request){
		$tag = Tag::findOrFail($request->id);
	    $tag->delete();
	    return redirect('/dashboard/tags'); 
	}
}

<?php

/**
 * @author hicham ajarif <hicham.ajarif@gmail.com>
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    	/**
	 * [newCategory description]
	 * @return [type] [description]
	 */
	public function newCategory()
	{
		$categories = Category::all();
		return view('dashboard.categories.new')->withCategories($categories);
	}
	/**
	 * [registerCategory description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function registerCategory(Request $request)
	{
		$input = $request->all();
		$input['level'] = 0;
		if($input['parent']){
			$parent_category = Category::findOrFail($input['parent']);
			$input['level'] = $parent_category->level + 1;
		}
		Category::create($input);
		return redirect()->to('/dashboard/categories');
	}
	/**
	 * [editCategory description]
	 * @param  [type] $category_id [description]
	 * @return [type]          [description]
	 */
	public function editCategory($category_id)
	{
		$category = Category::findOrFail($category_id);
		$categories = Category::where('id', '!=', $category_id)->get();
		return view('dashboard.categories.edit')->withCategory($category)->withCategories($categories);
	}
	/**
	 * [UpdateCategory description]
	 * @param Request $request [description]
	 */
	public function UpdateCategory(Request $request){
		$input = $request->all();
		$category = Category::findOrFail($request->id);
		$input['level'] = 0;
		if($input['parent']){
			$parent_category = Category::findOrFail($input['parent']);
			$input['level'] = $parent_category->level + 1;
		}
	    $category->fill($input)->save();
	    return back()->with('message', 'Record Successfully Updated!');
	}
	/**
	 * [deleteCategory description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function deleteCategory(Request $request){
		$category = Category::findOrFail($request->id);
	    $category->delete();
	    return redirect('/dashboard/categories'); 
	}
}

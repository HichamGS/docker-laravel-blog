<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory;
	protected $fillable = [
		'title',
		'slug',
		'description',
		'parent',
		'level',
	];
	/**
	 * [parent_category description]
	 * @return [type] [description]
	 */
	public function parent_category()
	{
		return $this->belongsTo(Category::class, 'parent');
	}
}

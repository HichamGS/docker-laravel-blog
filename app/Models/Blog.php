<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogImage;
use App\Models\Category;
use App\Models\User;
use App\Models\Tag;

class Blog extends Model
{
	use HasFactory;

	protected $fillable = [
		'title',
		'content',
		'excerpt',
		'slug',
		'author_id',
		'status'
	];
	/**
	 * [categories description]
	 * @return [type] [description]
	 */
	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}
	/**
	 * [author description]
	 * @return [type] [description]
	 */
	public function author()
	{
		return $this->belongsTo(User::class, 'author_id');
	}
	/**
	 * [tags description]
	 * @return [type] [description]
	 */
	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}
	/**
	 * [image description]
	 * @return [type] [description]
	 */
	public function image()
	{
		return $this->hasOne(BlogImage::class);
	}
}

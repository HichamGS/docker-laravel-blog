<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class BlogImage extends Model
{
	use HasFactory;

	protected $table = 'blog_images';

	protected $fillable = [
		'blog_id',
		'blog_image_path',
		'blog_image_caption'
	];

}
<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Blog;

class User extends Authenticatable
{
	use HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'role',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];
	/**
	 * [blogs description]
	 * @return [type] [description]
	 */
	public function blogs()
	{
		return $this->hasMany(Blog::class);
	}
	/**
	 * canAccessDashboard
	 * @return Boolean
	 */
	public function can_access_dashboard(){
		return in_array($this->role, array(1, 2, 3)); //superadmin, admin, creator
	}
	/**
	 * [can_edit_blogs description]
	 * @return [type] [description]
	 */
	public function can_edit_blogs(){
		return in_array($this->role, array(1, 2));
	}
}

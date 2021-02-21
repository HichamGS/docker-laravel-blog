<?php

/**
 * @author hicham ajarif <hicham.ajarif@gmail.com>
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    	/**
	 * [newUser description]
	 * @return [type] [description]
	 */
	public function newUser()
	{
		if(in_array(Auth::user()->role, [1, 2]))
		{
			return view('dashboard.users.new');
		}
		else
		{
			return redirect()->to('/dashboard/users');
		}
	}
	/**
	 * [editUser description]
	 * @param  [type] $user_id [description]
	 * @return [type]          [description]
	 */
	public function editUser($user_id)
	{
		if(in_array(Auth::user()->role, [1, 2]))
		{	
			$user = User::findOrFail($user_id);
			if( $user->role == 1 && Auth::user()->role != 1 ){
				return redirect()->to('/dashboard/users');
			}
			return view('dashboard.users.edit')->withUser($user);
		}
		else
		{
			return redirect()->to('/dashboard/users');
		}
	}
	/**
	 * [registerUser description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function registerUser(Request $request)
	{
		$data = $request->all();
		$validator = Validator::make($data, [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);

		if ($validator->fails()) {
			return redirect('/dashboard/users/new')
			->withErrors($validator)
			->withInput();
		}
		\App\Models\User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
			'role'  => $data['role']
		]);
		return redirect()->to('/dashboard/users');
		
	}
	/**
	 * [updateUser description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function updateUser(Request $request)
	{
		$user = \App\Models\User::findOrFail($request->id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->role = $request->role;
		$user->save();
		return redirect()->to('/dashboard/users');
	}
	/**
	 * [deleteUser description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function deleteUser(Request $request)
	{
		$user = User::findOrFail($request->id);
	    $user->delete();

	    return redirect('/dashboard/users'); 
	}
}

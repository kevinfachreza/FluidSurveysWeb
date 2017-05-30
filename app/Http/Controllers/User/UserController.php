<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class UserController extends Controller
{
	public function create(Request $request)
	{
		try
		{
			$this->validate($request, [
				'name' => 'required',
				'email' => 'required|unique:users|max:255',
				'password' => 'required',
				//'device_token' => 'required',
				]);
		}
		catch (\Exception $e) {	
			return json_encode([
				'status' => 0,
				'message' => 'Form tidak valid. Silahkan coba lagi'
				]);
		}

		try
		{
			$name = $request->input('name');
			$email = $request->input('email');
			$password = $request->input('password');
			//$device_token = $request->input('device_token');
			$ispc = $request->ispc;

			$user = new User;
			$user->name = $name;
			$user->email = $email;
			$user->password = bcrypt($password);
			//$user->device_token = $device_token;
			$user->save();
		}
		catch (\Exception $e) {
				
				return json_encode([
				'status' => 0,
				'message' => 'Kesalahan Server. Registrasi Gagal. Silahkan coba lagi'
				]);
			
			
		}
		if($ispc)
			{
				return back()->with('message', 'Add Employe Success!!');
			}
			else{
			return json_encode([
			'status' => 1,
			'message' => 'Registrasi Berhasil.'
			]);
			}


	}

	public function login(Request $request)
	{
		try
		{
			$email = $request->input('email');
			$password = $request->input('password');
		}
		catch (\Exception $e) {	
			return json_encode([
				'status' => 0,
				'message' => 'Form tidak valid. Login Gagal. Silahkan coba lagi'
				]);
		}

		try
		{
			if (Auth::attempt(['email' => $email, 'password' => $password])) 
			{
				return json_encode([
					'status' => 1,
					'message' => 'Login Berhasil.'
					]);
			}
			else
			{
				return json_encode([
					'status' => -1,
					'message' => 'Email atau password salah. Login gagal.'
					]);
			}
		}
		catch (\Exception $e) {	
			return json_encode([
				'status' => 0,
				'message' => 'Kesalahan Server. Login Gagal. Silahkan coba lagi'
				]);
		}
	}

	public function edit(Request $request)
	{
		try
		{
			$email = $request->input('email');
			$name = $request->input('name');
			$id = $request->input('id');
		}
		catch (\Exception $e) {	
			return json_encode([
				'status' => 0,
				'message' => 'Form tidak valid. Edit Profile Gagal. Silahkan coba lagi'
				]);
		}

		try
		{
			$user = User::find($id);
			$user->name = $name;
			$user->email = $email;
			$user->save();

			return json_encode([
				'status' => 1,
				'message' => 'Edit Profile Berhasil.'
				]);

		}
		catch (\Exception $e) {	
			return json_encode([
				'status' => 0,
				'message' => 'Kesalahan Server. Edit Profile Gagal. Silahkan coba lagi'
				]);
		}
	}


}

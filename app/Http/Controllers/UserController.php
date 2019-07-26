<?php

namespace App\Http\Controllers;

use App\Applicants;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller {
	public function usersList() {
		//$usersList = DB::table('users')->get();
		$usersList = DB::table('users')
			->join('applicants', 'users.id', '=', 'applicants.user_id')
			->select('users.*', 'applicants.current_step')
			->get();

		return view('temp1.immigrant.admin.usersList')->with('usersList', $usersList);
	}

	public function edit(Request $request, $id) {
		$status = $request->get('status');
		DB::table('users')
			->where('id', $id)
			->update(['status' => $status]);
		return redirect(route('immigrant.users'))->with(['message' => 'updated successfully']);

	}
	public function delete($id) {
		DB::table('users')->where('id', $id)->delete();
		return redirect(route('immigrant.users'))->with(['message' => 'User deleted successfully']);
	}
	public function detail(Request $request, $id) {
		$applicant = Applicants::where('user_id', $id)->orderBy('id', 'desc')->first();
		$userDetail = DB::table('applicants')
			->join('users', 'users.id', 'applicants.user_id')
			->select('users.name', 'users.email', 'users.created_at', 'applicants.*')
			->where('user_id', $id)
			->first();
		return view('temp1.immigrant.admin.userdetail', ['userdetail' => $userDetail, 'score' => $applicant->score]);

	}
}

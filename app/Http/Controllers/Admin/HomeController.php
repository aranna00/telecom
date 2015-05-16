<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.home');
	}

}

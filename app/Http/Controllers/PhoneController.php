<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

use App\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PhoneController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$phones = Phone::all();
		$brands = Cache::get('brands');
		$priceLowest = Cache::get('priceLowest');
		$priceHighest = Cache::get('priceHighest');
		return view('phone.index',['phones'=>$phones,'brands'=>$brands,'priceLowest'=>$priceLowest,'priceHighest'=>$priceHighest]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$phone = Phone::find($id);
		$pictures = json_decode($phone->pictures);
		return view('phone.show',['phone'=>$phone,'pictures'=>$pictures]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

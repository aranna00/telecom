<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Phone;
use App\User;

class PhoneController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		$users->load('contract');
		$users->load('phone');
		$phones = Phone::all();
		$revenue = 0;
		$revenuePM = 0;
		$contracts = [];
		$phoneSales = [];
		foreach($users as $user)
		{
			foreach($user->phone as $phone)
			{
				$phoneSales[] = $phone;
				$revenue+=$phone->costs;
			}
			foreach($user->contract as $contract)
			{
				$contracts[]=$contract;
				$revenue+=$contract->phone_price;
				$revenuePM+=$contract->cost;
			}
		}

		return view('admin.phone.index',['phones'=>$phones,'revenue'=>$revenue,'revenuePM'=>$revenuePM,'contracts'=>$contracts,'phoneSales'=>$phoneSales]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.phone.create');
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

		return view('admin.phone.show',['phone'=>$phone]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$phone = Phone::find($id);

		return view('admin.phone.show',['phone'=>$phone]);
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

	public function all()
	{
		$phones = Phone::all();

		return view('admin.phone.list',['phones'=>$phones]);
	}

}

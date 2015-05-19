<?php namespace App\Http\Controllers\Admin;

use App\Contract;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Validation\Validator;

class ContractController extends Controller {
	protected function formatValidationErrors(Validator $validator)
	{
		Flash::error($validator->errors()->first());
		return $validator->errors()->all();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		$users->load('phone');
		$users->load('contract');
		$contracts = Contract::all();
		$revenuePM = 0;
		$userContracts = [];
		foreach($users as $user)
		{
			foreach($user->contract as $contract)
			{
				$revenuePM += $contract->cost;
				$userContracts[] = $contract;
			}
		}

		return view('admin.contract.index',['users'=>$users,'contracts'=>$contracts,'revenuePM'=>$revenuePM,'userContracts'=>$userContracts]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.contract.create');
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
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contract = Contract::find($id);

		return view('admin.contract.edit',['contract'=>$contract]);
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

	/**
	 * show all contracts
	 *
	 * @return Response
	 */
	public function all()
	{
		$contracts = Contract::all();

		return view('admin.contract.list',['contracts'=>$contracts]);
	}
}

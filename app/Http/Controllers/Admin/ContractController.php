<?php namespace App\Http\Controllers\Admin;

use App\Contract;
use App\Http\Controllers\Controller;
use App\Phone;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use Laracasts\Flash\Flash;

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
		$phones_array = [];
		$phones_array['Default'][] = 'Default';
		$phones = Phone::all();
		foreach($phones as $phone)
		{
			$phones_array[$phone->brand][$phone->id] =$phone->brand.' '.$phone->model;
		}
		return view('admin.contract.create',['phones'=>$phones,'phones_array'=>$phones_array]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$rules = [
			'name'          => 'required',
		    'description'   => 'required',
		    'cost'          => 'required|numeric|min:0',
		    'length'        => 'required|numeric|min:0',
		    'phone'         => 'required|array',
		    'phone_cost'    => 'required|array',
		];
		$this->validate($request,$rules);

		$data = Input::except(['_token']);


		$contract = new Contract();
		$contract->name = $data['name'];
		$contract->description = $data['description'];
		$contract->cost = $data['cost'];
		$contract->length = $data['length'];
		$contract->save();
		foreach($data['phone'] as $key => $phone) {
			if(!empty($phone)) {
				$contract->phone()->attach([$phone => ['phone_price' => $data['phone_cost'][$key]]]);
			}
		}

		Flash::success('The Contract has been successfully added');
		return Redirect::action('Admin\ContractController@index');
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

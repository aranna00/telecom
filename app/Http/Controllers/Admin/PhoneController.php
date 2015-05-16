<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Phone;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use Laracasts\Flash\Flash;

class PhoneController extends Controller {
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
	public function store(Request $request)
	{
		$rules = [
			'brand'         =>  'required|alpha_dash',
		    'model'         =>  'required|alpha_num',
		    'description'   =>  'required',
		    'costs'         =>  'required|numeric',
		];
		$this->validate($request,$rules);

		$data = [
			'brand'         =>  $request->brand,
			'model'         =>  $request->model,
		    'description'   =>  $request->description,
		    'costs'         => $request->costs,
		];

		Phone::create($data);
		if($request->continue==='')
		{
			Flash::success('The phone has been added');
			return Redirect::action('Admin\PhoneController@create');
		}
		else{
			Flash::success('The phone has been added');
			return Redirect::action('Admin\PhoneController@index');
		}

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
		$pictures = json_decode($phone->pictures);

		return view('admin.phone.edit',['phone'=>$phone,'pictures'=>$pictures]);
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

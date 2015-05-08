<?php namespace App\Http\Controllers;

use App\Contract;
use App\Http\Middleware\CutString;
use App\Http\Requests;
use App\Phone;

class ContractController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @param $phone_id
	 *
	 * @return \App\Http\Controllers\Response
	 */
	public function index($phone_id)
	{
		$contracts = Contract::where('phone_id','=',$phone_id)->get();
		foreach($contracts as $contract){
			$contract->excerpt = CutString::truncate($contract->description,500);
		}
		$phone = Phone::find($phone_id);
		return view('contracts.index',['contracts'=>$contracts,'phone'=>$phone]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$contract = Contract::find($id);
		return view('contracts.show',['contract'=>$contract]);
	}
}

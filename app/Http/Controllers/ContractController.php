<?php namespace App\Http\Controllers;

use App\Contract;
use App\Http\Middleware\CutString;
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
		$contracts = [];
		$phone = Phone::find($phone_id);
		foreach($phone->contract as $contract){
			$contracts[] = $contract;
			$contract->excerpt = CutString::truncate($contract->description,500);
		}
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
		$phone = Phone::find($contract->phone_id);
		$pictures = json_decode($phone->pictures);
		$contract->excerpt = CutString::truncate($contract->description,1000);
		return view('contracts.show',['contract'=>$contract,'phone'=>$phone,'pictures'=>$pictures]);
	}
}

<?php namespace App\Http\Controllers;

use App\Http\Middleware\CutString;
use App;

use App\Phone;
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
		foreach($phones as $phone)
		{
			$phone->excerpt = CutString::truncate($phone->description,500);
		}
		$brands = Cache::get('brands');
		$priceLowest = Cache::get('priceLowest');
		$priceHighest = Cache::get('priceHighest');
		return view('phone.index',['phones'=>$phones,'brands'=>$brands,'priceLowest'=>$priceLowest,'priceHighest'=>$priceHighest]);
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
		$phone->excerpt = CutString::truncate($phone->description,1000);

		return view('phone.show',['phone'=>$phone,'pictures'=>$pictures]);
	}

}

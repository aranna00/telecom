<?php namespace App\Http\Middleware;

use App\Phone;
use Closure;
use Illuminate\Support\Facades\Cache;

class CacheHandler {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!Cache::has('priceLowest')&&!Cache::has('priceHighest')&&!Cache::has('brands')) {
			$phones = Phone::all();
			$priceLowest = 0;
			$priceHighest = 0;
			$brands = [];
			foreach ($phones as $phone) {
				$brands[ $phone->brand ][] = $phone->model;
				if ($phone->costs < $priceLowest || $priceLowest === 0) {
					$priceLowest = $phone->costs;
				}
				if ($priceHighest < $phone->costs) {
					$priceHighest = $phone->costs;
				}
			}
			Cache::put('priceHighest', $priceHighest,60);
			Cache::put('priceLowest',$priceLowest,60);
			cache::put('brands', $brands,60);
		}
		return $next($request);
	}

}

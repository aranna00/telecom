<?php namespace App\Http\Middleware;

use Closure;

class CutString {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		return $next($request);
	}

	public static function truncate($string,$length=100,$append="&hellip;") {
		$string = trim($string);

		if(strlen($string) > $length) {
			$string = wordwrap($string, $length);
			$string = explode("\n", $string, 2);
			$string = $string[0] . $append;
		}

		return $string;
	}

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model {

	protected $table = 'specs';
	protected $guarded = [];

	public function phone()
	{
		return $this->belongsTo('App\Phone');
	}

}

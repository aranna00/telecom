<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model {

	protected $table = 'phones';
	protected $guarded = [];

	public function spec()
	{
		return $this->hasMany('App\Spec');
	}

	public function contract()
	{
		return $this->belongsTo('App\Contract');
	}

}

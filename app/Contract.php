<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model {

	protected $table = 'contracts';
	protected $guarded = [];

	public function phone ()
	{
		return $this->belongsTo('App\Phone');
	}

	public function user()
	{
		return $this->belongsToMany('App\User', 'contract_user');
	}
}

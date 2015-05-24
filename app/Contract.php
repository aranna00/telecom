<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model {
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'contracts';
	protected $guarded = [];

	public function phone ()
	{
		return $this->belongsToMany('App\Phone')->withPivot('phone_price');
	}

	public function user()
	{
		return $this->belongsToMany('App\User', 'contract_user');
	}
}

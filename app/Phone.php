<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'phones';
	protected $guarded = [];

	public function spec()
	{
		return $this->hasMany('App\Spec');
	}

	public function contract()
	{
		return $this->belongsToMany('App\Contract')->withPivot('phone_price');
	}

	public function user()
	{
		return $this->belongsToMany('App\User');
	}


}

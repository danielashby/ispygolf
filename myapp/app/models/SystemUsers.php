<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class SystemUsers extends Eloquent  {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sys_clubs_users';
	protected $primaryKey = "CLUB_ID";
	

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/* Has one to many relationship with courses */
	public function courses()
    {
        return $this->belongsTo('Course','CLUB_ID','CLUB_ID');
    }



}



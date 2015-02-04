<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Course extends Eloquent {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'courses';
	protected $primaryKey = "COURSE_ID";
	

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/* Has one to one relationship with imagerefs */
	public function courseimages()
    {
        return $this->hasOne('CourseImages','IMG_COURSE_ID');
    }
	
	public function club()
    {
        return $this->belongsTo('Club','CLUB_ID','CLUB_ID');
    }
	
	public function siteuser()
    {
        return $this->hasMany('SystemUsers','CLUB_ID');
    }
	

	


}



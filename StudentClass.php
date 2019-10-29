<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $table = 'class';
    protected $fillable = [
			    	'course_id', 
			    	'class_name', 
			    	'semester', 
			    	'credit_number', 
			    	'teacher',
			    	'teacher_id',
			    	'room_id',
			    	];
	public $timestamps = true;

}
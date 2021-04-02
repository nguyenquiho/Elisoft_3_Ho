<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'nn_department';

    public function productCategory(){
    	return $this->hasMany('App\Category');
    }

    public function getDepartment()
    {
        $department = Department::all();
        return $department;
    }
}

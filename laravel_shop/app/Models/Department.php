<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'nn_department';

    // public function productCategory(){
    // 	return $this->hasMany('App\Category');
    // }

    public function getDepartment()
    {
        $department = Department::all();
        return $department;
    }
}

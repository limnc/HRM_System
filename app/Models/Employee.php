<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    protected $fillable = ['id','name','nationality','gender','race','birthdate','contactNum','address','marialStat','education_level','institution','professional','profilePic'];
    

    public function employee(){
        
    }
}

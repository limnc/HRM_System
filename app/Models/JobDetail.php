<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{
    use HasFactory;
    protected $table = 'job_details';
    protected $fillable = ['id','emp_id','department','job_title','position','joined_date','confirmation_date','pay_grade'];
    
}

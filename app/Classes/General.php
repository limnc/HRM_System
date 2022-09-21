<?php

namespace App\Classes;

class General{
    
    private $department = array('Accounting','HR','Marketing','IT');
    private $positions = array('Full Time Staff','Part Time Staff','Project Manager','Department Manager','Project Leader','Assistant Manager','CEO');
    private $jobTitle = array(
        'IT'=>array(
            'Software Engineer','Software Developer','Software Tester','Programmer'
        ),
        'Accounting'=>array('Accountant','Auditor','Senior Accountant'),
        'Marketing'=>array('Marketing Executive','Sales Executive'),
        'HR'=>array('HR Admin')
    );

    private $employmentType = array('Full Time','Part Time','Full Time (Contract)','Part Time (Contract)','Internship');

    private $profession = array('Business Admin','Computer Science','Engineering','Marketing','Finance','Accounting');

    public function __construct(){

    }

    public function getRaces(){
        
        return $this->races;
    }

    public function getDepartments(){
        
        return $this->department;
    }

    public function getPositions(){
       return $this->positions;
        
    }

    public function getJobTitle(){
        return $this->jobTitle;
    }

    public function getEmploymentType(){
        return $this->employmentType;
    }

    public function getProfession(){
        sort($this->profession);
        return $this->profession;
    }
}
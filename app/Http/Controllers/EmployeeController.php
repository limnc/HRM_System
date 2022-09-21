<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\General;
use App\Models\Employee;
use App\Models\JobDetail;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
   
    public function index($department){
        $employees = Employee::join('job_details','employees.id','=','job_details.emp_id')->select('employees.*','job_details.department as department')->where('department',$department)->get();
        return view('employee',compact('employees'));
    }

    private function findEmployeeById($id){
        $employee = Employee::join('job_details','employees.id','=','job_details.emp_id')->select('employees.id as eid','employees.*','job_details.*')->where('employees.id',$id)->get();
      
        $emp = [];
        foreach($employee as $emp){
           $emp = array(
               'id'=>$emp['eid'],
               'name'=>$emp['name'],
               'nationality'=>$emp['nationality'],
               'gender'=>$emp['gender'],
               'race'=>$emp['race'],
               'birthdate'=>$emp['birthdate'],
               'contactNum'=>$emp['contactNum'], 
               'address'=>$emp['address'],
               'marialStat'=>$emp['marialStat'],
               'profilePic'=>$emp['profilePic'],
               'department'=>$emp['department'],
               'job_title'=>$emp['job_title'],
               'position'=>$emp['position'],
               'joined_date'=>$emp['joined_date'],
               'confirmation_date'=>$emp['confirmation_date'],
               'pay_grade'=>$emp['pay_grade'],
               
           );
        }
        return $emp;
    }

    public function addEmployeePage(){
        $general = new General;
        $department = $general->getDepartments();
        $positions = $general->getPositions();
        $employType = $general->getEmploymentType();
        $professions = $general->getProfession();
     
        return view('addEmployee',compact('department','positions','employType','professions'));
    }

    public function employeeDetailsPage($id){
        
        $emp = $this->findEmployeeById($id);
       
        return view('employeeDetail',compact('emp'));
       //return json_encode($employee);
    }

    public function editPage($id){
        $emp = $this->findEmployeeById($id);
        $general = new General;
        $department = $general->getDepartments();
        $positions = $general->getPositions();
        $employType = $general->getEmploymentType();
        $professions = $general->getProfession();
        return view('editEmployee',compact('emp','department','positions','employType','professions'));
    }

    private function checkExists($name,$contactNum){
       $exist = Employee::where('name',$name)->where('contactNum',$contactNum)->exists();
        return $exist;
        
    }

    public function showArray($array){
        echo $array['name'];
        //echo json_encode($array);
        
       
    }

    public function addEmployee(Request $request){
        //validation
        $request->validate([
            'empName'=>'required',
            //'nationality'=>'required',
            //'gender'=>'required',
           // 'race'=>'required',
        ]);
        //end validation

        $picFileName = '';
        $empProfilePic = '';

        if($request->hasFile('profilePic')){
            $empProfilePic = $request->file('profilePic');
            $extension = $request->file('profilePic')->getClientOriginalExtension();
            $picFileName = $request->contactNum.'.'.$extension;
        }
        
        $filePath = 'employee/';

        //declare variable
        $employeeData = array(
            'name'=>$request->empName,
            'nationality'=>$request->nationality,
            'gender'=>$request->gender,
            'race'=>$request->race,
            'birthdate'=>$request->birthdate,
            'contactNum'=>$request->contactNum,
            'address'=>$request->address,
            'marialStat'=>$request->marialStat,
            'profilePic'=>$picFileName,
            'education_level'=>$request->educationLevel,
            'institution'=>$request->institution,
            'professional'=>$request->professional,
        );
        $exist = $this->checkExists($request->empName,$request->contactNum);
        //return json_encode($employeeData);
       // return $exist;
        if($exist){
           return redirect()->back()->with('fail','Employee already exists');
        }
        else{
            
            try{
                 $newEmployee = Employee::create($employeeData);
                if($newEmployee){

                    $empProfilePic->move('employee/',$picFileName);
        
                    //getEmployeeID
                    $employeeID = $newEmployee->id;
        
                    //Add into Job_Details table
                    $jobDetails = array(
                        'emp_id'=>$employeeID,
                        'department'=>$request->department,
                        'job_title'=>$request->jobTitle,
                        'position'=>$request->position,
                        'joined_date'=>$request->joinedDate,
                        'confirmation_date'=>$request->confirmDate,
                        'pay_grade'=>$request->paygrade,
                    
                    );
                    if(JobDetail::create($jobDetails)){
                        return redirect()->back()->with("success","Employee Added !");
                    }
        
                }
                else{
                    return redirect()->back('failed','Failed to add new employee');
                }

            }catch(Exception $e){
                return $e->getMessage();
            }
           return redirect()->back()->with('success','Employee added');
          
        }
    
        
        //add Employee
        //1.check exists

        //set Employee Performance
        

    }

    public function updateEmployee(Request $request){
        $empId = $request->empid;
        $employee = Employee::find($empId);
       
        $picFileName = '';
        $empProfilePic = '';

     
        
        $filePath = 'employee/';
       
        $idarr = [$empId];
        $duplicated = Employee::whereNotIn('id',$idarr)->where('name',$request->empName)->where('contactNum',$request->contactNum)->exists();

       if($duplicated){
            return redirect()->back()->with('fail','Failed to update details');
       }
       else{

            if($request->hasFile('profilePic')){
                $empProfilePic = $request->file('profilePic');
                $extension = $request->file('profilePic')->getClientOriginalExtension();
                $picFileName = $request->contactNum.'.'.$extension;
            }
            else{
                $picFileName = $employee->profilePic;
            }

            $employeeData = array(
                'name'=>$request->empName,
                'nationality'=>$request->nationality,
                'gender'=>$request->gender,
                'race'=>$request->race,
                'birthdate'=>$request->birthdate,
                'contactNum'=>$request->contactNum,
                'address'=>$request->address,
                'marialStat'=>$request->marialStat,
                'profilePic'=>$picFileName,
                'education_level'=>$request->educationLevel,
                'institution'=>$request->institution,
                'professional'=>$request->professional,
            );

            $jobDetails = array(
            
                'department'=>$request->department,
                'job_title'=>$request->jobTitle,
                'position'=>$request->position,
                'joined_date'=>$request->joinedDate,
                'confirmation_date'=>$request->confirmDate,
                'pay_grade'=>$request->paygrade,
            
            );

            if($employee->update($employeeData)){
              //  if has file then only save picture
              if($request->hasFile('profilePic')){
                $empProfilePic->move('employee/',$picFileName);
              }
              //update job_detail
                $emp_job_detail = JobDetail::where('emp_id',$empId)->update($jobDetails);

                return redirect()->back()->with('success','Details Updated');
            }
            else{
                return redirect()->back()->with('fail','Failed to update details');
            }
            
        }
       
        //return $emp_job_detail;
        
       
       //JobDetail::find($emp_job_ID)->update($jobDetails);

       // return redirect()->back()->with('success',"Employee's details updated");
        

        

    }

    public function getEmployee(Request $request){
        //$employee = Employee::find($id);
        // $empID = $request->empID;
        // $employee = Employee::find($empID);
        // $employees = Employee::join('job_details','employees.id','=','job_details.emp_id')->select('employees.*','job_details.department as department')->get();

        // return json_encode($employees);
        $id =$request->empID;
        $employee = Employee::join('job_details','employees.id','=','job_details.emp_id')->select('employees.id as eid','employees.*','job_details.*')->where('employees.id',$id)->get();
      
        $emp = [];
        foreach($employee as $emp){
           $emp = array(
               'id'=>$emp['eid'],
               'name'=>$emp['name'],
               'nationality'=>$emp['nationality'],
               'gender'=>$emp['gender'],
               'race'=>$emp['race'],
               'birthdate'=>$emp['birthdate'],
               'contactNum'=>$emp['contactNum'], 
               'address'=>$emp['address'],
               'marialStat'=>$emp['marialStat'],
               'profilePic'=>$emp['profilePic'],
               'department'=>$emp['department'],
               'job_title'=>$emp['job_title'],
               'position'=>$emp['position'],
               'joined_date'=>$emp['joined_date'],
               'confirmation_date'=>$emp['confirmation_date'],
               'pay_grade'=>$emp['pay_grade'],
               'education_level'=>$emp['education_level'],
               'institution'=>$emp['institution'],
               'professional'=>$emp['professional'],
               
               
           );
        }
        return $emp;
    }

    public function removeEmployee($id){

    }

    public function show(){
        $general = new General;
        $professions = $general->getProfession();
        sort($professions);
        print_r($professions);
    }

    public function getJobTitle(Request $request){
        $general = new General;
        $department = $request->department;
        $jobTitles = $general->getJobTitle();
        $jobArray = [];
        foreach($jobTitles[$department] as $x){
            array_push($jobArray,$x);
        }
       return $jobArray;
    }
}



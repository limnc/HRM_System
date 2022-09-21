<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
 class general extends Controller{
    public $races = array (
        'Chinese',
        'Malay',
        'Indian'
    );

   
    public function getRaces(){
        $races = $this->races;
       return $races;
        
    }
}

?>
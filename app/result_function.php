<?php

$Grade=array("E2", "E1", "D","C2","C1","B2","B1","A2","A1");

// grade for percent mark 
function getGrade($grade)
{
    global $Grade;
    if($grade <=20)
    {
        return   $Grade[0]; 
    }
    else if($grade >20 && $grade<=32)    
    {
        return $Grade[1]; 
    }
    else if($grade >32 && $grade<=40)    
    {
        return  $Grade[2];   
    }
    else if($grade >40 && $grade<=50)    
    {
        return $Grade[3];   
    }
    else if($grade >50 && $grade<=60)    
    {
        return $Grade[4];   
    }
    else if($grade >60 && $grade<=70)    
    {
        return   $Grade[5];   
    }
    else if($grade >70 && $grade<=80)    
    {
        return $Grade[6];   
    }
    else if($grade >80 && $grade<=90)    
    {
        return  $Grade[7];   
    }
    else if($grade >90 && $grade<=100)    
    {
        return $Grade[8];   
    }
    else
    {
        return "error";
    }
    
    
}


function three_scale_grade($per){
    $three_scale_grade_arr = array('C','B','A') ;

    if( $per >= 0 && $per <= 40 )
    {
        return   $three_scale_grade_arr[0]; 
    }
    else if( $per >40 && $per <= 60 )    
    {
        return $three_scale_grade_arr[1]; 
    }
    else if( $per >60 && $per <= 100 )    
    {
        return  $three_scale_grade_arr[2];   
    }
    else
    {
        return "error";
    }

}


?>
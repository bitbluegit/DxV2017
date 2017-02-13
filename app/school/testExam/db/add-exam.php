<?php

try
{

// include('../../db.php');
    $con = mysqli_connect("localhost","admin","12345","dx2017");

$id=$_COOKIE['Id'];
$mdm=$_POST['Medium'];
$std=$_POST['Std'];
$subjects=$_POST['subjects'];
$written_marks=$_POST['written_Marks'];
$oral_marks=$_POST['oral_Marks'];
$exam=$_POST['ExamType'];

$flag=0;
$arr_div=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N');

$str="SELECT exam_name  FROM sch_exams WHERE mdm='$mdm' AND  Std='$std' AND exam_name='$exam'";
$info=mysqli_query($con,$str);

/////=== chk Exam already exits or not === /////

if(mysqli_num_rows($info)==0) 
{
    
    $get_sec= mysqli_fetch_row(mysqli_query($con,"SELECT `no_of_div` FROM `sch_class` WHERE `Medium`='".$mdm."' AND  `Std`='".$std."' ") );
    
    
    for ($div=0 ; $div < $get_sec[0] ;$div++)
    {
    
    
        // insert into sch_exam
        $exam_insert=mysqli_query($con,"INSERT INTO `sch_exams`(unique_id,`mdm`, `std`,`sec`, `exam_name`, `date`) 
                VALUES ('".$id."','".$mdm."','".$std."','".$arr_div[$div]."' ,'".$exam."','".date('Y-m-d')."' )");
        
        if($exam_insert)
        {
            // get exam Id 
            
            $exam_id=mysqli_fetch_row(mysqli_query($con,"select exam_id from sch_exams where `mdm`='".$mdm."' AND `std`='".$std."' AND `sec`='".$arr_div[$div]."' AND `exam_name`='".$exam."'"));
            
            for($i=0;$i<count($subjects);$i++ )
            {
                $subject_query="INSERT INTO `sch_exam_subjects`(`exam_id`, `subject_name`, `written_mark`, `oral_mark`,is_assign,mark_added) 
        VALUES ('".$exam_id[0]."','".$subjects[$i]."','".$written_marks[$i]."', '".$oral_marks[$i]."','0','0') ";


   echo $subject_query;
   exit();     
                $insert=mysqli_query($con,$subject_query);
                if(!$insert)
                {
                    $flag++;
                }
                
            } // for loop end

        }
        
    } //div loop END 
    
    
    
if($flag==0)
{
    // update gen_result_table status to 0 
    
    $que="UPDATE `sch_cls_genrated_result` SET `status`=0 WHERE mdm='".$mdm."' AND std='".$std."' ";
    $result=mysqli_query($con,$que);
    
$arr['status']='success';
$arr['msg']='Exam Added !!';
	echo json_encode($arr);
	exit;
}
else
{
$arr['status']='fail';
echo json_encode($arr);
exit;
}

}  // exam Exist or Not if END

////=== If Exam Exist Show Msg ===///
else
{
$arr['status']='fail';
$arr['msg']='Exam Already Exist !!';
echo json_encode($arr);
exit;
}


} 
catch(Exception $e)
{
   $arr['status']='Error';
   $arr['msg']=$e->getMessage();
    exit;
}



?>



<?php require_once '../../../helper/db.php'; 

$id      =$_COOKIE['Id'];
$mdm     = $_POST['medium'];
$std     = $_POST['standard'];
$exam    = $_POST['exmName'];
$subject = $_POST['subject'];
$written = $_POST['written'];
$oral    = $_POST['oral'];
$date    = date('Y-m-d');

$arr_div=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N');


$getexam = "SELECT * FROM sch_exams SE 
          WHERE SE.`mdm`= '{$mdm}' AND SE.`std`= '{$std}' AND SE.`exam_name`= '{$exam}' " ;
 $result = DB::oneRow($getexam);
 if($result){
  $response['status'] = 'failed';
  $response['msg']    =  'Exam Already Created ';
 } else {

$get_sec= " SELECT `no_of_div`
            FROM `sch_class` 
             WHERE `Medium`='{$mdm}' AND  `Std`='{$std}' " ; 
$getSec = DB::oneRow($get_sec);
extract($getSec);

for ($div=0 ; $div < $no_of_div[0] ;$div++)
  {

   $exam_insert=" INSERT INTO `sch_exams`(unique_id,`mdm`, `std`,`sec`, `exam_name`, `date`) 
                   VALUES ('{$id}','{$mdm}','{$std}','{$arr_div[$div]}' ,'{$exam}','{$date}' ) ";

   $insertExam = DB::execute($exam_insert);

   if($insertExam){

// // get exam id

     $exam_id= " SELECT exam_id 
                 FROM sch_exams 
                 WHERE `mdm`='{$mdm}' AND `std`='{$std}'
                 AND `sec`='{$arr_div[$div]}' AND `exam_name`='{$exam}' " ;
     $eId  = DB::allRow($exam_id);  
     for($i=0; $i<count($subject); $i++)
     {
       
       $subject_query=" INSERT INTO `sch_exam_subjects`(`exam_id`, `subject_name`, `written_mark`,
       `oral_mark`,is_assign,mark_added) 
       VALUES ('{$eId[0]}','{$subject[$i]}','{$written[$i]}', '{$oral[$i]}','0','0')  ";

       

       $insert= DB::execute($subject_query);

   }
if($insert !== null){
    $response['status'] = 'success';
    $response['msg']    =  'Exam Created Success Fully ';
}
else {
      $response['status'] = 'failed';
      $response['msg']    = 'Exam Not Created Please try Again ';
}

}               
      } // for loop end


 }

echo json_encode($response);
         //  header("location:addExam.php");

            ?>
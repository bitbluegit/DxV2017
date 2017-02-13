<html>
<head>
    <title>Exam Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/index.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/print.css"/>

    <style>
     .table-bordered {
      border: 1px solid #CF2653;
  }
  .table-bordered th, .table-bordered td {
      border-left: 1px solid #CF2653;
  }
  .table th, .table td {
      border-top: 1px solid #CF2653;
  }
  table th{
      color:#780c0c;
  }
  .table th,
  .table td {
      padding: 5px;

  }

</style>
</head>
<body>
    <?php
    // include('../../db.php');
    $con = mysqli_connect("localhost","admin","12345","dx2017");
    $gr_no=$_GET['gr'];
    $_stu_std = $_GET['std'];

$exams_id= trim($_GET['examIds'],','); // get exam Id's 

$exam_count=count(explode(',',$exams_id)); //count exam's 
$std_index=0;
// $primaryStdArr = array('first','second','third','fourth','fifth','sixth','seventh','eighth') ;

$res_status='';
$final_grade='';

/** Get Name and Logo Of School */
$header=mysqli_fetch_row(mysqli_query($con,"select name,logo from info LIMIT 1 "));

/** Get Student Name , roll no and gr num  */
$studentDetails=mysqli_fetch_assoc(mysqli_query($con,"SELECT US.Name,US.roll_no,SD.DOB ,US.Std,US.Section FROM user_sch AS US  
    INNER JOIN  sch_details AS SD ON SD.Gr_num=US.Gr_num WHERE US.Gr_num={$gr_no}"));

$studentStd=array("Mr.dextro","nursery","junior.kg","senior.kg","first","second","third","fourth","fifth","sixth","seventh","eighth","ninth","tenth");

/** get  grade function */

require_once '../../result_function.php';

/** student Mark Section Start **/

$exam_name_header="";
$subject_and_mark="";

$final_total_mark=0;
$final_outOf_mark=0;


//$examNameArr=array();
//$subNameArr=array();




// if(in_array($_stu_std,$primaryStdArr)){

//     $result_query = " SELECT EX.exam_name, SE.subject_name, 

//     (IFNULL(SE.fmt_daily_observation,0)+IFNULL(SE.fmt_oral_work,0)+IFNULL(SE.fmt_practical_experiment,0)+IFNULL(SE.fmt_activity,0)+
//     IFNULL(SE.fmt_project,0)+IFNULL(SE.fmt_test_open_book,0)+IFNULL(SE.fmt_home_class_work,0)+IFNULL(SE.fmt_other,0)+IFNULL(SE.smt_oral,0)+ 
//     IFNULL(SE.smt_practical,0)+ IFNULL(SE.smt_written,0)) AS 'outOf',

//     (IFNULL(SM.fmt_daily_observation,0)+IFNULL(SM.fmt_oral_work,0)+IFNULL(SM.fmt_practical_experiment,0)+IFNULL(SM.fmt_activity,0)+
//     IFNULL(SM.fmt_project,0)+IFNULL(SM.fmt_test_open_book,0)+IFNULL(SM.fmt_home_class_work,0)+IFNULL(SM.fmt_other,0)+IFNULL(SM.smt_oral,0)+ 
//     IFNULL(SM.smt_practical,0)+ IFNULL(SM.smt_written,0)) AS 'total'

//     FROM sch_student_mark AS SM
//     INNER JOIN sch_exam_subjects AS SE ON SE.exam_sub_id = SM.exam_sub_id
//     INNER JOIN sch_exams AS EX ON EX.exam_id = SE.exam_id
//     WHERE SM.gr_num ='{$gr_no}' AND SE.exam_id='{$exams_id}' 
//     order by SE.subject_name,SE.`exam_sub_id`";
    
//}else{
    $result_query = " SELECT EX.exam_name, SE.subject_name, 
    (IFNULL(SE.written_mark,0) + IFNULL(SE.oral_mark,0)) AS outOf, 
    (IFNULL(SM.written_mark,0) + IFNULL(SM.oral_mark,0)) AS total ,
    EX.exam_id
    FROM sch_student_mark AS SM  
    INNER JOIN sch_exam_subjects AS SE ON SE.exam_sub_id=SM.exam_sub_id 
    INNER JOIN sch_exams AS EX ON EX.exam_id=SE.exam_id 
    WHERE SM.gr_num='".$gr_no."' AND SE.exam_id IN ({$exams_id}) 
    order by SE.subject_name,SE.`exam_sub_id` ";
//}



//$result_query="SELECT EX.exam_name,SE.subject_name,(SE.written_mark+SE.oral_mark) AS outOf,(SM.written_mark +SM.oral_mark) AS total 
//                        FROM sch_student_mark AS SM  INNER JOIN sch_exam_subjects AS SE ON SE.exam_sub_id=SM.exam_sub_id INNER JOIN sch_exams AS EX ON EX.exam_id=SE.exam_id 
//                        WHERE SM.gr_num='".$gr_no."' AND SE.exam_id IN ($exams_id) order by SE.subject_name,SE.`exam_sub_id`";


$res=mysqli_query($con,$result_query);
$exam_data=mysqli_query($con,$result_query);

//////////***** exam Name ******/////////

$examName_arr=array();
if($res->num_rows > 0)
{
    //loop through student marks  
    while($row=mysqli_fetch_row($res)) 
    {
    $chk_examName=(string)array_search($row[0],$examName_arr); //chk exam Name in array
    if($chk_examName=="")
    {
        $examName_arr[]=$row[0];
        $exam_name_header .='<th style="padding: 3px; text-align: center;">'.$row[0].'</th>';
    }
}
}



///////********** subject mark exam Wise ********////////////

$examSub_arr=array();
//$exam_sub_marks=array();
$exam_inc=0;
$examName_count=count($examName_arr);

if($res->num_rows > 0)
{
    //loop through student marks  
    while($row=mysqli_fetch_row($exam_data)) 
    {
        $chk_subName=(string)array_search($row[1],$examSub_arr); //chk exam Name in array

        if($chk_subName=="")
        {


            //chk sub Name Array

            $count=count($examSub_arr);
            if($count !=0)
            {
                if($exam_inc != $examName_count)
                {
                // blank fileds
                    while($exam_inc < $examName_count)
                    {
                    //put blank filed  
                        $subject_and_mark .= '<td>--</td>'; // print sub Name
                        $exam_inc ++;
                    }
                    
                    $subject_and_mark .='</tr>';
                    $exam_inc=0;
                }
                else
                {
                    $exam_inc=0; //reset to zero
                    $subject_and_mark .='</tr>';
                }
                
            } //count exam sub array 
            
            
            
            $examSub_arr[]=$row[1];
            
           // get the exam index in array 
            
            $subject_and_mark .= '<tr style="height: 30px;">';
            $subject_and_mark .= '<td>'.$row[1].'</td>'; // print sub Name
            
            
            $index=array_search($row[0],$examName_arr);
            

            if($exam_inc==$index) // chk 0==1 true what is the problem 
            {
                $outofmark=(float)$row[2]; 
                $mark_get=(float)$row[3];
                
                // total_mark set and total Out of mark
                $final_total_mark +=$mark_get;
                $final_outOf_mark +=$outofmark;
                
                
                $per=(($mark_get)/($outofmark))*100;
                
                if($res_status !='fail')
                {
                    if($per <35)
                    {
                        $res_status ='fail';
                    }
                }
                
                $grade=getGrade($per);
                $subject_and_mark .= '<td>'.$grade.'</td>'; // print sub Name

                // print exam Name and Marks
                $exam_inc++;
            }
            else
            {
                while($exam_inc < $index )
                {
                    //blank fileds
                    $subject_and_mark .= '<td>---</td>'; 
                    $exam_inc++;
                }
                
                // put that index mark and inc $exam_inc
                $outofmark=(float)$row[2]; 
                $mark_get=(float)$row[3];
                
                // total_mark set and total Out of mark
                $final_total_mark +=$mark_get;
                $final_outOf_mark +=$outofmark;
                
                
                $per=(($mark_get)/($outofmark))*100;
                
                if($res_status !='fail')
                {
                    if($per <35)
                    {
                        $res_status ='fail';
                    }
                }
                
                $grade=getGrade($per);
                $subject_and_mark .= '<td>'.$grade.'</td>'; // print sub Name
                
                // print exam Name and Marks
                $exam_inc++;
                
                // print exam 
            }
            
        }
        else
        {
            $index=array_search($row[0],$examName_arr);
            if($exam_inc==$index)
            {
                // print exam Name and Marks
                $outofmark=(float)$row[2]; 
                $mark_get=(float)$row[3];
                
                // total_mark set and total Out of mark
                $final_total_mark +=$mark_get;
                $final_outOf_mark +=$outofmark;
                
                
                $per=(($mark_get)/($outofmark))*100;
                
                if($res_status !='fail')
                {
                    if($per <35)
                    {
                        $res_status ='fail';
                    }
                }
                
                $grade=getGrade($per);
                $subject_and_mark .= '<td>'.$grade.'</td>'; // print sub Name
                
                $exam_inc++;
            }
            else
            {
                while($exam_inc < $index )
                {
                    //blank fileds
                    $subject_and_mark .= '<td>---</td>'; 
                    $exam_inc++;
                }
                
                $outofmark=(float)$row[2]; 
                $mark_get=(float)$row[3];
                
                // total_mark set and total Out of mark
                $final_total_mark +=$mark_get;
                $final_outOf_mark +=$outofmark;
                
                
                $per=(($mark_get)/($outofmark))*100;
                
                if($res_status !='fail')
                {
                    if($per <35)
                    {
                        $res_status ='fail';
                    }
                }
                
                $grade=getGrade($per);
                $subject_and_mark .= '<td>'.$grade.'</td>'; // print sub Name
                
                // print exam Name and Marks
                $exam_inc++;
                
                
            }
            

        }
        



    }
}





//set final Grade 
$final_per=($final_total_mark/$final_outOf_mark)*100;
$final_grade =getGrade($final_per);


///////////////**********blank fileds for subject 12- subject count  **********///////////

$blank_field_sub='';
$subArrCount=count($examSub_arr);
while($subArrCount < 12)
{
    $row_count=0;
    $blank_field_sub.= '<tr>';
    
    while($row_count <= $exam_count )
    {
        $blank_field_sub.=  '<td>&nbsp;</td>';
        $row_count++;
    }
    $blank_field_sub.=  '</tr>';
    $subArrCount++;
}


?>    



<div class="container" style="    width: 1020px;    margin-top: 25px;    padding: 10px;    border: 5px double #607D8B;">
    <div class="row-fluid">
        <div class="span2 pull-left" style="">

            <img src="data:image/jpeg;base64,<?php echo $header[1] ?>" alt="<?php echo $header[0] ?>" style="width:110px;height:100px" />

        </div>
        <div class="span9" style="margin-left: 0px;">
            <h4 style="color: #000; text-align: center; margin-bottom: 10px; margin-top: 0px;"><?php echo $header[0] ?></h4>
            <h4 style="color: #2224BE; text-align: center; margin-bottom: 10px; margin-top: 0px; font-size: 24px;"></h4>
            <p class="" style="color: #000; text-align: center; font-size: 15px; margin-bottom: 5px;">NALLASOPARA-401209 DEISTRICT PALGHAR </p>
            <!-- <p class="" style="color: #FA0215; text-align:center;font-size: 15px;">PPROGRESS REPORT OF THE ACADEMIC YEAR <?php echo $Last_year=(date('Y')-1); ?>- <?php echo $Today_year=date('y'); ?> </p>-->
            <p class="" style="color: #FA0215; text-align: center; font-size: 18px;">PPROGRESS REPORT FOR  <?PHP echo implode(',',$examName_arr) ?> OF THE ACADEMIC YEAR 2015-16</p>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="span1" style="width: 86px; margin-left: 20px; width: 100px;">
                <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-right-width: 0px; border-radius: 0px; border-collapse: collapse">
                    <thead>
                        <tr>
                            <th style="padding: 0px; text-align: center; height: 30px;">STD
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 0px; text-align: center; height: 30px;"><?php
                                $std_index=$studentDetails['Std'];
                                echo $studentDetails['Std'];
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="span1" style="margin-left: 0px; width: 100px;">
                <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-right-width: 0px; border-radius: 0px; border-collapse: collapse">
                    <thead>
                        <tr>
                            <th style="padding: 0px; text-align: center; height: 30px;">DIV
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 0px; text-align: center; height: 30px;"><?php echo $studentDetails['Section'];?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="span2" style="margin-left: 0px; width: 100px;">
                <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-right-width: 0px; border-radius: 0px; border-collapse: collapse">
                    <thead>
                        <tr>
                            <th style="padding: 0px; text-align: center; height: 30px;">ROLL NO
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 0px; text-align: center; height: 30px;"><?php echo  $studentDetails['roll_no'] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="span2" style="margin-left: 0px; width: 100px;">
                <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-right-width: 0px; border-radius: 0px; border-collapse: collapse">
                    <thead>
                        <tr>
                            <th style="padding: 0px; text-align: center; height: 30px;">G.R. NO
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 0px; text-align: center; height: 30px;"><?php echo $gr_no ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="span6" style="margin-left: 0px; width: 460px;">
                <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-right-width: 0px; border-radius: 0px; border-collapse: collapse">
                    <thead>
                        <tr>
                            <th style="padding: 0px; text-align: center; height: 30px;">STUDENT NAME
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 0px; text-align: center; height: 30px;"><?php echo $studentDetails['Name'] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="span2" style="margin-left: 0px; width: 135px;">
                <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-radius: 0px; border-collapse: collapse">
                    <thead>
                        <tr>
                            <th style="padding: 0px; text-align: center; height: 30px;">BIRTH DATE
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 0px; text-align: center; height: 30px;"><?php echo $studentDetails['DOB'] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row-fluid" style="font-size: 15px; margin-top: 0px;">
        <div class="span5" style="margin-left: 20px;">
            <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-radius: 0px; border-collapse: collapse; border-right-width: 0px;">
                <thead>
                    <tr style="height: 31px;">
                        <th style="padding:3px;">SUBJECTS</th>
                        <?php echo $exam_name_header; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    echo $subject_and_mark;
                    echo $blank_field_sub;
                    ?>


                </tbody>
            </table>
        </div>
        <div class="span5" style="margin-left: 0px; border-right-width: 0px; width: 345px;">
            <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-radius: 0px; border-collapse: collapse; border-right-width: 0px;">
                <thead>
                    <tr style="height: 31px;">
                        <th style="padding: 3px; text-align: center;">DESCRIPTION NOTATION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="height: 31px;">
                        <td style="padding: 3px; text-align: center;">REMARKABLE PROGRESS</td>
                    </tr>
                    <tr style="height: 31px;">
                        <td style="padding: 3px; text-align: center;"></td>
                    </tr>
                    <tr style="height: 31px;">
                        <td style="padding: 3px; text-align: center;"></td>
                    </tr>
                    <tr style="height: 31px;">
                        <td style="padding: 3px; text-align: center;"></td>
                    </tr>
                    <tr style="height: 31px;">
                        <td style="padding: 3px; text-align: center;">INTEREST/HOBBIES</td>
                    </tr>
                    <tr style="height: 31px;">
                        <td style="padding: 3px; text-align: center;"></td>
                    </tr>
                    <tr style="height: 31px;">
                        <td style="padding: 3px; text-align: center;"></td>
                    </tr>
                    <tr style="height: 31px;">
                        <td style="padding: 3px; text-align: center;"></td>
                    </tr>
                    <tr style="height: 31px;">
                        <td style="padding: 3px; text-align: center;">IMPROVEMENT NEEDED</td>
                    </tr>
                    <tr style="height: 31px;">
                        <td style="padding: 3px; text-align: center;"></td>
                    </tr>
                    <tr style="height: 31px;">
                        <td style="padding: 3px; text-align: center;"></td>
                    </tr>
                    <tr style="height: 31px;">
                        <td style="padding: 3px; text-align: center;"></td>
                    </tr>
                    


                </tbody>
            </table>
        </div>
        <div class="span3" style="margin-left: 0px;">
            <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; text-align: center; border-radius: 0px; border-collapse: collapse">
                <thead>
                    <tr style="height: 31px;">
                        <th colspan="2" style="padding: 3px; text-align: center;">ATTENDANCE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="height: 31px;">
                        <th style="padding: 3px; text-align: center;">MONTHS</th>
                        <th style="padding: 3px; text-align: center;">ABSENT DAYS</th>
                    </tr>
                    <?php 
                    $MONTH_ARR   = array( 'Jun' => 30, 'Jul' => 31, 'Aug' => 31, 'Sep' => 30, 'Oct' => 31, 'Nov' => 30, 'Dec' => 31, 'Jan' => 31, 
                      'Feb' => $DAYS_IN_FEB , 'Mar' => 31 , 'Apr' => 30, 'May' => 31 );

                    $YEAR =  date('Y');
$_CURRENT_MON =  date('n') ; // 1-12 
$_SESSION_START_YR =   $_CURRENT_MON < 6 ? $YEAR : $YEAR + 1 ;
$DAYS_IN_FEB = ( ($_SESSION_START_YR % 4 == 0) && ($_SESSION_START_YR % 100 != 0) || ($_SESSION_START_YR % 400 == 0 ) ) ? "29" : "28";
$MONTH_ARR['Feb'] = $DAYS_IN_FEB;


$ABSENT_IN_MONTH_ARR = array();


         /// GET ABSENT STUDENT MONTH COUNTS  /// 
$ATT_QUERY = mysqli_query($con ," 
  SELECT DATE_FORMAT(ST.`absent_date`,'%b')  AS 'month_name' , COUNT(ST.`grNum`) AS 'absent_count' FROM sch_attendance AS ST 
  WHERE ST.`grNum`='{$gr_no}'
  GROUP BY DATE_FORMAT(ST.`absent_date`,'%m')
  ORDER BY FIELD(DATE_FORMAT(ST.`absent_date`,'%b') , 'Jun','Jul','Aug','Sep','Oct','Nov','Dec','Jan','Feb','Mar','Apr','May' )
  ")  ;


if($ATT_QUERY && $ATT_QUERY->num_rows > 0){
    while($ATT_DET = mysqli_fetch_assoc($ATT_QUERY)){
      $ABSENT_IN_MONTH_ARR[$ATT_DET['month_name']] = $ATT_DET['absent_count'] ; 
  }
}

foreach($MONTH_ARR AS $_MONTH_NAME => $_DAYS){
    $_ABSENT_IN_MONTH = array_key_exists($_MONTH_NAME,$ABSENT_IN_MONTH_ARR) ?  $ABSENT_IN_MONTH_ARR[$_MONTH_NAME] : 0 ;
    ?>
    <tr style="height: 31px;">
      <td style="padding: 3px; text-align: center;text-transform: uppercase;"><?php echo $_MONTH_NAME?></td>
      <td style="padding: 3px; text-align: center;"><?php echo $_ABSENT_IN_MONTH ; ?></td>
  </tr>
  <?php
}
?>

</tbody>
</table>
</div>
</div>
    <!--<div class="row-fluid" style="font-size: 15px;margin-top: 5px;">
    <div class="span12" style="margin-left: 20px;">-->
        <table class="table table-bordered" style="font-size: 15px; margin-left: 20px; margin-bottom: 5px; text-align: center; width: 996px; border-radius: 0px; border-collapse: collapse">
            <tbody>
                <tr>
                    <td style="text-align: center;">Grade:<?php 
                        echo $final_grade;
                        ?>
                    </td>
                    <td style="text-align: center;">RESULT:<?php 
                     if($res_status=='fail'){
                         echo 'Fail';
                     }else{
                         echo 'Pass';
                     }?></td>
                     <td style="text-align: center;">NEXT CLASS:<?php 
                                                           $index=array_search($std_index, $studentStd);//get the Index of Std 
                                                           if($res_status=='fail'){
                                                            echo  $studentStd[$index];
                                                        }else{
                                                            echo $studentStd[$index+1];
                                                        }?></td>
                                                        <td style="text-align: center;">SCHOOL REOPEN ON:13th JUN</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="row-fluid " style="font-size: 12px;">
                                                <div class="span12">
                                                    <div class="span5" style="margin-left: 20px;">
                                                        <table class="table table-bordered" style="font-size: 11px; margin-bottom: 5px; border-radius: 0px; border-collapse: collapse">
                                                            <tbody>
                                                                <tr style="padding: 3px; text-align: center;">
                                                                    <td style="padding: 3px; text-align: center;">A1</td>
                                                                    <td style="padding: 3px; text-align: center;">91%-100%</td>
                                                                    <td style="padding: 3px; text-align: center;">B2</td>
                                                                    <td style="padding: 3px; text-align: center;">61%-70.99%</td>
                                                                    <td style="padding: 3px; text-align: center;">D</td>
                                                                    <td style="padding: 3px; text-align: center;">33%-20.99%</td>
                                                                </tr>
                                                                <tr style="padding: 3px; text-align: center;">
                                                                    <td style="padding: 3px; text-align: center;">A2</td>
                                                                    <td style="padding: 3px; text-align: center;">81%90.00%</td>
                                                                    <td style="padding: 3px; text-align: center;">C1</td>
                                                                    <td style="padding: 3px; text-align: center;">60.99%</td>
                                                                    <td style="padding: 3px; text-align: center;">E1</td>
                                                                    <td style="padding: 3px; text-align: center;">21%-32.99%</td>
                                                                </tr>
                                                                <tr style="padding: 3px; text-align: center;">
                                                                    <td style="padding: 3px; text-align: center;">B1</td>
                                                                    <td style="padding: 3px; text-align: center;">71%-80.99%</td>
                                                                    <td style="padding: 3px; text-align: center;">C2</td>
                                                                    <td style="padding: 3px; text-align: center;">41%-50.99%</td>
                                                                    <td style="padding: 3px; text-align: center;">E2</td>
                                                                    <td style="padding: 3px; text-align: center;">0%-20.99%</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="span2" style="margin-left: 5px; width: 170px;">
                                                        <table class="table table-bordered" style="font-size: 11px; margin-bottom: 5px; border-radius: 0px; border-collapse: collapse">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="height: 80px; padding: 0px; text-align: center;">
                                                                        <br />
                                                                        &nbsp<br />
                                                                        &nbsp
                                                                        <br />
                                                                        CLASS TEACHER SIGNATURE
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="span2" style="margin-left: 5px; width: 160px;">
                                                        <table class="table table-bordered" style="font-size: 11px; margin-bottom: 5px; border-radius: 0px; border-collapse: collapse">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="height: 80px; padding: 0px; text-align: center;">
                                                                        <br />
                                                                        &nbsp<br />
                                                                        &nbsp
                                                                        <br />
                                                                        H.M.'S SIGNATURE
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="span3" style="margin-left: 5px;">
                                                        <table class="table table-bordered" style="font-size: 11px; margin-bottom: 5px; border-radius: 0px; border-collapse: collapse">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="height: 80px; padding: 0px; text-align: center;">
                                                                        <br />
                                                                        &nbsp<br />
                                                                        &nbsp
                                                                        <br />
                                                                        PARENTS/ GUARDIAN'S SIGNATURE
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        // include('../attach/new_footer_sch.php');
                                        ?>
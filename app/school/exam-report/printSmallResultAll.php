<?php 


// require_once('../../db.php');
    $con = mysqli_connect("localhost","admin","12345","dx2017");
require_once '../../result_function.php';  /**  grade function */

// $gr_no    = $_GET['id'];
$exams_id = rtrim($_GET['examIds'], ","); // get exam Id's 
$_mdm =$_GET['mdm'] ;
$_std =$_GET['std'] ;
$_sec =$_GET['div'] ;

$_GARDE_SUBJECT_ARR = array('Computer','Drawing','Craft','P.T');
$RankKeys = array();
$totalSchoolDays = 200 ;

// $primaryStdArr = array('first','second','third','fourth','fifth','sixth','seventh','eighth') ;


$ROMAN_STD  =  array(
    'nursery'   => 'NURSERY',
    'jr.kg'     => 'JR.KG',
    'junior.kg' => 'JUNIOR.KG',
    'sr.kg'     => 'SR.KG',
    'senior.kg' => 'SENIOR.KG',
    'first'     => 'I'    ,
    'second'    => 'II'   ,
    'third'     => 'III'  ,
    'fourth'    => 'IV'   ,
    'fifth'     => 'V'    ,
    'sixth'     => 'VI'   ,
    'seventh'   => 'VII'  ,
    'eighth'    => 'VIII' ,
    'ninth'     => 'IX'   ,
    'tenth'     => 'X'    ,
    );



// Rank Function 

function getRank($grNum)
{
    global $exams_id;
    global $con;
    global $RankKeys;
    global $primaryStdArr;
    global $_std;

    if(count($RankKeys)){
       $rankArr = array_keys($RankKeys,$grNum) ; 
       $rank = $rankArr[0] + 1 ; 
       return $rank ;
   }

//    if(in_array($_std,$primaryStdArr)){
//     $query = mysqli_query($con , " SELECT US.`gr_num` ,  
//         (IFNULL(SM.fmt_daily_observation,0)+IFNULL(SM.fmt_oral_work,0)+IFNULL(SM.fmt_practical_experiment,0)+IFNULL(SM.fmt_activity,0)+
//         IFNULL(SM.fmt_project,0)+IFNULL(SM.fmt_test_open_book,0)+IFNULL(SM.fmt_home_class_work,0)+IFNULL(SM.fmt_other,0)+IFNULL(SM.smt_oral,0)+ IFNULL(SM.smt_practical,0)+
//         IFNULL(SM.smt_written,0)) / (IFNULL(ES.fmt_daily_observation,0)+IFNULL(ES.fmt_oral_work,0)+IFNULL(ES.fmt_practical_experiment,0)+IFNULL(ES.fmt_activity,0)+
//         IFNULL(ES.fmt_project,0)+IFNULL(ES.fmt_test_open_book,0)+IFNULL(ES.fmt_home_class_work,0)+IFNULL(ES.fmt_other,0)+(IFNULL(ES.smt_oral,0)+ IFNULL(ES.smt_practical,0)+ 
//         IFNULL(ES.smt_written,0)) )*100 AS 'per'
//         FROM sch_exams AS SE 
//         INNER JOIN sch_exam_subjects AS ES ON ES.`exam_id`=SE.`exam_id`
//         INNER JOIN `user_sch` AS US ON US.Medium=SE.mdm AND US.Std = SE.std AND US.Section=SE.sec
//         LEFT JOIN sch_student_mark AS SM ON SM.`exam_sub_id`=ES.`exam_sub_id` AND US.`Gr_num`=SM.`gr_num`
//         WHERE SE.`exam_id` IN($exams_id) 
//         GROUP BY US.`gr_num`  " ) ;
// }else{
    $query = mysqli_query($con , " SELECT US.`gr_num` ,  
        (SUM(IFNULL(SM.`written_mark`,0)+IFNULL(SM.`oral_mark`,0)) / SUM(ES.`written_mark`+ES.`oral_mark`))*100 AS 'per' 
        FROM sch_exams AS SE 
        INNER JOIN sch_exam_subjects AS ES ON ES.`exam_id`=SE.`exam_id`
        INNER JOIN `user_sch` AS US ON US.Medium=SE.mdm AND US.Std = SE.std AND US.Section=SE.sec
        LEFT JOIN sch_student_mark AS SM ON SM.`exam_sub_id`=ES.`exam_sub_id` AND US.`Gr_num`=SM.`gr_num`
        WHERE SE.`exam_id` IN($exams_id) 
        GROUP BY US.`gr_num`  " ) ;
// }

$stuPer = array();
if($query && $query->num_rows > 0){
    while($_data = mysqli_fetch_assoc($query)){
        $stuPer[$_data['gr_num']] =  $_data['per'];    
    }
arsort($stuPer, SORT_NUMERIC); // sort the array in des order 
$RankKeys = array_keys($stuPer); //  get the key in arary 
$rankArr = array_keys($RankKeys,$grNum) ; 
$rank = $rankArr[0] + 1 ; 
return $rank ;
}else{
    return 'Error Occur';
}

}

/** Get Name and Logo Of School */
$institute_details = mysqli_fetch_row(mysqli_query($con,"select name,logo from info "));

/** Get Student Name , roll no and gr num  */
$studentDetails = mysqli_query($con," SELECT US.Name,US.roll_no,SD.DOB ,US.Std,US.Section , US.Medium , US.Gr_num , US.Enroll FROM user_sch AS US  
    INNER JOIN  sch_details AS SD ON SD.Gr_num=US.Gr_num WHERE US.Medium = '{$_mdm}' AND US.Std = '{$_std}'  AND US.Section='{$_sec}' ORDER BY US.roll_no ");



if($_mdm == 'English') {
    $subjects = " 'English Reading','English Writing','English Dictation','English Rhymes','English Story','English Poem','Rhyme','english','Marathi','Marathi Poem','Hindi Poem','Hindi','Algebra','Geometory','Maths (O)','Maths','Story','Conversation','EVS','EVS I','EVS II','Science','Science I','Science II','Social Studies','History / political science','History / Civics','Geography','Geography / Economics','Computer','G.K','S.S','ICT','PD','PT','Drawing','Craft','Work Experience' ";

} else {
    $subjects = " 'English Reading','English Writing','English Dictation','English Rhymes','English Story','English Poem','Rhyme','english','Marathi','Marathi Poem','Hindi Poem','Hindi','Algebra','Geometory','Maths (O)','Maths','Story','Conversation','EVS','EVS I','EVS II','Science','Science I','Science II','Social Studies','History / political science','History / Civics','Geography','Geography / Economics','Computer','G.K','S.S','ICT','PD','PT','Drawing','Craft','Work Experience' ";
}




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EXAM RESULT PRINT</title>
</head>

<style type="text/css">
    *{ padding: 0; margin: 0; font-family: arial; }
    div.row { height: auto !important; }
    .row:after {content: " "; display: block; clear: both; }
    .col {float: left; padding-left: 15px; padding-right: 15px; min-height: 1px; }

    .md1 {width: 8.333333333%; }
    .md2 {width: 16.66666667%; }
    .md3 {width: 25%; }
    .md4 {width: 33.33333333%; }
    .md5 {width: 41.66666667%; }
    .md6 {width: 50%; }
    .md7 {width: 58.33333333%; }
    .md8 {width: 66.66666667%; }
    .md9 {width: 75%; }
    .md10 {width: 83.33333333%; }
    .md11 {width: 91.66666667%; }
    .md12 {width: 100%; }

    table{ border-collapse: collapse; }
    table tr td{ padding:3px 1px; }

    table{ border-collapse: collapse; }
    table tr td{ padding:3px 1px; }

    .result-container{
        width: 43%;
        text-align:center;
        margin:5px auto;
        padding: 5px 0 ;
        border: 7px solid #2c5364;
        border-style: double;
        box-shadow: 0 0 3px #2c5364;
        margin-top: 0;
        background:url('../../img/6.png') no-repeat center 165px;

    }

    .school-details{margin-top: 0; }

    /***** STUDENT DETAILS ******/
    .student-details-blk {width: 96%; margin:auto;margin-top: 10px; }
    .stu-det-table { width: 100%; }
    /*#stu-det-table tr td{border-bottom: 1px solid #ccc; padding: 3px 1px; }*/
    .stu-det-table tr:nth-child(1) td{ border-bottom: 1px solid #ccc; padding: 3px 1px; font-weight: 600;color:#2c5364;font-variant: small-caps;background-color:#f7f3f3; font-size: 14px; }
    
    .exam-details-blk{width: 96%; margin: auto;min-height: 315px; }
    .exam-details-table {width: 100%; }
    .exam-details-table tr td{border-bottom: 1px solid #ccc; }
    .exam-details-table tr:nth-child(1) td{ border-bottom: 1px solid #ccc; padding: 3px 1px; font-weight: 600;color:#2c5364;font-variant: small-caps;background-color:#f7f3f3;font-size: 14px;}
    


    .stu-rank-blk{ width: 96%; margin: auto;margin-top: 22px; }
    .stu-rank-table {width: 100%; }
    .stu-rank-table tr td{ border-bottom: 1px solid #ccc; padding: 3px 1px; font-weight: 600;color:#2c5364;font-variant: small-caps;background-color:#f7f3f3; font-size: 14px;}
    .stu-rank-table tr td span{ font-weight: normal; }
    tr.result-final{    border: 2px solid #90a5af; border-left: 0; border-right: 0; font-weight: 900;color:#2c5364;} 


    p.student-remark { text-align: left; background-color: #f7f3f3; width: 95%; font-size: 14px; margin: auto; margin-top: 4px;
        padding: 2px; color: #2c5364; font-weight: 600; font-variant: small-caps; border-bottom: 1px solid #ccc; }

   /* #exam-name{
        text-decoration: underline;
    }  */  

    /*PRINT MEDIA CSS HERE */
    @media print {
        .main-container{  page-break-inside: avoid; }
        .result-container{ width: 67% !important; margin-left:45px;}
        .student-details-blk {  width: 96%;}
    }

    @font-face {
        font-family: 'Durwent';
        src: url('../../fonts/Durwent.ttf');
    }

    h2.inst-name{font-family: 'Durwent' !important;    height: 184.832px;}
    h2.inst-name span{font-family: 'Durwent' !important;font-size:22px;}    

</style>

<body>


    <?php 

    while($_DATA = mysqli_fetch_assoc($studentDetails)){

    // STUDENT LOOP 
        $subject_name = "" ;
        $subject_mark  ="" ;
        $subject_grade  ="" ;
        $exam_name = "";
        $_GR_NUM = $_DATA['Gr_num'] ;

        /** GET EXAM DETAILS **/


     //    if(in_array($_std,$primaryStdArr)){

     //     $sql = " SELECT EX.exam_name, SE.subject_name, 

     //     (IFNULL(SE.fmt_daily_observation,0)+IFNULL(SE.fmt_oral_work,0)+IFNULL(SE.fmt_practical_experiment,0)+IFNULL(SE.fmt_activity,0)+
     //     IFNULL(SE.fmt_project,0)+IFNULL(SE.fmt_test_open_book,0)+IFNULL(SE.fmt_home_class_work,0)) AS 'exam_wm',
     //     (IFNULL(SE.smt_oral,0)+ IFNULL(SE.smt_practical,0)+ IFNULL(SE.smt_written,0)) AS 'exam_om',

     //     (IFNULL(SM.fmt_daily_observation,0)+IFNULL(SM.fmt_oral_work,0)+IFNULL(SM.fmt_practical_experiment,0)+IFNULL(SM.fmt_activity,0)+
     //     IFNULL(SM.fmt_project,0)+IFNULL(SM.fmt_test_open_book,0)+IFNULL(SM.fmt_home_class_work,0)) AS 'stu_wm',
     //     (IFNULL(SM.smt_oral,0)+ IFNULL(SM.smt_practical,0)+ IFNULL(SM.smt_written,0)) AS 'stu_om',


     //     (IFNULL(SE.fmt_daily_observation,0)+IFNULL(SE.fmt_oral_work,0)+IFNULL(SE.fmt_practical_experiment,0)+IFNULL(SE.fmt_activity,0)+
     //     IFNULL(SE.fmt_project,0)+IFNULL(SE.fmt_test_open_book,0)+IFNULL(SE.fmt_home_class_work,0)+IFNULL(SE.smt_oral,0)+ 
     //     IFNULL(SE.smt_practical,0)+ IFNULL(SE.smt_written,0)) AS 'exam_mark',

     //     (IFNULL(SM.fmt_daily_observation,0)+IFNULL(SM.fmt_oral_work,0)+IFNULL(SM.fmt_practical_experiment,0)+IFNULL(SM.fmt_activity,0)+
     //     IFNULL(SM.fmt_project,0)+IFNULL(SM.fmt_test_open_book,0)+IFNULL(SM.fmt_home_class_work,0)+IFNULL(SM.smt_oral,0)+ 
     //     IFNULL(SM.smt_practical,0)+ IFNULL(SM.smt_written,0)) AS 'stu_mark'

     //     FROM sch_student_mark AS SM
     //     INNER JOIN sch_exam_subjects AS SE ON SE.exam_sub_id = SM.exam_sub_id
     //     INNER JOIN sch_exams AS EX ON EX.exam_id = SE.exam_id
     //     WHERE SM.gr_num ='{$_GR_NUM}' AND SE.exam_id='{$exams_id}' 
     //     GROUP BY SE.exam_sub_id  ORDER BY FIELD(SE.subject_name , $subjects)  
     //     " ;

     // }else{        
         $sql = " SELECT EX.exam_name, SE.subject_name, 
         SE.written_mark AS  'exam_wm', SE.oral_mark AS  'exam_om',
         SM.written_mark AS  'stu_wm', SM.oral_mark AS  'stu_om' ,
         SUM(SE.written_mark+SE.oral_mark) AS 'exam_mark' ,
         SUM(SM.written_mark+SM.oral_mark)  AS 'stu_mark'
         FROM sch_student_mark AS SM
         INNER JOIN sch_exam_subjects AS SE ON SE.exam_sub_id = SM.exam_sub_id
         INNER JOIN sch_exams AS EX ON EX.exam_id = SE.exam_id
         WHERE SM.gr_num ='{$_GR_NUM}' AND SE.exam_id='{$exams_id}' 
         GROUP BY SE.exam_sub_id  ORDER BY FIELD(SE.subject_name , $subjects)  
         " ;
    // }

     $res =mysqli_query($con,$sql);

    // while ($data =  mysqli_fetch_assoc($res)) {
    //    $exam_name = $data['exam_name'];
    //    $subject_name .= "<td>".$data['subject_name']."</td>" ;
    //    $percentage = (floatval($data['stu_mark']) /floatval($data['exam_mark'])) * 100 ;
    //    $grade = getGrade($percentage);
    //    $subject_mark .= floatval($data['stu_mark']); 
    //    $subject_grade .= "<td>".$grade."</td>" ;
    //}

    ?>

    <section  class="main-container">
        <br>
        <!-- RESULT CONATINER  -->
        <section  class="result-container">
         <header id="school-details">
            <div class="row">
                <div class="col md2">
                    <img src="../../img/school-logo.jpg" class="school-logo" style="    
                    border-radius: 5px;
                    width: 95px;
                    height: 90px;
                    position: relative;
                    " >
                </div>
                <div class="col md8">
                    <span style="font-size: 20px;font-variant: small-caps;    color: #607D8B;
                    font-weight: 600;"> <?= $_INSTITUE_DETAILS['Institute_name']['school'] ?> </span> <br>
                    <span style="font-size: 13px;"> <?= $_INSTITUE_DETAILS['Institue_address']['school'] ?></span> <br><br>
                    <span style="font-size: 11px;    color: #607D8B;">PROGRESS REPORT FOR "<b class="exam-name" style="font-weight: 900;"> </b>" OF THE ACADEMIC YEAR 2016-17 </span>
                </div>
            </div>

        </header>


        <!-- STUDENT -DETAIL BLOCK -->
        <div class="student-details-blk">
         <table class="stu-det-table">
            <tr class="thead">
                <td>Gr No.</td>
                <td>Name Of The Student</td>
                <td>Roll No.</td>
                <td>Std.</td>
                <td>Div.</td>
            </tr>
            <tr>
                <td><?php echo $_DATA['Enroll']; ?></td>
                <td><?php echo ucfirst(strtolower($_DATA['Name'])); ?></td>
                <td><?php echo $_DATA['roll_no']; ?></td>
                <td><?php echo $ROMAN_STD[$_DATA['Std']]; ?></td>
                <td><?php echo $_DATA['Section']; ?></td>
            </tr>
        </table>
    </div>
    <br>

    <!-- EXAM - SUBJECT MARK DETAILS BLOCK -->
    <div class="exam-details-blk">
     <table class="exam-details-table">
        <tr>
            <td style="text-align: left !important; ">&nbsp;&nbsp;&nbsp;Subject</td>
            <td>Total Mark</td>
            <td>Obtained Mark</td>
            <td>Grade</td>
        </tr>

        <?php 

                // $sql = "
                // SELECT EX.exam_name, SE.subject_name, SE.written_mark AS  'exam_wm', SE.oral_mark AS  'exam_om', SM.written_mark AS  'stu_wm', SM.oral_mark AS  'stu_om' , 
                // SUM(SE.written_mark+SE.oral_mark) AS 'exam_mark' , SUM(SM.written_mark+SM.oral_mark)  AS 'stu_mark'  ,
                // IFNULL(ER.progress,'') AS 'progress',IFNULL(ER.hobbies,'') AS 'hobbies',IFNULL(ER.improvement,'') AS 'improvement' ,
                // IFNULL(ER.other,'') AS 'other_remark'
                // FROM sch_student_mark AS SM
                // INNER JOIN sch_exam_subjects AS SE ON SE.exam_sub_id = SM.exam_sub_id
                // INNER JOIN sch_exams AS EX ON EX.exam_id = SE.exam_id
                // LEFT JOIN sch_exam_remark AS ER ON ER.exam_id =  SE.exam_id AND ER.gr_num =  SM.gr_num
                // WHERE SM.gr_num ='{$_GR_NUM}' AND SE.exam_id='{$exams_id}' GROUP BY SE.exam_sub_id  ORDER BY FIELD(SE.subject_name , $subjects) " ;

        //$sql = "
        //SELECT EX.exam_name, SE.subject_name, SE.written_mark AS  'exam_wm', SE.oral_mark AS  'exam_om', SM.written_mark AS  'stu_wm', SM.oral_mark AS  'stu_om' , 
        //SUM(SE.written_mark+SE.oral_mark) AS 'exam_mark' , SUM(SM.written_mark+SM.oral_mark)  AS 'stu_mark'
        //FROM sch_student_mark AS SM
        //INNER JOIN sch_exam_subjects AS SE ON SE.exam_sub_id = SM.exam_sub_id
        //INNER JOIN sch_exams AS EX ON EX.exam_id = SE.exam_id
        //WHERE SM.gr_num ='{$_GR_NUM}' AND SE.exam_id='{$exams_id}' GROUP BY SE.exam_sub_id  ORDER BY FIELD(SE.subject_name , $subjects) " ;
        //$res =mysqli_query($con,$sql);



        $totalObtainedMarks = 0;
        $totalMarks = 0 ;
        $progressRemark  = '';
        if($res && $res->num_rows > 0){

            while ($data =  mysqli_fetch_assoc($res)) {
                $exam_name = $data['exam_name'];
                $progressRemark = '';//  $data['other_remark'];
                $totalObtainedMarks += floatval($data['stu_mark']);
                $totalMarks +=  floatval($data['exam_mark']);
                $percentage = (floatval($data['stu_mark']) /floatval($data['exam_mark']))*100 ;
                $grade = getGrade($percentage);
                $subjectName = ucfirst(strtolower($data['subject_name']));
                if( strtoupper($data['subject_name']) == 'EVS I' || strtoupper($data['subject_name']) == 'EVS II' || (strlen($data['subject_name']) <= 4) ){
                    $subjectName = strtoupper($data['subject_name']);
                }

                echo sprintf('<tr><td style="color:#2c5364;text-align:left;padding-left:14px;">%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',$subjectName,floatval($data['exam_mark']),floatval($data['stu_mark']),$grade);
            }

            if($totalMarks !=0){
                $finalPercentage  = ($totalObtainedMarks/$totalMarks) * 100;
                $finalGrade       = getGrade($finalPercentage);
            }else{
                $finalPercentage = '0';
                $finalGrade = getGrade(0);
            }

            echo sprintf('<tr class="result-final"><td style="text-align:left;padding-left:14px;font-variant:small-caps;">Total</td>
                <td>%s</td><td>%s</td><td>%s</td></tr>',$totalMarks,$totalObtainedMarks,$finalGrade);

        }else{
            echo '<tr><td colspan="4">No Data Found</td></tr>';
        }


        ?>

    </table>
</div>

<div class="stu-rank-blk" contenteditable>
    <table class="stu-rank-table">
        <tr>
            <td>Rank : <span><?php  echo ($totalMarks != 0 ? getRank($_GR_NUM) : ' -- ' ); ?></span></td> 
            <td>Conduct : <span>Good</span></td>
            <td>Attendance : <span><?php 
                $absentDays = 0 ;
                $attQuery =  mysqli_query($con , " SELECT COUNT(ST.`grNum`) AS 'count' FROM sch_attendance AS ST WHERE ST.`grNum`='{$_GR_NUM}' " ) ;

                if($attQuery && $attQuery->num_rows > 0){
                    $data =  mysqli_fetch_assoc($attQuery);
                    $absentDays = $data['count'];
                }

                $totalStudentPresentDays = $totalSchoolDays - $absentDays;

                echo $totalStudentPresentDays.' / '.$totalSchoolDays ;

                ?></span></td>
            </tr>
        </table>
    </div>

    <P class="student-remark" contenteditable> <b>Remark : </b> <i style="font-weight: 500;text-transform: capitalize;">
        <?php echo (strtolower($progressRemark) == 'other' ? '' : $progressRemark)  ; ?> </i> </P>

        <br>
        <br>


        <!-- SIGN -ECTION  -->
        <div class="sign-blk" style="color:#2c5364;font-weight: 600;font-size:14px;margin-top:15px; ">
            <span style="float:left;padding-left: 7%;"> Class Teacher Sign </span>
            <span> H.M's Sign </span>
            <span style="float:right;padding-right: 7%;"> Parent's / Guardian's Sign </span>
        </div>
    </section>
</section>

<?php } //  student While loop end  ?>

<script type="text/javascript">

    function init(){
        document.querySelectorAll('.exam-name').forEach(function(dom){
            dom.innerHTML  = '<?php echo $exam_name ;?>';
        });
    }

    window.onload = init() ;


</script>

</body>
</html>
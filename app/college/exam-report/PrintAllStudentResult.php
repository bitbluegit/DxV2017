<?php
//include('../attach/printHeader.php');
// include('../../db.php');
    $con = mysqli_connect("localhost","admin","12345","dx2017");
date_default_timezone_set("Asia/Kolkata");
// $primaryStdArr = array('first','second','third','fourth','fifth','sixth','seventh','eighth') ;

?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/index.css" />
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../../css/print.css" />

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

        table th {
            color: #780c0c;
        }

        .table th,
        .table td {
            padding: 5px;
        }

        .table th, .table td {
            line-height: 17px;
        }

        @media print {

            .inst-header {
                /*visibility:hidden;*/
                /*margin-top:10px;*/
            }
        }
    </style>
</head>
<body>

    <!--<div class="row-fluid no-print">
    <div class="span6">

        <button class="btn btn-primary" type="button" id="Back_schResult">Back</button>
        <button class="btn btn-primary" type="button" id="PrintFinalResult">Print</button>
    </div>

</div>-->

    <?php

    $_stu_mdm = $_GET['mdm'];
    $_stu_std = $_GET['std'];
    $_stu_sec=$_GET['div'];

    $english_sub_order="'ENGLISH','MARATHI','HINDI','MATHS','SCIENCE','S.SCIENCE','E.V.S','E.V.S 1','E.V.S 2','COMPUTER','DRAWING','DRAWING & CRAFT','P.T','W. EXPERIANCE'";
    $hindi_sub_order="'HINDI', 'MARATHI','ENGLISH','MATHS','SCIENCE','S.SCIENCE','E.V.S','COMPUTER','DRAWING','P.T','W. EXPERIANCE'";


    /// Get All The Student in mdm,std,sec

    $studentDetails_data=mysqli_query($con,"SELECT US.Gr_num,SD.Enroll,US.Name,US.roll_no ,SD.DOB FROM user_sch AS US 
    INNER JOIN sch_details AS SD ON SD.Gr_num=US.Gr_num
    WHERE US.Medium ='".$_stu_mdm."' AND US.Std='".$_stu_std."' AND US.Section='".$_stu_sec."' ");
    $exam_group_flag=0; // Exam Group Flag



    /// CHECK GROUP EXAM OR SINGLE VIEW EXAM ///
    if($_GET['examgroup'] !="" && isset($_GET['examgroup']) && $_GET['examgroup'] !="undefined"  ){
        $exam_gp=$_GET['examgroup'];
        $exams_str = str_replace('-','',$exam_gp);
        $exams_id =substr($exams_str,0,strlen($exams_str)-1);
        
        $examGroupsArr=explode('-',$exam_gp);
        $examGroups=array_splice($examGroupsArr,1,count($examGroupsArr)-1);
        $exam_group_flag++;
        
    }else{
        if($_GET['examIds'] !=""){
            $exams_id=trim($_GET['examIds'],','); // get exam Id's 
        }
    }

    $exam_count=count(explode(',',$exams_id)); //count exam's 

    /** Get Name and Logo Of School */
    $header=mysqli_fetch_row(mysqli_query($con,"select name,logo from info "));
    /** get  grade function */
    require_once '../../result_function.php';

    $stu_loop_count=0;
    while($studentDetails=mysqli_fetch_assoc($studentDetails_data)){

        $std_index=0;

        $res_status='';
        $final_grade='';

        $gr_no=$studentDetails['Gr_num']; // Student gr_no

        /** Get Student Name , roll no and gr num  */
        //$studentDetails=mysqli_fetch_assoc(mysqli_query($con,"SELECT US.Name,US.roll_no,SD.DOB ,US.Std,US.Section,US.Enroll,US.Medium FROM user_sch AS US  
        //INNER JOIN  sch_details AS SD ON SD.Gr_num=US.Gr_num WHERE US.Gr_num={$gr_no}"));

        $studentStd=array("Mr.dextro","nursery","junior.kg","senior.kg","first","second","third","fourth","fifth","sixth","seventh","eighth","ninth","tenth");
        $std_to_symbol=array("Mr.dextro"=>"Mr.dextro","nursery"=>"nursery","junior.kg"=>"junior.kg","senior.kg"=>"senior.kg",
           "first"=>"I","second"=>"II","third"=>"III","fourth"=>"IV","fifth"=>"V","sixth"=>"VI","seventh"=>"VII","eighth"=>"VIII","ninth"=>"IX","tenth"=>"X");


        /// Subject That Mark Not addded IN total Marks

        $stu_grades_arr=array(); /// store student grades 

        $subs_mark_not_add_to_total=array();
        $garde_sub_names_list = array() ;

        // $get_grade_subjects=mysqli_query($con,"SELECT EG.subjects_names FROM exam_grade_subjects AS EG WHERE EG.mdm='".$_stu_mdm."' AND EG.std='".$_stu_std."' LIMIT 1 ");
        // if($get_grade_subjects && $get_grade_subjects->num_rows > 0){
        //     $garde_sub_names_list=mysqli_fetch_assoc($get_grade_subjects); // store subject name 
        //     $subs_mark_not_add_to_total=explode(',',$garde_sub_names_list['subjects_names']);
        // }



        /** student Mark Section Start **/


        $exam_name_header="";
        $subject_and_mark="";

        $final_total_mark=0;
        $final_outOf_mark=0;


        $exam_gp_total_mark=0;
        $exam_gp_outOf_mark=0;


        $showGpSubjectMarkFlag=0;
        $ShowGpSubjectTitleFlag="";
        $GpSubjectCounter=0;
        $lastExamId="";

        $exam_id_mark_added=array(); // to store each exam_id for each subject mark

        $orders_sub="";
        if($_stu_mdm == 'English'){
            $orders_sub=$english_sub_order ;
        }else{
            $orders_sub=$hindi_sub_order ;
        }
        
        // if(in_array($_stu_std,$primaryStdArr)){
            
        //     $result_query = " SELECT EX.exam_name, SE.subject_name, 

        //  (IFNULL(SE.fmt_daily_observation,0)+IFNULL(SE.fmt_oral_work,0)+IFNULL(SE.fmt_practical_experiment,0)+IFNULL(SE.fmt_activity,0)+
        //  IFNULL(SE.fmt_project,0)+IFNULL(SE.fmt_test_open_book,0)+IFNULL(SE.fmt_home_class_work,0)+IFNULL(SE.fmt_other,0)+IFNULL(SE.smt_oral,0)+ 
        //  IFNULL(SE.smt_practical,0)+ IFNULL(SE.smt_written,0)) AS 'outOf',

        //  (IFNULL(SM.fmt_daily_observation,0)+IFNULL(SM.fmt_oral_work,0)+IFNULL(SM.fmt_practical_experiment,0)+IFNULL(SM.fmt_activity,0)+
        //  IFNULL(SM.fmt_project,0)+IFNULL(SM.fmt_test_open_book,0)+IFNULL(SM.fmt_home_class_work,0)+IFNULL(SM.fmt_other,0)+IFNULL(SM.smt_oral,0)+ 
        //  IFNULL(SM.smt_practical,0)+ IFNULL(SM.smt_written,0)) AS 'total'

        //  FROM sch_student_mark AS SM
        //  INNER JOIN sch_exam_subjects AS SE ON SE.exam_sub_id = SM.exam_sub_id
        //  INNER JOIN sch_exams AS EX ON EX.exam_id = SE.exam_id
        //  WHERE SM.gr_num ='{$gr_no}' AND SE.exam_id='{$exams_id}' 
        //  order by FIELD(SE.subject_name,{$orders_sub}),SE.subject_name,EX.exam_name " ;
            
        // }else{
            $result_query = " SELECT EX.exam_name, SE.subject_name, 
                         (IFNULL(SE.written_mark,0) + IFNULL(SE.oral_mark,0)) AS outOf, 
                         (IFNULL(SM.written_mark,0) + IFNULL(SM.oral_mark,0)) AS total ,
                         EX.exam_id
                         FROM sch_student_mark AS SM  
                         INNER JOIN sch_exam_subjects AS SE ON SE.exam_sub_id=SM.exam_sub_id 
                         INNER JOIN sch_exams AS EX ON EX.exam_id=SE.exam_id 
                         WHERE SM.gr_num='".$gr_no."' AND SE.exam_id IN ({$exams_id}) 
                         order by FIELD(SE.subject_name,{$orders_sub}),SE.subject_name,EX.exam_name ";
       // }
        
        $res=mysqli_query($con,$result_query);
        $exam_data=mysqli_query($con,$result_query);

        $group_exams_heads=array('1 semester','2 semester');

        //////////***** exam Name ******/////////

        $examName_arr=array();
        $examNameAssocArray=array();
        if($res->num_rows > 0)
        {
            //loop through student marks  
            while($row=mysqli_fetch_row($res)) 
            {
                $chk_examName=(string)array_search($row[0],$examName_arr); //chk exam Name in array
                if($chk_examName=="")
                {
                    $examName_arr[]=$row[0];
                    $examNameAssocArray[$row[4]]=$row[0];
                    
                    if($exam_group_flag !=0){
                        /// combine header-with-exams

                        if(in_array($row[0],$group_exams_heads)){
                            $exam_name_header .='<th style="padding: 3px; text-align: center;">'.$row[0].'</th>';
                        }
                    }
                    else{  // Non Group Exam 
                        $exam_name_header .='<th style="padding: 3px; text-align: center;">'.$row[0].'</th>';
                    }
                }
            }
        }

        ///////********** subject mark exam Wise ********////////////

        $examSub_arr=array();
        $stu_subject_mark_array=array();


        //$exam_sub_marks=array();
        $exam_inc=0;
        $examName_count=count($examName_arr); // Exam Names 

        $exam_row_arr=array();
        $join_array_for_grades=array();

        $store_examName=array();

        if($res->num_rows > 0)
        {
            $exam_index=0;
            $counter=0;
            //loop through student marks  
            while($row=mysqli_fetch_row($exam_data)) 
            {
                if(!in_array($row[1],$examSub_arr)){

                    if($counter ==0){
                        $examSub_arr[]=$row[1]; // store Subject Name In Array
                        $exam_row_arr[]=$row[1];// store subject name in array
                        $counter++;
                    }else{
                        if($exam_index != $examName_count){
                            if($exam_index){
                                for($x=$exam_index ; $x < $examName_count ; $x++){
                                    $exam_row_arr[] ='--'; // student obtain mark 
                                    $exam_row_arr[] ='--'; // total mark 
                                    $exam_index++;
                                }
                            }
                        }
                        $stu_subject_mark_array[]=$exam_row_arr;
                        $exam_index=0;
                        $exam_row_arr=array();
                        $examSub_arr[]=$row[1]; // store Subject Name In Array
                        $exam_row_arr[]=$row[1];// store subject name in array
                    }
                }
                
                if($examName_arr[$exam_index]== $row[0]){
                    // Store Exam Marks For all exam for particular subject 
                    $exam_row_arr[] =$row[2];  // total mark 
                    $exam_row_arr[] =$row[3]; // student obtain mark  
                    $store_examName[]=$row[0];
                    
                    
                    
                    $exam_index++;
                }else{
                    // search the index of exam and print the value from index to that exam 
                    $current_exam_index=array_search($row[0],$examName_arr);
                    if($current_exam_index){
                        for($x=$exam_index ; $x < $current_exam_index ; $x++){
                            $exam_row_arr[] ='--'; // student obtain mark 
                            $exam_row_arr[] ='--'; // total mark 
                            $exam_index++;
                        }
                        $exam_row_arr[] =$row[2];  // total mark 
                        $exam_row_arr[] =$row[3]; // student obtain mark 
                        
                        
                        
                        $exam_index++;
                    }
                }
            }
            
            
            // add extra blank filed if index !=exam Count and add Last Subject  into Array
            if($exam_index != $examName_count){
                if($exam_index){
                    for($x=$exam_index ; $x < $examName_count ; $x++){
                        $exam_row_arr[] ='--'; // student obtain mark 
                        $exam_row_arr[] ='--'; // total mark 
                        $exam_index++;
                    }
                }
            }
            
            $stu_subject_mark_array[]=$exam_row_arr;  
            
            
            
            
        }

        $ninth_grade_mark_string ="";

        $stu_mark_result_arr_=array();
        $primary_arr=array();

        foreach($stu_subject_mark_array as $sub_arr_data_){

            //// ==== put garde in bottom of the array ==== /////
            if(in_array($sub_arr_data_[0],$subs_mark_not_add_to_total)){
                $primary_arr[]=$sub_arr_data_;
            }else{
                $stu_mark_result_arr_[]=$sub_arr_data_;
            }
        }

        //$stu_mark_result_arr_=$primary_arr;
        foreach($primary_arr as  $join_array_d ){
            $stu_mark_result_arr_[]=$join_array_d;
        }

        foreach($stu_mark_result_arr_ as $stu_exam_sub_marks){

            $subject_and_mark  .='<tr><td>'.$stu_exam_sub_marks[0].'</td>' ;
            $inc=1;
            $nex_inc=$inc+1;
            // indiviual exam view 
            if($exam_group_flag==0){ 
                for($p=0;$p < $examName_count ;$p++){
                    if($stu_exam_sub_marks[$inc] != '--' &&  $stu_exam_sub_marks[$nex_inc] !='--'){

                        $mark_in_per=($stu_exam_sub_marks[$nex_inc]/$stu_exam_sub_marks[$inc])*100;
                        
                        if(!in_array($stu_exam_sub_marks[0],$subs_mark_not_add_to_total)){
                            $final_total_mark +=$stu_exam_sub_marks[$nex_inc];
                            $final_outOf_mark+=$stu_exam_sub_marks[$inc];
                        }
                        
                        $stu_mark_grade=getGrade($mark_in_per);
                        if($_stu_std=='ninth' || $_stu_std=='Ninth' ||  $_stu_std=='tenth' || $_stu_std=='Tenth'){
                            if(in_array($stu_exam_sub_marks[0],$subs_mark_not_add_to_total)){
                                $result_marks=$stu_mark_grade;
                            }else{
                                $result_marks=$stu_exam_sub_marks[$nex_inc]; 
                            }
                            
                        }else{
                            $result_marks=$stu_mark_grade;
                        }
                        
                        // if(!in_array($stu_exam_sub_marks[0],$stu_grades_arr[$stu_mark_grade])){
                        //     $stu_grades_arr[$stu_mark_grade][]=$stu_exam_sub_marks[0]; // store subject name in grade array 
                        // }


                        $subject_and_mark  .='<td style="text-align:center;">'.$result_marks.'</td>'; 

                    }else{
                        $subject_and_mark  .='<td style="text-align:center;">--</td>';  
                    }

                    $inc=$inc+2;
                    $nex_inc=$inc+1;
                }

            } //// View indiviual exam 
            
            else{

                ///// Group Exam 

                $group_counter=0;
                
                $exam_string_gps=$exam_gp; ///  -2,1,-4,5
                $exam_groups_local=explode('-',$exam_string_gps);
                
                $exam_gp_inc=0;
                foreach($exam_groups_local as $get_gp_exam_id){
                    if($exam_gp_inc==0){
                        $exam_gp_inc++;
                        continue;
                    }else{
                        //// 2 , 1 
                        $e_string=substr($get_gp_exam_id,strlen($get_gp_exam_id)-1,strlen($get_gp_exam_id)-1);
                        if($e_string == ','){
                            $get_gp_exam_id=substr($get_gp_exam_id,0,strlen($get_gp_exam_id)-1);
                        }
                        $get_gp_exam_id_arr=explode(',',$get_gp_exam_id);
                        
                        //// 2 , 1  
                        $sub_gp_obtain_mark=0;
                        $sub_gp_total_mark=0;
                        
                        
                        for($m=0; $m < count($get_gp_exam_id_arr);$m++){
                            $get_the_exam_index_in_arr =  array_search($examNameAssocArray[$get_gp_exam_id_arr[$m]],$examName_arr); 
                            $location_in_arr=0;
                            $next_loc_in_arr=0;
                            if($get_the_exam_index_in_arr !== false){
                                switch($get_the_exam_index_in_arr){
                                    case 0:
                                        $location_in_arr=1;
                                        $next_loc_in_arr=2;
                                        break;
                                    case 1:
                                        $location_in_arr=3;
                                        $next_loc_in_arr=4;
                                        break;
                                    case 2:
                                        $location_in_arr=5;
                                        $next_loc_in_arr=6;
                                        break;
                                    case 3:
                                        $location_in_arr=7;
                                        $next_loc_in_arr=8;
                                        break;
                                }
                            }
                            
                            if($stu_exam_sub_marks[$location_in_arr] != '--' && $stu_exam_sub_marks[$next_loc_in_arr] !='--' ){
                                $sub_gp_obtain_mark += $stu_exam_sub_marks[$next_loc_in_arr];
                                $sub_gp_total_mark += $stu_exam_sub_marks[$location_in_arr];
                                
                                //// added marks to total for those subject not in array
                                if(!in_array($stu_exam_sub_marks[0],$subs_mark_not_add_to_total)){
                                    $final_total_mark += $stu_exam_sub_marks[$next_loc_in_arr];
                                    $final_outOf_mark += $stu_exam_sub_marks[$location_in_arr];
                                }
                            }
                        }
                        
                        /// print marks here 
                        if($sub_gp_total_mark !=0){

                            $mark_in_per =($sub_gp_obtain_mark/$sub_gp_total_mark)*100;
                            $get_grade_for_mark=getGrade($mark_in_per);
                            if($_stu_std=='ninth' || $_stu_std=='Ninth' ||  $_stu_std=='tenth' || $_stu_std=='Tenth'){
                                if(in_array($stu_exam_sub_marks[0],$subs_mark_not_add_to_total)){
                                    $result_marks=$stu_mark_grade;
                                }else{
                                    $result_marks=$sub_gp_obtain_mark; 
                                }
                            }else{
                                $result_marks=$get_grade_for_mark;
                            }
                            if(!in_array($stu_exam_sub_marks[0],$stu_grades_arr[$get_grade_for_mark])){
                                $stu_grades_arr[$get_grade_for_mark][]=$stu_exam_sub_marks[0]; // store subject name in grade array
                            }

                            $subject_and_mark  .='<td style="text-align:center;">'.$result_marks.'</td>'; 
                        }else{
                            $subject_and_mark  .='<td style="text-align:center;">--</td>'; 
                        }


                    }

                }

            }



        } //// Subject wise mark loop end 




        //set final Grade 

        //var_dump($final_outOf_mark,$final_total_mark);



        $final_per=($final_total_mark/$final_outOf_mark)*100;
        $final_grade =getGrade($final_per);


        ///////////////**********blank fileds for subject 12- subject count  **********///////////

        $blank_field_sub='';
        $subArrCount=count($examSub_arr);
        while( $subArrCount < 13 )
        {
            $row_count=0;
            $blank_field_sub.= '<tr>';
            
            
            if($exam_group_flag==0){
                while($row_count <= $exam_count )
                {
                    $blank_field_sub.=  '<td>&nbsp;</td>';
                    $row_count++;
                }
            }else{
                $exam_gp_counts=explode('-',$exam_gp);
                $extra_colmn= count($exam_gp_counts) -1 ;
                while($row_count <= $extra_colmn )
                {
                    $blank_field_sub.=  '<td>&nbsp;</td>';
                    $row_count++;
                }
                
            }
            
            $blank_field_sub.=  '</tr>';
            $subArrCount++;
        }

    ?>


    <br>
    <br>
    <div class="container result_main_container" style="width: 1020px; padding: 30px 20px; border: 5px double #607D8B;">
        <div class="row-fluid inst-header">
            <div class="span2 pull-left" style="">

                <img src="data:image/jpeg;base64,<?php echo $header[1] ?>" alt="<?php echo $header[0] ?>" style="width:110px;height:100px" />

            </div>
            <div class="span9" style="margin-left: 0px;">
                <h4 style="color: #000; text-align: center; margin-bottom: 10px; margin-top: 0px; font-size: 39px; font-family: arial; color: #f00;"><?php echo $header[0] ?></h4>
                <h4 style="color: #2224BE; text-align: center; margin-bottom: 10px; margin-top: 0px; font-size: 24px;"></h4>
                <p class="" style="color: #000; text-align: center; font-size: 15px; margin-bottom: 5px;">&nbsp;</p>
                <p class="" style="color: #FA0215; text-align: center; font-size: 18px;">ANNUAL PROGRESS REPORT OF THE YEAR 2015-2016 </p>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">

                <div class="span1" style="width: 86px; margin-left: 20px; width: 100px;">
                    <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-right-width: 0px; border-radius: 0px; border-collapse: collapse">
                        <tbody>
                            <tr>
                                <td style="padding: 0px; padding-bottom: 5px; text-align: center; height: 25px;">STD </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px; padding-top: 5px; text-align: center; height: 25px;"><?php $std_index=$_stu_std;  echo $std_to_symbol[$_stu_std]; ?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="span1" style="margin-left: 0px; width: 100px;">
                    <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-right-width: 0px; border-radius: 0px; border-collapse: collapse">
                        <tbody>
                            <tr>
                                <td style="padding: 0px; padding-bottom: 5px; text-align: center; height: 25px;">DIV </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px; padding-top: 5px; text-align: center; height: 25px;"><?php echo $_stu_sec;?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="span2" style="margin-left: 0px; width: 100px;">
                    <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-right-width: 0px; border-radius: 0px; border-collapse: collapse">
                        <tbody>
                            <tr>
                                <td style="padding: 0px; padding-bottom: 5px; text-align: center; height: 25px;">ROLL NO </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px; padding-top: 5px; text-align: center; height: 25px;"><?php echo  $studentDetails['roll_no'] ?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="span2" style="margin-left: 0px; width: 100px;">
                    <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-right-width: 0px; border-radius: 0px; border-collapse: collapse">
                        <tbody>
                            <tr>
                                <td style="padding: 0px; padding-bottom: 5px; text-align: center; height: 25px;">Enroll No </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px; padding-top: 5px; text-align: center; height: 25px;"><?php echo $gr_no ?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="span2" style="margin-left: 0px; width: 100px;">
                    <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-right-width: 0px; border-radius: 0px; border-collapse: collapse">
                        <tbody>
                            <tr>
                                <td style="padding: 0px; padding-bottom: 5px; text-align: center; height: 25px;">G.R. NO </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px; padding-top: 5px; text-align: center; height: 25px;"><?php echo $studentDetails['Enroll'] ?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="span4" style="margin-left: 0px; width: 360px;">
                    <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-right-width: 0px; border-radius: 0px; border-collapse: collapse">
                        <tbody>
                            <tr>
                                <td style="padding: 0px; padding-bottom: 5px; text-align: center; height: 25px;">NAME OF STUDENT </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px; padding-top: 5px; text-align: center; height: 25px;"><?php echo $studentDetails['Name'] ?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="span2" style="margin-left: 0px; width: 135px;">
                    <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-radius: 0px; border-collapse: collapse">
                        <tbody>
                            <tr>
                                <td style="padding: 0px; padding-bottom: 5px; text-align: center; height: 25px;">DOB </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px; padding-top: 5px; text-align: center; height: 25px;"><?php if($studentDetails['DOB']!=""){echo   date('d-m-Y',strtotime($studentDetails['DOB'])); }else{echo ''; } ?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row-fluid" style="font-size: 15px; margin-top: 0px;">
            <div class="span5" style="margin-left: 20px;">
                <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-radius: 0px; border-collapse: collapse; border-right-width: 0px;">


                    <tbody>
                        <tr style="height: 28px;">
                            <td style="padding: 3px;">SUBJECTS</td>
                            <?php echo $exam_name_header; ?>
                        </tr>
                        <?php 
        echo $subject_and_mark;
        echo $blank_field_sub;
                        ?>


                    </tbody>
                </table>
            </div>

            <div class="span5" style="margin-left: 0px; border-right-width: 0px; width: 345px;">
                <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; border-radius: 0px; border-collapse: collapse; border-right-width: 0px;">


                    <tbody>
                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center;">DESCRIPTION</td>
                        </tr>
                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center; font-weight: bold;">REMARKABLE PROGRESS</td>
                        </tr>


                        <?php


        $remarkable_improveable_arr=array();

        $remarkable_grade_arrays=array('A1','A2','B1','B2','C1','C2','D','E1','E2');

        $remarkable_counter=0;
        $outer_flag=0;
        foreach ( $remarkable_grade_arrays  as $sub_grades){



            if(isset($stu_grades_arr[$sub_grades]))
            {
                foreach($stu_grades_arr[$sub_grades]  as $stu_obtain_grades){


                    if(in_array($stu_obtain_grades,$remarkable_improveable_arr)){
                        continue;
                    }else{
                        $remarkable_improveable_arr[]=$stu_obtain_grades;
                    }


                        ?>

                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center;" contenteditable="true"><?php echo $stu_obtain_grades;  ?> </td>
                        </tr>
                        <?php  
                    $remarkable_counter++;
                    if($remarkable_counter==2){
                        $outer_flag++;
                        break;
                    }
                }
                if($outer_flag !=0){
                    break;
                }    
            }
        }

                        ?>


                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center;"></td>
                        </tr>
                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center; font-weight: bold;">INTEREST/HOBBIES</td>
                        </tr>
                        <?php

        // present days and month

        $mon_str= mysqli_query($con,"SELECT `gr_num`, `Jun` AS 'June', `July`, `Aug`, `Sep`, `Oct`, `Nov`, `Dec`, `Jan`, `Feb`, `Mar`, `April`, `May`, `interest_hobbies`, `sch_clg_type`, `date` FROM `stu_attendance` att_id WHERE `sch_clg_type`='School' AND `gr_num`='".$gr_no."' ORDER BY  att_id DESC  LIMIT 1 ");

        $stu_att=array();
        if($mon_str && $mon_str->num_rows > 0){
            $stu_att=mysqli_fetch_assoc($mon_str);
        }
        $hobbies=array();
        if(isset($stu_att['interest_hobbies'])){
            $hobbies=explode(',', $stu_att['interest_hobbies']) ;
        }

        for($intrst=0 ; $intrst < 3 ;$intrst++ ){
                        ?>
                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center;" contenteditable="true">
                                <?php  echo (isset($hobbies[$intrst]) ? $hobbies[$intrst] :"") ; ?>
                            </td>
                        </tr>


                        <?php  } ?>


                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center; font-weight: bold;">IMPROVEMENT NEEDED</td>
                        </tr>


                        <?php

        $imporvement_counter=0;
        $outers_flag=0;
        $imporvement_arr=array_reverse($remarkable_grade_arrays);
        foreach ($imporvement_arr  as $subs_grades){
            if(isset($stu_grades_arr[$subs_grades])){
                foreach($stu_grades_arr[$subs_grades] as $stu_obtains_grade){

                    if(in_array($stu_obtains_grade,$remarkable_improveable_arr)){
                        continue;
                    }else{
                        $remarkable_improveable_arr[]=$stu_obtains_grade;
                    }

                        ?>
                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center;" contenteditable="true"><?php echo $stu_obtains_grade;  ?> </td>
                        </tr>
                        <?php  
                    $imporvement_counter++;
                    if($imporvement_counter==2){
                        $outers_flag++;
                        break;
                    }
                }
                if($outers_flag !=0){
                    break;
                }    
            }
        }

                        ?>

                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center;"></td>
                        </tr>
                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center;"></td>
                        </tr>
                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center;"></td>
                        </tr>
                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center;"></td>
                        </tr>
                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center;"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="span3" style="margin-left: 0px;">
                <table class="table table-bordered" style="font-size: 15px; margin-bottom: 5px; text-align: center; border-radius: 0px; border-collapse: collapse">


                    <tbody>
                        <tr style="height: 28px;">
                            <td colspan="2" style="padding: 3px; text-align: center;">ATTENDANCE</td>
                        </tr>
                        <tr style="height: 28px;">
                            <th style="padding: 3px; text-align: center;">MONTHS</th>
                            <th style="padding: 3px; text-align: center;">PRESENT DAYS</th>
                        </tr>

                        <?php

        //$mon_name=array('Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'April', 'May');
        $mon_name=array('June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'April');

        $total_present_days=0;
        foreach($mon_name as $months_names){
                        ?>
                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center;"><?php echo $months_names ?></td>
                            <td style="padding: 3px; text-align: center;" contenteditable="true"><?php

            if(isset($stu_att[$months_names]) !=false) {
                $total_present_days +=(int)$stu_att[$months_names];
                echo $stu_att[$months_names] ;
            }else{
                // echo  date("t", strtotime($months_names));
                echo "0";
            }
                                                                                                 ?>
                            </td>
                        </tr>

                        <?php

        }
                        ?>
                        <tr style="height: 28px;">
                            <td style="padding: 3px; text-align: center; font-weight: bold; font-variant: small-caps;">Total Days</td>
                            <td style="padding: 3px; text-align: center; font-weight: bold;" contenteditable="true"><?php echo $total_present_days;  ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--<div class="row-fluid" style="font-size: 15px;margin-top: 5px;">
    <div class="span12" style="margin-left: 20px;">-->
        <table class="table table-bordered" style="font-size: 15px; margin-left: 20px; margin-bottom: 5px; text-align: center; width: 996px; border-radius: 0px; border-collapse: collapse">
            <tbody>
                <tr style="font-variant: small-caps; font-weight: bold;">
                    <?php  

        if($std=='ninth' || $std=='Ninth' ||  $std=='tenth' || $std=='Tenth'){
                    ?>
                    <td style="text-align: center;">
                        <?php  echo 'Grand Total : ' .$final_total_mark.'/'.$final_outOf_mark ;  ?>

                    </td>
                    <?php }
                    ?>


                    <td style="text-align: center;"><?php 
        if($std=='ninth' || $std=='Ninth' ||  $std=='tenth' || $std=='Tenth'){
            echo 'Percentage:'.round($final_per,2).'%';
        }else{
            echo 'Grade:'.$final_grade;

        }

                                                    ?>
                    </td>
                    <td style="text-align: center;">Result:<?php 

        if(isset($stu_grades_arr['E1'])  || isset($stu_grades_arr['E2'])   ){
            echo 'Fail';
            $res_status='fail';
        }       else{
            echo 'Pass';
            $res_status='pass';
        }                           


                                                           ?></td>
                    <td style="text-align: center;">Next Class:<?php 
        $index=array_search($std_index, $studentStd);//get the Index of Std 
        if($res_status=='fail'){
            echo  ucfirst($studentStd[$index]);
        }else{
            echo ucfirst($studentStd[$index+1]);
        }?></td>
                    <td style="text-align: center;">School Reopens On:13th June</td>
                    <td style="text-align: center;"><?php 

        if($_stu_mdm == 'English'){
            echo 'Issue Date: 29-04-'.date('Y');
        }else{
            echo 'Issue Date: 16-04-'.date('Y');
        }
                                                    ?>


                    </td>
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
                                <td style="padding: 3px; text-align: center;">33%-40.99%</td>
                            </tr>
                            <tr style="padding: 3px; text-align: center;">
                                <td style="padding: 3px; text-align: center;">A2</td>
                                <td style="padding: 3px; text-align: center;">81%-90.00%</td>
                                <td style="padding: 3px; text-align: center;">C1</td>
                                <td style="padding: 3px; text-align: center;">51%-60.99%</td>
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
                <div class="span2" style="margin-left: 5px; width: 190px;">
                    <table class="table table-bordered" style="font-size: 11px; margin-bottom: 5px; border-radius: 0px; border-collapse: collapse">
                        <tbody>
                            <tr>
                                <td style="height: 72px; padding: 0px; text-align: center;">
                                    <br />
                                    &nbsp<br />
                                    &nbsp
                                                                    <br />
                                    CLASS TEACHER'S SIGNATURE
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="span2" style="margin-left: 5px; width: 190px;">
                    <table class="table table-bordered" style="font-size: 11px; margin-bottom: 5px; border-radius: 0px; border-collapse: collapse">
                        <tbody>
                            <tr>
                                <td style="height: 72px; padding: 0px; text-align: center;">
                                    <br />
                                    &nbsp<br />
                                    &nbsp
                                                                    <br />
                                    <!--H.M.'S SIGNATURE-->
                                    PARENT'S SIGNATURE
                                                                    <!-- SIGNATURE-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="span3" style="margin-left: 5px; width: 189px;">
                    <table class="table table-bordered" style="font-size: 11px; margin-bottom: 5px; border-radius: 0px; border-collapse: collapse">
                        <tbody>
                            <tr>
                                <td style="height: 72px; padding: 0px; text-align: center;">
                                    <img src="../../img/sign.png" alt="" />
                                    <br />
                                    H.M.'S SIGNATURE
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
        $stu_loop_count++;
        // if($stu_loop_count==10){
        // break;
        // }

        //var_dump($stu_grades_arr);
        //break;
    } // Student foreach loop end 


    // include('../attach/new_footer_sch.php');




?>
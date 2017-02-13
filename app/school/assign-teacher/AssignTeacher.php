<?php 
require_once '../../includes/header.php';
$con = mysqli_connect("localhost","admin","12345","dx2017");

//include('../attach/header_sch.php'); ?>

<!-- Import Css  -->
<!-- <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min3.css" > -->

<style type="text/css">
    
    
    /* Responsive Css */

    div.span-right { width:100%;} 
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

    table {border-collapse: collapse; overflow-x: auto; }
    th {font-weight: 700; font-size: 1.4rem; }
    th, td {text-align: left; border-bottom: 1px solid #e1e1e1; padding: 0.6rem 0.9rem; }


    /******************************************
    ***** Assign Teacher Css Start ***********
    *****************************************/

    section.container{ margin-top: 10px; min-height:600px; }

    

    /* view - picker like assign teacher or view teacher */
/*  .view-picker {margin-top: 20px; width: 29%; margin: 10px auto; line-height: 30px; border: 1px solid #ccc; font-variant: small-caps;
        font-weight: 600; font-family: arial; font-size: 15px; }
*/
        /*.view-picker span{display: inline-block; width: 48.999999%; }*/
        /*.view-picker span:hover  , .selected{background-color: #607D8B; color: #fff; cursor: pointer; }*/
        .exam-heading{background-color: #607D8B; padding: 10px; font-variant: small-caps; font-weight: 600; color: #fff; text-decoration: underline; }


        /* Heading TXT */
        p.heading{ background-color: #607D8B; padding: 10px; font-variant: small-caps; font-weight: 600; color: #fff; text-decoration: underline; } 

        form label { font-variant: small-caps; font-weight: 600; }


        #assign-sub-table-block { width: 70%; margin-left: 15%; }
        #assign-sub-table-block table { width: 100%; border:1px solid #ccc; }
        #assign-sub-table-block table caption { font-variant: small-caps;text-align: center; color;#ccc;font-weight: 600;
            font-size: 20px;text-decoration: underline; }

            #assign-sub-table-block table caption span { border: 1px solid #ccc; padding: 7px 52px 0; 
                background-color: #f3f3f3; border-bottom: none; }

                #assign-sub-table-block table thead  { background-color: #f6f6f6; }
                #assign-sub-table-block table tr th   { text-align: center;font-variant: small-caps; }
                #assign-sub-table-block table tr td  { text-align: center;}

                #assign-sub-table-block table tr td input {width: 60%; padding: 3px 5px; border: 1px solid #ccc; 
                    font-size: 16px; color: #555; }

                    .submit-btn { width: 76px; background-color: #27566d; border: none; margin-left: -4px; font-size: 15px;
                        font-variant: small-caps; color: #fff; }
                        .submit-btn:hover { background-color: #607D8B;}

                        .display-none{ display: none !important; }


                        /*VIEW ASSSIGN TEACHER */
                        
                        .view-assign-teacher-data-block{ width: 70%; margin-left: 15%; }

                        .view-assign-teacher-section ul { margin: 5px 2px; padding: 5px;  border : 1px solid #fff; font-size: 14px;}
                        .view-assign-teacher-section ul:hover { cursor: pointer; border:1px solid #607D8B;}
                        /*.view-assign-teacher-section ul:hover { cursor: pointer; color:#607D8B;}*/
                        .view-assign-teacher-section ul:nth-child(2n+1) { background-color: #eceaea; }
                        .view-assign-teacher-section ul.ul-head { background-color: #ccc; font-variant: small-caps;  background-color: #eceaea;font-weight: 600;}
                        .view-assign-teacher-section ul.ul-head:hover { cursor: normal; border:1px solid #fff;}
                        /*.view-assign-teacher-section ul.ul-head:hover { cursor: normal; color:#000;}*/
                        
                        .view-assign-teacher-section ul li { display: inline-block;  padding: 2px 5px; margin: 2px 5px; width: 10%; vertical-align: bottom;  }
                        .view-assign-teacher-section ul li:nth-child(3) { width: 5%; }
                        .view-assign-teacher-section ul li:nth-child(4) { width: 50%; }
                        .view-assign-teacher-section ul li:nth-child(5) { width: 5%; }



                        /*div.exam-block { border:1px solid #ccc; }*/
                        ul div.exam-det-block table { width: 100%; border:1px solid #ccc; margin-top: 10px; }
                        ul div.exam-det-block table td ,th { text-align: center; }
                        ul div.exam-det-block table thead tr th { font-variant: small-caps; }

                    </style>


                    <!-- span-right width 80% -->
                    <div class="span-right" >


                        <section class="container">

                            <!-- <div class="view-picker"> <span class="selected"> Assign Teacher </span>  <span> View Teacher </span> </div> -->


                            <!-- ********************************************************
                            ********************** Assign Exam Subject   **************
                            ******************************************************** -->
                            
                            <section class="assign-teacher-section">
                                <p class="heading"> Assign Teacher </p>

                                <!-- create exam form start -->
                                <form id="create-exam-from" method="post" action="#" >

                                    <!-- row start   -->
                                    <div class="row">

                                        <!-- select medium -->
                                        <div class="col  m12 l3">
                                            <label for="exam-mdm"> Medium </label> <br>
                                            <select id="exam-mdm" class="full-width" name="exam-mdm" required="required" >
                                                <option value="English">English</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="Marathi">Marathi</option>
                                            </select>                       
                                        </div>

                                        <!-- select standard -->
                                         <div class="col  m12 l3"> 
                                            <label for="exam-std"> Standard </label> <br> 
                                            <select id="exam-std" name="exam-std" class="full-width"  onchange="getExamSection(this)"  required="required"> 
                                                <option value="default">Select One</option>
                                                <option value="nursery">Nursery</option>
                                                <option value="junior.kg">jr.kg</option>
                                                <option value="senior.kg">sr.kg</option>
                                                <option value="first">First</option>
                                                <option value="second">Second</option>
                                                <option value="third">Third</option>
                                                <option value="fourth">Fourth</option>
                                                <option value="fifth">Fifth</option>
                                                <option value="sixth">Sixth</option>
                                                <option value="seventh">Seventh</option>
                                                <option value="eighth">Eighth</option>
                                                <option value="ninth">Ninth</option>
                                                <option value="tenth">Tenth</option>
                                                <option value="Mr.dextro">Mr.dextro</option>
                                            </select>   
                                        </div>

                                        <!-- Select Exam section  -->
                                         <div class="col  m12 l3">
                                            <label for="exam-div"> Div </label> <br> 
                                            <select name="exam-div" class="full-width" id="exam-div"  onchange="getExamName(this)" >
                                                <option value="default">Select One</option>
                                            </select>
                                        </div>

                                        <!-- Select Exam Name -->
                                         <div class="col  m12 l3"> 
                                            <label for="exam-name"> Exam Name </label> <br> 
                                            <select name="exam-name" class="full-width" id="exam-name" onchange="getExamSubject(this)" >
                                                <option value="default">Select One</option>
                                            </select>
                                        </div>

                                    </div> <!-- row-end -->
                                </form> <!-- create exam form end -->

                                <section  id="assign-sub-table-block" class="display-none">
                                    <table>
                                        <caption><span>Assign Teachers</span></caption>
                                        <thead>
                                            <tr>
                                                <th>Subejct Name</th>
                                                <th>Teacher Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="exam-subject-det">

                                        </tbody>
                                        <tfoot>
                                            <tr><td colspan="2"> <button type="button" class="submit-btn" onclick="setAssignTeacher()">Submit</button></td></tr>
                                        </tfoot>
                                    </table>
                                </section> <!-- assign-sub-table-block -->


                                <!-- Get The Teacher List  -->
                                <datalist id="teacher-list">
                                    <?php 
                                    $sql = mysqli_query($con ," SELECT AD.`unique_id`, AD.`Name` FROM admin_sch AD WHERE AD.`type` = 'teacher' ORDER BY AD.`Name` " );
                                    if($sql && $sql->num_rows > 0){
                                        while( $teacher = mysqli_fetch_assoc($sql)) {
                                            echo sprintf('<option value="%s ~ %s">',$teacher['unique_id'] ,$teacher['Name']);
                                        }
                                    }

                                    ?>
                                </datalist>
                            </section> <!-- Assign Teacher Section End -->


                            <!-- ********************************************************
                            ********************** View Assign Exam Subject *************
                            ******************************************************** -->                            

                            <?php
                            $examDetTemplate = '';

                            $getExamForClassQuery = mysqli_query($con," SELECT   SE.`mdm` , SE.`std` , SE.`sec` ,  SE.`exam_name`,SE.`exam_id` 
                                FROM sch_exams SE
                                ORDER BY FIELD(SE.`mdm`,'English','Hindi','Marathi') , 
                                FIELD(SE.`std`,'nursery', 'jr.kg','junior.kg','sr.kg','senior.kg','first','second','third','fourth','fifth',
                                'sixth','seventh','eighth','ninth','tenth','Mr.Dextro','Left'), SE.`sec` ASC 
                                " ) ;   

                            if($getExamForClassQuery && $getExamForClassQuery->num_rows > 0){
                                $examDetTemplate .=  '<ul class="ul-head"><li>Mdm</li> <li>Std</li> <li>Div</li> <li>Exam-Name</li></ul>';
                                while($row = mysqli_fetch_assoc($getExamForClassQuery)){
                                    $exam_id = array_pop($row);
                                    $examDetTemplate .=  sprintf('<ul data-examid="%s" onclick="getTeacherDetails(this)"><li>%s</li></ul>',$exam_id, implode('</li><li>',$row));
                                }
                            }else{
                                echo '<p> No Exam Created Yet ! </p>' ;
                            }


                            ?>



                            <!-- View ASssign  Teacher Template Start  -->
                            <section class="view-assign-teacher-section">
                                <p class="heading"> View Assign Teacher </p>
                                <div class="view-assign-teacher-data-block">
                                    <?php  echo $examDetTemplate ; ?>
                                </div>

                            </section> <!-- view-assign-teacher-section -->

                        </section> <!-- container End -->
                    </div> <!-- span-right -->


                    <script type="text/javascript">



  // Ajax Post Method 
  function AjaxPost(url,paramsObj,callBackFunction,responseType ,async){

    var params = "data=" + JSON.stringify(paramsObj) ,  
    async = async || true ,
    resType = responseType || 'json' ;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", url, async);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var resData = ( resType == 'json' ? JSON.parse(xhr.responseText) : xhr.responseText );
            callBackFunction(resData); // Call Back 
        }
    };

    xhr.send(params);
  }


  function getExamSection(obj) {
    var mdm = document.getElementById('exam-mdm').value,
    std = obj.value ,
    reqData = {} ,
    getDivCallBack = function(res){
        document.getElementById('exam-div').innerHTML = res ;
    };

    if( std != 'default' ){
        var params = { mdm : mdm , std : std };
        AjaxPost( 'db/get_dx_exam_section.php', params, getDivCallBack,'txt');
    }else{
        alert('Please Select Std ');
    }
  }



  function getExamName(obj) {
    var mdm = document.getElementById('exam-mdm').value,
    std = document.getElementById('exam-std').value,
    sec = obj.value,
    reqData = {} ,
    getExamNameCallBack = function(res){
        document.getElementById('exam-name').innerHTML = res ;
        // document.getElementById('exam-subject-det').innerHTML = res ;
    };

    if( std != 'default' && sec != '' ){
        var params = { mdm : mdm , std : std , sec : sec };
        AjaxPost( 'db/get_dx_exam_name.php', params, getExamNameCallBack,'txt');
    }else{
        alert('Please Select Std & Div ');
    }
  }


  function getExamSubject(obj) {
    var examId = obj.value ,
    reqData = {} ,
    getExamNameCallBack = function(res){
        document.getElementById('exam-subject-det').innerHTML = res ;
        document.getElementById('assign-sub-table-block').setAttribute('class','');
    };

    if(examId != 'default' && examId != ''){
        var params = { examId : examId };
        AjaxPost( 'db/get_dx_subject_assign.php', params, getExamNameCallBack,'txt');
    }else{
        alert('Please Select Exam ');
    }

  }


  function setAssignTeacher() {
    var subAssignArr = [] , params = {} ,
    mdm = document.getElementById('exam-mdm').value,
    std = document.getElementById('exam-std').value,
    div = document.getElementById('exam-div').value;

    // get the assign subject
    document.querySelectorAll('#exam-subject-det tr').forEach(function(tr){
        var inputs = tr.querySelectorAll('td input') ,
        assignTeacher =     inputs[1].value,
        subId = inputs[0].dataset.subid,
        subName = inputs[0].value,
        subObj = {};

        if( assignTeacher != undefined && assignTeacher != '' ){
            subObj.subId = subId;
            subObj.subName = subName;
            subObj.tId = assignTeacher.split('~')[0].trim();
            subAssignArr.push(subObj);
        }

    });

    if(subAssignArr.length > 0){
        params.mdm = mdm ;
        params.std = std ;
        params.div = div ;
        params.subAssign = subAssignArr;
        assignTeacherCallBack = function(res) {
            alert(res);
        }
        AjaxPost('db/dx_assign_teacher.php', params, assignTeacherCallBack,'txt');
    }
  }




// Get Teacher Assign Subjects 
// function getTeacherDetails(obj){
//  var examId = obj.dataset.examid ;
//  var callBackFn = function(res){
//      var  ulPosition = obj.parentElement.getBoundingClientRect(), 
//      positionBottom =ulPosition.bottom , 
//      positionLeft = ulPosition.left , 
//      examSubAssignTeacherBlock = document.getElementById('assign-teachers-exam-'+examId),
//      container = document.getElementById('assign-teachers-exam-detail-block'),
//      styleStr = 'bottom:'+positionBottom+'10px; left:'+positionLeft+'px;' ;

//      container.setAttribute('style',styleStr);
//      container.innerHTML = res;
//  }

//  AjaxPost( 'db/dx_exam_asssign_teachers.php', {examId:examId}, callBackFn, 'txt' );

// }



// Get Teacher Assign Subjects 
function getTeacherDetails(obj){
    var examId = obj.dataset.examid ,
    haveExamSubData = obj.dataset.examdata , 
    examSubAssignTeacherBlock = document.getElementById('assign-teachers-exam-'+examId);

    // Toggle exam-sub-data block   
    if(examSubAssignTeacherBlock != undefined){
        var styleTxt =   examSubAssignTeacherBlock.getAttribute('style');
        if(styleTxt =='display:none;'){
            examSubAssignTeacherBlock.setAttribute('style','display:block;');
            return false;   
        }else{
            examSubAssignTeacherBlock.setAttribute('style','display:none;');
            return false;   
        }
    }

    // call Back Function 
    var callBackFn = function(res){
        if(examSubAssignTeacherBlock == undefined){
            obj.innerHTML += res;  
        }else{
                // do nothing 
            }
        };

        AjaxPost( 'db/dx_exam_asssign_teachers.php', {examId:examId}, callBackFn, 'txt' );
    }




 </script>
 <?php //include('../attach/footer_sch.php'); ?>
 <!-- Import Js  -->



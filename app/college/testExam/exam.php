<?php 

// include('../attach/header_sch.php'); 
require_once '../../includes/clg_header.php';
$con = mysqli_connect("localhost","admin","12345","dx2017");

?>

<!-- Import Css  -->
<!-- <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min3.css" > -->

<style type="text/css">
	
	div.row { height: auto !important; }

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

	.row:after {content: " "; display: block; clear: both; }
	.col {float: left; padding-left: 15px; padding-right: 15px; min-height: 1px; }

	.w6 { width: 6%; }
	.w7 { width: 7%; }
	.w10 { width: 10%; }
	.w25 { width: 25%; }
	.w40 { width: 40%; }
	.w50 { width: 50%; }


	p.heading{ background-color: #607D8B; padding: 10px; font-variant: small-caps; font-weight: 600; color: #fff; text-decoration: underline; } 

	form label { font-variant: small-caps; font-weight: 600; }



	/******************************************
	***** Create  Exams Css Start ***********
	*****************************************/


	table{ width: 98% !important;text-align: center; border:1px solid #ccc;}
	td.heads {border:1px solid #ccc; display: inline-block; font-size:11px; margin: 2px 5px; padding: 10px; 
		writing-mode: vertical-lr; transform: rotate(180deg); }

		caption{font-variant: small-caps; font-weight: 600; font-family: arial; }
		.small-caps{font-variant: small-caps; font-weight: 600; font-family: arial; }

		.exam-heading{background-color: #607D8B; padding: 10px; font-variant: small-caps; font-weight: 600; color: #fff; text-decoration: underline; }

		form label { font-variant: small-caps; font-weight: 600; }
		input.sub-marks { width: 40px; }
		.exam-mark-box { display: inline-block; font-size: 10px; margin: 3px; padding: 0px; }

		.delete-btn {padding: 1px 2px; background-color: #d03232; color: #fff; border-radius: 50%;float:left;margin-right: 5px; }
		.add-btn { padding: 1px 2px; background-color: #3f8248; color: #fff; border-radius: 50%;float:left; }		
		.add-btn:hover { color:#000; cursor: pointer;  }	
		.delete-btn:hover { color:#000; cursor: pointer;  }	
		.border-none { border:none !important; }


		.thead td { text-align: center; }
		table tr:nth-child(2n+1) { background-color: #e6e3e3; }
		tfoot tr {background-color:#fff !important; }
		tfoot tr td { text-align: center; }
		button.exam-submit-btn {background: #607D8B; color: #fff; font-variant: small-caps; font-size: 19px; }
		button.exam-submit-btn:hover {background:#fff ; color: #607D8B ; border: 1px solid #607D8B; cursor: pointer; font-weight: 600; }
		#std-exam-subjects-table-body tr td { text-align: center; }

		.display-none{display: none !important; }




	/******************************************
	***** View Exams Css Start ***********
	*****************************************/

	.view-exams-data-block{     width: 96%; margin-left: 2%; background-color: #fff; }
	.view-exams-section ul { margin: 5px 2px; padding: 5px;  border : 1px solid #fff;font-size: 14px;}
	.view-exams-section ul:hover { cursor: pointer; border:1px solid #607D8B;}
	/*.view-exams-section ul:hover { cursor: pointer; color:#607D8B;}*/
	.view-exams-section ul:nth-child(2n+1) { background-color: #eceaea; }
	.view-exams-section ul.ul-head { background-color: #ccc; font-variant: small-caps;  background-color: #eceaea;font-weight: 600;}
	.view-exams-section ul.ul-head:hover { cursor: normal; border:1px solid #fff;}
	/*.view-exams-section ul.ul-head:hover { cursor: normal; color:#000;}*/

	.view-exams-section ul li { display: inline-block;  padding: 2px 5px; margin: 2px 5px; width: 10%; vertical-align: bottom;  }
	.view-exams-section ul li:nth-child(3) { width: 10%; }
	.view-exams-section ul li:nth-child(4) { width: 10%; }
	.view-exams-section ul li:nth-child(5) { width: 10%; }



	/*div.exam-block { border:1px solid #ccc; }*/
	ul div.exam-det-block table { width: 100%; border:1px solid #ccc; margin-top: 10px; }
	ul div.exam-det-block table td ,th { text-align: center; }
	ul div.exam-det-block table thead tr th { font-variant: small-caps; font-size: 13px;}

</style>



<section class="container">

	<!-- <div class="select-exam-view"> <span class="selected">Create Exam</span> <span>View Exams</span> </div> -->


							<!-- ********************************************************
							************************* Create Exam  **********************
							******************************************************** -->
							<section class="cerate-exam-section" style="width: 1045px;">
								<p class="exam-heading">Create Exam</p>

								<!-- create exam form start -->
								<form id="create-exam-from" method="post" action="#" >

									<!-- row start	 -->
									<div class="row">

										<!-- select medium -->
										<div class="col m12 l4">
											<label for="exam-mdm"> Medium </label> <br>
											<select id="exam-mdm" name="exam-mdm" class="full-width" required="required" >
												<?php foreach($GLOBALS['MEDIUM'] as $mdm){echo sprintf("<option value='%s'>%s</option>",$mdm,$mdm); } ?>
											</select>						
										</div>
										<!-- select year -->
										<div class="col m12 l4">
											<label for="exam-year"> Year </label> <br>
											<select id="exam-year" name="exam-year" class="full-width" required="required" onchange="getCourses()"> >
											<option value="" disabled selected>Select Course</option>
												<?php foreach($GLOBALS['YEAR'] as $year){ echo sprintf("<option value='%s'>%s</option>",$year,$year); } ?>
											</select>						
										</div>

										<!-- select course -->
											<div class="col m12 l4">
											<label for="exam-course"> Course </label> <br> 
											<select id="exam-course" name="exam-course" class="full-width" required="required" onchange="getCourseName()" > 
												<option value="default">Select One</option>
												
											</select>	
										</div>
										<!-- <div class="col m12 l3">
											<label for="exam-course"> Course </label> <br> 
											<select id="exam-course" name="exam-course" class="full-width" required="required" onchange="showExamSubjectBlock(this)" > 
												<option value="default">Select One</option>
												
											</select>	
										</div> -->

										<div class="col m12 l4">
											<label for="exam-coursename"> Course Name</label> <br> 
											<select id="exam-coursename" name="exam-coursename" class="full-width" required="required"  > 
												<option value="" disabled selected>Select One</option>
												
											</select>	
										</div>

										<!-- enter Exam Name -->
										<div class="col m12 l4">
											<label for="exam-name"> Exam Name </label> <br> 
											<input type="text" name="exam-name" id="exam-name" class="full-width" required="required"  
											placeholder="Enter Exam Name" list="exam-name-list"> 
										</div>
									</div> <!-- row-end -->

									
									<br>
									<br>


									<!-- exam-subject-block	 other - stds   -->
									<div class="row" id="std-exam-subject-main-block">

										<table class="table table-resposive" id="std-exam-subjects">

											<tbody id="std-exam-subjects-table-body">

												<tr class="thead">
													<td class="small-caps">Subjects</td>
													<td class="small-caps">Formative </td>
													<td class="small-caps">Submative </td>
													<!-- <td class="small-caps">Exam DateTime</td> -->
													<td class="small-caps">&nbsp;</td>
												</tr>

												<!-- ADD SUBJECT HERE  -->
												<tr class="std-exam-subject-row" >
													<td><input type="text" name="std-exam-subject-name" class="std-exam-subject-name" placeholder="Subject Name" list="exam-subject-name-list" required="required"></td>
													<td class="std-exam-mark-box-std"> <input type="number" placeholder="Formative Mark" class="std-sub-marks"></td>
													<td class="std-exam-mark-box-std"><input type="number" placeholder="Submative Mark" class="std-sub-marks" ></td> 
													<!-- <td> <input type="datetime-local" name="std-exam-subject-exam-time" style="width: 187px;"> </td> -->
													<td style="padding: 0; margin: 0;"> <span class="add-btn"  onclick="addExamSubjectRow()">&#x271A;</span></td>
												</tr>

											</tbody>

											<tfoot>
												<tr><td colspan="5"><button class="exam-submit-btn" onclick="submitStdExam(this)"> Submit </button> </td></tr>
											</tfoot>

										</table>
									</div>	
								</form> <!-- create exam form end -->


								<!-- *********************
								**** DATA LIST SECTION ***
								*********************** -->
								
								<!-- Exam Subject Name List  -->
								<datalist id="exam-subject-name-list">
									<?php 

								  // Get The Exam Subject Name List 
									$getExamNamesQuery = mysqli_query($con ," SELECT DISTINCT ES.`subject_name` FROM clg_exam_subjects ES ORDER BY ES.`subject_name` " ) ;
									while($row = mysqli_fetch_assoc($getExamNamesQuery)){
										echo sprintf(" <option>%s</option> ",$row['subject_name']);
									}

									?>
								</datalist>

								<!-- Exam Name List -->
								<datalist id="exam-name-list">
									<?php 

								  // Get The Exam Subject Name List 
									$getExamNamesQuery = mysqli_query($con ," SELECT DISTINCT SE.`exam_name` FROM clg_exams SE ORDER BY SE.`date` DESC  " ) ;
									while($row = mysqli_fetch_assoc($getExamNamesQuery)){
										echo sprintf(" <option>%s</option> ",$row['exam_name']);
									}

									?>
								</datalist>



							</section>




							<!-- Exam-SUBJECT -ROW TEMPLATE  -->
							<table  style="display: none;">
								<tbody id="std-exam-sub-row-tpl">
									<tr class="std-exam-subject-row">
										<td><input type="text" name="std-exam-subject-name" class="std-exam-subject-name" list="exam-subject-name-list" placeholder="Subject Name" required="required"></td>
										<td class="std-exam-mark-box-std"> <input type="text" class="std-sub-marks" placeholder="Formative Mark"></td>
										<td class="std-exam-mark-box-std"><input type="text" class="std-sub-marks" placeholder="Submative Mark"></td> 
										<!-- <td> <input type="datetime-local" name="std-exam-subject-exam-time" style="width: 187px;"> </td> -->
										<td style="padding: 0; margin: 0;"> 
											<span class="delete-btn" onclick="deleteExamSubjectRow(this)">&#x2716;</span>
											<span class="add-btn"  onclick="addExamSubjectRow()">&#x271A;</span>
										</td>
									</tr>
								</tbody>
							</table>	

						</section> <!-- Create Exam Section -->

						<!-- ********************************************************
						********************** View Exam Subject   **************
						******************************************************** -->




						<?php
						$examDetTemplate = '';

						$getExamForClassQuery = mysqli_query($con," SELECT   SE.`mdm` , SE.`cors`,SE.`corsName` ,SE.`yr`, SE.`sec` ,  SE.`exam_name`,SE.`exam_id` 
							FROM clg_exams SE
							ORDER BY FIELD(SE.`mdm`,'English','Hindi','Marathi')  
							
							" ) ;	

						if($getExamForClassQuery && $getExamForClassQuery->num_rows > 0){
							$examDetTemplate .=  '<ul class="ul-head"><li>Medium</li> <li>Course</li>
							<li>Course Name</li><li>year</li> <li>Div</li> <li>Exam-Name</li></ul>';
							while($row = mysqli_fetch_assoc($getExamForClassQuery)){
								$exam_id = array_pop($row);
								$examDetTemplate .=  sprintf('<ul data-examid="%s" onclick="getExamDetails(this)"><li>%s</li></ul>',$exam_id, implode('</li><li>',$row));
							}
						}else{
							$examDetTemplate .= '<p style="text-align:center;color:#f00;padding: 10px;"> No Exam Created Yet ! </p>' ;
						}

						?>

						<!-- View Exams Template Start  -->
						<section class="view-exams-section" style="min-height: 400px;">
							<p class="heading"> View Exams </p>
							<div class="view-exams-data-block">
								<?php  echo $examDetTemplate ; ?>
							</div>

						</section> <!-- view-assign-teacher-section -->






					</section> <!-- main conatiner -->




<script type="text/javascript">

  // New Ajax Post Method 
  function newAjaxPost(url,paramsObj,callBackFunction,responseType ,async){

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





// Ajax Get Method 
function AjaxGet(getObj){
	var xhr = new XMLHttpRequest() ,
		// params = postObj.params ,
		url = getObj.url , 
		async = getObj.async || true ,
		callbackfn = getObj.fn;

		var xhr = new XMLHttpRequest();
		xhr.open('GET', url, true);
		xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		xhr.onreadystatechange = function () {
			if(xhr.readyState == 4 && xhr.status == 200) {
				var result = xhr.responseText;
				// console.log('Result: ' + result);
				var json = JSON.parse(result);
				callbackfn(json);
				// showSuggestions(json);
			}
		};
		xhr.send();
	}


  // Ajax Post Method 
  function AjaxPost(postObj){
  	var xhr = new XMLHttpRequest() ,
  	params = "data=" + JSON.stringify(postObj.params); 
  	url = postObj.url , 
  	async = postObj.async || true ,
  	callbackfn = postObj.CallBackFun;

  	xhr.open("POST", url, async);
  	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			// xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
			xhr.onreadystatechange = function () {
				if(xhr.readyState == 4 && xhr.status == 200) {
					var result = xhr.responseText;
				// console.log('Result: ' + result);
				var json = JSON.parse(result);
				callbackfn(json);
			}
		};
		xhr.send(params);
	}



 //////  Exam Handler Here 
 var examTableBody = '' ,
 examSubRowTpl = '' ,
 stdExamTableBody='',
 stdExamSubRowTpl ='',
 mainExamBlock='',
 stdMainExamBlock ='';
 // primaryStdArr = ['first','second','third','fourth','fifth','sixth','seventh','eighth'] ;

 function Init(){
 	stdExamTableBody = document.getElementById('std-exam-subjects-table-body');
 	stdExamSubRowTpl = document.getElementById('std-exam-sub-row-tpl').innerHTML;
 	mainExamBlock = document.getElementById('exam-subject-main-block');
 	stdMainExamBlock = document.getElementById('std-exam-subject-main-block');
 }

 function deleteSubjectRow(obj){
 	obj.parentElement.parentElement.remove(); 
 }

 function addSubjectRow(){
 	$(examTableBody).append(examSubRowTpl);

 }

 function deleteExamSubjectRow(obj){
 	obj.parentElement.parentElement.remove(); 
 }

 function addExamSubjectRow(){
 	$(stdExamTableBody).append(stdExamSubRowTpl);
 }






// Submit Exam
function submitStdExam(obj){
	event.preventDefault();
	var mdm ,std ,cors ,yr ,corsName ,examName ,subjectMarkDetArr=[],subMarkObj={} , trElemenet =[] , examDetObj ={} ;
		// get the mdm , std , exam-name
		mdm 	 = $('#exam-mdm').val();
		yr 		 = $('#exam-year').val();
		cors 	 = $('#exam-course').val();
		corsName = $('#exam-coursename').val();
		examName = $('#exam-name').val();
		if(mdm == 'default' || cors == 'default' || yr == 'default' ||corsName == 'default' ||examName == '' || examName == undefined){
			alert('Please Check Medium , Course , Year ,Course Name , exam Name');
			return false;
		}
		document.querySelectorAll('#std-exam-subjects-table-body tr.std-exam-subject-row').forEach(function(tr){
			subMarkObj = {};
			trElemenet  = tr.querySelectorAll('input');
			subMarkObj.subjectName = trElemenet[0].value.trim();
			if(subMarkObj.subjectName !='' && subMarkObj.subjectName != undefined){
				subMarkObj.writtenMark =  parseInt(trElemenet[1].value.trim());
				subMarkObj.oralMark =  parseInt(trElemenet[2].value.trim());
				subMarkObj.examDateTime = '' ; // trElemenet[3].value.trim();
				subjectMarkDetArr.push(subMarkObj);
			}
		});


		//  Prepare Final Object  
		//  check subject inserted or not
		if(subjectMarkDetArr.length > 0){
			examDetObj.mdm         = mdm;
			examDetObj.yr          = yr;
			examDetObj.cors        = cors;
			examDetObj.corsName    = corsName;
			examDetObj.examName    = examName;
			examDetObj.examSubject = subjectMarkDetArr;
			var CallBackFun = function(res){
				//alert(JSON.parse(res).statusMsg);
			};
			//ajax call 
			newAjaxPost('db/dx_exam.php',examDetObj,CallBackFun,'txt');
		}else{
			alert('Please Enter Atleast One Subject For Exam ');
			return false;
		}		
	}

	function submitStdExamCallBack(res) {
		alert(res.statusMsg);
	}

	window.onload =  Init();

// Get Teacher Assign Subjects 
function getExamDetails(obj){
	var examId = obj.dataset.examid ,
	haveExamSubData = obj.dataset.examdata , 
	examSubAssignTeacherBlock = document.getElementById('view-exam-details-'+examId);

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

 		newAjaxPost( 'db/get_dx_exam_details.php', {examId:examId}, callBackFn, 'txt' );
 	}


// get course name
     function getCourses() {
     	// alert("hii");
        var mdm = elementByIdValue('exam-mdm'),
        year = elementByIdValue('exam-year');

        var callBackFun = function (res) {
            elementById('exam-course').innerHTML = res;
        };

        AjaxPost('../db/getCourses.php', { mdm: mdm, year: year}, callBackFun, 'txt');
    };
// get course name
     function getCourseName() {
     	// alert("hiii");
        var mdm = elementByIdValue('exam-mdm'),
          year = elementByIdValue('exam-year'),
        crs  = elementByIdValue('exam-course');
      

        var callBackFun = function (res) {
            elementById('exam-coursename').innerHTML = res;
        };

        AjaxPost('../db/getCoursename.php', { mdm: mdm, year: year,crs: crs }, callBackFun, 'txt');
    }

 </script>
<script src="../../../assets/js/app.js"></script>
 <script src="../../../assets/js/jquery-3.1.1.js"></script>
 <? //php include('../attach/footer_sch.php'); ?>
 <!-- Import Js  -->



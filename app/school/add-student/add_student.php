<?php require_once '../../includes/usr_sch_header.php' ;

// get gr number 
$gr_query="select SD.`Gr_num` from sch_details AS SD ORDER BY SD.`GR_num` DESC LIMIT 1 ";
$gr_no_data = DB::oneRow($gr_query);
$gr_no = $gr_no_data['Gr_num'] + 1 ;
 // echo $gr_no;
?>

<style type="text/css">
	.required:before {
		content: '*';
		color: #EF5F5F;
	}

</style>



<!-- student detail update form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Personal And Acadamic Details
	</h5>
	<!-- Expense Form -->
    <form  name="adm_form" "class="row" method="post" action="addStudentCtrl.php" onsubmit="return validateForm()" enctype="multipart/form-data">

      <!-- dummy image -->
      <div class="col m12 l4">
         <div id="stu_img_place" class="dummyimg">
            <img src="../../../assets/img/dummy_student.png"   alt="Student Image" class="stu_img_cls ">
        </div>
			<!-- <label for="enroll_no" class="font-weight100 small-caps full-width">Enroll Number</label>
			<input type="number" id="enroll_no" class="full-width" title="Enter Student Enroll Number."> -->
		</div>

<!-- 
 <input type="file" name="stu_img" id="stu_img" style="width: 90px; margin-left: -150px; margin-top: 10px;" onchange="store_img('stu_img','stu_img_place')">
-->

<!-- student image -->
<div class="col m12 l4">
	<label for="upload_img" class="font-weight100 small-caps full-width">Upload Image</label>
	<input type="file"  name="stu_img" id="stu_img" class="full-width" title="Upload Student Image."
	onchange="store_img('stu_img','stu_img_place');">
</div>

<!--enroll number -->
<div class="col m12 l4">
	<label for="enroll_no" class="font-weight100 small-caps full-width">Enroll Number</label>
	<input type="number" id="enroll_no" name="enroll_no"  value="<?php echo $gr_no ?>"class="full-width" title="Enter Student Enroll Number." readonly>
</div>

<!--gr number -->
<div class="col m12 l4">
	<label for="gr_no" class="font-weight100 small-caps full-width">Gr Number</label>
	<input type="number" id="gr_no" name="gr_no"  class="full-width" title="Enter Student Gr Number." required="required" >
</div>



<!--roll number -->
<div class="col m12 l4">
	<label for="rollno" class="font-weight100 small-caps full-width">Roll Number</label>
	<input type="number" id="rollno" name="rollno"  class="full-width" title="Enter Student Gr Number." required="required">
</div>


<!--student name -->
<div class="col m12 l4">
	<label for="student_name" class="font-weight100 small-caps full-width required">Student Name</label>
	<input type="text" id="student_name" name="student_name" class="full-width" title="Enter Student Name." required="required">
</div>



<!--father name -->
<div class="col m12 l4">
	<label for="f_name" class="font-weight100 small-caps full-width required">Father Name</label>
	<input type="text" id="f_name" name="f_name" class="full-width" title="Enter Student Father Name." required="required">
</div>

<!--mother name -->
<div class="col m12 l4">
	<label for="m_name" class="font-weight100 small-caps full-width required">Mother Name</label>
	<input type="text" id="m_name" name="m_name" class="full-width" title="Enter Student Mother Name" required="required">
</div>


<!--nationality -->
<div class="col m12 l4">
	<label for="nationality" class="font-weight100 small-caps full-width">Nationality</label>
	<input type="text" id="nationality" name="nationality" class="full-width" title="Enter Student Nationality" required="required">
</div>

<!--state -->
<div class="col m12 l4">
	<label for="state" class="font-weight100 small-caps full-width">State</label>
	<select  id="state" name="state" class="full-width" title="Select Your Residence State" required="required">
		<option value="Maharashtra">Maharashtra</option>
	</select>
</div>

<!--date of birht -->
<div class="col m12 l4">
	<label for="dob" class="font-weight100 small-caps full-width required">Date Of Birth</label>
	<input type="date" id="dob" name="dob" class="full-width" title="Enter Student Date Of Brith" required="required">
</div>

<!--birth place -->
<div class="col m12 l4">
	<label for="birth_place" class="font-weight100 small-caps full-width">Birth Place</label>
	<input type="text" id="birth_place" name="birth_place" class="full-width" title="Enter Student Birth Place" required="required">
</div>

<!--religion -->
<div class="col m12 l4">
	<label for="religion" class="font-weight100 small-caps full-width">Religion</label>
	<input type="text" id="religion" name="religion" class="full-width" title="Enter Student Religion" required="required">
</div>

<!--caste -->
<div class="col m12 l4">
	<label for="caste" class="font-weight100 small-caps full-width">Caste</label>
	<input type="text" id="caste" name="caste" class="full-width" title="Enter Student Caste eg. OBC" required="required">
</div>

<!--address -->
<div class="col m12 l4">
	<label for="address" class="font-weight100 small-caps full-width required">Present Address</label>
	<input type="text" id="address" name="address" class="full-width" title="Enter Student Address" required="required">
</div>

<!--address -->
<div class="col m12 l4">
	<label for="per_address" class="font-weight100 small-caps full-width required">Permanent Address</label>
	<input type="text" id="per_address" name="per_address" class="full-width" title="Enter Student Address" required="required">
</div>

<!--fathet qualification -->
<div class="col m12 l4">
	<label for="f_qualification" class="font-weight100 small-caps full-width required">Father Qualification</label>
	<input type="text" id="f_qualification" name="f_qualification" class="full-width" title="Enter Student Address">
</div>

<!--fathet occupation -->
<div class="col m12 l4">
	<label for="f_occupation" class="font-weight100 small-caps full-width required">Father Occupation</label>
	<input type="text" id="f_occupation" name="f_occupation" class="full-width" title="Enter Student Address" required="required">
</div>

<!--mother qualification -->
<div class="col m12 l4">
	<label for="m_qualification" class="font-weight100 small-caps full-width required">Mother Qualification</label>
	<input type="text" id="m_qualification" name="m_qualification" class="full-width" title="Enter Student Address" required="required">
</div>


<!--mother occupatiion -->
<div class="col m12 l4">
	<label for="m_occupation" class="font-weight100 small-caps full-width required">Mother Occupation</label>
	<input type="text" id="m_occupation" name="m_occupation" class="full-width" title="Enter Student Address" required="required">
</div>


<!--contact number -->
<div class="col m12 l4">
	<label for="contact_number" class="font-weight100 small-caps full-width required">Contact Number</label>
	<input type="number" id="contact_number" name="contact_number" class="full-width" title="Enter Contact Number" required="required">
</div>

<!--aadhar number -->
<div class="col m12 l4">
	<label for="aadhar_no" class="font-weight100 small-caps full-width required">Aadhar Number</label>
	<input type="number" id="aadhar_no" name="aadhar_no" class="full-width" title="Enter Student Aadhar number" required="required">
</div>

<!--gender -->
<div class="col m12 l4">
	<label for="documents" class="font-weight100 small-caps full-width">Documents</label>
	<select id="documents" name="documents" class="full-width" title="Select Student Gender." required="required">
		<option value="" disabled selected >Select One</option>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	</select>
</div>	

<!--gender -->
<div class="col m12 l4">
	<label for="gender" class="font-weight100 small-caps full-width required">Gender</label>
	<select id="gender" name="gender" class="full-width" title="Select Student Gender." required="required">
		<option value="" disabled selected >Select One</option>
		<option value="male">Male</option>
		<option value="female">Female</option>
	</select>
</div>	



<!-- session year -->
<div class="col m12 l4">
	<label for="session_year" class="font-weight100 small-caps full-width">Session Year</label>
	<select id="session_year" name="session_year" class="full-width" title="Select Student Standard." required="required">
		<option value="" disabled selected >Select One</option>
		<option value="2016-2017">2016-2017</option>
		<option value="2017-2018">2017-2018</option>
	</select>
</div>

<!-- Medium -->
<div class="col m12 l4">
    <label for="medium" class="font-weight100 small-caps full-width">Medium</label>
    <select id="medium" name="medium" class="full-width" title="Select your medium." required="required">
        <option value="" disabled selected>Select Medium</option>
        <?php foreach($GLOBALS['MEDIUM'] as $mdm){echo sprintf("<option value='%s'>%s</option>",$mdm,$mdm); } ?>
    </select>
</div>

<!-- standard -->
<div class="col m12 l4">
    <label for="standard" class="font-weight100 small-caps full-width">Standard</label>
    <select id="standard" name="standard" class="full-width" title="Select your Standard." onchange="getSection()" required="required">
        <option value="" disabled selected>Select Std</option>
        <?php foreach($GLOBALS['STD'] as $std){ echo sprintf("<option value='%s'>%s</option>",$std,$std); } ?>
    </select>
</div>
<!-- section -->
<div class="col m12 l4">
    <label for="section" class="font-weight100 small-caps full-width">Section</label>
    <select id="section" name="section" class="full-width" title="Select Student Section." required="required">
        <option value="" disabled selected>Select One</option>

    </select>
</div>


<!--last school -->
<div class="col m12 l4">
	<label for="last_school" class="font-weight100 small-caps full-width">Last School</label>
	<input type="text" id="last_school" name="last_school" class="full-width" placeholder="Enter Last School" title="Enter Student Last School" required="required">
</div>

<!--date of addmission -->
<div class="col m12 l4">
	<label for="admission_date" class="font-weight100 small-caps full-width">Admission Date</label>
	<input type="date" id="admission_date" name="admission_date" class="full-width" title="Select Admission Date" required="required">
</div>

<!-- paying status -->
<div class="col m12 l4">
	<label for="pay_status" class="font-weight100 small-caps full-width">Paying Status</label>
	<select id="pay_status" name="pay_status" class="full-width" title="Select Paying Status." required="required">
		<option value="" disabled selected >Select One</option>
		<option value="paying">Paying </option>
		<option value="non_paying">Non Paying</option>
	</select>
</div>

<!--type of admission -->
<div class="col m12 l4">
	<label for="type_of_adm" class="font-weight100 small-caps full-width">Type Of Admission</label>
	<select  id="type_of_adm" name="type_of_adm" class="full-width" required="required">
		<option value="Confirmed">Confirmed</option>
		<option value="Provisional">Provisional</option>
	</select>
</div>


<!-- Submit Button -->
<div class="col m12 pad-top10 txt-left" style="margin-bottom: 10px;">
	<button type="submit" class="btn bg-grey txt-ash full-width" name="submit" >
		<i class="ion-android-send"></i>
		Submit
	</button>
</div>
</form>
</div>





</div>
<!-- /Container -->



<script src="../../../assets/js/app.js"></script>
<script src="../../../assets/js/jquery-3.1.1.js"></script>

<script type="text/javascript">

    function validateForm() {
        var x = document.forms["adm_form"]["student_name"].value;
        if (x == "") {
            alert("Name must be filled out");
            return false;
        }
        

    }


	/// === RESIZE IMAGE AND STORE INTO LOCAL STORAGE === ///
	function store_img(img_field_id, place_img_to) {

		var file = document.getElementById(img_field_id).files[0];
    // Ensure it's an image
    if (file.type.match(/image.*/)) {

        // Load the image
        var reader = new FileReader();
        reader.onload = function (readerEvent) {
        	var image = new Image();
        	image.onload = function (imageEvent) {

                // Resize the image
                var canvas = document.createElement('canvas'),
                max_size = 544,
                    width = 120; //img_width,
                height = 120;// img_height;
                if (width > height) {
                	if (width > max_size) {
                		height *= max_size / width;
                		width = max_size;
                	}
                } else {
                	if (height > max_size) {
                		width *= max_size / height;
                		height = max_size;
                	}
                }
                canvas.width = width;
                canvas.height = height;
                canvas.getContext('2d').drawImage(image, 0, 0, width, height);
                var dataUrl = canvas.toDataURL('image/jpeg');

                localStorage.setItem(img_field_id, dataUrl.replace('data:image/jpeg;base64,', ''));
                canvas.setAttribute("class", "stu_img_cls");
                // document.getElementById(place_img_to).innerHTML = canvas;
                $('#'+place_img_to).html(canvas);
            }
            image.src = readerEvent.target.result;
        }
        reader.readAsDataURL(file);
    } else {
    	alert('Please Upload An Valid Image File');
    }
};


/// === RESIZE IMAGE AND STORE INTO LOCAL STORAGE === ///
function store_img22(img_field_id, place_img_to) {

    var file = $('#' + img_field_id)[0].files[0];
    // Ensure it's an image
    if (file.type.match(/image.*/)) {

        // Load the image
        var reader = new FileReader();
        reader.onload = function (readerEvent) {
            var image = new Image();
            image.onload = function (imageEvent) {

                // Resize the image
                var canvas = document.createElement('canvas'),
                max_size = 544,
                    width = 120; //img_width,
                height = 120;// img_height;
                if (width > height) {
                    if (width > max_size) {
                        height *= max_size / width;
                        width = max_size;
                    }
                } else {
                    if (height > max_size) {
                        width *= max_size / height;
                        height = max_size;
                    }
                }
                canvas.width = width;
                canvas.height = height;
                canvas.getContext('2d').drawImage(image, 0, 0, width, height);
                var dataUrl = canvas.toDataURL('image/jpeg');

                localStorage.setItem(img_field_id, dataUrl.replace('data:image/jpeg;base64,', ''));
                canvas.setAttribute("class", "stu_img_cls");
                $('#' + place_img_to).html(canvas);
            }
            image.src = readerEvent.target.result;
        }
        reader.readAsDataURL(file);
    } else {
        alert('Please Upload An Valid Image File');
    }
}


function domObjectToString(domObject){   
    if(typeof(domObject) ==='object'){    
        var divElement = document.createElement('div') ;    
        divElement.appendChild(domObject);    
        return divElement.innerHTML;    
    }else{     
        return domObject.toString();     
    }
}


function getSection() {
    var mdm = elementByIdValue('medium'),
    std = elementByIdValue('standard');

    var callBackFun = function (res) {
        elementById('section').innerHTML = res;
    };

    AjaxPost('../db/getSection.php', { mdm: mdm, std: std }, callBackFun, 'txt');
}


</script>

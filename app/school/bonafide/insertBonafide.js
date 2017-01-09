document.getElementById('createBonafideSubmit').addEventListener('click',function(){

		var params = {} ,
		fn = function(){
		  // alert('hello');
		};

		params.enroll = elementById('enroll').value;
		params.stu_name = elementById('stu_name').value;
		params.fname = elementById('fname').value;
		params.mname = elementById('mname').value;
		params.standard = elementById('standard').value;
		params.dob = elementById('dob').value;
		params.birth_place = elementById('birth-place').value;
		params.religion = elementById('religion').value;
		params.purpose = elementById('purpose').value;

		AjaxPost('insertBonafideCtrl.php',params,fn,'txt');

	});




elementById('addEnquirySubmit').addEventListener('click',function(){

	var params = {} ,
	fn = function(){
		 // alert('hello');
	};
	
	params.name = elementById('name').value;
	params.fname = elementById('fname').value;
	params.mname = elementById('mname').value;
	params.gender = elementById('gender').value;
	params.dob = elementById('dob').value;
	params.address = elementById('address').value;
	params.contact = elementById('contact').value;
	params.mdm = elementById('medium').value;
	params.std = elementById('standard').value;
	params.sec = elementById('section').value;
	
	
	AjaxPost('addEnquiryCtrl.php',params,fn,'txt');

});


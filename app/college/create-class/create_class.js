
elementById('createClassSubmit').addEventListener('click',function(){
	var params = {} ,
	fn = function(){
		 // alert('hello');
		};

		params.mdm = elementById('medium').value;
		params.crs = elementById('course').value;
		params.year = elementById('year').value;
		params.cname = elementById('cname').value;
		params.div = elementById('division').value;
		params.sub = elementById('subject').value;
		AjaxPost('createClassCtrl.php',params,fn,'txt');

	});




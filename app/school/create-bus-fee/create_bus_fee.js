function insertBusFeeResponseHandler(res){
	console.log(res);
}

elementById('createBusFeeSubmit').addEventListener('click',function(){
	
		var params = {} ,
	fn = function(){
		// alert('hello');
	};
	
	params.areaname = elementById('areaname').value;
	params.feeamount = elementById('feeamount').value;
	params.latefee = elementById('latefee').value;
	params.feefreq =elementById('feefreq').value;
	params.latefeefreq = elementById('latefeefreq').value;
	

	AjaxPost('createBusFeeCtrl.php',params,fn,'txt');














	// var createUserObj = {} , params = {} ;
	// createUserObj.url = 'createBusFeeCtrl.php';
	// createUserObj.fn = insertBusFeeResponseHandler;


	// var areaname = elementById('areaname').value,
	// feeamount = elementById('feeamount').value,
	// latefee =elementById('latefee').value,
	// feefreq = elementById('feefreq').value,
	// latefeefreq = elementById('latefeefreq').value;

	// params.areaname = areaname;
	// params.feeamount = feeamount;
	// params.latefee = latefee;
	// params.feefreq = feefreq;
	// params.latefeefreq = latefeefreq;

	// createUserObj.params = params;

	// AjaxPost(createUserObj);

});

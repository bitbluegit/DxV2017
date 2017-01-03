function insertBusFeeResponseHandler(res){
	console.log(res);
}

elementById('createBusFeeSubmit').addEventListener('click',function(){
	
	var createUserObj = {} , params = {} ;
	createUserObj.url = 'createBusFeeCtrl.php';
	createUserObj.fn = insertBusFeeResponseHandler;


	var areaname = elementById('areaname').value,
	feeamount = elementById('feeamount').value,
	latefee =elementById('latefee').value,
	feefreq = elementById('feefreq').value,
	latefeefreq = elementById('latefeefreq').value;

	params.areaname = areaname;
	params.feeamount = feeamount;
	params.latefee = latefee;
	params.feefreq = feefreq;
	params.latefeefreq = latefeefreq;

	createUserObj.params = params;

	AjaxPost(createUserObj);

});

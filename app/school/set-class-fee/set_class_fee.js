function setClassFeeResponseHandler(res){
	console.log(res);
}

elementById('setClassFeeSubmit').addEventListener('click',function(){
	
	var setClassfeeObj = {} , params = {} ;
	setClassfeeObj.url = 'setClassFeeCtrl.php';
	setClassfeeObj.fn = setClassFeeResponseHandler;


	var mdm = elementById('medium').value,
	std = elementById('standard').value,
	feefreq = elementById('feefrequency').value,
	feename =elementById('feename').value,
	feeamount = elementById('feeamount').value,
	latefee = elementById('latefee').value;
	feeformat1 = elementById('feeformat1').value;
	feeformat2 = elementById('feeformat2').value;

	params.mdm = mdm;
	params.std = std;
	params.feefreq = feefreq;
	params.feename = feename;
	params.feeamount = feeamount;
	params.latefee = latefee;
	params.feeformat1 = feeformat1;
	params.feeformat2 = feeformat2;


	setClassfeeObj.params = params;

	AjaxPost(setClassfeeObj);

});

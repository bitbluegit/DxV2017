function setClassFeeResponseHandler(res){
	console.log(res);
}

elementById('setClassFeeSubmit').addEventListener('click',function(){
	
	var params = {} ,
	fn = function(){
		// alert('hello');
	};
	
	params.mdm = elementById('medium').value;
	params.std = elementById('standard').value;
	params.feefreq = elementById('feefreq').value;
	params.feename =elementById('feename').value;
	params.feeamount = elementById('feeamount').value;
	params.latefee = elementById('latefee').value;
	params.feeformat1 = elementById('feeformat1').value;
	params.feeformat2 = elementById('feeformat2').value;

	// window.alert(params.mdm);
	// window.alert(params.std);

	AjaxPost('setClassFeeCtrl.php',params,fn,'txt');

});

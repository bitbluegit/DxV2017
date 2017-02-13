
// function insertBusFeeResponseHandler(res){
// 	console.log(res);
// }

elementById('createBusFeeSubmit').addEventListener('click',function(){

	var areaname    = elementById('areaname').value;
		feeamount   = elementById('feeamount').value;
		latefee     = elementById('latefee').value;
		feefreq     =elementById('feefreq').value;
		latefeefreq = elementById('latefeefreq').value;
	
	fn = function(res){
				alert(res.msg);
    			window.location.reload();
	};
		
	if(areaname != "" && feeamount!= "" && latefee != "" && feefreq != "" && latefeefreq != "")
	{
	AjaxPost('createBusFeeCtrl.php',{areaname:areaname, feeamount:feeamount, latefee:latefee, feefreq:feefreq, latefeefreq:latefeefreq},fn,'json');
	}else {
		alert ("please fill valid details");
	}

	

});

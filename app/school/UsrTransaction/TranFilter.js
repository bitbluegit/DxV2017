function getFormData(formId){
	var form = document.getElementById(formId);
	var formParamObj = {};
	var formElments = ['input','select']; 
		// input - type text , number , date , email ,etc 
		// select 
		// check boxs 
		// radios boxes
		formElments.forEach(function(eType){
			form.querySelectorAll(eType).forEach(function(e) {
				formParamObj[e.name]=e.value;
			});
		});
		console.log(formParamObj);
		return formParamObj;
	}


	function filterTransaction(){
				
		var paramsObj = getFormData("eqnuiry-filter") ,
		callBackFun = function(res){
			document.getElementById('filter-data').innerHTML = res;
		};


		
			DX.AjaxPost('tranFilterCtrl.php',paramsObj,callBackFun,'txt');
		
		// AjaxPost('tranFilterCtrl.php',paramsObj,callBackFun,'txt');
	 }


	
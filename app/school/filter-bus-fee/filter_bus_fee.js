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


	function filterBusFee(){
		var paramsObj = getFormData("busfee-filter"),
		callBackFun = function(res){
			document.getElementById('filter-data').innerHTML = res;
		};

		AjaxPost('busfee_filter_ctrl.php',paramsObj,callBackFun,'txt');
	}



	
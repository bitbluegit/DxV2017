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
		// console.log(formParamObj);
		return formParamObj;
	}


	function filterCircular(){
		var paramsObj = getFormData("circular-filter") ,
		callBackFun = function(res){
			document.getElementById('filter-data').innerHTML = res;
		};

		AjaxPost('circularFilterCtrl.php',paramsObj,callBackFun,'txt');
	}

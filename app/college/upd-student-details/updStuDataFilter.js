function getFormData(formId){
	var form = document.getElementById(formId);
	var formParamObj = {};
	var formElments = ['select']; 
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


	function filterUpdateList(){
			
		var paramsObj = getFormData("update-filter") ,
		callBackFun = function(res){
			document.getElementById('data-block').innerHTML = res;
		};

		AjaxPost('getStudentDetailsToUpdate.php',paramsObj,callBackFun,'txt');

	}



	

	function getStudentDetailForAward(){
		var grNum = elementById('enroll').value.trim();
		
		if( grNum =='' || grNum == undefined ){
			alert('Please Enter Valid Enroll Number ');
			return false;
		}
		
		var callBackFun = function(res){
			document.getElementById('award-block').innerHTML = res;
		};

		AjaxPost('award_formCtrl.php',{enroll:grNum},callBackFun,'txt');
	}

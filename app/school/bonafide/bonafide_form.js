
	function getStudentDetailForBonafide(){
		var grNum = elementById('enroll').value.trim();
		
		if( grNum =='' || grNum == undefined ){
			alert('Please Enter Valid Enroll Number ');
			return false;
		}
		
		var callBackFun = function(res){
			document.getElementById('bonafide-block').innerHTML = res;
		};

		AjaxPost('create_bonafideCtrl.php',{enroll:grNum},callBackFun,'txt');
	}



	
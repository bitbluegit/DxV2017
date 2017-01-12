
	function getStudentDetailForNoc(){
		var grNum = elementById('enroll').value.trim();
		
		if( grNum =='' || grNum == undefined ){
			alert('Please Enter Valid Enroll Number ');
			return false;
		}
		
		var callBackFun = function(res){
			document.getElementById('noc-block').innerHTML = res;
		};

		AjaxPost('genrate_NocCtrl.php',{enroll:grNum},callBackFun,'txt');
	}



	
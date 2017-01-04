

function createClassResponseHandler(res){
	console.log(res);
}

elementById('createClassSubmit').addEventListener('click',function(){
	var params = {} ,
	fn = function(){
		 // alert('hello');
	};
	
	params.mdm = elementById('medium').value;
	params.std = elementById('standard').value;
	params.div = elementById('division').value;
	
	AjaxPost('createClassCtrl.php',params,fn,'txt');

});




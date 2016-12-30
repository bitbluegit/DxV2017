function createClassResponseHandler(res){
	console.log(res);
}

elementById('createClassSubmit').addEventListener('click',function(){

	var createClassObj = {} , params = {} ;
	createClassObj.url = 'createClassCtrl.php';
	createClassObj.fn = createClassResponseHandler;

	var mdm = elementById('medium').value, 
	std = elementById('standard').value,
	div = elementById('division').value; 

	params.mdm = mdm;
	params.std = std;
	params.div = div;
	createClassObj.params = params;

	AjaxPost(createClassObj);

});




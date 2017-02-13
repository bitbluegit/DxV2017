

elementById('addEventSubmit').addEventListener('click',function(){
	// alert("hiii");
	var params = {} ,
	fn = function(){
		// alert('hello');
	};
	
 	params.eTitle = elementById('eTitle').value;
 	params.eDetails = elementById('eDetails').value;
 	params.eImg = elementById('eImg').value;
	
 	AjaxPost('addEventCtrl.php',params,fn,'txt');

 });



function fetchimage () {
    var dataImage = localStorage.getItem('imgData');
    img.src = "data:image/png;base64," + dataImage;
    // If you don't process the url with getBase64Image, you can just use
    // img.src = dataImage;
}

// Call fetch to get image from localStorage.
// So each time you reload the page, the image in localstorage will be 
// put on tableBanner
fetchimage();
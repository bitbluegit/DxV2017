// DOM ACCESSS FUNCTIONS 
(function(){
	'use strict';

	function elementById(id){
		return document.getElementById(id);
	}

	function elementByIdValue(id){
		return document.getElementById(id);
	}

	function elementByClass(elemntclass){
		return document.querySelectorAll('.'+elemntclass);
	}

	function getElementAttArray(cssSelector) {

		// Array.prototype.slice.call(document.querySelectorAll('#create-class-form input[type="number"]')[0].attributes).forEach(function(item) {
		// 	console.log(item.name + ': '+ item.value);
		// });

		return document.querySelectorAll(element);	
	}

	window.elementById=elementById;
	window.elementByClass=elementByClass;
	// return {
	// 	elementById:elementById,
	// 	elementByClass:elementByClass
	// } 

}());


// Form Validator 
(function(){

	function formValitor(formId){

// get the Form element like -
// - input[type="text,number,email,date,datetime-local,"]
// checkboxs 
// radiobuttons
// select


// Validate Input Elements 

// Array.prototype.slice.call(document.querySelectorAll('#create-class-form input[type="number"]')[0].attributes).forEach(function(item) {
// 	console.log(item.name + ': '+ item.value);
// });

var inputNoElement = document.querySelectorAll('#'+formId+'input[type="number"]')

}

return {
	formValitor:formValitor
}

}());


// Ajax call 

(function(){

	// ajax call 
	function AjaxGet(getObj){
		var xhr = new XMLHttpRequest() ,
		// params = postObj.params ,
		url = getObj.url , 
		async = getObj.async || true ,
		callbackfn = getObj.fn;

		var xhr = new XMLHttpRequest();
		xhr.open('GET', url, true);
		xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		xhr.onreadystatechange = function () {
			if(xhr.readyState == 4 && xhr.status == 200) {
				var result = xhr.responseText;
				// console.log('Result: ' + result);
				var json = JSON.parse(result);
				callbackfn(json);
				// showSuggestions(json);
			}
		};
		xhr.send();
	}


// Ajax Post Method 
function AjaxPost(url,paramsObj,callBackFunction,responseType ,async){

	var params = "data=" + JSON.stringify(paramsObj) ,  
	async = async || true ,
	resType = responseType || 'json' ;

	var xhr = new XMLHttpRequest();
	xhr.open("POST", url, async);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.onreadystatechange = function () {
		if(xhr.readyState == 4 && xhr.status == 200) {
			var resData = ( resType == 'json' ? JSON.parse(xhr.responseText) : xhr.responseText );
  			callBackFunction(resData); // Call Back 
  		}
  	};

  	xhr.send(params);

  }


  ///////old ajax mathod

	// function AjaxPost(postObj){
	// 	var xhr = new XMLHttpRequest(),
	// 	params = "data=" + JSON.stringify(postObj.params); 
	// 	url = postObj.url , 
	// 	async = postObj.async || true ,
	// 	callbackfn = postObj.fn;
	// 	xhr.open("POST", url, async);
	// 	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// 	// xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	// 	xhr.onreadystatechange = function () {
	// 		if(xhr.readyState == 4 && xhr.status == 200) {
	// 			var result = xhr.responseText;
	// 			// console.log('Result: ' + result);
	// 			// var json = JSON.parse(result);
	// 			callbackfn(result);
	// 		}
	// 	};
	// 	xhr.send(params);
	// }



	window.AjaxPost = AjaxPost;
	window.AjaxGet = AjaxGet;

}());


console.log('app js here');
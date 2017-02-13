<?php require_once '../../includes/usr_sch_header.php'; 
?>

<!-- ****************************
**** bonafide enroll filter ****
***************************** -->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="search-student-block">
	<!-- Title -->
	<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
		<i class="ion-android-settings margin-right20"></i>
		Search Student 
	</h5> 
	<!-- serach student Form -->
	<section  id="enroll-filter" name="enroll-filter" >
		<!-- ROW - 1  -->
		<div class="row">
			<!-- Enter Enroll Number -->
			<div class="col m12 l4"   style="margin-bottom: 9px;" >
				<label for="enroll" class="font-weight100 small-caps full-width">Enroll Number</label>
				<input type="number" id="enroll" name="enroll" class="full-width" placeholder=" Enroll Number "  required="required">
			</div> 
			<!-- Submit Button --> 
			<div class="col m12 l4 pad-top20 txt-left">
				<button type="button" class="btn bg-grey txt-ash full-width" onclick="getStudentDetailForAddFee(this)" style=" margin-top: 3px;">
					<i class="ion-android-send"></i>
					Submit
				</button>
			</div>
		</div><!-- ROW-1 END -->
	</section> <!-- Enroll Filter Section END -->

</section> <!-- search student -->





<!-- ****************************
****  form ****
***************************** -->
<section  id="student-block">

	<!-- Bonafide Form Template Insert Here -->

</section> <!-- form -->

<?php require_once '../../includes/footer.php'; ?>
<script src="../../../assets/js/jquery-3.1.1.js"></script>
<!--<script src="bonafide_form.js"></script>
-->
<script type="text/javascript">
	
	function getStudentDetailForAddFee(){
		var grNum = elementById('enroll').value.trim();
		
		if( grNum =='' || grNum == undefined ){
			alert('Please Enter Valid Enroll Number ');
			return false;
		}
		
		var callBackFun = function(res){
			document.getElementById('student-block').innerHTML = res;
		};

		AjaxPost('add_feeCtrl.php',{enroll:grNum},callBackFun,'txt');
	};


// get 
function feeElement(){
	var mdm= document.getElementById('medium').value,
	std= document.getElementById('standard').value ,
	feeType= document.getElementById('feeType').value;

	callBackFunction =function(res){
		var data = JSON.parse(res);
		elementById('oneTimeFeeTmp').innerHTML = data['tmp_str'];
		document.getElementById('totalAmount').value= data.fee_details.fee;
		document.getElementById('totalLateAmount').value= data.fee_details.lfee;		
	}; 
	AjaxPost('feeChangeType.php',{mdm:mdm , std:std ,feeType:feeType},callBackFunction,'txt');
}




// get cheuque details fields on mode change
function getChequeDetails(){
	var stmt = eIdVal('mode') == "Cheque" ? 'display:block' : 'display:none';
	setStyleById('chequedetailsFields',stmt);
}


// Fee  Month Check or Click Event 
function calCulateTotalMonthlyfee(fee){
	// alert(fee);
	var count =0 , monthfeeAmt = fee , netAmount = 0 ;
	document.querySelectorAll('.sel_mon').forEach(function(e){
		if(e.checked==1){count++; } 
	});
	netAmount = monthfeeAmt * count ;
	document.getElementById('totalAmount').value = netAmount;
}




function calCulateTotalLfee(fee){
 		// alert(fee);
 		var count =0 , monthLatefeeAmt = fee , netLateAmount = 0 ;
 		document.querySelectorAll('.sel_mon_late').forEach(function(e){
 			if(e.checked==1){count++; } 
 		});
 		netLateAmount = monthLatefeeAmt * count ;
 		document.getElementById('totalLateAmount').value = netLateAmount;

 	}


// add fee section 
function addFeeSection(){

	var rcptNumber = DX.eByIdVal('reciept'),
	enroll  		= DX.eByIdVal('enroll'),
	
	actualFeeAmount ,actualLateFeeAmount , monCheckedCount = 0 , lateMonthCheckedCount = 0 ,  feeAmount = 0 , paidAmount=0 , 
	lateFeeAmount = 0 , discount= 0 , checkMonthObj = [], checkMonthLateObj = [] , htm ="" , netBalanceAmt , reciept , feeType ,frequency, mode, cheqNo, reason, bank, chequedate  ;

	reciept 	   = DX.eByIdVal('reciept'),
	feeType 		= DX.eByIdVal('feeType'),
	frequency       = DX.eByIdVal('frequency'),
	mode     		= DX.eByIdVal('mode'),
	cheqNo 			= DX.eByIdVal('chequeno'),
	reason  		= DX.eByIdVal('reasone'),
	bank  			= DX.eByIdVal('bankname'),
	chequedate 		= DX.eByIdVal('chequedate');



	if(frequency == 'Monthly'){

		feeAmount 				= parseFloat(DX.eByIdVal('totalAmount')) > 0 ? parseFloat(DX.eByIdVal('totalAmount')) : 0 ;
		paidAmount 				= parseFloat(DX.eByIdVal('paidAmount')) > 0 ? parseFloat(DX.eByIdVal('paidAmount')) : 0 ;
		lateFeeAmount 			= parseFloat(DX.eByIdVal('totalLateAmount')) > 0 ? parseFloat(DX.eByIdVal('totalLateAmount')) : 0 ;
		discount 				= parseFloat(DX.eByIdVal('discount')) > 0 ? parseFloat(DX.eByIdVal('discount')) : 0 ;
		actualFeeAmount 		= parseFloat(DX.eByIdVal('feeAmount')) > 0 ? parseFloat(DX.eByIdVal('feeAmount')) : 0 ;
		actualLateFeeAmount 	= parseFloat(DX.eByIdVal('actualLateFee')) > 0 ?  parseFloat(DX.eByIdVal('actualLateFee')) : 0;

		document.getElementById('month_name_list').querySelectorAll('tr.month_name_cls td.sel_mon_span input.sel_mon').forEach(function(data){
			if(data.checked == 1){checkMonthObj.push(data.value);}
		});

		document.getElementById('month_name_list').querySelectorAll('tr.month_late_cls td.sel_mon_late_span input.sel_mon_late').forEach(function(data){
			if(data.checked == 1){checkMonthLateObj.push(data.value);}
		});


		monCheckedCount 		= checkMonthObj.length;
		lateMonthCheckedCount   = checkMonthLateObj.length;

		var netTotal = ((feeAmount + lateFeeAmount) - discount );
		eachMonthFeeDiscount = (discount /monCheckedCount).toFixed(2);
		netBalanceAmt  = (( feeAmount + lateFeeAmount ) - discount) - paidAmount ;

		if(netBalanceAmt >= actualFeeAmount){
			alert('  Balance Amount : '+netBalanceAmt+' Is  Must be Less than Monthly Fee Amount : '+actualFeeAmount);
			return false;
		}


		for(var i=0; i < monCheckedCount ; i++){
			var balAmt = 0 ,lateFeeAmt=0 ,
			paidAmt = actualFeeAmount - eachMonthFeeDiscount ,
			paidMonthName = checkMonthObj[i] ;
				// console.log('checkMonthObj[i]');


				// check month in Late checked Month Array 
				if(checkMonthLateObj.indexOf(paidMonthName) != -1 ){
					lateFeeAmt = actualLateFeeAmount;
				} 

				if( i == monCheckedCount-1){
					actualFeeAmount 

					 -= netBalanceAmt;
					balAmt = netBalanceAmt;
				}
				// var totalPaidAmount = ((feeAmount + lateFeeAmount)-discount);

				htm += '<tr>';
				htm += '<td>' + reciept + '</td>';
				htm += '<td>' + enroll  + '</td>';
				htm += '<td>' + actualFeeAmount  + '</td>';
				htm += '<td>' + balAmt  + '</td>';
				htm += '<td>' + paidMonthName  + '</td>';
				htm += '<td>' + frequency  + '</td>';
				htm += '<td>' + mode  + '</td>';
				htm += '<td>' + cheqNo  + '</td>';
				htm += '<td>' + lateFeeAmt  + '</td>';
				htm += '<td>' + eachMonthFeeDiscount  + '</td>';
				htm += '<td>' + reason  + '</td>';
				htm += '<td>' + bank  + '</td>';
				htm += '<td>' + chequedate  + '</td>';
				htm += '<td><button >delete</button></td>';

				htm += '</tr>';
				
			}
			$('#addfeesection').append(htm);


			var html ="<div class='col l4'><label  class='font-weight100 small-caps full-width'>Net total Amount</label><span>" + netTotal + 
			"</span></label></div>";
			// alert (html);
			document.getElementById('totalamountsection').innerHTML = html;
		


		}else {

			feeAmount 		= parseFloat(DX.eByIdVal('totalAmount')) > 0 ? parseFloat(DX.eByIdVal('totalAmount')) : 0 ;
			paidAmount 		= parseFloat(DX.eByIdVal('paidAmount')) > 0 ? parseFloat(DX.eByIdVal('paidAmount')) : 0 ;
			lateFeeAmount 	= parseFloat(DX.eByIdVal('totalLateAmount')) > 0 ? parseFloat(DX.eByIdVal('totalLateAmount')) : 0 ;
			discount 		= parseFloat(DX.eByIdVal('discount')) > 0 ? parseFloat(DX.eByIdVal('discount')) : 0 ;
			var balance  	= ( ( feeAmount + lateFeeAmount ) - discount ) - paidAmount ;			
			


			// var netAmount 		= ((feeAmount + lateFeeAmount) - discount) - paidAmount ;

			var netVal = feeAmount +lateFeeAmount;

	var new_row = '<td>'+reciept+'</td><td>'+enroll+'</td><td>'+paidAmount+'</td><td>'+balance+'</td><td>'+feeType+
	'</td><td>'+frequency+'</td><td>'+mode+'</td><td>'+cheqNo+'</td><td>'+lateFeeAmount+'</td><td>'+discount+'</td><td>'
	+reason+'</td><td>'+bank+'</td><td>'+chequedate+'</td><td><button >delete</button> '  ;

	var trNode = document.createElement('tr');
	trNode.innerHTML = new_row;
	document.getElementById('addfeesection').appendChild(trNode);
	var html = "";
	html ="<div class='col l4'><label  class='font-weight100 small-caps full-width'>Net total Amount</label><span>" + paidAmount + 
	"</span></label></div><div class='col l4'><label  class='font-weight100 small-caps full-width'>Transaction Date</label><input type='date' id='tranDate' name='tranDate' class='full-width' value='<?php echo Date('Y-m-d')?>' required='required'> </div>";
	//html ="<div class='col l4'><label  class='font-weight100 small-caps full-width'>Transaction Date</label><input type='date' class='full-width' required='required'> </div>" ;

 				   // alert (html);
 				   document.getElementById('totalamountsection').innerHTML = html;
 				  
 				}



 			};

 			function addFeeSubmit(){

 				var     reciept  =DX.eByIdVal('reciept'),
 				enroll   = DX.eByIdVal('enroll'),
 				paid 	 = DX.eByIdVal('paidAmount'),
 				totalAmount = DX.eByIdVal('totalAmount'),
 				balance  = totalAmount - paid ,			
 				feeType  = DX.eByIdVal('feeType'),
 				frequency = DX.eByIdVal('frequency'),
 				mode     = DX.eByIdVal('mode'),
 				cheqNo   = DX.eByIdVal('chequeno'),
 				lfee     = DX.eByIdVal('totalLateAmount'),
 				discount =DX.eByIdVal('discount'),
 				reason   = DX.eByIdVal('reasone'),
 				bank     = DX.eByIdVal('bankname'),
 				chequedate = DX.eByIdVal('chequedate');
 				$tranDate  = document.getElementById('tranDate').value

 				netAmount = totalAmount + lfee ;

 			}









 			function insertFee (){

 				var feeRowArr = [];
 				var feeHeadArr = ['reciept','enroll','paid','balance','feeType','frequency','mode','cheqNo','lfee','discount','reason','bankname','chequedate','delete','tranDate'];
 				document.querySelectorAll('#addfeesection tr').forEach(function(feeTr){
 					var feeRowObj ={};
 					var i = 0 ;
 					feeTr.querySelectorAll('td').forEach(function(feeTd){
 						feeRowObj[feeHeadArr[i]] = feeTd.innerHTML;
 						i++;			
 					});
 					feeRowArr.push(feeRowObj);
 				});

 				var CallBackFn = function(){
 					// alert($responseArr);

 				};

 				AjaxPost('insertFeeCtrl.php',feeRowArr,CallBackFn,'txt');

				

 			};



	// function deletefee(){
	// 	var reciept =DX.eByIdVal('reciept'),
	// 	enroll   = DX.eByIdVal('enroll'),
	// 	paid 	 = DX.eByIdVal('paidAmount'),
	// 	totalAmount = DX.eByIdVal('totalAmount'),
	// 	balance  = totalAmount - paid ,			
	// 	feeType  = DX.eByIdVal('feeType'),
	// 	frequency = DX.eByIdVal('frequency'),
	// 	mode     = DX.eByIdVal('mode'),
	// 	cheqNo = DX.eByIdVal('chequeno'),
	// 	lfee  = DX.eByIdVal('totalLateAmount'),
	// 	discount =DX.eByIdVal('discount'),
	// 	reason  = DX.eByIdVal('reasone'),
	// 	bank  = DX.eByIdVal('bankname'),
	// 	chequedate = DX.eByIdVal('chequedate');
	// 	netAmount = totalAmount + lfee ;


	// 	callBackFun = function(res){
	// 		alert ("hiii");
	// 		// document.getElementById('filter-data').innerHTML = res;
	// 	};

	// 	AjaxPost('insertFeeCtrl.php',{reciept:reciept,enroll:enroll,totalAmount:totalAmount,balance:balance,feeType:feeType,frequency:frequency,mode:mode,cheqNo:cheqNo,lfee:lfee,discount:discount,reason:reason,bank:bank,chequedate:chequedate,},callBackFun,'txt');


	// }







	function calculateNetFee(){
		var x = document.getElementById('netAmount').value;
		var y = getElementById('totalLateAmount').value;
		var total = x + y;
		alert(total);
	}

</script>
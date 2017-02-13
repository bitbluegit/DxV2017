<?php require_once '../../includes/header.php';

$voucher_query="select EXP.`receipt_no` FROM clg_expenses EXP ORDER BY EXP.`receipt_no` DESC LIMIT 1 ";
$voucher_no_data = DB::oneRow($voucher_query);
$reciept_no = $voucher_no_data['receipt_no'] + 1 ;
  // echo $reciept_no;
?>

<!-- Transaction Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
        <i class="ion-android-settings margin-right20"></i>
        Expenses
    </h5>
    <!-- Expense Form -->
    <form class="row" id="row" method="post" action="genrateExpCtrl.php">
        <!-- Voucher -->
        <div class="col m12 l4">
            <label for="voucher" class="font-weight100 small-caps full-width">Voucher No.</label>
            <input type="number" id="voucher" name="voucher" class="full-width" value="<?php echo $reciept_no; ?>" readonly>
        </div>

        <!-- Date -->
        <div class="col m12 l4">
            <label for="date" class="font-weight100 small-caps full-width">Today's Date</label>
            <input type="date" id="date" name="date" class="full-width" value="<?php echo date('Y-m-d'); ?>" title="Select today's date.">
        </div>

        <!-- Branch -->
        <div class="col m12 l4">
            <label for="branch" class="font-weight100 small-caps full-width">Branch Name</label>
            <select id="brach" name="branch" class="full-width" title="Select your branch name.">
                <option></option>
                <option>Nalasopara</option>
            </select>
        </div>

        <!-- Title -->
        <div class="col m12 l4">
            <label for="title" class="font-weight100 small-caps full-width">Title</label>
            <input type="text" id="title" name="title" class="full-width"  title="Enter expense title e.g. uniform, water etc." required="required">
        </div>

        <!-- Name -->
        <div class="col m12 l4">
            <label for="name" class="font-weight100 small-caps full-width">Name</label>
            <input type="text" id="name" name="name" class="full-width" title="Enter name of the payee." required="required">
        </div>

        <!-- Mode -->
        <div class="col m12 l4">
            <label for="mode" class="font-weight100 small-caps full-width">Mode</label>
            <select id="mode" name="mode" onchange="getChequeDetails()" class="full-width" title="Select your payment mode.">
                <option value="Cash">Cash</option>
                <option value="Cheque">Cheque</option>
            </select>
        </div>




        <!-- Cheque Fileds -->
        <div id="chequedetailsFields" style="display: none">
            <!-- cheque no -->
            <div class="col m12 l4">
                <label for="chequeno" class="font-weight100 small-caps full-width">Cheque Number</label>
                <input type="number" id="chequeno" name="chequeno" class="full-width"  title="Enter Cheque Number.">
            </div>
            <!-- Bank Name -->
            <div class="col m12 l4">
                <label for="bankname" class="font-weight100 small-caps full-width">Bank Name</label>
                <input type="text" id="bankname" name="bankname" class="full-width" title="Enter bank name ">
            </div>
            <!-- cheque date -->
            <div class="col m12 l4">
                <label for="chequedate" class="font-weight100 small-caps full-width">Cheque Date</label>
                <input type="date" id="chequedate" name="chequedate" class="full-width" title="Select Cheque Date ">
            </div>
        </div> <!-- chequedetailsFields -->



        <!-- Particular Items Filed Block  -->
        <section id="dynamicInput">

            <div>
                <!-- Particular -->
                <div class="col m12 l4">
                    <label for="particular" class="font-weight100 small-caps full-width">Particular</label>
                    <input type="text" id="particular"  name="myParticular" class="full-width"  title="Enter particular name e.g. pen, stationary etc.">
                </div>
                <!-- Amount -->
                <div class="col m12 l4">
                    <label for="amount" class="font-weight100 small-caps full-width">Amount</label>
                    <input type="text" id="amount"  name="expAmount"    class="full-width expAmountCalculate" onkeyup="expAmountCalculate()" title="Enter particular amount.">
                </div>
                <!-- Add Button -->
                <div class="col m12 l4">
                    <label>&nbsp;</label><br>
                    <button type="button" onClick="addInput();" class="btn btn-blue" title="Add more particular.">
                        <i class="ion-android-add"></i>
                    </button>
                <!-- <button type="button" onClick="removeInput('dynamicInput');" class="btn btn-red" title="Remove Particular.">
                    <i class="ion-close"></i>
                </button> -->
            </div>
        </div>

        <!-- ADDED FILED COME HERE  -->

    </section>  <!-- Particular Items Filed Block End -->


    <!-- remark and total amount -->
    <div class="col m12 l4">
        <label for="remark" class="font-weight100 small-caps full-width">Remark</label>
        <input type="text" id="remark" name="remark" class="full-width"  title="Enter expense title e.g. uniform, water etc.">
    </div>

    <!-- Name -->
    <div class="col m12 l4">
        <label for="total" class="font-weight100 small-caps full-width">Total</label>
        <input type="number" id="totalExpAmount" name="totalExpAmount" readonly="readonly" class="full-width" >
    </div>


    <!-- Submit Button -->
    <div class="col m12 pad-top10 txt-left">
        <button type="submit" class="btn bg-grey txt-ash full-width">
            <i class="ion-android-send"></i>
            Generate Expense
        </button>
    </div>
</form>
</div>


<!-- TEMPLATE  -->


<div id="exp-template" style="display: none;">
    <div>
        <!-- Particular -->
        <div class="col m12 l4">
            <label for="particular" class="font-weight100 small-caps full-width">Particular</label>
            <input type="text" id="particular"  name="myParticular" class="full-width"  title="Enter particular name e.g. pen, stationary etc.">
        </div>
        <!-- Amount -->
        <div class="col m12 l4">
            <label for="amount" class="font-weight100 small-caps full-width">Amount</label>
            <input type="text" id="amount"  name="expAmount"  class="full-width expAmountCalculate"  onkeyup="expAmountCalculate()" title="Enter particular amount.">
        </div>
        <!-- Add Button -->
        <div class="col m12 l4">
            <label>&nbsp;</label><br>
            <button type="button" onClick="addInput();" class="btn btn-blue" title="Add more particular.">
                <i class="ion-android-add"></i>
            </button>
            <button type="button" onClick="removeInput(this);" class="btn btn-red" title="Remove Particular.">
                <i class="ion-close"></i>
            </button>
        </div>
    </div>
</div> <!-- template end  -->

</div> <!-- /Container -->

<script src="../../../assets/js/app.js"></script>

<script type="text/javascript">

 function addInput(){
    var htm = eById('exp-template').innerHTML;
    var div = document.createElement('div');
    div.innerHTML = htm;
    document.getElementById('dynamicInput').appendChild(div);
}

 // romove fields
  function removeInput(obj){
    obj.parentElement.parentElement.remove();
}

// get cheuque details fields on mode change
function getChequeDetails(){
    var stmt = eIdVal('mode') == "Cheque" ? 'display:block' : 'display:none';
    setStyleById('chequedetailsFields',stmt);
}

function  expAmountCalculate(){
    // get The total of all exp amounts
    var totalExpAmount = 0 ; 
    document.getElementsByName('expAmount').forEach(function(element) {
        totalExpAmount += parseFloat(element.value) > 0 ?  parseFloat(element.value) : 0 ;
    });
    eById('totalExpAmount').value = totalExpAmount;
}  

</script>
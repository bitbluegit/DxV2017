<?php require_once '../../includes/header.php'; ?>

<!-- Transaction Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
        <i class="ion-android-settings margin-right20"></i>
       Expense Filter
    </h5>
    <!-- Expense Form -->
    <form class="row" method="post" name="expenses-filter" id="expenses-filter" action="#" onsubmit="return false">
        <!-- Start Date -->
        <div class="col m12 l4">
            <label for="startdate" class="font-weight100 small-caps full-width">Start Date</label>
            <input type="date" id="startdate" name="startdate" class="full-width" title="Select Start date.">
        </div>

        <!--End Date -->
        <div class="col m12 l4">
            <label for="mode" class="font-weight100 small-caps full-width">Payment Method</label>
            <select id="mode" name="mode" class="full-width" title="Select Payment Method.">
                <option value="Cash">Cash</option>
                <option value="Cheque">Cheque</option>
            </select>
        </div>

        <!-- Name -->
        <div class="col m12 l4">
            <label for="name" class="font-weight100 small-caps full-width">Name</label>
            <input type="text" id="name" name="name" class="full-width" placeholder="Enter payee Name" title="Enter Payee Name..">
        </div>


        <!-- Submit Button -->
        <div class="col m12 pad-top10 txt-left">
            <button type="submit" class="btn bg-grey txt-ash full-width" onclick="filterExpense()">
                <i class="ion-android-send"></i>
                Submit
            </button>
        </div>
    </form>
</div>

<!-- ENquiry details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-ios-paper-outline margin-right20"></i>
    Created Expenses
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
    <table class="full-width margin-bottom-zero">
        <thead>
            <tr class="txt-ash">
                <th >Sr No.</th>
                <th >Title</th>
                <th>Name</th>
                <th>Date</th>
                <th >Mode</th>
                <th >Amount</th>
                <th>Print / Delete</th>

            </tr>        
        </thead>

        <tbody id="filter-data">

            <?
            $sql = "SELECT EXP.`receipt_no`, EXP.`title`,EXP.`to` AS NAME,EXP.`date`,EXP.`mode`,EXP.`amount`,EXP.`receipt_no` AS  SrNo  FROM clg_expenses EXP ORDER BY EXP.`receipt_no` DESC";
            $data  = DB::allRow($sql);
            if($data){
                foreach ($data as $row) {
                  $receipt_no = array_pop($row);

                  $btn = "<button class='btn btn-green' onclick='printExpense({$receipt_no})'><i class='ion-ios-printer'></i>
              </button>
              <button class='btn btn-red' onclick='deleteExpense({$receipt_no})'><i class='ion-trash-b'></i> </button>"; 
              echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$row),$btn);
          }
      }else{
        echo '<tr><td colspan="9" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No Expenses Found !<td></tr>';
    }
    ?>




           <!--  <tr>                               
                <td >Admin</td>
                <td >001</td>
                <td >14</td>
                <td >hr</td>
                <td >ar</td>
                <td >First</td>
                <td >a</td>
                <td >-</td>
                <td >12/12/2016</td>                                
            </tr> -->

        </tbody>
    </table>
</div>



</div> <!-- /Container -->


<!-- scripts  -->
<script src="../../../assets/js/app.js"></script>
<script src="expenseFilter.js"></script>

<script type="text/javascript">
// reprint
function printExpense(srno){
 var receipt_no = srno;
                   // alert(receipt_no);
                   window.location.href ="printExpenses.php?srno="+receipt_no+""

                };

// delete bonafide

function deleteExpense(srno){

    var ok = confirm("Are You Sure To Delete?")
    if (ok)   {     

        var params = {} ,
        fn = function(){
             // alert('hello');
         }; 

         params.receipt_no = srno;

         AjaxPost('deleteExpense.php',params,fn,'txt');

         window.location.href= "expensesReport.php";
     };
 }

</script>


<?php
require_once '../../includes/footer.php';

?>


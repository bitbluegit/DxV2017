<?php require_once '../../includes/header.php'; ?>


<!-- Transaction Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
        <i class="ion-android-settings margin-right20"></i>
        Add Exam
    </h5>
    <!-- Expense Form -->
    <form class="row" id="row" method="post" action="addExamCtrl.php">
        <!-- Voucher -->
        <div class="col m12 l4">
            <label for="medium" class="font-weight100 small-caps full-width">Medium</label>
            <select  id="medium" name="medium" class="full-width" required="required">
            <option value="" disabled selected>Select Medium</option>
         <?php foreach($GLOBALS['MEDIUM'] as $mdm){echo sprintf("<option value='%s'>%s</option>",$mdm,$mdm); } ?>

            </select>
        </div>

        <!-- Date -->
        <div class="col m12 l4">
            <label for="standard" class="font-weight100 small-caps full-width">Standard</label>
            <select " id="standard" name="standard" class="full-width"  title="Select today's date." required="required">
            <option value="" disabled selected> Select Standard</option>
		        <?php foreach($GLOBALS['STD'] as $std){ echo sprintf("<option value='%s'>%s</option>",$std,$std); } ?>
            </select>
        </div>

        <!-- Branch -->
        <div class="col m12 l4">
            <label for="exmName" class="font-weight100 small-caps full-width">Exam Name</label>
            <input id="exmName" name="exmName" class="full-width" title="Enter Your Exam Name." placeholder="Enter Your Exam Name">
                
        </div>

       
        <!-- Particular Items Filed Block  -->
        <section id="dynamicInput">
           
            <div>
                <!-- Subject Name -->
                <div class="col m12 l3">
                    <label for="subject" class="font-weight100 small-caps full-width">Subject Name</label>
                    <input type="text" id="subject"  name="subject[]" class="full-width"  title="Enter subject name e.g. pen, stationary etc." placeholder="Enter Subject Name">
                </div>
                <!-- Written marks -->
                <div class="col m12 l3">
                    <label for="written" class="font-weight100 small-caps full-width">Written Marks</label>
                    <input type="number" id="written"  name="written[]"    class="full-width expAmountCalculate"placeholder="Enter Marks"  title="Enter subject amount.">
                </div>

                <!-- Oral marks -->
                <div class="col m12 l3">
                    <label for="oral" class="font-weight100 small-caps full-width">Oral Marks</label>
                    <input type="number" id="oral"  name="oral[]"  class="full-width expAmountCalculate"  title="Enter subject amount. placeholder = "Enter Marks"">
                </div>
                <!-- Add Button -->
                <div class="col m12 l3">
                    <label>&nbsp;</label><br>
                    <button type="button" onClick="addInput();" class="btn btn-blue" title="Add more subject.">
                        <i class="ion-android-add"></i>
                    </button>
                <!-- <button type="button" onClick="removeInput('dynamicInput');" class="btn btn-red" title="Remove Particular.">
                    <i class="ion-close"></i>
                </button> -->
            </div>
        </div>

        <!-- ADDED FILED COME HERE  -->

    </section>  <!-- Particular Items Filed Block End -->    


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
        <div class="col m12 l3">
            <label for="subject" class="font-weight100 small-caps full-width">Subject Name</label>
            <input type="text" id="subject"  name="subject[]" class="full-width"  title="Enter subject name e.g. pen, stationary etc." placeholder="Enter Subject Name">
        </div>
        <!-- written mark -->
        <div class="col m12 l3">
            <label for="written" class="font-weight100 small-caps full-width">Written Mark</label>
            <input type="text" id="written"  name="written[]"  class="full-width expAmountCalculate" placeholder="Enter Marks"  title="Enter subject amount.">
        </div>

          <!-- oral mark -->
        <div class="col m12 l3">
            <label for="oral" class="font-weight100 small-caps full-width">Oral Mark</label>
            <input type="text" id="oral"  name="oral[]"  class="full-width expAmountCalculate" placeholder="Enter Marks"  title="Enter subject amount.">
        </div>
        <!-- Add Button -->
        <div class="col m12 l3">
            <label>&nbsp;</label><br>
            <button type="button" onClick="addInput();" class="btn btn-blue" title="Add more subject.">
                <i class="ion-android-add"></i>
            </button>
            <button type="button" onClick="removeInput(this);" class="btn btn-red" title="Remove Particular.">
                <i class="ion-close"></i>
            </button>
        </div>
    </div>
</div> <!-- template end  -->



<!-- ****************************
**** View Class data Block  ****
******************************-->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="view-class-data-block">

  <!-- Title -->
  <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-ios-paper-outline margin-right20"></i>
    Created Exams
  </h5>

  <!-- Class Details Table Block -->
  <div class="class-detail-table">

    <table class="full-width margin-bottom-zero">
      <thead>
        <tr class="txt-ash"> <th>User</th> <th>Medium</th> <th>Standard</th> <th>Exam Name</th>  <th>View/Delete</th>
        </tr>      
      </thead>
      <tbody id="class-details-tbody">
        <?php 

      // User Details 
        $sql = " SELECT DISTINCT AD.`uname` AS 'user', SE.`mdm`,SE.`std`,SE.`exam_name`
 				FROM sch_exams SE
 				INNER JOIN admin_sch AD ON AD.`unique_id` = SE.`unique_id`
        ";
        $result = DB::allRow($sql);
        extract($result);
        foreach ($result as $exam){

         $btn = "<button class='btn btn-green' onclick='viewExam({$exam_id})'>View </button> &nbsp 
         			<button class='btn btn-red' onclick='deleteExam({$exam_id})'><i class='ion-trash-b'></i>
         			 </button>";
         echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$exam),$btn);
       }
       ?>
       

     </tbody>
   </table>



</div> <!-- /Container -->

<!-- <script src="../../../assets/js/app.js"></script> -->
<?php require_once '../../includes/footer.php'; ?>

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


function viewExam(id){
	alert(id);
}



</script>
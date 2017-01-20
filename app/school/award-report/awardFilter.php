<?php require_once '../../includes/header.php'; ?>

<!-- Transaction Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
        <i class="ion-android-settings margin-right20"></i>
        Bonafide
    </h5>
    <!-- Expense Form -->
    <form class="row" method="post" name="award-filter" id="award-filter" action="#" onsubmit="return false">
        <!-- Start Date -->
        <div class="col m12 l4">
            <label for="startdate" class="font-weight100 small-caps full-width">Start Date</label>
            <input type="date" id="startdate" name="startdate" class="full-width" title="Enter User Name.">
        </div>

        <!--End Date -->
        <div class="col m12 l4">
            <label for="enddate" class="font-weight100 small-caps full-width">End Date</label>
            <input type="date" id="enddate" name="enddate" class="full-width" title="Enter Password.">
        </div>

        <!-- Name -->
        <div class="col m12 l4">
            <label for="name" class="font-weight100 small-caps full-width">Name</label>
            <input type="text" id="name" name="name" class="full-width" title="Enter Student name..">
        </div>

        <!-- enroll no -->
        <div class="col m12 l4">
            <label for="enroll" class="font-weight100 small-caps full-width">Enroll No.</label>
            <input type="number" id="enroll" name="enroll" class="full-width" title="Enter Student Enroll No..">
        </div>



        <!-- Standard -->
        <div class="col m12 l4">
            <label for="standard" class="font-weight100 small-caps full-width">Standard</label>
            <select id="standard" name="standard" class="full-width" title="Select Your Standatd.">
                <option value="" disabled selected>Select One</option>
                <?php foreach($GLOBALS['STD'] as $std){ echo sprintf("<option value='%s'>%s</option>",$std,$std); } ?>
            </select>
        </div>



        <!-- Submit Button -->
        <div class="col m12 pad-top10 txt-left">
            <button type="submit" class="btn bg-grey txt-ash full-width" onclick="filterBonafideForPrint()">
                <i class="ion-android-send"></i>
                Submit
            </button>
        </div>
    </form>
</div>

<!-- ENquiry details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-ios-paper-outline margin-right20"></i>
    Created Bonafide
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
    <table class="full-width margin-bottom-zero">
        <thead>
            <tr class="txt-ash">     
                <th >User Name</th>
                <th >Enroll No.</th>
                <th >Name</th>
                <th >Medium</th>
                <th >Standard</th>
                <th >Division</th>
                <th >Name Of competition</th>
                <th >remark</th>
                <th>Date</th>
                <th>Print / Delete</th>

            </tr>        
        </thead>

        <tbody id="filter-data">

            <?
            $sql = " SELECT AD.`name` AS 'user_name' ,AW.`gr_no`, AW.`name` AS 'stu_name' ,AW.`mdm`,
            AW.`std`,AW.`section`,AW.`name_of_competition`,AW.`remark` ,  DATE_FORMAT(AW.`date`,'%d/%m/%Y') AS 'date' ,
            AW.`sr_no` AS sr_no
            FROM sch_awards AW 
            INNER JOIN admin_sch AD ON AD.`unique_id` = AW.`unique_id`";
           $data  = DB::allRow($sql);
if($data){
    foreach ($data as $row) {
          $sr_no = array_pop($row);

         $btn = "<button class='btn btn-green' onclick='printAward({$sr_no})'><i class='ion-ios-printer'></i>
          </button>&nbsp;
          <button class='btn btn-red' onclick='deleteAward({$sr_no})'><i class='ion-trash-b'></i> </button>"; 
           echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$row),$btn);
       }
}else{
    echo '<tr><td colspan="9" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No Bonafide Found !<td></tr>';
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



</div>
<!-- /Container -->


<!-- scripts  -->
<script src="../../../assets/js/app.js"></script>
<script src="awardfilter.js"></script>

<script type="text/javascript">
// reprint
   function printAward(srno){
                    var sr_no = srno;
                   //alert(sr_no);
                    window.location.href ="rePrintAward.php?srno="+sr_no+""


       };

// delete bonafide

     function deleteAward(srno){
        // alert(srno);

        var ok = confirm("Are You Sure To Delete?")
        if (ok)   {     

        var params = {} ,
        fn = function(){
             // alert('hello');
                      }; 

         params.sr_no = srno;

         AjaxPost('deleteAward.php',params,fn,'txt');

window.location.href= "awardFilter.php";
                 };
             }

</script>
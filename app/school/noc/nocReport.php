<?php require_once '../../includes/header.php'; ?>

<!-- Transaction Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
        <i class="ion-android-settings margin-right20"></i>
        Noc Filter
    </h5>
    <!-- noc filter Form -->
    <form class="row" method="post" name="noc-filter" id="noc-filter" action="#" onsubmit="return false">
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
            <button type="submit" class="btn bg-grey txt-ash full-width" onclick="filterNoc()">
                <i class="ion-android-send"></i>
                Submit
            </button>
        </div>
    </form>
</div>

<!-- ENquiry details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-ios-paper-outline margin-right20"></i>
    Created NOC
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
    <table class="full-width margin-bottom-zero">
        <thead>
            <tr class="txt-ash">     
                <th >User Name</th>
                <th >Enroll No.</th>
                <th >Sr No.</th>
                <th >Name</th>                
                <th >Standard</th>
                <th >Medium</th>
                <th >Held Year</th>
                <th >letter no.</th>
                <th>Date</th>
                <th>Issue Date</th>
                <th> Print / Delete</th>

            </tr>        
        </thead>

        <tbody id="filter-data">

            <?
            $sql = "  SELECT AD.`Name`,NOC.`Gr_no`, NOC.`noc_no`,NOC.`name`,NOC.`Std`,SC.`Medium`,NOC.`held_year`,
            NOC. `letter_no`,NOC.`date`,NOC.`issue_date`, NOC.`noc_no` AS sr_no FROM sch_noc NOC
            INNER JOIN admin_sch AD ON NOC.`unique_id`= AD.`unique_id`
            INNER JOIN user_sch SC ON SC.`Gr_num`=NOC.`Gr_no`";
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
        echo '<tr><td colspan="10" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No NOC Found !<td></tr>';
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
<script src="nocReport.js"></script>
<script type="text/javascript">
    function printNOC(srno){
        // alert(srno);
        var sr_no = srno;
         //alert(sr_no);
         window.location.href ="rePrintNoc.php?srno="+sr_no+""

     };

     function deleteNOC(srno){
        // alert(srno);

        var ok = confirm("Are You Sure To Delete?")
        if (ok)   {     

            var params = {} ,
            fn = function(){
             // alert('hello');
         }; 

         params.sr_no = srno;

         AjaxPost('deleteNOC.php',params,fn,'txt');

         window.location.href= "nocReport.php";
     };
 }
</script>
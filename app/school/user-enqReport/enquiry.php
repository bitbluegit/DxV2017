<style type="text/css">

    div.modal{ 
        position: fixed; top: 0; right: 0; bottom: 0; left: 0; z-index: 1050; 
        overflow: hidden; outline: 0; display: block; background-color: rgba(0,0,0,.7); 
    }

    div.modal-content {
        position: fixed; top: 20%; width: 50%; margin-left: 25%; border: 1px solid #ccc;
        box-shadow: 2px 2px 2px #000; padding: 20px; background-color: #fff; 
    } 
    div.hideDiv { display: none;}


</style>

<?php 

require_once '../../includes/usr_sch_header.php'; 

/********************
** GET SCHOOL USER **
********************/

$schUserData = DB::allRow(" SELECT AD.`unique_id` AS 'user_id' ,  AD.`Name`  AS 'user_name'
    FROM admin_sch AD WHERE AD.type='School' ORDER BY AD.`Name` ") ;
$schUserOpts = "" ;
foreach ($schUserData as $data) {
 $schUserOpts .= sprintf("<option value='%s'>%s </option>",$data['user_id'],$data['user_name']); 
}


?>

<!-- Popup Modal Div -->

<div class="modal x y z hideDiv" >
    <div class="modal-content">
        <div class="col m12 l6">
         <label for="remark" class="font-weight100 small-caps full-width">Remark</label>
         <textarea class="full-width"  id="remark" name="remark" title="Add Remark"  placeholder="Update Remark" style="width: 400px;">
         </textarea>

         <button type="submit" class="btn bg-blue txt-black  " onclick="updateRemarkSubmit()" style="margin-top: 10px;">
            <i class="ion-android-send"></i>
            Submit
        </button>
    </div>

</div>
</div>


<!-- Modal End -->



<!-- Transaction Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
        <i class="ion-android-settings margin-right20"></i>
        Enquiry Filter
    </h5>
    <!-- Expense Form -->
    <form class="row" method="post" name="eqnuiry-filter" id="eqnuiry-filter" action="#" onsubmit="return false">
        <!-- Start Date -->
        <div class="col m12 l4">
            <label for="startdate" class="font-weight100 small-caps full-width">Start date</label>
            <input type="date" class="full-width"  id="startdate" name="startdate" title="Select Start date.">
        </div>

        <!--End Date -->
        <div class="col m12 l4">
            <label for="enddate" class="font-weight100 small-caps full-width">End Date</label>
            <input type="date" id="enddate" name="enddate" class="full-width" title="Select End date.">
        </div>

        <!-- User Name -->
        <div class="col m12 l4">
            <label for="username" class="font-weight100 small-caps full-width">User Name</label>
            <select id="username" name="username" class="full-width" title="Select User name.">
                <option value="" disabled selected>Select User</option>
                <?php echo $schUserOpts; ?>
            </select>
        </div>


        <!-- Medium -->
        <div class="col m12 l4">
            <label for="medium" class="font-weight100 small-caps full-width">Medium</label>
            <select id="medium" name="medium" class="full-width" title="Select your medium.">
                <?php foreach($GLOBALS['MEDIUM'] as $mdm){echo sprintf("<option value='%s'>%s</option>",$mdm,$mdm); } ?>
            </select>
        </div>

        <!-- standard -->
        <div class="col m12 l4">
            <label for="standard" class="font-weight100 small-caps full-width">Standard</label>
            <select id="standard" name="standard" class="full-width" title="Select your Standard.">
             <option value="" disabled selected>Select Std</option>
             <?php foreach($GLOBALS['STD'] as $std){ echo sprintf("<option value='%s'>%s</option>",$std,$std); } ?>
         </select>
     </div>


     <!-- Submit Button -->
     <div class="col m12 pad-top10 txt-left">
         <button type="submit" class="btn bg-grey txt-ash full-width" onclick="filterEnquiry()">
            <i class="ion-android-send"></i>
            Submit
        </button>
    </div>
</form>
</div>

<!-- ENquiry details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-ios-paper-outline margin-right20"></i>
    Enquiry Details
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
    <table class="full-width margin-bottom-zero">
        <thead>
            <tr class="txt-ash">     
                <th>Enquiry No.</th> <th>User name</th> <th>Student Name</th> <th>Father Name</th> <th>Medium</th>
                <th>Standard</th> <th>Contact No.</th> <th>Address</th>
                <th>Date</th> <th>Remark</th> <th>Update</th>
            </tr>                                
        </thead>
        <tbody id="filter-data">

            <?php

            $sql = " SELECT
            EQ.sr_no ,EQ.name AS 'user_name' , EQ.name AS 'stu_name' , EQ.f_name ,  EQ.medium,EQ.std , EQ.cont_num,  EQ.address,
            DATE_FORMAT(EQ.enq_date,'%Y/%m/%d') AS 'enq_date', EQ.remark, EQ.sr_no AS srNo
            FROM enquiry EQ 
            INNER JOIN admin_sch AD ON AD.unique_id = EQ.unique_id

            "; 

            $data  = DB::allRow($sql);
              if($data){
                foreach ($data as $row) {
                    $sr_no= array_pop($row);
                    $btn = "
                    <button class='btn btn-red' onclick='UpdateRemark({$sr_no})' title='Update Remark'><i class='ion-edit'></i> </button>";
                    echo sprintf('<tr><td>%s</td><td>%s</td></tr>',implode('</td><td>', $row),$btn);
                }
            }else{
                echo '<tr><td colspan="10" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No Enquiry Found !<td></tr>';
            }


            ?>
            <?php   echo $remark; ?>


        </tbody>
    </table>
</div>



</div>
<!-- /Container -->



<!-- scripts  -->
<script src="../../../assets/js/app.js"></script>
<script src="enquiry.js"></script>
<script type="text/javascript">
    function UpdateRemark(sr){
        var sr_no = sr;
        document.querySelector('.modal').classList.remove('hideDiv');
        callBackFun = function(res){
                    document.getElementById('remark').innerHTML = res;
                    // alert(res.message);
                };  
         AjaxPost('getRemark.php',{sr_no:sr_no},callBackFun,'json');  


            }

            function updateRemarkSubmit(){
                var remark = document.getElementById('remark').value;
                callBackFun = function(res){
                    // document.getElementById('filter-data').innerHTML = res;
                    alert(res.message);
                };
                AjaxPost('updateRemark.php',{remark:remark},callBackFun,'json');  
            }

        </script>

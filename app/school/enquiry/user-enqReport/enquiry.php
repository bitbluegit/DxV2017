<?php 

require_once '../../includes/header.php'; 

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
                <th>Standard</th> <th>Contact No.</th> <th>Address</th> <th>Remark</th> <th>Date</th>
            </tr>                                
        </thead>
        <tbody id="filter-data">

                           <!--  <tr>                               
                                <td>1</td>
                                <td>School</td>
                                <td>Ah</td>
                                <td>Ar</td>
                                <td>English</td>
                                <td>1<sup>st</sup></td>
                                <td>9874563212</td>
                                <td>Nallasopara</td>
                                <td>12/12/2016</td>
                            </tr>
                        -->                        
                    </tbody>
                </table>
            </div>



        </div>
        <!-- /Container -->


        <!-- scripts  -->
        <script src="../../../assets/js/app.js"></script>
        <script src="enquiry.js"></script>


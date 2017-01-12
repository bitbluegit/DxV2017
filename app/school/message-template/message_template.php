<?php require_once '../../includes/header.php'; ?>

<!-- Transaction Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
        <i class="ion-android-settings margin-right20"></i>
        Create Template
    </h5>
    <!-- Expense Form -->
    <form class="row"  method="post" action="" id="createClass" onsubmit="return false">                        
        <!--Title-->
        <div class="col ma12 l4">
            <label for="title" class="font-weight100 small-caps full-width">Title</label>
            <input type="text" id="title" name="title" class="full-width" title="Enter Message Title." required>
        </div>

        <!--Message-->
        <div class="col ma12 l4">
            <label for="message" class="font-weight100 small-caps full-width">Message</label>
            <input type="text" id="message" name="message" class="full-width" title="Enter Message Title." required>
        </div>

        <!--template for -->
        <div class="col m12 l4">
            <label for="section" class="font-weight100 small-caps full-width">Template For</label>
            <select id="section" name="section" class="full-width" title="Select One." required>
                <option value="" disabled selected>Select One</option>
                <option value="Common">All</option>
                <option value="School">School</option>
                <option value="College">College</option>
            </select>
        </div>                      

        <!-- Submit Button -->
        <div class="col m12 pad-top10 txt-left">
            <button type="submit" class="btn bg-grey txt-ash full-width"
            id="messageTmpSubmit" >
            <i class="ion-android-send"></i>
            Submit
        </button>
    </div>
</form>
</div>

<!-- ENquiry details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-ios-paper-outline margin-right20"></i>
    Message Template
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
    <table class="full-width margin-bottom-zero">        
        <thead>
            <tr class="txt-ash">
                <th>User Name</th>
                <th>Title</th>
                <th>Message</th>
                <th>Template For</th>
            </tr>
        </thead>

        <tbody id="filter-data">
            <?php 
            // User Details 
            $sql = "SELECT  AD.`name` , MT.`tpl_title` , MT.`tpl_txt` ,MT.`tpl_for`,  MT.`unique_id`
            FROM msg_template MT INNER JOIN admin_sch AD ON AD.`unique_id` = MT.`unique_id`";
            $userDataArr = DB::allRow($sql);
            foreach ($userDataArr as $user){
                $user_id = array_pop($user);

                echo sprintf("<tr><td>%s</td></tr>",implode('</td><td>',$user),$btn);
            }
            ?>

           <!--  <tr>                               
                <td>Admin</td>
                <td>Notice</td>
                <td>On Every Suturday There Will Be Half Day School Will Leave On 10:30 AM</td>
                <td>School</td>                               
            </tr> -->
           
        </tbody>
    </table>
</div>
    


</div>
<!-- /Container -->

<script src="../../../assets/js/app.js"></script>
<script src="message_template.js"></script>

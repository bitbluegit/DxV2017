<?php require_once '../../includes/clg_header.php'; ?>

<!-- Transaction Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
        <i class="ion-android-settings margin-right20"></i>
        LC Reports
    </h5>
    <!-- Expense Form -->
    <form class="row" method="post" name="lc-filter" id="lc-filter" action="#" onsubmit="return false">
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
            <input type="text" id="name" name="name" class="full-width" title="Enter student name.">
        </div>

        <!-- enroll no -->
        <div class="col m12 l4">
            <label for="enroll" class="font-weight100 small-caps full-width">Enroll No.</label>
            <input type="number" id="enroll" name="enroll" class="full-width" title="Enter Student Enroll No..">
        </div>



        <!-- Standard -->
        <div class="col m12 l4">
            <label for="course" class="font-weight100 small-caps full-width">Course</label>
            <select id="course" name="course" class="full-width" title="Select Your year.">
              <!--  <option value="F.Y.J.C">F.Y.J.C</option>
               <option value="S.Y.J.C">S.Y.J.C</option> -->
               <option value="Science">Science</option>
               <option value="Commerce">Comerce</option>
            </select>
        </div>



        <!-- Submit Button -->
        <div class="col m12 pad-top10 txt-left">
        <button type="submit" class="btn bg-grey txt-ash full-width" onclick="filterLc()">
                <i class="ion-android-send"></i>
                Submit
            </button>
        </div>
    </form>
</div>

<!-- ENquiry details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-ios-paper-outline margin-right20"></i>
    LC Reports
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
    <table class="full-width margin-bottom-zero">
       <thead>
            <tr class="txt-ash">     
                <th >LC No.</th>
                <th >Enroll No.</th>
                <th >Name</th>
                <th >Standard</th>
                <th >Remark</th>
                <th >Issue Date</th>
            </tr>           
       </thead>

        <tbody id="filter-data">

           <!--  <tr>                               
                <td >1</td>
                <td >001</td>
                <td >hr</td>
                <td >First</td>
                <td >-</td>
                <td >12/12/2016</td>                                
            --> </tr>
           

        </tbody>
    </table>
</div>



</div>
<!-- /Container -->



 <!-- scripts  -->
        <script src="../../../assets/js/app.js"></script>
        <script src="lcreport.js"></script>
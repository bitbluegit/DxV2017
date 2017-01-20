<?php require_once '../../includes/header.php'; ?>

<!-- Transaction Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
        <i class="ion-android-settings margin-right20"></i>
        LC Filter
    </h5>
    <!-- Expense Form -->
    <form class="row" method="post" name="oldlc-filter" id="oldlc-filter" action="#" onsubmit="return false">
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
                <option value="nursery">Nursery</option>
                <option value="junior.kg">jr.kg</option>
                <option value="senior.kg">sr.kg</option>
                <option value="first">First</option>
                <option value="second">Second</option>
                <option value="third">Third</option>
                <option value="fourth">Fourth</option>
                <option value="fifth">Fifth</option>
                <option value="sixth">Sixth</option>
                <option value="seventh">Seventh</option>
                <option value="eighth">Eighth</option>
                <option value="ninth">Ninth</option>
                <option value="tenth">Tenth</option>
                <option value="Mr.dextro">Mr.dextro</option>
            </select>
        </div>



        <!-- Submit Button -->
        <div class="col m12 pad-top10 txt-left">
            <button type="submit" class="btn bg-grey txt-ash full-width" onclick="filterOldLc()">
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
                <th >Enroll No.</th>
                <th >Gr No.</th>
                <th> Std</th>
                <th >Name</th>
                <th >Father Name</th>
                <th> Print / Delete </th>
            </tr>        
    </thead>

        <tbody id="filter-data">
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
        <script src="lcRePrint.js"></script>

<script type="text/javascript">
    function lcreprint(lcno)
  {
    alert(lcno);
  }


</script>
<?php require_once '../../includes/header.php'; ?>

<!-- Transaction Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
        <i class="ion-android-settings margin-right20"></i>
        Filter Bus Fee 
    </h5>
    <!-- Expense Form -->
    <form class="row" method="post" name="lc-filter" id="busfee-filter" action="#"
    onsubmit="return false">
    <!-- From Month Date -->
    <div class="col m12 l4">
        <label for="startdate" class="font-weight100 small-caps full-width">From Month</label>
        <input type="date" id="startdate" name="startdate" class="full-width" >
    </div>

    <!--to Month Date -->
    <div class="col m12 l4">
        <label for="enddate" class="font-weight100 small-caps full-width">To Month</label>
        <input type="date" id="enddate" name="enddate" class="full-width" title="">
    </div>

    <!--Medium-->
    <div class="col ma12 l4">
        <label for="medium" class="font-weight100 small-caps full-width">Medium</label>
        <select id="medium" name="medium" class="full-width" title="Select Your Medium.">
            <option value="" disabled selected>Select One</option>
            <option value="english">English</option>
            <option value="hindi">English</option>
            <option value="marathi">English</option>
        </select>
    </div>
    <!-- area name -->
    <div class="col m12 l4">
        <label for="standard" class="font-weight100 small-caps full-width">Standard</label>
        <select id="standard" name="standard" class="full-width" title="Select Your Medium.">
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

    <!--Fee Amount -->
    <div class="col m12 l4">
        <label for="section" class="font-weight100 small-caps full-width">Section</label>
        <select id="section" name="section" class="full-width" title="Select Your Medium.">
            <option value="" disabled selected>Select One</option>
            <option value="A">A</option>
            <option value="B">A</option>
        </select>
    </div>

    <!-- Late Fee -->
    <div class="col m12 l4">
        <label for="busstop" class="font-weight100 small-caps full-width">Bus Stop</label>
        <select id="busstop" name="busstop" class="full-width" title="Select Your Medium.">
            <option value="" disabled selected>Select One</option>
                <!-- php here -->
            <option>Railway Station</option>
        </select>
    </div>

    <!-- Submit Button -->
    <div class="col m12 pad-top10 txt-left">
        <button type="submit" class="btn bg-grey txt-ash full-width" onclick="filterBusFee()">
            <i class="ion-android-send"></i>
            Submit
        </button>
    </div>
</form>
</div>

<!-- ENquiry details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-ios-paper-outline margin-right20"></i>
    Created Bus Fee
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
    <table class="full-width margin-bottom-zero">
        <thead>
            <tr class="txt-ash">     
                <th >Area</th>
                <th >Amount</th>
                <th >Late Fee</th>
                <th>Fee Frequency</th>
                <th >Late Fee Frequency</th>
                <th >Created</t>                                
                </tr>
            <tr>                     
            
        </thead>
        <tbody id="filter-data">
                    <td >Nallasopara</td>
                    <td >500</td>
                    <td >20</td>
                    <td >Monthly</td>
                    <td >per day</td>
                    <td >12/12/2016</td>                                
                </tr>
               
            </tbody>
        </table>
    </div>



</div>
<!-- /Container -->





 <!-- scripts  -->
        <script src="../../../assets/js/app.js"></script>
        <script src="filter_bus_fee.js"></script>
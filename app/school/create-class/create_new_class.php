<?php require_once '../../includes/header.php'; ?>


<!-- ****************************
**** Create Class Main Block ****
***************************** -->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="create-new-class-block">
 
  <!-- Title -->
  <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-android-settings margin-right20"></i>
    Create New Class 
  </h5> 
  
  <!-- Create Class Form -->
  <form method="post" action="createClassCtrl.php" id="create-class-form" onsubmit="return false">

    <!-- ROW - 1  -->
    <div class="row">

      <!-- Medium -->
      <div class="col m12 l4">
        <label for="medium" class="font-weight100 small-caps full-width">Medium</label>
        <select id="medium" name="medium" class="full-width" title="Select your Medium." required>
          <option value="" disabled selected>Select One</option>
          <option value="english">English</option>
        </select>
      </div>

      <!-- Standard -->
      <div class="col m12 l4">
        <label for="standard" class="font-weight100 small-caps full-width">Standard</label>
        <select class="full-width" id="standard" name="standard"  title="Select your Standard." required>
          <option value="" disabled selected>Select One</option>
          <option value="first">First</option>
          <option value="second">Second</option>
          <option value="third">Third</option>
                    <option value="second">second</option>

        </select>
      </div>

      <!-- Division -->
      <div class="col m12 l4">
        <label for="division" class="font-weight100 small-caps full-width">Division Count</label>
        <input class="full-width" type="number" id="division" name="division"  placeholder="Enter " title="Enter Divsion Count." required>
      </div>

      <!-- Submit Button -->
      <div class="col m12 pad-top10 txt-left">
        <button type="submit" class="btn bg-grey txt-ash full-width" id="createClassSubmit">
          <i class="ion-android-send"></i>
          Submit
        </button>
      </div>

    </div><!-- ROW-1 END -->

  </form>

</section> <!-- create-new-class-block -->



<!-- ****************************
**** View Class data Block  ****
******************************-->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="view-class-data-block">

  <!-- Title -->
  <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-ios-paper-outline margin-right20"></i>
    Created Class
  </h5>

  <!-- Class Details Table Block -->
  <div class="class-detail-table">

    <table class="full-width margin-bottom-zero">
      <tbody id="class-details-tbody">
        
        <tr class="txt-ash">
          <th>User</th>
          <th>Medium</th>
          <th>Standard</th>
          <th>Division</th>
          <th>Strength</th>
          <th>Export/Upload</th>

        </tr>

        <tr>
          <td>Admin</td>
          <td>English</td>
          <td>1<sup>st</sup></td>
          <td>31</td>
          <td>1</td>                            
          <td>
           <button type="submit" class="btn btn-green" title="Add more particular.">
            <i class="ion-ios-arrow-thin-up"></i>
          </button>
          <button type="submit" class="btn btn-red" title="Remove particular.">
            <i class="ion-ios-arrow-thin-down"></i>
          </button>                                    
        </td>                                
      </tr>

      <tr>
        <td>Admin</td>
        <td>English</td>
        <td>1<sup>st</sup></td>
        <td>31</td>
        <td>1</td>                            
        <td>
         <button type="submit" class="btn btn-green" title="Add more particular.">
          <i class="ion-ios-arrow-thin-up"></i>
        </button>
        <button type="submit" class="btn btn-red" title="Remove particular.">
          <i class="ion-ios-arrow-thin-down"></i>
        </button>                                    
      </td>                                        
    </tr>
    
    <tr>
      <td>Admin</td>
      <td>English</td>
      <td>1<sup>st</sup></td>
      <td>31</td>
      <td>1</td>                            
      <td>
       <button type="submit" class="btn btn-green" title="Add more particular.">
        <i class="ion-ios-arrow-thin-up"></i>
      </button>
      <button type="submit" class="btn btn-red" title="Remove particular.">
        <i class="ion-ios-arrow-thin-down"></i>
      </button>                                    
    </td>                                      
  </tr>

  <tr>
    <td>Admin</td>
    <td>English</td>
    <td>1<sup>st</sup></td>
    <td>31</td>
    <td>1</td>                            
    <td>
     <button type="submit" class="btn btn-green" title="Add more particular.">
      <i class="ion-ios-arrow-thin-up"></i>
    </button>
    <button type="submit" class="btn btn-red" title="Remove particular.">
      <i class="ion-ios-arrow-thin-down"></i>
    </button>                                    
  </td>                                        
</tr>

<tr>
  <td>Admin</td>
  <td>English</td>
  <td>1<sup>st</sup></td>
  <td>31</td>
  <td>1</td>                            
  <td>
   <button type="submit" class="btn btn-green" title="Add more particular.">
    <i class="ion-ios-arrow-thin-up"></i>
  </button>
  <button type="submit" class="btn btn-red" title="Remove particular.">
    <i class="ion-ios-arrow-thin-down"></i>
  </button>                                    
</td>                                        
</tr>

<tr>
  <td>Admin</td>
  <td>English</td>
  <td>1<sup>st</sup></td>
  <td>31</td>
  <td>1</td>                            
  <td>
   <button type="submit" class="btn btn-green" title="Add more particular.">
    <i class="ion-ios-arrow-thin-up"></i>
  </button>
  <button type="submit" class="btn btn-red" title="Remove particular.">
    <i class="ion-ios-arrow-thin-down"></i>
  </button>                                    
</td>                                       
</tr>
<tr>
  <td>Admin</td>
  <td>English</td>
  <td>1<sup>st</sup></td>
  <td>31</td>
  <td>1</td>                            
  <td>
   <button type="submit" class="btn btn-green" title="Add more particular.">
    <i class="ion-ios-arrow-thin-up"></i>
  </button>
  <button type="submit" class="btn btn-red" title="Remove particular.">
    <i class="ion-ios-arrow-thin-down"></i>
  </button>                                    
</td>                                           
</tr>

</tbody>
</table>

</div> <!-- class Detail table blcok end -->
</section> <!-- view-class-data-block -->



<!-- scripts  -->
<script src="../../../assets/js/app.js"></script>
<script src="create_class.js"></script>
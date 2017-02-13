<?php require_once '../../includes/clg_header.php'; ?>


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
  <form method="post" action="" id="createClass" onsubmit="return false">

    <!-- ROW - 1  -->
    <div class="row">

      <!-- Medium -->
      <div class="col m12 l4">
        <label for="medium" class="font-weight100 small-caps full-width">Medium</label>
        <select id="medium" name="medium" class="full-width" title="Select your Medium." required="required">
         <option value="" disabled selected>Select Medium</option>
         <?php foreach($GLOBALS['MEDIUM'] as $mdm){echo sprintf("<option value='%s'>%s</option>",$mdm,$mdm); } ?>
       </select>
     </div>

     <!-- Course -->
     <div class="col m12 l4">
      <label for="course" class="font-weight100 small-caps full-width">Course</label>
      <select class="full-width" id="course" name="course"  title="Select Course." required>
        <option value="" disabled selected>Select One</option>
        <?php foreach($GLOBALS['COURSE'] as $course){ echo sprintf("<option value='%s'>%s</option>",$course,$course); } ?>
      </select>
    </div>

    <!-- year -->
    <div class="col m12 l4">
      <label for="year" class="font-weight100 small-caps full-width">Year</label>
      <select class="full-width" id="year" name="year"  title="Select Course." required>
        <option value="" disabled selected>Select One</option>
        <?php foreach($GLOBALS['YEAR'] as $yr){ echo sprintf("<option value='%s'>%s</option>",$yr,$yr); } ?>
      </select>
    </div>

    <!-- course name -->
    <div class="col m12 l4">
      <label for="cname" class="font-weight100 small-caps full-width">Course Name</label>
      <input class="full-width" type="text" id="cname" name="cname"  placeholder="Enter Course Name " title="Enter Course Name." required>
    </div>


    <!-- Division -->
    <div class="col m12 l4">
      <label for="division" class="font-weight100 small-caps full-width">Division Count</label>
      <input class="full-width" type="number" id="division" name="division"  placeholder="Enter " title="Enter Divsion Count." required>
    </div>


    <!-- subject all -->
    <div class="col m12 l4">
      <label for="subject" class="font-weight100 small-caps full-width">Subject</label>
      <input class="full-width" type="text" id="subject" name="subject"  placeholder="Enter All " title="Enter All." required>
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
      <thead>
        <tr class="txt-ash"> <th>User</th> <th>Medium</th> <th>Course</th> <th>Course Name</th> <th>Year</th> <th>Division</th> <th>Strength</th>
          <th>Export</th>
        </tr>      
      </thead>
      <tbody id="class-details-tbody">
        <?php 





      // User Details 
        $sql = "SELECT AD.`Name` AS 'User', CC.`Medium`,CC.`Course`,CC.`CourseName`,CC.`year`,CC.`no_of_div`,CC.`no_of_div` AS 'str' FROM clg_class CC INNER JOIN admin_sch AD ON AD.`unique_id`=CC.`unique_id`";
        $userDataArr = DB::allRow($sql);
        foreach ($userDataArr as $user){
         // $user_id = array_pop($user);
         $btn = "
         <button class='btn btn-red' onclick='updateUser({$user_id})'><i class='ion-ios-arrow-thin-down'></i> </button>";

         echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$user),$btn);
       }
       ?>
       
       <!--  <tr>
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
    </tr> -->
    


  </tbody>
</table>

</div> <!-- class Detail table blcok end -->
</section> <!-- view-class-data-block -->



<!-- scripts  -->
<script src="../../../assets/js/app.js"></script>
<!-- <script src="create_class.js"></script> -->
<script type="text/javascript">
  elementById('createClassSubmit').addEventListener('click',function(){
  var params = {} ,
  fn = function(){
     // alert('hello');
     window.location.reload();
    };

    params.mdm = elementById('medium').value;
    params.crs = elementById('course').value;
    params.year = elementById('year').value;
    params.cname = elementById('cname').value;
    params.div = elementById('division').value;
    params.sub = elementById('subject').value;
    AjaxPost('createClassCtrl.php',params,fn,'txt');

  });




  function updateUser(userid)
  {
    alert(userid);
  }
  
</script>
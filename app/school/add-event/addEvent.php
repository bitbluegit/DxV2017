<?php //require_once '../../includes/header.php';
require_once '../../includes/usr_sch_header.php'; ?>


<!-- ****************************
**** add Event  Block ****
***************************** -->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="add-event-block">

  <!-- Title -->
  <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-android-settings margin-right20"></i>
    Add Event
  </h5> 
  
  <!-- Create Class Form -->
  <form method="post" action="" id="createClass" enctype="multipart/form-data" onsubmit="return false">

    <!-- ROW - 1  -->
    <div class="row">

      <!-- title -->
      <div class="col m12 l4">
        <label for="eTitle" class="font-weight100 small-caps full-width">Event Title</label>
        <input type="text" id="eTitle" name="eTitle" class="full-width" title="Enter Event title." required="required" placeholder="Enter Event Title">
         
     </div>

     <!-- details -->
     <div class="col m12 l4">
      <label for="eDetails" class="font-weight100 small-caps full-width">Event Details</label>
      <input type="text" class="full-width" id="eDetails" name="eDetails"  title="Enter Event Details." required placeholder="Enter Event Details">
        
    </div>

    <!-- img -->
    <div class="col m12 l4">
      <label for="eImg" class="font-weight100 small-caps full-width">Event Image</label>
      <input class="full-width" type="file" id="eImg" name="eImg"  placeholder="upload Event Image " title="Enter Divsion Count." required>
    </div>

    <!-- Submit Button -->
    <div class="col m12 pad-top10 txt-left">
      <button type="submit" class="btn bg-grey txt-ash full-width" id="addEventSubmit">
        <i class="ion-android-send"></i>
        Submit
      </button>
    </div>

  </div><!-- ROW-1 END -->

</form>

</section> <!-- add-event-block -->



<!-- ****************************
**** View Event data Block  ****
******************************-->

<section class="bg-white overflow-x box-shadow margin-bottom30" id="view-class-data-block">

  <!-- Title -->
  <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-ios-paper-outline margin-right20"></i>
    Created Events
  </h5>

  <!-- Event Details Table Block -->
  <div class="events-detail-table">

    <table class="full-width margin-bottom-zero">
      <thead>
        <tr class="txt-ash"> <th>Event Title</th> <th>Event Details</th> <th>Date</th> <th>View / Delete</th> 
        </tr>      
      </thead>
      <tbody id="class-details-tbody">
        <?php 





      // User Details 
       //  $sql = " SELECT admin_sch.type , sch_class.Medium , sch_class.Std , sch_class.no_of_div ,admin_sch.uname, sch_class.unique_id  FROM sch_class INNER JOIN 
       //  admin_sch ON sch_class.unique_id=admin_sch.unique_id 
       //  ORDER BY FIELD(MEDIUM,'English','Hindi','Marathi'),FIELD(`Std`,'nursery', 'jr.kg','junior.kg','sr.kg',
       //  'senior.kg','first','second','third','fourth','fifth','sixth','seventh','eighth','ninth','tenth','Mr.Dextro','Left')";
       //  $userDataArr = DB::allRow($sql);
       //  foreach ($userDataArr as $user){
       //   $user_id = array_pop($user);
       //   $btn = "<button class='btn btn-red' onclick='updateUser({$user_id})'><i class='ion-ios-arrow-thin-down'></i> </button>";

       //   echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$user),$btn);
       // }
       ?>
       
      


  </tbody>
</table>


<!-- <img src="" id="tableBanner" /> -->

</div> <!-- events Detail table blcok end -->
</section> 



<!-- scripts  -->
<script src="../../../assets/js/app.js"></script>
<script src="addEvent.js"></script>



<script type="text/javascript">
 var bannerImage = document.getElementById('eImg');
var result = document.getElementById('res');
var img = document.getElementById('tableBanner');

// Add a change listener to the file input to inspect the uploaded file.
bannerImage.addEventListener('change', function() {
    var file = this.files[0];
    // Basic type checking.
    if (file.type.indexOf('image') < 0) {
        res.innerHTML = 'invalid type';
        return;
    }

    // Create a file reader
    var fReader = new FileReader();

    // Add complete behavior
    fReader.onload = function() {
        // Show the uploaded image to banner.
        img.src = fReader.result;

        // Save it when data complete.
        // Use your function will ensure the format is png.
        localStorage.setItem("imgData", getBase64Image(img));
        // You can just use as its already a string.
        // localStorage.setItem("imgData", fReader.result);
    };

    // Read the file to DataURL format.
    fReader.readAsDataURL(file);
});

function getBase64Image(img) {
    var canvas = document.createElement("canvas");
    canvas.width = img.width;
    canvas.height = img.height;

    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);

    var dataURL = canvas.toDataURL("image/png");

    return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}



</script>
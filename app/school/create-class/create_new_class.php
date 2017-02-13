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

     <!-- Standard -->
     <div class="col m12 l4">
      <label for="standard" class="font-weight100 small-caps full-width">Standard</label>
      <select class="full-width" id="standard" name="standard"  title="Select your Standard." required>
        <option value="" disabled selected>Select Standard</option>
        <?php foreach($GLOBALS['STD'] as $std){ echo sprintf("<option value='%s'>%s</option>",$std,$std); } ?>
      </select>
    </div>

    <!-- Division -->
    <div class="col m12 l4">
      <label for="division" class="font-weight100 small-caps full-width">Division Count</label>
      <input class="full-width" type="number" id="division" value="2" name="division"  placeholder="Enter Divsion Count." title="Enter Divsion Count."  required>
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
        <tr class="txt-ash"> <th>User</th> <th>Medium</th> <th>Standard</th> <th>Division</th> <th>Strength</th>
          <th>Export/Update</th>
        </tr>      
      </thead>
      <tbody id="class-details-tbody">
        <?php 

      // User Details 
        $sql = " SELECT AD.Name AS 'user' , SC.Medium AS 'mdm' , SC.Std AS 'std', SC.no_of_div AS 'div count' , COUNT(US.`Gr_num`) AS 'student_count'
        FROM sch_class SC
        INNER JOIN admin_sch AD  ON SC.unique_id = AD.unique_id 
        LEFT JOIN user_sch US ON US.`Medium` =  SC.`Medium` AND US.`Std` = SC.`Std`
        GROUP BY SC.`Medium` , SC.`Std` 
        ORDER BY FIELD(SC.`Medium`,'English','Hindi','Marathi'),FIELD(SC.`Std`,'nursery', 'jr.kg','junior.kg','sr.kg',
        'senior.kg','first','second','third','fourth','fifth','sixth','seventh','eighth','ninth','tenth','Mr.Dextro','Left')
        ";
        $result = DB::allRow($sql);
        foreach ($result as $class){
         $mdm_std =  $class['mdm'].'~'.$class['std'];
         $btn = "<button class='btn btn-green' onclick='export()'>
                  <i class='ion-ios-arrow-thin-down'> </i> </button>
         <button class='btn btn-red' onclick='UpdateClassDivCount({$mdm_std})'><i class='ion-edit'></i> </button>";
         echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$class),$btn);
       }
       ?>
       

     </tbody>
   </table>

 </div> <!-- class Detail table blcok end -->
</section> <!-- view-class-data-block -->




<!-- FOOTER HERE  -->
<?php  require_once('../../includes/footer.php') ?>


<!-- scripts  -->
<script type="text/javascript">


// Form Submit Event Handler 
elementById('createClassSubmit').addEventListener('click',function(){
  var mdm = DX.eByIdVal('medium') ,
  std = DX.eByIdVal('standard'),
  div = DX.eByIdVal('division');

  var CallBackFn = function(jsonResponse){
    alert(jsonResponse.msg);
    window.location.reload();
  };

  if( mdm != "" &&  std !="" && parseInt(div) > 0 ){
    DX.AjaxPost('createClassCtrl.php',{mdm:mdm , std:std, div:div},CallBackFn,'json');
 }else{
  alert('Please Select Valid mdm , std, div-count');
}
});


 function UpdateClassDivCount(srno){
  alert(srno);
        var htm = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod" ;
        htm += "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod" ;
        htm += "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod" ;
        htm += "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod" ;
        htm += "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod" ;
        modalShow(htm);

}


</script>
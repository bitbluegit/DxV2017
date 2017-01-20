<?php require_once '../../includes/header.php'; ?>

<!-- Transaction Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
        <i class="ion-android-settings margin-right20"></i>
        Bonafide
    </h5>
    <!-- Expense Form -->
    <form class="row" method="post" name="circular-filter" id="circular-filter" action="#" onsubmit="return false">
        <!-- Start Date -->
        <div class="col m12 l4">
            <label for="startdate" class="font-weight100 small-caps full-width">Start Date</label>
            <input type="date" id="startdate" name="startdate" class="full-width" title="Select Start date.">
        </div>

        <!--End Date -->
        <div class="col m12 l4">
            <label for="enddate" class="font-weight100 small-caps full-width">End Date</label>
            <input type="date" id="enddate" name="enddate" class="full-width" title="Select End Date.">
        </div>

        <!-- Name -->
        <div class="col m12 l4">
            <label for="title" class="font-weight100 small-caps full-width">Title</label>
            <input type="text" id="title" name="title" class="full-width" placeholder="Enter Your Circular Title" title="Enter Circular Subject..">
        </div>


        <!-- Submit Button -->
        <div class="col m12 pad-top10 txt-left">
            <button type="submit" class="btn bg-grey txt-ash full-width" onclick="filterCircular()">
                <i class="ion-android-send"></i>
                Submit
            </button>
        </div>
    </form>
</div>

<!-- ENquiry details Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-ios-paper-outline margin-right20"></i>
    Created Circular
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
    <table class="full-width margin-bottom-zero">
        <thead>
            <tr class="txt-ash">
                <th >Sr No.</th>
                <th >Subject</th>
                <th>Description</th>
                <th >Date</th>
                <th>Print / Delete</th>

            </tr>        
        </thead>

        <tbody id="filter-data">

            <?
            $sql = " SELECT  CC.`cir_no` AS sr_no,  CC.`cir_subject`,  CC.`cir_desc`,  CC.`cir_date`,  CC.`cir_no` 
            FROM  circular CC ";
            $data  = DB::allRow($sql);
            if($data){
                foreach ($data as $row) {
                  $cir_no = array_pop($row);

                  $btn = "<button class='btn btn-green' onclick='printCircular({$cir_no})'><i class='ion-ios-printer'></i>
              </button>
              <button class='btn btn-red' onclick='deleteCircular({$cir_no})'><i class='ion-trash-b'></i> </button>"; 
              echo sprintf("<tr><td>%s</td><td>%s</td></tr>",implode('</td><td>',$row),$btn);
          }
      }else{
        echo '<tr><td colspan="9" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No Circular Found !<td></tr>';
    }
    ?>




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



</div> <!-- /Container -->


<!-- scripts  -->
<script src="../../../assets/js/app.js"></script>
<script src="circularFilter.js"></script>

<script type="text/javascript">
// reprint
function printCircular(srno){
 var cir_no = srno;
                    // alert(cir_no);
                    window.location.href ="printCircular.php?cirno="+cir_no+""


                };

// delete bonafide

function deleteCircular(srno){

    var ok = confirm("Are You Sure To Delete?")
    if (ok)   {     

        var params = {} ,
        fn = function(){
             // alert('hello');
         }; 

         params.cir_no = srno;

         AjaxPost('deleteCircular.php',params,fn,'txt');

         window.location.href= "circularFilter.php";
     };
 }



    // update Curcular
    // function editCircular(srno){
    //     var htm = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod" ;
    //     htm += "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod" ;
    //     htm += "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod" ;
    //     htm += "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod" ;
    //     htm += "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod" ;
    //     modalShow(htm);
    // }         



</script>


<?php
require_once '../../includes/footer.php';

?>


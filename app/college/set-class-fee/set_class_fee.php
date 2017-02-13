<?php require_once '../../includes/clg_header.php'; ?>

<!-- Transaction Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
        <i class="ion-android-settings margin-right20"></i>
        Fee Details
    </h5>
    <form class="row" method="post" action="" onsubmit="return false">
        <div class="col m12 l3">
            <label for="medium" class="font-weight100 small-caps full-width">Medium</label>
            <select name="medium" id="medium" class="full-width" title="Select your Medium eg. English" required>
                <option value="" disabled selected>Select One</option>
                <?php foreach($GLOBALS['MEDIUM'] as $mdm){echo sprintf("<option value='%s'>%s</option>",$mdm,$mdm); } ?>
            </select>

            <label  for="feename" class="font-weight100 small-caps full-width">Fee Name</label>
            <input type="text" id="feename" class="full-width" title="Enter Fee Name." required>

            <label for="feeformat2" class="font-weight100 small-caps full-width">Fee Format 2</label>
            <select id="feeformat2" class="full-width" title="Select you Fee Format 2." required>
                <option value="" disabled selected>Select One</option>
                <option value="payable">Payable</option>
            </select>

        </div>

        <div class="col m12 l3">
            <label for="course" class="font-weight100 small-caps full-width">Course</label>
            <select name="course" id="course" class="full-width" title="Select your Standard." required>
                <option value="" disabled selected>Select One</option>
                <?php foreach($GLOBALS['COURSE'] as $course){ echo sprintf("<option value='%s'>%s</option>",$course,$course); } ?>
            </select>
            <label for="feeamount" class="font-weight100 small-caps full-width">Fee Amount</label>
            <input type="number" name="feeamount" id="feeamount" class="full-width"   title="Enter Fee amount." required>

        </div>

        <div class="col m12 l3">

           <label for="year" class="font-weight100 small-caps full-width">Year</label>
           <select name="year" id="year" class="full-width" title="Select your Standard."  onchange="getCourseName()">
            <option value="" disabled selected>Select One</option>
            <?php foreach($GLOBALS['YEAR'] as $year){ echo sprintf("<option value='%s'>%s</option>",$year,$year); } ?>
        </select>

        <label for="latefee"class="font-weight100 small-caps full-width">Late Fee Amount</label>
        <input type="number" name="latefee" id="latefee" class="full-width" title="Enter Late Fee." required>


    </div>

    <div class="col m12 l3">
        <label for="cName" class="font-weight100 small-caps full-width">Course Name</label>
        <select name="cName" id="cName" class="full-width" title="Select Fee Frequency" required>
            <option value="" disabled selected>Select One</option>



        </select>
        <label for="feeformat1" class="font-weight100 small-caps full-width">Fee Format 1</label>
        <select id="feeformat1" class="full-width" title="Select your Fee Format 1." required>
            <option value="" disabled selected>Select One</option>
            <option value="compulsory">Compulsory</option>
        </select>



    </div>

    <div class="col m12 pad-top10 txt-left">
        <button type="submit" class="btn bg-grey txt-ash full-width"
        id="setClassFeeSubmit">
        <i class="ion-android-send"></i>
        Submit
    </button>
</div>

</form>
</div>

<!-- Transaction Data -->
<h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
    <i class="ion-ios-paper-outline margin-right20"></i>
    Today's Transactions
</h5>
<div class="bg-white overflow-x box-shadow margin-bottom30">
    <table class="full-width margin-bottom-zero">
        <thead>
            <tr class="txt-ash">
                <th>Medium</th> <th>Course</th> <th>Course Name</th> <th>Yera</th> <th>Fee Frequency</th>
                <th>Fee Name</th> <th>Fee Amount</th> <th>Late Fee Amount </th> 
            </tr>
        </thead>
        <tbody>
            <?php
             //created fee details
            $sql = "SELECT CF.`Medium`,CF.`Course`,CF.`CourseName`,CF.`year`,CF.`one_time`,CF.`fee_type`,CF.`fee`,CF.`lfee`,CF.`unique_id` FROM clg_cls_fee CF";

            $feeDataArr = DB::allRow($sql);
            foreach ($feeDataArr as  $fee) {
                $feeId = array_pop($fee);
                echo sprintf("<tr><td>%s</td></tr>",implode("</td><td>",$fee));
            }

            ?>
        </tbody>
    </table>
</div>

</div>
</div>
<!-- /Container -->



<script src="../../../assets/js/app.js"></script>
<script src="set_class_fee.js"></script>

<script type="text/javascript">

// form submit
elementById('setClassFeeSubmit').addEventListener('click',function(){
    
    var params = {} ,
    fn = function(){
        // alert('hello');
        window.location.reload();
    };
    
    params.mdm = elementById('medium').value;
    params.crs = elementById('course').value;
    params.year = elementById('year').value;
    params.cname =elementById('cName').value;
    params.feename = elementById('feename').value;
    params.feeamount = elementById('feeamount').value;
    params.latefee = elementById('latefee').value;
    params.feeformat2 = elementById('feeformat1').value;
    params.feeformat2 = elementById('feeformat2').value;

    // window.alert(params.mdm);
    // window.alert(params.std);

    AjaxPost('setClassFeeCtrl.php',params,fn,'txt');

});





// get course name
     function getCourseName() {
        var mdm = elementByIdValue('medium'),
        crs  = elementByIdValue('course'),
        year = elementByIdValue('year');

        var callBackFun = function (res) {
            elementById('cName').innerHTML = res;
        };

        AjaxPost('../db/getCoursename.php', { mdm: mdm, crs: crs, year: year }, callBackFun, 'txt');
    }

</script>
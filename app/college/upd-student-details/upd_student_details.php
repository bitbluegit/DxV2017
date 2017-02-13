<?php 

require_once '../../includes/clg_header.php'; ?>
<!-- 
/********************
** student list filter **
********************/ -->

<style>
    #data-block {
        width: 100%;
    }

    #data-block table {
        width : 100%;
    }

    #data-block table tr td,th {
        text-align:center;
    }

</style>



<!-- Student list  Filter Form -->
<div class="bg-white overflow-x box-shadow margin-bottom30  ">
    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
        <i class="ion-android-settings margin-right20"></i>
        Enquiry Filter
    </h5>
    <!-- Expense Form -->
    <form class="row" method="post" name="update-filter" id="update-filter" action="#" onsubmit="return false">


        <!-- Medium -->
        <div class="col m12 l4">
            <label for="type" class="font-weight100 small-caps full-width">Select Update</label>
            <select id="type" name="type" class="full-width" title="Select your medium.">
                <option value="" disabled selected>Select One</option>
                <option value="cont_num">Contact Number</option>
                <option value="DOB">Date Of Birth </option>
                <option value="area_code">Bus Area</option>
            </select>
        </div>

        <!-- Medium -->
        <div class="col m12 l4">
            <label for="medium" class="font-weight100 small-caps full-width">Medium</label>
            <select id="medium" name="medium" class="full-width" title="Select your medium.">
                <option value="" disabled selected>Select Medium</option>
                <?php foreach($GLOBALS['MEDIUM'] as $mdm){echo sprintf("<option value='%s'>%s</option>",$mdm,$mdm); } ?>
            </select>
        </div>

        <!-- standard -->
        <div class="col m12 l4">
            <label for="standard" class="font-weight100 small-caps full-width">Standard</label>
            <select id="standard" name="standard" class="full-width" title="Select your Standard." onchange="getSection()">
                <option value="" disabled selected>Select Std</option>
                <?php foreach($GLOBALS['STD'] as $std){ echo sprintf("<option value='%s'>%s</option>",$std,$std); } ?>
            </select>
        </div>
        <!-- User type -->
        <div class="col m12 l4">
            <label for="section" class="font-weight100 small-caps full-width">Section</label>
            <select id="section" name="section" class="full-width" title="Select Student Section." required>
                <option value="" disabled selected>Select One</option>

            </select>
        </div>



        <!-- Submit Button -->
        <div class="col m12 pad-top10 txt-left">
            <button type="submit" class="btn bg-grey txt-ash full-width" onclick="getStudentDetailsToUpdate()">
                <i class="ion-android-send"></i>
                Submit
            </button>
        </div>
    </form>
</div>


<!-- ****************************
**** student updata data ****
***************************** -->
<section class="bg-white overflow-x box-shadow margin-bottom30" id="data-block">

    <!-- Bonafide Form Template Insert Here -->

</section>
<!-- create-nonafide -->





</div>
<!-- /Container -->

<!-- scripts  -->
<script src="../../../assets/js/app.js"></script>

<script type="text/javascript">

                    function getSection() {
                        var mdm = elementByIdValue('medium'),
                        std = elementByIdValue('standard');

                        var callBackFun = function (res) {
                            elementById('section').innerHTML = res;
                        };

                        AjaxPost('../db/getSection.php', { mdm: mdm, std: std }, callBackFun, 'txt');
                    }


                    function getStudentDetailsToUpdate() {
                        var params = {};
                        params.mdm = elementByIdValue('medium');
                        params.std = elementByIdValue('standard');
                        params.div = elementByIdValue('section');
                        params.updateFiledName = elementByIdValue('type');

                        var callBackFun = function (res) {
                            elementById('data-block').innerHTML = res;
                        };

                        AjaxPost('getStudentDetailsToUpdate.php', params, callBackFun, 'txt');

                    }

                    function updateStduentDetail() {
                        var data = document.getElementsByClassName('stuDetRow');
                        alert(data);

                    }



</script>

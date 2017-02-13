<?php  require_once '../../includes/header.php';
//include('../attach/header_sch.php'); ?>


<style type="text/css">
    /* Responsive Css */

    div.span-right { width: 100%; min-height: 600px; }

    div.row {height: auto !important; }

    .row:after {content: " "; display: block; clear: both; }

    .col {float: left; padding-left: 15px; padding-right: 15px; min-height: 1px; }
    .md1 {width: 8.333333333%; }
    .md2 {width: 16.66666667%; }
    .md3 {width: 25%; }
    .md4 {width: 33.33333333%; }
    .md5 {width: 41.66666667%; }
    .md6 {width: 50%; }
    .md7 {width: 58.33333333%; }
    .md8 {width: 66.66666667%; }
    .md9 {width: 75%; }
    .md10 {width: 83.33333333%; }
    .md11 {width: 91.66666667%; }
    .md12 {width: 100%; }

    table {border-collapse: collapse; overflow-x: auto; }
    th {font-weight: 700; font-size: 1.4rem; }
    th, td {text-align: left; border-bottom: 1px solid #e1e1e1; padding: 0.4rem 0.7rem; }
    button {width: 80px; font-family: inherit; border: none; cursor: pointer; background: #3f5185; color: #fff; font-size: 13px;
        border-radius: 2px; height: 25px; line-height: 25px; }


    /******************************************
	************* Green Sheet ****************
	*****************************************/


    /* Heading TXT */
    p.heading {background-color: #607D8B; padding: 10px; font-variant: small-caps; font-weight: 600; color: #fff; text-decoration: underline;
        margin-top: 0; }

        label {font-variant: small-caps; font-weight: 600; }

        /* Exam Name Block */
        #exam-name-block {width: 84%; margin-left: 7%; text-align: center; margin-top: 5px; padding: 5px; }
        #exam-name-block table {width: 100%; border: 1px solid #ccc; } #exam-name-block table tr td {text-align: center; }
        #exam-name-block table tbody tr:first-child {background-color: #f6f6f6; font-weight: 600; } 
        #exam-name-block table tbody tr td:first-child {font-variant: small-caps; font-size: 17px; font-weight: 600; }


        /* EXAM REPORT CSS 	*/
        #exam-report-data-block {width: 85%; margin-left: 7%; margin-top: 30px; }
        #exam-report-data-block table {width: 100%; }
        #exam-report-data-block table caption { padding: 6px; margin-bottom: 15px; border: 2px solid #607D8B; text-align: center; 
            font-size: 16px; color: #607D8B; font-variant: small-caps;
        }
        #exam-report-data-block table caption span { background-color: #cd5c5c; padding: 1px 7px; color: #fff; border-radius: 3px; }

        #exam-report-data-block table thead th {font-size: 16px; font-variant: small-caps;    color: #607D8B; }
        #exam-report-data-block table tbody tr:nth-child(odd) {background-color: #f1f1f1; } 


    </style>


    <!-- span-right width 80% -->
    <div class="span-right">
        <section class="container">

            <!-- Green sheet Filter Block  -->
            <section id="green-sheet-filter-block">
                <p class="heading">Result Report </p>

                <!-- row start	 -->
                <div class="row">

                    <!-- select medium -->
                    <div class="col l4">
                        <label for="exam-mdm">Medium </label>
                        <br>
                        <select id="exam-mdm" name="exam-mdm" class="full-width" required="required" >
                            <option value="English">English</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Marathi">Marathi</option>
                        </select>
                    </div>

                    <!-- select standard -->
                    <div class="col l4">
                        <label for="exam-std">Standard </label>
                        <br>
                        <select id="exam-std" name="exam-std" class="full-width" onchange="getExamSection(this )" required="required">
                            <option value="default">Select One</option>
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

                    <!-- Select Exam section  -->
                    <div class="col l4">
                        <label for="exam-div">Div </label>
                        <br>
                        <select name="exam-div" id="exam-div" class="full-width" onchange="getExamName(this)" >
                            <option value="default">Select One</option>
                        </select>
                    </div>
                </div>
                <!-- Row End -->

                <!-- Exam-Name Block  -->
                <div id="exam-name-block">
                </div>


            </section>
            <!-- Green sheet Filter Block End -->


            <section id="exam-report-data-block">
            </section>


        </section>
        <!-- container End -->
    </div>
    <!-- span-right -->



    <script>

    // Ajax Post Method 
    function AjaxPost(url, paramsObj, callBackFunction, responseType, async) {

        var params = "data=" + JSON.stringify(paramsObj),
        async = async || true,
        resType = responseType || 'json';

        var xhr = new XMLHttpRequest();
        xhr.open("POST", url, async);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var resData = (resType == 'json' ? JSON.parse(xhr.responseText) : xhr.responseText);
                callBackFunction(resData); // Call Back 
            }
        };

        xhr.send(params);

    }




    function getExamSection(obj) {
        var mdm = document.getElementById('exam-mdm').value,
        std = obj.value,
        reqData = {},
        getDivCallBack = function (res) {
            document.getElementById('exam-div').innerHTML = res;
        };

        if (std != 'default') {
            var params = { mdm: mdm, std: std };
            AjaxPost('db/get_dx_exam_section.php', params, getDivCallBack, 'txt');
        } else {
            alert('Please Select Std ');
        }
    }


    function getExamName(obj) {
        var mdm = document.getElementById('exam-mdm').value,
        std = document.getElementById('exam-std').value,
        sec = obj.value,
        reqData = {},
        getExamNameCallBack = function (res) {
            document.getElementById('exam-name-block').innerHTML = res;
        };

        if (std != 'default' && sec != '') {
            var params = { mdm: mdm, std: std, sec: sec, resType: 'checkbox' };
            AjaxPost('db/dx_get_exam_name_to_genrate.php', params, getExamNameCallBack, 'txt');
        } else {
            alert('Please Select Std & Div ');
        }
    }



    function genrateExamReport() {
        var mdm = document.getElementById('exam-mdm').value,
        std = document.getElementById('exam-std').value,
        div = document.getElementById('exam-div').value,
        examIds = [],
        params = {};

        genrateGreenSheetCallBack = function (res) {
            document.getElementById('exam-report-data-block').innerHTML = res;
        }


        document.querySelectorAll('#exam-name-block input[type="checkbox"]').forEach(function (checkbox) {
            if (checkbox.checked) {
                examIds.push(checkbox.value);
            }
        });

        params.examIds = examIds;
        params.mdm = mdm;
        params.std = std;
        params.div = div;


        if (std == 'default' && sec == 'default' && sec == undefined && examIds.length <= 0) {
            alert('Please Select mdm, std, sec , exams ');
            return false;
        }

        AjaxPost('db/dx_genrate_exam_report.php', params, genrateGreenSheetCallBack, 'txt');

    }




    function printSmallResultPrint(grNum) {
        var mdm = document.getElementById('exam-mdm').value,
        std = document.getElementById('exam-std').value,
        div = document.getElementById('exam-div').value,
        examIds = [],
        params = {};

        document.querySelectorAll('#exam-name-block input[type="checkbox"]').forEach(function (checkbox) {
            if (checkbox.checked) {
                examIds += checkbox.value + ',';
            }
        });

        params.mdm = mdm;
        params.std = std;
        params.div = div;
        params.gr = grNum;
        params.examIds = examIds;


        if (std == 'default' && sec == 'default' && sec == undefined && examIds.length <= 0 && grNum == '' && grNum == undefined) {
            alert('Please Select mdm, std, sec , exams ');
            return false;
        }

        var url = 'printAdminResultNew.php' + buildUrl(params);
        console.log(url);
        window.open(url, '_blank');
        // AjaxPost( 'db/dx_genrate_exam_report.php', params, genrateGreenSheetCallBack,'txt');
    }

    function printSmallResultAll() {
        var mdm = document.getElementById('exam-mdm').value,
        std = document.getElementById('exam-std').value,
        div = document.getElementById('exam-div').value,
        examIds = [],
        params = {};

        document.querySelectorAll('#exam-name-block input[type="checkbox"]').forEach(function (checkbox) {
            if (checkbox.checked) {
                examIds += checkbox.value + ',';
            }
        });

        params.mdm = mdm;
        params.std = std;
        params.div = div;
        params.examIds = examIds;


        if (std == 'default' && sec == 'default' && sec == undefined && examIds.length <= 0 && grNum == '' && grNum == undefined) {
            alert('Please Select mdm, std, sec , exams ');
            return false;
        }

        var url = 'printSmallResultAll.php' + buildUrl(params);
        window.open(url, '_blank');
    }



    function printLargeResultAll() {
        var mdm = document.getElementById('exam-mdm').value,
        std = document.getElementById('exam-std').value,
        div = document.getElementById('exam-div').value,
        examIds = [],
        params = {};

        document.querySelectorAll('#exam-name-block input[type="checkbox"]').forEach(function (checkbox) {
            if (checkbox.checked) {
                examIds += checkbox.value + ',';
            }
        });

        params.mdm = mdm;
        params.std = std;
        params.div = div;
        params.examIds = examIds;


        if (std == 'default' && sec == 'default' && sec == undefined && examIds.length <= 0 && grNum == '' && grNum == undefined) {
            alert('Please Select mdm, std, sec , exams ');
            return false;
        }

        var url = 'PrintAllStudentResult.php' + buildUrl(params);
        window.open(url, '_blank');

    } 




    function printResultPrint(grNum) {
        var mdm = document.getElementById('exam-mdm').value,
        std = document.getElementById('exam-std').value,
        div = document.getElementById('exam-div').value,
        examIds = [],
        params = {};

        document.querySelectorAll('#exam-name-block input[type="checkbox"]').forEach(function (checkbox) {
            if (checkbox.checked) {
                examIds += checkbox.value + ',';
            }
        });

        params.mdm = mdm;
        params.std = std;
        params.div = div;
        params.gr = grNum;
        params.examIds = examIds;


        if (std == 'default' && sec == 'default' && sec == undefined && examIds.length <= 0 && grNum == '' && grNum == undefined) {
            alert('Please Select mdm, std, sec , exams ');
            return false;
        }

        var url = 'printAdminresult.php' + buildUrl(params);
        window.open(url, '_blank');

    }


    function buildUrl(obj) {
        var UrlParmasString = '',
        counter = 0;
        for (var key in obj) {
            if (obj.hasOwnProperty(key)) {
                UrlParmasString += (counter == 0 ? '?' : '&') + key + '=' + obj[key];
            }
            counter++;
        }
        return UrlParmasString;
    }




</script>

<?php require_once '../../includes/header.php';

$srno = $_GET['srno'];
$sql = " SELECT * FROM bonafide BF WHERE BF.`sr_no`= $srno ";
$result = DB::oneRow($sql);
extract($result);
// echo $grno;
?>




 <link href="../../../assets/css/bonafied.css" rel="stylesheet">
            
            <style>
                @media print {
                    .wrapper {
                        margin-top: 10px;
                        max-width: 800px;
                        width: 800px;
                        margin: 0px;
                        border: none;
                        box-shadow: 0px 0px 0px #fff;
                        box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);
                    }
                    #printBtn {
                        display: none;
                    }
                    .left-pane , .right-pane{
                    	display: none;
                    }
                }
            </style>
        </head>
        <body>
            <div class="wrapper">
                <div class="row">
                    <div class="col d2">
                        <img src="../images/dummy_institute2.png">
                    </div>
                    <div class="col d8 txt-center title ft12">
                        <h2>DEXTRO CAMPUS ACADEMY</h2>
                        <p>Institute Trustee Name</p>
                        <p>(Pre-Primary/Primary/Secondary)</p>
                        <p>(Hindi/English Medium School) Public Trust Regd. No. E-12869 (Mumbai)</p>
                        <p>VIDYA-NAGARI, VILL. PELHAR, TAL. VASAI DIST. PALGHAR</p>
                    </div>
                    <div class="col d2">
                        <img class="student float-right" src="../images/dummy_student2.png">
                    </div>
                    
                </div>
                
                <div style="border: 1px solid; height: 2px"></div>
                
                <h1 class="txt-center">Bonafide Certificate</h1>
                
                <div class="row txt-justify">
                    <p>
                        This is to certify that
                        <span class="dashed-fields w420"><b>&nbsp;<?=$name?></b></span>
                        was a bonafied student of our school studying in std
                        <span class="dashed-fields w200"><b>&nbsp;<?=$std?></b></span> with
                        academic year 2017-18.<br>
                    </p>
                    <p class="txt-center">
                        His/Her necessary details are as under
                    </p>
                    <p>
                        Enroll No. <span class="dashed-fields w250"><b>&nbsp;<?=$Gr_no?></b></span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Name <span class="dashed-fields w330"><b>&nbsp;<?=$name?></b></span>
                    </p>
                    <p>
                        Father's Name <span class="dashed-fields w220"><b>&nbsp;<?=$FatherName?></b></span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Mother's Name <span class="dashed-fields w260"><b>&nbsp;<?=$m_name?></b></span>
                    </p>
                    <p>
                        Date Of Birth <span class="dashed-fields w420"><b>&nbsp;<?=$DOB?></b></span>
                    </p>
                </div>
                
                <div class="row txt-center footer">
                        
                        <!--Issue Date: <span class="dashed-fields w100">&nbsp;</span>
                        Clerk: <span class="dashed-fields w100">&nbsp;</span>
                        Principal: <span class="dashed-fields w100">&nbsp;</span>-->
                        
                        Issue Date: <span class="black"><?=date('d-m-Y', strtotime($date))?></span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Clerk
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Principal
                </div>
            </div>

            <br><br>
            
            <div id="printBtn" class="txt-center">
                <input type="button" class="btn btn-blue" onclick="window.print();" value="print">    
            </div>

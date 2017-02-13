<?php require_once '../../includes/clg_header.php'; 
$sql = "SELECT * FROM clg_lc ORDER BY lc_no DESC LIMIT 1";
$result = Db::oneRow($sql);
extract($result);
?>



<link href="../../../assets/css/leaving-certificate.css" rel="stylesheet">
        </head>
        <style>
            @media print {
            	.left-pane ,.right-pane{
            		display: none;
            	}
                .wrapper {
                	max-height: 1000px;
                    background: #fff;
                    margin-top: 0;
                    margin-bottom: 0;
                    border: none;
                    box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);
                }
                hr {
                    background: #000;
                }
                #printBtn {
                    display: none;
                }
            }
        </style>
        <body>
            <div class="wrapper">
                <div class="row txt-center">
                    <div class="d12 title">
                        <h2>DEXTRO CAMPUS ACADEMY</h2>
                        <p>(Hindi/English Medium School)<p/>
                        <p>Public Trust Regd. No. E-12869 (Mumbai)</p>
                        <p>VIDYA-NAGARI, VILL. PELHAR, TAL. VASAI DIST. PALGHAR</p>
                    </div>
                    <div class="d12">
                        <img class="institute" src="../images/dummy_institute4.png">
                    </div>
                    <hr>
                    <h1>School Leaving Certificate</h1>
                    <p class="txt-justify ft12">
                        No changes in any entry in this certificate shall be made except by the authority
                        issuing it and any infringement of this requirement is liable to invoice the
                        imposition of penalty such as that of rustication.
                    </p>
                </div>
                
               <div class="row">
                    
                    <div class="margin-bottom10">
                        <span>
                            LC No.
                            <span class="dashed-fields w100">&nbsp;<?=$lc_no?></span>
                        </span>
                        
                        <span class="float-right">
                            Gr No.
                            <span class="dashed-fields w100">&nbsp;<?=$enroll_no?></span>
                        </span>
                    </div>
                    
                    
                    <div class="d12 sub-block">
                        
                        <p class="row">
                            Name Of The Pupil (In Full): <span class="dashed-fields w315 float-right">&nbsp;<?=$stu_name?></span>
                        </p>
                        
                        <p class="row">
                            Father's/Fuardian's Name: <span class="dashed-fields w315 float-right">&nbsp;<?=$f_name?></span>
                        </p>
                        
                        <p class="row">
                        Mother's Name: <span class="dashed-fields w315 float-right">&nbsp;<?=$m_name?></span>
                        </p>
                        
                        <p class="row">
                        Religion: <span class="dashed-fields w315 float-right">&nbsp;<?=$religion?></span>
                        </p>
                        
                        <p class="row">
                        Caste And Sub-Caste: <span class="dashed-fields w315 float-right">&nbsp;<?=$cast_subcaste?></span>
                        </p>
                        
                        <p class="row">
                        Natioanlity: <span class="dashed-fields w315 float-right">&nbsp;<?=$nationality?></span>
                        </p>
                        
                        <p class="row">
                        Place Of Birth: <span class="dashed-fields w315 float-right">&nbsp;<?=$pob?></span>
                        </p>
                        
                        <p class="row">
                        Date Of Birth, Month And Year According <br>
                        To Christian Era (in words & figures):
                        <span class="dashed-fields w315 float-right">&nbsp;
                            <?=date('d-m-Y', strtotime($dob))?>
                        </span>
                        </p>
                        
                        <p class="row">
                        Last School Attended: <span class="dashed-fields w315 float-right">&nbsp;<?=$last_school_attend?></span>
                        </p>
                        
                        <p class="row">
                        Date Of Admission: <span class="dashed-fields w315 float-right">&nbsp;<?=$doa?></span>
                        </p>
                        
                        <p class="row">
                        Progress: <span class="dashed-fields w315 float-right">&nbsp;<?=$progress?></span>
                        </p>
                        
                        <p class="row">
                        Conduct: <span class="dashed-fields w315 float-right">&nbsp;<?=$conduct?></span>
                        </p>
                        
                        <p class="row">
                        Date Of Leaving: <span class="dashed-fields w315 float-right">&nbsp;<?=$date_of_leaving?></span>
                        </p>
                        
                        <p class="row">
                        Std/Class in Which Studying And Since When: <span class="dashed-fields w315 float-right">&nbsp;<?=$std_studying?></span>
                        </p>
                        
                        <p class="row">
                        Reason For Leaving School: <span class="dashed-fields w315 float-right">&nbsp;<?=$reason_for_leaving?></span>
                        </p>
                        
                        <p class="row">
                        Remarks: <span class="dashed-fields w315 float-right">&nbsp;<?=$remark?></span>
                        </p>        
                                
                    </div>
                    
                    <p class="txt-center ft12">Certified that the above information is in accordance with the school register.</p>
                </div>
                
                <div class="row txt-justify footer ft12">
                    <br><br>
                    <div class="txt-center">
                        <span class="maroon">Dated</span>
                        
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <span class="maroon">Class Teacher</span>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                        <span class="maroon">School Head</span>
                    </div>
                </div>
            </div>
            
            <div id="printBtn" class="txt-center">
                <input type="button" class="btn btn-blue" onclick="window.print();" value="print">    
            </div>

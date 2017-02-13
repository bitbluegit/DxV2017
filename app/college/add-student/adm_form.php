<?php require_once '../../includes/clg_header.php';
require_once '../../../numToWord.php';

$sql = "SELECT * FROM clg_details ORDER BY Gr_num DESC LIMIT 1";
$sql2 = "SELECT * FROM user_clg ORDER BY Gr_num DESC LIMIT 1";
$result1 = DB::OneRow($sql);
$result2 = DB::OneRow($sql2);	

// var_dump($result1);
// var_dump($result2);
extract($result1);
extract($result2);


 ?>
        <style>
            @media print {
                @page :first {
                  margin-top: 2cm    /* Top margin on first page 10cm */
                 }
                .left-pane{
                    display:none;
                }
                 .right-pane{
                    display: none;
                }
                .wrapper {
                    margin-top: 15px;
                    border: none;
                    max-height: 1240px;
                    box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);
                }
                .main-block1 {
                    position: relative;
                    top: -1rem;
                }
                .main-block2 {
                    position: relative;
                    top: -4rem;
                }
                .footer {
                    position: relative;
                    top: -6rem;
                }
                #printBtn {
                    display: none;
                }
            }
        </style>


<link rel="stylesheet" type="text/css" href="../../../assets/css/admission-form.css">
<div class="wrapper">
                <div class="row">
                    <div class="col d3">
                        <img class="institute" src="../images/dummy_institute3.png">
                    </div>
                    <div class="col d9 txt-center title">
                        <h2>DEXTRO CAMPUS ACADEMY</h2>
                        <p>Institute Trustee Name</p>
                        <p>(Pre-Primary/Primary/Secondary)</p>
                        <p>(Hindi/English Medium School) Public Trust Regd. No. E-12869 (Mumbai)</p>
                        <p>VIDYA-NAGARI, VILL. PELHAR, TAL. VASAI DIST. PALGHAR</p>
                    </div>
                </div>
                
                <div class="row separator">&nbsp;</div>
                
                <div class="row ft12">
                    <div class="col d12">
                        To<br>
                        The Principal<br>
                        <b>DEXTRO CAMPUS ACADEMY</b><br><br>
                        
                        Sir/Madam,<br>
                                Be kind enough to admin my Son/Daughter/Ward in
                                Medium <b><span class="dashed-fields w100">&nbsp;<? echo $Medium; ?></span></b>
                                Course <b><span class="dashed-fields w100">&nbsp;<?=$course?></span></b> <br>Course Name <b><span class="dashed-fields w100">&nbsp;<?=$CourseName?></span></b>Year <b><span class="dashed-fields w100">&nbsp;<?=$year?></span></b>
                                Sec <b><span class="dashed-fields w100">&nbsp;<?=$Section?></span></b>
                                in our school
                                
                                I shall abide by the rules and regulations provided
                                and to be presented by the school activity.
                    </div>
                    <div class="col d3">
                        <!--<img class="student" src="../images/dummy_student3.png">-->
                    </div>
                </div>
                
                <div class="row">
                    <h4 class="txt-center head">
                        <span class="head-block">STUDENT DETAILS</span>
                    </h4>
                    <div class="col sub-block" >
                        Enroll No: <span class="dashed-fields w100">&nbsp;<?=$Gr_num?></span>
                        
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        Student Name: <span class="dashed-fields w315">&nbsp;<?=$name.' '.$var_last_name?></span>
                        
                        Religion: <span class="dashed-fields w150">&nbsp;<?=$religion?></span>
                        
                                &nbsp;&nbsp;
                        
                        Sub Caste: <span class="dashed-fields w150">&nbsp;<?=$caste?></span>
                        
                                &nbsp;&nbsp;
                        
                        Schedule:
                        <input type="checkbox" <?php if($caste == 'OBC') { echo 'checked'; }?> /> OBC
                        <input type="checkbox" <?php if($caste == 'SC') { echo 'checked'; }?> /> SC
                        <input type="checkbox" <?php if($caste == 'ST') { echo 'checked'; }?> /> ST
                        
                        Date Of Birth: <span class="dashed-fields w150" >&nbsp;<?=date('d-m-Y', strtotime($DOB))?></span>
                        
                                &nbsp;&nbsp;
                                
                        In Words: <span class="dashed-fields w315" style="font-size:13px;">&nbsp; <?php echo dobToText($DOB); ?></span>
                        
                        Place Of Birth: <span class="dashed-fields w569">&nbsp;<?=$birth_place?></span>
                        
                        Last School Attended: <span class="dashed-fields w529">&nbsp;<?=$last_school?></span>
                    </div>
                </div>
                
                
                <div class="row main-block1">
                    <h4 class="txt-center">
                        <span class="head-block">PARENT DETAILS</span>
                    </h4>
                    <div class="col sub-block">
                        Father's Name: <span class="dashed-fields w569">&nbsp;<?=$f_name?></span>
                        
                        Qualification: <span class="dashed-fields w230">&nbsp;<?=$father_qualification?></span>
                                
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                        Occupation: <span class="dashed-fields w230">&nbsp;<?=$occupation?></span>
                        
                        Mother's Name: <span class="dashed-fields w560">&nbsp;<?=$m_name?></span>
                        
                        Qualification: <span class="dashed-fields w230">&nbsp;<?=$mother_qualification?></span>
                                
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                        Occupation: <span class="dashed-fields w230">&nbsp;<?=$mother_occupation?></span>
                    </div>
                    
                    
                </div>
                
                <div class="row main-block2">
                    <h4 class="txt-center">
                        <span class="head-block">CONTACT DETAILS</span>
                    </h4>
                    <div class="col sub-block">
                        Residential Address: <span class="dashed-fields w539">&nbsp;<?=$address?></span>
                        
                        State: <span class="dashed-fields w255"><?=$state?></span>
                                
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                        District: <span class="dashed-fields w255">&nbsp;</span>
                        
                        In Case Of Medical Emergency(Contact No): <span class="dashed-fields w130">&nbsp;<?=$cont_num?></span>
                        
                                &nbsp;&nbsp;&nbsp;
                        
                        Contact No: <span class="dashed-fields w130">&nbsp;</span>
                                
                        Family Doctor: <span class="dashed-fields w315">&nbsp;</span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Contact No: <span class="dashed-fields w130">&nbsp;</span>
                    </div>
                    
                    
                </div>
                
                
                <div class="row txt-justify footer ft12">
                        <h5 class="txt-center no-bottom-margin">DECLARATION</h5>
                        a) I hereby solemnly declare that all the information given above are
                            true and correct to the best of my knowledge and belief.<br>
                        b) I am fully aware that in the event of any information being found
                            false or incorrect, admission of my son/daughter/ward stands cancelled.<br><br>
                            
                        <div class="txt-center">
                            <span class="maroon">Parent/Guardian Signature</span>
                            
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                            <span class="maroon">Accounts Clerk</span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="maroon">Principal Signature</span>
                        </div>
                </div>
            </div>
            
            <div id="printBtn" class="txt-center">
                <input type="button" class="btn btn-blue" onclick="window.print();" value="print">    
            </div>

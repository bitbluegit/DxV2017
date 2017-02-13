<?php require_once '../../includes/usr_sch_header.php' ;?>
 <!-- Transaction Filter Form -->
                <div class="bg-white overflow-x box-shadow margin-bottom30  ">
                    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
                        <i class="ion-android-settings margin-right20"></i>
                        Filter Transaction
                    </h5>
                    <form class="row" name="eqnuiry-filter" id="eqnuiry-filter" onsubmit="return false">
                        <div class="col m12 l3">
                            <label for="startDate" class="font-weight100 small-caps full-width">Start Date</label>
                            <input name = "startDate" id="startDate" type="date" class="full-width" >

                            <label for="endDate" class="font-weight100 small-caps full-width">End Date</label>
                            <input type="date" name="endDate" id="endDate" class="full-width" >
                        </div>
                        
                        <div class="col m12 l3">
                            <label for="mode" class="font-weight100 small-caps full-width">Pay Mode</label>
                            <select name="mode" id="mode" class="full-width">
                                <option value="" disabled selected>Select One</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                            </select>
                        
                            <label for="year" class="font-weight100 small-caps full-width">Session Year</label>
                            <select  name="year" id="year" class="full-width">
                                <option value="" disabled selected>Select Year</option>
                                <option value="2017">2017</option>
                                <option value="2018"> 2018</option>
                            </select>
                        </div>
                        
                        <div class="col m12 l3">
                            <label for="medium" class="font-weight100 small-caps full-width">Medium</label>
                            <select name="medium" id="medium"  class="full-width">
                                <option value="" disabled selected>Select One</option>
                                <?php foreach($GLOBALS['MEDIUM'] as $mdm){echo sprintf("<option value='%s'>%s</option>",$mdm,$mdm); } ?>
                            </select>
                        
                            <label for="standard" class="font-weight100 small-caps full-width">Standard</label>
                            <select name="standard" id="standard" class="full-width">
                                <option value="" disabled selected>Select One</option>
                                 <?php foreach($GLOBALS['STD'] as $std){ echo sprintf("<option value='%s'>%s</option>",$std,$std); } ?>
                            </select>
                        </div>
                        
                        <div class="col m12 l3">
                            <label for="feeType" class="font-weight100 small-caps full-width">Fee Type</label>
                            
                            <div name="feetype" id="feetype" class="overflow-x overflow-y border-full border-radius-2px pad-left15 pad-top5 height85">

                                <?php 
                                $sql    = "SELECT CF.`fee_type` FROM sch_cls_fee CF";
                                $result = DB::allRow($sql);
                                 foreach ($result as  $fees) {
                                  
                                    echo sprintf("<input type='checkbox' value='%s' id='check'> <label for='check1' class='font-weight100' >&nbsp;&nbsp;%s</label><br>",$fees['fee_type'],$fees['fee_type']);
                                    // echo sprintf(' <label for="check1" class="font-weight100" >Admission Fee</label><br>');
                                     # code...
                                 }

                                ?>
                               <!--   <input type="checkbox" id="check1"> 
                                <label for="check1" class="font-weight100" >Admission Fee</label><br>

                                <input type="checkbox" id="check2"> 
                                <label for="check2" class="font-weight100">Monthly Fee</label><br>

                                <input type="checkbox" id="check3"> 
                                <label for="check3" class="font-weight100">Yearly Fee</label><br> --> 
                            </div>
                        </div>
                        
                        <div class="col m12 pad-top10 txt-left">
                            <button type="submit" class="btn bg-grey txt-ash full-width" onclick="filterTransaction()">
                                <i class="ion-android-send"></i>
                                Filter
                            </button>
                        </div>
                        
                    </form>
                </div>
                
                <!-- Transaction Data -->
<section id="transaction-block">

                <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
                    <i class="ion-ios-paper-outline margin-right20"></i>
                    Today's Transactions
                </h5>
                <div class="bg-white overflow-x box-shadow margin-bottom30">
                    <table class="full-width margin-bottom-zero">

                        <thead>
                            <tr class="txt-ash">
                                <th>Enroll No.</th>
                                <th>Student</th>
                                <th>Mdm</th> 
                                <th>Std</th> 
                                <th>Section</th>
                                <th>Reciept No</th> 
                                <th>Amount</th> 
                                <th>Month</th> 
                                <th>Fee Type</th>  
                                <th>Pay Mode</th> 
                                <th>Cheque No.</th> 
                                <th>Late Fee</th> 
                                <th>Reason</th> 
                                <th >Date</th>
                            </tr>
                            
                        </thead>

                        <tbody id="filter-data">

                      <?php

$sql1 = "
         (
            SELECT  AT.Gr_num, US.Name ,US.Medium, US.Std ,US.Section ,AT.Reciept 
            ,AT.Amount ,AT.Month ,AT.fee_type ,AT.pay_mode ,AT.cheque_num ,AT.late_fee ,at.reason, AT.date
            FROM adm_sch_tran AT
            INNER JOIN admin_sch AD ON AD.unique_id = AT.unique_id
            INNER JOIN user_sch US ON US.Gr_num = AT.Gr_num
            WHERE  1=1  {$conMode1} {$conMdm} {$conStd} {$conDate1} {$conYear}
          )
            UNION ALL     

        (
            SELECT ST.Gr_num ,US.Name ,US.Medium ,US.Std ,US.Section ,ST.Reciept,ST.Amount,ST.fee_type, 
            ST.Month, ST.pay_mode ,ST.cheque_num, ST.late_fee, ST.reason, ST.date FROM sch_tran ST
            INNER JOIN admin_sch AD ON AD.unique_id = ST.unique_id 
            INNER JOIN user_sch US ON US.Gr_num = ST.Gr_num 
            WHERE  1=1  {$conMode2} {$conMdm} {$conStd} {$conDate2} {$conYear}
         )
        ";

// $sql = $sql1 .UNION ALL. $sql2;



$data  = DB::allRow($sql1);
// var_dump($data);
// exit();
if($data){
    foreach ($data as $row) {
        echo sprintf('<tr><td>%s</td></tr>',implode('</td><td>', $row));
    }
}else{
    echo '<tr><td colspan="15" style="text-align:center;color:#f00; font-weight:600;font-size:16px;">No Transaction Found !<td></tr>';
}



                      ?>
                                                   </tbody>
                    </table>
                </div>
                

                <!-- Transaction Summary -->
                <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
                    <i class="ion-ios-calculator-outline margin-right20"></i>
                    Transactions Summary
                </h5>
                <div class="bg-white overflow-x box-shadow margin-bottom30">
                    <div class="margin-bottom30 pad-left15 pad-right15">
                        <h5 class="border-bottom pad-top20">
                            Amount Details
                        </h5>
                        
                        <div class="row">
                            <div class="col l4">
                            <?php $sql =" 
                                       SELECT
                                         (
                                         SELECT SUM(AT.Amount) FROM adm_sch_tran AT
                                         )+
                                         (
                                         SELECT SUM(ST.Amount) FROM sch_tran ST
                                         )AS total
                                       ";
                                    $result =DB::oneRow($sql);
                                    $sum = $result['total'];
                                    
                                     // late fee total 
                                       $sql= " SELECT
                                         (
                                         SELECT SUM(AT.late_fee) FROM adm_sch_tran AT
                                         )+
                                         (
                                         SELECT SUM(ST.late_fee) FROM sch_tran ST
                                         )AS late
                                         ";
                                        $result= DB::oneRow($sql);
                                        $late = $result['late'];

                                        // total Amount
                                        $total = $sum + $late;
                                    ?>
                                <span class="badge-blue"><?=$sum?></span><br>
                                <span class="small-caps font-weight700">
                                    Amount
                                </span>
                            </div>
                            
                            <div class="col l4">

                                <span class="badge-orange"><?=$late?></span><br>
                                <span class="small-caps font-weight700">
                                    Late Fee
                                </span>
                            </div>
                            
                            <div class="col l4">
                                <span class="badge-green"><?=$total?></span><br>
                                <span class="small-caps font-weight700">
                                    Total
                                </span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <!-- /Container -->
  </section>          
        <!-- scripts  -->
        <script src="../../../assets/js/app.js"></script>
        <script src="TranFilter.js"></script>
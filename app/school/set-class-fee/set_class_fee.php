<?php require_once '../../includes/header.php'; ?>
             
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
                                    <option value="english">English</option>
                                </select>

                            <label for="feeamount" class="font-weight100 small-caps full-width">Fee Amount</label>
                                  <input type="number" name="feeamount" id="feeamount" class="full-width"   title="Enter Fee amount." required>
                        </div>
                        
                        <div class="col m12 l3">
                            <label for="standard" class="font-weight100 small-caps full-width">Standard</label>
                               <select name="standard" id="standard" class="full-width" title="Select your Standard." required>
                                    <option value="" disabled selected>Select One</option>
                                    <option value="first">First</option>
                                 </select>
                        
                            <label for="latefee"class="font-weight100 small-caps full-width">Late Fee Amount</label>
                                <input type="number" name="latefee" id="latefee" class="full-width" title="Enter Late Fee." required>
                        </div>
                        
                        <div class="col m12 l3">
                            <label for="feefreq" class="font-weight100 small-caps full-width">Fee Frequency</label>
                            <select name="feefreq" id="feefreq" class="full-width" title="Select Fee Frequency" required>
                                <option value="" disabled selected>Select One</option>
                                <option value="per-month">Per Month</option>
                            </select>
                        
                            <label for="feeformat1" class="font-weight100 small-caps full-width">Fee Format 1</label>
                            <select id="feeformat1" class="full-width" title="Select your Fee Format 1." required>
                                <option value="" disabled selected>Select One</option>
                                <option value="compulsory">Compulsory</option>
                            </select>
                        </div>
                        
                        <div class="col m12 l3">
                            <label  for="feename" class="font-weight100 small-caps full-width">Fee Name</label>
                            <input type="text" id="feename" class="full-width" title="Enter Fee Name." required>
                        
                            <label for="feeformat2" class="font-weight100 small-caps full-width">Fee Format 2</label>
                            <select id="feeformat2" class="full-width" title="Select you Fee Format 2." required>
                                <option value="" disabled selected>Select One</option>
                                <option value="payable">Payable</option>
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
                                <th>Medium</th> <th>Standard</th> <th>Frequency</th> <th>Name</th> <th>Amount</th>
                                <th>Late Fee</th> <th>Fee Format 1</th> <th>Fee Format 2</th> <th>Consession</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //created fee details
                            $sql = "select sch_cls_fee.medium , sch_cls_fee.std, sch_cls_fee.one_time, sch_cls_fee.fee_type, sch_cls_fee.fee,sch_cls_fee.lfee,sch_cls_fee.cumpulsory, sch_cls_fee.status,
                                sch_cls_fee.unique_id from Sch_cls_fee";

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
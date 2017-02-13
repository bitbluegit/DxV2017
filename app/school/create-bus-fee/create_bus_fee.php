<?php require_once '../../includes/header.php'; ?>
                
                <!-- Transaction Filter Form -->
                <div class="bg-white overflow-x box-shadow margin-bottom30  ">
                    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
                        <i class="ion-android-settings margin-right20"></i>
                        Bus Fee Detail
                    </h5>
                    <!-- Expense Form -->
                    <form class="row" method="post" action="" onsubmit="return false">
                        <!-- area name -->
                        <div class="col m12 l4">
                            <label for="areaname" class="font-weight100 small-caps full-width">Area Name</label>
                                <input type="text" name="areaname" id="areaname" class="full-width" title="Enter Area Name.">
                        </div>
                        
                        <!--Fee Amount -->
                        <div class="col m12 l4">
                            <label for="feeamount" class="font-weight100 small-caps full-width">Fee Amount</label>
                                <input type="number" name="feeamount" id="feeamount" class="full-width" title="Enter Fee Amount.">
                        </div>
                        
                        <!-- Late Fee -->
                        <div class="col m12 l4">
                            <label for="latefee" class="font-weight100 small-caps full-width">Late Fee Amount</label>
                                <input type="number" name="latefee" id="latefee" class="full-width" title="Enter Late Fee Amount.">
                        </div>
                        
                        <!-- enroll no -->
                        <div class="col m12 l4">
                            <label for="feefreq" class="font-weight100 small-caps full-width">Fee Frequency.</label>
                                <select name="feefreq" id="feefreq" class="full-width" title="Select Your Fee Frequency.">
                                <option value="" disabled selected>Select One</option>
                                <option value="monthly">Monthly</option>
                            </select>
                        </div>
                        
                      
                        
                        <!-- Standard -->
                        <div class="col m12 l4">
                            <label for="latefeefreq" class="font-weight100 small-caps full-width">Late Fee Frequency</label>
                            <select name="latefeefreq" id="latefeefreq" class="full-width" title="Select Late Fee Frequency.">
                                <option value="" disabled selected>Select One</option>
                                <option value="one-time">One Time</option>
                            </select>
                        </div>
                        
                        
                        
                        <!-- Submit Button -->
                        <div class="col m12 pad-top10 txt-left">
                            <button type="submit" class="btn bg-grey txt-ash full-width"
                             id="createBusFeeSubmit">
                                <i class="ion-android-send"></i>
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
                
                 <!-- ENquiry details Data -->
                <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
                    <i class="ion-ios-paper-outline margin-right20"></i>
                    Created Bus Fee
                </h5>
                <div class="bg-white overflow-x box-shadow margin-bottom30">
                    <table class="full-width margin-bottom-zero">
                        <thead>                            
                            <tr class="txt-ash">     
                               <th>Area</th> <th>Amount</th> <th>Late Fee</th> <th>Fee Frequency</th> <th>Late Fee Frequency</th>
                                <th>Created</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //bus fee detail
                            $sql = "select bus_fee.area_name,bus_fee.bus_fee_amount,bus_fee.bus_lfee_amount,bus_fee.fee_freq,bus_fee.late_fee_freq,
                                date(bus_fee.created_at),bus_fee.unique_id from bus_fee";

                               $busFeeArr = DB::allRow($sql);
                            foreach ($busFeeArr as  $fee) {
                                $unique_id = array_pop($fee);
                                    echo sprintf("<tr><td>%s</td></tr>", implode('</td><td>', $fee));
                            }

                              ?>       

                            
                        </tbody>
                    </table>
                </div>
                
                
                
            </div>
            <!-- /Container -->




<script src="../../../assets/js/app.js"></script>
<script src="create_bus_fee.js"></script>
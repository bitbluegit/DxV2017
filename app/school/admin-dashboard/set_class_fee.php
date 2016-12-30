<?php require_once '../../includes/header.php'; ?>
             
                <!-- Transaction Filter Form -->
                <div class="bg-white overflow-x box-shadow margin-bottom30  ">
                    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
                        <i class="ion-android-settings margin-right20"></i>
                        Fee Details
                    </h5>
                    <form class="row">
                        <div class="col m12 l3">
                            <label for="medium" class="font-weight100 small-caps full-width">Medium</label>
                                <select id="medium" class="full-width" title="Select your Medium eg. English">
                                    <option>Select One</option>
                                    <option>English</option>
                                </select>

                            <label for="feeamount" class="font-weight100 small-caps full-width">Fee Amount</label>
                                  <input type="number" id="feeamount" class="full-width" title="Enter Fee amount.">
                        </div>
                        
                        <div class="col m12 l3">
                            <label for="standard" class="font-weight100 small-caps full-width">Standard</label>
                               <select id="standard" class="full-width" title="Select your Standard.">
                                    <option>Select One</option>
                                    <option>First</option>
                                 </select>
                        
                            <label for="latefee"class="font-weight100 small-caps full-width">Late Fee Amount</label>
                                <input type="number" id="latefee" class="full-width" title="Enter Late Fee.">
                        </div>
                        
                        <div class="col m12 l3">
                            <label for="feefrequency" class="font-weight100 small-caps full-width">Fee Frequency</label>
                            <select id="feefrequency" class="full-width" title="Select Fee Frequency">
                                <option>Select One</option>
                            </select>
                        
                            <label for="feeformat1" class="font-weight100 small-caps full-width">Fee Format 1</label>
                            <select id="feeformat1" class="full-width" title="Select your Fee Format 1.">
                                <option>Select One</option>
                            </select>
                        </div>
                        
                        <div class="col m12 l3">
                            <label  for="feename" class="font-weight100 small-caps full-width">Fee Name</label>
                            <input type="number" id="feename" class="full-width" title="Enter Fee Name.">
                        
                            <label for="feeformat2" class="font-weight100 small-caps full-width">Fee Format 2</label>
                            <select id="feeformat2" class="full-width" title="Select you Fee Format 2.">
                                <option>Select One</option>
                            </select>
                        </div>
                        
                        <div class="col m12 pad-top10 txt-left">
                            <button type="submit" class="btn bg-grey txt-ash full-width">
                                <i class="ion-android-send"></i>
                                Filter
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
                        <tbody>
                            <tr class="txt-ash">     
                                <th>Medium</th>
                                <th>Standard</th>
                                <th>Frequency</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Late Fee</th>
                                <th>Fee Format 1</th>
                                <th>Fee Format 2</th>
                                <th>Consession</th> 
                            </tr>
                            <tr>                               
                                <td>Eng</td>
                                <td>1<sup>st</sup></td>
                                <td>One Time</td>
                                <td>Uniform</td>
                                <td>500</td>
                                <td>50</td>
                                <td>Compulsory</td>
                                <td>Payable</td>
                                <td>50 @ 2</td>
                            </tr>
                            <tr>
                                <td>Eng</td>
                                <td>1<sup>st</sup></td>
                                <td>One Time</td>
                                <td>Uniform</td>
                                <td>500</td>
                                <td>50</td>
                                <td>Compulsory</td>
                                <td>Payable</td>
                                <td>50 @ 2</td>
                            </tr>
                            <tr>
                                <td>Eng</td>
                                <td>1<sup>st</sup></td>
                                <td>One Time</td>
                                <td>Uniform</td>
                                <td>500</td>
                                <td>50</td>
                                <td>Compulsory</td>
                                <td>Payable</td>
                                <td>50 @ 2</td>
                            </tr>
                            <tr>
                               <td>Eng</td>
                                <td>1<sup>st</sup></td>
                                <td>One Time</td>
                                <td>Uniform</td>
                                <td>500</td>
                                <td>50</td>
                                <td>Compulsory</td>
                                <td>Payable</td>
                                <td>50 @ 2</td>
                            </tr>
                            <tr>
                                <td>Eng</td>
                                <td>1<sup>st</sup></td>
                                <td>One Time</td>
                                <td>Uniform</td>
                                <td>500</td>
                                <td>50</td>
                                <td>Compulsory</td>
                                <td>Payable</td>
                                <td>50 @ 2</td>
                            </tr>
                            <tr>
                               <td>Eng</td>
                                <td>1<sup>st</sup></td>
                                <td>One Time</td>
                                <td>Uniform</td>
                                <td>500</td>
                                <td>50</td>
                                <td>Compulsory</td>
                                <td>Payable</td>
                                <td>50 @ 2</td>
                            </tr>
                            <tr>
                               <td>Eng</td>
                                <td>1<sup>st</sup></td>
                                <td>One Time</td>
                                <td>Uniform</td>
                                <td>500</td>
                                <td>50</td>
                                <td>Compulsory</td>
                                <td>Payable</td>
                                <td>50 @ 2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    
                </div>
                
            </div>
            <!-- /Container -->

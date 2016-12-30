<?php require_once '../../includes/header.php' ; ?>
 <!-- Transaction Filter Form -->
                <div class="bg-white overflow-x box-shadow margin-bottom30  ">
                    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
                        <i class="ion-android-settings margin-right20"></i>
                        Filter Transaction
                    </h5>
                    <form class="row">
                        <div class="col m12 l3">
                            <label class="font-weight100 small-caps full-width">Start Date</label>
                            <input type="date" class="full-width">

                            <label class="font-weight100 small-caps full-width">End Date</label>
                            <input type="date" class="full-width">
                        </div>
                        
                        <div class="col m12 l3">
                            <label class="font-weight100 small-caps full-width">Pay Mode</label>
                            <select class="full-width">
                                <option>Select One</option>
                            </select>
                        
                            <label class="font-weight100 small-caps full-width">Session Year</label>
                            <select class="full-width">
                                <option>Select One</option>
                            </select>
                        </div>
                        
                        <div class="col m12 l3">
                            <label class="font-weight100 small-caps full-width">Medium</label>
                            <select class="full-width">
                                <option>Select One</option>
                            </select>
                        
                            <label class="font-weight100 small-caps full-width">Standard</label>
                            <select class="full-width">
                                <option>Select One</option>
                            </select>
                        </div>
                        
                        <div class="col m12 l3">
                            <label class="font-weight100 small-caps full-width">Fee Type</label>
                            
                            <div class="overflow-x overflow-y border-full border-radius-2px pad-left15 pad-top5 height85">
                                <input type="checkbox" id="check1"> 
                                <label for="check1" class="font-weight100">Admission Fee</label><br>

                                <input type="checkbox" id="check2"> 
                                <label for="check2" class="font-weight100">Monthly Fee</label><br>

                                <input type="checkbox" id="check3"> 
                                <label for="check3" class="font-weight100">Yearly Fee</label><br>
                            </div>
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
                                <th >User</th>
                                <th >Student</th>
                                <th >Enroll No.</th>
                                <th >Mdm</th>
                                <th >Std</th>
                                <th >Section</th>
                                <th >Fee Type</th>
                                <th >Month</th>
                                <th >Receipt No.</th>
                                <th >Pay Mode</th>
                                <th >Cheque No.</th>
                                <th >Late Fee</th>
                                <th >Disc.</th>
                                <th >Date</th>
                                <th >Remark</th>
                            </tr>
                            <tr>
                                <td >Admin</td>
                                <td >Pradeep</td>
                                <td >21</td>
                                <td >Eng</td>
                                <td >1<sup>st</sup></td>
                                <td >A</td>
                                <td >Admission</td>
                                <td >Oct</td>
                                <td >RC:215</td>
                                <td >Cheque</td>
                                <td >-</td>
                                <td >-</td>
                                <td >-</td>
                                <td >21/Oct</td>
                                <td >-</td>
                            </tr>
                            <tr>
                                <td >Admin</td>
                                <td >Pradeep</td>
                                <td >21</td>
                                <td >Eng</td>
                                <td >1<sup>st</sup></td>
                                <td >A</td>
                                <td >Admission</td>
                                <td >Oct</td>
                                <td >RC:215</td>
                                <td >Cheque</td>
                                <td >-</td>
                                <td >-</td>
                                <td >-</td>
                                <td >21/Oct</td>
                                <td >-</td>
                            </tr>
                            <tr>
                                <td >Admin</td>
                                <td >Pradeep</td>
                                <td >21</td>
                                <td >Eng</td>
                                <td >1<sup>st</sup></td>
                                <td >A</td>
                                <td >Admission</td>
                                <td >Oct</td>
                                <td >RC:215</td>
                                <td >Cheque</td>
                                <td >-</td>
                                <td >-</td>
                                <td >-</td>
                                <td >21/Oct</td>
                                <td >-</td>
                            </tr>
                            <tr>
                                <td >Admin</td>
                                <td >Pradeep</td>
                                <td >21</td>
                                <td >Eng</td>
                                <td >1<sup>st</sup></td>
                                <td >A</td>
                                <td >Admission</td>
                                <td >Oct</td>
                                <td >RC:215</td>
                                <td >Cheque</td>
                                <td >-</td>
                                <td >-</td>
                                <td >-</td>
                                <td >21/Oct</td>
                                <td >-</td>
                            </tr>
                            <tr>
                                <td >Admin</td>
                                <td >Pradeep</td>
                                <td >21</td>
                                <td >Eng</td>
                                <td >1<sup>st</sup></td>
                                <td >A</td>
                                <td >Admission</td>
                                <td >Oct</td>
                                <td >RC:215</td>
                                <td >Cheque</td>
                                <td >-</td>
                                <td >-</td>
                                <td >-</td>
                                <td >21/Oct</td>
                                <td >-</td>
                            </tr>
                            <tr>
                                <td >Admin</td>
                                <td >Pradeep</td>
                                <td >21</td>
                                <td >Eng</td>
                                <td >1<sup>st</sup></td>
                                <td >A</td>
                                <td >Admission</td>
                                <td >Oct</td>
                                <td >RC:215</td>
                                <td >Cheque</td>
                                <td >-</td>
                                <td >-</td>
                                <td >-</td>
                                <td >21/Oct</td>
                                <td >-</td>
                            </tr>
                            <tr>
                                <td >Admin</td>
                                <td >Pradeep</td>
                                <td >21</td>
                                <td >Eng</td>
                                <td >1<sup>st</sup></td>
                                <td >A</td>
                                <td >Admission</td>
                                <td >Oct</td>
                                <td >RC:215</td>
                                <td >Cheque</td>
                                <td >-</td>
                                <td >-</td>
                                <td >-</td>
                                <td >21/Oct</td>
                                <td >-</td>
                            </tr>
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
                                <span class="badge-blue">14500</span><br>
                                <span class="small-caps font-weight700">
                                    Amount
                                </span>
                            </div>
                            
                            <div class="col l4">
                                <span class="badge-orange">750</span><br>
                                <span class="small-caps font-weight700">
                                    Late Fee
                                </span>
                            </div>
                            
                            <div class="col l4">
                                <span class="badge-green">15250</span><br>
                                <span class="small-caps font-weight700">
                                    Total
                                </span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <!-- /Container -->
            
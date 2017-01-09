<?php require_once '../../includes/header.php'; ?>

                <!-- Transaction Filter Form -->
                <div class="bg-white overflow-x box-shadow margin-bottom30  ">
                    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
                        <i class="ion-android-settings margin-right20"></i>
                        Message Filter
                    </h5>
                    <!-- message report Form -->
                    <form class="row">                        
                        <!--Start Date-->
                        <div class="col ma12 l4">
                            <label for="startdate" class="font-weight100 small-caps full-width">Start Date</label>
                                  <input type="date" id="startdate" class="full-width" title="Choose start date.">
                        </div>
                        
                        <!--End Date-->
                        <div class="col ma12 l4">
                            <label for="enddate" class="font-weight100 small-caps full-width">End Date</label>
                                  <input type="date" id="enddate" class="full-width" title="Choose end date.">
                        </div>
                        
                        <!--template for -->
                        <div class="col m12 l4">
                            <label for="teachercommon" class="font-weight100 small-caps full-width">Teacher / Common</label>
                                <input type="text" id="teachercommon" list="teacher_common_list" class="full-width" title="Choose end date.">
                                    <datalist id="teacher_common_list">
                                        <option value="">Teacher</option>
                                        <option value="">Common</option>
                                    </datalist>
                        </div>                      

                        <!-- Submit Button -->
                        <div class="col m12 pad-top10 txt-left">
                            <button type="submit" class="btn bg-grey txt-ash full-width">
                                <i class="ion-android-send"></i>
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
                
                 <!-- ENquiry details Data -->
                <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
                    <i class="ion-ios-paper-outline margin-right20"></i>
                    Message Report
                </h5>
                <div class="bg-white overflow-x box-shadow margin-bottom30">
                    <table class="full-width margin-bottom-zero">
                        <tbody>
                            <tr class="txt-ash">     
                                <th>User Name</th>
                                <th>Message Type</th>
                                <th>Message Count</th>
                                <th>Date</th>                               
                            </tr>
                            <tr>                               
                                <td>hafeez</td>
                                <td>admission</td>
                                <td>25</td>
                                <td>12/12/2016</td>                               
                            </tr>
                             <tr>                               
                                <td>hafeez</td>
                                <td>admission</td>
                                <td>25</td>
                                <td>12/12/2016</td>                               
                            </tr>
                            <tr>                               
                                <td>hafeez</td>
                                <td>admission</td>
                                <td>25</td>
                                <td>12/12/2016</td>                               
                            </tr>
                           <tr>                               
                                <td>hafeez</td>
                                <td>admission</td>
                                <td>25</td>
                                <td>12/12/2016</td>                               
                            </tr>
                         <tr>                               
                                <td>hafeez</td>
                                <td>admission</td>
                                <td>25</td>
                                <td>12/12/2016</td>                               
                            </tr>
                         <tr>                               
                                <td>hafeez</td>
                                <td>admission</td>
                                <td>25</td>
                                <td>12/12/2016</td>                               
                            </tr>
                          <tr>                               
                                <td>hafeez</td>
                                <td>admission</td>
                                <td>25</td>
                                <td>12/12/2016</td>                               
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                
                
            </div>
            <!-- /Container -->

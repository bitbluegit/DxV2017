<?php require_once '../../includes/header.php'; ?>

                <!-- Transaction Filter Form -->
                <div class="bg-white overflow-x box-shadow margin-bottom30  ">
                    <h5 class="bg-ash pad10 small-caps txt-white align-left margin-bottom-zero">
                        <i class="ion-android-settings margin-right20"></i>
                        Expenses
                    </h5>
                    <!-- Expense Form -->
                    <form class="row">
                        <!-- Voucher -->
                        <div class="col m12 l4">
                            <label for="voucher" class="font-weight100 small-caps full-width">Voucher No.</label>
                            <input type="number" id="voucher" class="full-width" value="12" readonly>
                        </div>
                        
                        <!-- Date -->
                        <div class="col m12 l4">
                            <label for="date" class="font-weight100 small-caps full-width">Today's Date</label>
                            <input type="date" id="date" class="full-width" title="Select today's date.">
                        </div>
                        
                        <!-- Branch -->
                        <div class="col m12 l4">
                            <label for="branch" class="font-weight100 small-caps full-width">Branch Name</label>
                            <select id="brach" class="full-width" title="Select your branch name.">
                                <option></option>
                                <option>Nalasopara</option>
                            </select>
                        </div>
                        
                        <!-- Title -->
                        <div class="col m12 l4">
                            <label for="title" class="font-weight100 small-caps full-width">Title</label>
                            <input type="text" id="title" class="full-width"  title="Enter expense title e.g. uniform, water etc.">
                        </div>
                        
                        <!-- Name -->
                        <div class="col m12 l4">
                            <label for="name" class="font-weight100 small-caps full-width">Name</label>
                            <input type="text" id="name" class="full-width" title="Enter name of the payee.">
                        </div>
                        
                        <!-- Mode -->
                        <div class="col m12 l4">
                            <label for="mode" class="font-weight100 small-caps full-width">Mode</label>
                            <select id="mode" class="full-width" title="Select your payment mode.">
                                <option></option>
                                <option>Cash</option>
                            </select>
                        </div>
                        
                        <!-- Particular -->
                        <div class="col m12 l4">
                            <label for="particular" class="font-weight100 small-caps full-width">Particular</label>
                            <input type="text" id="particular" class="full-width"  title="Enter particular name e.g. pen, stationary etc.">
                        </div>
                        
                        <!-- Amount -->
                        <div class="col m12 l4">
                            <label for="amount" class="font-weight100 small-caps full-width">Amount</label>
                            <input type="text" id="amount" class="full-width" title="Enter particular amount.">
                        </div>
                        
                        <!-- Add Button -->
                        <div class="col m12 l4">
                            <label>&nbsp;</label><br>
                            <button type="submit" class="btn btn-blue" title="Add more particular.">
                                <i class="ion-android-add"></i>
                                Add
                            </button>
                        </div>
                        
                        <!-- Dynamic Particular -->
                        <div class="col m12 l4">
                            <label for="particular" class="font-weight100 small-caps full-width">Particular</label>
                            <input type="text" id="particular" class="full-width"  title="Enter particular name e.g. pen, stationary etc.">
                        </div>
                        
                        <!-- Dynamic Amount -->
                        <div class="col m12 l4">
                            <label for="amount" class="font-weight100 small-caps full-width">Amount</label>
                            <input type="text" id="amount" class="full-width" title="Enter particular amount.">
                        </div>
                        
                        <!-- Dynamic Add/Remove Button -->
                        <div class="col m12 l4">
                            <label>&nbsp;</label><br>
                            <button type="submit" class="btn btn-blue" title="Add more particular.">
                                <i class="ion-android-add"></i>
                            </button>
                            <button type="submit" class="btn btn-red" title="Remove particular.">
                                <i class="ion-android-remove"></i>
                            </button>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="col m12 pad-top10 txt-left">
                            <button type="submit" class="btn bg-grey txt-ash full-width">
                                <i class="ion-android-send"></i>
                                Generate Expense
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
            <!-- /Container -->

            
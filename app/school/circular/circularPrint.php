<?php require_once '../../includes/header.php';
	require_once '../../../helper/db.php';

	$sql = "SELECT * FROM circular ORDER BY cir_no DESC LIMIT 1";
	$data = DB::oneRow($sql);
	$cir_data =extract($data);
	// echo $cir_no;

 ?>

<style>
    .bonafide-span-left {
        margin: 5px;
        padding: 1px;
        float: left;
        width: 85%;
        height: 120px;
        font-variant: small-caps;
    }

    .inst_details {
        padding-left: 30px;
        text-align: left;
        line-height: 5px;
    }

    .bonafide-span-right {
        margin: 5px;
        padding: 2px 2px 8px 2px;
        width: 25%;
        float: right;
        /*box-shadow: 0px 0px 6px rgba(52,73,94,0.5);*/
        height: 120px;
        font-variant: small-caps;
    }

    table.data-table {
        border-collapse: collapse;
    }

    table.data-table, .data-table td {
        border: 5px solid rgba(52,73,94,0.5);
        text-align: center;
    }
</style>
<!-- print circular div  -->


<div class="span-right" style="width: 1025px; border: solid; height: auto;">
    <div class="main-container">
        <div class="bonafide-span-left inst_details">
            <div>
                <img src="data:image/jpeg;base64,<?php echo $inst_details['Logo'] ?>" alt="School logo" style="text-align:left;float:left;width: 120px;height: 120px;margin-top: 0px;border-radius:10px;"/>
            </div>
            <div style="margin-left: 120px; margin-top: -20px;">
                <p style="text-align: center; font-size: 20px;"><?php echo $_INSTITUE_DETAILS['Institue_trusty'] ?></p>
                <h2 style="text-align: center; color: #AA0000; font-size: 20px;"><b><?php echo $inst_details['Name'] !="" ? $inst_details['Name'] :  $_INSTITUE_DETAILS['Institute_name']['school'] ; ?></b> </h2>
                <p style="text-align: center; font-size: 20px;"><?php echo $_INSTITUE_DETAILS['Institue_std_upto']['school'] ?></p>
                <p style="text-align: center; font-size: 14px;"><?php echo $_INSTITUE_DETAILS['Institue_address']['school'] ; ?> </p>
                <p style="text-align: center; font-size: 16px;"><?php echo $_INSTITUE_DETAILS['Institue_address_index']['school'] ; ?> </p>
            </div>
           
            <br />
            <hr style="height: 5px; background-color: #AA0000; width: 900px;" />
        </div>


        <p style=" padding-top:150px;text-align: center; text-decoration: underline; font-size: 22px;"><b style="padding-top:-100px;">CIRCULAR</b></p>
        
        <div style="margin-top:-10px;">
            <span style="float:left;margin-left:50px;">
                <b>Issue For : <?php
                         echo $cir_for; 
                          ?></b>
            </span>
            <span  style="float:right;margin-right:40px;">
               <b> Issue Date : <?php
                          echo ($created_at !="" ?  date("d-m-Y", strtotime($created_at)) :"-"  ); 
                          ?></b>
            </span>
        </div>
        <br />
        
        
        
         <p style="margin-left:50px;">
           <b>SUBJECT :   <?php  echo $cir_subject; ?></b>
        </p>
        
        <br />
        <div style="margin-left: 100px; font-size: 22px;">
            <p style="font-size: 18px;">
                <span style="float:right;margin-right:50px;font-weight:bold;">Admin  </span>
                <span style="float:right;margin-right:200px;font-weight:bold;">Principle </span>
            </p>
            <br />

            <p style="text-align:center;margin-left:-100px;" class="no-print"> <button class="no-print" onclick="window.print()" >Print</button>     </p>


        </div>
    </div>
</div>

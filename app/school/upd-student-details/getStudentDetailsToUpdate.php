<?php 

require_once '../../../helper/require.php';

$Column = array(

	'unique_id'           => array('field_type' => 'text'  ,  'alias' => 'USER ID'              , 'queryAlias' => array('US.unique_id' , 'SD.unique_id') ),
	'Gr_num'              => array('field_type' => 'text'  ,  'alias' => 'ENROLL NUM'           , 'queryAlias' => array('US.Gr_num' , 'SD.Gr_num') ),
	'Enroll'              => array('field_type' => 'text'  ,  'alias' => 'GR NUM'               , 'queryAlias' => array('US.Enroll' , 'SD.Enroll') ),
	'name'                => array('field_type' => 'text'  ,  'alias' => 'STDUDENT NAME'        , 'queryAlias' => array('US.Name' , 'SD.name') ),

	'Medium'              => array('field_type' => 'text'  ,  'alias' => 'MEDIUM'    	          , 'queryAlias' =>  'US.Medium'      ) ,
	'Std'                 => array('field_type' => 'text'  ,  'alias' => 'STD'    		      , 'queryAlias' =>  'US.Std'         ) ,
	'Section'             => array('field_type' => 'text'  ,  'alias' => 'SECTION'    	      , 'queryAlias' =>  'US.Section'     ) ,
	'roll_no'             => array('field_type' => 'text'  ,  'alias' => 'ROLL NO'              , 'queryAlias' =>  'US.roll_no'     ) ,
	'area_code'           => array('field_type' => 'text'  ,  'alias' => 'AREA CODE'            ,  'queryAlias' =>  'US.area_code'  ) ,

	'f_name'               => array('field_type' => 'text' ,  'alias' => 'Father Name'          , 'queryAlias'  => 'SD.f_name'                ) , 
	'm_name'               => array('field_type' => 'text' ,  'alias' => 'Mother Name'          , 'queryAlias'  => 'SD.m_name'                ) , 
	'sex'                  => array('field_type' => 'text' ,  'alias' => 'Gender'               , 'queryAlias'  => 'SD.sex'                   ) , 
	'DOB'                  => array('field_type' => 'date' ,  'alias' => 'DOB'                  , 'queryAlias'  => 'SD.DOB'                   ) , 
	'birth_place'          => array('field_type' => 'text' ,  'alias' => 'Birth Place'          , 'queryAlias'  => 'SD.birth_place'           ) , 
	'cont_num'             => array('field_type' => 'text' ,  'alias' => 'Contact Number'       , 'queryAlias'  => 'SD.cont_num'              ) , 
	'address'              => array('field_type' => 'text' ,  'alias' => 'Address'              , 'queryAlias'  => 'SD.address'               ) , 
	'off address'          => array('field_type' => 'text' ,  'alias' => 'Off address'          , 'queryAlias'  => 'SD.off address'           ) , 
	'occupation'           => array('field_type' => 'text' ,  'alias' => 'Occupation'           , 'queryAlias'  => 'SD.occupation'            ) , 
	'docs'                 => array('field_type' => 'text' ,  'alias' => 'Docs       '          , 'queryAlias'  => 'SD.docs'                  ) , 
	'religion'             => array('field_type' => 'text' ,  'alias' => 'Religion   '          , 'queryAlias'  => 'SD.religion'              ) , 
	'caste'                => array('field_type' => 'text' ,  'alias' => 'Caste      '          , 'queryAlias'  => 'SD.caste'                 ) , 
	'nationality'          => array('field_type' => 'text' ,  'alias' => 'Nationality'          , 'queryAlias'  => 'SD.nationality'           ) , 
	'last_school'          => array('field_type' => 'text' ,  'alias' => 'Last School'          , 'queryAlias'  => 'SD.last_school'           ) , 
	'adhar_num'            => array('field_type' => 'text' ,  'alias' => 'Aadhar Num'           , 'queryAlias'  => 'SD.adhar_num'             ) , 
	'status'               => array('field_type' => 'text' ,  'alias' => 'status'               , 'queryAlias'  => 'SD.status'                ) , 
	'father_qualification' => array('field_type' => 'text' ,  'alias' => 'Father Qualification' , 'queryAlias'  => 'SD.father_qualification' ) , 
	'mother_qualification' => array('field_type' => 'text' ,  'alias' => 'Mother Qualification' , 'queryAlias'  => 'SD.mother_qualification' ) , 
	'mother_occupation'    => array('field_type' => 'text' ,  'alias' => 'Mother Occupation'    , 'queryAlias'  => 'SD.mother_occupation'    ) , 
	'type_of_admission'    => array('field_type' => 'text' ,  'alias' => 'Type Of Admission'    , 'queryAlias'  => 'SD.type_of_admission'    ) , 
	'state'                => array('field_type' => 'text' ,  'alias' => 'State'                , 'queryAlias'  => 'SD.state'                ) , 
	'doa'                  => array('field_type' => 'text' ,  'alias' => 'Date Of Birth'        , 'queryAlias'  => 'SD.doa'  		               )
	);





// Request Params 
$reqData =  json_decode($_POST['data'],true);
extract($reqData); // $mdm , $std, $div , $updateFiledName
$fieldDetails  = $Column[$updateFiledName];

$columnName = $fieldDetails['queryAlias'];
$nameAlias  = $fieldDetails['alias'];
$filedType  = $fieldDetails['field_type'];

$query = " SELECT US.Gr_num AS 'Enroll No',  US.roll_no AS 'Roll No', US.Name AS 'Name' , {$columnName} FROM user_sch US 
INNER JOIN sch_details SD ON SD.Gr_num = US.gr_num 
WHERE US.`Medium`='{$mdm}' AND  US.`Std`= '{$std}'  AND US.`Section`= '{$div}' ";



$result  = DB::allRow($query);

$tData = '';

if($result){
	
	foreach ( $result as $data ) {
		$fieldValue = array_pop($data);
		$tData .= sprintf('<tr class="stuDetRow"> <td>%s</td> <td><input type="%s" data-grnum ="%s"   value="%s"></td></tr>', implode('</td><td>',$data),$filedType,$data['Enroll No'],$fieldValue);	
	}
}else{
	$tData .=  '<tr><td colspan="4"> No data Found </tr></td>';
}

?>


<!-- TEMPLATE START  -->
<table>
	<thead> <tr> <th>Enroll No </th> <th>Rol No</th> <th>Name</th> <th><?= $nameAlias; ?></th> </tr> </thead>
	<tbody>



		<?= $tData; ?> 
	</tbody>
    
    <tfoot> 
        <tr> <td colspan="4"> <button class="btn btn-primary" data-coltype="<?=$updateFiledName?>" onclick="updateStduentDetail()"> Update </button> </td> </tr>
    </tfoot>

</table>


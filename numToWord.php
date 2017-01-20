<?php

function convert_number_to_words($number) 
{ 
    if (($number < 0) || ($number > 999999999)) 
    { 
        throw new Exception("Number is out of range");
    } 

    $Gn = floor($number / 1000000);  /* Millions (giga) */ 
    $number -= $Gn * 1000000; 
    $kn = floor($number / 1000);     /* Thousands (kilo) */ 
    $number -= $kn * 1000; 
    $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
    $number -= $Hn * 100; 
    $Dn = floor($number / 10);       /* Tens (deca) */ 
    $n = $number % 10;               /* Ones */ 

    $res = ""; 

    if ($Gn) 
    { 
        $res .= convert_number_to_words($Gn) . " Million"; 
    } 

    if ($kn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number_to_words($kn) . " Thousand"; 
    } 

    if ($Hn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number_to_words($Hn) . " Hundred"; 
    } 

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", 
        "Nineteen"); 
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", 
        "Seventy", "Eigthy", "Ninety"); 

    if ($Dn || $n) 
    { 
        if (!empty($res)) 
        { 
            $res .= " and "; 
        } 

        if ($Dn < 2) 
        { 
            $res .= $ones[$Dn * 10 + $n]; 
        } 
        else 
        { 
            $res .= $tens[$Dn]; 

            if ($n) 
            { 
                $res .= "-" . $ones[$n]; 
            } 
        } 
    } 

    if (empty($res)) 
    { 
        $res = "zero"; 
    } 

    return $res; 
} 

function number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return ucfirst($string);
}

function dobToText($dob){
    
    $dob=date('Y-m-d',strtotime($dob));
    $monthArr=array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October'
    ,'11'=>'November','12'=>'December');
    
    $digitArr=array('One'=>'First','Two'=>'Second','Three'=>'Third','Four'=>'Fourth','Five'=>'Fifth','Six'=>'Sixth','Seven'=>'Seventh','Eight'=>'Eighth','Nine'=>'Nineth','Ten'=>'Tength');
  
    
    if(strpos($dob,'-'))
    {
        
        $dobArr=explode('-',$dob);
        
          // year 
        if((int)$dobArr[0] < 2000){
            $str3="";
            $yr1=number_to_words(substr($dobArr[0],0,2));
            $yr2=number_to_words(substr($dobArr[0],2,4));
            $str3 =$yr1." ".$yr2;
        }else{
            $str3 = number_to_words($dobArr[0]);
        }
        
        // day 
        $str1=number_to_words((int)$dobArr[2]);
        /// Month Name 
        if((int)$dobArr[2] <= 10){
            $str1 = $digitArr[$str1];
        }
        
        ////  month
        $str2=$monthArr[$dobArr[1]];
        $str = $str1." ".$str2." ".$str3 ; // format 2016-01-01
        return ucfirst($str);
    }
    else if(strpos($dob,'/')){
        
        $dobArr=explode('/',$dob);
        
        // year 
        if((int)$dobArr[0]< 2000){
            $str3="";
            $yr1=number_to_words(substr($dobArr[0],0,2));
            $yr2=number_to_words(substr($dobArr[0],2,4));
            $str3 =$yr1." ".$yr2;
        }else{
            $str3 = number_to_words($dobArr[0]);
        }
        
        // day 
        $str1=number_to_words((int)$dobArr[2]);
        /// Month Name 
        if((int)$dobArr[2] <= 10){
            $str1 = $digitArr[$str1];
        }
        
        ////  month
        $str2=$monthArr[$dobArr[1]];
        $str = $str1." ".$str2." ".$str3 ; // format 2016-01-01
        return ucfirst($str);
    }
    
    return "-";
}



function Current_session_yr(){
    $curr_yr = date('Y'); // 2016
    $curr_month = date('m'); // 01-12
    if ($curr_month < 6) {
        $currentSessionYr = ($curr_yr - 1) . '-' . $curr_yr;
    } else {
        $currentSessionYr = ($curr_yr) . '-' . ($curr_yr + 1);
    }
    
    $currentSessionYr='2016-17'; // set default to 2016-17 
    return $currentSessionYr;

}



function base64_to_jpeg($base64_string, $output_file) {

    $data = base64_decode($base64_string);
    $success = file_put_contents($output_file, $data);
    //return $success;
    
    //$photo = 'base64image';		
    //$entry = base64_decode($photo);
    //$image = imagecreatefromstring($entry);
    //$directory = dirname(__FILE__).DIRECTORY_SEPARATOR."../../assets/Photo-Competition".DIRECTORY_SEPARATOR."comp".$title.".jpeg";

    //header ( 'Content-type:image/jpeg' ); 
    //imagejpeg($image, $directory);
    //imagedestroy ( $image ); 
    //readfile ( $directory ); 
    //exit (); 

    
    
    //$ifp = fopen($output_file, "wb"); 
    //$data = explode(',', $base64_string);
    //fwrite($ifp, base64_decode($data[1])); 
    //fclose($ifp); 
    //return $output_file; 
    
    
    //define('UPLOAD_DIR', 'images/');
    //$img = $_POST['img'];
    //$img = str_replace('data:image/png;base64,', '', $img);
    //$img = str_replace(' ', '+', $img);
    //$data = base64_decode($img);
    //$file = UPLOAD_DIR . uniqid() . '.png';
    //$success = file_put_contents($file, $data);
    //print $success ? $file : 'Unable to save the file.';
    
}
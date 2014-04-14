<?php
//include 'common.php';
include 'db.php';
//include 'EpiCurl.php';
//include 'EpiOAuth.php';
//include 'EpiTwitter.php';
//include 'secret.php';
?>
<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>  </title>

<meta name="description" content="Schedule your future tweets" />
<meta name="keywords" content="twitter, schedule, tweet, future" />
<meta name="author" content="Vineet Kumar" />



<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="./css/style1.css" />

<link rel="stylesheet" type="text/css" href="button/btnstyle.css" />

<script language="JavaScript" src="js/cb.js"></script>
<script language="JavaScript" src="button/btn.js"></script>
</head>


<body>


<?
//connect to DB
dbConnect('license');

global $recolist;
global $copyleftvalue;


$copyleft = $_GET["copyleft"];

//echo $copyleft;
if (isset($copyleft))
{
 $query =  "SELECT * FROM `TABLE 1` WHERE sr_no=".$copyleft.";";
 //$result = mysql_query($query);
 //$copyleftvalue = mysql_fetch_array($result);
 
 //print_r( $copyleftvalue);
// print_r( $query);
}

else
{
//engine
$query = intent_engine();
}

$result = mysql_query($query);
	//$reco = mysql_fetch_array($result);
	
	mysql_query("TRUNCATE TABLE `engine1`");
	$i=0;
	while ($reco1 = mysql_fetch_assoc($result))
{
        $reco_lic[$i] = $reco1["License"];
        
        
        $inquery = "INSERT into `engine1` VALUES ("."\"".$reco_lic[$i]."\"".")";
  //      echo $inquery;
        $inresult = mysql_query($inquery);
        
        $i++;
}
 
// print_r($reco_lic);
 
 //include_once 'att_form.php' ;
 
 ?>
 
 <a href="att_form.php?" >click to continue</a>
 
 <?
 
 
function intent_engine()
{
if (isset($_GET[intent1]))
{
//	echo $_GET[intent1];
	$qintent1 = qbuild($_GET[intent1]);
}

if (isset($_GET[intent_rd]))
{
	$qintent2 = qbuild($_GET[intent_rd]);
}

if (isset($_GET[intent_rl]))
{
	$qintent3 = qbuild($_GET[intent_rl]);
}
if (isset($_GET[intent_gc]))
{
	$qintent4 = qbuild($_GET[intent_gc]);
}
	
	$query = "SELECT * from `TABLE 1` WHERE sr_no like '%' ".$qintent1.$qintent2.$qintent3.$qintent4." ;";
	echo $query;
	
	return $query;
	
 
 
} 
 function qbuild ($intent_val)
 {
	 
	 $ret = "";
	 if (!strcmp($intent_val, "full_free"))
	 $ret = "and copyfree = 'Y' ";
//	 
	 else if (!strcmp($intent_val, "restricted"))
	 $ret = "and copyfree = 'N' ";
         
        else if (!strcmp($intent_val,"restrict_derivation"))
         $ret = "and Release_diff = 'No' "."and copyfree = 'N' ";
         
         else if (!strcmp($intent_val,"restrict_link"))
         $ret = "and Link_diff = 'No' "."and copyfree = 'N' ";
      
          else if (!strcmp($intent_val,"gpl_compatible" ))
         $ret = "and GPL_compatible = 'N' " ;
         else
         $ret = "and GPL_compatible = 'Y' ";
         
	 
	 return $ret;
 }
 
         
         
header("Location: att_form.php?");

?>

</body>
</html>

<?php

include 'db.php';

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


$query = "SELECT * FROM `TABLE 2` WHERE category ="."\"".$_GET["category"]."\"";
//echo $query;
$result = mysql_query($query);
$i=0;
while ($resultbycat = mysql_fetch_assoc($result))
{
//print_r($resultbycat);
//calculate distance here and store project-distance-license in an array
$distance = get_distance($resultbycat);
//echo $distance."\n";
$neighbours[$resultbycat["project"]]=$distance;


}
arsort($neighbours);
echo("<br/><br/>");
//print_r($neighbours);

$neighbours = array_slice($neighbours,0,5);
$neighbours = array_keys($neighbours);

echo("<br/><br/>");

//print_r($neighbours);

mysql_query("TRUNCATE TABLE `engine2`");
for($i=0; $i<count($neighbours) ; $i++)
{
  $query = "SELECT * from `TABLE 2` where project="."\"".$neighbours[$i]."\"";
  //echo $query;
  $result = mysql_query($query);
  $reco = mysql_fetch_array($result);
  $reco_lic[$i] = $reco["license"];
  
 
  
  
 // echo $reco_lic[$i];
  }
  
 // print_r($reco_lic);
  $reco_lic = array_unique($reco_lic);
  
  for($i=0; $i<count($reco_lic) ; $i++)
{
 $inquery = "INSERT into `engine2` VALUES ("."\"".$reco_lic[$i]."\"".")";
  //      echo $inquery;
        $inresult = mysql_query($inquery);

}

?>

<br/><br/>
<a href="results.php?">click for results</a>

<?

function get_distance($cat_data)
{
$wt_plang = 2; $wt_os = 2; $wt_audience=1; $wt_lang=1;
$u_plang = explode(",",$_GET["plang"]);
$u_aud = $_GET["audience"];
$u_os = $_GET["OS"];

$d_plang = explode(";",$cat_data["plang"]);
$d_aud = explode(";",$cat_data["audience"]);
$d_os = explode(";",$cat_data["platform"]);


//print_r($u_plang);
//print_r("\n\n");
array_pop($d_plang);
array_pop($d_aud);
array_pop($d_os);
//print_r($d_plang);
//print_r("\n\n");
if(count($u_plang)!=0 && count ($d_plang) !=0 )
$dis_plang = $wt_plang*(count(array_intersect($u_plang,$d_plang))) / (count(array_unique(array_merge($u_plang,$d_plang))));
else 
$dis_plang = 0;
if(count($u_aud)!=0 && count ($d_aud) !=0 )
$dis_aud = $wt_aud*(count(array_intersect($u_aud,$d_aud))) / (count(array_unique(array_merge($u_aud,$d_aud))));
else 
$dis_aud = 0;
if(count($u_os)!=0 && count ($d_os) !=0 )
$dis_os = $wt_os*(count(array_intersect($u_os,$d_os))) / (count(array_unique(array_merge($u_os,$d_os))));
else 
$dis_os = 0;
//print_r($dis_plang);
return sqrt(pow($dis_plang,2)+pow($dis_aud,2)+pow($dis_os,2));

}

header("Location: results.php?");

?>

</body>
</html>

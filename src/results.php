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
dbConnect('license');


$query = "SELECT * FROM `engine1` ";
//echo $query;
$result = mysql_query($query);
$i=0;


echo ("Based on your choices in the first form, below are the licenses that satisfy yur criteria:");
echo ("<br/>");echo("<br/>");

while ($resultbycat = mysql_fetch_assoc($result))
{

$reco_1[$i]=$resultbycat["license"];
echo($reco_1[$i]);echo("<br/>");
$i++;

}

$query = "SELECT * FROM `engine2` ";
//echo $query;
$result = mysql_query($query);
$i=0;

echo ("<br/><br/><br/>Based on your choices in the second form, we found a list of open-source projects that are similar to your project.<br/>Below is a list of licenses that most popular projects among these similar projects use :<br/>");
echo("<br/>");
while ($resultbycat = mysql_fetch_assoc($result))
{

$reco_2[$i]=$resultbycat["license"];
echo($reco_2[$i]);echo("<br/>");
$i++;

}


//print_r($reco_1);
echo ("<br/><br/>");
//print_r($reco_2);


$final_result = array_intersect($reco_1, $reco_2);
if (count($final_result) <1)
$final_result = $reco_1;
echo("Based on the combination of two results above with higher weightage to the results based on your intent, we think that you must use one of the following licenses for your project.<br/>");
$final_result = array_slice($final_result,0,3);
echo ("<h3> Your recommendations are </h3><br/>");
for ($i=0; $i< count($final_result) ; $i++)
{
  echo $final_result[$i];
  echo ("<br/>");
  }


?>


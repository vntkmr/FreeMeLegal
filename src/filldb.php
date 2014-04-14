<html>
<body>
<?php
include_once ('./simplehtmldom_1_5/simple_html_dom.php');


//print_r($detailitems);

$con = mysql_connect("localhost","vineet","762");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("license", $con);
$sql = "select * from `TABLE 1`";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
  {
//  echo $row['License'] . " " . $row['Author'];
//  echo "<br />";

$url = "http://en.wikipedia.org/wiki/";
$license = $row['License'];
$license_ = str_replace(" ","_",$license);
echo $license_;
$url=$url.$license_;
echo "    ";
//$url = urlencode($url);
echo $url;
//$html = file_get_html('http://en.wikipedia.org/wiki/Academic_Free_License');
$html = file_get_html($url);
if ($html)
{
foreach($html->find('table.infobox tr') as $tr) {

$intro=$detailitem['intro'] = $tr->find('th', 0)->plaintext;
$details=$detailitem['details'] = $tr->find('td', 0)->innertext;

//fill in the table
if (0==strcmp($detailitem['intro'],"GPL compatible"))
{ 
 $sql = "UPDATE `TABLE 1` set GPL_compatible='$details[0]' where License='$license'";
 //$sql = echo $sql;
 $update_result = mysql_query($sql);
}
if (0==strcmp($detailitem['intro'],"Copyleft"))
{ 
 $sql = "UPDATE `TABLE 1` set Copyleft='$details[0]' where License='$license'";
 //$sql = echo $sql;
 $update_result = mysql_query($sql);
}
if (0==strcmp($detailitem['intro'],"Copyfree"))
{ 
 $sql = "UPDATE `TABLE 1` set Copyfree='$details[0]' where License='$license'";
 //$sql = echo $sql;
 $update_result = mysql_query($sql);
}

}
}
$html="";
$url="";


}
?>
</body>
</html>


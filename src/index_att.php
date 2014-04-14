
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
  <title> Schedule your tweets to tweet in a while ... </title>

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

{

 ?>


<!--
<a href="tweetinawhile.com"><img src="images/logo.png" alt="tweet in a while ..." border="0"></a>
-->
<table id="t1">
<tr><td>
<a href="http://tweetinawhile.com"><img src="images/logo.png" alt="tweet in a while ..." border="0"></a>
</td></tr>

<tr>

<td style="vertical-align:top; font-family:'Arial'; font-size:18px; color:#393E43; width:550px; "><!--td of the main form #474B4F-->
<div class="cbb">

<br>
<!--
<form name="myform" method="post" action="<?=$_SERVER['PHP_SELF'].'?offset='.$_GET['offset']?>">
-->
<form name="myform" method="get" action="engine1.php">
<table border="0" cellpadding="0" cellspacing="5">
 <!-- new form delete the rest of it -->
    <tr>
        <td align="right", colspan=2>
            <p>Please choose your preferences</p>
        </td>
</br>
    </tr>
<tr>
        <td colspan=2>
	<input type="radio" name="intent1" value="full_free" />Do you want to give complete freedom to the user to do
anything with your code ?
            
        </td>
</tr>


<tr>
        <td colspan=2>
	<input type="radio" name="intent1" value="restricted" />Do you want restrictions ?
anything with your code ?
            
        </td>
</tr>


<tr>
        <td colspan=2>
	<input type="checkbox" name="intent_rd" value="restrict_derivation" />
	derivation restriction only ? 
            
        </td>
</tr>

 <tr>
        <td colspan=2>
	<input type="checkbox" name="intent_rl" value="restrict_link" />
	linking restriction only ?

        </td>
</tr>

<tr>
        <td colspan=2>
	<input type="checkbox" name="intent_gc" value="gpl_compatible" />
	compatible with GPL ?

        </td>
</tr>

 <br/>
 <br/>
  <tr>
        <td colspan=2>
 <input type="radio" name="copyleft" value=19 /> GPL<br /> <!--use serial no. in the table-->
 </td>
 </tr>
 <tr>
        <td colspan=2>
 <input type="radio" name="copyleft" value=14 />Eclipse license<br />
 </td>
 </tr>
 <tr>
        <td colspan=2>
 <input type="radio" name="copyleft" value=28 /> Netscape license<br />
 </td>
 </tr>
 
 
    <tr>
        
        <td colspan=2 align="center">
            <br><br>
            
            <input type="submit" name="submitok" value="click to continue" class="btnC blue" id="submit_btn" />
            <br>
            <!--
            -->
        </td>
    </tr>



        </td>
    </tr>




</table>
</form>

</div>


</td><!-- td of the main form-->

<td style="vertical-align:top; margin: 0 auto; width:350px; text-align:left;"><!--td of the right box-->
<div class="cbb">
<!-- fill in the text here -->



<div class="sonet" align="center">
<table>
   <tr>
        
        <td align="center">
              


</table>
</div>

</div>
</td><!--td of the right box-->

</tr>
</table>
</body>
</html>



<?php
}




?>



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
        <td align="left", colspan=1>
            <h3>Please choose your preferences</h3>
            <td align="right"><a TITLE="How much freedom do you want to give with your project ?"> <img src="explain.png"></img> </a></td>
        </td>
</br>
    </tr>
<tr>
        <td colspan=1>
	<input type="radio" name="intent1" value="full_free" />Do you want to give complete freedom to the user to do
anything with your code ?
         
        </td>
        <td align="right">
        <a TITLE=
        "Would you like to give away your work for free 
without any kind of restrictions ?"> <img src="explain.png"></img> </a></td>
</tr>
<br/><br/>
<tr></tr>
<tr>
        <td colspan=1>
	<input type="radio" name="intent1" value="restricted" />Do you want restrictions ? select from below.

            
        </td>
<td align="right">
        <a TITLE=
 "Select this option if you want to place any kind of restrictions on your project. 
  Select the appropriate restriction you would like to put."> <img src="explain.png"></img> </a></td>
        
</tr>


<tr>
        <td colspan=1>
	<input type="checkbox" name="intent_rd" value="restrict_derivation" />
	derivation restriction only ? 
            
        </td>
        <td align="right">
        <a TITLE=
 "Do you want that any derivation from your work should also be licensed uder the 
 same license as you use? This will force any derivative work to give proper credits
 to your work. "> <img src="explain.png"></img> </a></td>
</tr>

 <tr>
        <td colspan=1>
	<input type="checkbox" name="intent_rl" value="restrict_link" />
	linking restriction only ?

        </td>
        <td align="right">
        <a TITLE=
 "Do you want a license that forces your users to use the same license if they even
  link to your libraries and not necessarily derive from or change your code? "> <img src="explain.png"></img> </a></td>
</tr>

<tr>
        <td colspan=1>
	<input type="checkbox" name="intent_gc" value="gpl_compatible" />
	NOT compatible with GPL ?

        </td>
        <td align="right">
        <a TITLE=
 "Do you want a license that is not compatible with GPL? Any work under GPL will not be able to use your work. "> <img src="explain.png"></img> </a></td>
</tr>
<br/><br/>
<tr></tr>
 <br/>
 <br/>
 
  <tr>
        <td colspan=2>
 <input type="radio" name="copyleft" value=19 /> Is your work derived from GPL<br /> <!--use serial no. in the table-->
 </td>
 </tr>
 <tr>
        <td colspan=2>
 <input type="radio" name="copyleft" value=14 />Is your work derived from Eclipse license<br />
 </td>
 </tr>
 <tr>
        <td colspan=2>
 <input type="radio" name="copyleft" value=28 />Is your work derived from Netscape license<br />
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



</tr>
</table>
</body>
</html>



<?php
}




?>



<?php

include 'db.php';

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
<form name="myform" method="get" action="engine2.php">
<table border="0" cellpadding="0" cellspacing="5">
 <!-- new form delete the rest of it -->
    <tr>
        <td align="left", colspan=2>
            <h3>Please choose the attributes of your project</h3>
        </td>
</br>
    </tr>
<tr>
        <td align="right">
            <p>Category</p>
        </td>
        
        <td style="font-family:'Arial'; font-size:12px; color:#393E43", align="left">
            <select name="category" >
		<option value="audio-video">audio-video</option>
		<option value="business-enterprise">business-enterprise</option>
		<option value="communications">communications</option>
		<option value="development">development</option>
		<option value="home-education">home-education</option>
		<option value="games">games</option>
		<option value="graphics">graphics</option>
		<option value="science-engineering">science-engineering</option>
		<option value="security-utilities">security-utilities</option>
		
	    </select>
            
        </td>
</tr>
<tr>
        <td align="right">
            <p>OS supported</p>
        </td>
        
        <td style="font-family:'Arial'; font-size:12px; color:#393E43", align="left">
            <select name="OS[]"  MULTIPLE>
		<option value="Linux">Linux/Unix</option>
		<option value="Windows">Windows</option>
		<option value="BSD">BSD</option>
		<option value="Mac">Mac</option>
				
	    </select>
            
        </td>
</tr>

<tr>
        <td align="right">
            <p>Programming Language (comma separated list)</p>
        </td>
        
        <td style="font-family:'Arial'; font-size:12px; color:#393E43", align="left">
           <input type="text" name="plang" />
            
        </td>
</tr>
<tr>
        <td align="right">
            <p>Intended audience</p>
        </td>
        
        <td style="font-family:'Arial'; font-size:12px; color:#393E43", align="left">
            <select name="audience[]"  MULTIPLE>
		<option value="System Administrators">System Administrators</option>
		<option value="End Users/Desktop">End Users/Desktop</option>
		<option value="Developers">Developers</option>
		<option value="Education">Education</option>
		<option value="Science/Research">Science/Research</option>
		 <option value="Information Technology">Information Technology</option>
				
	    </select>
            
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
<!--
<td style="vertical-align:top; margin: 0 auto; width:350px; text-align:left;">
<div class="cbb">




<div class="sonet" align="center">
<table>
   <tr>
        
        <td align="center">
              


</table>
</div>

</div>
</td><!--td of the right box-->
-->
</tr>
</table>
</body>
</html>



<?php
}




?>


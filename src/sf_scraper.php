//this files scrapes data from sourceforge.net

<?php

include_once ('./simplehtmldom_1_5/simple_html_dom.php');
include_once ('db.php');

global $lic_ctr;
$categories = array("audio-video","business-enterprise","communications", "development", "home-education", "games", "graphics", "science-engineering","security-utilities","system-sdministration");
      
                 
$osi_licenses = array("/directory/license:osi-approved-open-source/gnu-general-public-license-version-2.0-gplv2/", "/directory/license:osi-approved-open-source/bsd-license/","/directory/license:osi-approved-open-source/gnu-library-or-lesser-general-public-license-version-2.0-lgplv2/","/directory/license:osi-approved-open-source/gnu-general-public-license-version-3.0-gplv3/","/directory/license:osi-approved-open-source/mit-license/","/directory/license:osi-approved-open-source/academic-free-license-afl/","/directory/license:osi-approved-open-source/gnu-library-or-lesser-general-public-license-version-3.0-lgplv3/","/directory/license:osi-approved-open-source/apache-software-license/","/directory/license:osi-approved-open-source/mozilla-public-license-1.1-mpl-1.1/","/directory/license:osi-approved-open-source/artistic-license/","/directory/license:osi-approved-open-source/common-public-license-1.0/","/directory/license:osi-approved-open-source/open-software-license-3.0-osl3.0/","/directory/license:osi-approved-open-source/zlib/libpng-license/");
  
$myFile = "att_data.csv";
$fh = fopen($myFile,'w');



	$i=0;$j=0;
for ($j=0;$j<10;$j++)
 {
   $scrape_url = "http://sourceforge.net/directory/".$categories[$j];
   for ($i=0; $i<13; $i++)  //number of licenses
   {
	   $license_link = $osi_licenses[$i];
       $ctr = scraper1($scrape_url, $license_link,$categories[$j],$fh);
       if ($ctr == 10)
        continue;
   }
}


function scraper1( $url1, $lic_link,$cat,$fh)
{
	$page=1;$lic_ctr[$lic_link]=0;
	for($page =1 ; $page<30; $page++) //go upto 50 pages
	{
		$urlx = $url1."/?page=".$page."&_pjax=true";
	$html = file_get_html($urlx);
	
	
	foreach($html->find('ul.projects') as $e1)
	 { 
	 foreach($e1->find('div.project_info') as $e2)
	   //echo $e2;
	  {foreach($e2->find('a') as $e3)
	    {
		 foreach ( $e3->find('span[itemprop=name]') as $e4);
	    // echo $e4->innertext."\n" ; //name of the project - put it in db
	     $e_href = 	$e3->href;// echo "//".$e_href;
		 $proj_det_url = "http://sourceforge.net".$e_href; //url of the proj details page
		 $proj_det = detail_extractor($proj_det_url, $lic_link); // extract the details of the project 
		 if (isset ($proj_det) && $proj_det != "")
		 {
		   echo "\n".$urlx."\n".$cat.", ".$proj_det.$e4->innertext."\n\n";	
		   fwrite($fh, $cat.", ".$proj_det.$e4->innertext."\n\n");	 
		   if ($lic_ctr[$lic_link] == 10 || $page>=30)
		    return $lic_ctr[$lic_link];
		    else
		       {	 
		       $lic_ctr[$lic_link]++;
		       //save proj_details to db
			   }
	      }
	    }
      }
     }
    } 
     return $lic_ctr[$lic_link];
 }


function detail_extractor ($url2, $lic_link)
{
	/*******************
	 * extract the additional project details
	 * put them in an array.
	 * return the array
	 * /
	*/
	
	//echo "!!!!!!!!!!!!!!!!!!!";
	$subcat=", ";$os=", ";$lang=", ";$iaud=", ";$plang=", ";
	$html = file_get_html($url2);
	foreach ($html->find('aside[id=additional-project-details]') as $e);
	 {
		// echo $lic_link;
		 foreach($e->find("a[href=$lic_link]") as $e1)
		 {
			// echo $e1->innertext;
			  
			 if (isset( $e1->innertext))
			 {
				 //Get all the data here in proj_det and return
				//subcategories  
				foreach($e->find('a[itemprop=softwareApplicationSubCategory]') as $e2)
		                {
			    //  echo $e2->innertext;
			        $subcat = $e2->innertext.";".$subcat;
		                }
				//OS
				foreach($e->find('span[class*=platform]') as $e3)
				{
				$os = $e3->plaintext.";".$os;
				}
				//language
				foreach($e->find('a[itemprop=inLanguage]') as $e4)
		                {
			            $lang = $e4->innertext.";".$lang;
		                }
				foreach($e->find('a[href*=audience]') as $e5)
		                {
			            $iaud = $e5->plaintext.";".$iaud;
		                }
		                foreach($e->find('a[href*=\/language]') as $e6)
		                {
			            $plang = $e6->plaintext.";".$plang;
		                }			 
				 return $e1->innertext.", ".$subcat.$os.$lang.$iaud.$plang; 
			 }
			 else
			 {
			   return "";
			  }
		 }
	 }
	 
	 
	
}
fclose($fh);
?>

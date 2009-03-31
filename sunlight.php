<?php
include "Snoopy.class.php";
include "xml2array.php";
include "config.php";

$snoopy= new Snoopy;

$str = $_REQUEST['msg'];
$str1= $_REQUEST['msg'];
$str2=$str;
preg_match('/(?<querytype>\w+) (?<query>\w+)/', $str, $matches);
$query= $matches[querytype];
$value=$matches[query];

preg_match('/(?<querytype1>\w+) (?<query1>\w+) (?<query2>\w+)/', $str1, $matches1);
$query1= $matches1[querytype1];
$value2=$matches1[query1];
$value3=$matches1[query2];

preg_match('/(?<querytype2>\w+) (?<query21>\w+) (?<query22>\w+)/', $str2, $matches2);
$query2= $matches2[querytype2];
$value21=$matches2[query21];
$value22=$matches2[query22];
//echo "value1 is".$value21;
//echo "value1 is".$value22;

if($query=='title'||$query=='firstname'||$query=='middlename'||$query=='lastname'||$query=='name_suffix'||$query=='nickname'||$query=='party'||$query=='state'||$query=='district'||$query=='in_office'||$query=='gender'||$query=='phone'||$query=='fax'||$query=='website'||$query=='webform'||$query=='email'||$query=='congress_office'||$query=='twitter_id'||$query=='youtube_url')

{


	$submit_url = "http://services.sunlightlabs.com/api/legislators.get.xml?apikey=1c77784cbf2637f2dd8bcc4a9d51d21b&".$query."=".$value;
	$snoopy->fetch($submit_url);
	$result = xml2array($snoopy->results);
	//print_r($result);
	if($result!=null)
	{
		echo("<br />");
		echo ("<b>Title:</b>".$result['response']['legislator']['title']);
                echo("<br />");
		echo ("<b> First Name:</b>".$result['response']['legislator']['firstname']);
                echo("<br />");
		echo ("<b>Middle Name:</b>".$result['response']['legislator']['middlename']);
                echo("<br />");
		echo ("<b>Last Name:</b>".$result['response']['legislator']['lastname']);
                echo("<br />");
		echo ("<b> Name Suffix:</b>".$result['response']['legislator']['name_suffix']);
                echo("<br />");
		echo ("<b>Nick Name:</b>".$result['response']['legislator']['nickname']);
                echo("<br />");
		echo ("<b>Party:</b>".$result['response']['legislator']['party']);
                echo("<br />");
		echo ("<b>State:</b>".$result['response']['legislator']['state']);
                echo("<br />");
		echo ("<b>District:</b>".$result['response']['legislator']['district']);
                echo("<br />");
		echo ("<b>In Office:</b>".$result['response']['legislator']['in_office']);
                echo("<br />");
		echo ("<b>Gender:</b>".$result['response']['legislator']['gender']);
                echo("<br />");
		echo ("<b>Phone:</b>".$result['response']['legislator']['phone']);
                echo("<br />");
		echo ("<b>Fax:</b>".$result['response']['legislator']['fax']);
                echo("<br />");
		echo ("<b>Website:</b>".$result['response']['legislator']['website']);
                echo("<br />");
		echo ("<b>Web Form:</b>".$result['response']['legislator']['webform']);
                echo("<br />");
		echo ("<b>E-mail Address:</b>".$result['response']['legislator']['email']);
                echo("<br />");
		echo ("<b>Congress Office Address:</b>".$result['response']['legislator']['congress_office']);
                echo("<br />");
		echo ("<b>Twitter Id:</b>".$result['response']['legislator']['twitter_id']);
                echo("<br />");
		echo ("<b>Youtube Id:</b>".$result['response']['legislator']['youtube_url']);
		echo("<br />");
	}
	else 
	{
		$submit_url = "http://services.sunlightlabs.com/api/legislators.getList.xml?apikey=1c77784cbf2637f2dd8bcc4a9d51d21b&".$query."=".$value;
		$snoopy->fetch($submit_url);
		$result = xml2array($snoopy->results);
		$num=0;
		if($result['response']['legislators']['legislator'][$num]['title']!=null)
		{
			foreach( $result['response']['legislators'] ['legislator'] as $key => $result['response']['legislators']['legislator'][$num])
			{
				echo("<br />");				
				echo ("<b>".($num+1).".   Title:</b>".$result['response']['legislators']['legislator'][$num]['title']);
                                echo("<br />");
				echo ("<b> First Name:</b>".$result['response']['legislators']['legislator'][$num]['firstname']);
                                echo("<br />");
				echo ("<b>Middle Name:</b>".$result['response']['legislators']['legislator'][$num]['middlename']);
                                echo("<br />");
				echo ("<b>Last Name:</b>".$result['response']['legislators']['legislator'][$num]['lastname']);
                                echo("<br />");
				echo ("<b> Name Suffix:</b>".$result['response']['legislators']['legislator'][$num]['name_suffix']);
                                echo("<br />");
				echo ("<b>Nick Name:</b>".$result['response']['legislators']['legislator'][$num]['nickname']);
                                echo("<br />");
				echo ("<b>Party:</b>".$result['response']['legislators']['legislator'][$num]['party']);
                                echo("<br />");
				echo ("<b>State:</b>".$result['response']['legislators']['legislator'][$num]['state']);
                                echo("<br />");
				echo ("<b>District:</b>".$result['response']['legislators']['legislator'][$num]['district']);
                                echo("<br />");
				echo ("<b>In Office:</b>".$result['response']['legislators']['legislator'][$num]['in_office']);
                                echo("<br />");
				echo ("<b>Gender:</b>".$result['response']['legislators']['legislator'][$num]['gender']);
                                echo("<br />");
				echo ("<b>Phone:</b>".$result['response']['legislators']['legislator'][$num]['phone']);
                                echo("<br />");
				echo ("<b>Fax:</b>".$result['response']['legislators']['legislator'][$num]['fax']);
                                echo("<br />");
				echo ("<b>Website:</b>".$result['response']['legislators']['legislator'][$num]['website']);
                                echo("<br />");
				echo ("<b>Web Form:</b>".$result['response']['legislators']['legislator'][$num]['webform']);
                                echo("<br />");
				echo ("<b>E-mail Address:</b>".$result['response']['legislators']['legislator'][$num]['email']);
                                echo("<br />");
				echo ("<b>Congress Office Address:</b>".$result['response']['legislators']['legislator'][$num]['congress_office']);
                                echo("<br />");
				echo ("<b>Twitter Id:</b>".$result['response']['legislators']['legislator'][$num]['twitter_id']);
                                echo("<br />");
				echo ("<b>Youtube Id:</b>".$result['response']['legislators']['legislator'][$num]['youtube_url']);
                                echo("<br />");
				$num++;
			}
		}
else{
echo ("Sorry No records found");
}

}





		

}




else if($query=='contributor')
{
	$snoopy1= new Snoopy;
	$submit_url1 = "http://services.sunlightlabs.com/api/legislators.get.xml?apikey=1c77784cbf2637f2dd8bcc4a9d51d21b&firstname=".$value2."&lastname=".$value3;
	$snoopy1->fetch($submit_url1);
	$result1 = xml2array($snoopy1->results);
	//echo ("hisodicid:".$result1['response']['legislator']['crp_id']);
	$cid=$result1['response']['legislator']['crp_id'];
	//echo $cid;
	$submit_url = "http://www.opensecrets.org/api/?method=candContrib&cid=".$cid."&apikey=cd9c5bf70c358702a140d919fc5cd585";
	$snoopy->fetch($submit_url);
	$result = xml2array($snoopy->results);
	$num=0;
	$attr1=1;

	//print_r($result);
	



echo ("Name of Candidate: ".$result['response']['contributors_attr']['cand_name']);
	echo "<br />List of Contributing Organizations:<br />";
	foreach( $result['response']['contributors'] ['contributor'] as $key => $result['response']['contributors']['contributor'][$attr])	
	{
		if($result['response']['contributors']['contributor'][$attr]['org_name']!=NULL)
		{
			$attr=$attr1."_attr";

			echo "Organization Name:".$result['response']['contributors']['contributor'][$attr]['org_name'];
			echo "<br />";
			echo "Total:".$result['response']['contributors']['contributor'][$attr]['total'];
			echo "<br />";

			$attr1++;
		}

	}
	echo ("<br />Source : ".$result['response']['contributors_attr']['source']);




}


else if($query=='asset')
{

	$snoopy2= new Snoopy;
	$submit_url2 = "http://services.sunlightlabs.com/api/legislators.get.xml?apikey=1c77784cbf2637f2dd8bcc4a9d51d21b&firstname=".$value2."&lastname=".$value3;
	$snoopy2->fetch($submit_url2);
	$result2 = xml2array($snoopy2->results);
	//echo ("cid:".$result2['response']['legislator']['crp_id']);
	$cid1=$result2['response']['legislator']['crp_id'];
	//echo $cid1;
	
	//echo $query;
	//echo $value21;
	//echo $value22;
	
	$snoopy21= new Snoopy;
	$submit_url21="http://www.opensecrets.org/api/?method=memPFDprofile&year=2008&cid=".$cid1."&output=xml&apikey=cd9c5bf70c358702a140d919fc5cd585";
	$snoopy21->fetch($submit_url21);
	$result = xml2array($snoopy21->results);
	//$num=0;
	$attr1=0;
	//echo "<br />hi";
	//print_r($result);
		
	echo "<br />";
	echo ("Name of Candidate: ".$result['response']['member_profile_attr']['name']);
	echo "<br />";
	echo ("Member's Id: ".$result['response']['member_profile_attr']['member_id']);
	echo "<br /><br /> Here is the Organization name and their holdings low and holdings high<br />";
	
	foreach( $result['response']['member_profile'] ['assets']['asset'] as $key => $result['response']['member_profile']['assets']['asset'][$attr])	
	{
		if($result['response']['member_profile']['assets']['asset'][$attr]!=NULL)
		{
			$attr=$attr1."_attr";
			echo "<br />";
			echo "Organization Name: ".$result['response']['member_profile']['assets']['asset'][$attr]['name'];
			echo "<br />";
			echo "Holdings High: ".$result['response']['member_profile']['assets']['asset'][$attr]['holdings_low'];
			echo "<br />";
			echo "Holdings High: ".$result['response']['member_profile']['assets']['asset'][$attr]['holdings_high'];
			echo "<br />";
			$attr1++;
		}

	}
	echo ("<br />Source : ".$result['response']['member_profile_attr']['source']);


}


else if($_REQUEST['msg']=="@help")
{
	echo 'I am your buddy to give you information about your legislators! The available options are:';
	echo '<br />@title sen : Displays information of all senators';
	echo '<br />@firstname firstname : Displays information of all the legislators with given firstname';
	echo  '<br />@lastname lastname : Displays information of all the legislators with given lastname';
	echo '<br />@nickname nickname : Displays information of all the legislators with given nickname';
	echo '<br />@party party : Displays information of all the legislators with given party, the possible values are D for Democratic, R for Repuplican and I for Indpendant';
	echo '<br />@state state : Displays information of all the legislators with given state, values can be two letter words viz. ny, az etc';
	echo'<br />@in_office 0 or1 : Displays information of all the legislators who are currently holding the post or not, 0 if not holding the post now and 1 if currently holding the post';
	echo '<br />@gender m or f : Displays information of all the legislators with given gender, possible values are M for Male and F for Female';
	echo '<br />@contributor  firstname lastname : Displays information of  about contributions made to the candidate name give';
	echo '<br />@asset  firstname lastname : Displays information of  about assets made to the candidate name give';
}

else
{
echo "Invalid Query! To know what options are available type @help";
}



?>





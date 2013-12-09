<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();
$tool=new tools_h;

$lesson=$_GET['lesson'];
$part=$_GET['part'];
$sub=$_GET['sub'];

session_start();
$_SESSION['lesson']=$lesson;
$_SESSION['part']=$part;
?>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html;charset=utf-8'>
	<title>Japanese3</title>
</head>
<body>
	<?php
	if($sub=="Words_Management"){
		//start management
		$tool->goURL("management.php?lesson=$lesson&part=$part");
	}elseif($sub=="View_Mistaken_Words"){
		$tool->goURL("mistaken.php");
	}else{
		//Check is there any words in the selected area
		$msql->query("select count(*) from words where lesson=$lesson and part=$part");
		list($count)=mysql_fetch_row($msql->listmysql);
		if($count==0){
			//no word
			echo "There's no word in the selected area.<br/>";
			echo "<a href='index.php'>Back</a>";
		}elseif($count<4){
			//has less than 4 words
			echo "There's too little words in the selected area.<br/>";
			echo "<a href='index.php'>Back</a>";
		}else{
			//Check whether these words have been mastered
			$msql->query("select count(*) from words where lesson=$lesson and part=$part and times<3");
			list($count)=mysql_fetch_row($msql->listmysql);
			if($count==0){
				echo "These words have been mastered.<br/>";
				echo "<a href='index.php'>Back</a>";
			}else{
				//test
				$tool->goURL("test.php?lesson=$lesson&part=$part");
			}
		}
	}
	?>
</body>
</html>
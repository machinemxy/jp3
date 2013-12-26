<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();

//Get lessonCount
$msql->query("select lesson from config where Id=1");
list($lessonCount)=mysql_fetch_row($msql->listmysql);

//Get partCount
$msql->query("select part from config where Id=1");
list($partCount)=mysql_fetch_row($msql->listmysql);

session_start();
?>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html;charset=utf-8'>
	<title>Japanese3</title>
</head>
<body>
	<h1 style="color:red;">Japanese Words Reciting God Artifact V3.5</h1>
	<fieldset>
		<legend>Please Select</legend>
		<form name="form1" method="get" action="distribution.php">
			Lesson:
			<select name="lesson">
				<?php
				if(isset($_SESSION['lesson'])){
					for($i=1;$i<=$lessonCount;$i++){
						if($i==$_SESSION['lesson']){
                            ?>
                            <option value='<?php echo $i; ?>' selected><?php echo $i; ?></option>
                            <?php
						}else{
                            ?>
							<option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                            <?php
						}
					}
				}else{
					for($i=1;$i<=$lessonCount;$i++){
						?>
                        <option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                        <?php
					}
				}
				?>
			</select>
			Part:
			<select name="part">
				<?php
				if(isset($_SESSION['part'])){
					for($i=1;$i<=$partCount;$i++){
						if($i==$_SESSION['part']){
							?>
                            <option value='<?php echo $i; ?>' selected><?php echo $i; ?></option>
                            <?php
						}else{
							?>
							<option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                            <?php
						}
					}
				}else{
					for($i=1;$i<=$partCount;$i++){
						?>
                        <option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                        <?php
					}
				}
				?>
			</select>
			<br/>
			<input name="sub" value="Start_Reciting" type="submit"/>
			<br/>
			<input name="sub" value="Words_Management" type="submit"/>
			<br/>
			<input name="sub" value="View_Mistaken_Words" type="submit"/>
		</form>
	</fieldset>
</body>
</html>
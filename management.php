<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();
$lesson=$_GET['lesson'];
$part=$_GET['part'];
?>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html;charset=utf-8'>
	<title>Japanese3</title>
	<script language="javascript">
		function load(){
			document.getElementById("fc").focus();
		}
	</script>
</head>
<body onload="load();">
	<fieldset>
		<legend>Lesson <?php echo $lesson; ?>; Part <?php echo $part; ?></legend>
		<table border="1,black,dashed" cellpadding="0" cellspacing="0">
			<tr>
				<th>Kana</th>
				<th>Kanji</th>
				<th>Meaning</th>
				<th>Degree</th>
				<th>Master Date</th>
				<th>Wrong</th>
				<th>Operation</th>
			</tr>
			<?php
			$msql->query("select Id,kana,kanji,meaning,times,masterdate,wrongtimes from words where lesson=$lesson and part=$part order by Id");
			while(list($Id,$kana,$kanji,$meaning,$times,$masterdate,$wrongtimes)=mysql_fetch_row($msql->listmysql)){
			?>
			<tr>
				<td><?php echo $kana; ?></td>
				<td><?php echo $kanji; ?></td>
				<td><?php echo $meaning; ?></td>
				<td>
				<?php 
				if($times==0){
					echo "---";
				}elseif($times==1){
					echo "+--";
				}elseif($times==2){
					echo "++-";
				}else{
					echo "+++";
				}
				?>
				</td>
				<td><?php echo $masterdate ?></td>
				<td align="center"><?php echo $wrongtimes ?></td>
				<td>
					<a href="modify.php?Id=<?php echo $Id; ?>&lesson=<?php echo $lesson; ?>&part=<?php echo $part; ?>">Modify</a> 
					<a href="delete.php?Id=<?php echo $Id; ?>&lesson=<?php echo $lesson; ?>&part=<?php echo $part; ?>">Delete</a>
				</td>
			</tr>
			<?php
			}
			?>
		</table>
		<a href="insert.php?lesson=<?php echo $lesson; ?>&part=<?php echo $part; ?>" id="fc">Insert</a>
		<a href="index.php">Back</a>
	</fieldset>
</body>
</html>
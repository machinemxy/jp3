<?php
include "Function.php";
$msql=new phpMysql_h;
$msql->init();
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
		<legend>Wrong Words</legend>
		<table border="1,black,dashed" cellpadding="0" cellspacing="0">
			<tr>
				<th>Kana</th>
				<th>Kanji</th>
				<th>Meaning</th>
                <th>Lesson</th>
                <th>Part</th>
				<th>Degree</th>
				<th>Master Date</th>
				<th>Wrong</th>
                <th>Operation</th>
			</tr>
			<?php
			$msql->query("select Id,kana,kanji,meaning,lesson,part,times,masterdate,wrongtimes from words where wrongtimes>0 order by lesson,part,Id");
			while(list($Id,$kana,$kanji,$meaning,$lesson,$part,$times,$masterdate,$wrongtimes)=mysql_fetch_row($msql->listmysql)){
			?>
			<tr>
				<td><?php echo $kana; ?></td>
				<td><?php echo $kanji; ?></td>
				<td><?php echo $meaning; ?></td>
                <td><?php echo $lesson; ?></td>
                <td><?php echo $part; ?></td>
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
                <td><a href="remembered.php?Id=<?php echo $Id; ?>">Remembered</a></td>
			</tr>
			<?php
			}
			?>
		</table>
		<a href="index.php" id="fc">Back</a>
	</fieldset>
</body>
</html>
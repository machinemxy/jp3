<?php
class phpMysql_h{
	var $listmysql="";
	var $sql="";
	var $linkmysql=0;
	var $ip="localhost";
	var $user="root";
	var $password="1234";
	var $db="jpdb3";

	function link_mysql(){
		$this->linkmysql=mysql_connect($this->ip,$this->user,$this->password);
		if(!$this->linkmysql){
			echo("login mysql failed");
		}
	}

	function close_mysql(){
		mysql_close($this->linkmysql);
	}

	function select_db(){
		$link_Isok=mysql_select_db($this->db,$this->linkmysql);
		if(!$link_Isok){
			echo("database error");
			mysql_close($this->linkmysql);
			exit;
		}
	}

	function init(){
		$this->link_mysql();
		$this->select_db();
		mysql_query("set names 'utf8'");
	}

	function query($str){
		$this->listmysql=mysql_query($str,$this->linkmysql);
	}
}

class tools_h{
	function showmessage($str){
		echo "<script language='JavaScript'>";
		echo "alert('$str');";
		echo "</script>";
	}

	function goURL($str){
		header("Location:$str");
	}

	function submitURL($str){
		echo "<form name='submitfrm' action='$str' method='post'>";
		echo "</form>";
		echo "<script language='JavaScript'>";
		echo "submitfrm.submit();";
		echo"</script>";
	}
}
?>
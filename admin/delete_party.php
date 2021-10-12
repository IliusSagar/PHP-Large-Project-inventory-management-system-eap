<?php 
include "../user/connection.php";
$id=$_GET["id"];
mysqli_query($link,"DELETE from party_info where id=$id");
?>


<script type="text/javascript">
	window.location="add_new_party.php";
</script>
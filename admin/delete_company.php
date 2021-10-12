<?php 

include "../user/connection.php";
$id=$_GET["id"];
mysqli_query($link,"DELETE from company_name where id=$id");

?>

<script type="text/javascript">
	window.location="add_company.php";
</script>
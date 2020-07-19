<?php 
session_start();
echo '<script>
localStorage.removeItem("number");
</script>';

if($_SESSION['user']){	
	session_destroy();
	header("location:Login/index.html");
}
else{
	header("location:Login/index.html");
}
?>
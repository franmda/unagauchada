
<?php
  session_start();
  unset($_SESSION['autenticado']); 
session_destroy($_SESSION['autenticado']);
 header ("Location: index7.php");
?>
 <html>
<body></body>
</html>

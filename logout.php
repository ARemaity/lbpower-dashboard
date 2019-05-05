<?php
session_start();
session_destroy();
header("refresh:1;url=index.php");
?>

<html>
<head>

<?php
echo ' <h2 style="color:green;">Logging OUT!</h2>';
?>

</body>
</html>
<?php
session_start();
session_destroy();
header("refresh:1;url=http://lbpower.000webhostapp.com");
?>

<html>
<head>

<?php
echo ' <h2 style="color:green;">Logging OUT!</h2>';
?>

</body>
</html>
<?php
setcookie("user_name", "", time() - 3600, "/");
setcookie("user_email", "", time() - 3600, "/");
header("Location: archive.php");
exit;

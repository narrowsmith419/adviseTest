

<?php


echo "<pre>";
if($_SESSION == null)
{
    echo "session is currently null";
}
var_dump($_SESSION);
echo $_SESSION['savedToken'];
echo $_SESSION['reSchedule'];
echo "</pre>";


?>
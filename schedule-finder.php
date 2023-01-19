

<?php
session_start();

$num = $_POST['num'];

//connect to database with pre stored credentials
require $_SERVER['DOCUMENT_ROOT'].'/../pdo-config.php';

try{
    //instantiate database object
    $dbh = new PDO (DB_DSN, DB_USERNAME, DB_PASSWORD);
}
catch(PDOException $e)
{
    echo "Error connecting to Database " . $e->getMessage();
}

//1. Define the query
$sql = "SELECT * FROM adviseIt WHERE token = :token";

//2. Prepare the statement
$statement = $dbh->prepare($sql);

//3. Bind the parameters (if there are any)

$statement->bindParam(':token', $num);

//4. Execute the statement
$statement->execute();


//5. Process the result (if there is one)
if($statement->rowCount()==1){

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    /*echo $row['token']."<br>".$row['fall']."<br>".$row['fallNotes']."<br>".$row['winter']."<br>".$row['winterNotes']."
    <br>".$row['spring']."<br>".$row['springNotes']."<br>".$row['summer']."<br>".$row['summerNotes']."<br>".$row['date'];*/

    $dateTime = $row['date'];

    //mini token form with button to post token to session object (reSchedule)
    echo "<form action='#' method='post' class='text-center'>";

    echo "<input class='tokenInput' type='text' name='token' id='token' value=".$row['token'].">";
    echo "<input class='tokenInput' type='text' name='fall' id='fall' value=".$row['fall'].">";
    echo "<input class='tokenInput' type='text' name='fallText' id='fallText' value=".$row['fallNotes'].">";
    echo "<input class='tokenInput' type='text' name='winter' id='winter' value=".$row['winter'].">";
    echo "<input class='tokenInput' type='text' name='winterText' id='winterText' value=".$row['winterNotes'].">";
    echo "<input class='tokenInput' type='text' name='spring' id='spring' value=".$row['spring'].">";
    echo "<input class='tokenInput' type='text' name='springText' id='springText' value=".$row['springNotes'].">";
    echo "<input class='tokenInput' type='text' name='summer' id='summer' value=".$row['summer'].">";
    echo "<input class='tokenInput' type='text' name='summerText' id='summerText' value=".$row['summerNotes'].">";

    //value field is ingoring the rest of date object after space, need to fix
    echo "<input class='tokenInput' type='text' name='date' id='date' value=".$dateTime.">";

    echo "<input class='btn btn-success m-auto' type='submit' value='Lookup Plan'>";
    echo "</form>";




}
else{
    echo "<br>";
    echo "<p class='scheduleError'>schedule is not found</p>";
}




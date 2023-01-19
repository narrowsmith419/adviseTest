

<?php
session_start();

$num = $_POST['num'];

//connect to database with pre stored credentials
require $_SERVER['DOCUMENT_ROOT'].'/../pdo-config.php';

try{
    //instantiate database object
    $dbh = new PDO (DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo "message from schedule-finder.php";
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
    echo $row['token']."<br>".$row['fall']."<br>".$row['fallNotes']."<br>".$row['winter']."<br>".$row['winterNotes']." 
    <br>".$row['spring']."<br>".$row['springNotes']."<br>".$row['summer']."<br>".$row['summerNotes']."<br>".$row['date'];

    //session variable for token storage | NOT WORKING
    $_SESSION['savedToken'] = $row['token'];



    foreach($row as $value)
        {
            echo "<br>"."<input type='text' name=".$value." id=".$value." value=".$value."
                           aria-describedby=".$value.">";
        }

    //mini token form with button to post token to session object (reSchedule)
    echo "<form action='#' method='post' class='text-center row'>";
    echo "<br>"."<input type='text' name='token' id='token' value=".$row['token']."
                           aria-describedby='token'>";
    echo "<input class='btn btn-info' type='submit' value='Lookup Plan'>";
    echo "</form>";


}
else{
    echo "<br class='scheduleError'>schedule is not found</br>";
}




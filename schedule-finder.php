

<?php

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
    echo $row['token']."<br>".$row['fall']."<br>".$row['fallNotes']."<br>".$row['winter']."<br>".$row['winterNotes']." 
    <br>".$row['spring']."<br>".$row['springNotes']."<br>".$row['summer']."<br>".$row['summerNotes']."<br>".$row['date'];

    echo "<form action='#' method='post' class='text-left row'>";

    foreach($row as $value)
        {
            echo "<br>"."<input type='text' name=".$value." id=".$value." value=".$value."
                           aria-describedby=".$value.">";
        }

    echo "<div class='col-sm-6 text-right mt-2 mt-auto'>
                    <input class='form-control btn btn-info mb-3'
                           type='submit' value='View Plan'>
                </div>";

    echo "</form>";

}
else{
    echo "schedule is not found";
}

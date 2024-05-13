<?php
$user = 'root';
$password = '';
$dsn = "mysql:host=localhost:3306;dbname=imdb";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $first_name = $_GET['firstname'];
    $getfname = $first_name;
    $firstname = $pdo->quote($first_name .= "%"); 

    $getlname = $_GET['lastname'];
    $lastname = $pdo->quote($getlname);
} 

catch (PDOException $ex) {
    echo "Connection failed: " .$ex->getMessage();
}

function findIDactor($firstname, $lastname, $pdo, $getfname, $getlname){
    $query_actorID = $pdo->query("SELECT id AS ActorID FROM actors WHERE first_name LIKE $firstname AND last_name = $lastname ORDER BY film_count DESC, id ASC LIMIT 1;");
    $result = '';

    while($withactorID = $query_actorID->fetch()) {
        $result = $withactorID["ActorID"];
    }

    if($result != '' ){ 
        $IDofActor = $pdo->quote($result);
    }

    else{ 
?>
    <p>Actor <?= $getfname ." " .$getlname ?> not found</p>
<?php 
    $IDofActor = '0';
    }
    return $IDofActor;
    }

?>

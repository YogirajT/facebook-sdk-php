<?php
try {
    $user = 'root' ;
    $pass = 'root' ;
    $dbh = new PDO('mysql:host=localhost;dbname=swagon_blog', $user, $pass);

    $stmt =  $dbh->prepare('INSERT INTO countries VALUES(null,:name,:description)');
    
    $stmt->bindParam(':name',$name) ;
    $stmt->bindParam(':description',$desc) ;

    //Lets insert namibia
    $name = "Namibia" ;
    $desc = "Unknown country in africa but we know it plays cricket !" ;
    $stmt->execute();
    echo "$name inserted <br>" ;

    //now insert russia
    $name = "Russia" ;
    $desc = "A friend of India, supplies military armoury" ;
    $stmt->execute();
    echo "$name inserted <br>" ;

    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
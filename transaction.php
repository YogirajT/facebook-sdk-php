<?php
if(isset($_POST['submit']))
{
    $user = 'root' ;
    $pass = 'root' ;
    $dbh = new PDO('mysql:host=localhost;dbname=swagon_blog', $user, $pass);

    $dbh->beginTransaction();
    $stmt =  $dbh->prepare('INSERT INTO countries VALUES(null,:name,:description)');
    
    $stmt->bindParam(':name',$name) ;
    $stmt->bindParam(':description',$desc) ;
    $state = true ;
    for($i=0;$i<3;$i++)
    {
        $name = $_POST['name'][$i] ;
        $desc = $_POST['desc'][$i] ;
        if(empty($name))
        {
            $state = false ;
        }
        $state = $state & $stmt->execute();
    }
    if($state == true)
    {
        $dbh->commit();
        echo "<h2><em>Database Updated</em></h2>" ;
    }else{
        $dbh->rollback();
        echo "<h2><em>Database Rolledback</em></h2>" ;
    }
}
?>

<form method="post">
    <table border="1">
    <tr>
            <th>Sr. No</th>
            <th>Name</th><th>Description</th>
    </tr>
       <?php for($i=0;$i<3;$i++) : ?>
        <tr>
            <td><?=$i+1 ?></td>
            <td>
                <input 
                    type="text" 
                    name="name[<?=$i ?>]"  />
            </td>
            <td>
                <textarea 
                    name="desc[<?=$i ?>]">
                </textarea>
            </td>
        </tr>
        <?php endfor ?>
    </table>
    <input type="submit" name="submit" value="Save Changes" />
</form>
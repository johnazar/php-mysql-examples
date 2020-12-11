<?php
//echo phpinfo();
try{
    $db = new \PDO('sqlite:db_file.sqlite', '', '', array(
        \PDO::ATTR_EMULATE_PREPARES => false,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ));
    $stmt = $db->prepare('SELECT PersonID, LastName, FirstName, Address, City FROM Persons;');
    $stmt->execute();
    $result = $stmt->fetchAll();

        print '    <table>
    <tr>
        <th>PersonID</th>
        <th>LastName</th>
        <th>FirstName</th>
        <th>Address</th>
        <th>City</th>
    <tr>';
    foreach($result as $person){
        echo '<tr>
        <td>'.$person['PersonID'].'</td>
        <td>'.$person['FirstName'].'</td>
        <td>'.$person['LastName'].'</td>
        <td>'.$person['Address'].'</td>
        <td>'.$person['City'].'</td>
    </tr>';
    }
    print '</table>';

    

}catch(PDOException $e){
    echo $e->getMessage();
}

?>
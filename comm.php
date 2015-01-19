<?php

if(isset($_GET['x']) && !empty($_GET['x'])){
    $varijabla = trim($_GET['x']);
    $conn = new mysqli("localhost","root","","test");
    $querry = "SELECT *, TIMESTAMPDIFF(HOUR, worked.from, worked.to) AS hours FROM worked WHERE users_id = ".$varijabla;
    $data = $conn->query($querry);
    echo '<table border="1"><tr><td>id</td><td>pocetak</td><td>kraj</td><td>broj_sati</td><td>user_id</td></tr>';
    while($r = $data->fetch_assoc()){
        echo '<tr><td>'.$r['id'].'</td><td>'.$r['from'].'</td><td>'.$r['to'].'</td><td>'.$r['hours'].'h</td><td>'.$r['users_id'].'</td></tr>';
    }
    echo '<table border="1">';
}else
{
    echo 'Pogresan ili prazan querry!';
}

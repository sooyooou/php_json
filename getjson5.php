<?php

    error_reporting(E_ALL);
    ini_set('display_errors',1);

    include('dbcon.php');


    $stmt = $con->prepare('select * from museum');
    $stmt->execute();

    if ($stmt->rowCount() > 0)
    {
        $data = array();

        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            array_push($data,
                array('a'=>$a, 'b'=>$b, 'c'=>$c, 'd'=>$d, 'e'=>$e, 'f'=>$f, 'g'=>$g, 'h'=>$h, 'i'=>$i, 'j'=>$j, 'k'=>$k, 'l'=>$l, 'm'=>$m, 'n'=>$n, 'o'=>$o, 'p'=>$p, 'q'=>$q, 'r'=>$r
            ));
        }

        header('Content-Type: application/json; charset=utf8');
        $json = json_encode(array("museum"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
        echo $json;
    }

?>

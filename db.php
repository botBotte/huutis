<?php

//Yhteys tietokantaan
function connect ($dbHost, $dbName, $dbUsername, $dbPassword)
{
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error)
    {
        die("Cannot connect to database: \n " . $db->connect_error . "\n" . $db->connect_errno );
    }

    return $db;
}

//Hae kaikki tuotteet
function fetchAll(mysqli $db)
{
    $data = [];

    $sql = 'SELECT * FROM `products`';

    $result = $db->query($sql);

    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            $data[] = $row;
        }
    }
    return $data;
}

// palauttaa standard luokan, OOP?
// function fetchAll(mysqli $db)
// {
//     $data = [];

//     $sql = 'SELECT * FROM `products`';

//     $result = $db->query($sql);

//     if ($result->num_rows > 0)
//     {
//         while ($row = $result->fetch_object())
//         {
//             $data[] = $row;
//         }
//     }
//     var_dump($data);
//     die;
//     return $data;
// }
?>

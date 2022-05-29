<?php

function queryDB($sql, $link)
{
    $result = $link->query($sql);
    if ($row = $result->fetch_assoc()) {
        return $row;
    } else {
        return false;
    }
}

function queryRowsDB($sql, $link)
{
    return mysqli_query($link, $sql);
}

function insertDB($sql, $link)
{
    if (mysqli_query($link, $sql)) {
        return true;
    } else {
        return false;
    }
}

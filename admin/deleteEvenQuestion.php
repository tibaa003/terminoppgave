<?php
include("../php/config.php");
include("../php/functions.php");
$questionAmount = queryDB("SELECT COUNT(*) as total FROM evenquizquestions", $link);

if ($questionAmount["total"] <= $_GET["id"]) {
    insertDB("UPDATE evenquizstats SET answeredQuestions = answeredQuestions-1 WHERE question = " . $_GET["id"] . "", $link);
    insertDB("UPDATE evenquizstats SET finished = true WHERE question = '" . $_GET["id"] . "'", $link);
    insertDB("UPDATE evenquizstats SET question = question-1 WHERE question = " . $_GET["id"] . "", $link);
} else {
    insertDB("UPDATE evenquizstats SET question = question+1 WHERE question = " . $_GET["id"] . "", $link);
}

insertDB("DELETE FROM evenquizquestions WHERE ID = " . $_GET["id"], $link);

if ($questionAmount["total"] > $_GET["id"]) {
    insertDB("UPDATE evenquizstats SET question = question-1 WHERE question = " . $_GET["id"] . "", $link);
}

for ($i = $_GET["id"]; $i <= $questionAmount["total"]; $i++) {
    insertDB("UPDATE evenquizquestions SET ID = " . $i . " WHERE ID = " . $i + 1, $link);
}

insertDB("DELETE FROM evenquizquestions WHERE ID = " . $questionAmount["total"] + 1 . "", $link);
header("Location: ./evenQuizCRUD.php");

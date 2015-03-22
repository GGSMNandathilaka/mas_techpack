<?php

require_once '_db.php';

$stmt = $db->prepare('SELECT * FROM [resources]');
$stmt->execute();
$result = $stmt->fetchAll();

class Event {
    
}

$events = array();

foreach ($result as $row) {
    $e = new Event();
    $e->id = $row['style_no'];
    $e->text = $row['account_name'] . "-" . $e->id;
    $e->start = $row['start_date'];
    $e->end = $row['end_date'];
    $e->resource = $row['factory_id'];
    $e->bubbleHtml = "Tech Pack details: <br/>" . $e->text;
    $events[] = $e;
}

header('Content-Type: application/json');
echo json_encode($events);
?>

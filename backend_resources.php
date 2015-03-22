<?php
require_once '_db.php';
    
//$resources = $db->query('SELECT [factory] FROM [resources] ORDER BY [factory]');

class Group {}
class Factory {}

$groups = array();

$g = new Group();
$g->id = "G1";
$g->name = "Factory";
$g->expanded = true;
$g->children = array();
$groups[] = $g;

$stmt = $db->prepare('SELECT DISTINCT * FROM [factory]');
$stmt->execute();
$factory_data = $stmt->fetchAll();  

foreach($factory_data as $factory) {
  $f = new Factory();
  $f->name = $factory['name'];
  $f->id = $factory['factory_id'];
  $g->children[] = $f;
}

header('Content-Type: application/json');
echo json_encode($groups);

?>

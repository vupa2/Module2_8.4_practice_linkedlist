<?php
require_once 'LinkedList.php';

$data1 = new stdClass();
$data1->id = 1;
$data1->name = "BMW";
$data1->colot = "blue";

$data2 = new stdClass();
$data2->id = 2;
$data2->name = "TOY";
$data2->colot = "red";

$data3 = new stdClass();
$data3->id = 3;
$data3->name = "VIN";
$data3->colot = "green";

$data4 = new stdClass();
$data4->id = 4;
$data4->name = "ROL";
$data4->colot = "yellow";

$data5 = new stdClass();
$data5->id = 5;
$data5->name = "YAM";
$data5->colot = "brown";

$linkedList = new LinkedList();
$linkedList->addFirst($data1);
$linkedList->addLast($data2);
$linkedList->addLast($data3);

echo "<pre>";
var_dump($linkedList->printList());
$cloneLinkedList = $linkedList->clone();
var_dump($cloneLinkedList->printList());

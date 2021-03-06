<?php 


require '../vendor/autoload.php';



$data = include 'dataArr.php';


$table  = new Belgian\DataTable\ContainerDataTable();
$header = new Belgian\DataTable\HeadRowDataTable();
$body   = new Belgian\DataTable\BodyDataTable();

$table->setAttribute('border', '1');

$header->addHead('#');
$header->addHead('Name');
$header->addHead('Occupation');
$header->addHead('User');

$table->addInnerJoin($header);


foreach ($data as $k => $row)
{
    $ln = new Belgian\DataTable\RowDataTable();

    $ln->addData($row['id']);
    $ln->addData($row['name']);
    $ln->addData($row['occupation']);
    $ln->addData($row['user']);

    $body->addInnerJoin($ln);

}

$table->addInnerJoin($body);


echo $table->getElement();



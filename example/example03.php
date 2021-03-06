<?php 


require '../vendor/autoload.php';


$data = include 'dataArr.php';


$table  = new Belgian\DataTable\ContainerDataTable();
$header = new Belgian\DataTable\HeadRowDataTable();
$body   = new Belgian\DataTable\BodyDataTable();
$foot   = new Belgian\DataTable\FootRowDataTable();

$table->setAttribute('border', '1');

$header->addHead('Id');
$header->addHead('Name');
$header->addHead('Occupation');
$header->addHead('Salary');

$table->addInnerJoin($header);


$total = 0;
foreach ($data as $i => $row)
{
    $ln = new Belgian\DataTable\RowDataTable();

    $ln->addData($row['id']);
    $ln->addData($row['name']);
    $ln->addData($row['occupation']);
    $ln->addData('$ ' . $row['salary']);

    $body->addInnerJoin($ln);

    $total += $row['salary'];

}

$table->addInnerJoin($body);

$foot->addHead("Total", array('colspan' => 3, 'align'=>'left'));
$foot->addData('$ ' . $total);

$table->addInnerJoin($foot);

echo $table->getElement();


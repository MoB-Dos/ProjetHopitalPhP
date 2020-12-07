<?php

require 'lol.php';
require '../../Class/ClassManager/User/Mail/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$lol = new lolManager();



// $tools = new toolsManager();
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

//définitions du nom de la page
$sheet->setTitle('Bilan');

//tableau pour définir le style de mes bordures
$styleArray = array("borders" => array("outline" => array("borderStyle" => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,"color" => array("argb" => "0"),),),);

//j'attribue un nom a chacune de mes colonne 
$sheet->setCellValue('A1', 'idInfo');
$sheet->setCellValue('B1', 'idUser');
$sheet->setCellValue('C1', 'nom');
$sheet->setCellValue('D1', 'prenom');
$sheet->setCellValue('E1', 'date');
$sheet->setCellValue('F1', 'adresse');
$sheet->setCellValue('G1', 'mutuel');
$sheet->setCellValue('H1', 'securité social');
$sheet->setCellValue('I1', 'optionTV');
$sheet->setCellValue('J1', 'optionWifi');
$sheet->setCellValue('K1', 'regime');

//je change la couleur des titres 
$sheet->getStyle('A1:B1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('9BC2E6');

$sheet->getStyle('C1:G1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('BDD7EE');

$sheet->getStyle('H1:K1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFC107');


//je change la taille de chacune des cellules 
foreach(range('A','K') as $columnID) {
    $sheet->getColumnDimension($columnID)->setWidth(20);
}
foreach(range('1','11') as $columnID) {
    $sheet->getRowDimension($columnID)->setRowHeight(24);
}

//chacune des cellules du tableau et centrer 
//mais aussi possède une bordure définis plus haut avec le tableau 
foreach(range('A','K') as $valueLetter) {
    foreach(range('1','11') as $valueNumber) {
            $sheet ->getStyle($valueLetter."".$valueNumber)->applyFromArray($styleArray);
            $sheet->getStyle($valueLetter."".$valueNumber)->getAlignment()->setHorizontal('center');
            $sheet->getStyle($valueLetter."".$valueNumber)->getAlignment()->setVertical('center');
    }
} 

//insertions des données 
$reponseMenu=$lol->connexion_bd()->query('SELECT * FROM infouser INNER JOIN user ON infouser.idUser = user.idUser');
$dataRepas=$reponseMenu->fetchall();


$cells = 2;

foreach($dataRepas as $value)
{
  $sheet->setCellValue('A'.$cells, $value['idInfo']);
  $sheet->setCellValue('B'.$cells, $value['idUser']);
  $sheet->setCellValue('C'.$cells, $value['nom']);
  $sheet->setCellValue('D'.$cells, $value['prenom']);
  $sheet->setCellValue('E'.$cells, $value['date']);
  $sheet->setCellValue('F'.$cells, $value['adresse']);
  $sheet->setCellValue('G'.$cells, $value['mutuel']);
  $sheet->setCellValue('H'.$cells, $value['secusocial']);
  $sheet->setCellValue('I'.$cells, $value['optionTV']);
  $sheet->setCellValue('J'.$cells, $value['optionWifi']);
  $sheet->setCellValue('K'.$cells, $value['regime']);

  //$sheet->setCellValue('H'.$cells, $value['']);

  $cells = $cells +  1;
}





$file = "BilanRepas.xlsx";
$writer = new Xlsx($spreadsheet);
$writer->save($file);
 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.$file.'"');
$writer->save("php://output");



?>
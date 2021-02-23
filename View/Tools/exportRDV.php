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
$sheet->setCellValue('A1', 'idRdv');
$sheet->setCellValue('B1', 'date');
$sheet->setCellValue('C1', 'horaire');
$sheet->setCellValue('D1', 'medecin');
$sheet->setCellValue('E1', 'login');
$sheet->setCellValue('F1', 'motif');

//je change la couleur des titres 
$sheet->getStyle('A1:B1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('9BC2E6');

$sheet->getStyle('C1:F1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('BDD7EE');

//$sheet->getStyle('H1:K1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFC107');


//je change la taille de chacune des cellules 
foreach(range('A','F') as $columnID) {
    $sheet->getColumnDimension($columnID)->setWidth(20);
}
foreach(range('1','11') as $columnID) {
    $sheet->getRowDimension($columnID)->setRowHeight(24);
}

//chacune des cellules du tableau et centrer 
//mais aussi possède une bordure définis plus haut avec le tableau 
foreach(range('A','F') as $valueLetter) {
    foreach(range('1','11') as $valueNumber) {
            $sheet ->getStyle($valueLetter."".$valueNumber)->applyFromArray($styleArray);
            $sheet->getStyle($valueLetter."".$valueNumber)->getAlignment()->setHorizontal('center');
            $sheet->getStyle($valueLetter."".$valueNumber)->getAlignment()->setVertical('center');
    }
} 

//insertions des données 
$reponseMenu=$lol->connexion_bd()->query('SELECT idRdv, date, horaire, CONCAT(infomedecin.nom," ", infomedecin.prenom) as medecin, login, motif FROM rendezvous INNER JOIN user ON rendezvous.idUser = user.idUser INNER JOIN horaire ON rendezvous.idHoraire=horaire.idHoraire INNER JOIN infomedecin ON rendezvous.idMedecin=infomedecin.idMedecin');
$dataRepas=$reponseMenu->fetchall();


$cells = 2;

foreach($dataRepas as $value)
{
  $sheet->setCellValue('A'.$cells, $value['idRdv']);
  $sheet->setCellValue('B'.$cells, $value['date']);
  $sheet->setCellValue('C'.$cells, $value['horaire']);
  $sheet->setCellValue('D'.$cells, $value['medecin']);
  $sheet->setCellValue('E'.$cells, $value['login']);
  $sheet->setCellValue('F'.$cells, $value['motif']);


  //$sheet->setCellValue('H'.$cells, $value['']);

  $cells = $cells +  1;
}





$file = "BilanRDV.xlsx";
$writer = new Xlsx($spreadsheet);
$writer->save($file);
 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.$file.'"');
$writer->save("php://output");



?>
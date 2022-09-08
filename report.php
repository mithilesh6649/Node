<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;


class ReporController extends Controller
{
     public function report(){
      
        $spreadsheet = new Spreadsheet();
           /* Add some data */
        $spreadsheet->setActiveSheetIndex(0);
         /* Rename worksheet */
        $spreadsheet->getActiveSheet()->setTitle('By Month');
           
           /* set default value */
    $spreadsheet->getDefaultStyle()->getFont()->setName('Arial')->setSize(10);
    $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
 
           //Heading.............
    $spreadsheet->getActiveSheet()->setCellValue('A1','MUGHAL MAHAL ALL RESTAURANT PETTY CASH EXPENSES F/Y 2022');
           //increase width
    $spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(35);
     //Merge Heading
  $spreadsheet->getActiveSheet()->mergeCells('A1:AG1');
    //Set Font size
  $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
           //Set Cell alignment center
  $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
  $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
           //$spreadsheet->getActiveSheet()->getStyle('A1')
            // ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
  $spreadsheet->getActiveSheet()->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('808080');
            
           
           
           
           
           //B1
           
           
           //Heading.............
           
 $spreadsheet->getActiveSheet()->setCellValue('A2','YEARLY CASH EXPENSES : TYPE OF EXPENSES CATEGORY');
           
           //Merge Heading
           $spreadsheet->getActiveSheet()->mergeCells('A2:AG2');
           //Set Font size
           $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(12);
           //Set Cell alignment center
           //$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(4.42);
           $spreadsheet->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
           $spreadsheet->getActiveSheet()->getRowDimension('3')->setRowHeight(35);
           $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
           $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
           //$spreadsheet->getActiveSheet()->getStyle('A1')
            // ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
           
           $spreadsheet->getActiveSheet()->getStyle('A2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('969696');
           
            //Border..................
           $spreadsheet->getActiveSheet()->getStyle('A2')
            ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('A2')
            ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('A2')
            ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('A2')
            ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
           
           
            //Set Column size
           
            //$by_month_tab->getColumnDimension("A")->setAutoSize(true);
            //$by_month_tab->getColumnDimension("B")->setAutoSize(true);
           
  
           $rowArray = [
            'Month',
            "Statement  \n Reg Code",
             'Gas Cylinder Refilling',
            'Purchase-Co-Operative',
            'Purchase Bread',
            'Purchase Grocery ',
            'Purchase-Charcoal',
            'purchase-Dairy Products',
            'Purchase-Fresh Meat',
            'Purchase-Fresh Vegetable',
            'Purchase - Fresh Leaves',
            'Purchase-Fish & Prawns',
            'Purchase-Soft Drinks /Bevgs',
            'Vehicle-Fuel',
            'Vehicle-Repair/Maint.',
            'Repair & Maint.(Restaurant)',
            'Repair & Maint.(Kitchen)',
            'Repair & Maint.(Electrical)',
            'Repair & Maint.(Others)',
            'Staff Accomodation (Allowance)',
            'Giveaway(Haras)',
            'Telephone/Mobile',
            'Staff Medical',
            'Legal Fees Others',
            'Office Stationery',
            'Electricity Bill ',
            'Wages-Staff Exp.(Casual)',
            'Conveyance (Delivery)',
            'Conveyance (Others)',
            'Exp.','Day Total',
            'Chq Rcd','Closing Bal'];
       
            $spreadsheet->getActiveSheet()
    ->fromArray(
        $rowArray,   // The data to set
        NULL,        // Array values with this value will not be set
        'A3'         // Top left coordinate of the worksheet range where
                     //    we want to set these values (default is A1)
    );


    $rowArrayData = ['1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1'];

        
    $spreadsheet->getActiveSheet()
    ->fromArray(
        $rowArrayData,   // The data to set
        NULL,        // Array values with this value will not be set
        'B4'         // Top left coordinate of the worksheet range where
                     //    we want to set these values (default is A1)
    );


    $spreadsheet->getActiveSheet()->setCellValue('AE4', '=SUM(B4:AD4)');


            $rowArray = ['01/02/2022', '01/02/2022', '01/02/2022', '01/02/2022', '01/02/2022', '01/02/2022', '01/02/2022', '01/02/2022', '01/02/2022',  '01/02/2022', '01/02/2022'];
$columnArray = array_chunk($rowArray, 1);
$spreadsheet->getActiveSheet()
    ->fromArray(
        $columnArray,   // The data to set
        NULL,           // Array values with this value will not be set
        'A4'            // Top left coordinate of the worksheet range where
                        //    we want to set these values (default is A1)
    );
      
    $rowArray = ['1', '1', '1', '1', '1', '1', '1', '1', '1',  '1', '1'];
    $columnArray = array_chunk($rowArray, 1);
    $spreadsheet->getActiveSheet()
        ->fromArray(
            $columnArray,   // The data to set
            NULL,           // Array values with this value will not be set
            'B4'            // Top left coordinate of the worksheet range where
                            //    we want to set these values (default is A1)
        );
           
        
        $spreadsheet->getActiveSheet()->setCellValue('B16', '=SUM(B4:B14)');

       // $spreadsheet->getActiveSheet()->getCell('A12')->getCalculatedValue();
           
           
            //backgroud
$spreadsheet->getActiveSheet()->getStyle('A3:AG3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('c0c0c0');
           
            //FOR BORDER
        $start_border_row_position = 4;
           $columns = array(
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',
            'N',
            'O',
            'P',
            'Q',
            'R' ,
            'S' ,
            'T' ,
            'U' ,
            'V' ,
            'W' ,
            'X' ,
            'Y' ,
            'Z' ,
            'AA' ,
            'AB' ,
            'AC' ,
            'AD' ,
            'AE' ,
            'AF' ,
            'AG' 
            
           );
           
            for($i=4;$i<19;$i++){
            $data = "A".$i.":AG".$i; 
            $spreadsheet
            ->getActiveSheet()
            ->getStyle($data)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
            ->setColor(new Color('000000'));
           
            }
           
           
           
           
           
           $start = 3;
           $end =17;
           
            
           foreach($columns as $dd){
            $spreadsheet
            ->getActiveSheet()
            ->getStyle( $dd.'3:'.$dd.'18')
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
            ->setColor(new Color('000000')); 
           }
           
           
           $spreadsheet->getActiveSheet()->mergeCells('A18:B18');
           $spreadsheet->getActiveSheet()->setCellValue('A18','Total');
           
           $spreadsheet->getActiveSheet()->setCellValue('C18','0.00');
           $spreadsheet->getActiveSheet()->setCellValue('D18','0.00');
           //$spreadsheet->getActiveSheet()->setCellValue('A2','BRANCH');
           

           foreach (range('A', 'Z') as $columnID) {
 //   $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
    $spreadsheet->getActiveSheet()->getStyle($columnID)->getAlignment()->setHorizontal('center');
    $spreadsheet->getActiveSheet()->getStyle($columnID)->getAlignment()->setVertical('center');
}
            
           $spreadsheet->getActiveSheet()->getCell('A3')->setValue("Statement \n Reg Code");
           $spreadsheet->getActiveSheet()->getStyle('A3:AG3')->getAlignment()->setWrapText(true);  
           $spreadsheet->getActiveSheet()->getStyle('A3:AG3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
           $spreadsheet->getActiveSheet()->getStyle('A3:AG3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        //    $spreadsheet->getActiveSheet()->getStyle('A3:AG3')->getAlignment()->setWrapText(true);
           $spreadsheet->getActiveSheet()->getStyle('A3:AG3')->getFont()->setSize(7);
           $spreadsheet->createSheet();
           
           
           
           //Second Tab......................................................................................................................................
           
           
            /* Add some data */
           $spreadsheet->setActiveSheetIndex(1)
           ->setCellValue('A1', 'BRANCH!');
           
           
           
           
           
           
           /* Rename worksheet */
            $spreadsheet->getActiveSheet()->setTitle('Branch wise');
           $spreadsheet->createSheet();
           
           
            /* Rename worksheet */
            $spreadsheet->getActiveSheet()->setTitle('SHRQ');
           
           
           /* Set active sheet index to the first sheet, so Excel opens this as the first sheet */
           $spreadsheet->setActiveSheetIndex(0);
           
           
            
           
           
           
           
           
           //ddddddddddddddddddddddddddddddddd
           
           
           /* Add some data */
           // $spreadsheet->setActiveSheetIndex(1);
           // $sheets = $spreadsheet->getActiveSheet()->setTitle('By Month');
           
           
           
           
           
           
           
           
           $fileName = 'Petty Cash Reporting.xlsx';
           $writer = new Xlsx($spreadsheet);
           header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
           header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
           $writer->save('php://output');

   


 

     }
}

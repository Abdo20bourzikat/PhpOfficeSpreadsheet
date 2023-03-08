<?php

    // some random data
    $data = [
        ['name' => 'soufian', 'email' => 'soufian@gmail.com', 'bio' => 'Lorem ipsum dolor sit amet consectetur'],
        ['name' => 'simo', 'email' => 'simo@gmail.com', 'bio' => 'Lorem ipsum dolor sit amet consectetur'],
        ['name' => 'wassim', 'email' => 'wassim@gmail.com', 'bio' => 'Lorem ipsum dolor sit amet consectetur'],
        ['name' => 'walid', 'email' => 'walid@gmail.com', 'bio' => 'Lorem ipsum dolor sit amet consectetur'],
        ['name' => 'yassin', 'email' => 'yassin@gmail.com', 'bio' => 'Lorem ipsum dolor sit amet consectetur']
    ];

    //call the autoload
    include './vendor/autoload.php';
    //load phpspreadsheet class using namespaces
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    //calling the Xlsx writer for make an xlsx file
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    //make a object of the Spreadsheet class
    $spreadsheet = new Spreadsheet();

     if (isset($_POST['export_excel_data'])) {
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle("Data");
        $sheet->setCellValue('A1', 'Name');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Bio');

        //get data
        $c = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A'.$c, $item['name']);
            $sheet->setCellValue('B'.$c, $item['email']);
            $sheet->setCellValue('C'.$c, $item['bio']);
            $c++;
        }
        
        $fileName = date("Y_M_D_H_m_s")."_reports.xlsx";
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
        $writer->save('php://output');
    }
?>
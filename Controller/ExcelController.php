<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelController
{
    public function __construct()
    {
        $action = "";
        extract($_GET);
        switch ($action) {
            case 'create':
                $this->create();
                break;
        }
    }

    function create()
    {
        $spreadsheet = IOFactory::load("Public/downloads/clients.xlsx");
        $sheet = $spreadsheet->getActiveSheet();

        // Determine where your data starts and ends. 
        // Assuming your data starts at row 4 and your headers/logo are in rows 1-3.
        $startRow = 4;
        $endRow = $sheet->getHighestRow();

        // Clear the data from the spreadsheet
        for ($row = $endRow; $row >= $startRow; $row--) {
            $sheet->removeRow($row);
        }

        $row = $startRow;
        $count = 0;
        $cm = new ClientManager();
        $clients = $cm->showClient();
        foreach ($clients as $value) {
            extract($value);
            $sheet->insertNewRowBefore($row);
            $sheet->setCellValue('A' . $row, $id_client);
            $sheet->setCellValue('b' . $row, $nom);
            $sheet->setCellValue('c' . $row, $prenom);
            $sheet->setCellValue('d' . $row, $email);
            $row++;
            $count++;
        }

        // Set the total client count
        $sheet->setCellValue('B' . $row, 'TOTAL CLIENTS');
        $sheet->setCellValue('C' . $row, $count);

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('Public/downloads/clients.xlsx');
        // echo "successfully created";
        // Send headers to force download
    }
}

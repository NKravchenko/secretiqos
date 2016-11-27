<?php

namespace Affect\MiniCoreBundle\Services;

use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportService
{
    const DEFAULT_ROW = 2;

    private $report;

    public function __construct()
    {
        $this->report = new \PHPExcel();
    }

    public function createAllUsersReport($data, $showRef = false)
    {
        $sheet = $this->report->setActiveSheetIndex(0);
        $sheet->setCellValue('A1', 'Сomes from');
        $sheet->setCellValue('A1', 'Reg. time');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Surname');
        $sheet->setCellValue('D1', 'Referred by');
        $sheet->setCellValue('E1', 'Accounts');
        $sheet->setCellValue('F1', 'Phone');
        $sheet->setCellValue('G1', 'E-mail');
        $sheet->setCellValue('H1', 'Match criteria');
        $sheet->setCellValue('I1', 'Status');
        $sheet->setCellValue('J1', 'Type of recruitment');
        $sheet->setCellValue('K1', 'Registered in program');
        $sheet->setCellValue('L1', 'Type of Survey');
        if($showRef){
            $sheet->setCellValue('M1', 'Сomes from');
        }

        $row = self::DEFAULT_ROW;
        foreach ($data as $value) {
            $sheet->setCellValue('A' . $row, $value['createdAt']);
            $sheet->setCellValue('B' . $row, $value['firstName']);
            $sheet->setCellValue('C' . $row, $value['surnameName']);
            $sheet->setCellValue('D' . $row, $value['referrerFirstName']);
            $sheet->setCellValue('E' . $row, $value['sm']);
            $sheet->setCellValue('F' . $row, $value['mobile']);
            $sheet->setCellValue('G' . $row, $value['email']);
            $sheet->setCellValue('H' . $row, $value['criteria']);
            $sheet->setCellValue('I' . $row, $value['status']);
            $sheet->setCellValue('J' . $row, $value['recruitment']);
            $sheet->setCellValue('K' . $row, $value['programm']);
            $sheet->setCellValue('L' . $row, $value['survey']);
            if($showRef){
                $sheet->setCellValue('M' . $row, $value['ref']);
            }
            $row++;
        }

        return $this;
    }


    public function sendAllUsersReport()
    {
        return $this->sendReport('iQOS_ref_report_');
    }

    protected function sendReport($name)
    {
        $writer = \PHPExcel_IOFactory::createWriter($this->report, 'Excel2007');
        $date   = new \DateTime('now');

        $headers = array(
            'Content-Type'        => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $name . $date->format('Ymd_His') . '.xlsx"',
            'Cache-Control'       => 'max-age=0'
        );

        return new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            },
            200,
            $headers
        );
    }
}

<?php

namespace App\Exports;

use App\Models\Person;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CasoResidencia implements FromCollection, WithCustomStartCell, WithMapping, WithHeadings, ShouldAutoSize, WithStyles, WithDrawings
{
    use Exportable;

    private $home_id;

    private $fileName = 'Casos Por Lugar  de Residencia.xlsx';

    private $writerType = Excel::XLSX;

    public function __construct($home_id)
    {
        $this->home_id = $home_id;
    }


    public function collection()
    {
        return Person::where('homeplace_id', $this->home_id)->get();
    }

    public function startCell(): string
    {
        return 'C8';
    }

    public function headings(): array
    {
        return [
            'DNI',
            'Apellidos y Nombres',
            'Correo',
            'Telefono',
            'Lugar de Residencia',
        ];
    }

    public function map($person): array
    {

        return [
            $person->dni,
            $person->ape_pater . ' ' . $person->ape_mater . ' ' . $person->names,
            $person->email,
            $person->phone,
            $person->homeplace->name,
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('logo');
        $drawing->setDescription('logo');
        $drawing->setPath(public_path('img/home/logo-ong-circle.png'));
        $drawing->setHeight(55);
        //$drawing->setWidth(55);
        $drawing->setCoordinates('B2');

        return $drawing;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->setTitle('Reporte de Casos');
        $sheet->mergeCells('A5:O5');
        $sheet->setCellValue('A5', 'REPORTE DE CASOS POR LUGAR DE RESIDENCIA');

        $sheet->getStyle('A5:O5')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14,
                'name' => 'Arial',
            ],
            'alignment' => [
                'horizontal' => 'center',
            ]
        ]);

        $sheet->getStyle('C8:G8')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 9,
                // 'name' => 'Arial',
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin'
                ]
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => [
                    'argb' => 'C5D9F1',
                ],
            ],
        ]);

        $sheet->getStyle('C9:G' . $sheet->getHighestRow())->applyFromArray([
            'font' => [
                //'bold' => true,
                'size' => 9,
                // 'name' => 'Arial',
            ],
            'alignment' => [
                'horizontal' => 'left',
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                ]
            ],
        ]);
    }
}

<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;

class UserExport implements FromQuery, WithHeadings, WithMapping, WithEvents
{
    use Exportable;

    protected $selectedIds;

    public function __construct($selectedIds)
    {
        $this->selectedIds = $selectedIds;
    }

    public function query()
    {
        if (!empty($selectedIds)) {
            return User::query()->whereIn('id', $this->selectedIds);
        } else {
            return User::query();
        }
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'email'
        ];
    }

    public function map($row): array
    {
        $fields = [
            $row->id,
            $row->name,
            $row->email
        ];
        return $fields;
    }

    public function registerEvents(): array
    {
        Sheet::macro('setOrientation', function (Sheet $sheet, $orientation) {
            $sheet->getDelegate()->getPageSetup()->setOrientation($orientation);
        });

        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

                $lastColumn = $event->sheet->getHighestColumn();
                $lastRow = $event->sheet->getHighestRow();

                $range = 'A1:' . $lastColumn . $lastRow;

                $event->sheet->getStyle($range)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '#000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}

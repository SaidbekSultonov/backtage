<?php

namespace Modules\ForTheBuilder\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Modules\ForTheBuilder\Entities\Deal;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet;

class LeadsExport implements FromCollection, WithEvents, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $leads = Deal::select("id")->get();
        
        return $leads;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings() :array
    {
        return [
            'ID',
            'Имя',
            'Номер телефона',
            'Реферер',
            'Запрос ид',
            'Статус',
            'Отправил',
        ];
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {

                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(20);
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(5);

               

            },
        ];
    }
}

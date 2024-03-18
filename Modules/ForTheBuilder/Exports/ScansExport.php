<?php

namespace Modules\ForTheBuilder\Exports;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\ForTheBuilder\Exports\LeadsExport;
use Modules\ForTheBuilder\Exports\DealsExport;

class ScansExport implements WithMultipleSheets
{
    use Exportable;

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function sheets(): array 
    {   
        $date = date('d.m.Y H:i');
        return [
            new DealsExport($this->id),
            new DealsSecondExport($this->id)
            
        ];
    }
}

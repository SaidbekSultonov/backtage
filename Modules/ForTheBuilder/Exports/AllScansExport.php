<?php

namespace Modules\ForTheBuilder\Exports;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Modules\ForTheBuilder\Exports\LeadsExport;
use Modules\ForTheBuilder\Exports\DealsExport;

class AllScansExport implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array 
    {   
        $date = date('d.m.Y H:i');
        return [
            new AllDealsExport(),
            new AllDealsSecondExport()
            
        ];
    }
}

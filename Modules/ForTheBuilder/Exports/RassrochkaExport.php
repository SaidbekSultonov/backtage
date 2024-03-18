<?php

namespace Modules\ForTheBuilder\Exports;

use Modules\ForTheBuilder\Entities\Leads;
use Modules\ForTheBuilder\Entities\InstallmentPlan;
use Modules\ForTheBuilder\Entities\PayStatus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Modules\ForTheBuilder\Entities\Currency;
use Modules\ForTheBuilder\Entities\Constants;
use Illuminate\Support\Facades\DB;

class RassrochkaExport implements FromView
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $model = InstallmentPlan::findOrFail($this->id);

        $connect_for = Constants::FOR_1;
        $id = (int)$this->id;
        $model = DB::table($connect_for.'.deals as dl')
        ->select(
            'dl.id AS deal_id',
            'dl.date_deal',
            'dl.client_id',
            'cl.last_name',
            'cl.first_name',
            'cl.middle_name',
            'hf.room_count',
            'hf.floor',
            'hf.areas',
            'h.corpus',
            'dl.price_sell',
            'dl.initial_fee',
            'dl.pay_sum',
            'dl.every_month_pay_sum'
        )
        ->join($connect_for.'.house_flat as hf', 'hf.id', '=', 'dl.house_flat_id')
        ->join($connect_for.'.clients as cl', 'cl.id', '=', 'dl.client_id')
        ->join($connect_for.'.house as h', 'h.id', '=', 'dl.house_id')
        ->where('hf.status',2)         
        ->where('dl.house_id',$id)         
        ->orderBy('hf.id')
        ->get(); 

        return view('forthebuilder::exports.deals', [
            'model' => $model
        ]);
    }

}

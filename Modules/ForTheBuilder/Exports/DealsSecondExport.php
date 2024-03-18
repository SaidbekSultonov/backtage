<?php

namespace Modules\ForTheBuilder\Exports;

use Modules\ForTheBuilder\Entities\Deal;
use Modules\ForTheBuilder\Entities\InstallmentPlan;
use Modules\ForTheBuilder\Entities\PayStatus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Modules\ForTheBuilder\Entities\Currency;
use Modules\ForTheBuilder\Entities\Constants;
use Illuminate\Support\Facades\DB;

class DealsSecondExport implements FromView, WithTitle
{

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $currency = Currency::orderByDesc('id')->first();

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
            'dl.every_month_pay_sum',
            'dl.discount',
            'dl.initial_fee_discount',
            'h.type_name',
            'ins.percent_type'
        )
        ->join($connect_for.'.house_flat as hf', 'hf.id', '=', 'dl.house_flat_id')
        ->join($connect_for.'.clients as cl', 'cl.id', '=', 'dl.client_id')
        ->join($connect_for.'.house as h', 'h.id', '=', 'dl.house_id')
        ->leftJoin($connect_for.'.installment_plan as ins', 'ins.id', '=', 'dl.installment_plan_id')
        ->where('hf.status',2)         
        ->where('dl.house_id',$id)         
        ->where('dl.type',3)         
        ->where('dl.deleted_at',NULL)         
        ->orderBy('dl.date_deal','asc')
        ->get(); 

        return view('forthebuilder::exports.deals3', [
            'model' => $model,
            'currency' => $currency
        ]);
    }

    public function title(): string
    {
        return 'Просрочки';
    }
}

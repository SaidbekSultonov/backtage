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

class AllDealsExport implements FromView, WithTitle
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $currency = Currency::orderByDesc('id')->first();
        $connect_for = Constants::FOR_1;
        $model = DB::table($connect_for.'.deals as dl')
        ->select(
            'dl.id AS deal_id',
            'dl.date_deal',
            'dl.client_id',
            'dl.contract',
            'dl.initial_fee_discount',
            'cl.last_name',
            'cl.first_name',
            'cl.middle_name',
            'hf.room_count',
            'hf.floor',
            'hf.areas',
            'hf.number_of_flat',
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
        ->where('dl.type',3)         
        ->where('dl.deleted_at',NULL)         
        ->orderBy('dl.date_deal','asc')
        ->get(); 

        $arr = [];
        if (!empty($model)) {
            foreach ($model as $key => $value) {
                $pay_status = PayStatus::where('deal_id',$value->deal_id)->orderBy('must_pay_date','asc')->get();
                if (!empty($pay_status) && count($pay_status) > 0) {
                    foreach ($pay_status as $keyp => $valuep) {
                        $arr[date('n-Y',strtotime($valuep->must_pay_date))] = 
                        [
                            'pay_date' => $valuep->must_pay_date,
                            'price' => $valuep->price,
                            'price_to_pay' => $valuep->price_to_pay,
                        ];
                    }
                }
            }
        }


        return view('forthebuilder::exports.deals-all', [
            'model' => $model,
            'arr' => $arr,
            'currency' => $currency,
        ]);
    }

    public function title(): string
    {
        return 'Свод поступ';
    }
}

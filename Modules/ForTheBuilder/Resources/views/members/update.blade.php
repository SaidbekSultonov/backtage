<form class="row w-100 m-auto" action="{{route('forthebuilder.members.one-update')}}" method="POST" enctype="multipart/form-data">
    <input id="purchases" type="hidden" value="{{ $purchases->id }}" name="id">
    @csrf
    <div class="col">
        <label class="form-label">{{ translate('Дата') }}</label>
        <input type="text" class="form-control dates" name="date" id="update_date" value="{{ ((!empty($purchases->add_time)) ? date('d.m.Y',strtotime($purchases->add_time)) : '') }}">
    </div>
    <div class="col">
        <label class="form-label">{{ translate('Объект') }}</label>
        <select name="object" class="form-control object object_update_modal">
            @if(!empty($objects)) 
                @foreach($objects as $key => $value)
                    <option {{ (($purchases->object_id == $value->id) ? 'selected' : '') }} value="{{ $value->id }}">
                        {{ $value->name }}
                    </option>
                @endforeach
            @endif 
        </select>
    </div>
    <div class="col col_shop {{ (($purchases->objects->name == 'Chimgan Hills') ? 'd-none' : '') }}">
        <label class="form-label">{{ translate('Бренд/Фирма') }}</label>
        <select name="shop" class="form-control shop shop_update_modal">
            @if(!empty($shops))
                @foreach($shops as $key => $value)
                    <option {{ (($purchases->shop_id == $value->id) ? 'selected' : '') }} value="{{ $value->id }}">
                        {{ $value->name }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="col col_change">
        <label class="form-label col_sum {{ (($purchases->objects->name == 'Chimgan Hills') ? 'd-none' : '') }}">{{ translate('Сумма') }}</label>
        <label class="form-label col_kv {{ (($purchases->objects->name == 'Chimgan Hills') ? '' : 'd-none') }}">{{ translate('Квадратура') }}</label>
        <input type="number" class="form-control" name="sum" id="update_sum" value="{{ $purchases->sum }}">
    </div>
    <div class="col-12 my-3">
        <button class="btn btn-success" type="submit">{{ translate('Сохранить') }}</button>
    </div>
</form>
<div class="row mt-2">
    <div class="col">
        <label class="form-label">{{ translate('Дата') }}</label>
        <input type="text" class="form-control dates" name="Purchase[{{ $count }}][date]">
    </div>
    <div class="col">
        <label class="form-label">{{ translate('Объект') }}</label>
        <select name="Purchase[{{ $count }}][object]" class="form-control object">
            <option value="1">Ecobozor</option>
            <option value="2">Chimgan</option>
            <option value="3">Chimgan Hills</option>
        </select>
    </div>
    <div class="col col_shop">
        <label class="form-label">{{ translate('Бренд/Фирма') }}</label>
        <select name="Purchase[{{ $count }}][shop]" class="form-control shop">
            @if(!empty($shops))
                @foreach($shops as $key => $value)
                    <option value="{{ $value->id }}">
                        {{ $value->name }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="col col_change">
        <label class="form-label col_sum">{{ translate('Сумма') }}</label>
        <label class="form-label col_kv d-none">{{ translate('Квадратура') }}</label>
        <input type="number" class="form-control" name="Purchase[{{ $count }}][sum]">
    </div>
</div>
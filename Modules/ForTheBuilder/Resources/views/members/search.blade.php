@php use Modules\ForTheBuilder\Entities\Constants; @endphp
<table class="table table-bordered table-striped table-sm">
        <thead>
            <tr>
                <th>№</th>
                <th>{{ translate('Дата') }}</th>
                <th>{{ translate('Ф.И.О') }}</th>
                <th>{{ translate('Номер телефона') }}</th>
                <th>{{ translate('Объект') }}</th>
                <th>{{ translate('Общая сумма') }}</th>
                <th>{{ translate('Купоны') }}</th>
                <th width="200px">{{ translate('Действия') }}</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($model) && count($model) > 0)
                @foreach($model as $key => $value)
                    <tr>
                        <td>{{ $model->firstItem() + $key }}</td>
                        <td>{{ date('d.m.Y', strtotime($value->created_at)) }}</td>
                        <td>
                            <a href="{{ route('forthebuilder.members.show',$value->id) }}">
                                {{ $value->full_name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('forthebuilder.members.show',$value->id) }}">
                                {{ $value->phone }}
                            </a>
                        </td>
                        <td>
                            @php
                                if (!empty($value->total)) {
                                    foreach ($value->total as $keyt => $valuet) {
                                        echo "<span class='badge bg-info me-1'>".$valuet->objects->name."</span>";
                                    }
                                }
                            @endphp
                        </td>
                        <td>
                            @php
                                $total_sum = 0;
                                $total_coupon = 0;
                                if (isset($value->total) && !empty($value->total)) {
                                    foreach ($value->total as $keys => $values) {
                                        $total_sum += $values->sum;
                                        $total_coupon++;
                                    }        
                                }
                                echo $total_sum;
                            @endphp
                            
                        </td>
                        <td>{{ $total_coupon }}</td>
                        <td>
                            <button data-id="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#update" class="btn btn-sm btn-success add">
                                <i class="fas fa-plus"></i>
                            </button>
                            @if(Auth::user()->role_id == Constants::ADMIN)
                                <a class="btn btn-sm btn-primary" href="{{ route('forthebuilder.members.show',$value->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-sm btn-danger delete" data-id="{{ $value->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">{{ translate('Нет данных!') }}</td>
                </tr>
            @endif
        </tbody>
    </table>
<br>
{{ $model->links() }}
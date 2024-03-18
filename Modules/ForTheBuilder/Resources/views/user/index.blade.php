@section('title')
    {{ __('locale.apartment_sale') }}
@endsection
@extends('forthebuilder::layouts.forthebuilder')
@section('content')
@include('forthebuilder::layouts.content.navigation')
@include('forthebuilder::layouts.content.header')
<style>
    .online_status{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 16px;
        height: 16px;
        border: 1px solid #0FC56A;
        border-radius: 100%;
        position: absolute;
        bottom: -18px;
        right: 2px;
        background: #FFF;
        padding: 1px;
    }
    .in_online_status{
        display: flex;
        width: 100%;
        height: 100%;
        background: #0FC56A;
        border-radius: 100%;
    }
    .offline_status{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 16px;
        height: 16px;
        border: 1px solid grey;
        border-radius: 100%;
        position: absolute;
        bottom: -18px;
        right: 2px;
        background: #FFF;
        padding: 1px;
    }
    .in_offline_status{
        display: flex;
        width: 100%;
        height: 100%;
        background: grey;
        border-radius: 100%;
    }
</style>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-9 d-flex align-items-center">                            
                            <h4 class="me-2">
                                {{ translate('Пользователи') }}
                            </h4>
                            <a href="{{ route('forthebuilder.user.create') }}" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <table id="tech-companies-1" class="table table-sm table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>{{ translate('Полное имя') }}</th>
                                <th>{{ translate('Номер телефона') }}</th>
                                <th>{{ translate('Адрес электронной почты') }}</th>
                                <th class="ps-3">{{ translate('Фото') }}</th>
                                @if(Auth::user()->role_id == 1)
                                    <th>{{ translate('Действие') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody id="response_body">
                            @if (!empty($models))
                                @foreach ($models as $key => $model)
                                <tr class="jkMiniData mt-1 hideData">
                                    <td>
                                        <input type="hidden" class="hiddenData"
                                            value="{{ $model->first_name . ' ' }} {{ $model->last_name }} {{ $model->middle_name }} {{ $model->email }}">
                                        
                                            {{ $models->firstItem() + $key }}
                                    
                                    </td>
                                    <td>
                                        
                                            {{ $model->first_name . ' ' }} {{ $model->last_name }} {{ $model->middle_name }}
                                    
                                    </td>
                                    <td>
                                        
                                            {{ $model->phone_number }}
                                    
                                    </td>
                                    <td>
                                        
                                            {{ $model->email }}
                                    
                                    </td>
                                    <td>
                                        
                                           @php
                                                if(!empty($model->avatar)){
                                                    $file_url = public_path('/uploads/user/' . $model->id . '/s_' . $model->avatar);
                                                }else{
                                                    $file_url = "";
                                                }
                                            @endphp
                                            @if (file_exists($file_url))
                                                <img class="rounded-circle img-thumbnail avatar-md" src="{{ asset('/uploads/user/' . $model->id . '/s_' . $model->avatar) }}" alt="HUman">
                                            @else
                                             @php
                                                $gender_img = 'men.png';
                                                if ($model->gender == 2) {
                                                    $gender_img = 'women.png';
                                                }
                                            @endphp
                                                <img class="rounded-circle img-thumbnail avatar-md" src="{{ asset('/backend-assets/img/'.$gender_img) }}" alt="HUman">
                                            @endif                                            
                                            
                                        </a>
                                    </td>
                                    @if(Auth::user()->role_id == 1)
                                        <td>
                                            {{-- <a href="{{ route('forthebuilder.user.edit', $model->id) }}" class="seaDiv btn btn-xs text-success" title="update">
                                                <i class="far fa-edit mdi-20"></i>
                                            </a> --}}
                                            @if(Auth::user()->id != $model->id)
                                                <form style="display: inline-block;" action="{{ route('forthebuilder.user.destroy', $model->id) }}" method="POST">@csrf @method('DELETE')
                                                    <button type="submit" class="seaDiv btn btn-xs text-danger" title="delete">
                                                        <i class="fe-trash-2 mdi-20"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <br>
                    {{ $models->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
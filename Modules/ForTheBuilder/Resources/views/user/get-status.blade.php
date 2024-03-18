@if (!empty($models))
    @foreach ($models as $key => $model)
    <tr class="jkMiniData mt-1 hideData">
        <td>
            <input type="hidden" class="hiddenData"
                value="{{ $model->first_name . ' ' }} {{ $model->last_name }} {{ $model->middle_name }} {{ $model->email }}">
            <a href="{{ route('forthebuilder.user.show', $model->id) }}" class="polzovatelNumber">
                {{ $models->firstItem() + $key }}
            </a>
        </td>
        <td>
            <a href="{{ route('forthebuilder.user.show', $model->id) }}" class="polzovatelFioElectronieAddres2">
                {{ $model->first_name . ' ' }} {{ $model->last_name }} {{ $model->middle_name }}
            </a>
        </td>
        <td>
            <a href="{{ route('forthebuilder.user.show', $model->id) }}" class="polzovatelFioElectronieAddres2">
                {{ $model->email }}
            </a>
        </td>
        <td>
            <a href="{{ route('forthebuilder.user.show', $model->id) }}" class="pozovatelFoto2 position-relative">
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

                @if($model->last_seen > time())
                    <span class="online_status">
                        <span class="in_online_status"></span>
                    </span>
                @else
                    <span class="offline_status">
                        <span class="in_offline_status"></span>
                    </span>
                @endif

                
            </a>
        </td>
        <td>
            <a href="{{ route('forthebuilder.user.edit', $model->id) }}" class="seaDiv btn btn-xs text-success" title="update">
                <i class="far fa-edit mdi-20"></i>
            </a>
            <form style="display: inline-block;" action="{{ route('forthebuilder.user.destroy', $model->id) }}" method="POST">@csrf @method('DELETE')
                <button type="submit" class="seaDiv btn btn-xs text-danger" title="delete">
                    <i class="fe-trash-2 mdi-20"></i>
                </button>
            </form>
        </td>
    @endforeach
@endif
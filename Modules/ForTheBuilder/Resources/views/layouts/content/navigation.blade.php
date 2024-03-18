@php
    $current_user = \Illuminate\Support\Facades\Auth::user();
    use Modules\ForTheBuilder\Entities\Constants;
    $acton = request()->route()->getAction()['as'];
    
@endphp

<style>
    .simplebar-content #sidebar-menu #side-menu .list a,
    .simplebar-content #sidebar-menu #side-menu .list a i{
        font-size: 18px !important;
    }
</style>

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu" style="top: 0;z-index: 1049;">

    <div class="h-100" data-simplebar>
         <!-- User box -->
        <div class="user-box text-center">
            @if($current_user->role_id != Constants::SUPERADMIN)
                @if(isset($current_user->id))
                    @php
                        $sms_avatar = public_path('/uploads/user/' . $current_user->id . '/s_' . $current_user->avatar);
                        if($current_user->gender == 2)
                            $image = 'women.png';
                        else
                            $image = 'men.png';
                    @endphp
                    @if(file_exists($sms_avatar))
                        <img src="{{ asset('/uploads/user/' . $current_user->id . '/s_' . $current_user->avatar) }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">

                    @else
                        <img src="{{ asset('/backend-assets/img/'.$image) }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                    @endif
                @else
                    <img src="{{ asset('/backend-assets/img/'.$image) }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                @endif
            @else
                <img src="{{ asset('/backend-assets/img/superadmin.png') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            @endif

            
            
                <div class="dropdown">
                    <a href="{{ route('forthebuilder.user.show', $current_user->id) }}" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false">{{ $current_user->first_name }} {{ $current_user->last_name }}</a>
                </div>

            
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a class="btn p-1 text-danger" data-bs-toggle="modal" data-bs-target="#logout">
                        <i class="mdi mdi-power mdi-20"></i>
                    </a>
                </li>
            </ul>



        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li data="{{ $acton }}" class="list {{ ((
                    $acton == 'forthebuilder.home.index' || 
                    $acton == 'forthebuilder.home.filtr'

                    ) ? 'menuitem-active' : '') }}">
                    <a href="{{ route('forthebuilder.home.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>{{ translate('Главная') }}</span>
                    </a>
                </li>

                <li data="{{ $acton }}" class="list {{ ((
                    $acton == 'forthebuilder.members.index' ||
                    $acton == 'forthebuilder.members.create' ||
                    $acton == 'forthebuilder.members.show'
                    ) ? 'menuitem-active' : '') }}">
                    <a href="{{ route('forthebuilder.members.index') }}">
                        <i class="mdi mdi-account-multiple-plus-outline"></i>
                        <span>{{ translate('Участники') }}</span>
                    </a>
                </li>

                @if($current_user->role_id == 1)
                    <li data="{{ $acton }}" class="list {{ ((
                        $acton == 'forthebuilder.shops.index' ||
                        $acton == 'forthebuilder.shops.create' ||
                        $acton == 'forthebuilder.shops.show'
                        ) ? 'menuitem-active' : '') }}">
                        <a href="{{ route('forthebuilder.shops.index') }}">
                            <i class="mdi mdi-home-currency-usd"></i>
                            <span>{{ translate('Магазины') }}</span>
                        </a>
                    </li>

                    <li data="{{ $acton }}" class="list {{ ((
                        $acton == 'forthebuilder.user.index'
                        ) ? 'menuitem-active' : '') }}">
                        <a href="{{ route('forthebuilder.user.index') }}">
                            <i class="mdi mdi-account-group-outline"></i>
                            <span>{{ translate('Пользователи') }}</span>
                        </a>
                    </li>
                @endif    
                
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logout"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: none;">
            <div class="modal-body text-center">
                <h4 class="modalVideystvitelno">{{ translate('Do you really want to logout') }}</h4>
                <div class="d-flex justify-content-center mt-3 align-items-baseline">
                    <form style=""
                          action="{{ route('logout') }}"
                          method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="modalVideystvitelnoDa btn btn-outline-success me-2">{{ translate('Yes') }}</button>
                    </form>
                    <button class="modalVideystvitelnoNet btn btn-outline-danger" data-bs-dismiss="modal">{{ translate('No') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>


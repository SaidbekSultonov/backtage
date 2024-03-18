<style>
    .display-none {
        display: none;
    }

    .notification_content {
        position: absolute;
        z-index: 100;
    }

    .language_flag {
        position: absolute;
        z-index: 1;
        margin-top: 70px;
    }
    .w-400{
        width: 400px;
    }
    .app-search{
        max-width: 100% !important;
    }
    .simplebar-content a:nth-child(even){
        background: #F1F1F1;
    }
    .font-20{
        font-size: 24px !important;
    }
    .noti-icon-badge{
        width: 18px !important;
        height: 18px !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }
</style>
<!-- Topbar Start -->
<div class="navbar-custom bg-light">
    <ul class="list-unstyled topnav-menu float-end mb-0">
        
        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    @php
                        if (session()->has('locale')) {
                            $locale = session('locale');
                        } else {
                            $locale = env('DEFAULT_LANGUAGE', 'ru');
                        }
                    @endphp
                    {{-- @switch($locale) --}}
                        {{-- @case('uz')
                            <img class="rounded-circle" id="selected_language"
                            src="{{ asset('/backend-assets/forthebuilders/images/region.png') }}" alt="region">
                            <span class="pro-user-name ms-1">
                                {{ translate('Uzbek') }}
                                 <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        @break --}}
                        {{-- @case('ru') --}}
                            <img class="rounded-circle" id="selected_language"
                                src="{{ asset('/backend-assets/forthebuilders/images/RU.png') }}" alt="region">
                                <span class="pro-user-name ms-1">
                                    {{ translate('Русский') }}
                                    {{-- <i class="mdi mdi-chevron-down"></i>  --}}
                            </span>
                        {{-- @break --}}
                    {{-- @endswitch --}}
                

                
            </a>
           {{--  <div id="lang-change" class="dropdown-menu dropdown-menu-end profile-dropdown">
                @foreach (\Modules\ForTheBuilder\Entities\Language::all() as $key => $language)
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="false" aria-expanded="false" data-flag="{{ $language->code }}"> --}}
                    {{-- @switch($language->code) --}}
                        {{-- @case('uz')
                            <img class="rounded-circle" id="lang_uz" src="{{asset('/backend-assets/forthebuilders/images/region.png')}}" alt="region">
                            {{ $language->name }}
                            @break --}}

                            {{-- @case('ru') --}}
                               {{--  <img class="rounded-circle" id="lang_ru"
                                    src="{{ asset('/backend-assets/forthebuilders/images/RU.png') }}" alt="region">
                                {{ $language->name }} --}}
                            {{-- @break --}}
                        {{-- @endswitch --}}
                    {{-- </a> --}}
                {{-- @endforeach --}}
            {{-- </div> --}}
        </li>

        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link nav-link3 right-bar-toggle waves-effect waves-light">
                <i class="mdi mdi-circle-half-full mdi-20"></i>
            </a>
        </li>

    </ul>
    <div class="clearfix"></div> 
</div>




<script src="{{ asset('/backend-assets/forthebuilders/javascript/jquery-3.6.1.js') }}"></script>
<script src="{{ asset('/backend-assets/js/custom.js') }}"></script>
<script defer>
    $(document).ready(function() {
        let language = '{{ $locale }}'
        let uz = `{{ asset('/backend-assets/forthebuilders/images/region.png') }}`
        let ru = `{{ asset('/backend-assets/forthebuilders/images/RU.png') }}`
        let en = `{{ asset('/backend-assets/forthebuilders/images/GB.png') }}`

        

        if ($('#lang-change>a').length > 0) {
            $('#lang-change>a').each(function() {
                $(this).on('click', function(e) {
                    e.preventDefault();
                    var $this = $(this);
                    var locale = $this.data('flag');
                    switch (locale) {
                        // case 'uz':
                        //     $('#selected_language').attr('src', uz)
                        //     break;
                        case 'ru':
                            $('#selected_language').attr('src', ru)
                            break;
                    }
                    $.post('{{ route('language.change') }}', {
                        _token: '{{ csrf_token() }}',
                        locale: locale
                    }, function(data) {
                        location.reload();
                    });

                });
            });
        }
    })
</script>

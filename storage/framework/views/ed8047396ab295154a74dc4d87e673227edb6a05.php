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
                    <?php
                        if (session()->has('locale')) {
                            $locale = session('locale');
                        } else {
                            $locale = env('DEFAULT_LANGUAGE', 'ru');
                        }
                    ?>
                    
                        
                        
                            <img class="rounded-circle" id="selected_language"
                                src="<?php echo e(asset('/backend-assets/forthebuilders/images/RU.png')); ?>" alt="region">
                                <span class="pro-user-name ms-1">
                                    <?php echo e(translate('Русский')); ?>

                                    
                            </span>
                        
                    
                

                
            </a>
           
                    
                        

                            
                               
                            
                        
                    
                
            
        </li>

        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link nav-link3 right-bar-toggle waves-effect waves-light">
                <i class="mdi mdi-circle-half-full mdi-20"></i>
            </a>
        </li>

    </ul>
    <div class="clearfix"></div> 
</div>




<script src="<?php echo e(asset('/backend-assets/forthebuilders/javascript/jquery-3.6.1.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/js/custom.js')); ?>"></script>
<script defer>
    $(document).ready(function() {
        let language = '<?php echo e($locale); ?>'
        let uz = `<?php echo e(asset('/backend-assets/forthebuilders/images/region.png')); ?>`
        let ru = `<?php echo e(asset('/backend-assets/forthebuilders/images/RU.png')); ?>`
        let en = `<?php echo e(asset('/backend-assets/forthebuilders/images/GB.png')); ?>`

        

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
                    $.post('<?php echo e(route('language.change')); ?>', {
                        _token: '<?php echo e(csrf_token()); ?>',
                        locale: locale
                    }, function(data) {
                        location.reload();
                    });

                });
            });
        }
    })
</script>
<?php /**PATH /Users/user/Desktop/laravel/new/Modules/ForTheBuilder/Resources/views/layouts/content/header.blade.php ENDPATH**/ ?>
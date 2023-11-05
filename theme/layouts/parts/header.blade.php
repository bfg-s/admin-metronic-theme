<!--begin::Header-->
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default" @updateWithPjax>
                <!--begin::Header Nav-->
                <ul class="menu-nav">

                    <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here" data-menu-toggle="click" aria-haspopup="true">
                        <a class="menu-link menu-toggle" href="javascript:void(0)" role="button"
                           data-click="back" title="@lang('admin.back')">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </li>

                    <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here" data-menu-toggle="click" aria-haspopup="true">
                        <a class="menu-link menu-toggle" href="javascript:void(0)" role="button"
                           data-click="reload" title="@lang('admin.refresh')">
                            <i class="fas fa-redo-alt"></i>
                        </a>
                    </li>
                    @if(admin_repo()->getCurrentQuery && count(admin_repo()->getCurrentQuery))
                        <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here" data-menu-toggle="click" aria-haspopup="true">
                            <a class="menu-link menu-toggle" href="javascript:void(0)" role="button"
                               data-click="location" data-param="{{url()->current()}}" title="@lang('admin.reset_page')">
                                <i class="fas fa-retweet"></i>
                            </a>
                        </li>
                    @endif

                    @foreach(admin_repo()->menuList->where('left_nav_bar_view') as $menu)
                        @if(View::exists($menu->getLeftNavBarView()))
                            @include($menu->getLeftNavBarView(), $menu->getParams())
                        @else
                            {!! new ($menu->getLeftNavBarView())(...$menu->getParams()); !!}
                        @endif
                    @endforeach
                </ul>
                <!--end::Header Nav-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->

        @include(admin_template('layouts.parts.live-reload'))

        <!--begin::Topbar-->
        <div class="topbar">

            <span  @updateWithPjax>
                @foreach(admin_repo()->menuList->where('nav_bar_view')->where('prepend', false) as $menu)
                    @if(View::exists($menu->getNavBarView()))
                        @include($menu->getNavBarView(), $menu->getParams())
                    @else
                        {!! new ($menu->getNavBarView())(...$menu->getParams()); !!}
                    @endif
                @endforeach
            </span>

            @include(admin_template('layouts.parts.global-search'))

            <div class="topbar-item" @updateWithPjax>
                @foreach(admin_repo()->menuList->where('badge')->where('link') as $menu)
                    @php
                        $badge = $menu->getBadge();
                        $counter = isset($badge['instructions']) && $badge['instructions'] ?
                            eloquent_instruction($badge['text'], $badge['instructions'])->count() :
                            $badge['text'];
                        $link = $menu->getLink() ? (isset($badge['params']) ? makeUrlWithParams($menu->getLink(), $badge['params']) : $menu->getLink()) : 'javascript:void(0)';
                    @endphp
                    @if($counter)
                        <a class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1" href="{{$link}}" role="button" data-turbolinks="false"
                           title="{{__($badge['title'] ?? $menu->getTitle())}}">
                            @if($menu->getIcon())
                                <i class="{{ $menu->getIcon() }}"></i>
                            @endif
                            <span class="badge badge-{{$badge['type'] ?? 'info'}} navbar-badge">{{$counter}}</span>
                        </a>
                    @endif
                @endforeach
            </div>

            <!--begin::Chat-->
            <div class="topbar-item">

                <a class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1" href="javascript:void(0)" role="button" data-turbolinks="false" x-data="toggleDark('{{ route('admin.toggle_dark') }}')" x-on:click="toggle"
                   title="{{ admin_repo()->isDarkMode ? 'Light' : 'Dark' }} mode">
                    @if(admin_repo()->isDarkMode)
                        <i class="fas fa-sun"></i>
                    @else
                        <i class="fas fa-adjust"></i>
                    @endif
                </a>

            </div>

            <span @updateWithPjax>
                @foreach(admin_repo()->menuList->where('nav_bar_view')->where('prepend', true) as $menu)
                    @if(View::exists($menu->getNavBarView()))
                        @include($menu->getNavBarView(), $menu->getParams())
                    @else
                        {!! new ($menu->getNavBarView())(...$menu->getParams()); !!}
                    @endif
                @endforeach
            </span>

            <!--end::Chat-->
            @if(config('admin.lang_mode', true))
            <!--begin::Languages-->
            <div class="dropdown" @updateWithPjax>
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                        <i class="h-20px w-20px rounded-sm flag-icon flag-icon-{{ App::getLocale() === 'en' ? 'us' : App::getLocale() }}"></i>
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Nav-->
                    <ul class="navi navi-hover py-4">
                        @foreach(config('admin.languages', ['en', 'uk', 'ru']) as $lang)
                        <!--begin::Item-->
                        <li class="navi-item">
                            <a href="{{remake_lang_url($lang)}}" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <i class="flag-icon flag-icon-{{$lang === 'en' ? 'us' : $lang}}"></i>
                                </span>
                                <span class="navi-text">{{strtoupper($lang)}}</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        @endforeach
                    </ul>
                    <!--end::Nav-->
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Languages-->
            @endif

                <div class="topbar-item">

                    <a class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1" href="{{url('/')}}" role="button" data-turbolinks="false"
                       title="{{__('admin.open_homepage_in_new_tab')}}">
                        <i class="fas fa-external-link-square-alt"></i>
                    </a>

                </div>

            <!--begin::User-->
            <div class="topbar-item">
                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ admin_user()->name }}</span>
                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                        <img src="{{asset(admin_user()->avatar)}}" class="img-circle elevation-2" alt="{{admin_user()->name}}">
                    </span>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->

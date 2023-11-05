<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include(admin_template('layouts.parts.head'))
    @adminSystemStyles()
    <link href="{{ asset('metronic/css/pages/login/classic/login-5.css') }}" rel="stylesheet" type="text/css" />
    @adminSystemCss()
    @adminSystemJsVariables()
</head>
<body @class(['dark-mode' => admin_repo()->isDarkMode, 'header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading']) id="admin-content">


    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{ asset('metronic/media/bg/bg-2.jpg') }});">
                <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                    @yield('content')
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
    <script>
        var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };
    </script>
    @adminSystemScripts()
    @adminSystemJs()
</body>
</html>

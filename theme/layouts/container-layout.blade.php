<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include(admin_template('layouts.parts.head'))
    @adminSystemStyles()
    @adminSystemCss()
    @adminSystemJsVariables()
</head>
<body @class(['dark-mode' => admin_repo()->isDarkMode, 'header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading'])>

    @include(admin_template('layouts.parts.header-mobile'))

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            @include(admin_template('layouts.parts.modals'))
            @include(admin_template('layouts.parts.aside'))
            <div class="d-flex flex-column flex-row-fluid wrapper">
                @include(admin_template('layouts.parts.header'))
                <div class="content d-flex flex-column flex-column-fluid" id="admin-content">
                    @include(admin_template('layouts.parts.container-header'))
                    <div class="d-flex flex-column-fluid">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                </div>
                @include(admin_template('layouts.parts.footer'))
            </div>
        </div>
    </div>

    @include(admin_template('layouts.parts.user-panel'))
    @include(admin_template('layouts.parts.scroll-to-top'))

    <script>
        var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };
    </script>

    @adminSystemScripts()
    @adminSystemJs()
</body>
</html>

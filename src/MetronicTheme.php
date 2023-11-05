<?php

namespace Bfg\AdminMetronicTheme;

use Admin\Themes\Theme;

class MetronicTheme extends Theme
{
    /**
     * @var string
     */
    protected string $name = 'Metronic v7.1.2';

    /**
     * @var string
     */
    protected string $description = 'The World’s #1 Bootstrap 4 HTML, Angular 10, React, VueJS & Laravel Admin Dashboard Theme.';

    /**
     * @var string
     */
    protected string $viewVariable = 'admin-metronic::';

    /**
     * @var string|null
     */
    protected ?string $namespace = 'admin-metronic';

    /**
     * @var string|null
     */
    protected ?string $directory = __DIR__ . '/../theme';

    /**
     * @var string
     */
    protected string $slug = 'metronic';

    /**
     * @var array|string[]
     */
    protected array $styles = [
        'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700',
        'metronic/plugins/custom/fullcalendar/fullcalendar.bundle.css',
        'metronic/plugins/global/plugins.bundle.css',
        'metronic/plugins/custom/prismjs/prismjs.bundle.css',
        'metronic/css/style.bundle.css',
        'metronic/css/app.css',
    ];

    /**
     * @var array|string[]
     */
    protected array $firstScripts = [
        'metronic/plugins/global/plugins.bundle.js',
        'metronic/plugins/custom/prismjs/prismjs.bundle.js',
        'metronic/js/scripts.bundle.js',
        'metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js',
        'metronic/js/pages/widgets.js',
    ];


    /**
     * @var array
     */
    protected array $scripts = [

    ];

    public function __construct()
    {
        if (admin_repo()->isDarkMode) {
            $this->styles[] = 'metronic/css/themes/layout/header/base/light.css';
            $this->styles[] = 'metronic/css/themes/layout/header/menu/light.css';
            $this->styles[] = 'metronic/css/themes/layout/brand/dark.css';
            $this->styles[] = 'metronic/css/themes/layout/aside/dark.css';
        } else {
            $this->styles[] = 'metronic/css/themes/layout/header/base/light.css';
            $this->styles[] = 'metronic/css/themes/layout/header/menu/light.css';
            $this->styles[] = 'metronic/css/themes/layout/brand/light.css';
            $this->styles[] = 'metronic/css/themes/layout/aside/light.css';
        }
    }

    /**
     * @return string
     */
    public function js(): string
    {
        return <<<JS
KTLayoutAsideMenu.init('kt_aside_menu');
JS;

    }
}

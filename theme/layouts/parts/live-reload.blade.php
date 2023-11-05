<div class="header-menu-wrapper header-menu-wrapper-left">
    <div class="header-menu header-menu-mobile header-menu-layout-default" x-data="liveReloader">
        <ul class="menu-nav">
            <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here" data-menu-toggle="click" aria-haspopup="true">
                <a class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1" href="javascript:void(0)" role="button" data-turbolinks="false" @click="pp"  title="Live reloader">
                    <i :class="{fas: true, 'fa-play': !play, 'fa-pause': play}"></i>
                </a>
            </li>
            <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here">
                <button aria-expanded="false" bind:disabled="play" aria-haspopup="true" class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1"
                        data-reference="parent" data-toggle="dropdown" style="padding-left: 0; padding-bottom: 0" type="button">
                    <span x-text="interval"></span> <span class="d-none d-lg-inline d-xl-inline">sec</span>
                </button>
                <div :class="{'dropdown-menu': true}">
                    <template x-for="(i,k) in intervals">
                        <a :key="k" :class="{'dropdown-item': true, active: interval===i}"
                           href="javascript:void(0)" @click="si(i)">
                            <span x-text="i"></span> sec
                        </a>
                    </template>
                </div>
            </li>
        </ul>
    </div>
</div>

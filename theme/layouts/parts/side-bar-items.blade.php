@foreach(($items ?? admin_repo()->menuList->where('parent_id', 0)) as $menu)

    @php
        $access = !$menu->getRoles() || admin_user()->hasRoles($menu->getRoles());
        $child = $menu->getChild();
        $hasChild = $child && $child->isNotEmpty();
        $hasChildSelected = $hasChild && $child->where('selected', true)->count();
        $badge = $menu->getBadge();
        $selected = $menu->isSelected() || $hasChildSelected;
    @endphp

    @if($menu->isActive() && $access)

        <li @class(['menu-item', 'menu-item-open' => $hasChild && $selected, 'menu-item-active' => $selected, 'menu-item-submenu' => $hasChild]) @if($hasChild) aria-haspopup="true" data-menu-toggle="hover" @endif>

            <a href="{{$menu->getLink() ?: 'javascript:void(0)'}}"
               @if($menu->getDontUseSearch()) data-ignore="1" @endif
               @if($menu->isTarget()) target="_blank"
               @endif @class(['menu-link', 'menu-toggle' => $hasChild])>

                @if ($menu->getIcon())
                    <span class="svg-icon menu-icon">
                        <i class="{{$menu->getIcon()}}"></i>
                    </span>
                @endif

                <span class="menu-text">@lang($menu->getTitle())</span>

                    @if (is_array($badge))

                        <span
                            class="menu-label"
                            id="nav_badge_{{isset($badge['id']) && $badge['id'] ? $badge['id'] : $menu->getId()}}"
                            {!! isset($badge['title']) ? "title='{$badge['title']}'" : "" !!}
                        >
                            <span class="label label-rounded label-{{$badge['type'] ?? 'info'}}">
                                @if(isset($badge['instructions']) && $badge['instructions'])
                                    {{eloquent_instruction($badge['text'], $badge['instructions'])->count()}}
                                @else
                                    {{isset($badge['text']) ? __($badge['text']) : 0}}
                                @endif
                            </span>
                        </span>

                    @elseif(isset($badge))

                        <span class="menu-label" id="nav_badge_{{$menu->getId()}}">
                            <span class="label label-rounded label-info">@lang($badge)</span>
                        </span>

                    @elseif($hasChild)

                        @php
                            $with_badges = 0
                        @endphp

                        @if($with_badges)
                            <span class="menu-label">
                                <span class="label label-rounded label-info">{{$with_badges}}</span>
                            </span>
                        @endif

                        <i class="menu-arrow"></i>

                    @endif
            </a>

            @if($hasChild)
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        @include(admin_template('layouts.parts.side-bar-items'), ['items' => $child, 'nes' => true])
                    </ul>
                </div>
            @endif
        </li>

    @elseif($menu->getMainHeader())
        <li class="menu-section">
            <h4 class="menu-text">@lang($menu->getMainHeader())</h4>
            <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
    @endif
@endforeach

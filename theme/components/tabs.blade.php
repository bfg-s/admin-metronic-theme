<div
    @class(array_merge([], $classes))
    @attributes($attributes)
>
    <ul class="nav nav-tabs" role="tablist">
        @foreach($tabs as $tab)
            <li class="nav-item">
                <a
                    href="#{{ $tab['id'] }}"
                    @class(['nav-link', 'active' => $tab['active']])
                    id="{{ $tab['id'] }}-label"
                    data-toggle="pill"
                    role="tab"

                    aria-selected="{{ $tab['active'] ? 'true' : 'false' }}"
                >
                    @if($tab['icon'])
                        <i class="{{ $tab['icon'] }} mr-1"></i>
                    @endif
                    @lang($tab['title'])
                </a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content">
        @foreach($tabs as $tab)
            {!! $tab['content'] !!}
        @endforeach
    </div>
</div>

<div
    @class(array_merge(['card card-custom card-stretch gutter-b', "card-{$type}"], $classes))
    @attributes($attributes)
>
    <div class="card-header border-0 mt-4">
        @if($headerObj) {!! $headerObj !!} @endif

        <h3 class="card-title">
            @if($icon)
                <i class="{{ $icon }} mr-1"></i>
            @endif
            {!! preg_replace_callback('/\:([a-zA-Z0-9\_\-\.]+)/', static function ($m) use ($model) {
                return multi_dot_call($model, $m[1]);
            }, __($title)) !!}
        </h3>

        <div class="card-toolbar">

            @foreach ($groups as $group)
                {!! $group !!}
            @endforeach

{{--            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Toggle Card">--}}
{{--                <i class="ki ki-arrow-down icon-nm"></i>--}}
{{--            </a>--}}
{{--            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary" data-card-tool="remove" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Card">--}}
{{--                <i class="ki ki-close icon-nm"></i>--}}
{{--            </a>--}}
        </div>
    </div>
    @foreach($contents as $content)
        {!! $content !!}
    @endforeach

    @if($footerResult = $footer())
        {!! $footerResult !!}
    @endif
</div>

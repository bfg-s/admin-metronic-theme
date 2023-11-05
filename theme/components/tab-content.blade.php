<div @class(array_merge(['tab-pane', 'p-5'], $classes)) @attributes($attributes) role="tabpanel">
    @foreach($contents as $content)
        {!! $content !!}
    @endforeach
</div>

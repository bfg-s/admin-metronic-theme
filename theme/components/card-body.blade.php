<div
    @class(array_merge(['card-body', 'table-responsive' => $tableResponsive], $classes))
    @attributes($attributes)
>
{{--    'p-0 m-0' => $foolSpace--}}
    @foreach($contents as $content)
        {!! $content !!}
    @endforeach
</div>

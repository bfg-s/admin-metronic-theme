<form method="get" action="{{ $action }}" @class($classes) @attributes($attributes)>
    @foreach($chunks as $chunk)
        <div class="row">
            @foreach($chunk as $field)
                <div class="pl-0 col-md ml-3 mr-3">{!! $field['class'] !!}</div>
            @endforeach
        </div>
    @endforeach
    <div class="text-right">
        {!! $group !!}
    </div>
</form>

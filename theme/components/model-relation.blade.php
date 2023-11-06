<div
    @class(array_merge(['card card-custom card-stretch gutter-b'], $classes))
    @attributes($attributes)
>
    @if($title)
        <div class="card-header card-header border-0 mt-4">

            <h3 class="card-title align-items-start flex-column">
                {{ $title }}
            </h3>
        </div>
    @endif
    <div class="card-body" @if($ordered) data-load="admin::model_relation_ordered" data-params="{{ $ordered }}" @endif @if($tpl) data-tpl="{{ $tpl }}" @endif>
        @foreach($contents as $content)
            {!! $content !!}
        @endforeach
    </div>
    @if ($buttons)
        <div class="card-footer">
            <div class="row">
                <div class="col text-right">
                    {!! $buttons !!}
                </div>
            </div>
        </div>
    @endif
</div>

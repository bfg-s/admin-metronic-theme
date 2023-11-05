<div
        @class(array_merge(['timeline timeline-6 mt-3'], $classes))
        @attributes($attributes)
>
    {!! $prepend !!}
    @foreach ($paginate as $model)
        <div class="timeline-item align-items-start">
            @if($model[$order_field] instanceof Carbon && $model[$order_field]->day == 1)
                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">
                    {{ $model[$order_field]->toDateTimeString() }}
                </div>
            @else
                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">
                    {{ $model[$order_field] ? beautiful_date_time($model[$order_field]) : '' }}
                </div>
            @endif
            @if($iconShow = (is_callable($icon) ? call_user_func($icon, $model) : $icon))
                <div class="timeline-badge">
                    <i class="{!! $iconShow !!} icon-xl" style="padding: 3px;border-radius: 10px 10px 10px 10px;"></i>
                </div>
            @else
                <div class="timeline-badge">
                    <i class="fas fa-lightbulb text-warning icon-xl" style="padding: 3px;border-radius: 10px 10px 10px 10px;"></i>
                </div>
            @endif
            <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">

                @if($title)
                    <h3 class="timeline-header">{!! is_callable($title) ? call_user_func($title, $model) : $title !!}</h3>
                @endif
                @if($body)
                    <div @class(['timeline-body', 'p-0' => $full_body])>
                        {!! is_callable($body) ? call_user_func($body, $model) : $body !!}
                        @foreach($contents as $content)
                            {!! $content !!}
                        @endforeach
                    </div>
                @endif
                @if($footer)
                    <div class="timeline-footer">{!! is_callable($footer) ? call_user_func($footer, $model) : $footer !!}</div>
                @endif
            </div>
        </div>
    @endforeach
    @if ($paginate->lastPage() == $paginate->currentPage())
        <div><i class="fas fa-clock bg-gray"></i></div>
    @endif
    {!! $append !!}
    @if ($paginateFooter)
        {!! $paginateFooter !!}
    @endif
</div>

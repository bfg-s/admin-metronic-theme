<div class="d-flex flex-column w-100 mr-2">
    @if($text)
        <div class="d-flex align-items-center justify-content-between mb-2">
            <span class="text-muted mr-2 font-size-sm font-weight-bold">{{ explode('.', round($value))[0] . '% ' }}</span>
            <span class="text-muted font-size-sm font-weight-bold">{{ $text }}</span>
        </div>
    @endif
    <div class="progress progress-xs w-100">
        <div class="progress-bar bg-info" role="progressbar" style="width: {{ $value }}%;" aria-valuenow="{{ $value }}" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>

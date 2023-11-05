@extends(admin_template('layouts.container-layout'))

@section('content')
    <div style="flex-wrap: wrap;">
        @foreach($contents as $content)
            {!! $content !!}
        @endforeach
    </div>
@endsection

{{--display: -webkit-box;--}}
{{--display: -ms-flexbox;--}}
{{--display: flex;--}}
{{---ms-flex-wrap: wrap;--}}
{{--flex-wrap: wrap;--}}
{{--margin-right: -12.5px;--}}
{{--margin-left: -12.5px;--}}

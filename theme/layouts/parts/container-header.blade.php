<!-- Content Header (Page header) -->
@php
    $menu = admin_repo()->now;
    $__head_title = ['Admin']
@endphp

    <!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            @if(isset($page_info))
                @if(is_array($page_info))
                    @if(isset($page_info['icon']))
                        <i class="{{$page_info['icon']}}"></i>
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200 ml-5"></div>
                    @elseif($menu && $menu->getIcon())
                        <i class="{{$menu->getIcon()}}"></i>
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200 ml-5"></div>
                    @endif
                @else
                    @if($menu && $menu->getIcon())
                        <i class="{{$menu->getIcon()}}"></i>
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200 ml-5"></div>
                    @endif
                @endif
            @else
                @if($menu->getIcon())
                    <i class="{{$menu->getIcon()}}"></i>
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200 ml-5"></div>
                @endif
            @endif
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                @if(isset($page_info))
                    @if(is_array($page_info))
                        {!! __($page_info['head_title'] ?? ($page_info['title'] ?? ($menu?->getHeadTitle() ?? ($menu?->getTitle() ?? 'Blank page')))) !!}
                    @else
                        {{__($page_info)}}
                    @endif
                @else
                    {!! __($menu->getHeadTitle() ?? ($menu->getTitle() ?? 'Blank page')) !!}
                @endif
            </h5>
            <!--end::Page Title-->

        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            @php($first = admin_repo()->menuList->first())
            <ol class="breadcrumb float-sm-right mt-0 mb-0">

                <li class="breadcrumb-item active">
                    {{ config('app.name') }}
                </li>
                @if ($first['title'])
                    <li class="breadcrumb-item">
                        {!! __($first['title']) !!}
                    </li>
                @endif

                @if (isset($breadcrumb) && is_array($breadcrumb) && count($breadcrumb))
                    @foreach($breadcrumb as $item)
                        @if (is_array($item))
                            @foreach($item as $i)
                                <li class="breadcrumb-item {{$loop->last ? '' : 'active'}}">
                                    {!! __($i) !!}
                                    @php($__head_title[] = __($i))
                                </li>
                            @endforeach
                        @else
                            <li class="breadcrumb-item {{$loop->last ? '' : 'active'}}">
                                {!! __($item) !!}
                                @php($__head_title[] = __($item))
                            </li>
                        @endif
                    @endforeach
                @else
                    @if (admin_repo()->nowParents->count() && $first['id'] !== $menu->getId())

                        @foreach(admin_repo()->nowParents->reverse() as $item)
                            <li class="breadcrumb-item {{$loop->last ? '' : 'active'}}">
                                {!! __($item['title']) !!}
                                @php($__head_title[] = __($item['title']))
                            </li>
                        @endforeach
                    @endif
                @endif
            </ol>
        </div>
        <!--end::Toolbar-->
    </div>
</div>
<!--end::Subheader-->

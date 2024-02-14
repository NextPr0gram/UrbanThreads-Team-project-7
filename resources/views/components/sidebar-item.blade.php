@props(['href', 'title'])

@php
    // Get the current route or channel
    $currentRoute = \Request::route()->getName();
@endphp

<a href="{{ route($href) }}" class=" my-[5px] group flex items-center hover:bg-neutral-20 duration-150 ease-in-out rounded-sm active:bg-secondary-50 @if (Str::startsWith($currentRoute, $href)) bg-secondary-50 text-secondary-500 @else bg-white @endif">
    <div class="aspect-square w-8 rounded-sm flex items-center justify-center group-active:bg-secondary-500 @if (Str::startsWith($currentRoute, $href)) bg-secondary-500 @else bg-primary-50 @endif">
        <img class="@if (Str::startsWith($currentRoute, $href)) hidden @endif group-active:hidden" src="{{ asset("icons/admin-dashboard/bar-chart-icon.svg") }}" alt="">
        <img class="@if (Str::startsWith($currentRoute, $href)) @else hidden @endif group-active:block" src="{{ asset("icons/admin-dashboard/bar-chart-icon-white.svg") }}" alt="">
    </div>
    <div class="pl-2 active:text-secondary-500">{{ $title }}</div>
</a>





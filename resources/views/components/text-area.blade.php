@props(['disabled' => false, 'adminDashboard' => false])

@if ($adminDashboard)
    <textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' =>
            'border border-1 border-neutral-60 p-2 bg-transparent text-black h-11 focus:border-secondary-300 focus:ring-secondary-300 rounded-sm placeholder:text-neutral-60 placeholder:text-base',
    ]) !!}></textarea>
@else
    <textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' =>
            'border border-1 border-neutral-60 p-2 bg-transparent text-black h-11 focus:border-primary-300 focus:ring-primary-300 rounded-sm placeholder:text-neutral-60 placeholder:text-base',
    ]) !!}></textarea>
@endif

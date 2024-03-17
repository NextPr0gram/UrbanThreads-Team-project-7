@props(['disabled' => false, 'adminDashboard' => false])

@if ($adminDashboard)
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' =>
            'border border-1 border-neutral-60 text-base  bg-transparent focus:ring-0 text-neutral-900 h-[2.375rem] sm:h-10 md:h-11 focus:border-secondary-300 focus:border-2 placeholder:text-neutral-60 placeholder:text-base  rounded-sm',
    ]) !!}>
@else
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' =>
            'border border-1 border-neutral-60 text-base  bg-transparent focus:ring-0 text-neutral-900 h-[2.375rem] sm:h-10 md:h-11 focus:border-primary-300 focus:border-2 placeholder:text-neutral-60 placeholder:text-base  rounded-sm',
    ]) !!}>
@endif

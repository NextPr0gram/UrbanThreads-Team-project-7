@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border border-3 border-bluish-purple p-2 bg-transparent text-black h-11 focus:border-blue-500 focus:ring-blue-500']) !!}></textarea>

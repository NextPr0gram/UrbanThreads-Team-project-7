@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-neutral-900 text-base ']) }}>
    {{ $value ?? $slot }}
</label>

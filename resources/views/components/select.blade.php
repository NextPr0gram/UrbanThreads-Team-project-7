<!-- resources/views/components/select.blade.php -->

<select {{ $attributes->merge(['class' => 'border rounded p-2']) }}>
    {{ $slot }}
</select>

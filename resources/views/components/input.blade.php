@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input leading-3 p-2 block
rounded-md shadow-sm']) !!}>
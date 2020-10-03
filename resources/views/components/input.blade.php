@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input leading-3 p-2 mt-1 block w-full
rounded-md shadow-sm']) !!}>
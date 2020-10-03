@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input mt-1 block w-full rounded-md
shadow-sm']) !!}>
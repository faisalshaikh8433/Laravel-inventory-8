@props(['for', 'customMessage'])
@error($for)
<p {{ $attributes->merge(['class' => 'text-sm text-red-600 mt-1']) }}>{{ $customMessage ?? $message  }}</p>
@enderror
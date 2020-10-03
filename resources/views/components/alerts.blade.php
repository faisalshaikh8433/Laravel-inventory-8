@props(['type'])

@if(session($type))
<div x-data="{ shown: false, timeout: null }"
    x-init="() => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); }"
    x-show.transition.opacity.out.duration.1500ms="shown" style="display: none;"
    {{ $attributes->merge(['class' => $type == 'success' ? 'flex font-semibold text-lg justify-between bg-green-200 text-green-600 p-2 rounded-lg mb-2' : 'flex font-semibold text-lg justify-between bg-red-200 text-red-600 p-2 rounded-lg mb-2']) }}>
    {{session($type)}}
    <button type="button" class="font-semibold" @click="shown = false">
        <span>&times;</span>
    </button>
</div>
@endif
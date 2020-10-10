@props(['boolean'])
<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  {{$boolean ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}} ">
    {{$boolean ? 'Yes' : 'No'}}
</span>
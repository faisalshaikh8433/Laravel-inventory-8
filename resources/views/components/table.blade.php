<div class="shadow overflow-auto border-b border-gray-200 sm:rounded-lg">
    <table {{ $attributes->merge(['class' => 'min-w-full divide-y divide-gray-200']) }}>
        <thead>
            {{ $thead }}
        </thead>
        <tbody>
            {{$tbody}} 
       </tbody>
    </table>
</div>

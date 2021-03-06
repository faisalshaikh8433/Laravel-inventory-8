<x-app-layout>
    <x-card>
        <x-card-header>
            <x-page-heading>
                Taxes
            </x-page-heading>
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('taxes.create') }}">Add New</a>
            </div>
        </x-card-header>
        <x-card-body>
            <x-table class="table">
                <x-slot name="thead">
                    <tr>
                        <th>Hsncode</th>
                        <th>Gst Percent</th>
                        <th>Active</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($taxes as $tax)
                    <tr>
                        <td>{{$tax->hsncode}}</td>
                        <td>{{$tax->gst_percent}}</td>
                        <td>
                            <x-badge boolean="{{$tax->active}}"/>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('taxes.edit', $tax->id)}}"
                                    class="btn btn-yellow rounded-r-none">Edit</a>
                                <x-form action="{{ route('taxes.destroy', $tax->id) }}" method="DELETE"
                                    onsubmit="return confirm('Are you sure you want to delete ?')">
                                    <input type="submit" value="Delete" class="btn btn-red rounded-l-none">
                                </x-form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </x-slot>
            </x-table>
        </x-card-body>
    </x-card>
</x-app-layout>
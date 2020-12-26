<x-app-layout>
    <x-card>
        <x-card-header>
            <x-page-heading>
                Product Groups
            </x-page-heading>
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('product_groups.create') }}">Add New</a>
            </div>
        </x-card-header>
        <x-card-body>
            <x-table class="table">
                <x-slot name="thead">
                    <tr>
                        <th>Name</th>
                        <th>Tax</th>
                        <th>Active</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($productGroups as $pg)
                    <tr>
                        <td>{{$pg->name}}</td>
                        <td>{{$pg->tax->displayName()}}</td>
                        <td>
                            <x-badge boolean="{{$pg->active}}" />
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('product_groups.edit', $pg->id)}}"
                                    class="btn btn-yellow rounded-r-none">Edit</a>
                                <x-form action="{{ route('product_groups.destroy', $pg->id) }}" method="DELETE"
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
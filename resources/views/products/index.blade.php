<x-app-layout>
    <x-card>
        <x-card-header>
            <x-page-heading>
                Products
            </x-page-heading>
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('products.create') }}">Add New</a>
            </div>
        </x-card-header>
        <x-card-body>
            <x-table class="table">
                <x-slot name="thead">
                    <tr>
                        <th>Name</th>
                        <th>Product Group</th>
                        <th>Tax</th>
                        <th>Rate</th>
                        <th>Cost</th>
                        <th>Active</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($products as $p)
                    <tr>
                        <td>{{$p->name}}</td>
                        <td>{{$p->tax->displayName()}}</td>
                        <td>{{$p->productGroup->name}}</td>
                        <td>{{$p->rate}}</td>
                        <td>{{$p->cost}}</td>
                        <td>
                            <x-badge boolean="{{$p->active}}" />
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('products.edit', $p->id)}}"
                                    class="btn btn-yellow rounded-r-none">Edit</a>
                                <x-form action="{{ route('products.destroy', $p->id) }}" method="DELETE"
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
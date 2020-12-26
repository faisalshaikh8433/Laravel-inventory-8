<x-app-layout>
    <x-card>
        <x-card-header>
            <x-page-heading>
                Sales
            </x-page-heading>
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('sales.create') }}">Add New</a>
            </div>
        </x-card-header>
        <x-card-body>
            <x-table class="table">
                <x-slot name="thead">
                    <tr>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($sales as $sale)
                    <tr>
                        <td>{{$sale->date}}</td>
                        <td>{{$sale->customer->name}}</td>
                        <td>{{$sale->total_amount}}</td>
                        <td>
                            <x-badge boolean="{{$sale->active}}" />
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('sales.edit', $sale->id)}}"
                                    class="btn btn-yellow rounded-r-none">Edit</a>
                                <x-form action="{{ route('sales.destroy', $sale->id) }}" method="DELETE"
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
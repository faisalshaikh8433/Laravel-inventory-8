<x-app-layout>
    <x-card>
        <x-card-header>
            <x-page-heading>
                New Product Group
            </x-page-heading>
        </x-card-header>
        <x-form action="{{ route('product_groups.store') }}">
            <x-card-body>
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="name" value="Name" />
                        <x-input id="name" type="text" name="name" class="mt-1 block w-full"
                            value="{{ old('name') }}" />
                        <x-input-error for="name" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="tax_id" value="Tax" />
                        <select name="tax_id" id="tax_id" class="form-select w-full mt-1">
                            <option value="">select an option</option>
                            @foreach ($taxes as $tax)
                            <option value="{{$tax->id}}">{{$tax->displayName()}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="tax_id" custom-message="Tax is required" />
                    </div>
                    <div class="col-span-12 md:col-span-6 flex items-center">
                        <x-label for="active" value="Active" />
                        <input id="active" type="checkbox" name="active" class="ml-2 form-checkbox" value="1" checked />
                    </div>
                </div>
            </x-card-body>
            <x-card-footer>
                <button type="submit" class="btn btn-secondary">Save</button>
            </x-card-footer>
        </x-form>
    </x-card>
</x-app-layout>
<x-app-layout>
    <x-card>
        <x-card-header>
            <x-page-heading>
                Edit Product
            </x-page-heading>
        </x-card-header>
        <x-form action="{{ route('products.store') }}">
            <x-card-body>
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="name" value="Name" />
                        <x-input id="name" type="text" name="name" value="{{ $product->name }}" class="mt-1 w-full"/>
                        <x-input-error for="name" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="product_group_id" value="Product Group" />
                        <select name="product_group_id" id="product_group_id" class="form-select w-full mt-1">
                            <option value="">select an option</option>
                            @foreach ($productGroups as $pg)
                            <option value="{{$pg->id}}" {{($pg->id === $product->product_group_id) ? 'selected': ''}}>{{$pg->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="product_group_id" custom-message="Product Group is required" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="tax_id" value="Tax" />
                        <select name="tax_id" id="tax_id" class="form-select w-full mt-1">
                            <option value="">select an option</option>
                            @foreach ($taxes as $tax)
                            <option value="{{$tax->id}}" {{($tax->id === $product->tax_id) ? 'selected': ''}}>{{$tax->displayName()}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="tax_id" custom-message="Tax is required" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="rate" value="Rate" />
                        <x-input id="rate" type="text" name="rate" value="{{ $product->rate }}" placeholder="0.00" class="w-full mt-1"/>
                        <x-input-error for="rate" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="cost" value="Cost" />
                        <x-input id="cost" type="text" name="cost" value="{{ $product->cost }}" placeholder="0.00" class="w-full mt-1"/>
                        <x-input-error for="cost" />
					</div>
					<div class="col-span-12 md:col-span-6 flex items-center">
                        <x-label for="active" value="Active" />
                        <input id="active" type="checkbox" name="active" class="ml-2 form-checkbox" value="1"
                            {{($product->active == 1 ? "checked" : '')}} />
                    </div>
                </div>
            </x-card-body>
            <x-card-footer>
                <button type="submit" class="btn btn-secondary">Save</button>
            </x-card-footer>
        </x-form>
    </x-card>
</x-app-layout>
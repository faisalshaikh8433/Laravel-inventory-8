<x-form action="{{ route('sales.store') }}">
	<x-card-body>
		<div class="grid grid-cols-12 gap-2">
			<div class="col-span-12 md:col-span-6">
				<x-label for="invoice_no" value="Invoice No" />
				<x-input wire:model="invoice_no" id="invoice_no" type="text" name="invoice_no" class="mt-1 w-full" />
				<x-input-error for="invoice_no" />
			</div>
			<div class="col-span-12 md:col-span-6">
				<x-label for="sale_at" value="Date" />
				<x-input wire:model="sale_at" id="sale_at" type="datetime" name="sale_at" class="mt-1 w-full" />
				<x-input-error for="sale_at" custom-message="Date is required"/>
			</div>
			<div class="col-span-12 md:col-span-6">
				<x-label for="customer_id" value="Customer" />
				<select name="customer_id" id="customer_id" class="form-select w-full mt-1">
					<option value="">select an option</option>
					@foreach ($customers as $cust)
					<option value="{{$cust->id}}">{{$cust->name}}</option>
					@endforeach
				</select>
				<x-input-error for="customer_id" custom-message="Customer is required" />
			</div>
			<div class="col-span-12">
				<x-table class="table">
					<x-slot name="thead">
						<tr>
							<th>Product</th>
							<th>Rate</th>
							<th>Manual Rate</th>
							<th>Qty.</th>
							<th></th>
						</tr>
					</x-slot>
					<x-slot name="tbody">
						@foreach ($saleItems as $index => $item)
						<tr>
							<td>
								<select class="form-select w-full product" name="items[{{$index}}][product_id]" wire:model="saleItems.{{$index}}.product_id">
									<option value="">Select a product</option>
									@foreach ($products as $product)
										<option value="{{$product->id}}">{{$product->name}}</option>
									@endforeach
								</select>
								<x-input-error for="items.{{$index}}.product_id" custom-message="Product is required" />
							</td>
							<td>
								<x-input type="text" name="items[{{$index}}][rate]" wire:model="saleItems.{{$index}}.rate" class="w-full rate" placeholder="0.00"/>
								<x-input-error for="items.{{$index}}.rate" custom-message="Rate is empty or invalid"/>
							</td>
							<td>
								<x-input type="text" name="items[{{$index}}][manual_rate]" wire:model="saleItems.{{$index}}.manual_rate" class="rate w-full" placeholder="0.00"/>
								<x-input-error for="items.{{$index}}.manual_rate" custom-message="Manual rate is invalid"/>
							</td>
							<td>
								<x-input type="text" name="items[{{$index}}][qty]" wire:model="saleItems.{{$index}}.qty" class="w-full qty" placeholder="0.00"/>
								<x-input-error for="items.{{$index}}.qty" />
								<x-input-error for="items.{{$index}}.rate" custom-message="Qty. is empty or invalid"/>
							</td>
							<td>
								<button type="button" class='btn btn-red' wire:click.prevent='deleteRow({{$index}})'>X</button>
							</td>	
						</tr>
						@endforeach
						<tr class="text-right">
							<td colspan='5'>
								<button type="button" class="btn btn-yellow" wire:click.prevent="addRow">Add New</button>
							</td>
						</tr>
					</x-slot>
				</x-table>
			</div>
		</div>
	</x-card-body>
	<x-card-footer>
		<button type="submit" class="btn btn-secondary" wire:click.prevent='save'>Save</button>
	</x-card-footer>
</x-form>
@push('scripts')
<script>
    window.addEventListener('livewire:load', () => {
        @this.on('row-added', () => {
            let products = document.querySelectorAll('.product');
			products[products.length- 1].focus();
        })
    })
</script>
@endpush
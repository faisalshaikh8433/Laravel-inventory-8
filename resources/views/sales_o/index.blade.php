<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Customers
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-xl sm:rounded-lg p-4">
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-3 lg:col-span-2">
                        <x-jet-label for="invoice_no" value="Invoice No" />
                        <x-jet-input id="invoice_no" type="text" class="mt-1 block w-full"/>
                        <x-jet-input-error for="invoice_no" class="mt-1" />
                    </div>
                    <div class="col-span-4 lg:col-span-3">
                        <x-jet-label for="date" value="Date" />
                        <x-jet-input id="date" type="text" class="mt-1 block w-full"/>
                        <x-jet-input-error for="date" class="mt-1" />
                    </div>
                    <div class="col-span-5 lg:col-span-5">
                        <x-jet-label for="customer" value="Customer" />
                        <x-jet-input id="customer" type="text" class="mt-1 block w-full"/>
                        <x-jet-input-error for="customer" class="mt-1" />
                    </div>
                    <div class="col-span-3 lg:col-span-2">
                        <x-jet-label for="gst_type" value="Gst Type" />
                        <x-jet-input id="gst_type" type="text" class="mt-1 block w-full"/>
                        <x-jet-input-error for="gst_type" class="mt-1" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

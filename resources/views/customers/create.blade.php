<x-app-layout>
    <x-card>
        <x-card-header>
            <x-page-heading>
                New Customer
            </x-page-heading>
        </x-card-header>
        <x-form action="{{ route('customers.store') }}">
            <x-card-body>
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="name" value="Name" />
                        <x-input id="name" type="text" name="name" class="mt-1 block w-full"
                            value="{{ old('name') }}" />
                        <x-input-error for="name" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="email" value="Email" />
                        <x-input id="email" type="text" name="email" class="mt-1 block w-full"
                            value="{{ old('email') }}" />
                        <x-input-error for="email" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="contact_number" value="Contact Number" />
                        <x-input id="contact_number" type="text" name="contact_number" class="mt-1 block w-full"
                            value="{{ old('contact_number') }}" />
                        <x-input-error for="contact_number" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="alternate_number" value="Alternate Number" />
                        <x-input id="alternate_number" type="text" name="alternate_number" class="mt-1 block w-full"
                            value="{{ old('alternate_number') }}" />
                        <x-input-error for="alternate_number" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="country" value="Country" />
                        <x-input id="country" type="text" name="country" class="mt-1 block w-full"
                            value="{{ old('country') }}" />
                        <x-input-error for="country" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="state" value="State" />
                        <x-input id="state" type="text" name="state" class="mt-1 block w-full"
                            value="{{ old('state') }}" />
                        <x-input-error for="state" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="city" value="City" />
                        <x-input id="city" type="text" name="city" class="mt-1 block w-full"
                            value="{{ old('city') }}" />
                        <x-input-error for="city" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="pincode" value="Pincode" />
                        <x-input id="pincode" type="text" name="pincode" class="mt-1 block w-full"
                            value="{{ old('pincode') }}" />
                        <x-input-error for="pincode" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="address" value="Address" />
                        <textarea id="address" name="address" class="form-input w-full" cols="30"
                            rows="5">{{ old('address') }}</textarea>
                        <x-input-error for="address" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="gstno" value="Gst No." />
                        <x-input id="gstno" type="text" name="gstno" class="mt-1 block w-full"
                            value="{{ old('gstno') }}" />
                        <x-input-error for="gstno" class="mt-1" />
                    </div>
                </div>
            </x-card-body>
            <x-card-footer>
                <button type="submit" class="btn btn-secondary">Save</button>
            </x-card-footer>
        </x-form>
    </x-card>
</x-app-layout>
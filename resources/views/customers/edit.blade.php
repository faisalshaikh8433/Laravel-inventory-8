<x-app-layout>
    <x-card>
        <x-card-header>
            <x-page-heading>
                Edit Customer
            </x-page-heading>
        </x-card-header>
        <x-form action="{{ route('customers.update', $customer) }}" method="PUT">
            <x-card-body>
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="name" value="Name" />
                        <x-input id="name" type="text" name="name" value="{{$customer->name}}" />
                        <x-input-error for="name" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="email" value="Email" />
                        <x-input id="email" type="text" name="email" value="{{$customer->email}}" />
                        <x-input-error for="email" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="contact_number" value="Contact Number" />
                        <x-input id="contact_number" type="text" name="contact_number"
                            value="{{$customer->contact_number}}" />
                        <x-input-error for="contact_number" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="alternate_number" value="Alternate Number" />
                        <x-input id="alternate_number" type="text" name="alternate_number"
                            value="{{$customer->alternate_number}}" />
                        <x-input-error for="alternate_number" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="country" value="Country" />
                        <x-input id="country" type="text" name="country" value="{{$customer->country}}" />
                        <x-input-error for="country" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="state" value="State" />
                        <x-input id="state" type="text" name="state" value="{{$customer->state}}" />
                        <x-input-error for="state" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="city" value="City" />
                        <x-input id="city" type="text" name="city" value="{{$customer->city}}" />
                        <x-input-error for="city" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="pincode" value="Pincode" />
                        <x-input id="pincode" type="text" name="pincode" value="{{$customer->pincode}}" />
                        <x-input-error for="pincode" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="address" value="Address" />
                        <textarea id="address" name="address" class="form-textarea w-full mt-1" cols="30"
                            rows="5">{{ $customer->address }}</textarea>
                        <x-input-error for="address" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="gstno" value="Gst No." />
                        <x-input id="gstno" type="text" name="gstno" value="{{$customer->gstno}}" />
                        <x-input-error for="gstno" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6 flex items-center">
                        <x-label for="active" value="Active" />
                        <input id="active" type="checkbox" name="active" class="ml-2 form-checkbox"
                            value="1" {{($tax->active == 1 ? "checked" : '')}}/>
                    </div>
                </div>
            </x-card-body>
            <x-card-footer>
                <button type="submit" class="btn btn-secondary">Update</button>
            </x-card-footer>
        </x-form>
    </x-card>
</x-app-layout>
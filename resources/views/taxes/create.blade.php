<x-app-layout>
    <x-card>
        <x-card-header>
            <x-page-heading>
                New Tax
            </x-page-heading>
        </x-card-header>
        <x-form action="{{ route('taxes.store') }}">
            <x-card-body>
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="hsncode" value="Hsncode" />
                        <x-input id="hsncode" type="text" name="hsncode" class="mt-1 block w-full"
                            value="{{ old('hsncode') }}" />
                        <x-input-error for="hsncode" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="gst_percent" value="Gst Percentage" />
                        <x-input id="gst_percent" type="text" name="gst_percent" class="mt-1 block w-full"
                            value="{{ old('gst_percent') }}" />
                        <x-input-error for="gst_percent" class="mt-1" />
                    </div>
                    <div class="col-span-12 md:col-span-6 flex items-center">
                        <x-label for="active" value="Active" />
                        <input id="active" type="checkbox" name="active" class="ml-2 form-checkbox"
                            value="1" />
                    </div>
                </div>
            </x-card-body>
            <x-card-footer>
                <button type="submit" class="btn btn-secondary">Save</button>
            </x-card-footer>
        </x-form>
    </x-card>
</x-app-layout>
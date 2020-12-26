<x-app-layout>
    <x-card>
        <x-card-header>
            <x-page-heading>
                Edit Tax
            </x-page-heading>
        </x-card-header>
        <x-form action="{{ route('taxes.update', $tax) }}" method="PUT">
            <x-card-body>
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="hsncode" value="Hsncode" />
                        <x-input id="hsncode" type="text" name="hsncode" class="mt-1 w-full"
                            value="{{ $tax->hsncode }}" />
                        <x-input-error for="hsncode" custom-message="Hsncode with this gst percent already exist" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-label for="gst_percent" value="Gst Percentage" />
                        <x-input id="gst_percent" type="text" name="gst_percent" class="mt-1 w-full"
                            value="{{ $tax->gst_percent }}" />
                        <x-input-error for="gst_percent" />
                    </div>
                    <div class="col-span-12 md:col-span-6 flex items-center">
                        <x-label for="active" value="Active" />
                        <input id="active" type="checkbox" name="active" class="ml-2 form-checkbox" value="1"
                            {{($tax->active == 1 ? "checked" : '')}} />
                    </div>
                </div>
            </x-card-body>
            <x-card-footer>
                <button type="submit" class="btn btn-secondary">Update</button>
            </x-card-footer>
        </x-form>
    </x-card>
</x-app-layout>
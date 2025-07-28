<div>

    <x-flash-messenger/>

    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        <div class="space-y-8">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Basic Information</h2>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <x-form-input
                    name="accession_number"
                    label="Accession Number"
                    placeholder="Enter accession number"
                    type="text"
                    required
                    :value="old('accession_number', '')"
                />
                <x-form-input
                    name="title"
                    label="Title"
                    placeholder="Enter title"
                    type="text"
                    required
                    :value="old('title', '')"
                />
                <x-dynamic-input-list
                    label="Author/authors"
                    :items="$authors"
                    fieldName="authors"
                    placeholder="Enter author"
                    addMethod="addAuthorField"
                    removeMethod="removeAuthorField"
                    addButtonText="Add Author"
                />
                <x-dynamic-input-list
                    label="Editor/editors"
                    :items="$editors"
                    fieldName="editors"
                    placeholder="Enter editor"
                    addMethod="addEditorField"
                    removeMethod="removeEditorField"
                    addButtonText="Add Editor"
                />
                <x-form-input
                    name="publication_year"
                    label="Year of publication"
                    placeholder="Enter year of publication"
                    type="number"
                    required
                    :value="old('publication_year', '')"
                />
                <x-form-input
                    name="publisher"
                    label="Publisher"
                    placeholder="Enter publisher"
                    type="text"
                    required
                    :value="old('publisher', '')"
                />
                <x-form-input
                    name="publication_place"
                    label="Place of publication"
                    placeholder="Enter place of publication"
                    type="text"
                    required
                    :value="old('publication_place', '')"
                />
                <x-form-input
                    name="isbn"
                    label="ISBN"
                    placeholder="Enter ISBN"
                    type="text"
                    required
                    :value="old('isbn', '')"
                />
                <x-form-input
                    name="volume"
                    label="Volume"
                    placeholder="Enter Volume"
                    type="text"
                    :value="old('volume', '')"
                />
                <x-form-input
                    name="edition"
                    label="Edition"
                    placeholder="Enter Edition"
                    type="text"
                    :value="old('edition', '')"
                />
            </div>
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Classification and Location</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <x-form-input
                    name="call_number"
                    label="Call Number"
                    placeholder="Enter call number"
                    type="text"
                    :value="old('call_number', '')"
                />
                @if(!$lc_class_id)
                    <x-form-select-input
                        wireModel="ddc_class_id"
                        :options="$ddc_classifications"
                        name="ddc_class_id"
                        label="DDC Classification"
                    />
                @endif
                @if(!$ddc_class_id)
                    <x-form-select-input
                        wireModel="lc_class_id"
                        :options="$lc_classifications"
                        name="lc_class_id"
                        label="LC Classification"
                    />
                @endif
                <x-form-select-input
                    wireModel="physical_location_id"
                    :options="$physical_locations"
                    name="physical_location_id"
                    label="Physical Location"
                    required
                />
            </div>
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Physical Description</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <x-form-select-input
                    wireModel="cover_type_id"
                    :options="$cover_types"
                    name="cover_type_id"
                    label="Cover Type"
                />
                image update button later
            </div>
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Administrative Information</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-4">
                <x-form-input
                    modelModifier="live"
                    name="ics_number"
                    label="ICS Number"
                    placeholder="Enter ICS number"
                    type="number"
                    :value="old('ics_number','')"
                />
                @if($ics_number)
                    <x-form-input
                        name="ics_date"
                        label="ICS Number Date"
                        type="date"
                        :value="old('ics_date','')"
                    />
                @endif
                <x-form-input
                    modelModifier="live"
                    name="pr_number"
                    label="PR Number"
                    placeholder="Enter PR number"
                    type="number"
                    :value="old('pr_number','')"
                />
                @if($pr_number)
                    <x-form-input
                        name="pr_date"
                        label="PR Number  Date"
                        type="date"
                        :value="old('pr_date','')"
                    />
                @endif
                <x-form-input
                    modelModifier="live"
                    name="po_number"
                    label="PO Number"
                    placeholder="Enter PO number"
                    type="number"
                    :value="old('po_number','')"
                />
                @if($po_number)
                    <x-form-input
                        name="po_date"
                        label="PO Number Date"
                        type="date"
                        :value="old('po_date','')"
                    />
                @endif
                <x-form-select-input
                    wireModel="source_id"
                    :options="$sources"
                    name="source_id"
                    label="Source"
                    :required="true"
                />

                @if((int)$source_id === \App\Models\Source::where('key', 'purchase')->first()->id)
                    <x-form-input
                        name="purchase_amount"
                        label="Purchase Amount"
                        placeholder="Enter purchase amount"
                        type="number"
                        :value="old('purchase_amount','')"
                    />
                    <x-form-input
                        name="lot_cost"
                        label="Lot Cost"
                        placeholder="Enter lot cost"
                        type="number"
                        :value="old('lot_cost','')"
                    />
                    <x-form-input
                        name="supplier"
                        label="Supplier"
                        placeholder="Enter supplier"
                        :value="old('supplier','')"
                    />
                @endif
                @if((int)$source_id === \App\Models\Source::where('key', 'donation')->first()->id)
                    <x-form-input
                        name="donated_by"
                        label="Donated By"
                        placeholder="Enter donor"
                        :value="old('donated_by','')"
                    />
                @endif
                @if((int)$source_id === \App\Models\Source::where('key', 'transferred')->first()->id)
                    <x-form-input
                        name="transferred_from"
                        label="Transferred from"
                        placeholder="Enter name"
                        :value="old('transferred_from','')"
                    />
                @endif
                @if((int)$source_id === \App\Models\Source::where('key', 'replaced')->first()->id)
                    <x-form-input
                        name="replaced_by"
                        label="Replaced by"
                        placeholder="Enter name"
                        :value="old('replaced_by','')"
                    />
                @endif
                <x-form-select-input
                    wireModel="acquisition_status"
                    :options="$acquisition_statuses"
                    name="acquisition_status"
                    label="Acquisition Status"
                />
                <x-form-select-input
                    wireModel="condition"
                    :options="$conditions"
                    name="condition"
                    label="Condition"
                />
            </div>
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Content Description</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <x-form-text-area-input
                    name="table_of_contents"
                    label="Table of Contents"
                    placeholder="Enter table of contents"
                    :rows="4"
                />
                <x-dynamic-input-list
                    label="Subject headings"
                    :items="$subject_headings"
                    fieldName="subject_headings"
                    placeholder="Enter subject heading"
                    addMethod="addSubjectHeadingField"
                    removeMethod="removeSubjectHeadingField"
                    addButtonText="Add Subject Heading"
                />
            </div>
        </div>
        <div class="mt-6 py-8 flex items-center justify-between">
            <a
                wire:click="openDeleteModal()"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200"
                aria-label="Delete item"
            >
                Delete
                <flux:icon name="trash" variant="mini" />
            </a>
            <div class="flex gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-accent px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-accent-content focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
                    <span wire:loading wire:target="submit">Saving...</span>
                    <span wire:loading.remove wire:target="submit">Update Book</span>
                </button>
            </div>
        </div>
    </form>

    <x-compact-modal entangle="showDeleteModal">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg font-medium text-gray-600">Delete DDC</h3>
            <p class="mt-2 text-sm text-gray-600">Are you sure you want to delete <span class="font-bold">{{ $title }}  </span>? This action cannot be undone.</p>
        </div>
        <div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse">
            <button wire:click="deleteRecord()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                Delete
            </button>
            <button wire:click="closeDeleteModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-100 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                Cancel
            </button>
        </div>
    </x-compact-modal>
</div>



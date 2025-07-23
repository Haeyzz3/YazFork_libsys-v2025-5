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
                <x-form-input-image
                    name="cover_image"
                    label="Profile Image"
                    wrapperClass="sm:col-span-1"
                />
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
                <x-form-select-input
                    wireModel="cover_type_id"
                    :options="$cover_types"
                    name="cover_type_id"
                    label="Cover Type"
                />
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
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <span wire:loading wire:target="submit">Saving...</span>
                <span wire:loading.remove wire:target="submit">Add Book</span>
            </button>
        </div>
    </form>
</div>



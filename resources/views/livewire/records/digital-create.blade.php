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
                    name="copyright_year"
                    label="Year of copyright"
                    placeholder="Enter year of copyright"
                    type="number"
                    required
                    :value="old('copyright_year', '')"
                />
                <x-form-input
                    name="producer"
                    label="Producer"
                    placeholder="Enter producer"
                    type="text"
                    required
                    :value="old('producer', '')"
                />
                <x-form-select-input
                    wireModel="language"
                    :options="$languages"
                    name="language"
                    label="Language"
                />
            </div>
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Technical Specifications</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <x-form-select-input
                    wireModel="collection_type"
                    :options="$collection_types"
                    name="collection_type"
                    label="Collection Type"
                />
                <x-form-input
                    name="duration"
                    label="Duration"
                    placeholder="e.g 120 mins"
                    type="text"
                    :value="old('duration','')"
                />
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
                <x-form-select-input
                    wireModel="source"
                    :options="$sources"
                    name="source"
                    label="Source"
                    :required="true"
                />
                @if($source === 'purchase')
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
                @if($source === 'donation')
                    <x-form-input
                        name="donated_by"
                        label="Donated By"
                        placeholder="Enter donor"
                        :value="old('donated_by','')"
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
                    name="overview"
                    label="Overview"
                    placeholder="Enter overview"
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
                <span wire:loading.remove wire:target="submit">Add Multimedia</span>
            </button>
        </div>
    </form>
</div>



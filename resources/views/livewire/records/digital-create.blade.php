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
                @dump($accession_number)
                <x-form-input
                    name="title"
                    label="Title"
                    placeholder="Enter title"
                    type="text"
                    required
                    :value="old('title', '')"
                />
                @dump($title)
                <x-dynamic-input-list
                    label="Author/authors"
                    :items="$authors"
                    fieldName="authors"
                    placeholder="Enter author"
                    addMethod="addAuthorField"
                    removeMethod="removeAuthorField"
                    addButtonText="Add Author"
                />
                @dump($authors)
                <x-dynamic-input-list
                    label="Editor/editors"
                    :items="$editors"
                    fieldName="editors"
                    placeholder="Enter editor"
                    addMethod="addEditorField"
                    removeMethod="removeEditorField"
                    addButtonText="Add Editor"
                />
                @dump($editors)
                <x-form-input
                    name="publication_year"
                    label="Year of publication"
                    placeholder="Enter year of publication"
                    type="number"
                    required
                    :value="old('publication_year', '')"
                />
                @dump($publication_year)
                <x-form-input
                    name="copyright_year"
                    label="Year of copyright"
                    placeholder="Enter year of copyright"
                    type="number"
                    required
                    :value="old('copyright_year', '')"
                />
                @dump($copyright_year)
                <x-form-input
                    name="publisher"
                    label="Publisher"
                    placeholder="Enter publisher"
                    type="text"
                    required
                    :value="old('publisher', '')"
                />
                @dump($publisher)
                <x-form-select-input
                    wireModel="language"
                    :options="$languages"
                    name="language"
                    label="Language"
                />
                @dump($language)
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
                @dump($collection_type)
                <x-form-input
                    name="duration"
                    label="Duration"
                    placeholder="e.g 120 mins"
                    type="text"
                    :value="old('duration','')"
                />
                @dump($duration)
                <x-form-input-image
                    name="cover_image"
                    label="Profile Image"
                    wrapperClass="sm:col-span-1"
                />
                @dump($cover_image)
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
                @dump($source)
                @if($source === 'purchase')
                    <x-form-input
                        name="purchase_amount"
                        label="Purchase Amount"
                        placeholder="Enter purchase amount"
                        type="number"
                        :value="old('purchase_amount','')"
                    />
                    @dump($purchase_amount)
                    <x-form-input
                        name="lot_cost"
                        label="Lot Cost"
                        placeholder="Enter lot cost"
                        type="number"
                        :value="old('lot_cost','')"
                    />
                    @dump($lot_cost)
                    <x-form-input
                        name="supplier"
                        label="Supplier"
                        placeholder="Enter supplier"
                        :value="old('supplier','')"
                    />
                    @dump($supplier)
                @endif
                @if($source === 'donation')
                    <x-form-input
                        name="donated_by"
                        label="Donated By"
                        placeholder="Enter donor"
                        :value="old('donated_by','')"
                    />
                    @dump($donated_by)
                @endif
                <x-form-select-input
                    wireModel="acquisition_status"
                    :options="$acquisition_statuses"
                    name="acquisition_status"
                    label="Acquisition Status"
                />
                @dump($acquisition_status)
                <x-form-select-input
                    wireModel="condition"
                    :options="$conditions"
                    name="condition"
                    label="Condition"
                />
                @dump($condition)
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
                @dump($overview)
                <x-dynamic-input-list
                    label="Subject headings"
                    :items="$subject_headings"
                    fieldName="subject_headings"
                    placeholder="Enter subject heading"
                    addMethod="addSubjectHeadingField"
                    removeMethod="removeSubjectHeadingField"
                    addButtonText="Add Subject Heading"
                />
                @dump($subject_headings)
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



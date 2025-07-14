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
                <div class="sm:col-span-1">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Author/authors</label>
                    @foreach($authors as $index => $author)
                        <div class="mt-2 flex gap-x-2">
                            <input
                                wire:model.blur="authors.{{ $index }}"
                                type="text"
                                placeholder="Enter author"
                                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('additional_authors.' . $index) ring-red-500 focus:ring-red-500 @enderror"
                            >
                            <button wire:click="removeAuthorField({{ $index }})" type="button" class="text-red-600">Remove</button>
                        </div>
                        @error('authors.' . $index)
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    @endforeach
                    <button wire:click="addAuthorField" type="button" class="mt-2 text-sm font-semibold text-indigo-600">Add Author</button>
                </div>
                <div class="sm:col-span-1">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Editor/editor</label>
                    @foreach($editors as $index => $editor)
                        <div class="mt-2 flex gap-x-2">
                            <input
                                wire:model.blur="editors.{{ $index }}"
                                type="text"
                                placeholder="Enter editor"
                                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('additional_authors.' . $index) ring-red-500 focus:ring-red-500 @enderror"
                            >
                            <button wire:click="removeEditorField({{ $index }})" type="button" class="text-red-600">Remove</button>
                        </div>
                        @error('editor.' . $index)
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    @endforeach
                    <button wire:click="addEditorField" type="button" class="mt-2 text-sm font-semibold text-indigo-600">Add Author</button>
                </div>

{{--                <x-form-input--}}
{{--                    name="publication_year"--}}
{{--                    label="Year of publication"--}}
{{--                    placeholder="Enter year of publication"--}}
{{--                    type="text"--}}
{{--                    required--}}

{{--                    :value="old('publication_year', '')"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="publisher"--}}
{{--                    label="Publisher"--}}
{{--                    placeholder="Enter publisher"--}}
{{--                    type="text"--}}
{{--                    required--}}

{{--                    :value="old('publisher', '')"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="publication_place"--}}
{{--                    label="Place of publication"--}}
{{--                    placeholder="Enter place of publication"--}}
{{--                    type="text"--}}
{{--                    required--}}

{{--                    :value="old('publication_place', '')"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="isbn"--}}
{{--                    label="ISBN"--}}
{{--                    placeholder="Enter ISBN"--}}
{{--                    type="text"--}}
{{--                    required--}}

{{--                    :value="old('isbn', '')"--}}
{{--                />--}}
            </div>
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Classification and Location</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
{{--                @if($lc_classification)--}}
{{--                    <x-form-select-input--}}
{{--                        name="ddc_classification"--}}
{{--                        label="DDC Classification"--}}
{{--                        :options="$ddc_classifications"--}}
{{--                        :required="false"--}}
{{--                    />--}}
{{--                @endif--}}
{{--                @if(!$ddc_classification)--}}
{{--                    <x-form-select-input--}}
{{--                        name="lc_classification"--}}
{{--                        label="LC Classification"--}}
{{--                        :options="$lc_classifications"--}}
{{--                        :required="false"--}}
{{--                    />--}}
{{--                @endif--}}
{{--                <x-form-input--}}
{{--                    name="call_number"--}}
{{--                    label="Call Number"--}}
{{--                    placeholder="Enter call number"--}}
{{--                    type="text"--}}
{{--                    :required="false"--}}
{{--                    :value="old('call_number', '')"--}}
{{--                />--}}
{{--                <x-form-select-input--}}
{{--                    name="physical_location"--}}
{{--                    label="Physical Location"--}}
{{--                    :options="$locations"--}}
{{--                    :required="true"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="location_symbol"--}}
{{--                    label="Location Symbol"--}}
{{--                    placeholder="Enter location symbol"--}}
{{--                    type="text"--}}
{{--                    :required="false"--}}
{{--                    :value="old('location_symbol', '')"--}}
{{--                />--}}
            </div>
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Physical Description</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
{{--                <x-form-select-input--}}
{{--                    name="cover_type"--}}
{{--                    label="Cover Type"--}}
{{--                    :options="$cover_types"--}}
{{--                    :required="false"--}}
{{--                />--}}
{{--                <x-form-input-image--}}
{{--                    name="cover_image"--}}
{{--                    label="Profile Image"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                />--}}
            </div>
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Administrative Information</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-4">
{{--                <x-form-input--}}
{{--                    name="ics_number"--}}
{{--                    label="ICS Number"--}}
{{--                    placeholder="Enter ICS number"--}}
{{--                    type="text"--}}
{{--                    :required="false"--}}
{{--                    :value="old('ics_number','')"--}}
{{--                />--}}
{{--                @if($ics_number)--}}
{{--                    <x-form-input--}}
{{--                        name="ics_number_date"--}}
{{--                        label="ICS Number Date"--}}
{{--                        type="date"--}}
{{--                        :required="false"--}}
{{--                        :value="old('ics_number_date','')"--}}
{{--                    />--}}
{{--                @endif--}}
{{--                <x-form-input--}}
{{--                    name="pr_number"--}}
{{--                    label="PR Number"--}}
{{--                    placeholder="Enter PR number"--}}
{{--                    type="text"--}}
{{--                    :required="false"--}}
{{--                    :value="old('pr_number','')"--}}
{{--                />--}}
{{--                @if($pr_number)--}}
{{--                    <x-form-input--}}
{{--                        name="pr_number_date"--}}
{{--                        label="PR Number  Date"--}}
{{--                        type="date"--}}
{{--                        :required="false"--}}
{{--                        :value="old('pr_number_date','')"--}}
{{--                    />--}}
{{--                @endif--}}
{{--                <x-form-input--}}
{{--                    name="po_number"--}}
{{--                    label="PO Number"--}}
{{--                    placeholder="Enter PO number"--}}
{{--                    type="text"--}}
{{--                    :required="false"--}}
{{--                    :value="old('po_number','')"--}}
{{--                />--}}
{{--                @if($po_number)--}}
{{--                    <x-form-input--}}
{{--                        name="po_number_date"--}}
{{--                        label="PO Number Date"--}}
{{--                        type="date"--}}
{{--                        :required="false"--}}
{{--                        :value="old('po_number_date','')"--}}
{{--                    />--}}
{{--                @endif--}}
{{--                <x-form-select-input--}}
{{--                    name="source"--}}
{{--                    label="Source"--}}
{{--                    placeholder="Enter source"--}}
{{--                    :options="$sources"--}}
{{--                    :required="false"--}}
{{--                />--}}
{{--                @if($source === 'Purchase')--}}
{{--                    <x-form-input--}}
{{--                        name="purchase_amount"--}}
{{--                        label="Purchase Amount"--}}
{{--                        placeholder="Enter purchase amount"--}}
{{--                        type="number"--}}
{{--                        :required="false"--}}
{{--                        :value="old('purchase_amount','')"--}}
{{--                    />--}}
{{--                    <x-form-input--}}
{{--                        name="lot_cost"--}}
{{--                        label="Lot Cost"--}}
{{--                        placeholder="Enter lot cost"--}}
{{--                        type="number"--}}
{{--                        :required="false"--}}
{{--                        :value="old('lot_cost','')"--}}
{{--                    />--}}
{{--                    <x-form-input--}}
{{--                        name="supplier"--}}
{{--                        label="Supplier"--}}
{{--                        placeholder="Enter supplier"--}}
{{--                        type="text"--}}
{{--                        :required="false"--}}
{{--                        :value="old('supplier','')"--}}
{{--                    />--}}
{{--                @endif--}}
{{--                @if($source === 'Donation')--}}
{{--                    <x-form-input--}}
{{--                        name="donated_by"--}}
{{--                        label="Donated By"--}}
{{--                        placeholder="Enter donor"--}}
{{--                        type="text"--}}
{{--                        :required="false"--}}
{{--                        :value="old('donated_by','')"--}}
{{--                    />--}}
{{--                @endif--}}
{{--                <x-form-select-input--}}
{{--                    name="acquisition_status"--}}
{{--                    label="Acquisition Status"--}}
{{--                    placeholder="Enter acquisition status"--}}
{{--                    :options="$acquisition_statuses"--}}
{{--                    :required="false"--}}
{{--                />--}}
            </div>
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Content Description</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
{{--                <x-form-text-area-input--}}
{{--                    name="table_of_contents"--}}
{{--                    label="Table of Contents"--}}
{{--                    placeholder="Enter table of contents"--}}
{{--                    :rows="4"--}}
{{--                    wrapper-class="sm:col-span-1"--}}
{{--                />--}}
{{--                <div class="sm:col-span-1">--}}
{{--                    <label class="block text-sm font-medium leading-6 text-gray-900">Subject Headings</label>--}}
{{--                    @foreach($subject_headings as $index => $subject)--}}
{{--                        <div class="mt-2 flex gap-x-2">--}}
{{--                            <input--}}
{{--                                wire:model.live="subject_headings.{{ $index }}"--}}
{{--                                type="text"--}}
{{--                                placeholder="Enter subject heading"--}}
{{--                                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"--}}
{{--                                class="@error('$subject_headings.' . $index) ring-red-500 focus:ring-red-500 @enderror"--}}
{{--                            >--}}
{{--                            <button wire:click="removeSubjectHeadingField({{ $index }})" type="button" class="text-red-600">Remove</button>--}}
{{--                        </div>--}}
{{--                        @error('subject_headings.' . $index)--}}
{{--                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    @endforeach--}}
{{--                    <button wire:click="addSubjectHeadingField" type="button" class="mt-2 text-sm font-semibold text-indigo-600">Add Subject Heading</button>--}}
{{--                </div>--}}
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



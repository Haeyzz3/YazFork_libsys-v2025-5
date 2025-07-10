<div>

    <x-flash-messenger/>

    <form wire:submit.prevent="submit">
        <div class="space-y-8">
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Basic Information</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <x-form-input
                    name="accession_number"
                    label="Accession Number"
                    placeholder="Enter accession number"
                    type="text"
                    required
                    wrapperClass="sm:col-span-1"
                    :value="old('accession_number', '')"
                />
                <x-form-input
                    name="title"
                    label="Title"
                    placeholder="Enter title"
                    type="text"
                    required
                    wrapperClass="sm:col-span-1"
                    :value="old('title', '')"
                />
                <x-form-input
                    name="author"
                    label="Author"
                    placeholder="Enter author"
                    type="text"
                    :required="false"
                    wrapperClass="sm:col-span-1"
                    :value="old('author', '')"
                />
                <div class="sm:col-span-1">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Additional Authors</label>
                    @foreach($additionalAuthors as $index => $author)
                        <div class="mt-2 flex gap-x-2">
                            <input
                                wire:model.blur="additionalAuthors.{{ $index }}"
                                type="text"
                                placeholder="Enter additional author"
                                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                class="@error('additionalAuthors.' . $index) ring-red-500 focus:ring-red-500 @enderror"
                            >
                            <button wire:click="removeAuthorField({{ $index }})" type="button" class="text-red-600">Remove</button>
                        </div>
                        @error('additionalAuthors.' . $index)
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    @endforeach
                    <button wire:click="addAuthorField" type="button" class="mt-2 text-sm font-semibold text-indigo-600">Add Author</button>
                </div>
                <x-form-input
                    name="editor"
                    label="Editor"
                    placeholder="Enter editor"
                    type="text"
                    :required="false"
                    wrapperClass="sm:col-span-1"
                    :value="old('editor', '')"
                />
                <x-form-input
                    name="publication_year"
                    label="Year of publication"
                    placeholder="Enter year of publication"
                    type="text"
                    required
                    wrapperClass="sm:col-span-1"
                    :value="old('publication_year', '')"
                />
                <x-form-input
                    name="publisher"
                    label="Publisher"
                    placeholder="Enter publisher"
                    type="text"
                    required
                    wrapperClass="sm:col-span-1"
                    :value="old('publisher', '')"
                />
                <x-form-input
                    name="publication_place"
                    label="Place of publication"
                    placeholder="Enter place of publication"
                    type="text"
                    required
                    wrapperClass="sm:col-span-1"
                    :value="old('publication_place', '')"
                />
                <x-form-input
                    name="isbn"
                    label="ISBN"
                    placeholder="Enter ISBN"
                    type="text"
                    required
                    wrapperClass="sm:col-span-1"
                    :value="old('isbn', '')"
                />
            </div>
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Classification and Location</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <x-form-select-input
                    name="ddc_classification"
                    label="DDC Classification"
                    :options="$ddc_classifications"
                    :required="false"
                    wrapperClass="sm:col-span-1"
                />
                <x-form-select-input
                    name="lc_classification"
                    label="LC Classification"
                    :required="false"
                    wrapperClass="sm:col-span-1"
                />
                <x-form-input
                    name="call_number"
                    label="Call Number"
                    placeholder="Enter call number"
                    type="text"
                    :required="false"
                    wrapperClass="sm:col-span-1"
                    :value="old('call_number', '')"
                />
{{--                <x-form-select-input--}}
{{--                    name="physical_location"--}}
{{--                    label="Physical Location"--}}
{{--                    :options="['sample' => 'data']"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="location_symbol"--}}
{{--                    label="Location Symbol"--}}
{{--                    placeholder="Enter location symbol"--}}
{{--                    type="text"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
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
{{--                    :options="['sample' => 'data']"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="cover_image"--}}
{{--                    label="Cover Image"--}}
{{--                    type="file"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                    :value="old('cover_image','')"--}}
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
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                    :value="old('ics_number','')"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="ics_number_date"--}}
{{--                    label="ICS Number Date"--}}
{{--                    type="date"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                    :value="old('ics_number_date','')"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="pr_number"--}}
{{--                    label="PR Number"--}}
{{--                    placeholder="Enter PR number"--}}
{{--                    type="text"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                    :value="old('pr_number','')"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="pr_date"--}}
{{--                    label="PR Date"--}}
{{--                    type="date"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                    :value="old('pr_date','')"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="po_number"--}}
{{--                    label="PO Number"--}}
{{--                    placeholder="Enter PO number"--}}
{{--                    type="text"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                    :value="old('po_number','')"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="po_date"--}}
{{--                    label="PO Date"--}}
{{--                    type="date"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                    :value="old('po_date','')"--}}
{{--                />--}}
{{--                <x-form-select-input--}}
{{--                    name="source"--}}
{{--                    label="Source"--}}
{{--                    placeholder="Enter source"--}}
{{--                    :options="['sample' => 'data']"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="purchase_amount"--}}
{{--                    label="Purchase Amount"--}}
{{--                    placeholder="Enter purchase amount"--}}
{{--                    type="text"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                    :value="old('purchase_amount','')"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="lot_cost"--}}
{{--                    label="Lot Cost"--}}
{{--                    placeholder="Enter lot cost"--}}
{{--                    type="text"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                    :value="old('lot_cost','')"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="donated_by"--}}
{{--                    label="Donated By"--}}
{{--                    placeholder="Enter donor"--}}
{{--                    type="text"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                    :value="old('donated_by','')"--}}
{{--                />--}}
{{--                <x-form-input--}}
{{--                    name="supplier"--}}
{{--                    label="Supplier"--}}
{{--                    placeholder="Enter supplier"--}}
{{--                    type="text"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                    :value="old('supplier','')"--}}
{{--                />--}}
{{--                <x-form-select-input--}}
{{--                    name="acquisition_status"--}}
{{--                    label="Acquisition Status"--}}
{{--                    placeholder="Enter acquisition status"--}}
{{--                    :options="['sample' => 'data']"--}}
{{--                    :required="false"--}}
{{--                    wrapperClass="sm:col-span-1"--}}
{{--                />--}}
            </div>
            <div>
                <h2 class="text-base font-semibold leading-7 text-gray-900">Content Description</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
{{--                <x-form-text-area-input--}}
{{--                    name="table-of-contents"--}}
{{--                    label="Table of Contents"--}}
{{--                    placeholder="Enter table of contents"--}}
{{--                    :rows="4"--}}
{{--                    wrapper-class="sm:col-span-1"--}}
{{--                    wire-model="tableOfContents"--}}
{{--                />--}}
{{--                <div class="sm:col-span-1">--}}
{{--                    <label class="block text-sm font-medium leading-6 text-gray-900">Subject Headings</label>--}}
{{--                    @foreach($additionalAuthors as $index => $author)--}}
{{--                        <div class="mt-2 flex gap-x-2">--}}
{{--                            <input--}}
{{--                                wire:model.blur="additionalAuthors.{{ $index }}"--}}
{{--                                type="text"--}}
{{--                                placeholder="Enter additional author"--}}
{{--                                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"--}}
{{--                                class="@error('additionalAuthors.' . $index) ring-red-500 focus:ring-red-500 @enderror"--}}
{{--                            >--}}
{{--                            <button wire:click="removeAuthorField({{ $index }})" type="button" class="text-red-600">Remove</button>--}}
{{--                        </div>--}}
{{--                        @error('additionalAuthors.' . $index)--}}
{{--                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    @endforeach--}}
{{--                    <button wire:click="addAuthorField" type="button" class="mt-2 text-sm font-semibold text-indigo-600">Add Author</button>--}}
{{--                </div>--}}
            </div>
            <div class="flex w-full justify-end">
                <button
                    type="button"
                    wire:click="openModal"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                >
                    <span wire:loading wire:target="openModal">Opening...</span>
                    <span wire:loading.remove wire:target="openModal">Add a copy</span>
                </button>
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
    <x-modal>
        <form wire:submit.prevent="submit" class="h-full overflow-clip">
            <div class="space-y-8">
                <div>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Basic Information</h2>
                </div>
                <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                    <x-form-input
                        name="accession_number"
                        label="Accession Number"
                        placeholder="Enter accession number"
                        type="text"
                        required
                        wrapperClass="sm:col-span-1"
                        :value="old('accession_number', '')"
                    />
                    <x-form-input
                        name="title"
                        label="Title"
                        placeholder="Enter title"
                        type="text"
                        required
                        wrapperClass="sm:col-span-1"
                        :value="old('title', '')"
                    />
                    <x-form-input
                        name="author"
                        label="Author"
                        placeholder="Enter author"
                        type="text"
                        :required="false"
                        wrapperClass="sm:col-span-1"
                        :value="old('author', '')"
                    />
                    <div class="sm:col-span-1">
                        <label class="block text-sm font-medium leading-6 text-gray-900">Additional Authors</label>
                        @foreach($additionalAuthors as $index => $author)
                            <div class="mt-2 flex gap-x-2">
                                <input
                                    wire:model.blur="additionalAuthors.{{ $index }}"
                                    type="text"
                                    placeholder="Enter additional author"
                                    class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    class="@error('additionalAuthors.' . $index) ring-red-500 focus:ring-red-500 @enderror"
                                >
                                <button wire:click="removeAuthorField({{ $index }})" type="button" class="text-red-600">Remove</button>
                            </div>
                            @error('additionalAuthors.' . $index)
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        @endforeach
                        <button wire:click="addAuthorField" type="button" class="mt-2 text-sm font-semibold text-indigo-600">Add Author</button>
                    </div>
                    <x-form-input
                        name="editor"
                        label="Editor"
                        placeholder="Enter editor"
                        type="text"
                        :required="false"
                        wrapperClass="sm:col-span-1"
                        :value="old('editor', '')"
                    />
                    <x-form-input
                        name="publication_year"
                        label="Year of publication"
                        placeholder="Enter year of publication"
                        type="text"
                        required
                        wrapperClass="sm:col-span-1"
                        :value="old('publication_year', '')"
                    />
                    <x-form-input
                        name="publisher"
                        label="Publisher"
                        placeholder="Enter publisher"
                        type="text"
                        required
                        wrapperClass="sm:col-span-1"
                        :value="old('publisher', '')"
                    />
                    <x-form-input
                        name="publication_place"
                        label="Place of publication"
                        placeholder="Enter place of publication"
                        type="text"
                        required
                        wrapperClass="sm:col-span-1"
                        :value="old('publication_place', '')"
                    />
                    <x-form-input
                        name="isbn"
                        label="ISBN"
                        placeholder="Enter ISBN"
                        type="text"
                        required
                        wrapperClass="sm:col-span-1"
                        :value="old('isbn', '')"
                    />
                </div>
                <div>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Classification and Location</h2>
                </div>
                <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                    {{--                <x-form-select-input--}}
                    {{--                    name="ddc_classification"--}}
                    {{--                    label="DDC Classification"--}}
                    {{--                    :options="['sample' => 'data']"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                />--}}
                    {{--                <x-form-select-input--}}
                    {{--                    name="lc_classification"--}}
                    {{--                    label="LC Classification"--}}
                    {{--                    :options="['sample' => 'data']"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                />--}}
                    {{--                <x-form-input--}}
                    {{--                    name="call_number"--}}
                    {{--                    label="Call Number"--}}
                    {{--                    placeholder="Enter call number"--}}
                    {{--                    type="text"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                    :value="old('call_number', '')"--}}
                    {{--                />--}}
                    {{--                <x-form-select-input--}}
                    {{--                    name="physical_location"--}}
                    {{--                    label="Physical Location"--}}
                    {{--                    :options="['sample' => 'data']"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                />--}}
                    {{--                <x-form-input--}}
                    {{--                    name="location_symbol"--}}
                    {{--                    label="Location Symbol"--}}
                    {{--                    placeholder="Enter location symbol"--}}
                    {{--                    type="text"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
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
                    {{--                    :options="['sample' => 'data']"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                />--}}
                    {{--                <x-form-input--}}
                    {{--                    name="cover_image"--}}
                    {{--                    label="Cover Image"--}}
                    {{--                    type="file"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                    :value="old('cover_image','')"--}}
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
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                    :value="old('ics_number','')"--}}
                    {{--                />--}}
                    {{--                <x-form-input--}}
                    {{--                    name="ics_number_date"--}}
                    {{--                    label="ICS Number Date"--}}
                    {{--                    type="date"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                    :value="old('ics_number_date','')"--}}
                    {{--                />--}}
                    {{--                <x-form-input--}}
                    {{--                    name="pr_number"--}}
                    {{--                    label="PR Number"--}}
                    {{--                    placeholder="Enter PR number"--}}
                    {{--                    type="text"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                    :value="old('pr_number','')"--}}
                    {{--                />--}}
                    {{--                <x-form-input--}}
                    {{--                    name="pr_date"--}}
                    {{--                    label="PR Date"--}}
                    {{--                    type="date"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                    :value="old('pr_date','')"--}}
                    {{--                />--}}
                    {{--                <x-form-input--}}
                    {{--                    name="po_number"--}}
                    {{--                    label="PO Number"--}}
                    {{--                    placeholder="Enter PO number"--}}
                    {{--                    type="text"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                    :value="old('po_number','')"--}}
                    {{--                />--}}
                    {{--                <x-form-input--}}
                    {{--                    name="po_date"--}}
                    {{--                    label="PO Date"--}}
                    {{--                    type="date"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                    :value="old('po_date','')"--}}
                    {{--                />--}}
                    {{--                <x-form-select-input--}}
                    {{--                    name="source"--}}
                    {{--                    label="Source"--}}
                    {{--                    placeholder="Enter source"--}}
                    {{--                    :options="['sample' => 'data']"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                />--}}
                    {{--                <x-form-input--}}
                    {{--                    name="purchase_amount"--}}
                    {{--                    label="Purchase Amount"--}}
                    {{--                    placeholder="Enter purchase amount"--}}
                    {{--                    type="text"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                    :value="old('purchase_amount','')"--}}
                    {{--                />--}}
                    {{--                <x-form-input--}}
                    {{--                    name="lot_cost"--}}
                    {{--                    label="Lot Cost"--}}
                    {{--                    placeholder="Enter lot cost"--}}
                    {{--                    type="text"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                    :value="old('lot_cost','')"--}}
                    {{--                />--}}
                    {{--                <x-form-input--}}
                    {{--                    name="donated_by"--}}
                    {{--                    label="Donated By"--}}
                    {{--                    placeholder="Enter donor"--}}
                    {{--                    type="text"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                    :value="old('donated_by','')"--}}
                    {{--                />--}}
                    {{--                <x-form-input--}}
                    {{--                    name="supplier"--}}
                    {{--                    label="Supplier"--}}
                    {{--                    placeholder="Enter supplier"--}}
                    {{--                    type="text"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                    :value="old('supplier','')"--}}
                    {{--                />--}}
                    {{--                <x-form-select-input--}}
                    {{--                    name="acquisition_status"--}}
                    {{--                    label="Acquisition Status"--}}
                    {{--                    placeholder="Enter acquisition status"--}}
                    {{--                    :options="['sample' => 'data']"--}}
                    {{--                    :required="false"--}}
                    {{--                    wrapperClass="sm:col-span-1"--}}
                    {{--                />--}}
                </div>
                <div>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Content Description</h2>
                </div>
                <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                    {{--                <x-form-text-area-input--}}
                    {{--                    name="table-of-contents"--}}
                    {{--                    label="Table of Contents"--}}
                    {{--                    placeholder="Enter table of contents"--}}
                    {{--                    :rows="4"--}}
                    {{--                    wrapper-class="sm:col-span-1"--}}
                    {{--                    wire-model="tableOfContents"--}}
                    {{--                />--}}
                    {{--                <div class="sm:col-span-1">--}}
                    {{--                    <label class="block text-sm font-medium leading-6 text-gray-900">Subject Headings</label>--}}
                    {{--                    @foreach($additionalAuthors as $index => $author)--}}
                    {{--                        <div class="mt-2 flex gap-x-2">--}}
                    {{--                            <input--}}
                    {{--                                wire:model.blur="additionalAuthors.{{ $index }}"--}}
                    {{--                                type="text"--}}
                    {{--                                placeholder="Enter additional author"--}}
                    {{--                                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"--}}
                    {{--                                class="@error('additionalAuthors.' . $index) ring-red-500 focus:ring-red-500 @enderror"--}}
                    {{--                            >--}}
                    {{--                            <button wire:click="removeAuthorField({{ $index }})" type="button" class="text-red-600">Remove</button>--}}
                    {{--                        </div>--}}
                    {{--                        @error('additionalAuthors.' . $index)--}}
                    {{--                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>--}}
                    {{--                        @enderror--}}
                    {{--                    @endforeach--}}
                    {{--                    <button wire:click="addAuthorField" type="button" class="mt-2 text-sm font-semibold text-indigo-600">Add Author</button>--}}
                    {{--                </div>--}}
                </div>
                <div class="flex w-full justify-end">
                    <button
                        type="button"
                        wire:click="openModal"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                    >
                        <span wire:loading wire:target="openModal">Opening...</span>
                        <span wire:loading.remove wire:target="openModal">Add a copy</span>
                    </button>
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
    </x-modal>
</div>



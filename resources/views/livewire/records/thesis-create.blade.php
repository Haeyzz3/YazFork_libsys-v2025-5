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
                    label="Researcher/s"
                    :items="$researchers"
                    fieldName="researchers"
                    placeholder="Enter researcher/s"
                    addMethod="addResearcherField"
                    removeMethod="removeResearcherField"
                    addButtonText="Add Researcher"
                />
                <x-form-input
                    name="adviser"
                    label="Adviser"
                    placeholder="Enter adviser"
                    type="text"
                    required
                    :value="old('adviser', '')"
                />
                <x-form-input
                    name="year"
                    label="Year"
                    placeholder="Enter year"
                    type="number"
                    required
                    :value="old('year', '')"
                />
                <x-form-input
                    name="month"
                    label="Month"
                    placeholder="Enter month"
                    type="text"
                    required
                    :value="old('month', '')"
                />
                <x-form-input
                    name="institution"
                    label="Institution/school"
                    placeholder="Enter institution/school"
                    type="text"
                    required
                    :value="old('institution', '')"
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
                <h2 class="text-base font-semibold leading-7 text-gray-900">Administrative Information</h2>
            </div>
            <div class="grid max-w-6xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-4">
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
                <input
                    type="file"
                    id="pdf"
                    name="pdf"
                    wire:model="abstract"
                    accept=".pdf"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100"
                >
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
                <span wire:loading.remove wire:target="submit">Add Periodical/Magazine</span>
            </button>
        </div>
    </form>
</div>

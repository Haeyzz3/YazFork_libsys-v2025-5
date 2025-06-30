<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        @can('view-super-admin-content')
            <div class="p-4 bg-green-100 rounded">
                Super Admin  content
            </div>
        @endcan

        @can('view-admin-content')
            <div class="p-4 bg-blue-100 rounded">
                Admin content
            </div>
        @endcan
    </div>
</x-layouts.app>

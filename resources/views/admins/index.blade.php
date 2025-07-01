<x-layouts.app :title="__('Manage Admins')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        admins here
        @foreach($admins as $admin)
            <p>{{ $admin->username }}</p>
        @endforeach

{{--        TODO:  fix tailwind installation --}}
    </div>
</x-layouts.app>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist.item icon="home" class="mt-4" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('User Management')" class="grid" expandable :expanded="request()->routeIs(['admins', 'admins.*', 'patrons', 'patrons.*'])">
                    @can('manage-admins')
                        <flux:navlist.item icon="crown" :href="route('admins.index')" :current="request()->routeIs(['admins', 'admins.*'])" wire:navigate>{{ __('Admins') }}</flux:navlist.item>
                    @endcan
                    @can('manage-patrons')
                        <flux:navlist.item icon="shield-user" :href="route('patrons.index')" :current="request()->routeIs(['patrons', 'patrons.*'])" wire:navigate>{{ __('Patrons') }}</flux:navlist.item>
                    @endcan
                        <flux:navlist.item icon="crown" href="#" wire:navigate>{{ __('Logger') }}</flux:navlist.item>
                        <flux:navlist.item icon="document-check" href="#" wire:navigate>{{ __('Clearance') }}</flux:navlist.item>
                        <flux:navlist.item icon="chart-bar" href="#" wire:navigate>{{ __('Reports') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Catalog')" class="grid" expandable :expanded="request()->routeIs(['records' ,'books.*', 'digital.*', 'periodicals.*',
                                        'thesis.*', 'options.*'])">
                    <flux:navlist.item icon="book-open" :href="route('books.index')"
                                       :current="request()->routeIs(['records' ,'books.*', 'digital.*', 'periodicals.*',
                                        'thesis.*', 'options.*'])"
                                       wire:navigate>{{ __('Records') }}</flux:navlist.item>
                    <flux:navlist.item icon="rectangle-stack" href="#" wire:navigate>{{ __('Inventory') }}</flux:navlist.item>
                    <flux:navlist.item icon="chart-bar" href="#" wire:navigate>{{ __('Reports') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Circulation')" class="grid" expandable
                                    :expanded="request()->routeIs(['borrowing', 'borrowing.*'])">
                    <flux:navlist.item icon="list-bullet" href="{{ route('borrowing.index') }}"
                                       :current="request()->routeIs(['borrowing.index'])"
                                       wire:navigate>{{ __('Borrowed Items') }}</flux:navlist.item>
                    <flux:navlist.item icon="arrows-right-left" href="{{ route('borrowing.checkout') }}"
                                       :current="request()->routeIs(['borrowing.checkout'])"
                                       wire:navigate>{{ __('Borrow/Return') }}</flux:navlist.item>
                    <flux:navlist.item icon="chart-bar" href="#" wire:navigate>{{ __('Reports') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('History Logs') }}
                </flux:navlist.item>
            </flux:navlist>

            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->first_name . ' ' . auth()->user()->last_name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        @if(auth()->user()->role)
                            <div class="my-2 text-sm">
                                Role: {{ Str::title(str_replace('_', ' ', auth()->user()->role->name)) }}
                            </div>
                        @endif
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Detail Tabs') }}
        </h2>
    </x-slot>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('history.index', app()->getLocale() )" :active="request()->routeIs('history.index')">
                {{ __('Prices History') }}
            </x-nav-link>
            <x-nav-link :href="route('history-quantities', app()->getLocale() )" :active="request()->routeIs('history-quantities')">
                {{ __('Quantity History') }}
            </x-nav-link>
            <x-nav-link :href="route('history-trashed', app()->getLocale() )" :active="request()->routeIs('history-trashed')">
                {{ __('Trash') }}
            </x-nav-link>
    </div>


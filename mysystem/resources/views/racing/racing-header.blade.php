<x-nav-link :href="route('racing-index')" :active="request()->routeIs('racing-index')">
    {{ __('Home') }}
</x-nav-link>

<x-nav-link :href="route('racing-trackindex-index')" :active="request()->routeIs('racing-trackindex-*')">
    {{ __('Tracks Details') }}
</x-nav-link>
<x-nav-link :href="route('racing-driverindex-index')" :active="request()->routeIs('racing-driverindex-index')">
    {{ __('Drivers Details') }}
</x-nav-link>
<x-nav-link :href="route('racing-seriesindex-index')" :active="request()->routeIs('racing-seriesindex-*')">
    {{ __('Series Details') }}
</x-nav-link>




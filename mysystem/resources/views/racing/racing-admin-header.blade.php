<x-nav-link :href="route('racing-admin')" :active="request()->routeIs('racing-admin')">
    {{ __('Admin Page') }}
</x-nav-link>
<x-nav-link :href="route('racing-timerecord-create')" :active="request()->routeIs('racing-timerecord-create')">
    {{ __('Quick record') }}
</x-nav-link>
<x-nav-link :href="route('racing-driver-index')" :active="request()->routeIs('racing-driver-index')">
    {{ __('Drivers States') }}
</x-nav-link>
<x-nav-link :href="route('racing-track-index')" :active="request()->routeIs('racing-track-index')">
    {{ __('Track States') }}
</x-nav-link>
<x-nav-link :href="route('racing-series-index')" :active="request()->routeIs('racing-series-index')">
    {{ __('Manage Race series') }}
</x-nav-link>
<x-nav-link :href="route('racing-manage')" :active="request()->routeIs('racing-manage')">
    {{ __('Manage Car type') }}
</x-nav-link>
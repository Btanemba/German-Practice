{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Events" icon="la la-calendar-alt" :link="backpack_url('event')" />

<x-backpack::menu-item title="Subscribers" icon="la la-users" :link="backpack_url('subscriber')" />

<x-backpack::menu-item title="Clients" icon="la la-users" :link="backpack_url('registration')" />

<x-backpack::menu-dropdown title="Activities" icon="la la-calendar">
    <x-backpack::menu-dropdown-item title="Hangouts-Dates" :link="backpack_url('hangout')" />
    <x-backpack::menu-dropdown-item title="Class schedules" :link="backpack_url('class-schedule')" />
</x-backpack::menu-dropdown>


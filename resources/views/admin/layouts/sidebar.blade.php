@php
    $admin_role = auth()->user()->role
@endphp
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <form action="{{ url('admin/search') }}" class="mobile-view">
            <input class="form-control" type="text" placeholder="Search here">
            <button class="btn" type="button"><i class="fa fa-search"></i></button>
        </form>
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="nav-item nav-profile">
                    <a href="{{ url('admin/dashboard') }}" class="nav-link">
                        <div class="nav-profile-image"> <img src="{{ asset('assets/img/profiles/avatar-17.jpg') }}" alt="profile"> </div>
                        <div class="nav-profile-text d-flex flex-column"> <span class="font-weight-bold mb-2">John Doe</span> <span class="text-white text-small">Admin</span> </div> <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> 
                    </a>
                </li>

                <li> <a href="{{ url('admin/offers') }}"><i class="feather-gift"></i> <span>Offers</span></a> </li>
                <li> <a href="{{ url('admin/upsell-products') }}"><i class="feather-trending-up"></i> <span>Upsell Products</span></a> </li>
                @if($admin_role != 0)
                    <li> <a href="{{ url('admin/settings') }}"><i class="feather-settings"></i> <span>Settings</span></a> </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->

<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    <img src="{{ URL::to('assets/images/'.Session::get('avatar')) }}" width="20" alt="">
                    <div class="header-info ms-3">
                        <span class="font-w600 ">Hi,<b>{{ Session::get('name') }}</b></span>
                        <small class="text-end font-w400">{{ Session::get('email') }}</small>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ route('user/profile') }}" class="dropdown-item ai-icon">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span class="ms-2">Profile </span>
                    </a>
                    <a href="email-inbox.html" class="dropdown-item ai-icon">
                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <span class="ms-2">Inbox </span>
                    </a>
                    <a href="{{ route('logout') }}" class="dropdown-item ai-icon">
                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        <span class="ms-2">Logout </span>
                    </a>
                </div>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('user/table') }}">User Management</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-072-printer"></i>
                <span class="nav-text">About Section</span>
            </a>
            <ul aria-expanded="false">
               <!-- <li><a href="{{ route('add_content') }}">Add Content</a></li> -->
                <li><a href="{{ route('about_list') }}">View Content</a></li>
            </ul>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-072-printer"></i>
                <span class="nav-text">Contact Section</span>
            </a>
            <ul aria-expanded="false">
               <!-- <li><a href="{{ route('add_contact_details') }}">Add Content</a></li> -->
                <li><a href="{{ route('get_contact_details') }}">View Content</a></li>
            </ul>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-072-printer"></i>
                <span class="nav-text">Muso Teams</span>
            </a>
            <ul aria-expanded="false">
                <!-- <li><a href="{{ route('add_teams') }}">Add Teams</a></li> -->
                <li><a href="{{ route('get_teams_details') }}">View Teams</a></li>
            </ul>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-072-printer"></i>
                <span class="nav-text">Event Organiser</span>
            </a>
            <ul aria-expanded="false">
               <!-- <li><a href="{{ route('addEventInfo') }}">Add Event</a></li> -->
                <li><a href="{{ route('event_info') }}">View Events</a></li>
            </ul>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-072-printer"></i>
                <span class="nav-text">Booking Details</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('booking_details') }}">Visit Page Bookings</a></li>
            </ul>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-072-printer"></i>
                <span class="nav-text">Muso Membership</span>
            </a>
            <ul aria-expanded="false">
                <!-- <li><a href="{{ route('addMembership') }}">Add Membership</a></li> -->
                <li><a href="{{ route('getMemberShipData') }}">View Membership List</a></li>
                <li><a href="{{ route('schoolEvent') }}">View School Event</a></li>
                <li><a href="{{ route('viewVisit_hours') }}">View Visit Hours</a></li>
                 <li><a href="{{ route('visitMemberForm') }}">View Membership enquiry</a></li>
                 <li><a href="{{ route('school_enquiry_details') }}">View School enquiry</a></li>
            </ul>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-072-printer"></i>
                <span class="nav-text">Imagine Doodle</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('add_prompt') }}">Add Prompt</a></li>
                <li><a href="{{ route('getPromptData') }}">View Prompt</a></li>
                <li><a href="{{ route('doodle_details') }}">View Doodle</a></li>
            </ul>
        </li>

        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-072-printer"></i>
                <span class="nav-text">Explore Section</span>
            </a>
            <ul aria-expanded="false">
               <!--  <li><a href="{{ route('view_section_tab_form') }}">Add Explore</a></li> -->
                <li><a href="{{ route('get_explore_details') }}">View Explore</a></li>
                {{-- <li><a href="{{ route('getPromptData') }}">View Prompt</a></li> --}}
            </ul>
        </li>
        {{-- homepage email --}}
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-072-printer"></i>
            <span class="nav-text">Homepage</span>
        </a>
         <ul aria-expanded="false">
            <li><a href="{{ route('view_email_newsletter') }}">View Emails</a></li>
        </ul>
        <ul aria-expanded="false">
            <li><a href="{{ route('show_homepage_videos') }}">TV Video</a></li>
        </ul>
    </li>
        </ul>
    </div>
</div>

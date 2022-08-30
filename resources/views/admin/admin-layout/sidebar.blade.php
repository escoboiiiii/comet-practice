<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li class="active"> 
                    <a href="index.html"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                @if (in_array('Client',json_decode(Auth::guard('Admin') -> user() -> roles -> permission)))
                <li> 
                    <a href="appointment-list.html"><i class="fe fe-layout"></i> <span>Client</span></a>
                </li>
                @endif
                @if (in_array('Team',json_decode(Auth::guard('Admin') -> user() -> roles -> permission)))
                <li> 
                    <a href="specialities.html"><i class="fe fe-users"></i> <span>Team</span></a>
                </li>
                @endif
                @if (in_array('Testimonial',json_decode(Auth::guard('Admin') -> user() -> roles -> permission)))
                <li> 
                    <a href="doctor-list.html"><i class="fe fe-user-plus"></i> <span>Testimonial</span></a>
                </li>
                @endif
                @if (in_array('Setting',json_decode(Auth::guard('Admin') -> user() -> roles -> permission)))
                <li> 
                    <a href="patient-list.html"><i class="fe fe-user"></i> <span>Setting</span></a>
                </li>
                @endif
                @if (in_array('Slider',json_decode(Auth::guard('Admin') -> user() -> roles -> permission)))
                <li> 
                    <a href="patient-list.html"><i class="fe fe-user"></i> <span>Slider</span></a>
                </li>
                @endif
                @if (in_array('Post',json_decode(Auth::guard('Admin') -> user() -> roles -> permission)))
                <li> 
                    <a href="reviews.html"><i class="fe fe-star-o"></i> <span>Post</span></a>
                </li> 
                @endif
                <li class="menu-title"> 
                    <span>Pages</span>
                </li>
                @if (in_array('Users',json_decode(Auth::guard('Admin') -> user() -> roles -> permission)))
                <li class="menu-title"> 
                    <span>Users</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-layout"></i> <span> Users </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('user.index') }}">User</a></li>
                        <li><a href="{{ route('role.index') }}">Role</a></li>
                        <li><a href="{{ route('permission.index') }}">Permission</a></li>
                    </ul>
                </li>  
                @endif               
                
 
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
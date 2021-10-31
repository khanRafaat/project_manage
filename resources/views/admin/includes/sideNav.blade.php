<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">

            <a href="{{route('dashboard')}}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{asset('backend/images/logo.png')}}" srcset="./images/logo2x.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="{{asset('backend/images/logo-dark.png')}}" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{route('dashboard')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->





                    @role('Administrator')

                   <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-notes-alt"></em></span>
                            <span class="nk-menu-text">Projects</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.create')}}" class="nk-menu-link"><span class="nk-menu-text">Create Task</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.index')}}" class="nk-menu-link"><span class="nk-menu-text">View Task List</span></a>
                            </li>
                          
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Users</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('user.manage')}}" class="nk-menu-link"><span class="nk-menu-text">Edit Users</span></a>
                            </li>
                           
                          
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->


                 @endrole

                 @role('Assingee')

                 <li class="nk-menu-item has-sub">
                     <a href="#" class="nk-menu-link nk-menu-toggle">
                         <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                         <span class="nk-menu-text">Projects</span>
                     </a>
                     <ul class="nk-menu-sub">
                      
                         <li class="nk-menu-item">
                             <a href="{{route('assignee.index')}}" class="nk-menu-link"><span class="nk-menu-text">View Task List</span></a>
                         </li>
                       
                     </ul><!-- .nk-menu-sub -->
                 </li><!-- .nk-menu-item -->
              @endrole


                 
                





                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
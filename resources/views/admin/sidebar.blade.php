<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('site.index') }}">
        <div class="sidebar-brand-icon ">
            {{--  <i class="fas fa-laugh-wink"></i>  --}}
            <i class="fas fa-business-time"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- About -->
    @if (Gate::any(['add_about','all_about','delete_about','edit_about']))
     <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseclinet"
                aria-expanded="true" aria-controls="collapseclinet">
                {{--  <i class="fas fa-fw fa-cog"></i>  --}}
                <i class="fas fa-users-cog"></i>
                <span>About</span>
            </a>
            <div id="collapseclinet" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.about.index') }}">all about</a>
                    <a class="collapse-item" href="{{ route('admin.about.create') }}">add about</a>
                    <a class="collapse-item" href="{{ route('admin.about.trash') }}">Trash</a>
                </div>
            </div>
        </li>
    @endif

    <!-- Award -->
    @if (Gate::any(['add_award','all_award','delete_award','edit_award']))
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAward"
                aria-expanded="true" aria-controls="collapseAward">
                {{--  <i class="fas fa-fw fa-cog"></i>  --}}
                <i class="fas fa-users-cog"></i>
                <span>Award</span>
            </a>
            <div id="collapseAward" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.award.index') }}">all award</a>
                    <a class="collapse-item" href="{{ route('admin.award.create') }}">add award</a>
                    <a class="collapse-item" href="{{ route('admin.award.trash') }}">Trash</a>
                </div>
            </div>
        </li>
    @endif

    <!-- Partner -->
    @if (Gate::any(['add_partner','all_partner','delete_partner','edit_partner']))
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepartner"
                aria-expanded="true" aria-controls="collapsepartner">
                {{--  <i class="fas fa-fw fa-cog"></i>  --}}
                <i class="fas fa-users-cog"></i>
                <span>Partner</span>
            </a>
            <div id="collapsepartner" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.partner.index') }}">all partner</a>
                    <a class="collapse-item" href="{{ route('admin.partner.create') }}">add partner</a>
                </div>
            </div>
        </li>
    @endif

      <!-- Department -->
    @if (Gate::any(['add_department','all_department','delete_department','edit_department']))
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedepartment"
            aria-expanded="true" aria-controls="collapsedepartment">
            <i class="fas fa-users-cog"></i>
            <span>Department</span>
        </a>
        <div id="collapsedepartment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.department.index') }}">all department</a>
                <a class="collapse-item" href="{{ route('admin.department.create') }}">add department</a>
                <a class="collapse-item" href="{{ route('admin.department.trash') }}">Trash</a>
            </div>
        </div>
        </li>
    @endif

    <!-- Doctor -->
    @if (Gate::any(['add_doctor','all_doctor','delete_doctor','edit_doctor']))
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDepartmentDetail"
                aria-expanded="true" aria-controls="collapseDepartmentDetail">
                <i class="fas fa-users-cog"></i>
                <span>Doctor</span>
            </a>
            <div id="collapseDepartmentDetail" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.doctor.index') }}">all doctor</a>
                    <a class="collapse-item" href="{{ route('admin.doctor.create') }}">add doctor</a>
                    <a class="collapse-item" href="{{ route('admin.doctor.trash') }}">Trash</a>
                </div>
            </div>
        </li>
    @endif

      <!-- Feature -->
      @if (Gate::any(['all_feature','add_feature','delete_feature','edit_feature']))
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefeature"
                aria-expanded="true" aria-controls="collapsefeature">
                <i class="fas fa-users-cog"></i>
                <span>Feature</span>
            </a>
            <div id="collapsefeature" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.feature.index') }}">all feature</a>
                    <a class="collapse-item" href="{{ route('admin.feature.create') }}">add feature</a>
                    <a class="collapse-item" href="{{ route('admin.feature.trash') }}">Trash</a>
                </div>
            </div>
        </li>
      @endif

    <!-- Qualification -->
    @if (Gate::any(['all_qualification','add_qualification','delete_qualification','edit_qualification']))
        <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQualification"
                    aria-expanded="true" aria-controls="collapseQualification">
                    <i class="fas fa-users-cog"></i>
                    <span>Qualification</span>
                </a>
                <div id="collapseQualification" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.qualification.index') }}">all qualification</a>
                        <a class="collapse-item" href="{{ route('admin.qualification.create') }}">add qualification</a>
                        <a class="collapse-item" href="{{ route('admin.qualification.trash') }}">Trash</a>
                    </div>
                </div>
            </li>
    @endif

    <!-- Testimonial -->
    @if (Gate::any(['all_testimonial','add_testimonial','delete_testimonial','edit_testimonial']))
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTestimonial"
                aria-expanded="true" aria-controls="collapseTestimonial">
                <i class="fas fa-users-cog"></i>
                <span>Testimonial</span>
            </a>
            <div id="collapseTestimonial" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.testimonial.index') }}">all testimonial</a>
                    <a class="collapse-item" href="{{ route('admin.testimonial.create') }}">add testimonial</a>
                    <a class="collapse-item" href="{{ route('admin.testimonial.trash') }}">Trash</a>
                </div>
            </div>
        </li>
    @endif

   <!-- Nav Item - User-->
    @if (Gate::any(['all_user','delete_user']))
        <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>User</span></a>
            </li>
    @endif


     <!-- Schedule -->
     @if (Gate::any(['all_schedule','add_schedule','delete_schedule','edit_schedule']))
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSchedule"
                aria-expanded="true" aria-controls="collapseSchedule">
                <i class="fas fa-users-cog"></i>
                <span>Schedule</span>
            </a>
            <div id="collapseSchedule" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.schedule.index') }}">all schedule</a>
                    <a class="collapse-item" href="{{ route('admin.schedule.create') }}">add schedule</a>
                    <a class="collapse-item" href="{{ route('admin.schedule.trash') }}">Trash</a>
                </div>
            </div>
        </li>
     @endif


    <!-- Roles -->
    @if (Gate::any(['all_role','add_role','delete_role','edit_role']))
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.role.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Roles</span></a>
        </li>
    @endif


    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

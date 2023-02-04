@php

$page_name = '';

$prefix = Request::route()->getprefix();
$route = Route::current()->getName();




@endphp




<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						  <h3><b>MrichTech</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route == 'dashboard' ? 'active' : '') }}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		

    @if(Auth::user()->role == 'Admin')
        <li class="treeview {{ ($prefix == '/user' ? 'active' : '') }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Manage Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'user.view' || $route == 'user.edit' ? 'active' : '') }}"><a href="{{ route('user.view') }}"><i class="ti-more"></i>View Users</a></li>
            <li class="{{ ($route == 'user.add' ? 'active' : '') }}"><a href="{{ route('user.add') }}"><i class="ti-more"></i>Add Users</a></li>
          </ul>
        </li> 
        @endif

		  
        <li class="treeview {{ ($prefix == '/profile' ? 'active' : '') }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'profile.view' || $route == 'profile.edit' ? 'active' : '') }}"><a href="{{ route('profile.view') }}"><i class="ti-more"></i>User Profile</a></li>
            <li class="{{ ($route == 'password.view' ? 'active' : '') }}"><a href="{{ route('password.view') }}"><i class="ti-more"></i>Change Password</a></li>
          </ul>
        </li>	  



        <li class="treeview {{ ($prefix == '/setup' ? 'active' : '') }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Setup Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'student.class.view' || $route == 'student.class.edit' ? 'active' : '') }}"><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Student Class</a></li>
            <li class="{{ ($route == 'student.year.view' || $route == 'student.year.edit' ? 'active' : '') }}"><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Student Year</a></li>
            <li class="{{ ($route == 'student.group.view' || $route == 'student.group.edit' ? 'active' : '') }}"><a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Student Group</a></li>
            <li class="{{ ($route == 'student.shift.view' || $route == 'student.shift.edit' ? 'active' : '') }}"><a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Student Shift</a></li>
            <li class="{{ ($route == 'fee.category.view' || $route == 'fee.category.edit' ? 'active' : '') }}"><a href="{{ route('fee.category.view') }}"><i class="ti-more"></i>Fee Category</a></li>
            <li class="{{ ($route == 'fee.amount.view' || $route == 'fee.amount.add' || $route == 'fee.amount.edit' ? 'active' : '') }}"><a href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Fee Category Amount</a></li>
            <li class="{{ ($route == 'exam.type.view' || $route == 'exam.type.add' || $route == 'exam.type.edit' ? 'active' : '') }}"><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exam Type</a></li>
            <li class="{{ ($route == 'school.subject.view' || $route == 'school.subject.add' || $route == 'school.subject.edit' ? 'active' : '') }}"><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>Subject</a></li>
            <li class="{{ ($route == 'assign.subject.view' || $route == 'assign.subject.add' || $route == 'school.subject.edit' || $route == 'assign.subject.details' ? 'active' : '') }}"><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Assign Subject</a></li>
            <li class="{{ ($route == 'designation.view' || $route == 'designation.add' || $route == 'designation.edit' ? 'active' : '') }}"><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designation</a></li>


          </ul>
        </li> 



        <li class="treeview {{ ($prefix == '/student' ? 'active' : '') }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Student Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'student.registration.view' || $route == 'student.registration.edit' ? 'active' : '') }}"><a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Student Registration</a></li>
            <li class="{{ ($route == 'roll.generate.view' || $route == 'roll.generate.edit' ? 'active' : '') }}"><a href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Roll Generator</a></li>
            <li class="{{ ($route == 'registration.fee.view' || $route == 'registration.fee.edit' ? 'active' : '') }}"><a href="{{ route('registration.fee.view') }}"><i class="ti-more"></i>Registration Fee</a></li>
            <li class="{{ ($route == 'monthly.fee.view' || $route == 'monthly.fee.edit' ? 'active' : '') }}"><a href="{{ route('monthly.fee.view') }}"><i class="ti-more"></i>Monthly Fee</a></li>
            <li class="{{ ($route == 'exam.fee.view' || $route == 'exam.fee.edit' ? 'active' : '') }}"><a href="{{ route('exam.fee.view') }}"><i class="ti-more"></i>Exam Fee</a></li>


          </ul>
        </li> 











		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
          </ul>
        </li>
		
		
		  
		<li>
          <a href="{{ route('admin.logout') }}">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
        </li> 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
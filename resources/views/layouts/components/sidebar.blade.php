	@if(auth()->user()->role == 'admin')
	{{-- Admin role --}}
	<div class="dlabnav">
		<div class="dlabnav-scroll">
			<ul class="metismenu" id="menu">
				<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
						<i class="fas fa-home"></i>
						<span class="nav-text">Dashboard</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
						{{-- <li><a href="{{ url('profile') }}">Profile</a></li> --}}
						{{-- <li><a href="index-2.html">Dashboard Dark</a></li>
						<li><a href="project-page.html">Project</a></li>
						<li><a href="contacts.html">Contacts</a></li>
						<li><a href="kanban.html">Kanban</a></li>
						<li><a href="calendar-page.html">Calendar</a></li>
						<li><a href="message.html">Messages</a></li>	 --}}
					</ul>
				</li>
				<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="fas fa-info-circle"></i>
						<span class="nav-text">Apps</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="{{ url('profile') }}">Profile</a></li>
						<li><a href="{{ route('admin.investment.plans') }}">Investment Plans</a></li>
						<li><a href="{{ route('admin.users') }}">Users</a></li>
						<li><a href="{{ route('admin.transactions') }}">Transactions</a></li>
						{{-- <li><a href="{{ route('admin.investments') }}">Investments</a></li>
						<li><a href="{{ route('admin.withdrawals') }}">Withdrawals</a></li>
						<li><a href="{{ route('referral') }}">Reffrals</a></li> --}}
						<li><a href="{{ route('admin.reports') }}">Reports</a></li>
					</ul>
				</li>
				
			</ul>
			{{-- <ul class="metismenu" id="menu">
				<li><a href="{{ route('dashboard') }}" href="javascript:void()" aria-expanded="false">
						<i class="fas fa-home"></i>
						<span class="nav-text">Dashboard</span>
					</a>
					<ul aria-expanded="false">
						
						<li><a href="#">Dashboard Light</a></li>
						<li><a href="#">Dashboard Dark</a></li>
						<li><a href="#">Project</a></li>
						<li><a href="#">Contacts</a></li>
						<li><a href="#">Kanban</a></li>
						<li><a href="#">Calendar</a></li>
						<li><a href="#">Messages</a></li>	
					</ul>
				</li>
				<li><a href="#"  href="javascript:void()" aria-expanded="false">
					<i class="fas fa-solid fa-shoe-prints"></i>
						<span class="nav-text">App</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="#">Profile</a></li>
					</ul>
				</li>
				<li><a href="#" href="javascript:void()" aria-expanded="false">
					<i class="fas fa-solid fa-chart-line"></i>
						<span class="nav-text">Activity Logs</span>
					</a>
				</li>
			</ul> --}}
			{{-- <div class="side-bar-profile">
				<div class="d-flex align-items-center justify-content-between mb-3">
					<div class="side-bar-profile-img">
						<img src="{{ asset("assets/images/user.jpg") }}" alt="">
					</div>
					<div class="profile-info1">
						<h4 class="fs-18 font-w500">Soeng Souy</h4>
						<span>example@mail.com</span>
					</div>
					<div class="profile-button">
						<i class="fas fa-caret-down scale5 text-light"></i>
					</div>
				</div>	
				<div class="d-flex justify-content-between mb-2 progress-info">
					<span class="fs-12"><i class="fas fa-star text-orange me-2"></i>Task Progress</span>
					<span class="fs-12">20/45</span>
				</div>
				<div class="progress default-progress">
					<div class="progress-bar bg-gradientf progress-animated" style="width: 45%; height:10px;" role="progressbar">
						<span class="sr-only">45% Complete</span>
					</div>
				</div>
			</div> --}}
			
			{{-- <div class="copyright">
				<p><strong>Fillow Saas Admin</strong> © 2021 All Rights Reserved</p>
				<p class="fs-12">Made with <span class="heart"></span> by DexignLabs</p>
			</div> --}}
		</div>
	</div>
	@endif
	
	@if(auth()->user()->role == 'user')
	{{-- User Role --}}
	<div class="dlabnav">
		<div class="dlabnav-scroll">
			<ul class="metismenu" id="menu">
				<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
						<i class="fas fa-home"></i>
						<span class="nav-text">Dashboard</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
					</ul>
				</li>
				<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="fas fa-info-circle"></i>
						<span class="nav-text">Apps</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="{{ url('profile') }}">Profile</a></li>
						<li><a href="{{ route('user.investments') }}">Investments</a></li>


						@php
							$approved_user = \App\Models\Transaction::where('user_id', auth()->id())
												->where('status', 1) // Assuming 1 is the status for approved
												->exists();
						@endphp
						@if($approved_user)
							<li><a href="{{ route('admin.transactions') }}">Transactions</a></li>
							<li><a href="{{ route('referral') }}">Reffrals</a></li>
							<li><a href="{{ route('admin.withdrawals') }}">Withdrawals</a></li>
						@endif
					</ul>
				</li>
				
			</ul>
		</div>
	</div>
	@endif
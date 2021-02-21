<div class="sidebar">
	<div class="sidebar-wrapper">
		<ul class="nav flex-column flex-nowrap overflow-hidden">
		<li class="nav-item">
	        <a class="nav-link" href="{{route('home')}}">
	          <i class="material-icons">home</i>
	            <p>Larablog</p>
	        </a>
      	</li>
		<li class="nav-item">
	        <a class="nav-link" href="{{route('dashboard')}}">
	          <i class="material-icons">dashboard</i>
	            <p>Dashboard</p>
	        </a>
      	</li>
      	<li class="nav-item">
	        <a class="nav-link" href="{{route('dashboard.users')}}">
	          <i class="material-icons">group</i>
	            <p>User Management</p>
	        </a>
      	</li>
		<li class="nav-item ">
			<a class="nav-link collapsed" data-toggle="collapse" href="#blogmanagement" aria-expanded="false">
				<i class="material-icons">filter_none</i>
				<p> Blog Management
					<b class="caret"></b>
				</p>
			</a>
			<div class="collapse" id="blogmanagement" style="">
				<ul class="nav">
					<li class="nav-item ">
						<a class="nav-link" href="{{ route('dashboard.blogs') }}">
							<span class="sidebar-mini"> B </span>
							<span class="sidebar-normal"> {{ __('Blogs')}} </span>
						</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="{{ route('dashboard.categories') }}">
							<span class="sidebar-mini"> C </span>
							<span class="sidebar-normal"> {{ __('Categories')}} </span>
						</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="{{ route('dashboard.tags') }}">
							<span class="sidebar-mini"> T </span>
							<span class="sidebar-normal"> {{ __('Tags')}} </span>
						</a>
					</li>
				</ul>
			</div>
		</li>
		</ul>
	</div>
</div>
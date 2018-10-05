<nav class="sidebar-drawer">
    <div class="sidebar-drawer__title">
        DashQ Menu
    </div>
    <ul class="sidebar-drawer__menu">
        <li class="sidebar-drawer__menu__item
        @if(request()->is('dashq'))
           sidebar-drawer__menu__item--active
        @endif

        ">
            <a href="{{route('dashq::home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
        </li>
        <li class="sidebar-drawer__menu__item
@if(request()->is('dashq/jobs'))
            sidebar-drawer__menu__item--active
@endif
">
            <a href="{{route('dashq::jobs')}}"><i class="fa fa-tasks" aria-hidden="true"></i> Jobs</a>
        </li>
        <li class="sidebar-drawer__menu__item
        @if(request()->is('dashq/failedjobs'))
            sidebar-drawer__menu__item--active
@endif
">
            <a href="{{route('dashq::failedjobs')}}"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Failed Jobs</a>
        </li>
    </ul>
    <a href="#" class="btn btn-toggle-menu sidebar-drawer__close-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
</nav>
<div class="overlay btn-toggle-menu">

</div>

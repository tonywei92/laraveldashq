<div class="col-lg-3 d-none d-lg-block">
    <div class="div sidebar">
        <ul class="sidebar__menu">
            <li class="sidebar__menu__item
            @if(request()->is('dashq'))
                sidebar__menu__item--active
            @endif
                ">
                <a href="{{route('dashq::home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
            </li>
            <li class="sidebar__menu__item
            @if(request()->is('dashq/jobs'))
                sidebar__menu__item--active
            @endif">
                <a href="{{route('dashq::jobs')}}"><i class="fa fa-tasks" aria-hidden="true"></i> Jobs</a>
            </li>
            <li class="sidebar__menu__item
            @if(request()->is('dashq/failedjobs'))
                sidebar__menu__item--active
            @endif
            ">
                <a href="{{route('dashq::failedjobs')}}"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                    Failed Jobs</a>
            </li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 header">
        <ul class="nav navbar-nav">
            <li><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false"><i
                        class="fa fa-building"></i>Mail<span
                        class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.mails') }}"><i class="fa fa-mail"></i>All Mails</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 header">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ URL::to( route('admin.profile', Auth::user()->id)) }}">Profile</a></li>
            <li><a href="{{ URL::to(route('auth.logout')) }}">Logout</a></li>
        </ul>
    </div>
</div>
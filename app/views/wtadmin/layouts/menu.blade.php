<!-- Navbar -->
<div class="navbar main-bar navbar-default navbar-fixed-top" style="float:left;width:100%;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{ URL::to('/') }}" class="">Brretail Management System</a> </li>
            </ul>
            <ul class="nav navbar-nav">
               

            </ul>
            @if (Auth::check())
            <ul class="nav navbar-nav pull-right">
            @if (Auth::user()->hasRole("admin"))
                 <li{{ (Request::is('merchant') ? ' class="active"' : '') }}><a href="{{{ URL::to('merchant') }}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li class="dropdown {{ (Request::is('merchant/grades*|merchant/terms*|merchant/categories*') ? ' active' : '') }}">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-tasks"></span> Management <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li{{ (Request::is('merchant/products*') ? ' class="active"' : '') }}><a href="{{{ URL::to('sadmin/products') }}}"><span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;Products Management</a></li>
                        <li class="divider"></li>
<!--                        <li{{ (Request::is('merchant/categories*') ? ' class="active"' : '') }}><a href="{{{ URL::to('sadmin/categories') }}}"><span class="glyphicon glyphicon-cloud"></span>&nbsp;&nbsp;Category Management</a></li>
                        <li class="divider"></li>-->
                        <li{{ (Request::is('merchant/orders*') ? ' class="active"' : '') }}><a href="{{{ URL::to('sadmin/orders') }}}"><span class="glyphicon glyphicon-cloud"></span>&nbsp;&nbsp;Orders Management</a></li>
                        <li class="divider"></li>
                        <li{{ (Request::is('merchant/transcation*') ? ' class="active"' : '') }}><a href="{{{ URL::to('sadmin/transaction') }}}"><span class="glyphicon glyphicon-euro"></span>&nbsp;&nbsp;Transactions Management</a></li>
                    </ul> 
                </li>
<!--                <li class="dropdown{{ (Request::is('merchant/users*|merchant/roles*|merchant/permissions*') ? ' active' : '') }}">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{{ URL::to('sadmin/users') }}}">
                        <span class="glyphicon glyphicon-user"></span> Users <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                          <li{{ (Request::is('merchant/users*') ? ' class="active"' : '') }}><a href="{{{ URL::to('sadmin/users') }}}"><span class="glyphicon glyphicon-user"></span> Users</a></li>
                        <li class="divider"></li>
                        <li{{ (Request::is('merchant/roles*') ? ' class="active"' : '') }}><a href="{{{ URL::to('sadmin/roles') }}}"><span class="glyphicon glyphicon-user"></span> Roles</a></li>
                        <li class="divider"></li>
                        <li{{ (Request::is('merchant/permissions*') ? ' class="active"' : '') }}><a href="{{{ URL::to('sadmin/permissions') }}}"><span class="glyphicon glyphicon-user"></span> Permissions List</a></li>
                        
                        
                    </ul>
                </li>-->
            

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span> Drivers Management	<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                            <li><a href="{{{ URL::to('sadmin/drivers/approveDrivers') }}}"><span class="glyphicon glyphicon-user"></span> Approved Drivers</a></li>
                            <li class="divider"></li>
                            <li><a href="{{{ URL::to('sadmin/drivers') }}}"><span class="glyphicon glyphicon-user"></span> Not Approved Drivers</a></li>
                            <li class="divider"></li>
                             
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-globe"></span> Merchant Info	<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                            <li><a href="{{{ URL::to('sadmin/info') }}}"><span class="glyphicon glyphicon-info-sign"></span> Merchant Payment Info</a></li>
                            <li class="divider"></li>
                            <li><a href="{{{ URL::to('sadmin/info/storeProfile/'.Auth::user()->s_id) }}}"><span class="glyphicon glyphicon-info-sign"></span> Store Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="{{{ URL::to('sadmin/store-terms') }}}"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Time Management</a></li>
                             
                    </ul>
                </li>
                @endif
                <li class="divider-vertical"></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span> {{{ Auth::user()->username }}}	<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{{ URL::to('user/settings') }}}"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="{{{ URL::to('user/logout') }}}"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
            @else
            <ul class="nav navbar-nav pull-right"> 
            <li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">Login</a></li>
            <!--<li {{ (Request::is('user/register') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">{{{ Lang::get('site.sign_up') }}}</a></li>--> 
            </ul>
            @endif
        </div>
    </div>
</div>
<!-- ./ navbar -->


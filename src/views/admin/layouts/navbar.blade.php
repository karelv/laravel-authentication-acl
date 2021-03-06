<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid margin-right-15">
        <div class="navbar-header">
            <a class="navbar-brand bariol-thin" href="#">{{$app_name}}</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-main-menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="nav-main-menu">
            <ul class="nav navbar-nav">
                @if(isset($menu_items))
                    @foreach($menu_items as $item)
                        <li class="{{Jacopo\Library\Views\Helper::get_active_route_name($item->getRoute())}}"> <a href="{{$item->getLink()}}">{{$item->getName()}}</a></li>
                    @endforeach
                @endif
            </ul>
            <div class="navbar-nav nav navbar-right">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="dropdown-profile">
                        {{-- get the user avatar --}}
                        @if(isset($logged_user) && $logged_user->user_profile()->count())
                            <img src="{{$logged_user->user_profile()->first()->presenter()->avatar_src}}" width="30px">
                        @else
                            <img src="{{URL::asset('/packages/jacopo/laravel-authentication-acl/images/avatar.png')}}" width="30px">
                        @endif
                        <span id="nav-email">{{isset($logged_user) ? $logged_user->email : 'User'}}</span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @if((new Jacopo\Authentication\Helpers\FileRouteHelper())->hasPermForRoute('users'))
                            <li>
                                <a href="{{URL::action('Jacopo\Authentication\Controllers\UserController@editProfile',['user_id' => isset($logged_user->id) ? $logged_user->id : ''])}}"><i class="fa fa-user"></i> Your profile</a>
                            </li>
                            <li class="divider"></li>
                        @endif
                        <li>
                            <a href="{{URL::action('Jacopo\Authentication\Controllers\AuthController@getLogout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </div><!-- nav-right -->
        </div><!--/.nav-collapse -->
    </div>
</div>
<div class="side-menu" id="admin-side-menu">
<aside class="menu m-t-30 m-l-10">
<p class="menu-label">
General
</p>
<ul class="menu-list">
<li><a href="{{route('manage.dashboard')}}" class="{{Nav::isRoute('manage.dashboard', 'is-active')}}">Dashboard</a></li>
</ul>
<p class="menu-label">
    Content
    </p>
    <ul class="menu-list">
    <li><a href="{{route('posts.index')}}" class="{{Nav::isResource('posts ', 2,  'is-active')}}">Blog Posts</a></li>
        {{-- <li><a class="has-submenu">Accordion part 2</a>
            <ul class="submenu">
           <li> <a href="{{route('permissions.index')}}">Permissions</a></li>
            <li> <a href="{{route('roles.index')}}">Roles</a></li>
            </ul>
            </li> --}}
    </ul>

<p class="menu-label">
    Administration
    </p>
    <ul class="menu-list">
    <li><a href="{{route('users.index')}}" class="{{Nav::isResource('users', NULL,  'is-active')}}">Manage Users</a></li>
    <li><a class="has-submenu {{Nav::hasSegment(['roles', 'permissions'], 2, $activeClass="is-active")}}">Roles &amp; Permissions</a>
    <ul class="submenu">
        <li> <a href="{{route('permissions.index')}}" class="{{Nav::isResource('permissions', NULL, 'is-active')}}">Permissions</a></li>
        <li> <a href="{{route('roles.index')}}"  class="{{Nav::isResource('roles', NULL, 'is-active')}}">Roles</a></li>
    </ul>
    </li>
    <li><a class="has-submenu">Accrodion part 1</a>
        <ul class="submenu">
        <li> <a href="{{route('permissions.index')}}" class="{{Nav::isResource('permissions', NULL, 'is-active')}}">Permissions</a></li>
        <li> <a href="{{route('roles.index')}}"  class="{{Nav::isResource('roles', NULL, 'is-active')}}">Roles</a></li>
        </ul>
        </li>
        <li><a class="has-submenu">Accordion part 2</a>
            <ul class="submenu">
           <li> <a href="{{route('permissions.index')}}">Permissions</a></li>
            <li> <a href="{{route('roles.index')}}">Roles</a></li>
            </ul>
            </li>
    </ul>

</aside>

</div>
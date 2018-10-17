<div id="be-navbar-collapse" class="navbar-collapse collapse">
    <ul class="navbar-nav">
        <li class="nav-item"><a href="/admin" class="nav-link">系统模块</a></li>
        <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
               class="nav-link dropdown-toggle">
                扩展模块 <span class="mdi mdi-caret-down"></span>
            </a>
            <div role="menu" class="dropdown-menu">
                @foreach(\HDModule::getModulesLists(['Admin']) as $module)
                    <a href="/{{strtolower($module['name'])}}" class="dropdown-item"
                       onclick="sessionStorage.removeItem('current_menu_id');">{{strtolower($module['title'])}}</a>
                @endforeach
            </div>
        </li>
    </ul>
</div>
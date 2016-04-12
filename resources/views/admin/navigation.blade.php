<div class="header clearfix">
    <nav>
        <ul class="nav nav-pills pull-right">
            <li role="presentation" {{ (Request::is('*admin') ? 'class=active' : '') }}>
                <a href="{{ action('AdminController@index') }}">Nepatvirtinti</a>
            </li>
            <li role="presentation" {{ (Request::is('*admin/categories*') ? 'class=active' : '') }}>
                <a href="{{ action('CategoriesController@index') }}">Kategorijos</a>
            </li>
            <li role="presentation" {{ (Request::is('*admin/facilities-categories*') ? 'class=active' : '') }}>
                <a href="{{ action('FacilitiesCategoriesController@index') }}">Paslaugu kategorijos</a>
            </li>
            <li role="presentation" {{ (Request::is('*admin/organizations*') ? 'class=active' : '') }}>
                <a href="{{ action('OrganizationsController@index') }}">Įrašai</a>
            </li>
            <li role="presentation" {{ (Request::is('*admin/content*') ? 'class=active' : '') }}>
                    <a href="{{ action('ContentController@index') }}">Turinys</a></li>
            <li role="presentation"><a href="{{ action('Auth\AuthController@getLogout') }}">Atsijungti</a></li>
        </ul>
    </nav>
    <h3 class="text-muted">Grožio paieška</h3>
</div>
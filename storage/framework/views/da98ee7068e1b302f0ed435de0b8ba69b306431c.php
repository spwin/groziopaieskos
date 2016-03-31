<div class="header clearfix">
    <nav>
        <ul class="nav nav-pills pull-right">
            <li role="presentation" <?php echo e((Request::is('*admin') ? 'class=active' : '')); ?>>
                <a href="<?php echo e(action('AdminController@index')); ?>">Nepatvirtinti</a>
            </li>
            <li role="presentation" <?php echo e((Request::is('*admin/categories*') ? 'class=active' : '')); ?>>
                <a href="<?php echo e(action('CategoriesController@index')); ?>">Kategorijos</a>
            </li>
            <li role="presentation" <?php echo e((Request::is('*admin/organizations*') ? 'class=active' : '')); ?>>
                <a href="<?php echo e(action('OrganizationsController@index')); ?>">Įrašai</a>
            </li>
            <li role="presentation"><a href="#">Turinys</a></li>
            <li role="presentation"><a href="<?php echo e(action('Auth\AuthController@getLogout')); ?>">Atsijungti</a></li>
        </ul>
    </nav>
    <h3 class="text-muted">Grožio paieška</h3>
</div>
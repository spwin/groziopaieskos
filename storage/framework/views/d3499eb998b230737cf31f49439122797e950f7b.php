<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(Session::has('flash_notification.message')): ?>
        <div class="alert alert-<?php echo e(Session::get('flash_notification.level')); ?>">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo e(Session::get('flash_notification.message')); ?>

        </div>
    <?php endif; ?>
    <h2>Kategorijos</h2>
    <p><a href="<?php echo e(action('CategoriesController@create')); ?>"><i class="fa fa-plus-circle fa-fw"></i>Pridėti kategoriją</a></p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Order</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($categories as $category): ?>
            <tr>
                <td><?php echo e($category->id); ?></td>
                <td><img width="50" src="<?php echo e(URL::to('/')); ?>/uploads/<?php echo e($category->image); ?>" /></td>
                <td><?php echo e($category->name_plural); ?></td>
                <td><?php echo e($category->order); ?></td>
                <td>
                    <a href="<?php echo e(action('FacilitiesController@index', $category->id)); ?>" class="btn btn-xs btn-primary">Paslaugos</a>
                    <a href="<?php echo e(action('CategoriesController@edit', $category->id)); ?>" class="btn btn-xs btn-success">Keisti</a>
                    <?php echo Form::open([
                    'method' => 'DELETE',
                    'action' => ['CategoriesController@destroy', $category->id],
                    'class' => 'inline-block',
                    'onclick'=> 'return confirm("Are you sure?")'
                    ]); ?>

                    <?php echo Form::submit('Pašalinti', ['class' => 'btn btn-danger btn-xs']); ?>

                    <?php echo Form::close(); ?>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
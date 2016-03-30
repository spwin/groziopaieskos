<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(Session::has('flash_notification.message')): ?>
        <div class="alert alert-<?php echo e(Session::get('flash_notification.level')); ?>">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo e(Session::get('flash_notification.message')); ?>

        </div>
    <?php endif; ?>
    <a href="<?php echo e(action ('CategoriesController@index')); ?>" class="mb-20px block"><i class="fa fa-arrow-left fa-fw"></i>Atgal</a>
    <h2>Paslaugos (<?php echo e($category->name_plural); ?>)</h2>
    <p><a href="<?php echo e(action('FacilitiesController@create', ['category' => $category->id])); ?>"><i class="fa fa-plus-circle fa-fw"></i>Pridėti paslaugą</a></p>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($facilities as $facility): ?>
            <tr>
                <td><?php echo e($facility->id); ?></td>
                <td><?php echo e($facility->name); ?></td>
                <td>
                    <a href="<?php echo e(action('FacilitiesController@edit', $facility->id)); ?>" class="btn btn-xs btn-success">Keisti</a>
                    <?php echo Form::open([
                    'method' => '',
                    'action' => ['FacilitiesController@destroy', $facility->id],
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
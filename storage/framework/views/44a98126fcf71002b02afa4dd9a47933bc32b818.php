<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php foreach($cities as $city): ?>
        <?php echo e($city->name); ?> <br/>
    <?php endforeach; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
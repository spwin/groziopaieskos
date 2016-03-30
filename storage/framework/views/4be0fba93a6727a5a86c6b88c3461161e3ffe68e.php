<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="col-sm-12">
        <a href="<?php echo e(action ('FacilitiesController@index', $category->id)); ?>" class="mb-20px block"><i class="fa fa-arrow-left fa-fw"></i>Atgal</a>
        <h2>Nauja paslauga (<?php echo e($category->name_plural); ?>)</h2>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <?php foreach($errors->all() as $error): ?>
                    <p><?php echo e($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-6">
                <?php echo Form::model($facility, [
                'action' => ['FacilitiesController@update', $facility->id],
                'class' => 'pure-form pure-form-aligned',
                'method' => ''
                ]); ?>

                <div class="form-group">
                    <?php echo Form::label('name', 'Paslaugos pavadinimas:', ['class' => 'control-label']); ?>

                    <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

                </div>

                <?php echo Form::submit('Pridėti', ['class' => 'btn btn-success btn-medium']); ?>


                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="col-sm-12">
        <a href="<?php echo e(action ('CategoriesController@index')); ?>" class="mb-20px block"><i class="fa fa-arrow-left fa-fw"></i>Atgal</a>
        <h2>Kategorijos redagavimas</h2>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <?php foreach($errors->all() as $error): ?>
                    <p><?php echo e($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-6">
                <?php echo Form::model($category, [
                'action' => ['CategoriesController@update', $category->id],
                'class' => 'pure-form pure-form-aligned',
                'role' => 'form',
                'files' => true,
                'method' => 'PATCH'
                ]); ?>

                <div class="form-group">
                    <?php echo Form::label('name_single', 'Kategorijos pavainimas (vienaskaita):', ['class' => 'control-label']); ?>

                    <?php echo Form::text('name_single', null, ['class' => 'form-control', 'required' => 'required']); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('name_plural', 'Kategorijos pavainimas (daugiskaita):', ['class' => 'control-label']); ?>

                    <?php echo Form::text('name_plural', null, ['class' => 'form-control', 'required' => 'required']); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('slug', 'URL:', ['class' => 'control-label']); ?>

                    <?php echo Form::text('slug', null, ['class' => 'form-control', 'required' => 'required']); ?>

                    <p class="help-block">Šis laukelis privalo būti unikalus.</p>
                </div>

                <div class="form-group">
                    <?php echo Form::label('image', 'Kategorijos paveiksliukas:', ['class' => 'control-label']); ?>

                    <img class="block mb-20px" src="<?php echo e(URL::to('/')); ?>/uploads/<?php echo e($category->image); ?>" width="50"/>
                    <?php echo Form::file('image'); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('order', 'Eiliškumas:', ['class' => 'control-label']); ?>

                    <?php echo Form::input('number', 'order', null, ['class' => 'form-control', 'required' => 'required']); ?>

                </div>

                <?php echo Form::submit('Pridėti', ['class' => 'btn btn-success btn-medium']); ?>


                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="main-container">

        <div class="main-header">
            <p>Registracija</p>
            <div class="registracija-button current"><p>Juridiniai asmenys</p></div>
            <div class="registracija-button"><p>Individuali veikla</p></div>
        </div>

        <div class="form-container">

            <?php echo Form::open([
                'action' => ['FrontendController@store', 'company'],
                'class' => 'registracija-form',
                'role' => 'form',
                'files' => true,
                'method' => ''
                ]); ?>

                <p>Vartotojas</p>

                <div class="first-form-line">
                    <div class="inputs">
                        <?php echo Form::label('title', 'Įmonės pavadinimas '); ?>

                        <?php echo Form::text('title', null, ['required' => 'required']); ?>

                    </div>
                    <div class="inputs">
                        <?php echo Form::label('email', 'El. paštas '); ?>

                        <?php echo Form::input('email', 'email', null, ['required' => 'required']); ?>

                    </div>
                    <div>
                        <div class="overlay-layer">Logo</div>
                        <?php echo Form::file('image', ['class' => 'upload_btn']); ?>

                    </div>
                </div>

                <div class="registracija-veikla">

                    <p>Veikla</p>
                    <div class="sidebar-icons">
                        <?php foreach($categories as $category): ?>
                            <div class="sidebar-icon category-facilities" data-id="<?php echo e($category->id); ?>">
                                <div class="icon-image">
                                    <img src="<?php echo e(URL::to('/')); ?>/uploads/<?php echo e($category->image); ?>" alt="grozio salonai">
                                </div>
                                <p><?php echo e($category->name_single); ?></p>
                            </div>
                        <?php endforeach; ?>
                        <?php echo Form::hidden('category', null); ?>

                    </div>

                </div>

                <div class="second-form-line">

                    <div class="inputs">
                        <?php echo Form::label('region', 'Apskritis'); ?>

                        <?php echo Form::select('region', $regions, null, ['required' => 'required']); ?>

                    </div>
                    <div class="inputs">
                        <?php echo Form::label('city', 'Rajonas'); ?>

                        <?php echo Form::select('city', $cities, null, ['required' => 'required']); ?>

                    </div>
                    <div class="inputs">
                        <?php echo Form::label('place', 'Miestas'); ?>

                        <?php echo Form::text('place', null, ['id' => 'q', 'required' => 'required']); ?>

                    </div>
                    <div class="inputs">
                        <?php echo Form::label('address', 'Adresas'); ?>

                        <?php echo Form::text('address', null, ['required' => 'required']); ?>

                    </div>
                    <div class="inputs">
                        <?php echo Form::label('imones_kodas', 'Įmonės kodas'); ?>

                        <?php echo Form::text('imones_kodas', null, ['required' => 'required']); ?>

                    </div>
                    <div class="inputs">
                        <?php echo Form::label('pvm_kodas', 'PVM kodas'); ?>

                        <?php echo Form::text('pvm_kodas', null, ['required' => 'required']); ?>

                    </div>
                    <div class="inputs">
                        <?php echo Form::label('phone', 'Telefonas'); ?>

                        <?php echo Form::text('phone', null, ['required' => 'required']); ?>

                    </div>
                    <div class="inputs">
                        <?php echo Form::label('website', 'Internetinis puslapis'); ?>

                        <?php echo Form::text('website', null, ['required' => 'required']); ?>

                    </div>
                    <div class="darbo-laikas">
                        <p>Darbo Laikas:</p>

                        <div class="diena">
                            <p>
                                <input id="pirmadcheck" name="open_time[monday][open]" type="checkbox">
                                <label for="pirmadcheck"><span></span></label>
                                <label for="pirmadienisslider">Pirmadienis:</label>
                                <input type="text" name="open_time[monday][time]" id="pirmadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider1" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="antradcheck" name="open_time[tuesday][open]" type="checkbox">
                                <label for="antradcheck"><span></span></label>
                                <label for="antradienisslider">Antradienis:</label>
                                <input type="text" name="open_time[tuesday][time]" id="antradienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider2" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="treciadcheck" name="open_time[wednesday][open]" type="checkbox">
                                <label for="treciadcheck"><span></span></label>
                                <label for="treciadienisslider">Trečiadienis:</label>
                                <input type="text" name="open_time[wednesday][time]" id="treciadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider3" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="ketvirtadcheck" name="open_time[thursday][open]" type="checkbox">
                                <label for="ketvirtadcheck"><span></span></label>
                                <label for="ketvirtadienisslider">Ketvirtadienis:</label>
                                <input type="text" name="open_time[thursday][time]" id="ketvirtadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider4" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="penktadcheck" name="open_time[friday][open]" type="checkbox">
                                <label for="penktadcheck"><span></span></label>
                                <label for="penktadienisslider">Penktadienis:</label>
                                <input type="text" name="open_time[friday][time]" id="penktadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider5" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="sestadcheck" name="open_time[saturday][open]" type="checkbox">
                                <label for="sestadcheck"><span></span></label>
                                <label for="sestadienisslider">Šeštadienis:</label>
                                <input type="text" name="open_time[saturday][time]" id="sestadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider6" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="sekmadcheck" name="open_time[sunday][open]" type="checkbox">
                                <label for="sekmadcheck"><span></span></label>
                                <label for="sekmadienisslider">Sekmadienis:</label>
                                <input type="text" name="open_time[sunday][time]" id="sekmadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider7" class="sliders"></div>
                        </div>
                    </div>

                    <!-- Darbo laikas end -->

                    <div class="inputs">
                        <p>Apie įmonę</p>
                        <textarea name="description" rows="10" cols="70"></textarea>
                    </div>

                </div>


                <input type="submit" value="Siųsti užklausą">

                <?php foreach($categories as $category): ?>
                    <div class="paslaugu-sarasas facilities-<?php echo e($category->id); ?>">
                        <h3><?php echo e(strtoupper($category->name_plural)); ?></h3>
                        <div class="sarasas-wrapper">
                            <div class="sarasas-container">
                                <?php foreach($category->getFacilities()->get() as $facility): ?>
                                <input id="<?php echo e($category->id); ?>_<?php echo e($facility->id); ?>" type="checkbox" name="facilities[<?php echo e($category->id); ?>][<?php echo e($facility->id); ?>]">
                                <label for="<?php echo e($category->id); ?>_<?php echo e($facility->id); ?>"><span></span><?php echo e($facility->name); ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <input class="patvirtinti" type="submit" value="PATVIRTINTI">
                    </div>
                <?php endforeach; ?>

            <?php echo Form::close(); ?>


        </div>

    </div>
    <script type="text/javascript">
        $(function()
        {
            $( "#q" ).autocomplete({
                source: "<?php echo e(URL::to('/')); ?>/search/autocomplete",
                minLength: 3,
                select: function(event, ui) {
                    $('#q').val(ui.item.value);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
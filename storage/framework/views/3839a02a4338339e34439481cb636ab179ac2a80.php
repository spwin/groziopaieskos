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
                'action' => 'OrganizationsController@store',
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
                            <div class="sidebar-icon grozio-salonai-button">
                                <div class="icon-image">
                                    <img src="<?php echo e(URL::to('/')); ?>/uploads/<?php echo e($category->image); ?>" alt="grozio salonai">
                                </div>
                                <p><?php echo e($category->name_single); ?></p>
                            </div>
                        <?php endforeach; ?>

                        <div class="sidebar-icon grozio-salonai-button">
                            <div class="icon-image">
                                <img src="img/header-icons/grozio-salonai.png" alt="grozio salonai">
                            </div>
                            <p>Grožio salonai</p>
                        </div>

                        <div class="sidebar-icon soliariumai-button">
                            <div class="icon-image">
                                <img src="img/header-icons/soliariumai.png" alt="soliariumai">
                            </div>
                            <p>Soliariumai</p>
                        </div>

                        <div class="sidebar-icon tatuiruociu-salonai-button">
                            <div class="icon-image">
                                <img class="smaller-width" src="img/header-icons/tattoo.png" alt="grozio salonai">
                            </div>
                            <p>Tatuiruočių<span class="line-break"></span>salonai</p>
                        </div>

                        <div class="sidebar-icon spa-centrai-button">
                            <div class="icon-image">
                                <img class="smaller-width" src="img/header-icons/spa.png" alt="grozio salonai">
                            </div>
                            <p>SPA centrai</p>
                        </div>

                        <div class="sidebar-icon odontologijos-kabinetai-button">
                            <div class="icon-image">
                                <img class="smaller-width" src="img/header-icons/dantis.png" alt="grozio salonai">
                            </div>
                            <p>Odontologijos<span class="line-break"></span>kabinetai</p>
                        </div>

                        <div class="sidebar-icon kosmetologijos-kabinetai-button">
                            <div class="icon-image">
                                <img src="img/header-icons/kosmetologija.png" alt="grozio salonai">
                            </div>
                            <p>Kosmetologijos<span class="line-break"></span>kabinetai</p>
                        </div>

                        <div class="sidebar-icon sporto-klubai-button">
                            <div class="icon-image">
                                <img src="img/header-icons/sporto-klubai.png" alt="grozio salonai">
                            </div>
                            <p>Sporto klubai</p>
                        </div>

                    </div>

                </div>

                <div class="second-form-line">

                    <div class="inputs">
                        <label for="apskritis">Apskritis</label>
                        <select id="apskritis" name="apskritis">
                            <option value="Vilnius">Vilniaus</option>
                            <option value="Kaunas">Kauno</option>
                            <option value="Klaipeda">Klaipėdos</option>
                            <option value="Siauliai">Šiaulių</option>
                            <option value="Panevezys">Panevėžio</option>
                            <option value="Utena">Utenos</option>
                            <option value="Alytus">Alytaus</option>
                            <option value="Marijampole">Marijampolės</option>
                            <option value="Taurage">Tauragės</option>
                            <option value="Telsiai">Telšių</option>
                        </select>
                    </div>
                    <div class="inputs">
                        <label for="rajonas">Rajonas </label>
                        <select id="rajonas" name="rajonas">
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                            <option value="fiat">Fiat</option>
                            <option value="audi">Audi</option>
                        </select>
                    </div>
                    <div class="inputs">
                        <label for="miestas">Miestas </label>
                        <input id="miestas" type="text" name="miestas" required />
                    </div>
                    <div class="inputs">
                        <label for="uab-address">Adresas </label>
                        <input id="uab-address" type="text" name="uab-address" required />
                    </div>
                    <div class="inputs">
                        <label for="imones-kodas">Įmonės kodas </label>
                        <input id="imones-kodas" type="text" name="imones-kodas" required />
                    </div>
                    <div class="inputs">
                        <label for="pvm-kodas">PVM kodas </label>
                        <input id="pvm-kodas" type="text" name="pvm-kodas" required />
                    </div>
                    <div class="inputs">
                        <label for="tel">Telefonas </label>
                        <input id="tel" type="text" name="tel" required />
                    </div>
                    <div class="inputs">
                        <label for="url">Internetinis puslapis </label>
                        <input id="url" type="url" name="url" required />
                    </div>
                    <div class="darbo-laikas">
                        <p>Darbo Laikas:</p>

                        <div class="diena">
                            <p>
                                <input id="pirmadcheck" type="checkbox" name="vehicle">
                                <label for="pirmadcheck"><span></span></label>
                                <label for="pirmadienisslider">Pirmadienis:</label>
                                <input type="text" id="pirmadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider1" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="antradcheck" type="checkbox" name="vehicle">
                                <label for="antradcheck"><span></span></label>
                                <label for="antradienisslider">Antradienis:</label>
                                <input type="text" id="antradienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider2" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="treciadcheck" type="checkbox" name="vehicle">
                                <label for="treciadcheck"><span></span></label>
                                <label for="treciadienisslider">Trečiadienis:</label>
                                <input type="text" id="treciadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider3" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="ketvirtadcheck" type="checkbox" name="vehicle">
                                <label for="ketvirtadcheck"><span></span></label>
                                <label for="ketvirtadienisslider">Ketvirtadienis:</label>
                                <input type="text" id="ketvirtadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider4" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="penktadcheck" type="checkbox" name="vehicle">
                                <label for="penktadcheck"><span></span></label>
                                <label for="penktadienisslider">Penktadienis:</label>
                                <input type="text" id="penktadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider5" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="sestadcheck" type="checkbox" name="vehicle">
                                <label for="sestadcheck"><span></span></label>
                                <label for="sestadienisslider">Šeštadienis:</label>
                                <input type="text" id="sestadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider6" class="sliders"></div>
                        </div>
                        <div class="diena">
                            <p>
                                <input id="sekmadcheck" type="checkbox" name="vehicle">
                                <label for="sekmadcheck"><span></span></label>
                                <label for="sekmadienisslider">Sekmadienis:</label>
                                <input type="text" id="sekmadienisslider" value="8:00 - 17:00" readonly style="background-color: transparent; border:0; color:#f6931f; font-weight:bold;">
                            </p>
                            <div id="slider7" class="sliders"></div>
                        </div>
                    </div>

                    <!-- Darbo laikas end -->

                    <div class="inputs">
                        <p>Apie įmonę</p>
                        <textarea rows="10" cols="70"></textarea>
                    </div>

                </div>


                <input type="submit" value="Siųsti užklausą">

                <div class="paslaugu-sarasas grozio-salonai-paslaugos">
                    <h3>GROŽIO SALONAI</h3>
                    <div class="sarasas-wrapper">
                        <div class="sarasas-container">
                            <div class="image-header">
                                <img src="img/paieska/plaukai.png">
                                <h3>PLAUKAI</h3>
                            </div>
                            <form>
                                <input id="c1" type="checkbox" name="vehicle">
                                <label for="c1"><span></span>Vyrų kirpimas</label>
                                <input id="c2" type="checkbox" name="vehicle">
                                <label for="c2"><span></span>Moterų kirpimas</label>
                                <input id="c3" type="checkbox" name="vehicle">
                                <label for="c3"><span></span>Plaukų dažymas</label>
                                <input id="c4" type="checkbox" name="vehicle">
                                <label for="c4"><span></span>Plaukų šukavimas</label>
                                <input id="c5" type="checkbox" name="vehicle">
                                <label for="c5"><span></span>Plaukų tiesinimas</label>
                                <input id="c6" type="checkbox" name="vehicle">
                                <label for="c6"><span></span>Plaukų tiesinimas keratinu</label>
                                <input id="c7" type="checkbox" name="vehicle">
                                <label for="c7"><span></span>Plaukų priauginimas</label>
                                <input id="c8" type="checkbox" name="vehicle">
                                <label for="c8"><span></span>Šukuosenų darymas</label>
                                <input id="c9" type="checkbox" name="vehicle">
                                <label for="c9"><span></span>Afrikietiškų kasyčių pinimas</label>
                            </form>
                        </div>
                        <div class="sarasas-container">
                            <div class="image-header">
                                <img src="img/paieska/nagas.png">
                                <h3>NAGAI</h3>
                            </div>
                            <form>
                                <input id="c10" type="checkbox" name="vehicle">
                                <label for="c10"><span></span>Manikiūras</label>
                                <input id="c11" type="checkbox" name="vehicle">
                                <label for="c11"><span></span>Pedikiūras</label>
                                <input id="c12" type="checkbox" name="vehicle">
                                <label for="c12"><span></span>Gelinis nagų lakavimas</label>
                                <input id="c13" type="checkbox" name="vehicle">
                                <label for="c13"><span></span>Nagų priauginimas geliu</label>
                                <input id="c14" type="checkbox" name="vehicle">
                                <label for="c14"><span></span>Nagų priauginimas akrilu</label>
                            </form>
                        </div>
                        <div class="sarasas-container">
                            <div class="image-header">
                                <img src="img/paieska/profilis.png">
                                <h3>VEIDAS</h3>
                            </div>
                            <form>
                                <input id="c21" type="checkbox" name="vehicle">
                                <label for="c21"><span></span>Antakių korekcija</label>
                                <input id="c22" type="checkbox" name="vehicle">
                                <label for="c22"><span></span>Blakstienų priauginimas</label>
                                <input id="c23" type="checkbox" name="vehicle">
                                <label for="c23"><span></span>Blakstienų dažymas</label>
                                <input id="c24" type="checkbox" name="vehicle">
                                <label for="c24"><span></span>Blakstienų rietimas</label>
                                <input id="c25" type="checkbox" name="vehicle">
                                <label for="c25"><span></span>Makiažas</label>
                                <input id="c26" type="checkbox" name="vehicle">
                                <label for="c26"><span></span>Ilgalaikis makiažas</label>
                            </form>
                        </div>

                    </div>
                    <input class="patvirtinti" type="submit" value="PATVIRTINTI">
                </div>

                <div class="paslaugu-sarasas soliariumai-paslaugos">
                    <h3>Soliariumai</h3>
                    <div class="sarasas-wrapper">
                        <div class="sarasas-container">
                            <form>
                                <input id="c31" type="checkbox" name="vehicle">
                                <label for="c31"><span></span>Horizontalus (gulimi)</label>
                                <input id="c32" type="checkbox" name="vehicle">
                                <label for="c32"><span></span>Vertikalus (stovimi)</label>
                            </form>
                        </div>

                    </div>
                    <input class="patvirtinti" type="submit" value="PATVIRTINTI">
                </div>

                <div class="paslaugu-sarasas tatuiruociu-salonai-paslaugos">
                    <h3>Tatuiruočių salonai</h3>
                    <div class="sarasas-wrapper">
                        <div class="sarasas-container">
                            <form>
                                <input id="c41" type="checkbox" name="vehicle">
                                <label for="c41"><span></span>Tatuiruočių darymas</label>
                                <input id="c42" type="checkbox" name="vehicle">
                                <label for="c42"><span></span>Auskarų verimas</label>
                                <input id="c43" type="checkbox" name="vehicle">
                                <label for="c43"><span></span>Tatuiruočių šalinimas</label>
                                <input id="c44" type="checkbox" name="vehicle">
                                <label for="c44"><span></span>Eskizų piešimas</label>
                            </form>
                        </div>

                    </div>
                    <input class="patvirtinti" type="submit" value="PATVIRTINTI">
                </div>

                <div class="paslaugu-sarasas spa-centrai-paslaugos">
                    <h3>SPA centrai</h3>
                    <div class="sarasas-wrapper">
                        <div class="sarasas-container">
                            <form>
                                <input id="c51" type="checkbox" name="vehicle">
                                <label for="c51"><span></span>Kūno masažai</label>
                                <input id="c52" type="checkbox" name="vehicle">
                                <label for="c52"><span></span>Veido masažai</label>
                                <input id="c53" type="checkbox" name="vehicle">
                                <label for="c53"><span></span>Kūno šveitimai</label>
                                <input id="c54" type="checkbox" name="vehicle">
                                <label for="c54"><span></span>Judesio terapija</label>
                                <input id="c55" type="checkbox" name="vehicle">
                                <label for="c55"><span></span>Pirtys</label>
                                <input id="c56" type="checkbox" name="vehicle">
                                <label for="c56"><span></span>Baseinai</label>
                                <input id="c57" type="checkbox" name="vehicle">
                                <label for="c57"><span></span>Joga</label>
                                <input id="c58" type="checkbox" name="vehicle">
                                <label for="c58"><span></span>Treniruoklių salė</label>
                            </form>
                        </div>

                    </div>
                    <input class="patvirtinti" type="submit" value="PATVIRTINTI">
                </div>

                <div class="paslaugu-sarasas odontologijos-kabinetai-paslaugos">
                    <h3>Odontologijos kabinetai</h3>
                    <div class="sarasas-wrapper">
                        <div class="sarasas-container">
                            <form>
                                <input id="c61" type="checkbox" name="vehicle">
                                <label for="c61"><span></span>Burnos higiena</label>
                                <input id="c62" type="checkbox" name="vehicle">
                                <label for="c62"><span></span>Dantų gydymas</label>
                                <input id="c63" type="checkbox" name="vehicle">
                                <label for="c63"><span></span>Dantų protezai</label>
                                <input id="c64" type="checkbox" name="vehicle">
                                <label for="c64"><span></span>Dantų balinimas</label>
                                <input id="c65" type="checkbox" name="vehicle">
                                <label for="c65"><span></span>Dantų implantai</label>
                            </form>
                        </div>

                    </div>
                    <input class="patvirtinti" type="submit" value="PATVIRTINTI">
                </div>

                <div class="paslaugu-sarasas kosmetologijos-kabinetai-paslaugos">
                    <h3>Kosmetologijos kabinetai</h3>
                    <div class="sarasas-wrapper">
                        <div class="sarasas-container">
                            <form>
                                <input id="c71" type="checkbox" name="vehicle">
                                <label for="c71"><span></span>Veido valymas</label>
                                <input id="c72" type="checkbox" name="vehicle">
                                <label for="c72"><span></span>Spuogų gydymas</label>
                                <input id="c73" type="checkbox" name="vehicle">
                                <label for="c73"><span></span>Procedūros odai</label>
                                <input id="c74" type="checkbox" name="vehicle">
                                <label for="c74"><span></span>Veido kaukės</label>
                                <input id="c75" type="checkbox" name="vehicle">
                                <label for="c75"><span></span>Nugaros valymas</label>
                                <input id="c76" type="checkbox" name="vehicle">
                                <label for="c76"><span></span>Depiliacija vašku</label>
                                <input id="c77" type="checkbox" name="vehicle">
                                <label for="c77"><span></span>Mezoterapija</label>
                                <input id="c78" type="checkbox" name="vehicle">
                                <label for="c78"><span></span>Ilgalaikis makiažas</label>
                            </form>
                        </div>

                    </div>
                    <input class="patvirtinti" type="submit" value="PATVIRTINTI">
                </div>

                <div class="paslaugu-sarasas sporto-klubai-paslaugos">
                    <h3>Sporto klubai</h3>
                    <div class="sarasas-wrapper">
                        <div class="sarasas-container">
                            <form>
                                <input id="c81" type="checkbox" name="vehicle">
                                <label for="c81"><span></span>Treniruoklių salė</label>
                                <input id="c82" type="checkbox" name="vehicle">
                                <label for="c82"><span></span>Aerobika</label>
                                <input id="c83" type="checkbox" name="vehicle">
                                <label for="c83"><span></span>Joga</label>
                                <input id="c84" type="checkbox" name="vehicle">
                                <label for="c84"><span></span>Asmeninės treniruotės</label>
                                <input id="c85" type="checkbox" name="vehicle">
                                <label for="c85"><span></span>Pirtis</label>
                                <input id="c86" type="checkbox" name="vehicle">
                                <label for="c86"><span></span>Sauna</label>
                                <input id="c87" type="checkbox" name="vehicle">
                                <label for="c87"><span></span>Baseinas</label>
                            </form>
                        </div>

                    </div>
                    <input class="patvirtinti" type="submit" value="PATVIRTINTI">
                </div>



            </form>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
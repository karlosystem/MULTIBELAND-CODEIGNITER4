<?= $this->extend('frontend/layout/pages-layout'); ?>



<?= $this->section('content'); ?>



<section class="w3l-contacts-12" id="contact">

    <div class="contact-top pt-5">

        <div class="container py-lg-4">

            <div class="title-heading-w3 text-center mx-auto">

                <h3 class="title-big">Cont&aacute;ctenos</h3>

            </div>

            <div class="d-grid cont-main-top mt-lg-5 mt-4">

                <!-- contact form -->

                <div class="contacts12-main">



                    <?php $validation = \Config\Services::validation(); ?>

                    <form action="<?= base_url(route_to('contact-us-send')) ?>" method="post" class="main-input">

                        <?= csrf_field() ?>



                        <?php if (!empty(session()->getFlashdata('success'))) : ?>

                            <div class="alert alert-success">

                                <?= session()->getFlashdata('success') ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                        <?php endif; ?>



                        <?php if (!empty(session()->getFlashdata('fail'))) : ?>

                            <div class="alert alert-danger">

                                <?= session()->getFlashdata('fail') ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                        <?php endif; ?>



                        <div class="top-inputs d-grid">

                            <input type="text" placeholder="Nombre" name="name" id="name" value="<?= set_value('name') ?>">

                            <?php if ($validation->getError('name')) : ?>

                                <div class="d-block text-danger mt-1 mb-1">

                                    <?= $validation->getError('name') ?>

                                </div>

                            <?php endif; ?>





                            <input type="email" name="email" placeholder="Email" id="email" value="<?= set_value('email') ?>">

                            <?php if ($validation->getError('email')) : ?>

                                <div class="d-block text-danger mt-1 mb-1">

                                    <?= $validation->getError('email') ?>

                                </div>

                            <?php endif; ?>



                        </div>

                        <input type="text" placeholder="Celular" name="phone" id="phone" value="<?= set_value('phone') ?>">

                        <?php if ($validation->getError('phone')) : ?>

                            <div class="d-block text-danger mt-1 mb-1">

                                <?= $validation->getError('phone') ?>

                            </div>

                        <?php endif; ?>



                        <textarea placeholder="Mensaje" name="mensaje" id="mensaje"><?= set_value('mensaje') ?></textarea>

                        <?php if ($validation->getError('mensaje')) : ?>

                            <div class="d-block text-danger mt-1 mb-1">

                                <?= $validation->getError('mensaje') ?>

                            </div>

                        <?php endif; ?>



                        <div class="text-right">

                            <button type="submit" class="btn btn-primary btn-style">Enviar Ahora</button>

                        </div>

                    </form>



                </div>

                <!-- //contact form -->

                <!-- contact address -->

                <div class="contact">

                    <div class="cont-subs">

                        <div class="cont-add">

                            <h4>Direcci&oacute;n:</h4>

                            <p class="contact-text-sub"><?= get_settings()->blog_address ?></p>

                        </div>

                        <div class="cont-add">

                            <h4>Email:</h4>

                            <a href="mailto:<?= get_settings()->blog_email ?>">

                                <p class="contact-text-sub"><?= get_settings()->blog_email ?></p>

                            </a>

                        </div>

                        <div class="cont-add">

                            <h4>N&uacute;mero de Celular:</h4>

                            <a href="tel:+1(21) 234 4567">

                                <p class="contact-text-sub"><?= get_settings()->blog_phone ?></p>

                            </a>

                        </div>

                        <div class="social-icons-con">

                            <h4 class="mb-3">Nuestras redes sociales:</h4>

                            <a href="<?= get_social_media()->facebook_url ?>"><span class="fa fa-facebook-square" aria-hidden="true"></span></a>

                            <a href="<?= get_social_media()->youtube_url ?>"><span class="fa fa-youtube-square" aria-hidden="true"></span></a>

                            <a href="<?= get_social_media()->instagram_url ?>"><span class="fa fa-instagram" aria-hidden="true"></span></a>

                            <a href="<?= get_social_media()->whastapp_url ?>"><span class="fa fa-phone-square" aria-hidden="true"></span></a>

                        </div>

                    </div>

                </div>

                <!-- //contact address -->

            </div>

        </div>



    </div>

</section>



<?= $this->endSection(); ?>
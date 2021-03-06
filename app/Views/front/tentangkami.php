<?= $this->extend('front/layout/template'); ?>

<?= $this->section('content'); ?>


<main class="page">
    <section class="clean-block about-us">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Tentang Kami</h2>
                <p>Perusahaan ini bergerak di bidang pendidikan yang menawarkan jasa belajar online dan ujian online kepada siswa-siswi seluruh Indonesia</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="<?= base_url(''); ?>/template/web/assets/img/avatars/avatar1.jpg?h=2bf47f2c2deaed837d2490a2db0a7175">
                        <div class="card-body info">
                            <h4 class="card-title">John Smith</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="<?= base_url(''); ?>/template/web/assets/img/avatars/avatar2.jpg?h=4178f5c706118a93c77520b6d0b30713">
                        <div class="card-body info">
                            <h4 class="card-title">Robert Downturn</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="<?= base_url(''); ?>/template/web/assets/img/avatars/avatar3.jpg?h=4c77b34bb68eaede08fdd5dfec8752b0">
                        <div class="card-body info">
                            <h4 class="card-title">Ally Sanders</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?= $this->endSection(); ?>
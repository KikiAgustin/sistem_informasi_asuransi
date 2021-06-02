<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Informasi Pendaftaran</h2>
            <ol>
                <li><a href="<?= base_url('Home'); ?>">Home</a></li>
                <li>Informasi Pendaftaran</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-8">
                <div class="portfolio-details-slider swiper-container">
                    <div class="swiper-wrapper align-items-center">

                        <div class="swiper-slide">
                            <img src="<?= base_url('assets/vesperr/'); ?>assets/img/portfolio/portfolio-details-1.jpg" alt="">
                        </div>

                        <div class="swiper-slide">
                            <img src="<?= base_url('assets/vesperr/'); ?>assets/img/portfolio/portfolio-details-2.jpg" alt="">
                        </div>

                        <div class="swiper-slide">
                            <img src="<?= base_url('assets/vesperr/'); ?>assets/img/portfolio/portfolio-details-3.jpg" alt="">
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- <div class="portfolio-info">
                    <h3>Project information</h3>
                    <ul>
                        <li><strong>Category</strong>: Web design</li>
                        <li><strong>Client</strong>: ASU Company</li>
                        <li><strong>Project date</strong>: 01 March, 2020</li>
                        <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                    </ul>
                </div> -->
                <div class="portfolio-description">
                    <h2>Pendaftaran Asuransi Pendidikan</h2>
                    <p>
                        Sebelum teman-teman mendaftar Asuransi pendidikan pada perusahaan kami, silahkan baca terlebih dahulu informasi dibawah ini yang bisa anda download
                    <div class="portfolio-info">
                        <ul>
                            <li><strong>Informasi Asuransi Pendidikan</strong>: <a target="_blank" href="<?= base_url('assets/formulir/informasi_asuransi.pdf'); ?>">download disini</a></li>
                        </ul>
                    </div>
                    </p>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
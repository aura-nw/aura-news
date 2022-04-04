<footer class="footer__blocks ">
        <section class="container">
            <div class="row">
                <div class="col-12 col-lg-3 footer__menu pb-10 order-2 order-lg-1 d-none d-lg-block">
                    <div class="footer__logo d-none d-lg-block">
                        <a href="/">
                            <img srcset="<?php echo IMAGE_URL.'/auraMainLogo-1x-v2.png'?> 1x, <?php echo IMAGE_URL.'/auraMainLogo-2x-v2.png'?> 2x"
                                 src="<?php echo IMAGE_URL.'/auraMainLogo-1x-v2.png'?>"
                                 alt="Aura Logo">
                        </a>
                    </div>
                    <div class="menu body mt-lg-5 d-flex d-lg-block">
<!--                        <div class="body sub-text-mob me-4 mr-lg-0 title">Headquarter</div>-->
<!--                        <div>-->
<!--                            <ul class="small-text ps-0">-->
<!--                                <li>Qwomar Trading Complex,</li>-->
<!--                                <li>Blackburne Road,</li>-->
<!--                                <li>Port Purcell, Road Town, Tortola,</li>-->
<!--                                <li>British Virgin Islands VG1110.</li>-->
<!--                            </ul>-->
<!--                        </div>-->
                    </div>
                </div>
                <div class="col-12 col-lg-6 footer__contact order-1 order-lg-2 d-flex d-lg-block text-lg-center text-xl-start">
                    <div class="footer__logo d-lg-none flex-shrink-0 flex-grow-1 me-5">
                        <a href="/">
                            <img srcset="<?php echo IMAGE_URL.'/auraMainLogo-1x-v2.png'?> 1x, <?php echo IMAGE_URL.'/auraMainLogo-2x-v2.png'?> 2x"
                                 src="<?php echo IMAGE_URL.'/auraMainLogo-1x-v2.png'?>"
                                 alt="Aura Logo">
                        </a>
                    </div>
                    <div class="container-fluid">
                        <div class="row px-lg-5">
                            <div class="col-6 col-md-3">
                                <a href="/" class="body contact__title">Home</a>
                            </div>
                            <div class="col-6 col-md-3">
                                <a href="/announcement/" target="_blank" class="body contact__title">Annoucement</a>
                                <div class="body mt-2 mt-md-5">
                                    <?php
                                    // get categories activated
                                    $footer_menu_cats =  get_option('footer_menu_cats');
                                    foreach ($footer_menu_cats as $cat) {
                                        $category = get_term_by('slug', $cat, 'category');
                                        ?>
                                        <div class="mb-4"><a target="_blank" href="announcement/?category=<?php echo $category->slug ?>"><?php echo $category->name; ?></a></div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 footer__cta order-3 pb-10 pb-lg-0 flex-xl-shrink-0 flex-xl-grow-1">
                    <div class="footer__cta-contain">
                        <div class="body text-gradient d-inline">Never miss an opportunity!</div>
                        <div class="small-text mt-2 mt-md-5 -max-width-256">
                            Sign up now for exclusive events, feature releases, announcements, plus few surprises!
                        </div>
                        <div class="mt-5 -max-width-256">
                            <div class="aura-form single-input-field" id="cta-form-contain">
                                <?php echo do_shortcode('[contact-form-7 id="180" title="Email subscribers"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <section class="bottom-bar py-lg-2 pt-3 pb-5">
        <div class="container">
            <div class="d-lg-flex justify-content-between align-items-center flex-lg-row-reverse">
                <div class="my-2 my-lg-0">
                    <?php echo do_shortcode('[elementor-template id="905"]'); ?>
                </div>
                <div class="caption-2 text-center text-lg-left my-2 my-lg-0">Copyright © 2022 Aura Network. All rights reserved</div>
            </div>
        </div>
    </section>
</footer>

<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>

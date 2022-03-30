<footer class="footer__blocks ">
        <section class="container">
            <div class="row">
                <div class="col-12 col-lg-3 footer__menu pb-10 order-2 order-lg-1">
                    <div class="footer__logo d-none d-lg-block">
                        <a href="/">
                            <img srcset="<?php echo IMAGE_URL.'/auraMainLogo-1x-v2.png'?> 1x, <?php echo IMAGE_URL.'/auraMainLogo-2x-v2.png'?> 2x"
                                 src="<?php echo IMAGE_URL.'/auraMainLogo-1x-v2.png'?>"
                                 alt="Aura Logo">
                        </a>
                    </div>
                    <div class="menu body mt-lg-5 d-flex d-lg-block">
                        <div class="body sub-text-mob me-4 mr-lg-0 title">Headquarter</div>
                        <div>
                            <ul class="small-text ps-0">
                                <li>Qwomar Trading Complex,</li>
                                <li>Blackburne Road,</li>
                                <li>Port Purcell, Road Town, Tortola,</li>
                                <li>British Virgin Islands VG1110.</li>
                            </ul>
                            <div class="small-text mt-3">732-528-4945</div>
                        </div>
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
                        <div class="row">
                            <div class="col-6 col-md-3">
                                <div class="body contact__title">Home</div>
                            </div>
                            <!-- <div class="col-6 col-md-3">
                                <div class="body contact__title">Labs</div>
                                <div class="body mt-2 mt-md-5">
                                    <div class="mb-4"><a target="_blank" href="https://safe.aura.network/welcome">Safe</a></div>
                                    <div class="mb-4"><a target="_blank" href="https://explorer.aura.network/">Explorer</a></div>
                                </div>
                            </div> -->
                            <div class="col-6 col-md-3">
                                <div class="body contact__title">Annoucement</div>
                                <div class="body mt-2 mt-md-5">
                                    <div class="mb-4"><button type="button">Partnership</button></div>
                                    <div class="mb-4"><button type="button">News</button></div>
                                    <div class="mb-4"><a target="_blank" href="https://aura-network.notion.site/Aura-Job-Board-172bb39a89d844b0a0e1d8871026dc23">Careers</a></div>
                                </div>
                            </div>
                            <!-- <div class="col-6 col-md-3">
                                <div class="body contact__title">Guide</div>
                                <div class="body mt-2 mt-md-5">
                                    <div class="mb-4"><button type="button">NFT 101</button></div>
                                    <div class="mb-4"><a target="_blank" href="https://aura.network#faqs">FAQs</a></div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 footer__cta order-3 pb-10 pb-lg-0 flex-xl-shrink-0 flex-xl-grow-1">
                    <div class="footer__cta-contain">
                        <div class="body text-gradient">Never miss an opportunity!</div>
                        <div class="small-text mt-2 mt-md-5 -max-width-256">
                            Sign up now for exclusive events, feature releases, announcements, plus few surprises!
                        </div>
                        <div class="mt-5 -max-width-256">
<!--                            <form  class="aura-form single-input-field">-->
<!--                                <div class="input-group">-->
<!--                                    <input type="text" class="form-control" placeholder="Enter your email" name="inputEmail" >-->
<!--                                    <button class="button" type="submit">-->
<!--                                        <img src="assets/images/backgrounds/circle-color.png" alt="" width="32" height="32">-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </form>-->
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
                    <?php echo do_shortcode('[elementor-template id="171"]'); ?>
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

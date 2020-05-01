<?php get_header(); ?>

            <section id="hero" class="c-bg">
                <!---  Hero Section -->
                <div class="container py-5">
                    <!-- Container-->
                    <div class="row">
                        <!-- Row -->
                        <div class="col">
                            <div class="h4 bolder">
                                <?php _e( 'Collaboration', 'referral_list' ); ?>
                            </div>
                            <h1 class="display-4"><?php _e( 'Curated list of referral links', 'referral_list' ); ?></h1>
                            <p><?php _e( 'We curate the best link for you to get the best possible offer before purchasing any services.', 'referral_list' ); ?></p>
                            <a class="c-button c-button-lg btn mr-5" href="#ref-links"><?php _e( 'Get Started', 'referral_list' ); ?></a> 
                        </div>
                        <div class="align-items-center col d-flex justify-content-center p-0">
                            <img class="my-auto" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/Hero-img.svg" width="500px">
                        </div>
                        <!-- .Row -->
                    </div>
                    <!-- .Container-->
                </div>
            </section>
            <!--- Sponsors Section -->
            <section>
                <!-- If you are reading this and would like to become our sponsor, hit us up! -->
            </section>
            <section id="ref-links">
                <div class="container py-5">
                    <!-- container -->
                    <div class="h5">
                        <span class="badge badge-c-purple mb-3"><?php _e( 'Referral Links', 'referral_list' ); ?></span>
                    </div>
                    <div class="mb-3 row text-center text-sm-left">
                        <div class="col"> 
                            <h2 class="mb-3 mb-sm-0"><?php _e( 'Check out these special Referral Links', 'referral_list' ); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <p><?php _e( 'We offer only quality referral links. We don\'t like sketchy links, that\'s why before seeing them here, each link and platform is checked.', 'referral_list' ); ?></p>
                        </div>
                    </div>
                    <div class="justify-content-center row">
                        <!-- row -->
                        <!-- Column 1-->
                        <?php
                            $referrals_query_args = array(
                                'post_type' => 'referrals',
                                'nopaging' => true,
                                'order' => 'ASC',
                                'orderby' => 'date'
                            )
                        ?>
                        <?php $referrals_query = new WP_Query( $referrals_query_args ); ?>
                        <?php if ( $referrals_query->have_posts() ) : ?>
                            <?php while ( $referrals_query->have_posts() ) : $referrals_query->the_post(); ?>
                                <?php PG_Helper::rememberShownPost(); ?>
                                <div id="custom-post" <?php post_class( 'col-md-4 col-sm-6 d-flex p-2' ); ?>>
                                    <div class="c-border col-12 d-flex flex-column p-3">
                                        <?php if ( is_singular() ) : ?>
                                            <h3 class="h4"><?php the_title(); ?></h3>
                                        <?php else : ?>
                                            <h3 class="h4"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
                                        <?php endif; ?>
                                        <p><?php echo get_field( 'referral_description' ); ?></p>
                                        <div class="align-content-end align-items-end d-flex flex-grow-1 flex-row justify-content-around">
                                            <a class="font-bolder font-weight-normal text-decoration-none" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Learn More', 'referral_list' ); ?></a>
                                            <a class="c-button c-button-xs c-button-out btn" href="<?php echo esc_url( get_field( 'Referral_url' ) ); ?>"><?php _e( 'Get the link', 'referral_list' ); ?></a> 
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <p><?php _e( 'Sorry, no posts matched your criteria.', 'referral_list' ); ?></p>
                        <?php endif; ?>
                        <!-- Column 2-->
                        <!-- Column 3-->
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </div>
            </section>
            <section id="newsletter">
                <div class="c-text-white container py-3">
                    <div class="row">
                        <div class="col-sm-6 d-flex ml-auto mr-auto">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/Newsletter.svg" class="d-block" height="350px"/>
                        </div>
                        <div class="align-items-center col-sm-6 d-flex flex-column justify-content-center">
                            <h2 class="mb-3"><?php _e( 'Newsletter', 'referral_list' ); ?></h2> 
                            <p><?php _e( 'Register to the newsletter and be notified whenever we add new referrals.', 'referral_list' ); ?></p>
                            <form id="newsletter-form" class="align-items-center d-flex flex-row form-inline justify-content-center w-100" action="https://app.mailerlite.com/webforms/submit/x6s6i5" data-code="x6s6i5" method="post" target="_blank">
                                <label class="sr-only" for="emailInput">
                                    <?php _e( 'Your e-mail', 'referral_list' ); ?>
                                </label>
                                <input data-inputmask="" autocomplete="email" name="fields[email]" id="emailInput" type="email" class="form-control general-roundness" placeholder="Enter your e-mail" required style="width:60%">
                                <button role="submit" type="submit" class="btn c-button c-button-accent-triad px-2">
                                    <?php _e( 'Submit', 'referral_list' ); ?>
                                </button>
                                <button disabled="disabled" style="display:none" class="btn c-button c-button-accent-triad px-2 loading">
                                    <?php _e( 'Loading', 'referral_list' ); ?>
                                </button>
                                <input type="hidden" name="ml-submit" value="1">
                                <div class="ml-field-group ml-field-email ml-validate-email ml-validate-required">
</div>
                            </form>
                            <div id="ty-message" class="d-none badge-c-green p-2 mt-2 mb-2 success-message">
                                <?php _e( 'Thanks for registering', 'referral_list' ); ?>
                            </div>
                            <img src="https://track.mailerlite.com/webforms/o/2032470/x6s6i5?vee71a8848f3cc4af6b2730283dbdc659" width="1" height="1" style="max-width:1px;max-height:1px;visibility:hidden;padding:0;margin:0;display:block" alt="." border="0">
                        </div>
                    </div>
                </div>
            </section>
            <section id="collaborate-better">
                <div class="container py-5">
                    <!--- Features Section -->
                    <div class="row">
                        <div class="align-items-center col-md col-sm d-flex flex-row justify-content-center">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/features.svg" width="100%">
                        </div>
                        <div class="col-md">
                            <div class="h5">
                                <span class="badge badge-c-purple mb-3"><?php _e( 'Collaborate better', 'referral_list' ); ?></span>
                            </div>
                            <h2 class="mb-3"><?php _e( 'Ideas during tough times', 'referral_list' ); ?></h2> 
                            <div class="features">
                                <p class="h5"><i class="badge-c-green badge-c-purple fa-address-book fas general-roundness mr-2 p-2"></i><?php _e( 'Get the best deals', 'referral_list' ); ?></p>
                                <p><?php _e( 'A lot of companies profit from your registration, why wouldn&apos;t you profit from it as well.', 'referral_list' ); ?></p>
                                <p class="h5"><i class="badge-c-blue badge-c-purple fa-bahai fas general-roundness mr-2 p-2"></i><?php _e( 'What\'s in for us?', 'referral_list' ); ?></p>
                                <p><?php _e( 'Nothing. During tough times, let\'s help each other. We collect no payment information. All of this is for free. Enjoy!', 'referral_list' ); ?></p>
                                <p class="h5"><i class="badge-c-pink badge-c-purple fa-concierge-bell fas general-roundness mr-2 p-2"></i><?php _e( 'Community Powered', 'referral_list' ); ?></p>
                                <p><?php _e( 'Our main goal is to build a community for this, as there are thousands of companies offering different kinds of benefits for using a referral program.', 'referral_list' ); ?></p>
                            </div>                             
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container p-5 general-roundness c-rounded-container">
                    <div class="row">
                        <div class="col-sm">
                            <h2 class="mb-3"><?php _e( 'Something Missing?', 'referral_list' ); ?></h2> 
                            <p class="lead"><?php _e( 'Ping us! We&apos;ll add your referral link to make the community profit from all the benefits.', 'referral_list' ); ?></p>
                        </div>
                        <div class="align-items-center col-sm d-md-flex flex-lg-row flex-md-column justify-content-center">
                            <a class="btn c-button c-button-lg mr-lg-5 " href="/submit-your-content/"><?php _e( 'Use the From', 'referral_list' ); ?></a> 
                            <a class="font-bolder font-weight-normal lead text-decoration-none" href="mailto:referrals@parys.tech" target="_blank"><?php _e( 'Contact Us', 'referral_list' ); ?></a>
                        </div>
                    </div>
                </div>
            </section>            

<?php get_footer(); ?>
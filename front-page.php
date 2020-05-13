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
                            <p><?php _e( 'We\'ve curated the greatest links, allowing you to get the best possible offer when signing up.', 'referral_list' ); ?></p>
                            <a class="c-button c-button-lg btn mr-5" href="#ref-links"><?php _e( 'Get Started', 'referral_list' ); ?></a> 
                        </div>
                        <div class="align-items-center col-12 col-md-5 col-sm-12 d-flex justify-content-center p-0">
                            <img class="img-fluid my-auto" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/Hero-img.svg" width="500px">
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
                    <hr>
                    <div class="justify-content-center row">
                        <!-- row -->
                        <!-- Column 1-->
                        <?php
                            $referrals_query_args = array(
                                'post_type' => 'referrals',
                                'posts_per_page' => 9,
                                'order' => 'DESC',
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
                                        <div>
                                            <?php $terms = get_the_terms( get_the_ID(), 'category' ) ?>
                                            <?php if( !empty( $terms ) ) : ?>
                                                <?php foreach( $terms as $term ) : ?>
                                                    <span class="badge badge-c-purple mb-3"><?php echo $term->name; ?></span>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
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
                    <div class="col-12 text-center mt-3">
                        <a class="btn c-button c-button-lg" href="/referrals"><?php _e( 'Check all the Links', 'referral_list' ); ?></a>
                    </div>
                </div>
            </section>
            <section id="newsletter">
                <div class="c-text-white container py-5">
                    <div class="row">
                        <div class="col-sm-6 d-flex ml-auto mr-auto">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/Newsletter.svg" class="d-block flex-grow-1" height="350px"/>
                        </div>
                        <div class="align-items-center col-sm-6 d-flex flex-column justify-content-center">
                            <h2 class="mb-3"><?php _e( 'Newsletter', 'referral_list' ); ?></h2> 
                            <p><?php _e( 'Register to the newsletter and be notified whenever we add new referrals.', 'referral_list' ); ?></p>
                            <form id="newsletter-form" class="align-items-center d-flex flex-row form justify-content-center w-100" action="https://app.mailerlite.com/webforms/submit/x6s6i5" data-code="x6s6i5" method="post" target="_blank">
                                <label class="sr-only" for="emailInput">
                                    <?php _e( 'Your e-mail', 'referral_list' ); ?>
                                </label>
                                <input data-inputmask="" autocomplete="email" name="fields[email]" id="emailInput" type="email" class="form-control general-roundness mr-2" placeholder="Enter your e-mail" required>
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
                                <p class="h5"><i class="badge-c-green badge-c-purple fa-grin-stars fas general-roundness mr-2 p-2"></i><?php _e( 'Get the best deals', 'referral_list' ); ?></p>
                                <p><?php _e( 'A lot of companies profit from your registration, why wouldn&apos;t you profit from it as well.', 'referral_list' ); ?></p>
                                <p class="h5"><i class="badge-c-blue badge-c-purple fa-money-bill-wave-alt fas general-roundness mr-2 p-2"></i><?php _e( 'What&apos;s in&nbsp;it for us?', 'referral_list' ); ?></p>
                                <p><?php _e( 'Nothing. During tough times, let&apos;s help each other. We collect no payment information. All of this is for free. Enjoy!', 'referral_list' ); ?></p>
                                <p class="h5"><i class="badge-c-pink badge-c-purple fa-heart fas general-roundness mr-2 p-2"></i><?php _e( 'Community Powered', 'referral_list' ); ?></p>
                                <p><?php _e( 'Our main goal is to build a community for this, as there are thousands of companies offering different kinds of benefits for using a referral program.', 'referral_list' ); ?></p>
                            </div>                             
                        </div>
                    </div>
                </div>
            </section>
            <section id="work-links">
                <div class="container py-5">
                    <!-- container -->
                    <div class="h5">
                        <span class="badge badge-c-purple mb-3"><?php _e( 'Work Links', 'referral_list' ); ?></span>
                    </div>
                    <div class="mb-3 row text-center text-sm-left">
                        <div class="col"> 
                            <h2 class="mb-3 mb-sm-0"><?php _e( 'Find easily small work and get rewarded', 'referral_list' ); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <p><?php _e( 'If you need a couple of bucks, you should definitely check some of these websites as they provide an easy payout.', 'referral_list' ); ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="justify-content-center row">
                        <!-- Column 1-->
                        <?php
                            $work_online_query_args = array(
                                'post_type' => 'work_online',
                                'posts_per_page' => 9,
                                'order' => 'DESC',
                                'orderby' => 'date'
                            )
                        ?>
                        <?php $work_online_query = new WP_Query( $work_online_query_args ); ?>
                        <?php if ( $work_online_query->have_posts() ) : ?>
                            <?php while ( $work_online_query->have_posts() ) : $work_online_query->the_post(); ?>
                                <?php PG_Helper::rememberShownPost(); ?>
                                <div id="custom-post" <?php post_class( 'col-md-4 col-sm-6 d-flex p-2' ); ?>>
                                    <div class="c-border col-12 d-flex flex-column p-3">
                                        <?php if ( is_singular() ) : ?>
                                            <h3 class="h4"><?php the_title(); ?></h3>
                                        <?php else : ?>
                                            <h3 class="h4"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
                                        <?php endif; ?>
                                        <div>
                                            <?php if ( has_term( '', 'type_work', null ) ) : ?>
                                                <?php $terms = get_the_terms( get_the_ID(), 'category' ) ?>
                                                <?php if( !empty( $terms ) ) : ?>
                                                    <?php foreach( $terms as $term ) : ?>
                                                        <span class="badge badge-c-purple mb-3"><?php echo $term->name; ?></span>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <p><?php echo get_field( 'work_description' ); ?></p>
                                        <div class="align-content-end align-items-end d-flex flex-grow-1 flex-row justify-content-around">
                                            <a class="font-bolder font-weight-normal text-decoration-none" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Learn More', 'referral_list' ); ?></a>
                                            <a class="c-button c-button-xs c-button-out btn" href="<?php echo esc_url( get_field( 'work_link' ) ); ?>"><?php _e( 'Get the link', 'referral_list' ); ?></a> 
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <p><?php _e( 'Sorry, no posts matched your criteria.', 'referral_list' ); ?></p>
                        <?php endif; ?>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                    <div class="col-12 text-center mt-3">
                        <a class="btn c-button c-button-lg" href="/work_online"><?php _e( 'Check all the Links', 'referral_list' ); ?></a>
                    </div>
                </div>
            </section>
            <section>
                <div class="container p-5 general-roundness c-rounded-container">
                    <div class="row">
                        <div class="col-sm">
                            <h2 class="mb-3"><?php _e( 'Do you have a referral link to share?', 'referral_list' ); ?></h2> 
                            <p class="lead"><?php _e( 'Ping us! We&apos;ll add your referral link to make the community profit from all the benefits.', 'referral_list' ); ?></p>
                        </div>
                        <div class="align-items-center col-sm d-flex flex-column flex-lg-row justify-content-center">
                            <a class="btn c-button c-button-lg mr-lg-5 " href="/submit-your-content/"><?php _e( 'Add your link', 'referral_list' ); ?></a> 
                            <a class="font-bolder font-weight-normal lead text-decoration-none" href="mailto:referrals@parys.tech" target="_blank"><?php _e( 'Contact Us', 'referral_list' ); ?></a>
                        </div>
                    </div>
                </div>
            </section>            

<?php get_footer(); ?>
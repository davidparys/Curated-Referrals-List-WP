<?php get_header(); ?>

<section id="main-article" class="py-5 c-text-white">
    <div class="container ">
        <div class="row">
            <div class="col-sm text-center">
                <h1 class="c-text-white"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>
<section>
    <!-- negative section -->
    <div class="container">
        <div class="bg-light border justify-content-center mt-n4 p-sm-5 pb-4 pl-2 pr-2 pt-4 rounded-sm row text-dark">
            <div class="breadcrumb col-md-9 mb-3">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12 mb-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="group-list-title-post mb-3 lead">
                            <?php _e( 'Description', 'referral_list' ); ?>
                        </div>
                        <div>
                            <?php $terms = get_the_terms( get_the_ID(), 'type_work' ) ?>
                            <?php if( !empty( $terms ) ) : ?>
                                <?php foreach( $terms as $term ) : ?>
                                    <span class="badge badge-c-purple mb-3"><?php echo $term->name; ?></span>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="group-list-inline-start-none">
                            <span><?php echo get_field( 'work_description' ); ?></span>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="group-list-title-post mb-3 lead">
                            <?php _e( 'Perks', 'referral_list' ); ?>
                        </div>
                        <div class="group-list-inline-start-none">
                            <span><?php echo get_field( 'work_how' ); ?></span>
                        </div>
                    </li>
                </ul>                             
                <!-- .list group -->                             
            </div>
            <div class="col-md-9">
                <div class="align-content-center align-items-center d-flex flex-column flex-sm-row justify-content-center justify-content-sm-between">
                    <a class="btn btn-danger c-button-xs general-roundness order-1 order-sm-2" href="#" data-toggle="tooltip" data-trigger="hover" title="This feature is coming soon."><?php _e( 'Report this link', 'referral_list' ); ?></a> 
                    <a class="btn c-button c-button-out c-button-xs mb-3 mb-sm-0" href="<?php echo esc_url( get_field( 'Referral_url' ) ); ?>"><?php _e( 'Get the Referral Link', 'referral_list' ); ?></a> 
                </div>
            </div>                         
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
</section>            

<?php get_footer(); ?>
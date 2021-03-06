<?php get_header(); ?>

            <div class="container py-5">
                <!-- container -->
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                <div class="h5">
                    <span class="badge badge-c-purple mb-3"><?php _e( 'Work links', 'referral_list' ); ?></span>
                </div>
                <div class="mb-3 row text-center text-sm-left">
                    <div class="col"> 
                        <h2 class="mb-3 mb-sm-0"><h2><?php _e( 'Find easily small work and get rewarded', 'referral_list' ); ?></h2></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p><?php _e( 'If you need a couple of bucks, you should definitely check some of these websites as they provide an easy payout.', 'referral_list' ); ?></p>
                    </div>
                </div>
                <div class="justify-content-center row mb-3">
                    <!-- row -->
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php PG_Helper::rememberShownPost(); ?>
                            <div class="col-md-4 col-sm-6 d-flex p-2" id="custom-post">
                                <div class="c-border col-12 d-flex flex-column p-3">
                                    <h3 class="h4"><?php the_title(); ?></h3>
                                    <div>
                                        <?php if ( taxonomy_exists( 'type_work' ) ) : ?>
                                            <?php $terms = get_the_terms( get_the_ID(), 'type_work' ) ?>
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
                    <?php else : ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.', 'referral_list' ); ?></p>
                    <?php endif; ?>
                    <!-- .row -->
                </div>
                <div class="row justify-content-center">
                    <?php if ( PG_Pagination::isPaginated() ) : ?>
                        <ul class="pagination"> 
                            <li class="page-item" id="previous">
                                <?php if( PG_Pagination::getCurrentPage() > 1 ) : ?>
                                    <a class="page-link" <?php echo PG_Pagination::getPreviousHrefAttribute(); ?>><?php _e( 'Previous', 'referral_list' ); ?></a>
                                <?php endif; ?>
                            </li>                             
                            <?php for( $page_num = 1; $page_num <= PG_Pagination::getMaxPages(); $page_num++) : ?>
                                <li class="<?php if( $page_num == PG_Pagination::getCurrentPage() ) echo 'active'; ?> page-item">
                                    <a class="page-link" href="<?php echo esc_url( get_pagenum_link( $page_num ) ) ?>"><?php echo $page_num ?></a>
                                </li>
                            <?php endfor; ?> 
                            <li class="page-item">
</li>                             
                            <li class="page-item">
</li>                             
                            <li class="page-item" id="next">
                                <?php if( PG_Pagination::getCurrentPage() < PG_Pagination::getMaxPages() ) : ?>
                                    <a class="page-link" <?php echo PG_Pagination::getNextHrefAttribute(); ?>><?php _e( 'Next', 'referral_list' ); ?></a>
                                <?php endif; ?>
                            </li>                             
                        </ul>
                    <?php endif; ?>
                </div>
                <!-- .container -->
            </div>            

<?php get_footer(); ?>
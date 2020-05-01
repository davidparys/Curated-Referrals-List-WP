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
            <div class="col-md-9">
                <?php $breadcrumbs = PG_Helper::getBreadcrumbs( 'parents', true, 'Home'); ?>
                <?php if( !empty( $breadcrumbs ) ) : ?>
                    <ol class="breadcrumb" cms-breadcrumbs-item="> li:nth-of-type(2)" cms-breadcrumbs-item-name="> li:nth-of-type(2) > a" cms-breadcrumbs-first-item="> li:nth-of-type(1)" cms-breadcrumbs-first-item-name="> li:nth-of-type(1) > a" cms-breadcrumbs-home>
                        <?php $breadcrumb = $breadcrumbs[ 0 ]; ?>
                        <li class="breadcrumb-item">
                            <a href="<?php echo esc_url( $breadcrumb[ 'link' ] ); ?>"><?php echo $breadcrumb[ 'name' ]; ?></a>
                        </li>
                        <?php for( $breadcrumbs_i = 1; $breadcrumbs_i < count( $breadcrumbs ); $breadcrumbs_i++) : ?>
                            <?php $breadcrumb = $breadcrumbs[ $breadcrumbs_i ]; ?>
                            <li class="breadcrumb-item">
                                <a href="<?php echo esc_url( $breadcrumb[ 'link' ] ); ?>"><?php echo $breadcrumb[ 'name' ]; ?></a>
                            </li>
                        <?php endfor; ?>
                    </ol>
                <?php endif; ?>
            </div>
            <?php echo the_post(); ?>
            <div class="container py-3">
                <?php the_content(); ?>
            </div>
            <!-- .container -->
        </div>
</section>            

<?php get_footer(); ?>
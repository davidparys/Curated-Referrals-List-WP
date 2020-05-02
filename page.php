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
            <?php echo the_post(); ?>
            <div class="container py-3">
                <?php the_content(); ?>
            </div>
            <!-- .container -->
        </div>
</section>            

<?php get_footer(); ?>
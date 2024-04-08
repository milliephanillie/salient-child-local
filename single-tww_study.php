<?php
get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="single-tww-study--page-header">
    <h1 class="single-tww-study--page-title"><?php the_title(); ?></h1>
</div>
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main single-tww-study--article" role="main">
                <div class="breadcrumbs">

                <span><a href="/research"> Research </a> </span> <i class="fa fa-caret-right"></i> <span> <?php the_title(); ?> </span
                    <ul>
                        <li><a href="<?php echo home_url(); ?>">Research</a></li>
                        <li><a href="<?php echo home_url('/research'); ?>">Research</a></li>
                    <?php if (function_exists('bcn_display')) {
                        bcn_display();
                    } ?>
                </div>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title"><?php the_title(); ?></h2>
                    </header>
                    <div class="entry-content">
                        <?php the_content(); ?>
                        <?php
                        $args = array(
                            'post_type' => 'tww_study',
                            'posts_per_page' => -1,
                            'orderby' => 'title',
                            'order' => 'ASC'
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            echo '<ul>';
                            while ($query->have_posts()) {
                                $query->the_post();
                                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                            }
                            echo '</ul>';
                        }
                        
                        wp_reset_postdata();
                        ?>
                    </div>
                </article>
            </main>
        </div>
    </div>
<?php endwhile; endif;
?>

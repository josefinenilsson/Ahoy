<?php
/**
 * The main template file
 *
 */

get_header(); ?>
    <main>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php if (has_post_thumbnail()) {
            $banner = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        } else {
            $banner = get_template_directory_uri().'/img/background.jpg';
        } ?>
        <section class="banner" style="background-image: url(<?php echo $banner; ?>);">
            <section class="wrapper"><?php               
                $quote = get_field("quote");
                echo ($quote) ? '<q class="quote">'.$quote.'</q>': '<h1 class="heading">'.get_the_title().'</h1><time class="date timesince" data-timesince="'.get_the_time('U').'" datetime="'.get_the_time('c').'">'.get_the_time('F j, Y').'</time>';                 
            ?></section>
        </section>
        <section class="content">
            <article class="main-content">
                <?php if($quote) { ?><header class="post-meta">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <time class="date timesince" data-timesince="<?php the_time('U'); ?>" datetime="<?php the_time('c') ?>"><?php the_time('F j, Y') ?>.</time>
                </header><?php } ?>
                <?php the_content(); ?>
            </article>
            <?php endwhile; endif; ?>
        </main><!-- #container .wrapper -->       
<?php get_footer(); ?>
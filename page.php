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
                
                $subtitle = get_field("sub-title");
                $description = get_field("description");
                echo ($subtitle) ? '<h1 class="heading">'.$subtitle.'</h1>': '<h1 class="heading">'.get_the_title().'</h1>' ;
                echo ($description) ? '<span class="description">'.$description.'</span>': '' ;      
            ?></section>
        </section>
        <section class="content">
            <article class="main-content">
                <?php echo ($description) ? '<p class="description">'.$description.'</p>': '' ; ?>
                <?php the_content(); ?>
            </article>
            <?php endwhile; endif; ?>
        </main><!-- #container .wrapper -->       
<?php get_footer(); ?>
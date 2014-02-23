<?php
/**
 * The blog template file
 *
 */

get_header(); ?>
    <main>
        <?php 
        $home = get_option('page_for_posts');
        if (has_post_thumbnail($home)) {
            $banner = wp_get_attachment_url(get_post_thumbnail_id($home));
        } else {
            $banner = get_template_directory_uri().'/img/background.jpg';
        } ?>
        <section class="banner" style="background-image: url(<?php echo $banner; ?>);">
            <section class="wrapper"><?php
                $subtitle = get_field("sub-title", $home);
                $description = get_field("description", $home);
                echo ($subtitle) ? '<h1 class="heading">'.$subtitle.'</h1>': '<h1 class="heading">'.get_the_title().'</h1>' ;
                echo ($description) ? '<span class="description">'.$description.'</span>': '' ;      
            ?></section>
        </section>
        <section class="content">
            <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <article class="main-content">
                <header class="post-meta">
                    <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <time class="date timesince" data-timesince="<?php the_time('U'); ?>" datetime="<?php the_time('c') ?>"><?php the_time('F j, Y') ?>.</time>
                </header>
                <?php the_content(); ?>
            </article>
            <?php endwhile; endif; ?>
            
            <div class="pagination"><?php
                global $wp_query;
                $big = 99999999;
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                    'format' => '?paged=%#%',
                    'total' => $wp_query->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                    'show_all' => false,
                    'end_size' => 2,
                    'mid_size' => 3,
                    'prev_next' => false,
                    'type' => 'list'
                ));
            ?>
            </div>
        </main><!-- #container .wrapper -->       
<?php get_footer(); ?>
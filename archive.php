<?php
/**
 * The archive template file
 *
 */

get_header(); ?>
    <main>
        <?php if (has_post_thumbnail()) {
            $banner = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        } else {
            $banner = get_template_directory_uri().'/img/background.jpg';
        } ?>
        <section class="banner" style="background-image: url(<?php echo $banner; ?>);">
            <section class="wrapper">
                <h1 class="heading">
                    <?php
                    if ( is_day() ) { echo "Dagligt arkiv för " . get_the_date(); }
                    else if ( is_month() ){ echo "Månatligt arkiv för " . get_the_date('F, Y'); }
                    else if ( is_year() ){ echo "Årligt arkiv för " . get_the_date('Y'); }
                    else { echo "Arkiv"; }
                    ?>
                </h1>
                <?php if(is_Category()) { ?><span class="description"><?php echo category_description( $category_id ); ?></span><?php }?>
            </section>
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
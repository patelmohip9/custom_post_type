<?php
/**
 * Template Name: Home
 */
get_header();
?>
    <div class="container">
        <div class="d-inline-block">
            <h1 class="m-3">Competition Detail</h1>
        </div>
        <div class="d-inline-block">
            <button><a href="submit-entry">Submit Entry</a></button>
        </div>
        <div class="data-wrapper">
            <?php
                $paged = get_query_var('page') ? get_query_var('page') : 1;
                $args = array(
                    "post_type"         => "competition",
                    "posts_per_page"    => 5,
                    'paged'             => $paged
                );
                $query = new WP_Query($args);
                ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Competition Name</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">image</th>
                        <th scope="col">Submit Entry</th>
                    </tr>
                </thead>
                <?php
                if($query->have_posts()) {
                    while($query->have_posts()) : $query-> the_post();
                        ?>
                <tbody>
                    <tr>
                        <td><?php the_title();   ?></td>
                        <td><?php the_field('start_date');  ?></td>
                        <td><?php the_field('end_date');  ?></td>
                        <td><img src=" <?php the_field('banner_image'); ?> " alt="" style="width: 90px; height: 70px;"></td>
                        <td> <button><a href="submit-entry/<?php $slug = $post->post_name; echo $slug; ?>">Submit Entry</a></button></td>
                    </tr>
                </tbody>
                <?php
                    endwhile;
                }
                else {
                    echo "0 result";
                }
            ?>
            </table>
        </div>
            <?php
            $total = $query->max_num_pages;
                $big = 999999999; 
                if( $total > 1 )  {
                        if( !$current_page = get_query_var('page') )
                            $current_page = 1;
                        if( get_option('permalink_structure') ) {
                            $format = 'paged/%#%/';
                        } else {
                            $format = '&paged=%#%';
                        };
                    echo paginate_links(array(
                        'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format'		=> $format,
                        'current'		=> max( 1, get_query_var('page') ),
                        'total' 		=> $total,
                        'mid_size'		=> 1,
                    ) );
                }
            ?>
        </div>
    </div>
<?php
get_footer();
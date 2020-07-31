<?php

/**
 *
 * Template name: 404 Page
 *
 * This named template file can be assigned to a page or pages containing 404 content.
 * If no page is assigned, default content will appear. When multiple pages are assigned
 * the displayed page will be chosen at random.
 */

/**
 * Default page title and content
 */
$pageTitle = '404: Page not found';
$pageContent = 'We’re sorry, that page doesn’t exist.';

/**
 * Safety: If the page is accessed directly, redirect to the home page.
 */
if (!is_user_logged_in() && !is_404()) {
    wp_redirect(home_url('/', 'relative'));
}

/**
 * Find pages using this template. If more than one page is assigned, a random page will be used.
 */
$args = [
    'posts_per_page' => 1,
    'post_type' => 'page',
    'orderby' => 'rand',
    'meta_query' => [
        [
            'key' => '_wp_page_template',
            'value' => '404.php',
        ],
    ],
];
$pageQuery = new \WP_Query($args);

/**
 * Use $pageQuery or a synthetic $post object to populate page title and content
 */
if ($pageQuery->have_posts()) {
    $pageQuery->the_post();
} else {
    $fakePost = new \stdClass();
    $fakePost->ID = 0;
    $fakePost->post_title = $pageTitle;
    $fakePost->post_content = $pageContent;
    $fakePost->filter = 'raw';

    $post = new WP_Post($fakePost);
    setup_postdata($post);
}

get_header();

get_template_part('template-parts/page');

get_footer();

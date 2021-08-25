<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(
        '&hellip; <a class="inline-block bg-black text-white text-xs px-2 rounded-lg tracking-widest" href="%s">%s</a>',
        get_permalink(),
        __('continues', 'sage')
    );
});

/**
 * Remove website field from comment form
 */
add_filter('comment_form_default_fields', function ($fields) {
    unset($fields['url']);

    return $fields;
});

/**
 * Move comment field to bottom of comment form
 */
add_filter('comment_form_fields', function ($fields) {
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
});

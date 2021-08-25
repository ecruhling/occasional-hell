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

///**
// * Remove website field from comment form
// */
//add_filter('comment_form_default_fields', function ($fields) {
//    unset($fields['url']);
//    return $fields;
//});
//
///**
// * Display the 'comment' field at the bottom and remove the 'url' field:
// */
//add_filter( 'wpse_comment_fields', function( $fields )
//{
//    // Re-arrange fields
//    $fields = [ 'email', 'author', 'comment', 'submit' ];
//
//    return $fields;
//} );

/**
 * Plugin Name: Rearrange Comment Fields
 * Plugin URI:  http://wordpress.stackexchange.com/a/207449/26350
 * Author:      Birgir Erlendsson (birgire)
 * Description: Support for rearranging the comment fields: 'comment', 'auhtor', 'url', 'email' and 'submit' through the 'wpse_comment_fields' filter.
 * Version:     0.0.1
 */

add_action('comment_form_before', function () {
    if (class_exists('\App\WPSE_Rearrange_Comment_Fields')) {
        $fields = apply_filters(
            'wpse_comment_fields',
            [ 'author', 'email', 'comment', 'submit' ]
        );

        $o = new \App\WPSE_Rearrange_Comment_fields;
        $o->set_fields($fields)
          ->init();
    }
});

class WPSE_Rearrange_Comment_Fields
{
    private $html       = [];
    private $defaults   = [];
    private $fields     = [];

    public function set_fields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function init()
    {
        // Default
        $this->defaults = [ 'author', 'email', 'comment', 'submit' ];

        // Check for defaults
        if (empty($this->fields)) {
            $this->fields = $this->defaults;
        }

        // Hooks
        add_action('comment_form', [$this, 'display'], PHP_INT_MAX);
        add_filter('comment_form_field_comment', [$this, 'comment_form_field_comment'], PHP_INT_MAX);
        add_filter('comment_form_submit_field', [$this, 'comment_form_submit_field'], PHP_INT_MAX);
        foreach ([ 'author', 'url', 'email' ] as $field) {
            add_filter("comment_form_field_{$field}", [$this, 'comment_form_field'], PHP_INT_MAX);
        }
    }

    public function display()
    {
        // Display fields in the custom order
        $html = '';
        foreach ((array) $this->fields as $field) {
            if (in_array($field, $this->defaults)) {
                $html .= $this->html[$field];
            }
        }
        echo $html;
    }

    public function comment_form_submit_field($submit_field)
    {
        $this->html['submit'] = $submit_field;
        return '';
    }

    public function comment_form_field_comment($comment_field)
    {
        $this->html['comment'] = $comment_field;
        return '';
    }

    public function comment_form_field($field)
    {
        $key = str_replace('comment_form_field_', '', current_filter());
        $this->html[$key] = $field;
        return '';
    }
} // end class

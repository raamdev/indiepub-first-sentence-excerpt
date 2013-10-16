<?php
/*
Plugin Name: IndiePub First Sentence Excerpt
Plugin URI: http://independentpublisher.me/plugins/indiepub-first-sentence-excerpt/
Description: Generates a post excerpt using the first sentence in the post when no excerpt has been set.
Author: Raam Dev
Version: 1.0
Author URI: http://raamdev.com/
*/

/**
 * Return the post excerpt. If no excerpt set, generates an excerpt using the first sentence.
 */
function indiepub_first_sentence_excerpt($output)
	{
		global $post;
		$content_post = get_post($post->ID);

		$excerpt_more = apply_filters('excerpt_more', ' ' . '[&hellip;]');

		if(!$content_post->post_excerpt)
			{
				$strings = preg_split('/(\.|!|\?)\s/', strip_tags($content_post->post_content), 2, PREG_SPLIT_DELIM_CAPTURE);
				$output  = apply_filters('the_content', $strings[0].$strings[1].$excerpt_more);
			}

		return $output;
	}

add_filter('the_excerpt', 'indiepub_first_sentence_excerpt');
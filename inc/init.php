<?php
if (! defined ( 'ABSPATH' )) {
	die ( 'No script kiddies please!' );
}

if (is_admin () || php_sapi_name () == 'cli') {
	
	define ( 'YOIMG_SEO_PATH', dirname ( __FILE__ ) );
	
	define ( 'YOIMG_DEFAULT_IMGSEO_CHANGE_IMAGE_TITLE', TRUE );
	define ( 'YOIMG_DEFAULT_IMGSEO_CHANGE_IMAGE_ALT', TRUE );
	define ( 'YOIMG_DEFAULT_IMGSEO_CHANGE_IMAGE_FILENAME', TRUE );
	
	define ( 'YOIMG_TITLE_EXPRESSION_EN_US', '[title]' );
	define ( 'YOIMG_POST_TYPE_EXPRESSION_EN_US', '[post_type]' );
	define ( 'YOIMG_SITE_NAME_EXPRESSION_EN_US', '[site_name]' );
	define ( 'YOIMG_TAGS_EXPRESSION_EN_US', '[tags]' );
	define ( 'YOIMG_CATEGORIES_EXPRESSION_EN_US', '[categories]' );
	define ( 'YOIMG_AUTHOR_USERNAME_EXPRESSION_EN_US', '[author_username]' );
	define ( 'YOIMG_AUTHOR_FIRSTNAME_EXPRESSION_EN_US', '[author_firstname]' );
	define ( 'YOIMG_AUTHOR_LASTNAME_EXPRESSION_EN_US', '[author_lastname]' );
	
	define ( 'YOIMG_TITLE_EXPRESSION', __ ( YOIMG_TITLE_EXPRESSION_EN_US, YOIMG_DOMAIN ) );
	define ( 'YOIMG_POST_TYPE_EXPRESSION', __ ( YOIMG_POST_TYPE_EXPRESSION_EN_US, YOIMG_DOMAIN ) );
	define ( 'YOIMG_SITE_NAME_EXPRESSION', __ ( YOIMG_SITE_NAME_EXPRESSION_EN_US, YOIMG_DOMAIN ) );
	define ( 'YOIMG_TAGS_EXPRESSION', __ ( YOIMG_TAGS_EXPRESSION_EN_US, YOIMG_DOMAIN ) );
	define ( 'YOIMG_CATEGORIES_EXPRESSION', __ ( YOIMG_CATEGORIES_EXPRESSION_EN_US, YOIMG_DOMAIN ) );
	define ( 'YOIMG_AUTHOR_USERNAME_EXPRESSION', __ ( YOIMG_AUTHOR_USERNAME_EXPRESSION_EN_US, YOIMG_DOMAIN ) );
	define ( 'YOIMG_AUTHOR_FIRSTNAME_EXPRESSION', __ ( YOIMG_AUTHOR_FIRSTNAME_EXPRESSION_EN_US, YOIMG_DOMAIN ) );
	define ( 'YOIMG_AUTHOR_LASTNAME_EXPRESSION', __ ( YOIMG_AUTHOR_LASTNAME_EXPRESSION_EN_US, YOIMG_DOMAIN ) );
	
	define ( 'YOIMG_DEFAULT_IMGSEO_IMAGE_TITLE_EXPRESSION', YOIMG_TITLE_EXPRESSION );
	define ( 'YOIMG_DEFAULT_IMGSEO_IMAGE_ALT_EXPRESSION', YOIMG_TITLE_EXPRESSION );
	define ( 'YOIMG_DEFAULT_IMGSEO_IMAGE_FILENAME_EXPRESSION', YOIMG_TITLE_EXPRESSION );
	$yoimg_seo_settings = get_option ( 'yoimg_seo_settings' );
	
	define ( 'YOIMG_IMGSEO_CHANGE_IMAGE_TITLE', $yoimg_seo_settings && isset ( $yoimg_seo_settings ['imgseo_change_image_title'] ) ? $yoimg_seo_settings ['imgseo_change_image_title'] : YOIMG_DEFAULT_IMGSEO_CHANGE_IMAGE_TITLE );
	define ( 'YOIMG_IMGSEO_CHANGE_IMAGE_ALT', $yoimg_seo_settings && isset ( $yoimg_seo_settings ['imgseo_change_image_alt'] ) ? $yoimg_seo_settings ['imgseo_change_image_alt'] : YOIMG_DEFAULT_IMGSEO_CHANGE_IMAGE_ALT );
	define ( 'YOIMG_IMGSEO_CHANGE_IMAGE_FILENAME', $yoimg_seo_settings && isset ( $yoimg_seo_settings ['imgseo_change_image_filename'] ) ? $yoimg_seo_settings ['imgseo_change_image_filename'] : YOIMG_DEFAULT_IMGSEO_CHANGE_IMAGE_FILENAME );
	define ( 'YOIMG_IMGSEO_ENABLED', YOIMG_IMGSEO_CHANGE_IMAGE_TITLE || YOIMG_IMGSEO_CHANGE_IMAGE_ALT || YOIMG_IMGSEO_CHANGE_IMAGE_FILENAME );
	
	define ( 'YOIMG_IMGSEO_IMAGE_TITLE_EXPRESSION', $yoimg_seo_settings && isset ( $yoimg_seo_settings ['imgseo_image_title_expression'] ) ? $yoimg_seo_settings ['imgseo_image_title_expression'] : YOIMG_DEFAULT_IMGSEO_IMAGE_TITLE_EXPRESSION );
	define ( 'YOIMG_IMGSEO_IMAGE_ALT_EXPRESSION', $yoimg_seo_settings && isset ( $yoimg_seo_settings ['imgseo_image_alt_expression'] ) ? $yoimg_seo_settings ['imgseo_image_alt_expression'] : YOIMG_DEFAULT_IMGSEO_IMAGE_ALT_EXPRESSION );
	define ( 'YOIMG_IMGSEO_IMAGE_FILENAME_EXPRESSION', $yoimg_seo_settings && isset ( $yoimg_seo_settings ['imgseo_image_filename_expression'] ) ? $yoimg_seo_settings ['imgseo_image_filename_expression'] : YOIMG_DEFAULT_IMGSEO_IMAGE_FILENAME_EXPRESSION );
	
	if (YOIMG_IMGSEO_ENABLED) {
		require_once (YOIMG_SEO_PATH . '/commons.php');
		require_once (YOIMG_SEO_PATH . '/extend-attachment-uploading.php');
		require_once (YOIMG_SEO_PATH . '/extend-post-saving.php');
	}
	require_once (YOIMG_SEO_PATH . '/extend-yoimg-settings.php');
}
function yoimg_default_supported_expressions($supported_expressions) {
	if (! $supported_expressions) {
		$supported_expressions = array ();
	}
	array_push ( $supported_expressions, YOIMG_TITLE_EXPRESSION, YOIMG_POST_TYPE_EXPRESSION, YOIMG_SITE_NAME_EXPRESSION, YOIMG_TAGS_EXPRESSION, YOIMG_CATEGORIES_EXPRESSION, YOIMG_AUTHOR_USERNAME_EXPRESSION, YOIMG_AUTHOR_FIRSTNAME_EXPRESSION, YOIMG_AUTHOR_LASTNAME_EXPRESSION );
	return $supported_expressions;
}
add_filter ( 'yoimg_supported_expressions', 'yoimg_default_supported_expressions', 10, 1 );
<?php
$post = $wp_query->post;
if ( in_category('691') ) {
include('single-news.php');
} else if( in_category('21') ) {
include('single-reviews.php');
}else {
include('single-standard.php');
}
?>
<footer role="footer" class="main-foot equalize">
<div class="wsu-logo">
	<a title="Washington State University" href="http://www.wsu.edu"><img src="/wp-content/uploads/sites/6/2015/01/bg-header.jpg" width="196px" height="61px" alt="Washington State University" /></a>
</div>
<div class="footer-description">
<?php 
	$my_postid = 48;//This is page id or post id
$content_post = get_post($my_postid);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
echo $content;
?>
</div>
<nav class="footer-menu">
<?php
	$spine_site_args = array(
		'theme_location'  => 'site',
		'menu'            => 'footer',
		'container'       => false,
		'container_class' => false,
		'container_id'    => false,
		'menu_class'      => null,
		'menu_id'         => null,
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 3,
	);
	wp_nav_menu( $spine_site_args ); ?>
</nav>
<div id="site-copyright">
		<?php 
	$my_postid = 44;//This is page id or post id
$content_post = get_post($my_postid);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
echo $content;
?>
</div>
</footer>
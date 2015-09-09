<?php 
if ( has_post_thumbnail() ) {?>
<div class="post-type-wrapper">
	<a href="<?php the_permalink();?>"><?php the_post_thumbnail('main-medium-thumb'); ?></a>
</div>
<?php }
?>
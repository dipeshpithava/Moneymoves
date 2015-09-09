<?php
/*-----------------------------------------------------------------------------------*/
/* Get Related Posts
/*-----------------------------------------------------------------------------------*/
function get_related_posts($post_id) {
	$query = new WP_Query();
    
    $args = '';

	$args = wp_parse_args($args, array(
		'showposts' => -1,
		'post__not_in' => array($post_id),
		'ignore_sticky_posts' => 0,
		'showposts'=>4,
        'category__in' => wp_get_post_categories($post_id)
	));
	
	$query = new WP_Query($args);
	
  	return $query;
}

/*-----------------------------------------------------------------------------------*/
/* Get Most Racent posts
/*-----------------------------------------------------------------------------------*/
function mypassion_recent_posts($numberOfPosts = 5 , $thumb = true){
	global $post;
	$orig_post = $post;
	global $admin_data;
	
	$divider = '&nbsp;  '. $admin_data['divider2'] .' &nbsp;';
	
	$lastPosts = get_posts('numberposts='.$numberOfPosts);
	foreach($lastPosts as $post): setup_postdata($post);
?>
	<li>
        <a href="<?php the_permalink(); ?>" class="title"><?php echo the_title(); ?></a>
        <span class="meta">
			<?php if($admin_data['home_date']){ the_time(get_option('date_format'));  }
            if($admin_data['home_category']){if($admin_data['home_date']){echo $divider;} the_category(', ');} 
            if($admin_data['home_comment']){ echo $divider; comments_popup_link(__( 'No Comment', 'framework' ),__( '1 comment', 'framework' ),__( '% Comments', 'framework' ),'',__( 'Comments are off', 'framework' ));} ?> 
        </span>
        <?php
            $mypassion_review_enable =  get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
            $mypassion_review_type =  get_post_meta(get_the_ID(), 'mypassion_review_type', true);
            $mypassion_final_score =  get_post_meta(get_the_ID(), 'mypassion_final_score', true);
            $mypassion_final_percentage = $mypassion_final_score * 20 ;
        ?>
        <?php if($admin_data['review_switcher'] == true){ ?>
        <?php if($mypassion_review_enable == 'enable'){ ?><span class="mypassion-rating mypassion-rating-<?php echo esc_html($mypassion_review_type); ?>"><span style="width:<?php echo esc_html($mypassion_final_percentage); ?>%;"></span></span>
        <?php } ?>
		<?php } ?>
    </li>
<?php endforeach; 
	wp_reset_query();
	$post = $orig_post;
}

/*-----------------------------------------------------------------------------------*/
/* Get Popular posts 
/*-----------------------------------------------------------------------------------*/
function mypassion_popular_posts($pop_posts = 5 , $thumb = true){
	global $wpdb , $post;
	$orig_post = $post;
	global $admin_data;
	
	$divider = '&nbsp;  '. $admin_data['divider2'] .' &nbsp;';
	
	$popularposts = "SELECT ID,post_title,post_date,post_author,post_content,post_type FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY comment_count DESC LIMIT 0,".$pop_posts;
	$posts = $wpdb->get_results($popularposts);
	if($posts){
		global $post;
		foreach($posts as $post){
		setup_postdata($post);?>
        	
            <li>
                <a href="<?php the_permalink(); ?>" class="title"><?php echo the_title(); ?></a>
                <span class="meta">
					<?php if($admin_data['home_date']){ the_time(get_option('date_format'));  }
                    if($admin_data['home_category']){if($admin_data['home_date']){echo $divider;} the_category(', ');} 
                    if($admin_data['home_comment']){ echo $divider; comments_popup_link(__( 'No Comment', 'framework' ),__( '1 comment', 'framework' ),__( '% Comments', 'framework' ),'',__( 'Comments are off', 'framework' ));} ?> 
                </span>
                <?php
					$mypassion_review_enable =  get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
					$mypassion_review_type =  get_post_meta(get_the_ID(), 'mypassion_review_type', true);
					$mypassion_final_score =  get_post_meta(get_the_ID(), 'mypassion_final_score', true);
					$mypassion_final_percentage = $mypassion_final_score * 20 ;
				?>
                <?php if($admin_data['review_switcher'] == true){ ?>
				<?php if($mypassion_review_enable == 'enable'){ ?><span class="mypassion-rating mypassion-rating-<?php echo esc_html($mypassion_review_type); ?>"><span style="width:<?php echo esc_html($mypassion_final_percentage); ?>%;"></span></span>
				<?php } ?>
				<?php } ?>
            </li>
            
	<?php 
		}
		wp_reset_query();
	}
	$post = $orig_post;
}

/*-----------------------------------------------------------------------------------*/
/* Get Most Commented posts 
/*-----------------------------------------------------------------------------------*/
function mypassion_most_commented($comment_posts = 5 , $avatar_size = 60){
$comments = get_comments('status=approve&number='.$comment_posts);
foreach ($comments as $comment) { ?>
	<li>
		<!--<div class="post-thumbnail">
			< ?php echo get_avatar( $comment, $avatar_size ); ?>
		</div>-->
		<a href="<?php echo get_permalink($comment->comment_post_ID ); ?>#comment-<?php echo esc_html($comment->comment_ID); ?>"  class="title"><strong>
		<?php echo strip_tags($comment->comment_author); ?>:</strong>  <?php echo wp_html_excerpt( $comment->comment_content, 60 ); ?>... </a>
	</li>
<?php } 
}


/*-----------------------------------------------------------------------------------*/
/* Get Popular posts for HOMEPAGE
/*-----------------------------------------------------------------------------------*/
function mypassion_popular_posts_home($pop_posts = 4 , $thumb = true){
	global $wpdb , $post;
	$orig_post = $post;
	global $admin_data;
	
	$args = array(  'numberposts'  => $pop_posts,  /* get 4 posts, or set -1 for all */
					'orderby'      => 'meta_value_num',  /* this will look at the meta_key you set below */
					'meta_key'     => 'post_views_count',
					'order'        => 'DESC',
					'post_type'    => 'post',
					'post_status'  => 'publish'
    );

	$popularposts2 = "SELECT ID,post_title,post_date,post_author,post_content,post_type FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY comment_count DESC LIMIT 0,".$pop_posts;
	
	if($admin_data['m1_post_order']){$posts2 = get_posts( $args );}
	else{$posts2 = $wpdb->get_results($popularposts2);}
	
	if($posts2){
		
		foreach($posts2 as $post){
		setup_postdata($post);?>
        	
            <li>
            	<!--< ?php $popular_post_perm = get_permalink()."?p=".get_the_ID();?>-->
                
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(240, 160)); ?></a>
                <p>
                    <!-- <?php if($admin_data['home_date']){ ?><span><?php the_time(get_option('date_format')); ?>.</span><?php } ?> -->
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </p>
                <?php
					$mypassion_review_enable =  get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
					$mypassion_review_type =  get_post_meta(get_the_ID(), 'mypassion_review_type', true);
					$mypassion_final_score =  get_post_meta(get_the_ID(), 'mypassion_final_score', true);
					$mypassion_final_percentage = $mypassion_final_score * 20 ;
				?>
                <?php if($admin_data['review_switcher'] == true){ ?>
				<?php if($mypassion_review_enable == 'enable'){ ?><span class="mypassion-rating mypassion-rating-<?php echo esc_html($mypassion_review_type); ?>"><span style="width:<?php echo esc_html($mypassion_final_percentage); ?>%;"></span></span>
				<?php } ?>
                <?php } ?>
            </li>
            
	<?php 
		}
		wp_reset_query();
	}
	$post = $orig_post;
}

function mypassion_popular_posts_home_homepage($pop_posts = 4 , $thumb = true){
	global $wpdb , $post;
	$orig_post = $post;
	global $admin_data;
	
	$args = array(  'numberposts'  => $pop_posts,  /* get 4 posts, or set -1 for all */
					'orderby'      => 'meta_value_num',  /* this will look at the meta_key you set below */
					'meta_key'     => 'post_views_count',
					'order'        => 'DESC',
					'post_type'    => 'post',
					'post_status'  => 'publish'
    );

	$popularposts2 = "SELECT ID,post_title,post_date,post_author,post_content,post_type FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY comment_count DESC LIMIT 0,".$pop_posts;
	
	if($admin_data['m1_post_order']){$posts2 = get_posts( $args );}
	else{$posts2 = $wpdb->get_results($popularposts2);}
	
	if($posts2){
		
		foreach($posts2 as $post){
		setup_postdata($post);?>
        	
            <li>
            	<!--< ?php $popular_post_perm = get_permalink()."?p=".get_the_ID();?>-->
                
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(240, 160)); ?></a>
                <p>
                    <!-- <?php if($admin_data['home_date']){ ?><span><?php the_time(get_option('date_format')); ?>.</span><?php } ?> -->
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </p>
                <?php
					$mypassion_review_enable =  get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
					$mypassion_review_type =  get_post_meta(get_the_ID(), 'mypassion_review_type', true);
					$mypassion_final_score =  get_post_meta(get_the_ID(), 'mypassion_final_score', true);
					$mypassion_final_percentage = $mypassion_final_score * 20 ;
				?>
                <?php if($admin_data['review_switcher'] == true){ ?>
				<?php if($mypassion_review_enable == 'enable'){ ?>
				<div class="full-col-12">
					<span class="total_comments">
						<?php $comments_count = wp_count_comments(get_the_ID()); ?>
						<a href="javascript:void(0);" title="<?php echo $comments_count->total_comments<=1?$comments_count->total_comments." Comment":$comments_count->total_comments." Comments"; ?>">
							<i class="fa fa-comments-o"></i>
							<?php echo $comments_count->total_comments<=1?$comments_count->total_comments." Comment":$comments_count->total_comments." Comments"; ?>
						</a>
					</span>
					<span class="total_views">
						<a href="javascript:void(0);" title="<?php $meta = get_post_meta( $post->ID, 'super_post', true ); if(isset($meta['views'])){echo $meta['views']<=1?$meta['views']." View":$meta['views']." Views";}?>"><i class="fa fa-eye"></i>
							<?php $meta = get_post_meta( $post->ID, 'super_post', true ); if(isset($meta['views'])){echo $meta['views']<=1?$meta['views']." View":$meta['views']." Views";}?>
						</a>
					</span>
					<!--
<span class="mypassion-rating mypassion-rating-<?php echo esc_html($mypassion_review_type); ?>">
						<span style="width:<?php echo esc_html($mypassion_final_percentage); ?>%;"></span>
					</span>
-->
				</div>
				<?php } ?>
                <?php } ?>
            </li>
            
	<?php 
		}
		wp_reset_query();
	}
	$post = $orig_post;
}

function mypassion_popular_posts_home1($pop_posts = 4 , $thumb = true){
	global $wpdb , $post;
	$orig_post = $post;
	global $admin_data;
	
	$args = array(  'numberposts'  => $pop_posts,  /* get 4 posts, or set -1 for all */
					'orderby'      => 'meta_value_num',  /* this will look at the meta_key you set below */
					'meta_key'     => 'post_views_count',
					'order'        => 'DESC',
					'post_type'    => 'post',
					'post_status'  => 'publish'
    );

	$popularposts2 = "SELECT ID,post_title,post_date,post_author,post_content,post_type FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY comment_count DESC LIMIT 0,".$pop_posts;
	
	if($admin_data['m1_post_order']){$posts2 = get_posts( $args );}
	else{$posts2 = $wpdb->get_results($popularposts2);}
	
	if($posts2){
		
		foreach($posts2 as $post){
		setup_postdata($post);?>
        	
            <li>
            	<!--< ?php $popular_post_perm = get_permalink()."?p=".get_the_ID();?>-->
                
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(240, 160)); ?></a>
                <p>
                    <!-- <?php if($admin_data['home_date']){ ?><span><?php the_time(get_option('date_format')); ?>.</span><?php } ?> -->
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </p>
                <?php
					$mypassion_review_enable =  get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
					$mypassion_review_type =  get_post_meta(get_the_ID(), 'mypassion_review_type', true);
					$mypassion_final_score =  get_post_meta(get_the_ID(), 'mypassion_final_score', true);
					$mypassion_final_percentage = $mypassion_final_score * 20 ;
				?>
                <?php if($admin_data['review_switcher'] == true){ ?>
				<?php if($mypassion_review_enable == 'enable'){ ?>
				<div class="full-col-12">
					<span class="total_comments">
						<i class="fa fa-comments-o"></i>
						<?php comments_popup_link(__( '0 Comment', 'framework' ),__( '1 comment', 'framework' ),__( '% Comments', 'framework' ),'',__( 'Comments are off', 'framework' ));?>
					</span>
					<span class="total_views">
						<i class="fa fa-eye"></i>
						<?php
							$meta = get_post_meta( $post->ID, 'super_post', true );
							if(isset($meta['views'])){
								echo $meta['views']<=1?$meta['views']." View":$meta['views']." Views";
							}
						?>
					</span>
					<!--
<span class="mypassion-rating mypassion-rating-<?php echo esc_html($mypassion_review_type); ?>">
						<span style="width:<?php echo esc_html($mypassion_final_percentage); ?>%;"></span>
					</span>
-->
				</div>
				<div class="excerpt_dip"><?php the_excerpt(); ?></div>
				<?php } ?>
                <?php } ?>
            </li>
            
	<?php 
		}
		wp_reset_query();
	}
	$post = $orig_post;
}

function mypassion_popular_posts_home2($pop_posts = 4 , $thumb = true){
	global $wpdb , $post;
	$orig_post = $post;
	global $admin_data;
	
	$args = array(  'numberposts'  => $pop_posts,  /* get 4 posts, or set -1 for all */
					'orderby'      => 'meta_value_num',  /* this will look at the meta_key you set below */
					'meta_key'     => 'post_views_count',
					'order'        => 'DESC',
					'post_type'    => 'post',
					'post_status'  => 'publish'
    );
	$category_id = get_cat_ID($admin_data['custom_category_name']);
	//$popularposts2 = "SELECT ID,post_title,post_date,post_author,post_content,post_type FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND ID = ".$category_id." ORDER BY comment_count DESC LIMIT 0,".$pop_posts;
	
	if($admin_data['m1_post_order']){$posts2 = get_posts( $args );}
	else{$posts2 = $wpdb->get_results($popularposts2);}
	
	if($posts2){
		//print_r($posts2);
		foreach($posts2 as $post){
		setup_postdata($post);?>
        	
            <li data-query="<?php print_r($posts2, true); ?>">
            	<!--< ?php $popular_post_perm = get_permalink()."?p=".get_the_ID();?>-->
                
                <a href="<?php the_permalink(); ?>" data-id="<?=$category_id?>"><?php the_post_thumbnail(array(240, 160)); ?></a>
                <p>
                    <!-- <?php if($admin_data['home_date']){ ?><span><?php the_time(get_option('date_format')); ?>.</span><?php } ?> -->
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </p>
                <?php
					$mypassion_review_enable =  get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
					$mypassion_review_type =  get_post_meta(get_the_ID(), 'mypassion_review_type', true);
					$mypassion_final_score =  get_post_meta(get_the_ID(), 'mypassion_final_score', true);
					$mypassion_final_percentage = $mypassion_final_score * 20 ;
				?>
                <?php if($admin_data['review_switcher'] == true){ ?>
				<?php if($mypassion_review_enable == 'enable'){ ?>
				<div class="full-col-12">
					<span class="total_comments">
						<i class="fa fa-comments-o"></i>
						<?php comments_popup_link(__( '0 Comment', 'framework' ),__( '1 comment', 'framework' ),__( '% Comments', 'framework' ),'',__( 'Comments are off', 'framework' ));?>
					</span>
					<span class="total_views">
						<i class="fa fa-eye"></i>
						<?php
							$meta = get_post_meta( $post->ID, 'super_post', true );
							if(isset($meta['views'])){
								echo $meta['views']<=1?$meta['views']." View":$meta['views']." Views";
							}
						?>
					</span>
					<!--
<span class="mypassion-rating mypassion-rating-<?php echo esc_html($mypassion_review_type); ?>">
						<span style="width:<?php echo esc_html($mypassion_final_percentage); ?>%;"></span>
					</span>
-->
				</div>
				<div class="excerpt_dip"><?php the_excerpt(); ?></div>
				<?php } ?>
                <?php } ?>
            </li>
            
	<?php 
		}
		wp_reset_query();
	}
	$post = $orig_post;
}

function mypassion_popular_posts_home_paged($pop_posts = 4 , $thumb = true){
	global $wpdb , $post;
	$orig_post = $post;
	global $admin_data;
	
	$args = array(  'numberposts'  => $pop_posts,  /* get 4 posts, or set -1 for all */
					'orderby'      => 'meta_value_num',  /* this will look at the meta_key you set below */
					'meta_key'     => 'post_views_count',
					'order'        => 'DESC',
					'post_type'    => 'post',
					'post_status'  => 'publish'
    );

	$wp_query = new WP_Query('cat='.$admin_data['custom_category_id'].'&showposts=3&order=DESC&paged='.$paged);
	while ($wp_query->have_posts()): $wp_query->the_post();
	//
	setup_postdata($wp_query->the_post());
	?>
		<li>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(240, 160)); ?></a>
		</li>
	<?php
	endwhile;
	$post = $orig_post;
}

/*-----------------------------------------------------------------------------------*/
/* Get Most Hot posts for HOMEPAGE 
/*-----------------------------------------------------------------------------------*/
function mypassion_hot_posts($numberOfPosts = 4 , $thumb = true){
	global $post;
	$orig_post = $post;
	global $admin_data;
	
	$lastPosts = get_posts('numberposts='.$numberOfPosts);
	foreach($lastPosts as $post): setup_postdata($post);
?>
	<li>
            	
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('main-small-thumb'); ?></a>
        <p>
            <!-- <?php if($admin_data['home_date']){ ?><span><?php the_time(get_option('date_format')); ?>.</span><?php } ?> -->
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </p>
        <?php
            //$mypassion_review_enable =  get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
            $mypassion_review_enable =  'enable';
            $mypassion_review_type =  get_post_meta(get_the_ID(), 'mypassion_review_type', true);
            $mypassion_final_score =  get_post_meta(get_the_ID(), 'mypassion_final_score', true);
            $mypassion_final_percentage = $mypassion_final_score * 20 ;
        ?><!-- <?php echo $admin_data['review_switcher'] ?> -->
        <?php if($admin_data['review_switcher'] == true){ ?><!-- <?php echo $mypassion_review_enable ?> -->
        <?php if($mypassion_review_enable == 'enable'){ ?><span class="mypassion-rating mypassion-rating-<?php echo esc_html($mypassion_review_type); ?>"><span style="width:<?php echo esc_html($mypassion_final_percentage); ?>%;"></span></span>
        <?php } ?>
		<?php } ?>
    </li>
<?php endforeach; 
	wp_reset_query();
	$post = $orig_post;
}

function mypassion_hot_posts_homepage($numberOfPosts = 4 , $thumb = true){
	global $post;
	$orig_post = $post;
	global $admin_data;
	
	$lastPosts = get_posts('numberposts='.$numberOfPosts);
	foreach($lastPosts as $post): setup_postdata($post);
?>
	<li>
            	
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('main-small-thumb'); ?></a>
        <p>
            <!-- <?php if($admin_data['home_date']){ ?><span><?php the_time(get_option('date_format')); ?>.</span><?php } ?> -->
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </p>
        <?php
            //$mypassion_review_enable =  get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
            $mypassion_review_enable =  'enable';
            $mypassion_review_type =  get_post_meta(get_the_ID(), 'mypassion_review_type', true);
            $mypassion_final_score =  get_post_meta(get_the_ID(), 'mypassion_final_score', true);
            $mypassion_final_percentage = $mypassion_final_score * 20 ;
        ?><!-- <?php echo $admin_data['review_switcher'] ?> -->
        <?php if($admin_data['review_switcher'] == true){ ?><!-- <?php echo $mypassion_review_enable ?> -->
        <?php if($mypassion_review_enable == 'enable'){ ?>
        <div class="full-col-12">
					<span class="total_comments">
						<?php $comments_count = wp_count_comments(get_the_ID()); ?>
						<a href="javascript:void(0);" title="<?php echo $comments_count->total_comments<=1?$comments_count->total_comments." Comment":$comments_count->total_comments." Comments"; ?>">
							<i class="fa fa-comments-o"></i>
							<?php echo $comments_count->total_comments<=1?$comments_count->total_comments." Comment":$comments_count->total_comments." Comments"; ?>
						</a>
					</span>
					<span class="total_views">
						<a href="javascript:void(0);" title="<?php $meta = get_post_meta( $post->ID, 'super_post', true ); if(isset($meta['views'])){echo $meta['views']<=1?$meta['views']." View":$meta['views']." Views";}?>"><i class="fa fa-eye"></i>
							<?php $meta = get_post_meta( $post->ID, 'super_post', true ); if(isset($meta['views'])){echo $meta['views']<=1?$meta['views']." View":$meta['views']." Views";}?>
						</a>
					</span>
				</div>
        <?php } ?>
		<?php } ?>
    </li>
<?php endforeach; 
	wp_reset_query();
	$post = $orig_post;
}




/*-----------------------------------------------------------------------------------*/
/* Get Twitter Follower count as plain text
/*-----------------------------------------------------------------------------------*/
function mypassion_twitter_follower2($screen_name)
{
	$key = 'mypassion_twitter_follower2_' . $screen_name;

	// Let's see if we have a cached version
	$followers_count = get_transient($key);
	if ($followers_count !== false)
		return $followers_count;
	else
	{
		// If there's no cached version we ask Twitter
		$response = wp_remote_get("http://api.twitter.com/1/users/show.json?screen_name={$screen_name}");
		if (is_wp_error($response))
		{
			// In case Twitter is down we return the last successful count
			return get_option($key);
		}
		else
		{
			// If everything's okay, parse the body and json_decode it
			$json = json_decode(wp_remote_retrieve_body($response));
			$count = $json->followers_count;

			// Store the result in a transient, expires after 1 day
			// Also store it as the last successful using update_option
			set_transient($key, $count, 60);
			update_option($key, $count);
			return $count;
		}
	}
}


/*-----------------------------------------------------------------------------------*/
/* Get Facebook Fans count as plain text
/*-----------------------------------------------------------------------------------*/
function fb_fanpage_count($fanpage_id) {
	$count = get_transient('fan_count');
	if ($count !== false) return $count;
	$count = 0;
	$data = wp_remote_get('http://api.facebook.com/restserver.php?method=facebook.fql.query&query=SELECT%20fan_count%20FROM%20page%20WHERE%20page_id='.$fanpage_id.'');
	if (is_wp_error($data)) {
	return 'Error';
	}else{
	$count = strip_tags($data[body]);
	}
	set_transient('fan_count', $count, 60*60*24); // 24 hour cache
	echo esc_html($count);
}

function get_my_fbk_fans($page_id) {
    $xml = @simplexml_load_file("http://api.facebook.com/restserver.php?method=facebook.fql.query&query=SELECT%20fan_count%20FROM%20page%20WHERE%20page_id=".$page_id."") or die ("a lot");
    $fans = $xml->page->fan_count;
    return $fans;
}

/*-----------------------------------------------------------------------------------*/
/* Get Rss Subscribers count as plain text
/*-----------------------------------------------------------------------------------*/
/*function rss_count ($rss_user) {
	$rssurl="https://feedburner.google.com/api/awareness/1.0/GetFeedData?uri=". $rss_user;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $rssurl);
	$stored = curl_exec($ch);
	curl_close($ch);
	$grid = new SimpleXMLElement($stored);
	$rsscount = $grid->feed->entry['circulation']+0;
	return number_format($rsscount);
}

function rss_count_run($feed) {
	$rss_subs = rss_count ($feed);
	$rss_option = "rss_sub_value";
	$rss_subscount = get_option($rss_option);
	if (is_null($rss_subs)) { return $rss_subscount; }
	else {update_option($rss_option, $rss_subs); return $rss_subs;}
}

function rss_sub_value($feed) {
	echo rss_count_run($feed);
}*/

/*function curl($url) {
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_HEADER, 0);
    // EDIT your domain to the next line:
    curl_setopt($ch,CURLOPT_TIMEOUT,10);
    $data = curl_exec($ch);
    
    if (curl_errno($ch) !== 0 || curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {
        $data === false;
    }
    curl_close($ch);
    return $data;
}

// Get Feedburner RSS Subscriber count as plain text
add_option('pp_feeds_count','0','','yes');
add_option('pp_feeds_api_timer',mktime(),'','yes');

function pp_feeds_count($fbn_id) {
    $rsscount = 0;

    if ( $rsscount == 0 OR get_option('pp_feeds_api_timer') < (mktime() - 3600) ) {
    //if ( true ) {
        // EDIT your Feedburner feed name here:
        $subscribers = curl("http://feeds.feedburner.com/" . $fbn_id);
        
        try {
            $xml = new SimpleXmlElement($subscribers, LIBXML_NOCDATA);
            //var_dump($xml);

            if ($xml) {
                $rsscount = (string) $xml->feed->entry['circulation'];

                if($rsscount > 0)
				{
                	update_option('pp_feeds_count', $rsscount);
                	update_option('pp_feeds_api_timer', mktime());
                }
                else
                {
                	$rsscount = get_option('pp_feeds_count');
                }
            }
        } catch (Exception $e) { }
    }
    else
    {
    	$rsscount = get_option('pp_feeds_count');
    }
    
    //Echo the count if we got it
    if($rsscount == 'N/A' || $rsscount == '0') { echo 0; }
    else { echo number_format($rsscount); }
}*/
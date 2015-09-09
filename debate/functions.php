<?php
include_once "../wp-config.php";
//DB_NAME
//DB_USER
//DB_PASSWORD
//DB_HOST

try {
    $conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
     
    $stmt = $conn->prepare('SELECT * FROM webinar_thumbs');
    $stmt->execute();
	
    while($row = $stmt->fetch()) {
        //print_r($row);
        ?>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="div-relative on-hover">
				<a class="refvid" href="javascript:void(0);" data-refid="<?=$row['youtube_id']?>"><img src="<?=$row['thumb']?>" class="img-responsive img-thumbnail img-center"/></a>
				<div class="div-caption">
					<p class="caption-name"><?=$row['caption']?></p>
				</div><!--enddiv-caption-->
			</div><!--div-relative-->	
		</div><!--end col-lg-6-->
        <?php
    }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>
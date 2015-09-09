<?php
	session_start();

	$db = "moneymasala_pages";
	$username = "root";
	$password = "root";

if(isset($_GET["action"]) && $_GET["action"] == "login"){
	try {
	    $conn = new PDO('mysql:host=localhost;dbname='.$db, $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
	    $email_id = $_POST["email_id"];
	    $username = $_POST["username"];
	    $full_name = $_POST["full_name"];
	    $fb_id = $_POST["fb_id"];
	    $pic = $_POST["pic"];

	    $stmt = $conn->prepare('SELECT * FROM debate_users WHERE fb_id = :fb_id');
    	$stmt->execute(array('fb_id' => $fb_id));

    	$is_new_user = 1;
    	while($row = $stmt->fetch()){
    		$is_new_user = 0;
    	}

    	$_SESSION["email_id"] = $email_id;
    	$_SESSION["username"] = $username;
    	$_SESSION["full_name"] = $full_name;
    	$_SESSION["fb_id"] = $fb_id;
    	$_SESSION["pic"] = $pic;

    	if($is_new_user != 0){
			$stmt = $conn->prepare("insert into debate_users (email_id, username, full_name, fb_id, pic) values('".$email_id."', '".$username."', '".$full_name."', '".$fb_id."', '".$pic."')");
	    	$res = $stmt->execute();
    	}
    	echo "ok";
	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}
	exit;
}

if(isset($_GET["action"]) && $_GET["action"] == "comment"){
	if(@$_SESSION["fb_id"] == ""){
		exit;
	}
	try{
		$conn = new PDO('mysql:host=localhost;dbname='.$db, $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare('SELECT * FROM debate_users WHERE fb_id = :fb_id');
	    $stmt->execute(array('fb_id' => @$_SESSION["fb_id"]));

		$user_id = 0;
	    while($row = $stmt->fetch()){
	    	$user_id = $row["id"];
	    }

	    $comments = $_POST["txt_comments_positive"]==""?$_POST["txt_comments_negative"]:$_POST["txt_comments_positive"];
	    $comment_state = $_POST["txt_comments_positive"]==""?1:0;

		$stmt = $conn->prepare("insert into debate_comments (comments, user_id, comment_state, is_active) values (:comments, :user_id, :comment_state, :is_active)");
		$data = array(
			'comments'      => $comments,
			'user_id'       => $user_id,
			'comment_state' => $comment_state,
			'is_active'     => 0
			);
	    $res = $stmt->execute($data);
	    echo "ok";
	}catch(Exception $e){
		echo 'ERROR: ' . $e->getMessage();
	}
}
?>
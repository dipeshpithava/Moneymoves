<?php
    //Function Create Table
    function create_database()
    {
         require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
         
         $query="CREATE TABLE IF NOT EXISTS Friend_List(
                FriendsID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                FriendsName VARCHAR(40),
                FriendsMobile VARCHAR(10),
                City VARCHAR(20),
                State VARCHAR(20),
                Country VARCHAR(20)
             )ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;";
         
         dbDelta($query);   //This function use to create table
    }
    function add_menu()
    {
         //Add Menu Page To Admin Site
         //add_menu_page("Friend List", "Friend List", "friend_cap", "9code_friend_list_slug","fun_operations");
         add_menu_page( 'Webinar CMS Page', 'Webinar CMS', 'manage_options', 'webinar-cms', 'fun_operations' );
         /*
          * here Argument 1 ==> Page Title
          *               2 ==> Menu Title
          *               3 ==> Capabilities (Which Use Can View This Page)
          *               4 ==> Page Slug Name
          *               5 ==> Function Name Call When Page Menu Click
          */
         
         $role = get_role( 'administrator' );       //get Role
         //$role->add_cap('friend_cap');      //Page Capabilities Here
         $role->add_cap('manage_options');      //Page Capabilities Here
    }
    
    
    //call when page menu click
    function fun_operations()
    { 
        if(isset($_POST["submit"]))
        {
            $id = (isset($_POST['webinarid'])) ? $_POST['webinarid'] : 0;
            do_action("save_friends_hook",$id);
        }
        $id = (isset($_GET['webinarid'])) ? $_GET['webinarid'] : 0;
        do_action("add_friends_hook",$id);
        if($_GET["action"] == "delete")
            do_action("delete_friends_hook",$id);
        do_action("view_friends_hook");
        
        //Here do_action has two argument 1==> Hook name you can define any hook name here
                                       // 2==> Parameter you can pass paramentet as your requirement
    }
    
    
    function head_script()
    {
        ob_start();
        ?>
        <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__); ?>css/DT_bootstrap.css">
        <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__); ?>css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__); ?>css/styles.css">
        <script src="<?php echo plugin_dir_url(__FILE__); ?>js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo plugin_dir_url(__FILE__); ?>js/jquery.dataTables.js"></script>
        <script src="<?php echo plugin_dir_url(__FILE__); ?>js/DT_bootstrap.js"></script>
        <?php
    }
    add_action('admin_head','head_script');
    
    add_action("add_friends_hook", "add_friends_form");
    add_action("save_friends_hook","save_friends");
    add_action("delete_friends_hook","delete_friends_detail");
    add_action('view_friends_hook','view_friends');
    
    function add_friends_form($webinarid)
    {
        global $wpdb;
        if( (isset($_GET['action']) && $_GET['action']=='update'))
            $sel_friend=$wpdb->get_results("SELECT * FROM webinar_thumbs WHERE webinarid=".$webinarid);    //Select Query Fire
        
        ?>
        <form name="9code_friends_list"  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
            <?php if($webinarid!=0)
                        echo "<input type=hidden name='webinarid' id='webinarid' value='".$webinarid."'>";
                ?>
            <div id="mytable2">   
                <table width="96%">
                     <caption>Webinar</caption>
                    <tr>
                        <td style="width:30%">YouTube ID:</td>
                        <td style="width:45%;float:left;"><input type="text" name="youtube_id" required value="<?php echo $sel_friend[0]->youtube_id ;?>"></td>
                    </tr>
                    <tr>
                        <td>Thumb:</td>
                        <td style="width:45%;float:left;"><input type="text" name="thumb" required value="<?php echo $sel_friend[0]->thumb ;?>"></td>
                    </tr>
                    <tr>
                        <td>Caption:</td>
                        <td style="width:45%;float:left;"><input type="text" name="caption" required value="<?php echo $sel_friend[0]->caption ;?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="submit" value="<?php if($webinarid!=0) echo "Update"; else echo "ADD"; ?>" />
                            <?php if($webinarid!=0) echo "<a href='admin.php?page=webinar-cms' class='button2'>Add New</a>"; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <?php 
    }
    
    function save_friends($webinarid)
    {
        global $wpdb;
        $insert=array(
            'youtube_id'=>$_POST['youtube_id'],
            'thumb'=>$_POST['thumb'],
            'caption'=>$_POST['caption']
        );
        if($webinarid==0)
        {
            $wpdb->insert("webinar_thumbs",$insert);
        }
        else
        {
             $wpdb->update("webinar_thumbs",$insert, array('webinarid'=>$webinarid));
        }
    }
    
    function delete_friends_detail($webinarid)
    {
        global $wpdb;
        $wpdb->query("DELETE FROM webinar_thumbs WHERE webinarid=".$webinarid);
    }
    
    function view_friends()
    {
        global $wpdb;
        ?>
        <br>
        <div style="width:97%;margin-left:17px;">
        <table id="example" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
            <?php
            $rec = $wpdb->get_results("SELECT * FROM webinar_thumbs");
            if ($rec[0]->webinarid != "") 
            {
            ?>
                <thead>
                <tr>
                    <th align="center" scope="col">YouTube ID</th>
                    <th align="center" scope="col">Thumb</th>
                    <th align="center" scope="col">Caption</th>
                    <th align="center" scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;
                    foreach ($rec as $event) 
                    {
                        ?>
                        <tr>
                            <td align="center" scope="col"><?php echo $event->youtube_id; ?></td>
                            <td align="center" scope="col"><?php echo $event->thumb ?></td>
                            <td align="center" scope="col"><?php echo $event->caption; ?></td>
                            <td align="center" scope="col">
                                <a href="admin.php?page=webinar-cms&webinarid=<?php echo $event->webinarid ?>&action=update" style="text-decoration: none"><img src="<?php echo plugin_dir_url(__FILE__)."images/icon-edit.png" ?>">&nbsp; &nbsp; </a>
                                <a href="admin.php?page=webinar-cms&webinarid=<?php echo $event->webinarid ?>&action=delete" style="text-decoration: none" onclick="return confirm('Are you sure you want to delete?')"><img src="<?php echo plugin_dir_url(__FILE__)."images/icon-delete.png" ?>"> </a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                }
                ?>
                </tbody>
        </table>
        </div>
        <?php
    }
?>

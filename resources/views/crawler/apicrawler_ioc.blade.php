<?php
    //Prep db connection details and open connection.
    $srvname = base64_decode("bG9jYWxob3N0");
    $usrname = base64_decode("dGNzZWV5ZXM=");
    $passwd = base64_decode("dGNzZWV5ZXNARXNjQGxAdGU5ODc=");
    $dbname = base64_decode("dGNzZWV5ZXM=");
    
    // Start/create db connection
    $conn = new mysqli($srvname, $usrname, $passwd, $dbname);

    // Check connection if can connect
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    //Download IOC from API
    ///// PRODUCTION
    //$url = 'http://localhost/'. date("m/d/Y");
    ///// STAGING
    $url = 'https://pastebin.com/raw/bF6xMMh8';
    $file_name = "data/tbl-blog-today_ioc.json";
    echo "Downloading IOC file from API...</br>";
    if(file_put_contents( $file_name,file_get_contents($url))) { 
        echo "File downloaded.</br>"; 
    }else { 
        echo "Failed to download IOC.</br>"; 
    }
    echo "</br></br></br>";

    //Load and decode json to php var
    $alltblioctoday = json_decode(file_get_contents("data/tbl-blog-today_ioc.json"), true);
    print_r($alltblioctoday);
    echo "</br></br></br>";

    foreach($alltblioctoday as $ioc) {
        $pid = $ioc['pid'];
        echo "PID: ". $pid ."</br>";
        $ioctype = $ioc['ioc_type'];
        echo "IOC Type: ". $ioctype ."</br>";
        $ioc = str_replace(array("#", "'", ";", "$", "\"", "="), '', $ioc['ioc']);
        echo "IOC: ". $ioc ."</br>";

        //var_dump($ioc['page']);

        //$page = $ioc['page'];
        //echo "Page: ". $page ."</br>";

        echo "</br>";
    }

/*
    //Enumerage each json element and prep to php var for db insertion
    foreach($alltblioctoday as $ioc) {
        $ioc = str_replace(array("#", "'", ";", "$", "\"", "="), '', $ioc['ioc']);
        echo "IOC: ". $ioc ."</br>";
        //$page = $ioc['page'];
        //echo "Page: ". $page ."</br>";
        $related_blog_id = $ioc['related_blog_id'];
        $last_modified = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        echo "Related blog ID: ". $related_blog_id ."</br>";
        echo "Last modified: ". $last_modified ."</br>";
        echo "Created at: ". $created_at ."</br>";
        echo "Updated at: ". $updated_at ."</br>";
        echo "<br>";

        
        //Check if IOC id is already on db.
        //$sqlcheck = "SELECT `blog_id` FROM `tbl_blogs` WHERE `blog_id`='$iocid'";
        $sqlcheck = "SELECT `pid` FROM `iocs` WHERE `pid`='$pid'";
        $sqlcheckresult = $conn->query($sqlcheck);
        
        if (!empty($sqlcheckresult) && $sqlcheckresult->num_rows > 0) {
            //If already on db, skip this record.
            while($sqlcheckrow = $sqlcheckresult->fetch_assoc()) {
                echo "PID: " . $sqlcheckrow["pid"]. " already exists in the db, skipping... </br>";
            }
        } else {
            //If not yet on db, push to database for storage.
            //$sqlpush = "INSERT INTO `tbl_blogs`(`pid`, `source_type`, `blog_id`, `title`, `author`, `published_date`, `link`, `rss_source`, `date_created`, `hidden`, `testing_status`) VALUES ('$pid','$sourcetype','$iocid','$title','$author','$publisheddate','$link','$rsssource','$datecreated','0','None')";
            $sqlpush = "INSERT INTO `iocs`(`pid`, `ioc_type`, `ioc`, `page`, `related_blog_id`, `last_modified`, `created_at`, `updated_at`) VALUES ('$pid', '$ioctype', '$ioc', '$page', '$related_blog_id', '$last_modified', '$created_at', '$updated_at')";
            
            if ($conn->query($sqlpush) === TRUE) {
            echo "==>Pushed to DB successfully</br>";
            } else {
            echo "Error: " . $sqlpush . "<br>" . $conn->error;
            }
        }
        echo "</br></br>";
    }
    
*/

    //Close db conn
    try {
        $conn->close();
    }    
    catch (dbconnexception $e) {
        echo "</br></br></br>";
        echo "Db connection is already closed: ". $e->getMessage();
    }

    //header("Location: ../iocs");
    exit();
?>
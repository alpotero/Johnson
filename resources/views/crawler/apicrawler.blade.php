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
    $url = 'https://pastebin.com/raw/N86J2u9t';
    $file_name = "data/tbl-blog-orig.json";
    echo "Downloading IOC file from API...</br>";
    if(file_put_contents( $file_name,file_get_contents($url))) { 
        echo "File downloaded.</br>"; 
    }else { 
        echo "Failed to download IOC.</br>"; 
    }
    echo "</br></br></br>";

    //Load and decode json to php var
    $alltblblogtoday = json_decode(file_get_contents("data/tbl-blog-orig.json"), true);
    //print_r($alltblblogtoday);

    //Enumerage each json element and prep to php var for db insertion
    foreach($alltblblogtoday as $blog) {
        $pid = $blog['pid'];
        $sourcetype = $blog['source_type'];
        $blogid = $blog['blog_id'];
        $title = str_replace(array("#", "'", ";", "$"), '', $blog['title']);
        $summary = '';
        $author = str_replace(array("#", "'", ";", "$"), '', $blog['author']);
        $rawpublisheddate = strtotime($blog['published_date']);
        //$publisheddate = date('D, d M Y H:i:s',$rawpublisheddate);
        $publisheddate = date('Y-m-d H:i:s', $rawpublisheddate);
        $link = $blog['link'];
        $rsssource = $blog['rss_source'];
        $rawdatecreated = strtotime($blog['date_created']);
        $datecreated = date('Y-m-d H:i:s', $rawdatecreated);

        echo "PID: ". $pid ."</br>";
        echo "Source Type: ". $sourcetype ."</br>";
        echo "Blog ID: ". $blogid ."</br>";
        echo "Title: ". $title ."</br>";
        echo "Summary: ";
        echo "Author: ". $author ."</br>";
        echo "Published Date: ". $publisheddate ."</br>";
        echo "Link: ". $link ."</br>";
        echo "RSS Source: ". $rsssource ."</br>";
        echo "Date Created: ". $datecreated ."</br>";
        echo "<br>";

        //Check if IOC id is already on db.
        $sqlcheck = "SELECT `pid` FROM `tbl_blog` WHERE `pid`='$pid'";
        $sqlcheckresult = $conn->query($sqlcheck);
        
        if (!empty($sqlcheckresult) && $sqlcheckresult->num_rows > 0) {
            //If already on db, skip this record.
            while($sqlcheckrow = $sqlcheckresult->fetch_assoc()) {
                echo "PID: " . $sqlcheckrow["pid"]. " already exists in the db, skipping... </br>";
            }
        } else {
            //If not yet on db, push to database for storage.
            $sqlpush = "INSERT INTO `tbl_blog`(`pid`, `source_type`, `blog_id`, `title`, `author`, `published_date`, `link`, `rss_source`, `date_created`) VALUES ('$pid','$sourcetype','$blogid','$title','$author','$publisheddate','$link','$rsssource','$datecreated')";
            
            if ($conn->query($sqlpush) === TRUE) {
            echo "==>Pushed to DB successfully</br>";
            } else {
            echo "Error: " . $sqlpush . "<br>" . $conn->error;
            }
        }
        echo "</br></br>";
    }
    


    //Close db conn
    try {
        $conn->close();
    }    
    catch (dbconnexception $e) {
        echo "</br></br></br>";
        echo "Db connection is already closed: ". $e->getMessage();
    }

    header("Location: ../dashboard");
    exit();
?>
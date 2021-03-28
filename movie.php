<?php
    //session_start();
    /*echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';*/
    
    include 'conn.php';
        $m_name=$_POST['m_name'];
        $m_time=$_POST['m_time'];
        $lan=$_POST['lan'];
        $date=$_POST['Date'];
        $af_name=$_POST['Af_name'];
        $al_name=$_POST['Al_name'];
        $agender=$_POST['Agender'];
        $df_name=$_POST['df_name'];
        $dl_name=$_POST['dl_name'];
        $dgender=$_POST['dgender'];
        $a_role=$_POST['role'];
        //$sql="insert into movies(mov_title,language,mov_time,rel_date) VALUES('$m_name','$lan','$m_time','$date')";
        $sql="INSERT INTO movies(mov_title,language,mov_time,rel_date)
        SELECT * FROM (SELECT '$m_name','$lan','$m_time','$date') AS tmp
        WHERE NOT EXISTS (
            SELECT mov_title FROM movies WHERE mov_title = '$m_name'
        ) LIMIT 1";
        //$sql1="insert into actors(fname,lname,gender) VALUES('$af_name','$al_name','$agender')";
        $sql1="INSERT INTO actors(afname,alname,gender)
        SELECT * FROM (SELECT '$af_name','$al_name','$agender') AS tmp
        WHERE NOT EXISTS (
            SELECT afname FROM actors WHERE afname = '$af_name'
        ) LIMIT 1";
        //$sql2="insert into director(fname,lname,gender) VALUES('$df_name','$dl_name','$dgender')";
        $sql2="INSERT INTO director(fname,lname,gender)
        SELECT * FROM (SELECT '$df_name','$dl_name','$dgender') AS tmp
        WHERE NOT EXISTS (
            SELECT fname FROM director WHERE fname = '$df_name'
        ) LIMIT 1";

        $query=mysqli_query($con,$sql) or die(mysqli_error($con));
        $query=mysqli_query($con,$sql1) or die(mysqli_error($con));
        $query=mysqli_query($con,$sql2) or die(mysqli_error($con));

        $data="SELECT * from movies WHERE mov_title='$m_name' "; 
        $result=mysqli_query($con,$data);
        //$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo "created successfully";
        while($row = mysqli_fetch_assoc($result)){
            $mov_id=$row['mov_id'];
        }
        } else {
            echo "0 results";
        }

        $data1="select * from actors where afname='$af_name' "; 
        $result1=mysqli_query($con,$data1);
        //$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if (mysqli_num_rows($result1) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result1)){
            //echo '<h3>'.$row['a_id'].' Vs ' .$row['fname'].'</h3>';
            $a_id=$row['a_id'];
        }
        } else {
            echo "0 results";
        }

        $data2="SELECT * from director WHERE fname='$df_name'  "; 
        $result2=mysqli_query($con,$data2);
        //$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if (mysqli_num_rows($result2) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result2)){
            $d_id=$row['d_id'];
        }
        } else {
            echo "0 results";
        }

        $sql4="INSERT INTO `cast`(`mov_id`, `a_id`, `role`) VALUES ('$mov_id','$a_id','$a_role')";
        
        $sql3="insert into direct(mov_id,d_id) values('$mov_id','$d_id')";
        
        
        $query=mysqli_query($con,$sql3) or die(mysqli_error($con));
        $query=mysqli_query($con,$sql4) or die(mysqli_error($con));

    if($query)
    {?>
        <script>
            alert("created successful");
        </script>
    <?php
    }
    else{
        ?>
            <script>
                alert("creation not  successful");
            </script>    
        <?php
    }


?>
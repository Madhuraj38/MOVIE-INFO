<!DOCTYPE html>

<html>

    <head>
        <title>Search</title>
        <script src="search.js" async=""></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
    </head>
    <body>
        <div style="background-color: black;" class="container">
            <nav  aria-label="page Navigation Example">
                <ul  class="pagination">
                    <a style="background-color: rgb(16, 243, 72);" onclick="mov()" href="#mov" class="page-link">Movies</a>
                    <a onclick="act()" href="#" class="page-link">Actor</a>
                    <a onclick="direct()" href="#" class="page-link">Director</a>
                </ul>
            </nav>
        </div>
        <div  id="mov">
            <div class="container">
                <div class="jumbotron">
                    <h3 class="text-center">Search for Movies</h3>
                    <form id="searchForm" action="" method="POST">
                        <input type="text" class="form-control" id="searchText" name="movie" placeholder="Search">
                        <input class="btn btn-success" type="submit" name="search" value="Enter">
                    </form>
                    
                </div>
            </div>
                <?php
                   echo '<div class="container">';
                   include 'conn.php';
                   if(isset($_POST['search']))
                   {
                       $_nam=$_POST['movie'];
                       //$sql="select * from movies where mov_title='$_nam' ";
                       $sql="SELECT mov_title, language,mov_time,rel_date,fname,lname, afname, alname,e.role FROM movies a, direct b, director c, actors d, cast e WHERE (a.mov_title='$_nam' AND a.mov_id=b.mov_id AND b.d_id=c.d_id AND a.mov_id=e.mov_id AND e.a_id=d.a_id) ";
                       $result=mysqli_query($con,$sql);
                        //$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row 
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<h1>Movie Detals</h1>';
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">MOVIE: '.$row['mov_title'].'</li>';
                                echo '<li class="list-group-item">Language: '.$row['language'].'</li>';
                                echo '<li class="list-group-item">Duration in Minutes: '.$row['mov_time'].'</li>';
                                echo '<li class="list-group-item">Release_Date: '.$row['rel_date'].'</li>';
                                echo '<li class="list-group-item">Director-Name: '.$row['fname'].' '.$row['lname'].'</li>';
                                echo '<li class="list-group-item">Actor_Name: '.$row['afname'].' '.$row['alname'].'</li>';
                                echo '<li class="list-group-item">Role: '.$row['role'].'</li>';
                                
                                echo '</ul>';
                            }
                        } else {
                        echo "0 results";
                        }
                   }
                   echo '</div>';
                ?>
        </div>
        <div style="display:none;" id="dir">
            <div class="container">
                <div class="jumbotron">
                    <h3 class="text-center">Search for directors</h3>
                    <form id="searchForm" action="" method="POST">
                        <input type="text" class="form-control" id="searchText1" name="dname" placeholder="Search">
                        <input class="btn btn-success" type="submit" name="search" value="Enter">
                    </form>
                </div>
            </div>
            <?php
                  echo '<div class="container">';
                   include 'conn.php';
                   if(isset($_POST['search']))
                   {
                       $_nam=$_POST['dname'];
                       //$sql="select * from director where fname='$_nam' ";
                       $sql="SELECT mov_title, language,mov_time,rel_date,fname,lname, afname, alname ,e.role
                       FROM movies a, direct b, director c, actors d, cast e
                       WHERE (c.fname='$_nam' AND a.mov_id=b.mov_id AND  b.d_id=c.d_id AND a.mov_id=e.mov_id AND e.a_id=d.a_id) ";
                       $result=mysqli_query($con,$sql);
                        //$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row 
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<h1>Director Detals</h1>';
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">MOVIE: '.$row['mov_title'].'</li>';
                                echo '<li class="list-group-item">Language: '.$row['language'].'</li>';
                                echo '<li class="list-group-item">Duration in Minutes: '.$row['mov_time'].'</li>';
                                echo '<li class="list-group-item">Release_Date: '.$row['rel_date'].'</li>';
                                echo '<li class="list-group-item">Director-Name: '.$row['fname'].' '.$row['lname'].'</li>';
                                echo '<li class="list-group-item">Actor_Name: '.$row['afname'].' '.$row['alname'].'</li>';
                                echo '<li class="list-group-item">Role: '.$row['role'].'</li>';
                                
                                echo '</ul>';
                            }
                        } else {
                        echo "0 results";
                        }
                   }
                   echo '</div>';
                ?>
            
        </div>
        <div style="display:none;" id="act">
            <div class="container">
                <div class="jumbotron">
                    <h3 class="text-center">Search for actors</h3>
                    <form id="searchForm" action="" method="POST">
                        <input type="text" class="form-control" id="searchText2" name="aname" placeholder="Search">
                        <input class="btn btn-success" type="submit" name="search" value="Enter">
                    </form>
                </div>
            </div>
            <?php
                 echo '<div class="container">';
                   include 'conn.php';
                   if(isset($_POST['search']))
                   {
                       $_nam=$_POST['aname'];
                       //$sql="select * from actors where fname='$_nam' ";
                       $sql="SELECT mov_title, language,mov_time,rel_date,fname,lname, afname, alname ,e.role
                       FROM movies a, direct b, director c, actors d, cast e
                       WHERE (d.afname='$_nam' AND a.mov_id=b.mov_id AND  b.d_id=c.d_id AND a.mov_id=e.mov_id AND e.a_id=d.a_id) ";
                       $result=mysqli_query($con,$sql);
                        //$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row 
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<h1>Actor Detals</h1>';
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">MOVIE: '.$row['mov_title'].'</li>';
                                echo '<li class="list-group-item">Language: '.$row['language'].'</li>';
                                echo '<li class="list-group-item">Duration in Minutes: '.$row['mov_time'].'</li>';
                                echo '<li class="list-group-item">Release_Date: '.$row['rel_date'].'</li>';
                                echo '<li class="list-group-item">Director-Name: '.$row['fname'].' '.$row['lname'].'</li>';
                                echo '<li class="list-group-item">Actor_Name: '.$row['afname'].' '.$row['alname'].'</li>';
                                echo '<li class="list-group-item">Role: '.$row['role'].'</li>';
                                
                                echo '</ul>';
                            }
                        } else {
                        echo "0 results";
                        }
                   }
                   echo '</div>';
                ?>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </body>

</html>
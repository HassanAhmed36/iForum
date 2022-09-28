<?php include 'link.php' ?>
<?php
include 'db.php';
$id = $_GET['t_id'];
$noResult = true;
$q = "SELECT * From `thread` where t_id = $id ";
$res = mysqli_query($link, $q);
$cat = mysqli_fetch_assoc($res);
$name = @$cat['t_title'];
$desc = @$cat['t_desc'];

?>

<?php include 'nav.php' ?>
<section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">


        <div class="row mt-5" style="color:#16507b">

            <div class="card" style="border-left:5px solid red !important;">
                <div class="card-body py-4">
                    <h2><?php echo $name ?></h2>
                    <p><?php echo $desc ?></p>
                </div>
            </div>




        </div>




        <h2 class="my-5" style="color:#16507b">
            Disscussion
        </h2>
        <?php
        include 'db.php';
    

        
        $qu = "SELECT * From `comments` where thread_id = $id ";
        $result = mysqli_query($link, $qu);
        while ($row = mysqli_fetch_assoc($result)) {
          $noResult = false;
          echo '<div class="card my-3" style="border-left:5px solid green !important;">
          <div class="card-body">
              <p>'.$row["com_text"].'</p>
          </div>
      </div>';
      
      
      
          
        }
        ?>
        <?php if ($noResult) {
            echo '<h3 class="text-center mb-4">Be the first person Answer this question</h3>';
        }



        ?>



        <h1 id="box" class="mt-4 mb-4">&nbsp</h1>
        <div class="container col-md-10 my-5" style="color:#124265">
            <?php
            $text = @$_POST['ans'];
            $method = $_SERVER['REQUEST_METHOD'];
            if ($method === 'POST') {
                $q = "INSERT INTO `comments` values (null ,'$text', $id ,current_timeStamp()) ";
                $result = mysqli_query($link, $q);


            }




            ?>

            <h2 class="my-5">Answer a question</h2>
            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">

                <div class="mb-3">
                    <h5 for="exampleFormControlTextarea1" class="form-label">Post a comment</h5>
                    <textarea class="form-control" name="ans" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">post comment</button>
            </form>
        </div>


    </div>

</section><!-- End Team Section -->

<?php include 'footer.php' ?>
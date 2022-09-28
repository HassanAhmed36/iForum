<?php include 'link.php' ?>

<?php include 'nav.php' ?>
<?php
include 'db.php';
$id = @$_GET['c_id'];
$noResult = true;
$q = "SELECT * From `thread` where cat_id = $id ";
$res = mysqli_query($link, $q);
$cat = mysqli_fetch_assoc($res);
$name = @$cat['c_name'];
$desc = @$cat['c_desc'];

?>


<section id="faq" class="faq section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title mt-5 mb-5">
      <h2>Welcome to <?= $name ?> Forum</h2>
      <p><?= $desc ?></p>

    </div>

    <?php

    $q = "SELECT * From `thread` where cat_id = $id ";
    $res = mysqli_query($link, $q);



    ?>

    <div class="faq-list mb-4 ">
      <ul>
        <?php
        while ($row = mysqli_fetch_assoc($res)) {
          $noResult = false;
        ?>
          <li data-aos="fade-up">
            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1"><?= $row['t_title'] ?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-1" class="collapse" data-bs-parent=".faq-list">
              <p>
                <?= $row['t_desc'] ?>
              </p>
              <a class="p-0" href="thread.php?t_id=<?= $row['t_id'] ?> "> <button class="btn btn-sm btn-primary mt-3 ">Answer a question</button></a>
            </div>
          </li>


        <?php

        }

        ?>







      </ul>
    </div>
    <?php
    if ($noResult) {
      echo '<h3 class="text-center mb-4">Be the first person ask a question</h3>';
    }
    ?>
    <h1 id="box" class="mt-4 mb-4">&nbsp</h1>
    <div class="container col-md-10 my-5"  style="color:#124265">
    <?php
    $title = @$_POST['title'];
    $desc = @$_POST['desc'];
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'POST') {
      $q = "INSERT INTO `thread` values (null ,'$title','$desc', $id, current_timeStamp()) ";
      $result = mysqli_query($link, $q);
    }

   


?>


    <h2 class="my-5">Enter your threads</h2>
    <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST" >
      <div class="mb-3">
        <h5 for="exampleFormControlInput1" class="form-label">Problem Title</h5>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" >
      </div>
      <div class="mb-3">
        <h5 for="exampleFormControlTextarea1" class="form-label">Elobrate your concern</h5>
        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="5"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

  </div>
</section>

<?php include 'footer.php' ?>
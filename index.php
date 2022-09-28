<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>iForums</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php include 'link.php'?>


  


</head>

<body>
  <?php include 'nav.php'?>

  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>Welcome to iForums</h1>
          <h5>Ask the coding quesion and problems?
           A public platform building the definitive collection of coding questions & answers ...</h5>
         
        </div>
      </div>
      <div class="text-center">
        <a href="#box" class="btn-get-started scrollto">Get Started</a>
      </div>
<h1 id="box" class="mt-5 mb-3">&nbsp</h1>
<!-- <h2 id="box" class="mt-5 mb-5 text-center fs-2" style="color:#124265"><b>Categories</b></h2> -->
      <div class="row icon-boxes mt-4" >
        <?php 
        include 'db.php';
        
        $q = "SELECT * FROM `category`";
        $res = mysqli_query($link, $q);
        while($row = mysqli_fetch_assoc($res)) {
         echo ' <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 mt-3" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <!-- <div class="icon"><i class="ri-stack-line"></i></div> -->
            <h4 class="title"><a href="">' . $row['c_name'] .'</a></h4>
            <p class="description">' . substr($row['c_desc'],0,50) .'..</p>
          <a href="threadlist.php?c_id=' . $row['c_id'] .'"><button class="btn btn-sm btn-primary mt-3">view threads</button></a>
          </div>
          </div>';
         
        }
        
        ?>
   
        </div>

  
  

 

        

      </div>
    </div>
  </section><!-- End Hero -->



  <?php include 'footer.php'?>


</body>

</html>
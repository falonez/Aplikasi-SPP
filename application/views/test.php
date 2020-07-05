<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
  
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
 <!--  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol> -->
  <div class="carousel-inner">
    <?php foreach ($berita as $news): ?>
    <div class="carousel-item">
      <img class="d-block w-100" style="height:410px;" src="<?= base_url('assets/img/berita/'); ?><?= $news['gambar']; ?>" style="background: black" alt="First slide">
      <p><?= $news['konten']; ?></p>
    </div>
    <?php endforeach ?>
    <div class="carousel-item  active">
      <img class="d-block w-100" style="height:410px;" src="<?= base_url('assets/img/2.jpg'); ?>" style="background: blue" alt="Second slide">
    </div>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div>

</div>

    
    </div>
  </div>
</div>
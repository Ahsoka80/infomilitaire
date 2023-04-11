
    <div class="container-fluid mx-auto mt-3"><!--CONTAINER START-->
        <div class="row justify-content-center"><!--ROW START-->
            <div class="col-sm-12 col-md-10 col-lg-8-justify-content-between"><!--COL START-->
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false"><!--CAROUSEL START-->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner ">
                    <!--================PICTURE 1 START========================-->
                        <div class="carousel-item active">
                            <img src="../public/assets/img/mav_15.jpg" class="d-block w-100 rounded"  alt="image armée de terre">
                        </div>
                    <!--================PICTURE 1 END========================-->
                    <!--================PICTURE 2 START========================-->    
                        <div class="carousel-item">
                            <img src="../public/assets/img/mav_15.jpg" class="d-block w-100 rounded" alt="image armée de l'air">
                        </div>
                    <!--================PICTURE 2 END========================-->
                    <!--================PICTURE 3 START========================-->
                        <div class="carousel-item">
                            <img src="../public/assets/img/mav_15.jpg" class="d-block w-100 rounded" alt="marine nationale">
                        </div>
                    <!--================PICTURE 3 END========================-->        
                    </div>
                    <!--================BUTTON START========================-->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <!--================BUTTON END========================-->
                </div><!--CAROUSEL END-->
            </div><!--COL END-->
        </div><!--ROW END-->
        <!--================LINE START========================-->
        <hr>
        <!--================LINE END========================-->
        <div class="row justify-content-center mb-2"><!--ROW NEWS START-->
            <!--TITLE NEWS START-->
            <div class="col-sm-12 col-md-11 col-lg-11 mb-1">
                <h5>Actualités :</h5>
            </div>
            <!--TITLE NEWS END-->

            <?php for ($i = $count - 6; $i < $count; $i++) {
                        $item = $items[$i]; { ?>
            <!--CARD START-->
            <div class=" col-sm-12 col-md-6 col-lg-4 ">
                <div class="card mb-3 card-md-6 " style="max-width: 540px;">
                    
                        <div class="col-12">
                            <div class="card-body">
                                <h5 class="card-title"> <?=  $item->title ?> </h5>
                                <p class="card-text"> <?= $item->description ?> </p>
                                <a class="btn btn-primary" href="<?= $item->link ?>" role="button">Plus d'infos</a>
                                <small> <?= date('d.m.Y à H:i', strtotime($item->pubDate)) ?> </small>
                            </div>
                        </div>
                    
                </div>
            </div>
            <!--CARD END-->
            <?php }
            } ?>
        </div><!--ROW NEWS END-->
    </div><!--CONTAINER END-->
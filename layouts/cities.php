
            <div class="container">
                <div class="row">
                    <?php
                    
    $citiesArray = new CallAPIv3($scope = 'resource=cities&with_keyword_description=true&with_about=true&onlyWithEvents=true', $method = 'GET'); 
    if (isset($citiesArray->result->cities) && count($citiesArray->result->cities) > 0 ) {
     $cities = $citiesArray->result->cities;
     foreach ($cities as &$value) {                         
       ?>  <div class="col-md-4 px-md-2 mb-4 p-0">
                        <div class="card mb-5 cat-card">
                            <a href="<?php echo $systemUrl;?>city/<?php echo $value->slug; ?>"
                                title="<?php echo $value->title; ?>">
                                <img src="<?php echo $systemUrl; ?>assets/images/cities/<?php echo $value->city_photo; ?>"
                                    class="img-fluid" alt="<?php echo $value->title; ?>">
                            <div class="p-2 description-dark-color">
                                <div class='  d-inline-block'>
                             
                                  <h2 class="card-title" style=""><?php echo $value->name; ?></h2>
                                   
                                </div>
                                <div class="card-text">
                                  <?php echo $value->description; ?>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>


                    <?php	
    }
  }
  ?>

                </div>
            </div>
 
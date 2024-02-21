<div class="row pt-2">

    <?php
        $categoriesArray = new CallAPIv3($scope = 'resource=categories&with_keyword_description=true',$method = 'GET'); 
        if (isset($categoriesArray->result->categories) && (count($categoriesArray->result->categories) > 0)) {
            $categories = $categoriesArray->result->categories;
            ksort($categories);
            foreach ($categories as $value) {
    ?>

    <div class="col-sm-12 col-md-3">
        <a class="card-link" title="<?php echo $centerName . ' ' . $value->name . ' Training Program'; ?>"<?php
            if($eventPage != null and $eventPage !='' and $value->id != null and $value->id !='') {
                ?> href="<?php
                echo $systemUrl.$categorySlugs[$value->id];
                ?>"<?php
            } ?>> 
            <div class="card mb-5 cat-card">
                <img src="<?php echo $systemUrl; ?>assets/images/cardCategories/<?php echo $value->icon ?>" class="card-img-top cat-img-size" alt="<?php echo $centerName . ' ' . $value->name; ?>">
                <!-- <img src="<?php echo $systemUrl; ?>assets/images/icon/icoold/<?php echo $value->id; ?>.svg" alt="<?php echo $centerName . ' ' . $value->name; ?>"> -->
                <div class="card-body" style="min-height:180px;max-height:180px;">
                    <h2 class="card-title"><?php echo $value->name; ?></h2>
                    <p class="card-text">
                        <?php 
                            $description = $value->description;                        
                        
                            $num_words = 15;
                            $words = array();
                            $words = explode(" ", $description, $num_words);
                            $shown_string = "";
                            
                            if(count($words) == 15){
                                $words[14] = " ... ";
                            }
                            
                            $shown_string = implode(" ", $words);

                            echo $shown_string;
                        ?>
                    </p>
                </div>
            </div>
        </a>
    </div>

    <?php
            }
        }
    ?>

</div>
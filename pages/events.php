
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            $category = null;
            $page = null;
            if (isset($eventsArray->result->courses)) {
                if(isset($cityView)){
                    // echo "resource=cities&id=$cityid&with_keyword_description=true";
                    $city = new CallAPIv3($scope = "resource=cities&id=$cityid&with_keyword_description=true",$method = 'GET');
                    breadCrumbs($city->result->cities[0]->name,'c/'.$city->result->cities[0]->slug.'.html',$city->result->cities[0]->name);
                }else{
                    $categoryId = $eventsArray->result->courses[0]->categoriesId;
                    $category = new CallAPIv3($scope = 'resource=categories&id='.$categoryId.'&with_keyword_description=true',$method = 'GET'); 
                    $category = $category->result->categories[0];
                }
                if (isset($_GET['page'])) {
                    $page = ', Page ' . $_GET['page'];
                }
            }
        ?> 
        <meta name="description" content="<?php echo isset($category) ? $category->description . $page : 'No Events' ?>">
        <meta name="keywords" content="<?php echo  isset($category) ? $category->keyword : 'No Events' ?>">
        <meta property="og:title" content="<?php echo isset($category) ? $category->name : '' ?>">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo isset($category) ? $category->description . $page : 'No Events' ?>">
        <meta property="og:url" content="<?php echo $systemUrl. (isset($category) ? $categorySlugs[$category->id] : '') ?>">
        <meta property="og:site_name" content="<?php echo $centerName; ?>">
        <?php include('layouts/head.php'); ?>
    </head>
<body itemscope itemtype="https://schema.org/WebPage">
    
    <?php
        include('layouts/header.php');
    ?>

<div class="cat-header-section">
    <div class="container">
        <div class="cat-header">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo showBreadCrumbs (); ?>
                </div>
                <div class="col-sm-12">
                    <h1 itemprop="name" content="<?php echo $centerName . ' ' . ($activeCat ?? ( $city->result->cities[0]->name ?? '' )); ?>" title="<?php echo $centerName . ' ' . ($activeCat ?? ( $city->result->cities[0]->name ?? '')); ?>" class="categroy-title"><?php echo $activeCat ?? ( $city->result->cities[0]->name ?? '') ?></h1>
                    <p class="cat-desc">
                        <?php 
                            $description = isset($pageDescription) ? $pageDescription : $category->description;
                        
                            $num_words = 160;
                            $words = array();
                            $words = explode(" ", $description, $num_words);
                            $shown_string = "";
                            
                            if(count($words) == 160){
                                $words[159] = " ... ";
                            }
                            $shown_string = implode(" ", $words);
                            echo $shown_string;
                        ?>
                        
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    if (isset($eventsArray->result->courses) && (count($eventsArray->result->courses) > 0)) { 
        echo '<div class="category-content" itemscope itemtype="https://schema.org/Course">';
    } else {
        echo '<div class="category-content">';
    }
?>
    <div class="container p-3">
        <div class="row">
            <div class="col-md-9">

            <?php
                if (isset($eventsArray->result->courses) && (count($eventsArray->result->courses) > 0)) {
                    foreach ($eventsArray->result->courses as $value) {
                        // $startDate = date_create($value->startDate);
                        // $endDate = date_create($value->endDate);
                ?>
                <div class="cat-list">
                    <div class="p-2">
                        <a title="<?php echo $centerName . ' ' . $value->name; ?>" <?php
                            if($value->name != null && $value->categoriesId !=null && $eventPage !=''){
                                echo 'href="'.$systemUrl.$coursePage.'/'.$value->courseId.'.html"';            
                            }
                            ?>>  
                            <div class="col-md-12">
                                <h2 itemprop="name">
                                    <?php echo $value->name;?> - <span style="font-size:15px;">(<?php echo $value->code.' '.$value->courseId ?>)</span>
                                </h2>
                            </div>
                        </a>
                        <textarea itemprop="description" hidden content="<?php echo $value->overview;?>"></textarea>
                        <?php
                            if (isset($value->events) && (count($value->events) > 0)) {
                        ?>
                            <div class="events-list p-3 course-events">
                                <?php
                                    foreach ($value->events as $event) {
                                        // $startDate = date_create($event->startDate);
                                        // $endDate = date_create($event->endDate);
                                        $dates = generateEventFormatedDate($event->startDate,$event->endDate);
                                    ?>
                                <a title="<?php echo "$event->name - $event->city - $dates #".$event->courseId."_".$event->id; ?>" href="<?php echo $systemUrl.$eventPage.'/'.$event->id.'.html'; ?>" class="list-group-inner">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                            <span><?php echo $event->city; ?></span>
                                        </div>
                                        <div class="col-sm-4">
                                            <i class="far fa-calendar" aria-hidden="true"></i>
                                            <span>
                                                <?php echo $dates ?>                                                        
                                            </span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span><?php echo $event->price . ' ' . $event->currency; ?></span>
                                        </div>
                                    </div>
                                </a>
                                <?php
                                        }
                                ?>
                                    <a href="<?php echo $systemUrl.$coursePage.'/'.$value->courseId.'.html#all-dates-and-locations' ?>" class="browse-btn">Browse for more events...</a>
                            </div>
                        <?php
                            }
                        ?>




                    </div>
                </div>
                <?php
                    }
                }else {
                    echo '<h3 style="font-size: 24px;">No Events are available.</h3>';
                }
                echo $eventsArray->pagination();
                ?>
            </div>
            <div class="col-sm-3">
                <div class="cat-sidebar">
                    <h4 class="title-header"> <i class="fas fa-th-list" aria-hidden="true"></i> Programs Category</h4>
                    <ul class="sidebar-menu">

                    <?php
                        $categoriesArray = new CallAPIv3($scope = 'resource=categories',$method = 'GET'); 
                        if (isset($categoriesArray->result->categories) && (count($categoriesArray->result->categories) > 0)) {
                            $categories = $categoriesArray->result->categories;
                            ksort($categories);
                            foreach ($categories as $value) {
                    ?>
                        <li><a href="<?php echo $systemUrl.$categorySlugs[$value->id]; ?>"  title="<?php echo $centerName . ' ' . $value->name; ?>">
                            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                            <?php echo $value->name; ?></a>
                        </li>
                    <?php
                            }
                        }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('layouts/footer.php');
?>
</body>
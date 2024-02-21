
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta name="description" content="<?php echo $centerName; ?> بحث">
        <meta name="keywords" content="Mercury Events Search, Learning, Training, Events Search">
        <meta property="og:title" content="<?php echo $centerName; ?> بحث">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $centerName; ?> بحث">
        <meta property="og:url" content="<?php echo $systemUrl; ?>">
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
                    <?php 
                        $monthsName = array(
                            '',
                            'يناير',
                            'فبراير',
                            'مارس',
                            'إبريل',
                            'مايو',
                            'يونيو',
                            'يوليو ',
                            'أغسطس',
                            'سبتمبر',
                            'أكتوبر',
                            'نوفمبر',
                            'ديسمبر',
                            );
                            ?>

                    <h1 itemprop="name" content="<?php echo $centerName . ' ' . $activeCat; ?>" title="<?php echo $centerName . ' ' . $activeCat; ?>" class="categroy-title">
                        <?php echo $activeCat ?> 
                        <?php 
                            //$searchItem = $eventsArray->result->searchItem;
                            if (isset($_GET['category'])) {
                                if($_GET['category'] != null){
                                    // $city = get_object_vars($searchItem->category);
                                    $catId = $_GET['category'];
                                    $filteredCities = array_filter($categoriesArray->result->categories, function($category) use ($catId) {
                                        return $category->id == $catId;
                                    });
                                
                                    // Check if any category is found
                                    if (!empty($filteredCities)) {
                                        // Get the first element of the filtered array (assuming IDs are unique)
                                        $category = reset($filteredCities);
                                        // Output category details
                                        echo ' ' . $category->name;
                                        // Output other properties as needed
                                    }                                
                                }
                            }
                            if (isset($_GET['m'])) {
                                if($_GET['m'] != null){
                                    echo ' في ' . $monthsName[$_GET['m']] ?? '';
                                }
                            }
                            if (isset($_GET['city'])) {
                                if($_GET['city'] != null){
                                    // $city = get_object_vars($searchItem->city);
                                    $cityId = $_GET['city'];
                                    $filteredCities = array_filter($citiesArray->result->cities, function($city) use ($cityId) {
                                        return $city->id == $cityId;
                                    });
                                
                                    // Check if any city is found
                                    if (!empty($filteredCities)) {
                                        // Get the first element of the filtered array (assuming IDs are unique)
                                        $city = reset($filteredCities);
                                        // Output city details
                                        echo ' في  ' . $city->name;
                                        // Output other properties as needed
                                    }
                                }
                            }
                            if (isset($_GET['upcoming']) && $_GET['upcoming'] == 'true') {
                                echo ' في التأكيد فقط';
                            }
                            if (isset($_GET['numberOfWeeks'])) {
                                if($_GET['numberOfWeeks'] != null){
                                    echo ' المدة الزمنية ' . $_GET['numberOfWeeks'] . ' أسبوع';
                                }
                            }
                            if (isset($_GET['page'])) {
                                echo ' صفحة #' . $_GET['page'];
                            }
                        ?>

                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="category-content" itemscope itemtype="https://schema.org/Event">
    <div class="container p-3">
        <div class="row">
            <div class="col-md-9">

            <?php
                if (isset($eventsArray->result->events) && (count($eventsArray->result->events) > 0)) {
                    foreach ($eventsArray->result->events as $value) {
                        $startDate = date_create($value->startDate);
                        $endDate = date_create($value->endDate);
                ?>
                <div class="cat-list">
                    <div class="p-2">
                        <a title="<?php echo $centerName . ' ' . $value->name; ?>" <?php
                            if($value->id != null and $value->categoryId !=null and $eventPage !=''){
                                echo 'href="'.$systemUrl.$eventPage.'/'.$value->id.'.html"';            
                            }
                            ?>>  
                            <div class="col-md-12">
                                <h2 itemprop="name">
                                    <?php echo $value->name;?>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="info-cat">
                                        <i class="fa fa-paperclip"></i>
                                        <span class=""> &nbsp;(<?php echo $value->code ?>)</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="info-cat">
                                        <i class="fa fa-calendar-o"></i> <span class="" itemprop="startDate" content="<?php echo date_format($startDate,"d.M.Y"); ?>"> <?php echo generateEventFormatedDate($value->startDate,$value->endDate, 'ar'); ?> <span class="" itemprop="endDate" content="<?php echo date_format($endDate,"d.M.Y"); ?>" hidden><?php echo date_format($endDate,"d M Y"); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="info-cat">
                                        <div class="left b5"> 
                                            <i class="fa fa-globe"></i> <span class="" itemprop="location"><?php echo $value->city; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <?php
                    }
                } else {
                    echo '<h3 style="font-size: 24px;">بحثك لم تطابق اي وثائق.</h3>';
                }
                echo $eventsArray->pagination();
                ?>
            </div>
            
            <div class="col-sm-3">
                <div class="cat-sidebar">
                    <h4 class="title-header"> <i class="fas fa-th-list" aria-hidden="true"></i>  اقسام البرامج التدريبية</h4>
                    <ul class="sidebar-menu">

                    <?php
                        $categoriesArray = new CallAPIv3($scope = 'resource=categories',$method = 'GET'); 
                        if (isset($categoriesArray->result->categories) && (count($categoriesArray->result->categories) > 0)) {
                            $categories = $categoriesArray->result->categories;
                            ksort($categories);
                            foreach ($categories as $value) {
                    ?>
                        <li><a href="<?php echo $systemUrl.$categorySlugs[$value->id]; ?>"  title="<?php echo $centerName . ' ' . $value->name; ?>">
                            <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
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
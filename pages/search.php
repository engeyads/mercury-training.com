
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="<?php echo $centerName; ?> Centre Events Search Page">
        <meta name="keywords" content="Mercury Events Search, Learning, Training, Events Search">
        <meta property="og:title" content="<?php echo $centerName; ?> Search">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $centerName; ?> Center Search Page">
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
                    <?php $monthsName = array(
                        '',
                        'January',
                        'February',
                        'March',
                        'April',
                        'May',
                        'June',
                        'July ',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December',
                        ); ?>

                    <h1 itemprop="name" content="<?php echo $centerName . ' ' . $activeCat; ?>" title="<?php echo $centerName . ' ' . $activeCat; ?>" class="categroy-title">
                        <?php echo $activeCat ?> 
                        <?php 
                            // $searchItem = $eventsArray->result->searchItem;
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
                                    }                                }
                            }
                            if (isset($_GET['m'])) {
                                if($_GET['m'] != null){
                                    echo ' at ' . $monthsName[$_GET['m']] ?? '';
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
                                        echo ' in ' . $city->name;
                                        // Output other properties as needed
                                    }
                                }
                            }
                            if (isset($_GET['upcoming']) && $_GET['upcoming'] == 'true') {
                                echo ' in confirm only';
                            }
                            if (isset($_GET['numberOfWeeks'])) {
                                if($_GET['numberOfWeeks'] != null){
                                    echo ' duration ' . $_GET['numberOfWeeks'] . ' week';
                                }
                            }
                            if (isset($_GET['page'])) {
                                echo ' Page #' . $_GET['page'];
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

            <?php // here need to search for events
                if (isset($eventsArray->result->events) && (count($eventsArray->result->events) > 0)) {
                    foreach ($eventsArray->result->events as $value) {
                        $startDate = date_create($value->startDate);
                        $endDate = date_create($value->endDate);
                ?>
                <div id="dataContainer" class="cat-list ">
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
                                        <i class="fa fa-calendar-o"></i> <span class="" itemprop="startDate" content="<?php echo date_format($startDate,"d.M.Y"); ?>"> <?php echo date_format($startDate,"d M Y"); ?></span> - <span class="" itemprop="endDate" content="<?php echo date_format($endDate,"d.M.Y"); ?>"><?php echo date_format($endDate,"d M Y"); ?></span>
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
                    echo '<h3 style="font-size: 24px;">Your search did not match any documents.</h3>';
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
<script>
    // Variable to track the current page
let currentPage = 1;

// Function to fetch data from the API
function fetchData(page) {
  // Make an AJAX request to your API endpoint
  $.ajax({
    url: '<?php echo $systemUrl;?>api/xyz.php?<?php echo "&withSearchItem=true&with_category=true$upcoming$keyword$city$category$numberOfWeeks$month"?>&page=' + page,
    method: 'GET',
    success: function(response) {
      // Append the fetched data to the data container
      $('#dataContainer').append(renderData(response));

      // Increment the current page for the next request
      currentPage++;
    },
    error: function(xhr, status, error) {
      console.error('Error fetching data:', error);
    }
  });
}

// Function to render the fetched data (modify as per your data structure)
function renderData(data) {
  let html = '';
  data.forEach(item => {
    // Generate HTML markup for each item
    html += '<div class="item">' + item.title + '</div>';
  });
  return html;
}

// Function to check if the user has scrolled to the bottom of the page
function checkScroll() {
  if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
    // If scrolled to the bottom, fetch the next page of data
    fetchData(currentPage);
  }
}

// Event listener for scroll event
$(window).scroll(checkScroll);

// Initial call to fetch the first page of data
fetchData(currentPage);

</script>
</body>
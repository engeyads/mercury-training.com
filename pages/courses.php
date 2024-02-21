<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="<?php echo $centerName; ?> Center Courses Page">
        <meta name="keywords" content="Mercury Courses, Learning, Training, Courses">
        <meta property="og:title" content="<?php echo $centerName; ?> Courses">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $centerName; ?> Center Courses Page">
        <meta property="og:url" content="<?php echo $systemUrl; ?>public-courses.html">
        <meta property="og:site_name" content="<?php echo $centerName; ?>">
        <?php include('layouts/head.php'); ?>
    </head>
<body itemscope itemtype="https://schema.org/WebPage">
    
    <?php
        include('layouts/header.php');
    ?>
    
    <div class="course-main">

    <div class="container">
            <div class="cat-header">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo showBreadCrumbs (); ?>
                    </div>
                    <div class="col-md-12">
                        <h1 class="tit-home d-flex justify-content-center d-md-inline-block justify-content-md-start" itemprop="name" content="<?php echo $centerName; ?> Public Course categories" title="<?php echo $centerName; ?> Public Course categories" > Public Course categories</h1>
                        <p class="par-home mt-3 mb-3 text-center text-md-start">
                            The course categories offered by Mercury Training are based on thorough research of clients needs and
                            market requirements. These categories are constantly reviewed and updated to ensure they include the
                            latest subjects and those that are most relevant to today's business environments.
                        </p>
                    </div>
                    <div class="col-md-12 mt-4">
                        <?php
                            include('home/homeCategory.php');
                        ?>
                    </div>
                </div>
                        
                    <div class="row all-courses pt-4" itemscope itemtype="https://schema.org/Course">
                        <?php
                            $categoriesArray = new CallAPIv3($scope = 'resource=categories',$method = 'GET'); 
                            if (isset($categoriesArray->result->categories) && (count($categoriesArray->result->categories) > 0)) {
                                $categories = $categoriesArray->result->categories;
                                // usort($categories,function($first,$second){
                                //     return strtolower($first->name) > strtolower($second->name);
                                // });
                                ksort($categories);
                                list($cat1, $cat2) = array_chunk($categories, ceil(count($categories) / 2));
                        ?>
                            <div class="col-md-6">
                                <?php
                                    foreach ($cat1 as $value) {
                                ?>
                                    <h2 class="text-center text-md-start">
                                        <a class="" href="<?php echo $systemUrl.$categorySlugs[$value->id]; ?>" title="Management &amp; Leadership Courses"><?php echo $value->name; ?></a>
                                    </h2>
                                    <div class="list-group text-center text-md-start">
                                        <?php
                                            $coursesArray = new CallAPIv3($scope = 'resource=courses&limit=1000&withSearchItem=true&with_category=true&categoryName='. urlencode($value->name) .(isset($_GET['page']) ? '&page='.$_GET['page'] : '' ),$method = 'GET'); 
                                            if (isset($coursesArray->result->courses) && (count($coursesArray->result->courses) > 0)) {
                                                foreach ($coursesArray->result->courses as $course) {
                                        ?>
                                            <span itemprop="name"> 
                                                <a title="<?php echo $centerName . ' ' . $course->name; ?> Course" href="<?php echo $systemUrl.$coursePage.'/'.$course->courseId.'.html'; ?>" class="list-group-item">
                                                    <?php echo $course->name ?> (<?php echo $course->numberOfWeeks  ?>  <?php echo $course->numberOfWeeks > 1 ? 'Weeks' : 'Week' ?>)                                        
                                                </a>
                                            </span>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                        
                            <div class="col-md-6">
                                <?php
                                    foreach ($cat2 as $value) {
                                ?>
                                    <h2 class="text-center text-md-start">
                                        <a class="" href="<?php echo $systemUrl.$categorySlugs[$value->id]; ?>" title="Management &amp; Leadership Courses"><?php echo $value->name; ?></a>
                                    </h2>
                                    <div class="list-group text-center text-md-start">
                                        <?php
                                            $coursesArray = new CallAPIv3($scope = 'resource=courses&withSearchItem=true&with_category=true&categoryName='. urlencode($value->name) ,$method = 'GET'); 
                                            if (isset($coursesArray->result->courses) && (count($coursesArray->result->courses) > 0)) {
                                                foreach ($coursesArray->result->courses as $course) {
                                        ?>
                                            <span itemprop="name"> 
                                                <a title="<?php echo $centerName . ' ' . $course->name; ?> Course" href="<?php echo $systemUrl.$coursePage.'/'.$course->courseId.'.html'; ?>" class="list-group-item">
                                                    <?php echo $course->name ?> (<?php echo $course->numberOfWeeks  ?>  <?php echo $course->numberOfWeeks > 1 ? 'Weeks' : 'Week' ?>)                                        
                                                </a>
                                            </span>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    
    <?php
        include('layouts/footer.php');
    ?>
</body>
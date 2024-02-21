<?php
header("Content-Type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

include ('includes/general.php');
include ('includes/config.php');

    $categoriesArray = new CallAPIv3($scope = 'resource=categories',$method = 'GET'); 
    if (isset($categoriesArray->result->categories) && (count($categoriesArray->result->categories) > 0)) {
        $categories = $categoriesArray->result->categories;
        ksort($categories);
        foreach ($categories as $value) {
            echo '<url>' . PHP_EOL;
            echo '<loc>'. $systemUrl.$categorySlugs[$value->id] .'</loc>' . PHP_EOL;
            echo '<changefreq>monthly</changefreq>' . PHP_EOL;
            echo '<lastmod>' . date("Y-m-d") . '</lastmod>' . PHP_EOL;
            echo '<priority>1.0</priority>' . PHP_EOL;	
            echo '</url>' . PHP_EOL;
        }
    }

    $coursesArray = new CallAPIv3($scope = 'resource=courses&limit=2000',$method = 'GET'); 
    if (isset($coursesArray->result->courses) && (count($coursesArray->result->courses) > 0)) {
        foreach ($coursesArray->result->courses as $course) { 
            echo '<url>' . PHP_EOL;
            echo '<loc>'. $systemUrl. 'c/' .$course->courseId .'.html</loc>' . PHP_EOL;
            echo '<changefreq>monthly</changefreq>' . PHP_EOL;
            echo '<lastmod>' . date("Y-m-d") . '</lastmod>' . PHP_EOL;
            echo '<priority>1.0</priority>' . PHP_EOL;	
            echo '</url>' . PHP_EOL;
        }
    }

echo '</urlset>' . PHP_EOL;

?>
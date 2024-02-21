<?php
// This API is created by Iyad Sammour, this version is suitable for Mercury Training (https://mercury-training.com) as its suitable for its database structure
header('Content-Type: application/json');
include('../config.inc.php');
if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}
$query = '';
if(isset($_GET['lang'])){ if($_GET['lang'] != null){ $lang = $_GET['lang'];}else{ $lang = 'en'; } }else{ $lang = 'en'; }
if(isset($_GET['limit'])){ $limit = $_GET['limit']; }else{ $limit = 24; }
if(isset($_GET['page'])){ $page = $_GET['page']; }else{ $page = 1; }
if(isset($_GET['id'])){ if(is_numeric($_GET['id'])){ $byid = "id=".$_GET['id'];}else{ $byid = "id=0"; } }else{ $byid = '1'; }
if(isset($_GET['with_overview'])){ if($_GET['with_overview'] == 'true'){$withOverview = "overview";}else{ $withOverview = false; } }else{ $withOverview = false; }
$totalPages = 1;

$cnt = 0;
// Database configuration

mysqli_set_charset($conn, 'utf8');

// Record the start time
    $startTime = microtime(true);
// Function to fetch data from the "months" table
function getMonthsData() {
    global $conn;
    global $query;
    global $limit;
    global $page;
    global $byid;

    global $cnt;
    
    $currentMonth = date('n'); // Get the current month as a number (1-12)
    $currentYear = date('Y'); // Get the current year

    for ($i = 0; $i < 12; $i++) {
        $nextMonth = $currentMonth + $i;
        $year = $currentYear + floor(($nextMonth - 1) / 12);
        $month = ($nextMonth - 1) % 12 + 1;
        
        $data[] = [
            'month' => $month,
            'year' => $year,
        ];
    }

    return $data;
}

// Function to fetch data from the "cities" table
function getCitiesData() {
    if(isset($_GET['slug'])){ if($_GET['slug'] != null){ $withSlug = " cities.id='".$_GET["slug"]."'";}else{ $withSlug = '1'; } }else{ $withSlug = '1'; }
    if(isset($_GET['with_keyword_description'])){ if($_GET['with_keyword_description'] == 'true'){ $with_keyword_description = "cities.keyword,cities.description,";}else{ $with_keyword_description = ''; } }else{ $with_keyword_description = ''; }
    if(isset($_GET['with_about'])){ if($_GET['with_about'] == 'true'){ $with_about = "cities.about,";}else{ $with_about = ''; } }else{ $with_about = ''; }
    if(isset($_GET['order'])){ if($_GET['order'] != ''){ $order = "ORDER BY ".$_GET['order'];}else{ $order = 'ORDER BY name'; } }else{ $order = 'ORDER BY name'; }
    if(isset($_GET['onlyWithEvents'])){ if($_GET['onlyWithEvents'] == 'true'){ $onlyWithEvents = true;}else{ $onlyWithEvents = false; } }else{ $onlyWithEvents = false; }
    
    global $conn;
    global $query;
    global $limit;
    global $page;
    global $byid;

    global $cnt;
    global $totalPages;
    $query="
    SELECT     
    count(*) AS distinct_count
    FROM
    " . ( $onlyWithEvents ? "( SELECT DISTINCT cities.id FROM " : "" ) . " cities
    " . ( $onlyWithEvents ? " INNER JOIN course ON course.city = cities.id AND course.published_at <= NOW() AND TIMESTAMP(CONCAT(course.y1, '-', LPAD(course.m1, 2, '0'), '-', LPAD(course.d1, 2, '0'))) >= NOW() " : "" ) . "
    WHERE
    $withSlug 
    AND
    cities.deleted_at IS NULL
    AND cities.published_at <= NOW()
    AND $byid
    " . ( $onlyWithEvents ? ") AS subquery" : "" );
    
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $res = mysqli_fetch_assoc($result);
        $cnt = $res['distinct_count'];
        if ($limit > 0) {
            $totalPages = is_numeric($cnt) && is_numeric($limit) ? ceil($cnt / $limit) : 1;
        } else {
            $totalPages = 1;
        }
    }else{
        $cnt = 0;
        $totalPages = 1;
    }
    if($page > $totalPages){$page = $totalPages;}
    if($page < 1){$page = 1;}
    if($limit > $cnt){$limit = $cnt;}
    $offset = ($page - 1) * $limit;
    $query = "SELECT 
    " . ( $onlyWithEvents ? "DISTINCT" : "" ) . "
    cities.id,
    cities.name,
    cities.code as cityCode,
    CONCAT(cities.id,'.html') AS slug,
    $with_keyword_description
    cities.title,
    $with_about
    cities.city_photo,
    cities.slider_photo,
    cities.hotel_name,
    cities.created_at,
    cities.updated_at,
    cities.published_at
FROM
    cities
    " . ( $onlyWithEvents ? " INNER JOIN course ON course.city = cities.id AND course.published_at <= NOW() AND TIMESTAMP(CONCAT(course.y1, '-', LPAD(course.m1, 2, '0'), '-', LPAD(course.d1, 2, '0'))) >= NOW() " : "" ) . "
WHERE
    $withSlug 
    AND
    cities.deleted_at IS NULL
    AND cities.published_at <= NOW()
    AND $byid
    $order
LIMIT
    $offset,
    $limit;";
    
    $result = mysqli_query($conn, $query);

    
    if (!$result) {
        return [];
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        // Cast specific fields to integers
        $fieldsToCastToInt = ['id']; // Add more fields as needed
        $fieldsToQuoteHTML = ['keyword']; // Add more fields as needed
        
        foreach ($fieldsToCastToInt as $field) {
            if (isset($row[$field])) {
                $row[$field] = intval($row[$field]);
            }
        }
        foreach ($fieldsToQuoteHTML as $field) {
            if (isset($row[$field])) {
                $row[$field] =  str_replace('"', '&quot;', $row[$field]);
            }
        }
        $data[] = $row;
    }

return $data;
}

// Function to fetch data from the "course_main" table
function getCoursesData() {
    if(isset($_GET['with_overview'])){ if($_GET['with_overview'] == 'true'){$with_overview = "with_overview";}else{ $with_overview = false; } }else{ $with_overview = false; }
    if(isset($_GET['with_category'])){ if($_GET['with_category'] == 'true'){$with_category = "with_category";}else{ $with_category = false; } }else{ $with_category = false; }
    if(isset($_GET['with_keyword_description'])){ if($_GET['with_keyword_description'] == 'true'){$with_keyword_description = "with_keyword_description";}else{ $with_keyword_description = false; } }else{ $with_keyword_description = false; }
    if(isset($_GET['code'])){ if($_GET['code'] != null){$code = "course_main.c_id=".$_GET['code'];}else{ $code = 1; } }else{ $code = 1; }
    if(isset($_GET['slug'])){ if($_GET['slug'] != null){$slug = "course_main.alias='".$_GET['slug']."'";}else{ $slug = 1; } }else{ $slug = 1; }
    if(isset($_GET['categoryName'])){ if($_GET['categoryName'] != null){$categoryName = "course_c.name='".$_GET['categoryName']."'";}else{ $categoryName = 1; } }else{ $categoryName = 1; }
    if(isset($_GET['withEvents'])){ if($_GET['withEvents'] == 'true'){$withEvents = true;}else{ $withEvents = false; } }else{ $withEvents = false; }
    if(isset($_GET['onlyWithEvents'])){ if($_GET['onlyWithEvents'] == 'true'){$onlyWithEvents = true;}else{ $onlyWithEvents = false; } }else{ $onlyWithEvents = false; }
    if(isset($_GET['onlyUpcoming'])){ if($_GET['onlyUpcoming'] == 'true'){$onlyUpcoming = true;}else{ $onlyUpcoming = false; } }else{ $onlyUpcoming = false; }
    if(isset($_GET['city'])){if($_GET['city'] != null){ $city = "cities.id = ".$_GET['city']; }else{ $city = 1; }}else{ $city = 1; }
    global $conn;
    global $query;
    global $limit;
    global $page;
    global $byid;

    global $cnt;
    global $totalPages;
    $query="
    SELECT count(*) as 'count(*)'
    FROM 
    ". ($onlyWithEvents || $onlyUpcoming ? " ( select distinct course_main.id FROM " : "") .
    " course_main 
    LEFT JOIN course_c ON course_c.id=course_main.course_c "
    . ($onlyWithEvents || $onlyUpcoming ? " RIGHT JOIN course ON course.c_id=course_main.c_id " . ($city != 1 ? " RIGHT JOIN cities ON cities.id=course.city " : "") ." WHERE course.published_at <= NOW() AND course.deleted_at IS NULL AND DATE(CONCAT(course.y1, '-', LPAD(course.m1, 2, '0'), '-', LPAD(course.d1, 2, '0'))) > NOW() AND $city AND" : " WHERE ") .
    " course_main.deleted_at IS NULL 
    AND course_main.published_at <= NOW() 
    AND ".($byid == 1 ? $byid : "course_main.".$byid)."
    AND $code
    AND $slug
    ". ($onlyUpcoming ? "AND course.certain='on'" : "" ) . "
    AND course_c.deleted_at IS NULL
    AND $categoryName
    ". ($onlyWithEvents || $onlyUpcoming ? ") as abc " : "" ) . ";";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $res = mysqli_fetch_assoc($result);
        $cnt = $res['count(*)'];
        if ($limit > 0) {
            $totalPages = is_numeric($cnt) && is_numeric($limit) ? ceil($cnt / $limit) : 1;
        } else {
            $totalPages = 1;
        }
    }else{
        $cnt = 0;
        $totalPages = 1;
    }
    if($page > $totalPages){$page = $totalPages;}
    if($page < 1){$page = 1;}
    if($limit > $cnt){$limit = $cnt;}
// right events in course page
// search page event images
// remove jquery pager in home page done
// let upcomming events in home page to be only 20 done
    $offset = ($page - 1) * $limit;
    $query = "SELECT " . ($onlyWithEvents ? "distinct " : "" ) . "course_main.c_id as courseId,
    course_c.sh as code,
    course_main.name,
    course_main.alias as slug,
    course_main.title,
    course_main.week as numberOfWeeks,
    course_c.alias as categorySlug,
    course_main.image "
    .($with_category != false || $withEvents ? ", course_main.course_c as categoriesId, course_c.name as categoryName " : "")
    .($with_overview != false ? ", course_main.overview, course_main.broshoure" : "")
    .($with_keyword_description !=false ? ",
    (
        SELECT CONCAT('[', GROUP_CONCAT('\"', sk.name, '\"'), ']')
        FROM sitekeywords_coursemain AS skcm
        JOIN sitekeywords AS sk ON skcm.sitekeywords_id = sk.id
        WHERE skcm.course_main_id = course_main.id
    ) AS keyword, course_main.description, course_main.title " : "").
    " FROM course_main
    LEFT JOIN page ON page.en_name=course_main.name
    LEFT JOIN course_c ON course_c.id=course_main.course_c "
    . ($onlyWithEvents ? "RIGHT JOIN course ON course.c_id=course_main.c_id " . ($city != 1 ? " LEFT JOIN cities ON cities.id=course.city " : "") ." WHERE course.published_at <= NOW() AND course.deleted_at IS NULL AND DATE(CONCAT(course.y1, '-', LPAD(course.m1, 2, '0'), '-', LPAD(course.d1, 2, '0'))) > NOW() AND $city AND " : " WHERE ") .
    " course_main.deleted_at IS NULL
    AND course_main.published_at <= NOW()
    AND ".($byid == 1 ? $byid : "course_main.".$byid)."
    AND $code
    AND $slug 
    AND $categoryName
    ORDER BY course_main.c_id ASC
    limit $offset , $limit";
    $result = mysqli_query($conn, $query);
    

    if (!$result) {
        return [];
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        // Cast specific fields to integers
        $fieldsToCastToInt = ['courseId', 'numberOfWeeks','categoriesId']; // Add more fields as needed
        if($withEvents){
            $_GET['courseId'] = $row['courseId'];
            $_GET['order'] = ' a.y1 ASC , a.m1 ASC , a.d1 ASC ';
            //$_GET['upcoming'] = 'true';
            $row['events'] = getEventsData();
        }
        foreach ($fieldsToCastToInt as $field) {
            if (isset($row[$field])) {
                $row[$field] = intval($row[$field]);
            }
        }
        $data[] = $row;
    }

return $data;
}
// Function to fetch data from the "course" table
function getEventsData() {
    if(isset($_GET['order'])){ if($_GET['order'] != ''){ $order = "ORDER BY ".$_GET['order'];}else{ $order = 'ORDER BY y1 ASC , m1 ASC , d1'; } }else{ $order = 'ORDER BY y1 ASC , m1 ASC , d1'; }
    if(isset($_GET['city'])){ $city = "a.city=".$_GET['city']; }else{ $city = '1'; }
    if(isset($_GET['category'])){ if($_GET['category'] != null){$category = "c.id=".$_GET['category']." AND d.course_c=".$_GET['category'];}else{ $category = 1; } }else{ $category = 1; }
    if(isset($_GET['courseId'])){ if($_GET['courseId'] != null){$courseId = "a.c_id=".$_GET['courseId'];}else{ $courseId = 1; } }else{ $courseId = 1; }
    if(isset($_GET['upcoming'])){ $upcomingLimit = "a.certain ='on'"; }else{ $upcomingLimit = '1'; }
    if(isset($_GET['with_broshoure'])){ if($_GET['with_broshoure'] == 'true'){$withBroshoure = 'broshoure,';}else{ $withBroshoure = false; } }else{ $withBroshoure = false; }
    if(isset($_GET['keyword'])){ if($_GET['keyword'] != null){
        $searchColumns = ['d.name', 'b.name','c.name']; // Replace with your actual column names
        foreach ($searchColumns as $column) {
            $whereConditions[] = "LOWER($column) LIKE '%".strtolower($_GET['keyword'])."%'";
        }
        $keyword = implode(' OR ', $whereConditions);
    }else{ $keyword = 1; } }else{ $keyword = 1; }
    if(isset($_GET['month'])){ if($_GET['month'] != null){$month = "a.m1='".$_GET['month']."'";}else{ $month = 1; } }else{ $month = 1; }
    if(isset($_GET['eventslimit'])){ if($_GET['eventslimit'] != null){ $eventslimit = $_GET['eventslimit']; }else{ $eventslimit = 10; } }else{ $eventslimit = 10; }
    if(isset($_GET['code'])){ if($_GET['code'] != null){ $code = " a.c_id= ".$_GET['code']; }else{ $code = 1; } }else{ $code = 1; }
    if(isset($_GET['withImage'])){ if($_GET['withImage'] == 'true'){$withImage = 'd.image,';}else{ $withImage = ''; } }else{ $withImage = ''; }
    if(isset($_GET['courseTitle'])){ if($_GET['courseTitle'] == 'true'){$courseTitle = 'd.title as course_title,';}else{ $courseTitle = ''; } }else{ $courseTitle = ''; }
    if(isset($_GET['numberOfWeeks'])){if($_GET['numberOfWeeks'] != ''){ $withweeks ='d.week='.$_GET['numberOfWeeks']; }else{ $withweeks = 1;}}else{ $withweeks = 1; }
    global $conn;
    global $query;
    global $limit;
    global $page;
    global $byid;
    global $withOverview;
    global $cnt;
    global $totalPages;
    if(!isset($_GET['courseId'])){
        $query="
        SELECT count(*)
        FROM course as a
        LEFT JOIN cities as b
            ON a.city=b.id
        LEFT JOIN course_main as d
            ON d.c_id=a.c_id
        LEFT JOIN course_c as c
            ON c.id=d.course_c
            WHERE ".($byid == 1 ? $byid : "a.".$byid)."
            AND $courseId
            AND $upcomingLimit
            AND a.deleted_at IS NULL
            AND a.published_at <= NOW()
            AND ((y1>YEAR(NOW())
                AND m1< MONTH(NOW()))
                OR (y1=YEAR(NOW())
                AND m1>MONTH(NOW()))
            OR (y1=YEAR(NOW())
                AND m1=MONTH(NOW())
                AND d1>DAY(NOW())))
            AND d.name IS NOT NULL
        AND $city
        AND $category 
        AND $month
        AND $withweeks
        AND d.deleted_at IS NULL
        AND c.deleted_at IS NULL
        AND ($keyword)";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            $res = mysqli_fetch_assoc($result);
            $cnt = $res['count(*)'];
            if ($limit > 0) {
                $totalPages = is_numeric($cnt) && is_numeric($limit) ? ceil($cnt / $limit) : 1;
            } else {
                $totalPages = 1;
            }
        }else{
            $cnt = 0;
            $totalPages = 1;
        }
        if($page > $totalPages){$page = $totalPages;}
        if($page < 1){$page = 1;}
        if($limit > $cnt){$limit = $cnt;}
        $offset = ($page - 1) * $limit;
    }

    $query = "SELECT 
    a.id AS id,
    d.name AS name,
    d.alias AS slug,
    d.title AS sub_title,
    a.c_id AS courseId,
    a.c_id AS code,
    a.updated_at AS updated_at,
    a.created_at AS created_at,
    DATE(CONCAT(a.y1, '-', LPAD(a.m1, 2, '0'), '-', LPAD(a.d1, 2, '0'))) AS startDate,
    DATE(CONCAT(a.y2, '-', LPAD(a.m2, 2, '0'), '-', LPAD(a.d2, 2, '0'))) AS endDate,
    b.name AS city,
    CONCAT(b.id,'.html') AS citySlug,
    b.hotel_name AS hotelName,
    b.code AS cityCode,
    b.city_photo as cityPhoto,
    'en' AS language,
    $withBroshoure
    a.price,
    CASE
        WHEN a.currency IS NULL OR a.currency = ''
        THEN 'Euro'
        ELSE a.currency
    END AS currency,
    c.id AS categoryId,
    c.name AS categoryName,
    c.class,
    $courseTitle
    $withImage
    b.monday AS event_type,
    c.alias AS categorySlug,
    ". (!$withOverview ? "" : "d.$withOverview,") . "
    CONCAT('".SITE_PATH."/pdfb/index.php?id=', a.id) AS pdf_url,
    CONCAT('".SITE_PATH."/p/', a.id, '.html#booking') AS registrationURL,
    CONCAT('".SITE_PATH."/p/', a.id, '.html') AS eventURL,
    CONCAT('".SITE_PATH."/c/', a.c_id, '.html') AS courseURL,
    CASE
        WHEN d.week IS NULL OR d.week = ''
        THEN 0
        ELSE d.week
    END AS numberOfWeeks,
    CASE
        WHEN a.certain IS NULL OR a.certain = ''
        THEN 0
        ELSE a.certain
    END AS isUpComming
    FROM course as a
    LEFT JOIN cities as b
        ON a.city=b.id
    LEFT JOIN course_main as d
        ON d.c_id=a.c_id
    LEFT JOIN course_c AS c ON c.id = d.course_c
    WHERE ".($byid == 1 ? $byid : "a.".$byid)."
    AND $courseId
    AND $upcomingLimit 
    AND a.deleted_at IS NULL
    AND a.published_at <= NOW()
    AND ((a.y1>YEAR(NOW())
        AND a.m1< MONTH(NOW()))
        OR (a.y1=YEAR(NOW())
        AND a.m1>MONTH(NOW()))
    OR (a.y1=YEAR(NOW())
        AND a.m1=MONTH(NOW())
        AND a.d1>DAY(NOW())))
    AND d.name IS NOT NULL
    AND $city 
    AND $category 
    AND ($keyword) 
    AND $month 
    AND $withweeks
    AND d.deleted_at IS NULL
    AND c.deleted_at IS NULL
    AND $code
    $order "
    .($_GET['resource'] == 'events' ? 
    " 
    limit $offset, $limit" : " limit $eventslimit" );

    $result = mysqli_query($conn, $query);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        // Cast specific fields to integers
        $fieldsToCastToInt = ['id', 'courseId','numberOfWeeks','isUpComming','categoryId','price','event_type']; // Add more fields as needed
        foreach ($fieldsToCastToInt as $field) {
            if (isset($row[$field])) {
                $row[$field] = intval($row[$field]);
            }
        }
        $data[] = $row;
    }
    return $data;
}
// Function to fetch data from the "course_c" table
function getCategoriesData() {
    if(isset($_GET['slug'])){ if($_GET['slug'] != null){$slug = "alias='".$_GET['slug']."'";}else{ $slug = 1; } }else{ $slug = 1; }
    if(isset($_GET['onlyWithEvents'])){ if($_GET['onlyWithEvents'] != null){$onlyWithEvents = "onlyWithEvents='".$_GET['onlyWithEvents']."'";}else{ $onlyWithEvents = 1; } }else{ $onlyWithEvents = 1; }
    global $conn;
    global $query;
    global $limit;
    global $page;
    global $byid;

    global $cnt;
    global $totalPages;
    $query="
    SELECT 
    count(*)
    FROM 
    course_c 
    WHERE 
    deleted_at IS NULL  and  published_at <= NOW() AND $byid AND $slug";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $res = mysqli_fetch_assoc($result);
        $cnt = $res['count(*)'];
        if ($limit > 0) {
            $totalPages = is_numeric($cnt) && is_numeric($limit) ? ceil($cnt / $limit) : 1;
        } else {
            $totalPages = 1;
        }
    }else{
        $cnt = 0;
        $totalPages = 1;
    }
    if($page > $totalPages){$page = $totalPages;}
    if($page < 1){$page = 1;}
    if($limit > $cnt){$limit = $cnt;}
    $offset = ($page - 1) * $limit;

    $query = "SELECT course_c.id,
            name as 'name',
            sh,
            class ,
            glyphicon as icon,
            alias as slug ,
            description,
            keyword,
            title ,
            created_at as 'created_at',
            updated_at as 'updated_at'
        FROM course_c 
        WHERE
        deleted_at IS NULL
        AND published_at <= NOW()
        AND $byid
        AND $slug
        ORDER BY id ASC
        limit $offset ,$limit";
    $result = mysqli_query($conn, $query);
    
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        // Cast specific fields to integers
        $fieldsToCastToInt = ['id', 'sh']; // Add more fields as needed
        foreach ($fieldsToCastToInt as $field) {
            if (isset($row[$field])) {
                $row[$field] = intval($row[$field]);
            }
        }
        $data[] = $row;
    }

    return $data;
}

// Get the table name from the GET request using "resource" parameter
$resourceName = isset($_GET['resource']) ? $_GET['resource'] : '';

// Use a switch case to determine which table to query
$response = [];
switch ($resourceName) {
    case 'events':
        $response = getEventsData();
        break;
    case 'cities':
        $response = getCitiesData();
        break;
    case 'courses':
        $response = getCoursesData();
        break;
    case 'categories':
        $response = getCategoriesData();
        break;
    case 'months':
        $response = getMonthsData();
        break;
    default:
        $response = ['status' => 401 ,'error' => 'Invalid resource name'];
}

// Close the database connection
mysqli_close($conn);
// Calculate the time taken
    $timeTaken = microtime(true) - $startTime;
// Create the result object with custom properties based on the table
$resultObject = (object)[];
$resultObject->status = 200;
$resultObject->apiTitle = 'Mercury Training';
if($query != ''){  
    if(isset($_GET['debug'])){ $resultObject->sql = preg_replace('/\s+/', ' ',str_replace(array("\r", "\n", "\t"), ' ', $query)); } // Your SQL query
    $resultObject->totalRecords = intval($cnt);
    $resultObject->limit = intval($limit); // You can customize this based on your requirements
    $resultObject->pageNumber = intval($page); // You can customize this based on your requirements
    $resultObject->totalPages = $totalPages; // You can customize this based on your requirements
    if(isset($_GET['withSearchItem'])){ $resultObject->searchItem = (object)[]; }
    // Add the pagination object to the resultObject
}
$resultObject->$resourceName = $response; // Assign the data to a property named after the table name

// Include the pagination function in the resultObject

if(isset($_GET['debug'])){$resultObject->totalQueryTook = round($timeTaken, 4) . ' seconds';} // You need to calculate $timeTaken based on your requirements


// Return the JSON response
echo json_encode($resultObject);

?>

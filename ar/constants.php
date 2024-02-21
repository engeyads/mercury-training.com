<?php defined('_CMS_');
global $website_name ;
if (isset($_GET['cat'])){define('Getcat','getcat');};
define("DB_SERVER", 'localhost');
if($_SERVER['HTTP_HOST'] == 'localhost'){
    define("DB_USER", 'root'); //national_ar // mercurytraining_ar
    define("DB_PASS", ''); //nWVGQ$y*%t0x // fsdfsdf$!@212@sSAA
    define("DB_NAME", 'mercuryt_newar');//national_ar
    define("SITE_PATH", 'https://localhost/mercury-training.com/ar'); //
    define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'].'/mercury-training.com/ar');//
}elseif($_SERVER['HTTP_HOST'] == 'mercury-training.test'){
    define("DB_USER", 'root'); //national_ar // mercurytraining_ar
    define("DB_PASS", ''); //nWVGQ$y*%t0x // fsdfsdf$!@212@sSAA
    define("DB_NAME", 'mercuryt_newar');//national_ar
    define("SITE_PATH", 'https://mercury-training.test/ar'); //
    define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'].'/mercury-training.com/ar');//
}elseif($_SERVER['HTTP_HOST'] == 'test.mercury-training.com'){
    define("DB_USER", 'mercurytraining_ar'); //national_ar // mercurytraining_ar
    define("DB_PASS", 'fsdfsdf$!@212@sSAA'); //nWVGQ$y*%t0x // fsdfsdf$!@212@sSAA
    define("DB_NAME", 'mercuryt_newar');//national_ar
    define("SITE_PATH", 'https://test.mercury-training.com/ar'); //
    define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'].'/mercury-training.com/test.mercury-training.com/ar');//
}else{
    define("DB_USER", 'mercurytraining_ar'); //national_ar
    define("DB_PASS", 'fsdfsdf$!@212@sSAA'); //nWVGQ$y*%t0x 
    define("DB_NAME", 'mercuryt_newar');//national_ar
    define("SITE_PATH", 'https://mercury-training.com/ar'); //
    define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'].'/ar');//
}
define("SITE_NAME", "ميركوري للتدريب");
define("CURRENCY_DEF", 'Euro'); //
define("SITE_UPLOAD", SITE_PATH.'/upload');
define("DIR_INCLUDE", BASE_DIR.'/include');
define("DIR_SITE", BASE_DIR);
define("DIR_ADMIN", DIR_SITE.'/cpxx');
define("EMAIL_FROM_ADDR_SHAREK", ' ');
define("EMAIL_FROM_ADDR_JOINUS", ' ');
define("DefaultDescription", "ميركوري للتدريب");
date_default_timezone_set('Asia/Riyadh');
 define('start_date',date('Y-m-d'));
// ------------------------------------------------------------
define("EMAIL_FROM_NAME", 'bassel@mercury-training.com');
define("EMAIL_FROM_ADDR", 'bassel@mercury-training.com');
define("EMAIL_FROM_ADDR2", 'bassel@mercury-training.com');
define("EMAIL_WELCOME", true);
 
 
// ------------------------------------------------------------
define("DIR_LIB", DIR_SITE.'/lib');
define("DIR_UPLOAD", DIR_SITE.'/upload');
define("DIR_TMPL", DIR_SITE.'/layout');
define("DIR_BLOCKS", DIR_SITE.'/blocks');
define("DIR_TYPE", DIR_SITE.'/type');
define("SITE_PLUGIN", SITE_PATH.'/plugin');

define("SITE_LIB", SITE_PATH.'/lib');
define("SITE_TMPL", SITE_PATH.'/layout');
define("SITE_BLOCKS", SITE_PATH.'/blocks');
define("SITE_TYPE", SITE_PATH.'/type');

/**
 * Database Table Constants - these constants
 * hold the names of all the database tables used
 * in the script.
 */
define("TBL_PAGE", "page"); 
define("TBL_USERS", "users");
define("TBL_ACTIVE_USERS",  "active_users");
define("TBL_ACTIVE_GUESTS", "active_guests");
define("TBL_BANNED_USERS",  "banned_users");

/**
 * Special Names and Level Constants - the admin
 * page will only be accessible to the user with
 * the admin name and also to those users at the
 * admin user level. Feel free to change the names
 * and level constants as you see fit, you may
 * also add additional level specifications.
 * Levels must be digits between 0-9.
 */
 
define("ADMIN_NAME", "admin");
define("SUPERADMIN_NAME", "Super Admin");
define("GUEST_NAME", "Guest");
define("SUPERADMIN_LEVEL", 9);
define("ADMIN_LEVEL", 8);
define("USER_LEVEL",  1);
define("GUEST_LEVEL", 0);

/**
 * This boolean constant controls whether or
 * not the script keeps track of active users
 * and active guests who are visiting the site.
 */
define("TRACK_VISITORS", true);

/**
 * Timeout Constants - these constants refer to
 * the maximum amount of time (in minutes) after
 * their last page fresh that a user and guest
 * are still considered active visitors.
 */
 
define("USER_TIMEOUT", 10);
define("GUEST_TIMEOUT", 5);

/**
 * Cookie Constants - these are the parameters
 * to the setcookie function call, change them
 * if necessary to fit your website. If you need
 * help, visit www.php.net for more info.
 * <http://www.php.net/manual/en/function.setcookie.php>
 */
 
define("COOKIE_EXPIRE", 60*60*24*100);  //100 days by default
define("COOKIE_PATH", "/");  //Avaible in whole domain

/**
 * Email Constants - these specify what goes in
 * the from field in the emails that the script
 * sends to users, and whether to send a
 * welcome email to newly registered users.
 */
/**
 * This constant forces all users to have
 * lowercase usernames, capital letters are
 * converted automatically.
 */
define("ALL_LOWERCASE", false);
?>
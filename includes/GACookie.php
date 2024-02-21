<?php 
////////////////////////////////////////////////////
// GA_Parse - PHP Google Analytics Parser Class 
//
// Version 1.0 - Date: 17 September 2009
// Version 1.1 - Date: 25 January 2012
// Version 1.2 - Date: 21 April 2012
//
// Define a PHP class that can be used to parse 
// Google Analytics cookies currently with support
// for __utmz (campaign data) and __utma (visitor data)
//
// Author: Joao Correia - http://joaocorreia.pt
//
// License: LGPL
//
////////////////////////////////////////////////////

class GA_Parse
{

  var $campaign_source;    		// Campaign Source
  var $campaign_name;  			// Campaign Name
  var $campaign_medium;    		// Campaign Medium
  var $campaign_content;   		// Campaign Content
  var $campaign_term;      		// Campaign Term

  var $first_visit;      		// Date of first visit
  var $previous_visit;			// Date of previous visit
  var $current_visit_started;	// Current visit started at
  var $times_visited;			// Times visited
  var $pages_viewed;			// Pages viewed in current session
  var $ip_address;			// Pages viewed in current session
  var $_GCOOKIE;
  
  
  function __construct($_GCOOKIE) {
	   // If we have the cookies we can go ahead and parse them.
	  if (isset($_GCOOKIE["__utma"]) and isset($_GCOOKIE["__utmz"])) {
	      $this->ParseCookies($_GCOOKIE);      
    } 
  }

  function ParseCookies($_GCOOKIE)
  {
    // Parse __utmz cookie
    list($domain_hash,$timestamp, $session_number, $campaign_numer, $campaign_data) = preg_split('[\.]', $_GCOOKIE["__utmz"],5);

    // Parse the campaign data
    $campaign_data = parse_str(strtr($campaign_data, "|", "&"), $output);

    $this->campaign_source = $output['utmcsr'];
    $this->campaign_name = $output['utmccn'];
    $this->campaign_medium = $output['utmcmd'];
    if (isset($output['utmctr'])) $this->campaign_term = $output['utmctr'];
    if (isset($output['utmcct'])) $this->campaign_content =$output['utmcct'];

    // You should tag you campaigns manually to have a full view
    // of your adwords campaigns data. 
    // The same happens with Urchin, tag manually to have your campaign data parsed properly.
    
    if (isset($output['utmgclid'])) {
      $this->campaign_source = "google";
      $this->campaign_name = "";
      $this->campaign_medium = "cpc";
      $this->campaign_content = "";
      $this->campaign_term = $output['utmctr'];
    }

    // Parse the __utma Cookie
    list($domain_hash,$random_id,$time_initial_visit,$time_beginning_previous_visit,$time_beginning_current_visit,$session_counter) = preg_split('[\.]', $_GCOOKIE["__utma"]);

    // $this->first_visit = new \DateTime();
    // $this->first_visit->setTimestamp($time_initial_visit);

    // $this->previous_visit = new \DateTime();
    // $this->previous_visit->setTimestamp($time_beginning_previous_visit);

    // $this->current_visit_started = new \DateTime();
    // $this->current_visit_started->setTimestamp($time_beginning_current_visit);

    $this->first_visit = date('Y-m-d H:i:s',$time_initial_visit);

    $this->previous_visit = date('Y-m-d H:i:s',$time_beginning_previous_visit);

    $this->current_visit_started = date('Y-m-d H:i:s',$time_beginning_current_visit);

    // $date = new DateTime($this->previous_visit, new DateTimeZone('Europe/Istanbul'));
    // echo $date->format('Y-m-d H:i:s') . "\n";

    $newformat = date('Y-m-d',$time_initial_visit);

    $this->times_visited = $session_counter;

    $this->ip_address = $_SERVER['REMOTE_ADDR'];

    // Parse the __utmb Cookie

    if (isset($_GCOOKIE["__utmb"])) {
      list($domain_hash,$pages_viewed,$garbage,$time_beginning_current_session) = preg_split('[\.]', $_GCOOKIE["__utmb"]);
      $this->pages_viewed = $pages_viewed;
    }


  // End ParseCookies
  }  

// End GA_Parse
}

?>

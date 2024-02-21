<?php
function add_edit($item,$addable,$editable,$value){
	global $mysqli,$add1,$add2,$edit,$table,$admin_history_add,$admin_history_edit,$row_history;
	$result = $mysqli -> query("SHOW COLUMNS FROM `$table` LIKE '{$item}'");
	if((mysqli_num_rows($result))) {
		if($value == ''){
			if(isset($_POST["$item"]) and $_POST["$item"] !=''){ $value = addslashes($_POST["$item"]); }else{ $value =''; }
			
			$value = rtrim(ltrim($value, " \t."), " \t.");
		}

		if($addable == 1){
			$add1 .= ", `$item`";
			$add2 .= ", '$value'";
			if($value !=''){
				$admin_history_add .= "<strong>$item :</strong> $value <br />";
			}
		};
		if($editable == 1){
			$edit .= ",`$item` = '$value'";

			$row_history_item = "$item";

			if($row_history[$row_history_item] != $value){
				$admin_history_edit .= "<strong>$item : From: </strong>$row_history[$item] <strong>To:</strong>$value <br />";
			}
		};

	}
};



function form_edit($view_name,$field){
	global $mysqli,$table,$row_function,$currency_function,$default_val;
	$result = $mysqli -> query("SHOW COLUMNS FROM `$table` LIKE '{$field}'");
	if(mysqli_num_rows($result)) {
	if($currency_function ==''){
		?><label for="exampleInputEmail1"><?php echo $view_name; ?> :</label><input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter <?php echo $view_name; ?>" name="<?php echo $field; ?>" value="<?php if(!isset($row_function["$field"])){
			echo $default_val;
		}else{
			echo $row_function["$field"];
		}
		
		?>" <?php $result = $mysqli -> query("SHOW COLUMNS FROM `$table` LIKE '{$field}'"); if(!mysqli_num_rows($result)) { ?>disabled="disabled"<?php }; ?>><?php
	}else{
		?><label for="exampleInputEmail1"><?php echo $view_name; ?> :</label><div class="input-group"><input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php 
		if(isset($row_function["$field"])){ echo $row_function["$field"]; }
		 ?>"><div class="input-group-append"><span class="input-group-text"><?php echo $currency_function; ?></span></div></div><?php
	}
	}
	$currency_function = '';
	$default_val = '';
}
function textarea_edit($view_name,$field){
	global $mysqli,$table,$row_function;
	$result = $mysqli -> query("SHOW COLUMNS FROM `$table` LIKE '{$field}'"); if(mysqli_num_rows($result)) { ?><label for="exampleFormControlTextarea1" ><?php echo $view_name; ?></label>
<textarea class="form-control" id="<?php echo $field; ?>" rows="3" name="<?php echo $field; ?>"  ><?php if(isset($row_function["$field"])){ echo $row_function["$field"]; }; ?></textarea>


            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( '<?php echo $field; ?>' );
							
            </script>

			<?php };
	?><?php
}

function check_box_edit($view_name,$field){
	global $mysqli,$table,$row_function,$currency_function;
	$result = $mysqli -> query("SHOW COLUMNS FROM `$table` LIKE '{$field}'");
	if(mysqli_num_rows($result)) {
		?><label for="check_box_<?php echo $field; ?>"><?php echo $view_name; ?> :</label><input type="checkbox" class="form-control" id="check_box_<?php echo $field; ?>" name="<?php echo $field; ?>" value="1" <?php $result = $mysqli -> query("SHOW COLUMNS FROM `$table` LIKE '{$field}'"); if(!mysqli_num_rows($result)) { ?>disabled="disabled"<?php }; ?> <?php if(isset($row_function["$field"]) and $row_function["$field"] == 1){ ?>checked<?php }?>><?php
	}
	$currency_function = '';
}

















function admin_history($admin_history_type,$admin_history_Text,$id){
	global $mysqli,$user_nameA,$aa,$table,$admin_id1;
	$aa = str_replace("'",'"',$aa);

	$date_now = date('Y-m-d');
	$time_now = date('H:i:s');
	if($id == ''){ $id = $_GET['id']; }
	$admin_history ="INSERT INTO `admin_history` ( `id` , `user_name` , `table`, `admin_id`, `admin_id1` , `Date` , `time` , `type` , `Text` , `ip`,`sql` )
	VALUES (
	NULL , '$user_nameA', '{$table}', '{$id}', '{$admin_id1}', '$date_now', '$time_now', '$admin_history_type', '$admin_history_Text', '{$_SERVER['REMOTE_ADDR']}','{$aa}'
	)";
	$mysqli -> query($admin_history);
}




function topnotification($Text){
	global $mysqli,$user_nameA,$topnotificationAddToLinke,$_SESSION;
	if(!$mysqli->error){ 
		// $topnotification ="INSERT INTO `topnotification` ( `id` , `user_name`, `Text` )
		// VALUES (
		// NULL , '$user_nameA', '$Text' )";
		// $mysqli -> query($topnotification);
		// $topnotificationId = $mysqli->insert_id;
		// $topnotificationId = toBase($topnotificationId);
		// $topnotificationAddToLinke = "&tn={$topnotificationId}";
		$_SESSION['tn'] = $Text;
		$_SESSION['tnt'] = 'success';
	}else{
		//$topnotificationAddToLinke = "&tn=Err";
		$_SESSION['tn'] = 'Err';
		$_SESSION['tnt'] = 'Err';
	}
}





function replace_aa(){
	global $view_aa,$aa,$mysqli,$link;
	if($view_aa == 1){ 
	?>
    <div class="alert alert-primary" role="alert">
      <h4 class="alert-heading">MSQL</h4>
      <p><?php echo $aa; ?></p>
    <?php if($mysqli->error){
          ?>
          <hr>
      <p class="mb-0"><?php printf("Error message: %s\n", $mysqli->error); ?></p>
          <?php
       } ?>    
    </div>
    <br clear="all">
    <a href="<?php echo $link; ?>" type="button" class="btn btn-primary btn-lg btn-block">Continue <i class="fa fa-forward" aria-hidden="true"></i></a>
    <?php
    }else{ ?><meta http-equiv="refresh" content="0;url=<?php echo $link; ?>" /><?php }
}


function delet(){
	global $_POST,$_GET,$mysqli,$table,$user_nameA,$view_aa,$pass_word_1,$get,$order,$ASC,$numberOfRows_get,$affected_rows1,$affected_rowsTableName1,$affected_rowsAction1,$affected_rows,$affected_rowsTableName,$affected_rowsAction,$topnotificationAddToLinke;
	$id = addslashes($_GET['id']);
	if($table == 'user_name'){ $tableLinke = 'users'; }else{ $tableLinke = $table; }
	$statmentMsg = '';
	if(isset($_POST['pass_word_1'])){$pass_wordA_1 = addslashes($_POST['pass_word_1']); }else{ $pass_wordA_1=''; }
	
	if(isset($_GET['c_id'])){     $c_id = addslashes($_GET['c_id']);         }elseif(isset($_POST['c_id'])){     $c_id = addslashes($_POST['c_id']);         }else{ $c_id = '';    }
	if(isset($_GET['course_c'])){ $course_c = addslashes($_GET['course_c']); }elseif(isset($_POST['course_c'])){ $course_c = addslashes($_POST['course_c']); }else{ $course_c = '';}
	if(isset($_GET['start'])){    $start = addslashes($_GET['start']);       }elseif(isset($_POST['start'])){    $start = addslashes($_POST['start']);       }else{ $start = '';   }
	if(isset($_GET['order'])){    $order = addslashes($_GET['order']);       }elseif(isset($_POST['order'])){    $order = addslashes($_POST['order']);       }else{ $order = '';   }
	if(isset($_GET['ASC'])){      $ASC   = addslashes($_GET['ASC']);         }elseif(isset($_POST['ASC'])){      $ASC   = addslashes($_POST['ASC']);         }else{ $ASC = '';     }
	if(isset($_GET['numberOfRows_get'])){ $numberOfRows_get = addslashes($_GET['numberOfRows_get']); }elseif(isset($_POST['numberOfRows_get'])){ $numberOfRows_get = addslashes($_POST['numberOfRows_get']); }else{ $numberOfRows_get = ''; }
	
	$pass_wordA_1 = md5($pass_wordA_1);
	$pass_wordA_1.='anas101';
	$pass_wordA_1 = md5($pass_wordA_1);
	$pass_wordA_1="anas101".$pass_wordA_1;
	$pass_wordA_1 = md5($pass_wordA_1);
	


	$sql_admin = "SELECT * 
	FROM `user_name` 
	WHERE (1 AND `user_name` LIKE '$user_nameA' 
	AND `pass_world` LIKE '$pass_wordA_1' AND (`level` =1 or `level` =2 ))
	 LIMIT 0 , 1 ";
	//exit;
	
	$result_admin = $mysqli -> query($sql_admin);
	if ($result_admin && (mysqli_num_rows($result_admin)> 0)) {
		
		
		if($table == 'course_main'){
			$sql_course_main = "SELECT `c_id` FROM `course_main` WHERE 1 AND `id` = '$id' ";
			$result_course_main = $mysqli -> query($sql_course_main);
			if ($result_course_main && (mysqli_num_rows($result_course_main) > 0)) {
				$row_course_main = $result_course_main-> fetch_assoc();
				$c_id1 = $row_course_main['c_id'];
				if($c_id1 != '' ){
					$aa1 = "DELETE FROM `course` WHERE `c_id` = '" . $c_id1 . "' ";
					$mysqli -> query($aa1);
					$affected_rows1 = $mysqli->affected_rows;
					$affected_rowsAction1 = 'Delete';
					$affected_rowsTableName1 = 'course';
					
				}
			}
		}elseif($table == 'cities'){
				$aa1 = "DELETE FROM `course` WHERE `city` = '" . $id . "' ";
				$mysqli -> query($aa1);
				$affected_rows1 = $mysqli->affected_rows;
				$affected_rowsTableName1 = 'course';
				$affected_rowsAction1 = 'Delete';
		}
	if($table == 'user_name'){ $idColumn = 'user_name'; }else{ $idColumn = 'id'; }
	
	$aa = "DELETE FROM `{$table}` WHERE `{$idColumn}` = '" . $id . "' LIMIT 1";
	$mysqli -> query($aa);
	$affected_rows = $mysqli->affected_rows;
	$affected_rowsTableName = $table;
	$affected_rowsAction = 'Delete';

	$statmentMsg .=  $affected_rows. ' rows has been deleted from '.$affected_rowsTableName ;
	if(isset($affected_rows1) and $affected_rows1 !=''){ 
		$statmentMsg .= '<br>'.$affected_rows1.' rows has been deleted from '.$affected_rowsTableName1;
	}
	topnotification($statmentMsg);
	$get1 = $get;
	
	if($course_c !=''){ $get1 .= "&course_c={$course_c}"; }
	if($start !='')   { $get1 .= "&start={$start}";       };
	if($c_id !='')    { $get1 .= "&c_id={$c_id}";         };
	if($ASC !='')     { $get1 .= "&ASC={$ASC}";           };
	if($order !='')   { $get1 .= "&order={$order}";       };
	if($numberOfRows_get !='')   { $get1 .= "&numberOfRows_get={$numberOfRows_get}"; };
	$theNewLink = "?page={$tableLinke}-view{$get1}{$topnotificationAddToLinke}";
	
	if($table == 'course'){ $theNewLink = "?page=course_main-edit&id={$c_id}{$get}{$topnotificationAddToLinke}&activeTab=Event"; }; 
	if($view_aa == 1){ 
		?>
		<div class="alert alert-primary" role="alert">
		  <h4 class="alert-heading">MSQL</h4>
		  <p><?php echo $aa; if(isset($aa1) and $aa1!=''){ echo '<br>'.$aa1; }?></p>
		<?php if($mysqli->error){
			  ?>
			  <hr>
		  <p class="mb-0"><?php printf("Error message: %s\n", $mysqli->error); ?></p>
          
			  <?php
		   } ?>
           
           <?php
		if(isset($affected_rows) and $affected_rows !='' and $affected_rows !='0'){  ?><hr><p class="mb-0"><?php printf("Affected rows (DELETE): Table Name: <strong>{$affected_rowsTableName}</strong> %s\n ", $affected_rows.' rows'); ?></p>  <?php }
		if(isset($affected_rows1) and $affected_rows1 !='' and $affected_rows1 !='0'){  ?><hr><p class="mb-0"><?php printf("Affected rows (DELETE): Table Name: <strong>{$affected_rowsTableName1}</strong> %s\n ", $affected_rows1.' rows'); ?></p><?php }
		   ?></div>
		<br clear="all">
		<a href="<?php echo $theNewLink; ?>" type="button" class="btn btn-primary btn-lg btn-block">Continue</a>
		<?php
    }else{ ?><meta http-equiv="refresh" content="0;url=<?php echo $theNewLink; ?>" /><?php }
	
	
	}else{
		$confirmMsg ='';
		if($table == 'course_main'){ $table1 = 'Courses'; $column='name'; 
			$sql_course_main = "SELECT `c_id` FROM `course_main` WHERE 1 AND `id` = '$id' ";
			$result_course_main = $mysqli -> query($sql_course_main);
			if ($result_course_main && (mysqli_num_rows($result_course_main) > 0)) {
				$row_course_main = $result_course_main-> fetch_assoc();
				$c_id1 = $row_course_main['c_id'];
				if($c_id1 != '' ){
					$sql_course = "SELECT `id` FROM `course` WHERE 1 AND `c_id` = '$c_id1' ";
					$result_course = $mysqli -> query($sql_course);
					if ($result_course && (mysqli_num_rows($result_course) > 0)) {
						$themysqli_num_rows = mysqli_num_rows($result_course);
						$confirmMsg = "<br>and delete {$themysqli_num_rows} course date ";
					}
				}
			}
		}else
		if($table == 'cities'){ $table1 = 'Cities'; $column='name'; 
			$sql_course = "SELECT `id` FROM `course` WHERE 1 AND `city` = '$id' ";
			$result_course = $mysqli -> query($sql_course);
			if ($result_course && (mysqli_num_rows($result_course) > 0)) {
				$themysqli_num_rows = mysqli_num_rows($result_course);
				$confirmMsg = "<br>and delete {$themysqli_num_rows} course date ";
			}
		}else
		if($table == 'course_c'){
			$table1 = 'Categories'; $column='name';
		}else
		{ $table1 = $table; $column='name';}
		?>
        <div class="row"><div class="col-md-12">
        <h1>Confirm delete <?php
			$sql_table = "SELECT `{$column}` FROM `{$table}` WHERE 1 AND `id` = '$id' ";
			$result_table = $mysqli -> query($sql_table);
			if ($result_table && (mysqli_num_rows($result_table) > 0)) {
				$row_table = $result_table-> fetch_assoc();
				echo $row_table["$column"];
			}
			
			?> from <?php echo $table1; echo $confirmMsg; ?> <br>please enter your password:</h1>
        <br clear="all">
		</div>
        
        <div class="col-md-12">
	<form
		action="?page=<?php echo $tableLinke; ?>-del&amp;id=<?php echo $id; ?><?php echo $get; ?>"
		method="post">
		<label>Pass Word</label>
		<input type="password" class="form-control" id="pass_word_1" value="" placeholder="Enter Pass Word" name="pass_word_1">
		<button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Delete</button>
    <?php if($course_c !=''){ ?><input type="hidden" name="course_c" value="<?php echo $course_c; ?>" /><?php }?>
    <?php if($start !=''){    ?><input type="hidden" name="start" value="<?php    echo $start;    ?>" /><?php }?>
    <?php if($c_id !=''){     ?><input type="hidden" name="c_id" value="<?php     echo $c_id;     ?>" /><?php }?>
    <?php if($order!=''){     ?><input type="hidden" name="order" value="<?php    echo $order;    ?>" /><?php }?>
    <?php if($ASC  !=''){     ?><input type="hidden" name="ASC" value="<?php      echo $ASC;      ?>" /><?php }?>
    <?php if($numberOfRows_get  !=''){ ?><input type="hidden" name="numberOfRows_get" value="<?php      echo $numberOfRows_get;      ?>" /><?php }?>
	</form>
	</div></div>
	<?php
	}
	
}



function pagination(){
	global $pagination,$start, $integer,$numrows,$end,$main_get,$order_get,$ASC_get,$numberOfRows_get,$pageName;
	$str='';
	if(!isset($pageName) or $pageName==''){ $pageName = 'course_main-view';}
	$pagination = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-start nt">';
	if($start>0){ 
		$pagination .='<span class="no"><a href="?page='.$pageName.'&start=';
		$pagination .=$start - $integer;
			$pagination .="{$main_get}{$order_get}{$ASC_get}{$numberOfRows_get}";
			$pagination .='"  class="page-link">Previous</a></span>';
	};
	$div = $numrows%$integer;
	$page_no = $start/$integer;
	$page_no++;
	$totalPages=$numrows/$integer;
	
	$arraystr = array('1','2','3');
	//echo $page_no ;
	if($div != 0){ $totalPages = $totalPages+1; $thetotalPages =  (($numrows-$div)/$integer)+1;}else{ $thetotalPages =  $numrows/$integer; };
	array_push($arraystr,$thetotalPages);
	array_push($arraystr,$thetotalPages-1);
	array_push($arraystr,$thetotalPages-2);
	array_push($arraystr,$page_no-1);
	array_push($arraystr,$page_no+1);
	array_push($arraystr,$page_no);
	//print_r($arraystr);
	
	if($thetotalPages > 1) {
		for($i = 1; $i <= $thetotalPages; $i++) {
			if(in_array($i,$arraystr)){
				$inarray = 1;
				$st = $integer*$i-$integer; $no =$i;                                            
				if($page_no == $i){
					$str .= " <span class=\"page-item active";
				}else{
					$str .= " <span class=\"";
				};
				$str .= "\"><a class=\"page-link\" href=\"?page={$pageName}&start={$st}{$main_get}{$order_get}{$ASC_get}{$numberOfRows_get}\">$no</a></span>";
				$str .= $i != $thetotalPages ? "  " : "";
			}else{
				if($inarray == 1){ $str .='...'; }
				$inarray = 0;	
			}	
		}
	}
	$pagination .=  $str;
	if($numrows>$end){
		$pagination .='<span class="no"><a href="?page='.$pageName.'&start=';
		$pagination .= $integer + $start; 
		$pagination .="{$main_get}{$order_get}{$ASC_get}{$numberOfRows_get}";
		$pagination .='"  class="page-link">Next</a></span>';
	};
	$pagination .='</ul></nav>';
}
function numberOfRows(){
	global $integer,$main_get,$order_get,$ASC_get,$numberOfRowsView;
	$numberOfRowsView ='<div class="dropdown nt">';
	$numberOfRowsView .= "<button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Number of rows ( {$integer} ) </button>";
	$numberOfRowsView .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
	$numberOfRowsView .= '<a class="dropdown-item';
	if($integer == '25'){ $numberOfRowsView .=' font-weight-bold'; };
	$numberOfRowsView .='" href="?page=course_main-view'.$main_get.$order_get.$ASC_get.'&numberOfRows_get=25">25</a>';
	
	$numberOfRowsView .= '<a class="dropdown-item';
	if($integer == '50'){ $numberOfRowsView .=' font-weight-bold'; };
	$numberOfRowsView .='" href="?page=course_main-view'.$main_get.$order_get.$ASC_get.'&numberOfRows_get=50">50</a>';
	
	$numberOfRowsView .= '<a class="dropdown-item';
	if($integer == '100'){ $numberOfRowsView .=' font-weight-bold'; };
	$numberOfRowsView .='" href="?page=course_main-view'.$main_get.$order_get.$ASC_get.'&numberOfRows_get=100">100</a>';
	
	$numberOfRowsView .= '<a class="dropdown-item';
	if($integer == '200'){ $numberOfRowsView .=' font-weight-bold'; };
	$numberOfRowsView .='" href="?page=course_main-view'.$main_get.$order_get.$ASC_get.'&numberOfRows_get=200">200</a>';
	
	$numberOfRowsView .= '<a class="dropdown-item';
	if($integer == '500'){ $numberOfRowsView .=' font-weight-bold'; };
	$numberOfRowsView .='" href="?page=course_main-view'.$main_get.$order_get.$ASC_get.'&numberOfRows_get=500">500</a>';
	
	$numberOfRowsView .='</div></div>';
}


function toBase($num, $b=36) {
	global $toBase_id,$add_to_url;
	$base='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$r = $num  % $b ;
	$res = $base[$r];
	$q = floor($num/$b);
	while ($q) {
	$r = $q % $b;
	$q =floor($q/$b);
	$res = $base[$r].$res;
	}
	$toBase_id = $add_to_url.$res;
	return $toBase_id;
  
}


function to10( $num, $b=36) {
	global $add_to_url,$the_number;
  $base='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $num = str_replace($add_to_url,'',$num);
  $limit = strlen($num);
  $res=strpos($base,$num[0]);
  for($i=1;$i<$limit;$i++) {
    $res = $b * $res + strpos($base,$num[$i]);
  }
  $the_number = $res;
  return $res;
}

function SortBy($SortBy,$name){
	global $OrderPage,$OrderPage1,$main_get;
	if(!isset($OrderPage1) or $OrderPage1 ==''){ $OrderPage1 = 'view'; }
	if(isset($_GET["$SortBy"]) and $_GET["$SortBy"] == 1 and isset($_GET['desc']) and $_GET['desc'] == '1'){
	  $class = 'fa fa-sort-asc';
	  $link = '?page='.$OrderPage.'-'.$OrderPage1.'&'.$SortBy.'=1'.$main_get;
	}elseif(isset($_GET["$SortBy"]) and $_GET["$SortBy"] == 1){
	  $class = 'fa fa-sort-desc';
	  $link = '?page='.$OrderPage.'-'.$OrderPage1.'&'.$SortBy.'=1&desc=1'.$main_get;
	}else{
	  $class = 'fa fa-sort';
	  $link = '?page='.$OrderPage.'-'.$OrderPage1.'&'.$SortBy.'=1'.$main_get;
	  ?><?php 
	}?> 
	<a href="<?php echo $link; ?>"> <i class="<?php echo $class; ?>" aria-hidden="true"></i> <?php echo $name; ?></a>
  <?php
  }

  function SortBy1($SortBy,$name){
	global $OrderPage;
	if(isset($_GET["order"]) and $_GET["order"] == $SortBy and isset($_GET['ASC']) and $_GET['ASC'] == 'ASC'){
	  $class = 'fa fa-sort-asc';
	  $link = '?page='.$OrderPage.'-view&order='.$SortBy;
	}elseif(isset($_GET["order"]) and $_GET["order"] == $SortBy ){
	  $class = 'fa fa-sort-desc';
	  $link = '?page='.$OrderPage.'-view&order='.$SortBy.'&ASC=ASC';
	}else{
	  $class = 'fa fa-sort';
	  $link = '?page='.$OrderPage.'-view&order='.$SortBy;
	  ?><?php 
	}?> 
	<a href="<?php echo $link; ?>"> <i class="<?php echo $class; ?>" aria-hidden="true"></i> <?php echo $name; ?></a>
  <?php
  }
?>

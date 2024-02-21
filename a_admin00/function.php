<?php
function add_edit($item,$addable,$editable,$value){
	global $conn,$add1,$add2,$edit,$table,$admin_history_add,$admin_history_edit,$row_history;
	$result = mysql_query("SHOW COLUMNS FROM `$table` LIKE '{$item}'");
	if((mysql_num_rows($result))) {
		if($value == ''){
			$value = addslashes($_POST[$item]);
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
	global $conn,$table,$row_function,$currency_function,$default_val;
	$result = mysql_query("SHOW COLUMNS FROM `$table` LIKE '{$field}'");
	if(mysql_num_rows($result)) {
	if($currency_function ==''){
		?><label for="exampleInputEmail1"><?php echo $view_name; ?> :</label><input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter <?php echo $view_name; ?>" name="<?php echo $field; ?>" value="<?php if($row_function["$field"] == ''){
			echo $default_val;
		}else{
			echo $row_function["$field"];
		}
		
		?>" <?php $result = mysql_query("SHOW COLUMNS FROM `$table` LIKE '{$field}'"); if(!mysql_num_rows($result)) { ?>disabled="disabled"<?php }; ?>><?php
	}else{
		?><label for="exampleInputEmail1"><?php echo $view_name; ?> :</label><div class="input-group"><input type="text" class="form-control" name="<?php echo $field; ?>" value="<?php echo $row_function["$field"];
		 ?>"><div class="input-group-append"><span class="input-group-text"><?php echo $currency_function; ?></span></div></div><?php
	}
	}
	$currency_function = '';
	$default_val = '';
}
function textarea_edit($view_name,$field){
	global $conn,$table,$row_function;
	$result = mysql_query("SHOW COLUMNS FROM `$table` LIKE '{$field}'"); if(mysql_num_rows($result)) { ?><label for="exampleFormControlTextarea1" ><?php echo $view_name; ?></label>
<textarea class="form-control" id="<?php echo $field; ?>" rows="3" name="<?php echo $field; ?>"  ><?php echo $row_function["$field"]; ?></textarea>


            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( '<?php echo $field; ?>' );
							
            </script>

			<?php };
	?><?php
}

function check_box_edit($view_name,$field){
	global $conn,$table,$row_function,$currency_function;
	$result = mysql_query("SHOW COLUMNS FROM `$table` LIKE '{$field}'");
	if(mysql_num_rows($result)) {
		?><label for="check_box_<?php echo $field; ?>"><?php echo $view_name; ?> :</label><input type="checkbox" class="form-control" id="check_box_<?php echo $field; ?>" name="<?php echo $field; ?>" value="1" <?php $result = mysql_query("SHOW COLUMNS FROM `$table` LIKE '{$field}'"); if(!mysql_num_rows($result)) { ?>disabled="disabled"<?php }; ?> <?php if($row_function["$field"] == 1){ ?>checked<?php }?>><?php
	}
	$currency_function = '';
}

















function admin_history($admin_history_type,$admin_history_Text,$id){
	global $conn,$user_nameA,$aa,$table,$admin_id1;
	$aa = str_replace("'",'"',$aa);

	//$aa='';
	$date_now = date('Y-m-d');
	$time_now = date('H:i:s');
	if($id == ''){ $id = $_GET[id]; }
	$admin_history ="INSERT INTO `admin_history` ( `id` , `user_name` , `table`, `admin_id`, `admin_id1` , `Date` , `time` , `type` , `Text` , `ip`,`sql` )
	VALUES (
	NULL , '$user_nameA', '{$table}', '{$id}', '{$admin_id1}', '$date_now', '$time_now', '$admin_history_type', '$admin_history_Text', '{$_SERVER['REMOTE_ADDR']}','{$aa}'
	)";
	mysql_query($admin_history, $conn);

//$admin_id1 = '';

}
?>

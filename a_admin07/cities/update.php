<?php
require("../../config.inc.php");
require("../configAdmin.php");
require("../login.php");
require("../function.php");
$tableName = 'cities';
$tableAlias = 'City';
$inputName = $_POST['inputName'];
$thisInputMainIdValue = $_POST['thisInputMainIdValue'];
$inputTitle = $_POST['InputTitle'];
$inputValue = $_POST['inputValue'];


$sql_OldValue = "SELECT `name`,`{$inputName}` as 'element' FROM `{$tableName}` WHERE `{$tableName}`.`id` ='{$thisInputMainIdValue}'";
$result_OldValue = $mysqli -> query($sql_OldValue);
$row_OldValue = $result_OldValue-> fetch_assoc();
$oldValue =  $row_OldValue['element'];
$name =  $row_OldValue['name'];


$update_query ="UPDATE `{$tableName}` SET `{$inputName}` ='{$inputValue}'  WHERE `{$tableName}`.`id` ='{$thisInputMainIdValue}' LIMIT 1";
$mysqli -> query($update_query);



$sql_SelsectQuery = "SELECT `{$inputName}` as 'element' FROM `{$tableName}` WHERE `{$tableName}`.`id` ='{$thisInputMainIdValue}'";
$result_SelsectQuery = $mysqli -> query($sql_SelsectQuery);
$row_SelsectQuery = $result_SelsectQuery-> fetch_assoc();
$newValue =  $row_SelsectQuery['element'];
			
			
$myObj = new stdClass();			
$myObj->val = $newValue;
$myObj->msg = 'this msg to display';
$myObj->name = $name;
$myObj->oldValue = $oldValue;
$myObj->tableAlias = $tableAlias;
$myObj->inputName = $inputName;
$myObj->InputTitle = $inputTitle;

$myJSON = json_encode($myObj);

echo $myJSON;

$aa = $update_query;
$table = $tableName;
$admin_history_edit = " update {$tableAlias}: {$name} {$inputName} from {$oldValue} to {$inputValue}";
admin_history('Update City',$admin_history_edit,$thisInputMainIdValue);
?>
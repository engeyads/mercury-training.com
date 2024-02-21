<?php
if($level_admin > 2){ exit; }
$integer =30;
if ( isset($_GET['start'] )){
	$start = $_GET["start"];
}else{
	$start = 0;
};
$start ;
$end = $integer + $start ;
// Query the database
$sql_admin_history1 = "SELECT * FROM `admin_history` $main ORDER BY `id` ASC";
$result_admin_history1 = mysql_query($sql_admin_history1, $conn);
$numrows = mysql_num_rows($result_admin_history1);

// Query the database
$sql_admin_history = "$sql_admin_history1 LIMIT $start , $integer";
$result_admin_history = mysql_query($sql_admin_history, $conn);
?><div align="" class="title">
<p><strong>View All History </strong>

<br />
<br />

<!-- start section add -->
<div class="main-content-inner">
<div class="col-12 my-5 filter">

		<div class="card-body">
			<h4 class="header-title">Filter</h4>
				<form>
				  <div class="row">
				    <div class="col-lg-3 mb-4">
							<label class="col-form-label">Users</label>
							<select class="form-control">
							 <option value=''>users</option>
							</select>
				    </div>
				    <div class="col-lg-3 mb-4">
							<label class="col-form-label">Table</label>
							<select class="form-control">
							 <option value=''>Table</option>

							</select>
				    </div>
						<div class="col-lg-3 mb-4">
							<label class="col-form-label">Admin ID</label>
				      <input type="text" class="form-control" value="<?php if($_GET[admin_id] != ''){ echo $_GET[admin_id]; }; ?>" placeholder="Admin ID">
				    </div>
						<div class="col-lg-3 mb-4">
							<label class="col-form-label">Admin ID1</label>
				      <input type="text" class="form-control" placeholder="Admin ID1">
				    </div>
						<div class="col-lg-3 mb-4">
							<label class="col-form-label">Date</label>
				      <input type="text" class="form-control" placeholder="Date">
				    </div>
						<div class="col-lg-3 mb-4">
							<label class="col-form-label">Type</label>
							<select class="form-control">
							 <option value=''>Type</option>
							</select>
				    </div>
						<div class="col-lg-6 mb-4">
							<label class="col-form-label">Text</label>
				      <input type="text" class="form-control" placeholder="Text">
				    </div>
				  </div>
				</form>
				<button type="Search" class="btn btn-primary   text-bloder">Search</button>
		</div>
		</div>
</div>


<div class="main-content-inner">
<div class="row">
	<div class="col-lg-12">
		<table class="table table-striped table-hover table-bordered">
		    <thead class="text-uppercase">
		        <tr class="thead-dark">
		            <th scope="col">user</th>
		            <th scope="col">table</th>
		            <th scope="col">admin_id</th>
		            <th scope="col">admin_id1</th>
		            <th scope="col">Date</th>
		            <th scope="col">time</th>
		            <th scope="col">type</th>
		            <th scope="col">text</th>
		            <th scope="col">IP</th>
		        </tr>
		    </thead>
		    <tbody> <?php
		            if ($result_admin_history && (mysql_num_rows($result_admin_history) > 0)) {
		              while ($row_admin_history = mysql_fetch_assoc($result_admin_history)){
		                 $id =htmlspecialchars($row_admin_history['id']);
										 ?>
		        <tr>

		            <td scope="row"><?php echo $row_admin_history['user_name']; ?></td>
		            <td><?php echo $row_admin_history['table']; ?></td>
		            <td><?php echo $row_admin_history['admin_id']; ?></td>
		            <td><?php echo $row_admin_history['admin_id1']; ?></td>
		            <td><?php echo $row_admin_history['Date']; ?></td>
		            <td><?php echo $row_admin_history['time']; ?></td>
		            <td><?php echo $row_admin_history['type']; ?></td>
		            <td><?php echo $row_admin_history['Text']; ?></td>
		            <td><?php echo $row_admin_history['ip']; ?></td>
		        </tr><?php
		                                            }
		                                        }else{ echo " There are no Items to display "; };
		                                         ?>
		    </tbody>
		</table>
	</div>
</div>
</div>
<?php
                                            if($start>0){
                                                    ?><a href="?page=course_c/view&start=<?php echo $start - $integer ; ?>
                                                        <?php if ( isset($_GET['id_admin_history_c'] )){ echo "&id_admin_history_c=$id_admin_history_c"; }; ?>
                                                        <?php if ( isset($_GET['id_admin_history'] )){ echo "&id_admin_history=$id_admin_history"; }; ?>"  class="linlk">Previous</a>
                                                    <?php
                                                };
                                            if($numrows>$end and $start>0){ echo " - ";};
                                                if($numrows>$end){
                                                ?><a href="?page=course_c/view&start=<?php echo $integer + $start; ?>
                                                        <?php if ( isset($_GET['id_admin_history_c'] )){ echo "&id_admin_history_c=$id_admin_history_c"; }; ?>
                                                        <?php if ( isset($_GET['id_admin_history'] )){ echo "&id_admin_history=$id_admin_history"; }; ?>"  class="linlk">Next</a>
                                                    <?php
                                            };
                                            ?>
<br><br><br>

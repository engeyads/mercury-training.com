<?php

//Cities
$city_nn = 0;
function select_name_city($name,$view_name){
	global $mysqli,$city_nn,$addtocitytablename;
	$city_nn++;
	?>
<tr style="<?php if($city_nn !=1){ echo 'display:none'; }else{ echo 'display:compact'; }; ?>"
    id="city_<?php echo $city_nn;?>">
    <th scope="col"><?php echo $view_name; ?></th>
    <td>
        <select class="form-control d-inline-block" name="<?php echo $name; ?>" style="width:150px">
            <option value="">All Cities</option>
            <?php 
				$sql_cities = "SELECT * FROM `cities`";
				$result_cities = $mysqli -> query($sql_cities);
				if ($result_cities && (mysqli_num_rows($result_cities) > 0)) {
					while ($row_cities = $result_cities-> fetch_assoc()){
						?>
            <option value="<?php echo $row_cities['id']; ?>"><?php echo $row_cities['name']; ?></option><?php
					}
				}
				?>
        </select> <?php if($city_nn == 1){ ?><a href="#" class="btn btn-danger btn-sm  py-1  float-right"
            id="city_a_Remove"
            onclick="document.getElementById('city_Remove_1').style.display='';document.getElementById('city_a_Remove').style.display='none';">-
            Expect City</a>
        <?php }; ?><?php if($city_nn <= 11){ ?>
        <a href="#" class="btn btn-success btn-sm  mr-2 py-1  float-right" id="city_a<?php echo $city_nn;?>"
            onclick="document.getElementById('city_<?php echo $city_nn+1;?>').style.display='';document.getElementById('city_a<?php echo $city_nn;?>').style.display='none';">+
            Add City</a><?php }; ?></td>
</tr>
<?php
};
//End Cities


//Cities Remove
$city_Remove_nn = 0;
function select_name_city_Remove($name,$view_name){
	global $mysqli,$city_Remove_nn,$addtocitytablename;
	$city_Remove_nn++;
	?>
<tr style="display:none;" class="alert-danger" id="city_Remove_<?php echo $city_Remove_nn;?>">
    <th scope="col"><?php echo $view_name; ?></th>
    <td><select name="Remove_<?php echo $name; ?>" style="width:150px">
            <option value="">&nbsp;</option>
            <?php 
		$sql_cities = "SELECT * FROM `cities`";
		$result_cities = $mysqli -> query($sql_cities);
		if ($result_cities && (mysqli_num_rows($result_cities) > 0)) {
			while ($row_cities = $result_cities-> fetch_assoc()){
				?>
            <option value="<?php echo $row_cities['id']; ?>"><?php echo $row_cities[name]; ?></option><?php
			}
		}
		?>
        </select> <?php if($city_Remove_nn <= 11){ ?>
        <a href="#" id="city_a_Remove<?php echo $city_Remove_nn;?>" class="btn btn-danger btn-sm  py-1  float-center"
            onclick="document.getElementById('city_Remove_<?php echo $city_Remove_nn+1;?>').style.display='';document.getElementById('city_a_Remove<?php echo $city_Remove_nn;?>').style.display='none';">+
            Expect City</a><?php }; ?> </td>
</tr>
<?php
};
//End Cities Remove























//C_ID
$c_id_nn = 0;
function select_name_c_id($name,$view_name){
	global $mysqli,$c_id_nn,$addtoc_idtablename;
	$c_id_nn++;
	?>
<tr style="<?php if($c_id_nn !=1){ echo 'display:none'; }else{ echo 'display:compact'; }; ?>"
    id="c_id_<?php echo $c_id_nn;?>">
    <th scope="col"><?php echo $view_name; ?></th>
    <td>
        <input type="text" class="form-control d-inline-block" name="<?php echo $name; ?>" style="width:150px">
        <?php if($c_id_nn == 1){ ?><a href="#" class="btn btn-danger btn-sm  py-1  float-right" id="c_id_a_Remove"
            onclick="document.getElementById('c_id_Remove_1').style.display='';document.getElementById('c_id_a_Remove').style.display='none';">-
            Expect REF</a>
        <?php }; ?><?php if($c_id_nn <= 11){ ?>
        <a href="#" class="btn btn-success btn-sm  mr-2 py-1  float-right" id="c_id_a<?php echo c_id_nn;?>"
            onclick="document.getElementById('c_id_<?php echo $c_id_nn+1;?>').style.display='';document.getElementById('c_id_a<?php echo $c_id_nn;?>').style.display='none';">+
            Add REF</a><?php }; ?></td>
</tr>
<?php
};
//End C_ID


//C_ID Remove
$c_id_Remove_nn = 0;
function select_name_c_id_Remove($name,$view_name){
	global $mysqli,$c_id_Remove_nn,$addtoc_idtablename;
	$c_id_Remove_nn++;
	?>
<tr style="display:none;" class="alert-danger" id="c_id_Remove_<?php echo $c_id_Remove_nn;?>">
    <th scope="col"><?php echo $view_name; ?></th>
    <td><input type="text" name="Remove_<?php echo $name; ?>" style="width:150px">
        <?php if($c_id_Remove_nn <= 11){ ?>
        <a href="#" id="c_id_a_Remove<?php echo $c_id_Remove_nn;?>" class="btn btn-danger btn-sm  py-1  float-center"
            onclick="document.getElementById('c_id_Remove_<?php echo $c_id_Remove_nn+1;?>').style.display='';document.getElementById('c_id_a_Remove<?php echo $c_id_Remove_nn;?>').style.display='none';">+
            Expect REF</a><?php }; ?> </td>
</tr>
<?php
};
//End C_ID Remove















//categories
		$category_nn = 0;
		function select_name_category($name,$view_name){
			global $mysqli,$category_nn;
			$category_nn++;
			?>
<tr style="<?php if($category_nn !=1){ echo 'display:none'; }else{ echo 'display:compact'; }; ?>"
    id="category_<?php echo $category_nn;?>">
    <th scope="col"><?php echo $view_name; ?></th>
    <td>
        <select class="form-control d-inline-block" name="<?php echo $name; ?>" style="width:150px">
            <option value="">All categories</option>
            <?php 
				$sql_course_c = "SELECT * FROM `course_c`";
				$result_course_c = $mysqli -> query($sql_course_c);
				if ($result_course_c && (mysqli_num_rows($result_course_c) > 0)) {
					while ($row_course_c = $result_course_c-> fetch_assoc()){
						?>
            <option value="<?php echo $row_course_c['id']; ?>"><?php echo $row_course_c['name']; ?></option>
            <?php
					}
				}
				?>
        </select>
        <?php if($category_nn == 1){ ?><a href="#" class="btn btn-danger btn-sm   py-1  float-right"
            id="category_a_Remove"
            onclick="document.getElementById('category_Remove_1').style.display='';document.getElementById('category_a_Remove').style.display='none';">-
            Expect Category</a><?php }; ?>

        <?php if($category_nn <= 11){ ?><a href="#" class="btn btn-success btn-sm  mr-2  py-1  float-right"
            id="category_a<?php echo $category_nn;?>"
            onclick="document.getElementById('category_<?php echo $category_nn+1;?>').style.display='';document.getElementById('category_a<?php echo $category_nn;?>').style.display='none';">+
            Add category</a><?php }; ?> </td>
</tr>
<?php
};
//End categories


//categories Remove
$category_Remove_nn = 0;
function select_name_category_Remove($name,$view_name){
	global $mysqli,$category_Remove_nn;
	$category_Remove_nn++;
	?>
<tr style="display:none;" class="alert-danger" id="category_Remove_<?php echo $category_Remove_nn;?>">
    <th scope="col"><?php echo $view_name; ?></th>
    <td><select name="Remove_<?php echo $name; ?>" style="width:150px">
            <option value="">&nbsp;</option>
            <?php 
		$sql_course_c = "SELECT * FROM `course_c`";
		$result_course_c = $mysqli -> query($sql_course_c);
		if ($result_course_c && (mysqli_num_rows($result_course_c) > 0)) {
			while ($row_course_c = $result_course_c-> fetch_assoc()){
				?>
            <option value="<?php echo $row_course_c['id']; ?>"><?php echo $row_course_c['name']; ?></option>
            <?php
			}
		}
		?>
        </select> <?php if($category_Remove_nn <= 11){ ?>
        <a href="#" class="btn btn-danger btn-sm  py-1  float-center"
            id="category_a_Remove<?php echo $category_Remove_nn;?>"
            onclick="document.getElementById('category_Remove_<?php echo $category_Remove_nn+1;?>').style.display='';document.getElementById('category_a_Remove<?php echo $category_Remove_nn;?>').style.display='none';">+
            Add Category</a><?php }; ?> </td>
</tr>
<?php
};
//End categories Remove


//Months
$Month_nn = 0;
function select_name_Month($name,$view_name){
	global $mysqli,$Month_nn;
	$Month_nn++;
	?>
<tr style="<?php if($Month_nn !=1){ echo 'display:none'; }else{ echo 'display:compact'; }; ?>"
    id="Month_<?php echo $Month_nn;?>">
    <th scope="col"><?php echo $view_name; ?></th>
    <td>
        <input class="form-control d-inline-block" name="<?php echo $name; ?>" style="width:150px">
        <?php if($Month_nn == 1){ ?><a href="#" class="btn btn-danger btn-sm   py-1  float-right" id="Month_a_Remove"
            onclick="document.getElementById('Month_Remove_1').style.display='';document.getElementById('Month_a_Remove').style.display='none';">-
            Expect Months</a><?php }; ?>
        <?php if($Month_nn <= 11){ ?><a href="#" class="btn btn-success btn-sm mr-2  py-1  float-right"
            id="Month_a<?php echo $Month_nn;?>"
            onclick="document.getElementById('Month_<?php echo $Month_nn+1;?>').style.display='';document.getElementById('Month_a<?php echo $Month_nn;?>').style.display='none';">+
            Add Month</a><?php }; ?></td>
</tr>
<?php
};
//End Months


//Months Remove
$Month_Remove_nn = 0;
function select_name_Month_Remove($name,$view_name){
	global $mysqli,$Month_Remove_nn;
	$Month_Remove_nn++;
	?>
<tr style="display:none;" class="alert-danger" id="Month_Remove_<?php echo $Month_Remove_nn;?>">
    <th scope="col"><?php echo $view_name; ?></th>
    <td><input name="<?php echo $name; ?>" style="width:150px">
        <?php if($Month_Remove_nn <= 11){ ?><a href="#" id="Month_Remove_a<?php echo $Month_Remove_nn;?>"
            class="btn btn-danger btn-sm  py-1  float-center"
            onclick="document.getElementById('Month_Remove_<?php echo $Month_Remove_nn+1;?>').style.display='';document.getElementById('Month_Remove_a<?php echo $Month_Remove_nn;?>').style.display='none';">+
            Add Month_Remove</a><?php }; ?> </td>
</tr>
<?php
};
//End Months Remove

//Year
$Year_nn = 0;
$Year_defult = date('Y');
function select_name_Year($name,$view_name){
	global $mysqli,$Year_nn,$Year_defult;
	$Year_nn++;
	?>
<tr style="<?php if($Year_nn !=1){ echo 'display:none'; }else{ echo 'display:compact'; }; ?>"
    id="Year_<?php echo $Year_nn;?>">
    <th scope="col"><?php echo $view_name; ?></th>
    <td><input class="form-control d-inline-block" name="<?php echo $name; ?>" style="width:150px"
            value="<?php if($Year_nn ==1){ echo $Year_defult;}?>">
        <?php if($Year_nn == 1){ ?><a href="#" class="btn btn-danger btn-sm    py-1  float-right" id="Year_a_Remove"
            onclick="document.getElementById('Year_Remove_1').style.display='';document.getElementById('Year_a_Remove').style.display='none';">-
            Except Year </a><?php }; ?>
        <?php if($Year_nn <= 11){ ?><a href="#" class="btn btn-success mr-2 btn-sm   py-1  float-right"
            id="Year_a<?php echo $Year_nn;?>"
            onclick="document.getElementById('Year_<?php echo $Year_nn+1;?>').style.display='';document.getElementById('Year_a<?php echo $Year_nn;?>').style.display='none';">+
            Add Year</a><?php }; ?> </td>
</tr>
<?php
};
//End Year




//Year Remove
$Year_Remove_nn = 0;
function select_name_Year_Remove($name,$view_name){
	global $mysqli,$Year_Remove_nn;
	$Year_Remove_nn++;
	?>
<tr style="display:none;" class="alert-danger" id="Year_Remove_<?php echo $Year_Remove_nn;?>">
    <th scope="col"><?php echo $view_name; ?></th>
    <td><input name="<?php echo $name; ?>" style="width:150px">
        <?php if($Year_Remove_nn <= 11){ ?><a href="#" id="Year_Remove_a<?php echo $Year_Remove_nn;?>"
            class="btn btn-danger btn-sm  py-1  float-center"
            onclick="document.getElementById('Year_Remove_<?php echo $Year_Remove_nn+1;?>').style.display='';document.getElementById('Year_Remove_a<?php echo $Year_Remove_nn;?>').style.display='none';">+
            Add Year_Remove</a><?php }; ?> </td>
</tr><?php
};
//End Year Remove


?>


<div class="main-content-inner">
    <div class="col-md-6 mt-5">
        <div class="card">
            <div class="card-body short">
                <h1 class="header-title">Training Plane</h1>
                <form action="view_plane/plan_view.php">
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
								select_name_city('city_0','city');
								select_name_city('city_1','&nbsp;');
								select_name_city('city_2','&nbsp;');
								select_name_city('city_3','&nbsp;');
								/*select_name_city('city_4','&nbsp;');
								select_name_city('city_5','&nbsp;');
								select_name_city('city_6','&nbsp;');
								select_name_city('city_7','&nbsp;');
								select_name_city('city_8','&nbsp;');
								select_name_city('city_9','&nbsp;');
								select_name_city('city_10','&nbsp;');
								select_name_city('city_11','&nbsp;');*/
								
								select_name_city_Remove('city_remove_0','Remove city');
								select_name_city_Remove('city_remove_1','&nbsp;');
								select_name_city_Remove('city_remove_2','&nbsp;');
								/*
								select_name_city_Remove('city_remove_3','&nbsp;');
								select_name_city_Remove('city_remove_4','&nbsp;');
								select_name_city_Remove('city_remove_5','&nbsp;');
								select_name_city_Remove('city_remove_6','&nbsp;');
								select_name_city_Remove('city_remove_7','&nbsp;');
								select_name_city_Remove('city_remove_8','&nbsp;');
								select_name_city_Remove('city_remove_9','&nbsp;');
								select_name_city_Remove('city_remove_10','&nbsp;');
								select_name_city_Remove('city_remove_11','&nbsp;');
								*/

								select_name_category('course_c_0','categories	');
								select_name_category('course_c_1','&nbsp;');
								select_name_category('course_c_2','&nbsp;');
								// select_name_category('course_c_3','&nbsp;');
								// select_name_category('course_c_4','&nbsp;');
								// select_name_category('course_c_5','&nbsp;');
								// select_name_category('course_c_6','&nbsp;');
								// select_name_category('course_c_7','&nbsp;');
								// select_name_category('course_c_8','&nbsp;');
								// select_name_category('course_c_9','&nbsp;');
								// select_name_category('course_c_10','&nbsp;');
								// select_name_category('course_c_11','&nbsp;');
								
								select_name_category_Remove('course_c_remove_0','Remove category');
								select_name_category_Remove('course_c_remove_1','&nbsp;');
								select_name_category_Remove('course_c_remove_2','&nbsp;');
								// select_name_category_Remove('course_c_remove_3','&nbsp;');
								// select_name_category_Remove('course_c_remove_4','&nbsp;');
								// select_name_category_Remove('course_c_remove_5','&nbsp;');
								// select_name_category_Remove('course_c_remove_6','&nbsp;');
								// select_name_category_Remove('course_c_remove_7','&nbsp;');
								// select_name_category_Remove('course_c_remove_8','&nbsp;');
								// select_name_category_Remove('course_c_remove_9','&nbsp;');
								// select_name_category_Remove('course_c_remove_10','&nbsp;');
								// select_name_category_Remove('course_c_remove_11','&nbsp;');
								
								
								
								select_name_c_id('c_id_0','RRE');
								select_name_c_id('c_id_1','&nbsp;');
								select_name_c_id('c_id_2','&nbsp;');
								// select_name_c_id('c_id_3','&nbsp;');
								// select_name_c_id('c_id_4','&nbsp;');
								// select_name_c_id('c_id_5','&nbsp;');
								// select_name_c_id('c_id_6','&nbsp;');
								// select_name_c_id('c_id_7','&nbsp;');
								// select_name_c_id('c_id_8','&nbsp;');
								// select_name_c_id('c_id_9','&nbsp;');
								// select_name_c_id('c_id_10','&nbsp;');
								// select_name_c_id('c_id_11','&nbsp;');
								
								select_name_c_id_Remove('c_id_remove_0','Remove c_id');
								select_name_c_id_Remove('c_id_remove_1','&nbsp;');
								select_name_c_id_Remove('c_id_remove_2','&nbsp;');
								// select_name_c_id_Remove('c_id_remove_3','&nbsp;');
								// select_name_c_id_Remove('c_id_remove_4','&nbsp;');
								// select_name_c_id_Remove('c_id_remove_5','&nbsp;');
								// select_name_c_id_Remove('c_id_remove_6','&nbsp;');
								// select_name_c_id_Remove('c_id_remove_7','&nbsp;');
								// select_name_c_id_Remove('c_id_remove_8','&nbsp;');
								// select_name_c_id_Remove('c_id_remove_9','&nbsp;');
								// select_name_c_id_Remove('c_id_remove_10','&nbsp;');
								// select_name_c_id_Remove('c_id_remove_11','&nbsp;');
								
								select_name_Month('Month_0','Month');
								select_name_Month('Month_1','&nbsp;');
								select_name_Month('Month_2','&nbsp;');
								// select_name_Month('Month_3','&nbsp;');
								// select_name_Month('Month_4','&nbsp;');
								// select_name_Month('Month_5','&nbsp;');
								// select_name_Month('Month_6','&nbsp;');
								// select_name_Month('Month_7','&nbsp;');
								// select_name_Month('Month_8','&nbsp;');
								// select_name_Month('Month_9','&nbsp;');
								// select_name_Month('Month_10','&nbsp;');
								// select_name_Month('Month_11','&nbsp;');
								
								select_name_Month_Remove('Month_Remove_0','Remove Month');
								select_name_Month_Remove('Month_Remove_1','&nbsp;');
								select_name_Month_Remove('Month_Remove_2','&nbsp;');
								// select_name_Month_Remove('Month_Remove_3','&nbsp;');
								// select_name_Month_Remove('Month_Remove_4','&nbsp;');
								// select_name_Month_Remove('Month_Remove_5','&nbsp;');
								// select_name_Month_Remove('Month_Remove_6','&nbsp;');
								// select_name_Month_Remove('Month_Remove_7','&nbsp;');
								// select_name_Month_Remove('Month_Remove_8','&nbsp;');
								// select_name_Month_Remove('Month_Remove_9','&nbsp;');
								// select_name_Month_Remove('Month_Remove_10','&nbsp;');
								// select_name_Month_Remove('Month_Remove_11','&nbsp;');
								
								select_name_Year('Year_0','Year');
								select_name_Year('Year_1','Year');
								select_name_Year('Year_2','Year');
								// select_name_Year('Year_3','Year');
								// select_name_Year('Year_4','Year');
								// select_name_Year('Year_5','Year');
								// select_name_Year('Year_6','Year');
								// select_name_Year('Year_7','Year');
								// select_name_Year('Year_8','Year');
								// select_name_Year('Year_9','Year');
								// select_name_Year('Year_10','Year');
								// select_name_Year('Year_11','Year');
								
								select_name_Year_Remove('Year_Remove_0','Remove Year');
								select_name_Year_Remove('Year_Remove_1','&nbsp;');
								select_name_Year_Remove('Year_Remove_2','&nbsp;');
								// select_name_Year_Remove('Year_Remove_3','&nbsp;');
								// select_name_Year_Remove('Year_Remove_4','&nbsp;');
								// select_name_Year_Remove('Year_Remove_5','&nbsp;');
								// select_name_Year_Remove('Year_Remove_6','&nbsp;');
								// select_name_Year_Remove('Year_Remove_7','&nbsp;');
								// select_name_Year_Remove('Year_Remove_8','&nbsp;');
								// select_name_Year_Remove('Year_Remove_9','&nbsp;');
								// select_name_Year_Remove('Year_Remove_10','&nbsp;');
								// select_name_Year_Remove('Year_Remove_11','&nbsp;');
								?>
                                <tr>
                                    <th scope="">view one of</th>
                                    <td><input class="form-control col-4" type="text" name="view_one_of" value="1" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="">View REF</th>
                                    <td><input class="" type="checkbox" name="v_ref" value="1" /></td>
                                </tr>
                                <tr>
                                    <th scope="col">View REF as ()</th>
                                    <td><input type="checkbox" name="v_ref11" value="1" /></td>
                                </tr>
                                <tr>
                                    <th scope="col">View Fees</th>
                                    <td><input type="checkbox" name="v_fees" value="1" /></td>
                                </tr>
                                <tr>
                                    <th scope="col">View Euro symbol</th>
                                    <td><input type="checkbox" name="v_Euro" value="1" /></td>
                                </tr>
                                <tr>
                                    <th scope="col">View Full City Name</th>
                                    <td><input type="checkbox" name="v_full_city" value="1" /></td>
                                </tr>

                                <tr>
                                    <th scope="col">View Year</th>
                                    <td><input type="checkbox" name="v_year" value="1" /></td>
                                </tr>
                                <tr>
                                    <th scope="col">Start Date - End Date</th>
                                    <td><input type="checkbox" name="v_s_e_date" value="1" /></td>
                                </tr>
                                <tr>
                                    <th scope="col">Months Separator</th>
                                    <td><input type="checkbox" name="Month_separator" value="1" /></td>
                                </tr>

                                <tr>
                                    <th scope="col">Format</th>
                                    <td><input class="form-control col-4" type="text" name="format" value="#CI#^#DA#^#NA" /></td>
                                </tr>

                                <tr>
                                    <th scope="col">Max Records</th>
                                    <td><input class="form-control col-4" type="text" name="Max_Records" value="500" />
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <td><input type="submit" name="button" id="button"
                                            class="btn col-5 btn-primary float-right" /></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4 mt-5 sticky-top short">
        <div class="card">
            <div class="card-body" style="border: 2px dashed #c7c7c7">
                <div class="shortcuts">
                    <table class="table table-bordered text-center  border-secondary">
                        <thead>
                            <tr>
                                <th scope="col">shortcuts</th>
                                <th>Explanation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#CI</td>
                                <td>City</td>
                            </tr>
                            <tr>
                                <td>#CC</td>
                                <td>City with contunry</td>
                            </tr>
                            <tr>
                                <td>#CA</td>
                                <td>Category</td>
                            </tr>
                            <tr>
                                <td>#DA</td>
                                <td>Date</td>
                            </tr>
                            <tr>
                                <td>#CY</td>
                                <td>Date With Year</td>
                            </tr>
                            <tr>
                                <td>#RE</td>
                                <td>Ref</td>
                            </tr>
                            <tr>
                                <td>#FE</td>
                                <td>Fees</td>
                            </tr>
                            <tr>
                                <td>#CR</td>
                                <td>Euro Currency</td>
                            </tr>
                            <tr>
                                <td>#NA</td>
                                <td>Corse Name</td>
                            </tr>
                            <tr>
                                <td>#LN</td>
                                <td>Corse Name With Link</td>
                            </tr>
                            <tr>
                                <td>#PD</td>
                                <td>PDF Link</td>
                            </tr>
                            <tr>
                                <td>#^</td>
                                <td>Column Separator</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



<?php 
/**
$a = 55;
$anas = 'D M Y';
echo str_replace('D',$a,$anas);
**/
?>
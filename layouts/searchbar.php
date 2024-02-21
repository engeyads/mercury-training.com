<div id="search" class="py-4 border-bottom-yellow collapse d-md-block no-print">
    <div class="container mt-2">
        <form action="<?php echo $systemUrl;?>index.php" method="get" >
            <div class="row">
                <!-- <input type="hidden" name="page" value="search"> -->
                <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 col-xl-2 mb-2">
                    <div class="form-group">
                        <?php
                            $addedKeyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;
                        ?>
                        <input class="form-control form-control-sm" type="text" id="keyword" name="keyword" placeholder="Search..." aria-label="default input example" value="<?php echo $addedKeyword != null ? $addedKeyword : ''; ?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 col-xl-2 mb-2">
                    <div class="form-group">
                        <?php
                            $selectedCity = isset($_GET['city']) ? $_GET['city'] : null;
                        ?>
                        <select class="form-select form-select-sm" name="city" id="Location" aria-label="Default select example">
                            <option selected value="">City</option>
                            <?php
                                $citiesArray = new CallAPIv3($scope = 'resource=cities&onlyWithEvents=true',$method = 'GET'); 
                            ?>
                            <?php
                            if (isset($citiesArray->result->cities) && (count($citiesArray->result->cities) > 0)) {
                                $cities = $citiesArray->result->cities;
                                usort($cities,function($first,$second){
                                    if (strtolower($first->name) == strtolower($second->name)) {
                                        return 0;
                                    }
                                    return (strtolower($first->name) < strtolower($second->name)) ? -1 : 1;
                                });
                                foreach ($cities as &$value) {                                      
                                ?><option value="<?php echo $value->id; ?>" <?php echo ($selectedCity != null && $selectedCity == $value->id) ? 'selected' : '' ?>><?php echo $value->name; ?></option><?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 mb-2">
                    <div class="form-group">
                        <?php $selectedCategory = isset($_GET['category']) ? $_GET['category'] : null; ?><select class="form-select form-select-sm" name="category" id="category" aria-label="Default select example"><option value="">Category</option><?php
                                $categoriesArray = new CallAPIv3($scope = 'resource=categories',$method = 'GET'); 
                                if (isset($categoriesArray->result->categories) && (count($categoriesArray->result->categories) > 0)) {
                                    $categories = $categoriesArray->result->categories;
                                    ksort($categories);
                                    foreach ($categories as &$value) {
                                            ?><option value="<?php echo $value->id; ?>" <?php echo ($selectedCategory != null && $selectedCategory == $value->id) ? 'selected' : '' ?>><?php echo $value->name; ?></option><?php
                                    }
                                }
                            ?></select></div></div>
                <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 mb-2">
                    <div class="form-group">
                    <?php
                        $thisYear = date('Y');
                        $monthsName = array(
                        '',
                        'January',
                        'February',
                        'March',
                        'April',
                        'May',
                        'June',
                        'July ',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December',
                        );
                        $monthsArray = new CallAPIv3($scope = 'resource=months',$method = 'GET'); 
                        ?>
                            <select class="form-select form-select-sm" name="m" id="Date" aria-label="Default select example">
                                <option selected value="">Month</option>
                                    <?php
                                        if (isset($monthsArray->result->months) && (count($monthsArray->result->months) > 0)) {
                                            foreach ($monthsArray->result->months as &$value) {                                      
                                    ?><option value="<?php echo $value->month; ?>" <?php if(isset($_GET['m']) and $_GET['m'] == $value->month){ ?>selected<?php }?>><?php echo $monthsName[$value->month];
                                        if($value->year != $thisYear){ echo '&nbsp;' . $value->year; } 
                                        ?></option>
                                <?php
                                        }
                                    }
                                ?></select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 mb-2">
                    <div class="form-group">
                        <select class="form-select form-select-sm" aria-label="Default select example" name="numberOfWeeks" id="numberOfWeeks">
                            <option selected value="">Duration</option>
                            <option value="1" <?php if(isset($_GET['numberOfWeeks']) and $_GET['numberOfWeeks'] == 1){ ?>selected<?php }?>>One Week</option>
                            <option value="2" <?php if(isset($_GET['numberOfWeeks']) and $_GET['numberOfWeeks'] == 2){ ?>selected<?php }?>>Two Weeks</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 mb-2">
                    <div class="form-group">
                        <select class="form-select form-select-sm" aria-label="Default select example" name="upcoming" id="upcoming">
                            <option value="false" <?php if(isset($_GET['upcoming']) and $_GET['upcoming'] == 'false'){ ?>selected<?php }?>>All Courses</option>
                            <option value="true" <?php if(isset($_GET['upcoming']) and $_GET['upcoming'] == 'true'){ ?>selected<?php }?>>Only Confirmed</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 mb-2 d-flex justify-content-center justify-content-md-end">
                    <button type="submit" class="btn btn-search p-3 p-md-1 btn-sm w-100">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>


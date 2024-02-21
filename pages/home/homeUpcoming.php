<div class="upcoming-courses-contect mt-3">
    <div class="row">

        <?php
            foreach ($eventsArray->result->events as $value) {
                // $startDate = date_create($value->startDate);
                // $endDate = date_create($value->endDate);
                $link = $systemUrl.$eventPage.'/'.$value->id.'.html';
        ?>
            <div class="col-md-6 mb-2">
                <div class="card cat-card">
                    <div class="card-body" style="min-height: 100px !important;">
                        <h2 class="card-title"><a title="<?php echo $centerName . ' ' . $value->name . ' Course'; ?>" href="<?php echo $link; ?>" class="card-link card-title"><?php echo $value->name; ?></a></h2>
                        <p class="card-text up-info">
                            <span><i class="fa fa-calendar"></i> <?php echo generateEventFormatedDate($value->startDate, $value->endDate) ?></span>
                            <span><i class="fa fa-globe"></i> <?php echo $value->city; ?> </span>
                        </p>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
        <div class="col-md-12 mt-3 text-center">
            <a title="<?php echo $centerName; ?>" href="<?php echo $systemUrl;?>upcoming.html" class="btn btn-primary p-3 p-lg-2 btn-md">More Confirmed Courses ...</a>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="d-block">
      <a href="?page=add_to_plane-empty_SESSION" class="btn btn-block btn-primary m-3"><i class="fa fa-plus" aria-hidden="true"></i> Add <?php echo date('Y')+1; ?> Plane</a>
    </div>
  </div>


  <div class="col-12">
    <div class="d-block">
      <a href="?page=add_to_plane-tempCourseCheck" class="btn btn-block btn-primary m-3">Temp Course Check</a>
    </div>
  </div>

  <?php if(!empty($_SESSION['sum_x_class_A'])){ ?>
  <div class="col-12">
    <div class="d-block">
      <a href="?page=add_to_plane-add_plan_step1" class="btn btn-block btn-primary m-3">Continuo</a>
    </div>
  </div>
  
  <?php }?>
  
</div>



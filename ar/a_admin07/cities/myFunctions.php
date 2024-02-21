<?php
function viewPageEdit(){
	global $table,$id;
	?><a href="?page=<?php echo $table; ?>-edit&id=<?php echo $id ;?>"><i class="fa fa-edit"></i></a><?php	
}


function viewPageDelet(){
	global $table,$id,$tableNAme;
	
	?>
<button class="button-del" type="button" data-toggle="modal" data-target="#exampleModal<?php echo $id ;?>"><i class="ti-trash text-danger"></i></button>
    <div class="modal fade" id="exampleModal<?php echo $id ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delet <?php echo $tableNAme; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-danger">
          Are you sure you want to delete
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
          <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=<?php echo $table; ?>-del&amp;id=<?php echo $id ;?>">Yes</a></span>
        </div>
      </div>
    </div>
    </div>
	<?php
}
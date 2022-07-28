<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Category 
        <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard" ></i> Home   </a></li>
            <li class="active"> / Data Category</li>
        </ol>
    </section>
    <section class="content">
        <button class="btn btn-primary mb-3"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add Category</button>
        <div class="table-responsive">
        <table class="table">
        <tr class="text-center">
            <th>No</th>  
            <th>Name</th>
            <th>Date Create</th>
            <th>Status</th>
            <th colspan="2" width="15%">Aksi</th>
        </tr>
        <?php
        $no = 1;
         foreach ($category as $pdc ) :  
         ?>
            <tr class="text-center">
                <td><?=$no++?></td>
                <td><?=$pdc['name']?></td>
                <td><?=$pdc['date_create']?></td>
                <?php if ($pdc['active'] > 0) { ?>
                    <td><button type="button" class="btn btn-sm btn-success">Active</button></td>
                <?php }else{ ?>
                    <td><button type="button" class="btn btn-sm btn-danger">No Active</button></td>
                    <?php } ?>
                    <td onclick="javascript: return confirm('are you sure to delete this product?')"><?php echo anchor('admin/delete2/'.$pdc['id_category'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                    <td><?php echo anchor('admin/update_category/'.$pdc['id_category'], '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></div>') ?></td>
                    
            </tr>
            <?php endforeach;?>
     </table>
        </div>
    </section>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="http://localhost:8080/Belajar-ci3/index.php/admin/add_category" method="post" enctype="multipart/form-data">
            <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="nama" class="form-control" placeholder="Category Name" required>
                            </div>
                            <div class="modal-footer">
        <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add Category</button>
      </div>
        </form>
      </div>

    </div>
  </div>
</div>
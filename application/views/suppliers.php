<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Suppliers 
        <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard" ></i> Home   </a></li>
            <li class="active"> / Data Suppliers </li>
        </ol>
    </section>
    <section class="content">
        <button class="btn btn-primary mb-3"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add Supplier</button>
        <div class="table-responsive">
        <table class="table">
        <tr class="text-center">
            <th>No</th>  
            <th>Supplier Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        $no = 1;
         foreach ($suppliers as $supplier ) :  
         ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$supplier['supplier_name']?></td>
                <td><?=$supplier['address']?></td>
                <td><?=$supplier['phone']?></td>
                    <td onclick="javascript: return confirm('are you sure to delete this supplier?')"><?php echo anchor('admin/delete_supp/'.$supplier['id_suppliers'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                    <td><?php echo anchor('admin/update_suppliers/'.$supplier['id_suppliers'], '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></div>') ?></td>
                    
            </tr>
            <?php endforeach;?>
     </table>
        </div>
    </section>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Add Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="http://localhost:8080/Belajar-ci3/index.php/admin/add_suppliers" method="post" enctype="multipart/form-data">
            <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label>Supplier Name</label>
                                <input type="text" name="nama" class="form-control" placeholder="Supplier Name" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" placeholder="Address" ></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="phone" class="form-control" value="62" placeholder="Phone" required>
                            </div>
                            </div>

                                
                            <div class="modal-footer">
        <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add Supplier</button>
      </div>
        </form>
      </div>

    </div>
  </div>
</div>

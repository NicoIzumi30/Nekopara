<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Update Suppliers
        <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard" ></i> Home   </a></li>
            <li> / Data Suppliers</li>
            <li class="active"> / Update Suppliers</li>
        </ol>
    </section>
    <section class="content">
        <?php foreach($suppliers as $pdc ) : ?>
        <div class="card mb-3 m-3">
    <div class="card-header">
        <i class="fas fa-table"></i> Update Suppliers</div>
        <div class="col-md-7">
            <div class="card-body">
    <form action="http://localhost:8080/Belajar-ci3/index.php/admin/update_suppliers2" method="post" enctype="multipart/form-data">
            <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label>Suppliers Name</label>
                                <input type="text" name="supp_name" class="form-control" placeholder="Suppliers Name" value="<?=$pdc['supplier_name']?>" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" placeholder="Address" ><?=$pdc['address']?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="phone" class="form-control" placeholder="Phone" value="<?=$pdc['phone']?>" required>
                            </div>
                            
                            
                            <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      <input type="hidden"  id="id"  name="id"  value="<?=$pdc['id_suppliers']?>">
      
        </form>
        </div>
    </div>
 </div>
 <?php endforeach ?>
    </section>
                
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Update Category
        <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard" ></i> Home   </a></li>
            <li> / Data Category</li>
            <li class="active"> / Update Category</li>
        </ol>
    </section>
    <section class="content">
        <?php foreach($category as $pdc ) : ?>
        <div class="card mb-3 m-3">
    <div class="card-header">
        <i class="fas fa-table"></i> Update Category</div>
        <div class="col-md-7">
            <div class="card-body">
    <form action="http://localhost:8080/Belajar-ci3/index.php/admin/update_category2" method="post" enctype="multipart/form-data">
            <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label>Name Category</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Category" value="<?=$pdc['name']?>" required>
                            </div>
                            <?php if($pdc['active'] > 0) { ?>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" >
                                    <option value="1">Active</option>
                                    <option value="0"> No Active</option>
                                </select>
                     </div>
                     <?php }else{ ?>
                        <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" >
                                    <option value="0"> No Active</option>
                                    <option value="1">Active</option>
                                </select>
                     </div>
                    <?php }?>
                            <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      <input type="hidden"  id="id"  name="id"  value="<?=$pdc['id_category']?>">
      
        </form>
        </div>
    </div>
 </div>
 <?php endforeach ?>
    </section>
                
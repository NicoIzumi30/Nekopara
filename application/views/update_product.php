<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Update Product 
        <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard" ></i> Home   </a></li>
            <li> / Data Produk</li>
            <li class="active"> / Update Produk</li>
        </ol>
    </section>
    <section class="content">
        <?php foreach($product as $pdc ) : ?>
        <div class="card mb-3 m-3">
    <div class="card-header">
        <i class="fas fa-table"></i> Update Product</div>
        <div class="col-md-7">
            <div class="card-body">
    <form action="http://localhost:8080/Belajar-ci3/index.php/admin/update" method="post" enctype="multipart/form-data">
            <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Product</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Product" value="<?=$pdc['name']?>" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" placeholder="Description" ><?=$pdc['description']?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
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
                            <?php 
                            $idc = $pdc['id_category'];
                                $data2 = $this->m_product->get_category($idc)->result_array();
                            $ids = $pdc['id_suppliers'];
                            $data3 = $this->m_product->get_suppliers($ids)->result_array();
                            $data4 = $this->m_product->suppliers();
                            ?>
                            <div class="form-group">
                                <label>Category Product</label>
                                <select name="category" class="form-control" required>
                                <option value="<?= $data2[0]['id_category']; ?>" ><?= $data2[0]['name']; ?></option>
                                <?php 
                                  $data6 = $this->m_product->category();
                                  foreach($data6 as $dat6) :
                                  ?>
                                  <option value="<?= $dat6['id_category'];?>"><?= $dat6['name']; ?></option>
                                  <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Supplier</label>
                                <select name="suppliers" class="form-control" required>
                                  <option value="<?= $data3[0]['id_suppliers']; ?>"><?= $data3[0]['supplier_name']; ?></option>
                                  <?php 
                                  $data4 = $this->m_product->suppliers();
                                  foreach($data4 as $dat4) :
                                  ?>
                                  <option value="<?= $dat4['id_suppliers'];?>"><?= $dat4['supplier_name']; ?></option>
                                  <?php endforeach ?>
                                </select>
                            </div>
                            <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      <input type="hidden"  id="old"  name="old"  value="<?=$pdc['image']?>">
      <input type="hidden"  id="id"  name="id"  value="<?=$pdc['id_product']?>">
      
        </form>
        </div>
    </div>
 </div>
 <?php endforeach ?>
    </section>
                
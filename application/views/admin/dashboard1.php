  
  <div class="content-wrapper">
    <section class="content container-fluid">
    	<div class="row">
    		<div class="col-md-12">
                <?php if($this->session->flashdata('info')) { ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                    <?= $this->session->flashdata('info');?>
                </div>
                <?php } ?>
                <div class="box">
                    <div class="box-header width-border"></div>
                    <div class="box-body">
                        <div id="container" class="mb-5"></div>
                    </div>
                </div>
    			<div class="box">
    				<div class="box-header width-border">
    					<h3 class="box-title">
    						Daftar Kecamatan Terdampak COVID 19 Jepara
    					</h3>
    				</div>
    				<div class="box-body">
    					<table class="table table-bordered">
    						<thead>
    							<th>No</th>
    							<th>Nama Kecamatan</th>
    							<th>PP</th>
    							<th>ODP</th>
                                <th>OTG</th>
                                <th>PDP</th>
                                 <th>POSITIF</th>
                                 <th>aksi</th>
    						</thead>
    						<tbody>
    							<?php $no=1; foreach ($datacorona as $dc) {?>
    							<tr>
    								<td><?php echo $no++?></td>
    								<td><?php echo $dc->kecamatan?></td>
    								<td><?php echo $dc->pp?></td>
    								<td><?php echo $dc->odp?></td>
                                    <td><?php echo $dc->otg?></td>
                                    <td><?php echo $dc->pdp?></td>
                                    <td><?php echo $dc->positif?></td>
                                    
    								<td>
    									<button class="btn btn-warning" data-toggle="modal" data-target="#modaledit<?= $dc->id;?>"><i class="fa fa-pencil"></i></button>
    									<a href="<?= base_url('Dashboard/hapus/') ; ?><?= $dc->id ; ?>" class="btn btn-danger" onclick= "return confirm('yakin ingin menghapus barang'); " ><i class="glyphicon glyphicon-trash"></i></a>
    								</td>
    							</tr>
    							<?php } ?>
    						</tbody>
    					</table>
    				</div>
    			</div>
    			<button class="btn btn-primary" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"> Tambah Kecamatan</i></i></button>
                <form method="POST" action="<?php echo base_url('dashboard/unggah')?>" enctype="multipart/form-data" class="pull-right">
                    <input type="file" name="file"><br>
                    <button class="btn btn-default" type="submit">Unggah</button>
                </form>
    		</div>
    	</div>
    </section>
  </div>

  <div class="modal fade" id="modaltambah" >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Kecamatan Terdampak Covid 19</h4>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('dashboard/tambah') ;?>" method="post">
                
                <div class="form-group">
                    <label for="kecamatan">KECAMATAN</label>
                    <input type="text"  name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan " required>
                </div>
                <div class="form-group">
                    <label for="pp">PP</label>
                    <input type="number" name="kategori" class="form-control" id="pp" placeholder="Pp"  required>
                </div>
                <div class="form-group">
                    <label for="odp">ODP</label>
                    <input type="number"  name="odp" class="form-control" id="odp" placeholder="Odp "  required>
                </div>
                <div class="form-group">
                    <label for="otg">OTG</label>
                    <input type="number"  name="otg" class="form-control" id="otg" placeholder="Otg "  required>
                </div>
                <div class="form-group">
                    <label for="pdp">PDP</label>
                    <input type="number"  name="pdp" class="form-control" id="pdp" placeholder="Pdp "  required>
                </div>
                <div class="form-group">
                    <label for="positif">POSITIF</label>
                    <input type="number"  name="positif" class="form-control" id="positif" placeholder="Positif "  required>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<?php foreach ($datacorona as $dc) { ?>
<div class="modal fade" id="modaledit<?php echo $dc->id ?>" >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Data</h4>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('dashboard/update') ;?>" method="post">

                <div class="form-group">
                    <label for="kecamatan">KECAMATAN</label>
                    <input type="text" value="<?php echo $dc->kecamatan ?>" name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan " value="<?= $dc->kecamatan ;?>" required>
                </div>
                <div class="form-group">
                    <label for="pp">PP</label>
                    <input type="text" value="<?php echo $dc->pp ?>" name="kategori" class="form-control" id="pp" placeholder="Kategori" value="<?= $dc->pp ;?>" required>
                </div>
                <div class="form-group">
                    <label for="odp">ODP</label>
                    <input type="text" value="<?php echo $dc->odp ?>" name="odp" class="form-control" id="odp" placeholder="Odp " value="<?= $dc->odp ;?>" required>
                </div>
                <div class="form-group">
                    <label for="otg">OTG</label>
                    <input type="text" value="<?php echo $dc->otg ?>" name="otg" class="form-control" id="otg" placeholder="Otg " value="<?= $dc->otg ;?>" required>
                </div>
                <div class="form-group">
                    <label for="pdp">PDP</label>
                    <input type="text" value="<?php echo $dc->pdp?>" name="pdp" class="form-control" id="pdp" placeholder="Pdp " value="<?= $dc->pdp ;?>" required>
                </div>
                <div class="form-group">
                    <label for="positif">POSITIF</label>
                    <input type="text" value="<?php echo $dc->positif ?>" name="positif" class="form-control" id="positif" placeholder="Posotif " value="<?= $dc->positif ;?>" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
     <!-- /.modal-content -->
 </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
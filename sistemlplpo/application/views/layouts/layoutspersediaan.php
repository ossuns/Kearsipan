<?php $this->load->view('layouts/header'); ?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <?php echo $contents; ?>
                <?php $this->load->view('persediaan/persediaan_dropdown2'); ?>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('layouts/footer'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Bioskop</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/fa/css/font-awesome.css">
  <!--Iconnya-->
  <link rel="shortcut icon" href="<?php echo base_url('/Assets/Admin/dist/img/logo.ico');?>"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/ion/css/ionicons.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/datatables/dataTables.bootstrap.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/skins/_all-skins.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('Manager/header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=$this->session->userdata('picture');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('nama');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?=$this->session->userdata('level');?></a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-file-video-o" aria-hidden="true"></i> <span>Movie Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?=base_url('Manager/tambah_movie')?>"><i class="fa fa-circle-o"></i> Movie CRUD</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> laporan
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-calendar-o" aria-hidden="true"></i> Laporan Harian</a></li>
              </ul>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-calendar-o" aria-hidden="true"></i> Laporan Bulananan</a></li>
              </ul>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-calendar-o" aria-hidden="true"></i> Laporan Tahunan</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money" aria-hidden="true"></i>
            <span>Transaksi Keuangan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('Manager/Transaksi');?>"><i class="fa fa-circle-o"></i> All Transaction</a></li>
            <li><a href="<?=base_url('Manager/PTransaksi')?>"><i class="fa fa-circle-o"></i> Pending Transaction</a></li>
          </ul>
        </li>
        <li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Movie Management
        <small>CRUD</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-5">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Input masks</h3>
            </div>
            <div class="box-body">
            <?=$this->session->flashdata('pemberitahuan')?>
            <?=form_open('Movie/update')?>
            <?php foreach ($data_edit as $datasaya) {?>

              <div class="form-group">
                <label>Nama Film</label>
                <input type="hidden" name="id_movie" class="form-control" value="<?=$datasaya->id_movie?>" required/>
                <input type="text" placeholder="Berikan Judul Film" name="nama_film" value="<?=$datasaya->nama_film?>" class="form-control" required/>
              </div>

             
              <div class="form-group">
                <label>Bioskop</label>
                <?php
                    echo "
                    <select name='id_bioskop' class='form-control select2' required >
                    <option value='' disabled selected>Pilih ID</option>";
                    foreach ($bioskop->result() as $bs) {
                      if( $bs->id_bioskop == $datasaya->id_bioskop )
                        $s = 'selected';
                      else
                        $s = '';
                      
                      echo "<option value='".$bs->id_bioskop."' $s>".$bs->nama_bioskop."</option>";
                    }
                    echo"
                    </select>";
                    ?>
              </div> 

               <div class="form-group">
                <label>Jadwal Pemutaran</label>
                <?php
                    echo "
                    <select name='id_jadwal' class='form-control select2' required >
                    <option value='' disabled selected>Sesuaikan Jadwal</option>";
                    foreach ($jadwal->result() as $jdw) {
                      if( $jdw->id_jadwal == $datasaya->id_jadwal )
                        $s = 'selected';
                      else
                        $s = '';
                      
                      echo "<option value='".$jdw->id_jadwal."' $s>".$jdw->jam."</option>";
                    }
                    echo"
                    </select>";
                    ?>
              </div>

              <div class="form-group">
                <label>Harga Movie</label>
                <input type="number" placeholder="Masukkan Harga dengan format angka" onkeypress='validate(event)' name="harga" value="<?=$datasaya->harga;?>" class="form-control" required/>
              </div>

               <div class="form-group">
                <label>Kategori Film</label>
                <?php echo form_dropdown('kategori[]', $this->db->enum_select('movie','kategori'),$datasaya->kategori,'class="form-control select2" style="width: 100%;" required');?>
              <!-- Color Picker -->
              </div>

              <div class="form-group">
                <label>Kuota</label>
                <input type="number" value="<?=$datasaya->kuota?>" style="width=20%" onkeypress='validate(event)' name="kuota" class="form-control" required/>
              </div>

              <div class="form-group">
              <label>Sinopsis Film</label>
               <div class="box-body pad">
                  <textarea id="sinopsis" name="sinopsis" rows="10" cols="80" required=>
                   <?=$datasaya->sinopsis?>
                  </textarea>
              </div>
              </div>

            <?php } ?>
             <?=form_submit('Simpan','Simpan','class="btn btn-primary"')?>
              <!-- /.form group -->
              <?=form_close()?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
        <div class="col-md-7">

          <!-- iCheck -->
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title"><b>List of movies</b> you've ever added</h3>
            </div>
            <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama Film</th>
                  <th>Bioskop</th>
                  <th>Jam</th>
                  <th>Act</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php foreach($movie_list->result() as $m){ ?>
                  <td><?=$m->id_movie?></td>
                  <td><?=$m->nama_film?></td>
                  <td><?=$m->nama_bioskop?></td>
                  <td><?=$m->jam?></td>
                  <td>
                 <a href="<?= base_url() ?>inventaris/Hapus_ALat/<?= $m->id_movie ?>" onclick="javascript:return confirm('Anda Yakin?')"><button type="button" class="btn btn-success btn-xs"><span class='glyphicon glyphicon-zoom-in'></span></button>
                  </a>
                  &nbsp;
                    <a href="<?= base_url() ?>Movie/edit/<?= $m->id_movie ?>"><button type="button" class="btn btn-info btn-xs"><span class='glyphicon glyphicon-pencil'></span></button></a> &nbsp;

                  <a href="<?= base_url() ?>Movie/delete/<?= $m->id_movie ?>" onclick="javascript:return confirm('Anda Yakin?')"><button type="button" class="btn btn-danger btn-xs"><span class='glyphicon glyphicon-trash'></span></button>
                  </a>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
             
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              Jika terjadi kesalahan data konfirmasi ke admin pusat <a href="">Documentation</a>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('Manager/footer');?>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url()?>Assets/Admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>Assets/Admin/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>Assets/Admin/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url()?>Assets/Admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?=base_url()?>Assets/Admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?=base_url()?>Assets/Admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?=base_url()?>Assets/Admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url()?>Assets/Admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?=base_url()?>Assets/Admin/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?=base_url()?>Assets/Admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?=base_url()?>Assets/Admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?=base_url()?>Assets/Admin/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>Assets/Admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>Assets/Admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>Assets/Admin/dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="<?=base_url()?>Assets/Admin/plugins/ckeditor/ckeditor.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>Assets/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>Assets/Admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>

<script type="text/javascript">
  function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>


<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });

    CKEDITOR.replace('sinopsis');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
</body>
</html>
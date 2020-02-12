<section class="content-header"></section>
<section class="content">
  <?php if($this->session->userdata('level') == 1): ?>
  <div class="box box-primary">
    <div class="box-body">
      <center><h1 style="padding-top: 170px; padding-bottom: 180px" class="text-primary">Welcome Admin!</h1></center>
    </div>
  </div>
  <?php endif ?>
  <?php if($this->session->userdata('level') == 2): ?>
  <div class="box box-success">
    <div class="box-body">
      <center><h1 style="padding-top: 170px; padding-bottom: 180px" class="text-success">Welcome Dewan!</h1></center>
    </div>
  </div>
  <?php endif ?>
</section>
<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Dashboard</h1>
</div>
</section>

<section class="content">
<div class="container-fluid">

<div class="card">
<div class="card-body">

<h3>Selamat Datang di SI CA 24</h3>

<hr>

<p><b>Username:</b> <?= $username; ?></p>
<p><b>Role:</b> <?= $role; ?></p>

</div>
</div>

</div>
</section>

</div>

<?php $this->load->view('templates/footer'); ?>
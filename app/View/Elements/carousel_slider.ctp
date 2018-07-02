<?php 

?>
<div id="carousel-example-generic" class="carousel slide add_slider" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
	      <img src="<?php echo  $this->Html->url('/') ?>images/add.png" alt="" />
	    </div>
	    <div class="item">
	      <img src="<?php echo  $this->Html->url('/') ?>images/add-2.png" alt="" />
	    </div>
        <div class="item">
	      <img src="<?php echo  $this->Html->url('/') ?>images/add-3.png" alt="" />
	    </div>
        <div class="item">
	      <img src="<?php echo  $this->Html->url('/') ?>images/add-4.png" alt="" />
	    </div>
	  </div>
</div>
<style>
.bx-wrapper .bx-prev {
    background: rgba(0, 0, 0, 0) url("<?php echo $this->webroot; ?>images/controls.png") no-repeat scroll 0 -32px !important;
}
.bx-wrapper .bx-next {
    background: rgba(0, 0, 0, 0) url("<?php echo $this->webroot; ?>images/controls.png") no-repeat scroll -43px -32px !important;
}
</style>

<?php //pr($contents); exit; ?>
<?php //echo $this->element('admin_sidebar'); ?>
 <link href="<?php echo $this->webroot;?>admin_styles/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="<?php echo $this->webroot;?>admin_styles/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo $this->webroot;?>admin_styles/js/data-tables/DT_bootstrap.css" />
<!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Faqs
        </header>
        <div class="panel-body">
        <div class="adv-table">
            
            <div class="btn-group btn-group-sm pull-right">
					<a id="style-hover" class="btn btn-primary gap_up gap_up_down" title="" data-toggle="tooltip" href="<?php echo $this->webroot; ?>admin/faqs/add" data-original-title="Add New Category">Add New</a>
				</div>
        <table  class="display table table-bordered table-striped" id="dynamic-table">
            
        <thead>
            
       <!-- <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th class="hidden-phone">Engine version</th>
            <th class="hidden-phone">CSS grade</th>
        </tr>-->
	<tr>
			<th>ID</th>
			<th>Type</th>
			<th>Title</th>
			<th class="actions">Actions</th>
	</tr>
        </thead>
        <tbody>
	<?php foreach ($faqs as $faq): ?>
	<tr class="gradeX">
		<td><?php echo h($faq['Faq']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo h($faq['FaqCategory']['name']); ?>
                    
                </td>
		<td><?php echo h($faq['Faq']['title']);?></td>
		<td class="actions">
			
                        <div class="btn-group btn-group-sm">  



                            <a href="javascript:void(0);" onclick="edit(<?php echo $faq['Faq']['id'];?>)" class="btn btn-info enable-tooltip" data-original-title="Manage Account"><i class="fa fa-sign-in"></i></a>

                            <a href="javascript:void(0);" onclick="del(<?php echo $faq['Faq']['id'];?>)" class="btn btn-danger enable-tooltip" data-original-title="Delete Record"><i class="fa fa-times"></i></a>

                        </div>

		</td>
	</tr>
	<?php endforeach; ?>
        </tbody>
        </table>

        </div>
        </div>
      </section>
    </div>
  </div>
</div>
<!--dynamic table-->
<?php if($faqs){ ?>
<script type="text/javascript" language="javascript" src="<?php echo $this->webroot;?>admin_styles/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot;?>admin_styles/js/data-tables/DT_bootstrap.js"></script>
<!--dynamic table initialization -->
<script src="<?php echo $this->webroot;?>admin_styles/js/dynamic_table_init.js"></script>
<!--body wrapper end-->
<?php } ?>

<script>


function del(aa){
  var a =confirm("Are you sure, you want to delete this?");
  
  
      if (a ==true)
      {
        location.href="<?php echo $this->webroot?>admin/faqs/delete/"+aa;
      }else{
          location.href="<?php echo $this->webroot?>admin/faqs/";
          }
}




function edit(aa) {

       // var a = confirm("Are you sure, you want to edit?")
       
            location.href = "<?php echo $this->webroot?>admin/faqs/edit/" + aa;
       
    }
  
 
</script>
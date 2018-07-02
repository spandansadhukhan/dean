<link href="<?php echo $this->webroot; ?>css/dropzone.css" rel="stylesheet">
<script src="<?php echo $this->webroot; ?>js/dropzone.js"></script>
<link href="<?php echo($this->webroot)?>admin_styles/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
<link href="<?php echo($this->webroot)?>admin_styles/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo($this->webroot)?>admin_styles/js/data-tables/DT_bootstrap.css" />
<?php
#pr($productimages);
?>
<div class="span9" id="content">
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><?php echo __('Upload Product Images'); ?></div>
            </div>
            <div class="image_upload_div" style="margin-top: 14px;margin-left: 25px;">
                <form action="<?php echo $this->webroot; ?>admin/users/uploadProduct/<?php echo $pid; ?>" class="dropzone">
                </form>
            </div> 

			<?php 
			if(!empty($productimages)){
			?>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table table-hover" id="dynamic-table">
                        <thead>
                            <tr>
                                <th><?php echo $this->Paginator->sort('id'); ?></th>
                                <th>Image</th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
					<?php foreach ($productimages as $product): ?>
                            <tr>
                                <td><?php echo h($product['ProductImage']['id']); ?>&nbsp;</td>
                                <td>
                                    <img height="100" width="100" src="<?php echo($this->webroot)?>product_img/<?php echo($product['ProductImage']['image']);?>"/>
                                <td class="actions"> 
                                    <a href="<?php echo $this->webroot;?>admin/users/imagedelete/<?php echo $product['ProductImage']['id'];?>"><img src="<?php echo $this->webroot;?>img/delete.png" title="Delete Product Image" width="24" height="24"></a>
                                </td>
                            </tr>

                                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

			<?php } ?>
        </div>
    </div>
</div>

<script type="text/javascript" language="javascript" src="<?php echo($this->webroot)?>admin_styles/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo($this->webroot)?>admin_styles/js/data-tables/DT_bootstrap.js"></script>
<!--dynamic table initialization -->
<script src="<?php echo($this->webroot)?>admin_styles/js/dynamic_table_init.js"></script>

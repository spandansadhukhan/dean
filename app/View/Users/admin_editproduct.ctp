<?php ?>

<div class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading"> Add Product </header>
                <div class="panel-body">
                    <div class="form"> <?php echo $this->Form->create('Product',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-form')); ?>

                        <?php echo $this->Form->input('id',array('label'=>false,'class'=>'form-control','type'=>'hidden')); ?>



                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Category <span style="color:red;">*</span></label>
                            <div class="col-lg-10"> <?php echo $this->Form->input('product_category_id',array('empty'=>'Choose Product Category','label'=>false,'div'=>false,'options'=>$category, 'class'=>'form-control','id'=>'ProductUserId','required'=>'required')); ?> </div>
                        </div>

                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Product Code <span style="color:red;">*</span></label>
                            <div class="col-lg-10"> <?php echo $this->Form->input('code',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Code')); ?> </div>
                        </div>



                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Name <span style="color:red;">*</span></label>
                            <div class="col-lg-10"> <?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Name')); ?> </div>
                        </div>


                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Description <span style="color:red;">*</span></label>
                            <div class="col-lg-10"> <?php echo $this->Form->input('description',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Description')); ?> </div>
                        </div>

                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Price <span style="color:red;">*</span></label>
                            <div class="col-lg-10"> <?php echo $this->Form->input('price',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Price')); ?> </div>
                        </div>

                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Quantity <span style="color:red;">*</span></label>
                            <div class="col-lg-10"> <?php echo $this->Form->input('quan',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Quantity')); ?> </div>
                        </div>




                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-default" type="reset">Cancel</button>
                            </div>
                        </div>
          <?php 
					echo $this->Form->end();
				?>
                    </div>
                </div>
                <!--</form>-->
        </div>
    </div>
</section>
</div>
</div>
</div>
<!--body wrapper end-->

<style>
    .btn-file > input {
        cursor: pointer;
        direction: ltr;
        font-size: 23px;
        margin: 0;
        opacity: 0;
        position: absolute;
        right: 0;
        top: 0;
        transform: translate(-300px, 0px) scale(4);
    } 
    input[type="file"] {
        padding-top: 7px;
    }
    .btn-primary.btn-alt {
        background-color: #ffffff;
        color: #1bbae1;
    }
    .btn-primary:hover
    {
        background-color: #1bbae1;
        border-color: #1593b3;
        color: #ffffff;
    }
</style>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
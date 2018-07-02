<div class="row">
    <div class="col-lg-12">
        <div class="maintitle">
                <h3><?php echo isset($title_for_layout)?$title_for_layout:''; ?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-sm-12 center-div">
        <?php echo isset($pagename[0]['Content']['content'])?$pagename[0]['Content']['content']:''; ?>
    </div>
</div>

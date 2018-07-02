
<section id="contentsection">
    <div id="wait-div" class="wait-div">
        <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                    Please wait    ....</span> </span> </div>
    </div>
    <div class="col-left">
        <section id="wrapper">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <h2 class="title">
                            <?php echo $content['Content']['page_heading'];?>        </h2>
                        <div class="clr"></div>
                        <div class="content-static">
                            <p>
                            </p><div>
                                <div class="lc">
                                    <p><strong><?php echo $content['Content']['page_heading'];?></strong></p>
                                    <p><?php echo $content['Content']['content'];?></p>

                                </div>

                               
                            </div>

                        </div>
                        <div class="clr"></div>
                    </section>
                </section>
            </section>
        </section>
    </div>
      <div class="col-right">
      <?php echo $this->element('user_banner'); ?>  
    </div>
</section>
<div class="clr"></div>
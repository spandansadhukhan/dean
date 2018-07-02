<?php ?>
<?php echo $this->element('banner');?>
<section id="contentsection">
<?php echo $this->element('carousel_slider');?>
    <div id="wait-div" class="wait-div">
         <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                    Please wait    ....</span> </span> </div>
    </div>

    <div class="col-left">
           <script type="text/javascript" src="<?php echo  $this->Html->url('/') ?>js/highlight.pack.js"></script>
        <script type="text/javascript" src="<?php echo  $this->Html->url('/') ?>js/jquery.cookie.js"></script><!--required only if using cookies-->
        <script type="text/javascript" src="<?php echo  $this->Html->url('/') ?>js/jquery.accordion.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {

                //syntax highlighter
                hljs.tabReplace = '';
                hljs.initHighlightingOnLoad();

                $.fn.slideFadeToggle = function (speed, easing, callback) {
                    return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
                };

                //accordion
                $('.accordion').accordion({
                    cookieName: 'accordion_nav',
                    speed: 'slow',
                    animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
                        elem.next().stop(true, true).slideFadeToggle(opts.speed);
                    },
                    animateClose: function (elem, opts) { //replace the standard slideDown with custom function
                        elem.next().stop(true, true).slideFadeToggle(opts.speed);
                    }
                });

                $(".showFaq_type").click(function () {

                    var values = $("input[name=faq_type]:checked").val();
                    var numRowsAll = $('.show_All').length;
                    var numRowsCus = $('.show_Customers').length;
                    var numRowsAdv = $('.show_Advertisers').length;

                    $('#no-record').slideUp('slow');
                    if (values == "Advertisers")
                    {
                        $('.show_All').slideUp('slow');
                        $('.show_Customers').slideUp('slow');
                        $('.show_Advertisers').slideDown('slow');
                        if (numRowsAdv == 0)
                            $('#no-record').slideDown('slow');
                    } else if (values == "Customers")
                    {
                        $('.show_Advertisers').slideUp('slow');
                        $('.show_All').slideUp('slow');
                        $('.show_Customers').slideDown('slow');
                        if (numRowsCus == 0)
                            $('#no-record').slideDown('slow');
                    } else
                    {
                        $('.show_All').slideDown('slow');
                        $('.show_Advertisers').slideDown('slow');
                        $('.show_Customers').slideDown('slow');
                        if (numRowsAll == 0 && numRowsCus == 0 && numRowsAdv == 0)
                            $('#no-record').slideDown('slow');
                    }

                });

            });


        </script>
        <section id="wrapper">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <section id="searchResult" class="maintitle">
                            <h1>
                                Advertisement FAQ's          </h1>
<!--                            <div class="smart-forms smart-container faq-tc">
                                <form method="post" action="" id="form-ui">
                                    <div class="colm colm4">
                                        <div class="option-group field">
                                            <label class="option block spacer-t10" >
                                                <input type="radio" class="showFaq_type" name="faq_type" value="All" checked="checked">
                                                <span class="checkbox" ></span>
                                                All                  </label>

                                            <label class="option block spacer-t10">
                                                <input type="radio" class="showFaq_type" name="faq_type" value="Advertisers">
                                                <span class="checkbox" ></span>
                                                Advertisers FAQ                  </label>
                                            <label class="option block spacer-t10" >
                                                <input type="radio" class="showFaq_type" name="faq_type" value="Customers">
                                                <span class="checkbox" ></span>
                                                Customers FAQ                  </label>
                                        </div>
                                         end .option-group section 

                                    </div>
                                     end .colm section 
                                </form>
                            </div>-->
                            <div class="clr"></div>
                        </section>
                        <div class="clr"></div>
                        <section class="pin-wrapper">
                            <div class="dt-content-blogs">
                                <?php
                                if(!empty($faqs))
                                {
                                ?>
                                <div class="in-content">
                                    <?php
                                    foreach ($faqs as $faq)
                                    {
                                    ?>
                                    <div class="show_Customers">
                                        <div class="accordion accordion-close" id="section2">
                                            <?php echo $faq['Faq']['title']; ?>?<span></span></div>
                                        <div style="display: none;" class="acc-container">
                                            <div class="content">
                                                <?php echo $faq['Faq']['description']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                    
                                    
                                </div>
                                <?php }else{?>
                                <div id="no-record" class="no-record" >
                                        No FAQ Found              
                                </div>
                                <?php }?>
                            </div>
<!--                           Temporary Display none-->
                            <section class="dt-content-blogs-right" style=" display:none;">
                                <section class="dt-content-blogs-right-inner">
                                    <div class="widget widget-search">
                                        <h3 class="widget-title">
                                            Search FAQ                </h3>
                                        <form action="<?php echo  $this->Html->url('/') ?>faq" method="post" accept-charset="utf-8" id="searchform">                <div class="field-text buttoned">
                                                <input type="text" value="" name="search" placeholder="ENTER KEYWORD" style="outline: medium none;">
                                                <button type="submit"><i class="fa fa-arrow-right"></i></button>
                                            </div>
                                        </form>              </div>
<!--                                    <div class="widget widget-freshpost">
                                        <h3 class="widget-title">
                                            FAQ Categories                </h3>
                                        <ul class="side-postlist">
                                            <li ><a href="javascript:void(0);"    class="active_select"  style="outline: medium none;"> <span>All Faqs</span>&nbsp;<b>(
                                                        3                    )</a></li>
                                            <li ><a href="javascript:void(0);"   style="outline: medium none;"> <span>
                                                        Parlour English                    </span> &nbsp;<b>(
                                                        0                    )</b></a></li>
                                            <li ><a href="javascript:void(0);"   style="outline: medium none;"> <span>
                                                        Customer                    </span> &nbsp;<b>(
                                                        0                    )</b></a></li>
                                            <li ><a href="javascript:void(0);"   style="outline: medium none;"> <span>
                                                        Registration                    </span> &nbsp;<b>(
                                                        0                    )</b></a></li>
                                            <li ><a href="javascript:void(0);"   style="outline: medium none;"> <span>
                                                        Escort                    </span> &nbsp;<b>(
                                                        3                    )</b></a></li>
                                            <li ><a href="javascript:void(0);"   style="outline: medium none;"> <span>
                                                        Advertiser                    </span> &nbsp;<b>(
                                                        0                    )</b></a></li>
                                        </ul>
                                    </div>-->
                                </section>
                            </section>
                            <section class="clr"></section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </div>

      <div class="col-right">
        <?php echo $this->element('user_banner');?>
    </div>
</section>
<div class="clr"></div>
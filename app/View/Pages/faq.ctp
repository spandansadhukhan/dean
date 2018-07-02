<?php ?>
<?php echo $this->element("banner");?>
<section id="contentsection">
<?php echo $this->element("carousel_slider");?>
    <!-- <div id="wait-div" class="wait-div">
        <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                    Please wait    ....</span> </span> </div>
    </div> -->

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
                    if (values == "Advertise")
                    {
                        $('.show_All').slideUp('slow');
                        $('.show_Escorts').slideUp('slow');
                        $('.show_Customers').slideUp('slow');
                        $('.show_Advertise').slideDown('slow');
                        
                    } 
                    else if (values == "Escorts")
                    {
                       $('.show_All').slideUp('slow');
                       $('.show_Escorts').slideDown('slow');
                       $('.show_Customers').slideUp('slow');
                       $('.show_Advertise').slideUp('slow');
                    } 
                    
                    else if (values == "Clients")
                    {
                       $('.show_All').slideUp('slow');
                       $('.show_Escorts').slideUp('slow');
                       $('.show_Customers').slideDown('slow');
                       $('.show_Advertise').slideUp('slow');
                    } 
                    
                    else if (values == "Generals")
                    {
                       $('.show_All').slideDown('slow');
                       $('.show_Escorts').slideUp('slow');
                       $('.show_Customers').slideUp('slow');
                       $('.show_Advertise').slideUp('slow');
                    } 
                    
                    else
                    {
                       $('.show_All').slideDown('slow');
                       $('.show_Escorts').slideDown('slow');
                       $('.show_Customers').slideDown('slow');
                       $('.show_Advertise').slideDown('slow');
                        
                    }

                });

            });


        </script>
        <section id="wrapper">
            <section id="middle" style="background: #fff;">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <section id="searchResult" class="maintitle">
                            <h1>
                                FAQ's          </h1>
                            <div class="smart-forms smart-container faq-tc" style="width:78%">
                                <form method="post" action="" id="form-ui">
                                    <div class="colm colm4">
                                        <div class="option-group field">
                                            <label class="option block spacer-t10" style="width:14%;" >
                                                <input type="radio" class="showFaq_type" name="faq_type" value="All" checked="checked">
                                                <span class="checkbox" ></span>
                                                All                  
                                            </label>

                                            <label class="option block spacer-t10" style="width:20%;">
                                                <input type="radio" class="showFaq_type" name="faq_type" value="Generals">
                                                <span class="checkbox" ></span>
                                                General  FAQ                  
                                            </label>
                                            <label class="option block spacer-t10" style="width:20%;">
                                                <input type="radio" class="showFaq_type" name="faq_type" value="Escorts">
                                                <span class="checkbox" ></span>
                                                Escort FAQ                  
                                            </label>
                                            
                                            <label class="option block spacer-t10" style="width:20%;">
                                                <input type="radio" class="showFaq_type" name="faq_type" value="Clients">
                                                <span class="checkbox" ></span>
                                                Client FAQ                  
                                            </label>
                                            <label class="option block spacer-t10" style="width:20%;">
                                                <input type="radio" class="showFaq_type" name="faq_type" value="Advertise">
                                                <span class="checkbox" ></span>
                                                Advertise FAQ                  
                                            </label>
                                        </div>
                                        <!-- end .option-group section -->

                                    </div>
                                    <!-- end .colm section -->
                                </form>
                            </div>
                            <div class="clr"></div>
                        </section>
                        <div class="clr"></div>
                        <section class="pin-wrapper">
                            <div class="dt-content-blogs">
                                <div class="in-content">
                                    <h3 class="widget-title">
                               FAQ CATEGORIES          </h3>
                                    <div class="show_All">
                                        <div class="accordion accordion-close" id="section1">
                                            General FAQ
                                        </div>
                                        <div style="display: none;" class="acc-container">
                                            <div class="content">
                                               <?php
                                               foreach ($general_faqs as $faq)
                                               {
                                               ?>
                                                <p style="color:#000;"><?php echo $faq["Faq"]["title"]; ?></p>
                                               <?php } ?>
                                               
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="show_Escorts">
                                        <div class="accordion accordion-close" id="section2">
                                            <!-- Independent Escort Profiles  -->                 
                                            Escort FAQ
                                        </div>
                                        <div style="display: none;" class="acc-container">
                                            <div class="content">
                                               <?php
                                               foreach ($escorts_faqs as $faq)
                                               {
                                               ?>
                                                <p style="color:#000;"><?php echo $faq["Faq"]["title"]; ?></p>
                                               <?php } ?>
                                               
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="show_Customers">
                                        <div class="accordion accordion-close" id="section3">
                                            <!-- How to pay an escort? -->                  
                                            Client FAQ
                                        </div>
                                        <div style="display: none;" class="acc-container">
                                            <div class="content">
                                               <?php
                                               foreach ($client_faqs as $faq)
                                               {
                                               ?>
                                                <p style="color:#000;"><?php echo $faq["Faq"]["title"]; ?></p>
                                               <?php } ?>
                                               
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="show_Advertise">
                                        <div class="accordion accordion-close" id="section3">
                                            <!-- How to pay an escort? -->                  
                                            Advertise FAQ
                                        </div>
                                        <div style="display: none;" class="acc-container">
                                            <div class="content">
                                               <?php
                                               foreach ($advertise_faqs as $faq)
                                               {
                                               ?>
                                                <p style="color:#000;"><?php echo $faq["Faq"]["title"]; ?></p>
                                               <?php } ?>
                                               
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div id="no-record" class="no-record"  style="display:none" >
                                        No FAQ Found              </div>
                                </div>
                            </div>
                            <section class="dt-content-blogs-right">
                                <section class="dt-content-blogs-right-inner">
<!--                                    <div class="widget widget-search">
                                        <h3 class="widget-title">
                                            Search FAQ                </h3>
                                        <form action="<?php echo  $this->Html->url('/') ?>faq" method="post" accept-charset="utf-8" id="searchform">                <div class="field-text buttoned">
                                                <input type="text" value="" name="search" placeholder="ENTER KEYWORD" style="outline: medium none;">
                                                <button type="submit"><i class="fa fa-arrow-right"></i></button>
                                            </div>
                                        </form>              </div>-->
                                    <div class="widget widget-freshpost">
                                        <h3 class="widget-title">
                                            FAQ Categories                </h3>
                                            <div class="show_All">
                                        <div class="accordion accordion-close" id="section1">
                                            <!-- Are the escorts genuine/ verified?   -->                
                                            General FAQ
                                        </div>
                                          <div style="display: none;" class="acc-container">
                                            <div class="content">
                                               <?php
                                               foreach ($general_faqs as $faq)
                                               {
                                               ?>
                                                <p style="color:#000;"><?php echo $faq["Faq"]["title"]; ?></p>
                                               <?php } ?>
                                               
                                            </div>
                                        </div>        
                                       
                                    </div>
                                    <div class="show_Escorts">
                                        <div class="accordion accordion-close" id="section2">
                                            <!-- Independent Escort Profiles  -->                 
                                            Escort FAQ
                                        </div>
                                           <div style="display: none;" class="acc-container">
                                            <div class="content">
                                               <?php
                                               foreach ($escorts_faqs as $faq)
                                               {
                                               ?>
                                                <p style="color:#000;"><?php echo $faq["Faq"]["title"]; ?></p>
                                               <?php } ?>
                                               
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <div class="show_Customers">
                                        <div class="accordion accordion-close" id="section3">
                                            <!-- How to pay an escort? -->                  
                                            Client FAQ
                                        </div>
                                         <div style="display: none;" class="acc-container">
                                            <div class="content">
                                               <?php
                                               foreach ($client_faqs as $faq)
                                               {
                                               ?>
                                                <p style="color:#000;"><?php echo $faq["Faq"]["title"]; ?></p>
                                               <?php } ?>
                                               
                                            </div>
                                        </div>
                                       
                                    </div>
                                   <div class="show_Advertise">
                                        <div class="accordion accordion-close" id="section3">
                                            <!-- How to pay an escort? -->                  
                                            Advertise FAQ
                                        </div>
                                       <div style="display: none;" class="acc-container">
                                            <div class="content">
                                               <?php
                                               foreach ($advertise_faqs as $faq)
                                               {
                                               ?>
                                                <p style="color:#000;"><?php echo $faq["Faq"]["title"]; ?></p>
                                               <?php } ?>
                                               
                                            </div>
                                        </div>
                                       
                                    </div>     
                                    </div>
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
       <?php echo $this->element("user_banner");?>
    </div>
</section>
<div class="clr"></div>
<style>
  .in-content h1 {
 	background: #981c99 none repeat scroll 0 0;
    border-radius: 3px;
    color: #fff;
    font-family: "Roboto",sans-serif;
    font-size: 20px;
    font-weight: 300;
    line-height: 28px;
    margin-bottom: 0;
    padding: 10px 15px;
}  
</style>

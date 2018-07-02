<section id="contentsection">
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
                                FAQ's          </h1>
                            <div class="smart-forms smart-container faq-tc">
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
                                    <div class="show_All">
                                        <div class="accordion accordion-close" id="section1">
                                            Are the escorts genuine/ verified?                  <span></span></div>
                                        <div style="display: none;" class="acc-container">
                                            <div class="content">
                                                <p>
                                                <p>Every Independent escort, escort agency, massage parlour &amp; mistress profiles are manually activated by admin. This means that escorts, agencies/ parlours, mistresses etc. cannot just sign up and start advertising.</p><br />
                                                <br />
                                                <p>We will contact the escort/ agency/ parlour within 24 - 48 hours to verify that their details are correct such as phone number, website, rates, opening times etc. We also ask them if they have agreed to our terms and conditions and are legally allowed to advertise their services and that all escorts are over the age of 18 (21 where required).</p><br />
                                                <br />
                                                <p>We do not allow &quot;groups&quot; of escorts to sign up. They either have to be an escort agency or a working flat/ parlour etc. This helps to stop fake profiles being set up. We also check IP numbers for individual escort profiles signing up. We only allow one profile per escort (unless they are working with several agencies). So we try to stop multiple profiles for the same escort.</p><br />
                                                <br />
                                                <p>As an adult directory we cannot guarantee that every single escort listed is genuine but we ask members to help report fake profiles or any other members violating our terms and conditions.&nbsp;</p>                    </p>
                                            </div>
                                        </div>
                                        <br />
                                    </div>
                                    <div class="show_Customers">
                                        <div class="accordion accordion-close" id="section2">
                                            Independent Escort Profiles                  <span></span></div>
                                        <div style="display: none;" class="acc-container">
                                            <div class="content">
                                                <p>
                                                <p>Your profile&nbsp;contains all the information that a Client will use to select you.Your Portfolio can be updated as many times as you want on-line by accessing your own Escort management section and entering your username and password. You can easily change your location, upload photographs and videos into your free and private galleries, and receive emails and bookings from potential clients. Your profile&nbsp;consists&nbsp;of:</p><br />
                                                <br />
                                                <p><em><strong>Biography</strong></em> - This is where you can write all about yourself, your hobbies, your personality, your physical description. Please note no website urls/ phone numbers or email addresses can be included in your biography.</p><br />
                                                <br />
                                                <p><em><strong>Profile Data </strong></em>- This is where your stats such as height, dress size, eye colour, bust size etc &amp; location is displayed.&nbsp;</p><br />
                                                <br />
                                                <p><em><strong>Rates -&nbsp;</strong></em>Your&nbsp;incall &amp; outcall rates are displayed here.</p><br />
                                                <br />
                                                <p><em><strong>Review &amp; Share </strong></em>- Your reviews are displayed here.</p><br />
                                                <br />
                                                <p><em><strong>Gallery</strong></em> - This is where your free photos &amp; free videos are displayed.</p><br />
                                                <br />
                                                <p><strong><em>Private</em></strong> - This is where your private photos &amp; videos are displayed. Clients have to pay to see these photos/videos and you can earn 70% revenue&nbsp;from them.</p><br />
                                                <br />
                                                <p><strong><em>Enjoys</em></strong> - List what services you enjoy</p><br />
                                                <br />
                                                <p><em><strong>Contact</strong></em> - Display your contact information including phone number, website &amp; social accounts such as Facebook and twitter.(Premier accounts only)</p><br />
                                                <br />
                                                <p><strong><em>Schedule</em></strong> - Your working availability. Display what days you are available.&nbsp;</p><br />
                                                <br />
                                                <p><em><strong>Blog </strong></em>- Your own blog (Premier Accounts only)</p><br />
                                                <br />
                                                <p><strong><em>Webcam</em></strong> - currently unavailable still in design process.</p><br />
                                                <br />
                                                <p><strong><em>Tour</em></strong> - Display your up and coming tours. (Premier Accounts only)</p>                    </p>
                                            </div>
                                        </div>
                                        <br />
                                    </div>
                                    <div class="show_Customers">
                                        <div class="accordion accordion-close" id="section3">
                                            How to pay an escort?                  <span></span></div>
                                        <div style="display: none;" class="acc-container">
                                            <div class="content">
                                                <p>
                                                <p><span style="font-family:arial,sans-serif; font-size:10pt">The escort&rsquo;s rates are clearly displayed on their profile.&nbsp;We have no involvement in any fees paid to the escort. The majority of escorts&nbsp;require that&nbsp;you pay all agreed fees in cash&nbsp;at the start of the meeting.&nbsp;Some escort agencies can offer&nbsp;credit/ debit cards facilities.&nbsp;</span></p><br />
                                                <br />
                                                <p><span style="font-family:arial,sans-serif; font-size:10pt">Please contact the escort directly for payment methods and rates.</span></p>                    </p>
                                            </div>
                                        </div>
                                        <br />
                                    </div>
                                    <div id="no-record" class="no-record"  style="display:none" >
                                        No FAQ Found              </div>
                                </div>
                            </div>
                            <section class="dt-content-blogs-right">
                                <section class="dt-content-blogs-right-inner">
                                    <div class="widget widget-search">
                                        <h3 class="widget-title">
                                            Search FAQ                </h3>
                                        <form action="<?php echo  $this->Html->url('/') ?>faq" method="post" accept-charset="utf-8" id="searchform">                <div class="field-text buttoned">
                                                <input type="text" value="" name="search" placeholder="ENTER KEYWORD" style="outline: medium none;">
                                                <button type="submit"><i class="fa fa-arrow-right"></i></button>
                                            </div>
                                        </form>              </div>
                                    <div class="widget widget-freshpost">
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
        <section id="banners">



            <a class="banner200x333 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x333 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x100 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x100 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
        </section>
    </div>
</section>
<div class="clr"></div>
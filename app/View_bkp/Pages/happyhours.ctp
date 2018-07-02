                <section id="contentsection">
                    <div id="wait-div" class="wait-div">
                        <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                                    Please wait    ....</span> </span> </div>
                    </div>

                    <div class="col-left">
                        <script type="text/javascript">
                            var less = 'less';
                            var more = 'more';
                        </script>

                        <section id="wrapper">
                            <section id="middle">
                                <section id="middle-inner">
                                    <section class="all-pins-do">
                                        <h2 class="title">
                                            Happy Hours        </h2>
                                        <div class="clr"></div>
                                        <section class="pin-wrapper">
                                            <div class="in-content" id="happyhour-list">
                                                <div class="happy-hour-escort">
                                                    <div class="heading-happ">
                                                        <h3><a href="javascript:void(0);">
                                                                Patty                  </a></h3>
                                                    </div>
                                                    <div class="photos-happy">
                                                        <a class="main highslide" href="javascript:void(0);"> <img src="<?php echo  $this->Html->url('/') ?>images/o_1ag2pbrth159j1lm21betv41ns9a1460382567-246x175.jpg"/> <span class="new-p100s-en"></span> </a>
                                                        <a class="highslide" href="javascript:void(0);"> <img src="<?php echo  $this->Html->url('/') ?>images/o_1ag2pbrth159j1lm21betv41ns9a1460382567-112x78.jpg"/> </a>
                                                        <a class="highslide" href="<?php echo  $this->Html->url('/') ?>images/o_1ag652h3e1dauvioms6pe7ko7a1460493538-112x78.jpg"/> </a>
                                                    </div>
                                                    <div class="happy-girl-about">
                                                        <section class="happy_phone"><i class="fa fa-phone-square"></i>
                                                            123456789                </section>
                                                        <section class="happy_rate"><i class="fa fa-cubes"></i>
                                                            500.00 USD @ Hr  Outcall Only                </section>
                                                        <section class="clr"></section>
                                                        <section class="cusprofile-info">
                                                            <ul>
                                                                <li> <span class="s-left1"><i class="fa fa-location-arrow"></i>
                                                                        Post ID                      :</span><span class="s-right">
                                                                        1                      </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li> <span class="s-left1"><i class="fa fa-calendar"></i>
                                                                        Timing                      :</span><span class="s-right">
                                                                        Everyday                      5                      to                      7                      </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li> <span class="s-left1"><i class="fa fa-building"></i>
                                                                        City                      :</span><span class="s-right">
                                                                        Brighton                      </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li> <span class="s-left1"><i class="fa fa-list"></i>
                                                                        Category                      :</span><span class="s-right">
                                                                        Morenas,Black Escorts                      </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <section class="clr"></section>
                                                            </ul>
                                                            <section class="clr"></section>
                                                        </section>
                                                        <div class="introtext">
                                                            <p>
                                                                Hiiii you can meet me daily in happy hours                  </p>
                                                        </div>
                                                        <div style="text-align:right;"> <a href="javascript:void(0)" onclick="send_message('Patty', 'patty')" style="display:inline-block; " class="buttonGrey sm-b" >
                                                                Send Message                  </a> <a href="detail_escot.html" style="display:inline-block;" class="buttonGrey  sm-b" >View Profile</a></div>
                                                        <section class="clr"></section>
                                                    </div>
                                                    <section class="clr"></section>
                                                </div>

                                            </div>
                                            <section class="pagi pgn01 grey">
                                                <center>
                                                    <div id="morewait"></div>
                                                </center>
                                                <!-- For Load More part -->
                                                <!-- Load More part ends here-->
                                            </section>
                                            <section class="clr"></section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                        </section>
                        <script>
                            $(document).on("click", ".more-happyhour", function (event) {
                                var ID = $(this).attr("id");
                                var totalPage = '1';
                                if (ID)
                                {
                                    $("#morewait" + ID).html('<img src="' + templateassets + 'images/loading.gif"  width="20" height="20" /> Please wait system is load more records..');
                                    $.ajax({
                                        type: "GET",
                                        url: siteurl + more_url + "/" + ID,
                                        cache: false,
                                        success: function (html) {

                                            $("#happyhour-list").append(html);
                                            $("#morewait" + ID).remove();
                                            $("#more_clr" + ID).remove();
                                            var nextPage = parseInt(ID) + 1;
                                            if (nextPage > totalPage)
                                                $("#" + ID).attr("id", '');
                                            else
                                                $("#" + ID).attr("id", nextPage);
                                        }
                                    });
                                } else
                                {
                                    $(".morebox").html('<div class="no-record">' + no_record + '..</div>');
                                }
                                return false;
                            });
                        </script>
                        <script type="text/javascript">
                            var more_url = 'escort-happyhour/load-more-happyhour';
                            var no_record = 'No more Happy Hour found';
                        </script>
                        <script src="<?php echo  $this->Html->url('/') ?>js/escortfront.js"></script>
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
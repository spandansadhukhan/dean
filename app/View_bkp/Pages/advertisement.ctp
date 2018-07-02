<section id="contentsection">
    <div id="wait-div" class="wait-div">
        <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                    Please wait    ....</span> </span> </div>
    </div>

    <div class="col-full">
        <style>
            .inactive{
                display:none;
            }
        </style>
        <script type="text/javascript">
            function get_plan()
            {
                var size = $("#SelectBannerSize").val();
                var country_id = $("#user_country").val();
                if (country_id == '')
                {
                    alert('please select country first');
                    return false;
                }
                var siteurl = 'http://layout9.demoparlour.com/advdirectory/';
                var site_currency = 'USD';
                var posturl = siteurl + 'get_advertise_plan/' + size + '/' + country_id;
                $.ajax({
                    url: posturl,
                    dataType: 'json',
                    type: "GET",
                    beforeSend: function () {
                        $('#mem_plan').fadeOut(10);
                        $('#wait-div-city').fadeIn(200);
                    },
                    success: function (data) {
                        $('#wait-div-city').fadeOut(300, function () {
                            $('#mem_plan').fadeIn(600);
                        });

                        if (data.success)
                        {
                            $('#sampleImage').attr('src', data.img_url);
                            $('#mem_plan').html('');
                            $.each(data.allPlans, function (key, value) {
                                $('#mem_plan').append('<label for="pl_' + value.id + '" class="AdvertPrice PriceBlue1 smart-forms"><div><input type="radio" id="pl_' + value.id + '" name="plan_id"  value="' + value.id + '" onClick="checkPlan(this.value)"><span class="checkbox"></span><h1>' + value.duration + ' ' + value.duration_type + '<span> ' + value.plan_name + '</span></h1><span id="m6_description"><ul><li>Your ad will show for selected ' + value.forwhere + ' on ' + value.position + ' , for ' + value.duration + ' ' + value.duration_type + '</li></ul></span><span id="m6_price" class="price"> <span id="plan_price_' + value.id + '">' + value.price + '</span></span> </div></label>');
                            });
                        }
                    },
                    error: function (data) {
                        alert("Server Error");
                        return false;
                    }
                });

                return false;
            }


        </script>
        <script type="text/javascript">
            function checkPlan(id)
            {
                $(".paysid").slideUp('fast');
                $(".paysid").fadeIn(800);
            }

            function makeSubmitUrl()
            {
                var plan_id = $('input[name=plan_id]:checked').val();
                var country_id = $('#user_country').val();
                if (plan_id && country_id)
                {
                    $('#adv_form').submit();
                } else if (country_id)
                {
                    alert("Please select plan first");
                } else if (plan_id)
                {
                    alert("Please select country first");
                }
            }
        </script>
        <section id="wrapper">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <h2 class="title"> Banner Advertisement</h2>
                        <div class="clr"></div>
                        <div class="content-static" style="backgroound:#fff;">
                            <section class="advertise-top-part">
                                <section class="ad-top-left">
                                    <h2>Step</h2><span>1</span>
                                    <p>Choose your desired banner size and package then click Create Banner Ad button.</p>
                                    <p>.</p>
                                </section>
                                <section class="ad-top-right">
                                    <h2>Why Banner Ad ?</h2>
                                    <p>Advance Directory as one of the biggest escort directory in the world offers you high quality, targeted traffic to your website!</p>
                                </section>
                                <section class="clr"></section>
                            </section>
                            <br>

                            <section class="ad-bot-left">
                                <form action="javascript:void(0);" method="post" accept-charset="utf-8" id="adv_form">					<div class="tagContainor">
                                        <div class="tom1 bannerSize">
                                            <section class="t1">
                                                <label style="color: #000;">Select Country:</label>
                                                <div class="selectStyle">
                                                    <select style="width:360px" id="user_country" class="choseBlock" name="country_id" onchange="get_plan()">
                                                        <option value="">Select Country</option>
                                                        <option value="25"> Argentina</option>
                                                        <option value="6"> Australia</option>
                                                        <option value="73"> Austria</option>
                                                        <option value="12"> Bahamas</option>
                                                        <option value="79"> Bahrain</option>
                                                        <option value="15"> Bangladesh</option>
                                                        <option value="22"> Belgium</option>
                                                        <option value="49"> Bolivia</option>
                                                        <option value="13"> Brazil</option>
                                                        <option value="14"> Bulgaria</option>
                                                        <option value="27"> Cameroon</option>
                                                        <option value="1"> Canada</option>
                                                        <option value="65"> Chile</option>
                                                        <option value="17"> China</option>
                                                        <option value="32"> Costa Rica</option>
                                                        <option value="87"> Cyprus</option>
                                                        <option value="62"> Czech Republic</option>
                                                        <option value="48"> Denmark</option>
                                                        <option value="34"> Dominican Republic</option>
                                                        <option value="64"> Ecuador</option>
                                                        <option value="82"> Egypt</option>
                                                        <option value="35"> El Salvador</option>
                                                        <option value="42"> Finland</option>
                                                        <option value="21"> France</option>
                                                        <option value="19"> Germany</option>
                                                        <option value="86"> Greece</option>
                                                        <option value="39"> Guam</option>
                                                        <option value="40"> Guatemala</option>
                                                        <option value="43"> Hong Kong</option>
                                                        <option value="24"> Hungary</option>
                                                        <option value="44"> Iceland</option>
                                                        <option value="7"> India</option>
                                                        <option value="46"> Indonesia</option>
                                                        <option value="18"> Ireland</option>
                                                        <option value="41"> Israel</option>
                                                        <option value="20"> Italy</option>
                                                        <option value="47"> Jamaica</option>
                                                        <option value="37"> Japan</option>
                                                        <option value="76"> Jordan</option>
                                                        <option value="26"> Korea</option>
                                                        <option value="80"> Kuwait</option>
                                                        <option value="83"> Lebanon</option>
                                                        <option value="51"> Luxembourg</option>
                                                        <option value="52"> Malaysia</option>
                                                        <option value="53"> Malta</option>
                                                        <option value="5"> Mexico</option>
                                                        <option value="56"> Morocco</option>
                                                        <option value="9"> Netherlands</option>
                                                        <option value="78"> New Zealand</option>
                                                        <option value="54"> Nicaragua</option>
                                                        <option value="58"> Nigeria</option>
                                                        <option value="59"> Norway</option>
                                                        <option value="60"> Pakistan</option>
                                                        <option value="61"> Panama</option>
                                                        <option value="50"> Peru</option>
                                                        <option value="31"> Philippines</option>
                                                        <option value="63"> Poerto Rico</option>
                                                        <option value="72"> Poland</option>
                                                        <option value="36"> Portugal</option>
                                                        <option value="81"> Qatar</option>
                                                        <option value="23"> Romania</option>
                                                        <option value="57"> Russia</option>
                                                        <option value="67"> Singapore</option>
                                                        <option value="28"> South Africa</option>
                                                        <option value="8"> Spain</option>
                                                        <option value="38"> Sweden</option>
                                                        <option value="16"> Switzerland</option>
                                                        <option value="68"> Taiwan</option>
                                                        <option value="84"> Thailand</option>
                                                        <option value="77"> Turkey</option>
                                                        <option value="69"> Ukraine</option>
                                                        <option value="4"> United Arab Emirates</option>
                                                        <option value="2"> United Kingdom</option>
                                                        <option value="3"> United States</option>
                                                        <option value="55"> Uruguay</option>
                                                        <option value="29"> Venezuela</option>
                                                        <option value="70"> VietNam</option>
                                                        <option value="71"> Virgin Islands</option>
                                                    </select>
                                                </div>
                                                <section class="clr"></section>
                                            </section>
                                            <div class="clr"></div>
                                        </div> 

                                        <div class="tom1 bannerSize">
                                            <div class="t1">
                                                <label style="color: #000;">Choose Banner Size</label>
                                                <select id="SelectBannerSize" style="width:360px;" name="SelectBannerSize" onchange="get_plan()">
                                                    <option selected="selected" value="200X333">200 X 333</option>
                                                    <option  value="200X200">200 X 200</option>
                                                    <option  value="200X100">200 X 100</option>
                                                </select>
                                            </div>
                                        </div>

                                        <br>

                                        <div id="wait-div-city" style="display:none;margin-left: 239px;margin-top: 69px;"> <img src="<?php echo  $this->Html->url('/') ?>images/loader.gif" /> </div>

                                        <div id="mem_plan">
                                            <label for="pl_0" class="AdvertPrice PriceBlue1 smart-forms">
                                                <div>
                                                    <input type="radio" id="pl_0" name="plan_id" value="1" onClick="checkPlan(this.value)">
                                                    <span class="checkbox"></span>
                                                    <h1>100 Day <span>200x100 Size Plan</span></h1>
                                                    <span id="m6_description">
                                                        <ul>
                                                            <li>Your ad will show for selected Country on
                                                                Right                       , for 100 Day</li>
                                                        </ul>
                                                    </span>
                                                    <span id="m6_price" class="price"> 50 EUR</span>

                                                </div>
                                            </label>
                                            <label for="pl_1" class="AdvertPrice PriceBlue1 smart-forms">
                                                <div>
                                                    <input type="radio" id="pl_1" name="plan_id" value="7" onClick="checkPlan(this.value)">
                                                    <span class="checkbox"></span>
                                                    <h1>7 Day <span>200x333 Size Plan</span></h1>
                                                    <span id="m6_description">
                                                        <ul>
                                                            <li>Your ad will show for selected Country on
                                                                Right                       , for 7 Day</li>
                                                        </ul>
                                                    </span>
                                                    <span id="m6_price" class="price"> 100 EUR</span>

                                                </div>
                                            </label>
                                            <label for="pl_2" class="AdvertPrice PriceBlue1 smart-forms">
                                                <div>
                                                    <input type="radio" id="pl_2" name="plan_id" value="8" onClick="checkPlan(this.value)">
                                                    <span class="checkbox"></span>
                                                    <h1>15 Day <span>200x333 Size Plan</span></h1>
                                                    <span id="m6_description">
                                                        <ul>
                                                            <li>Your ad will show for selected Country on
                                                                Right                       , for 15 Day</li>
                                                        </ul>
                                                    </span>
                                                    <span id="m6_price" class="price"> 150 EUR</span>

                                                </div>
                                            </label>
                                            <label for="pl_3" class="AdvertPrice PriceBlue1 smart-forms">
                                                <div>
                                                    <input type="radio" id="pl_3" name="plan_id" value="9" onClick="checkPlan(this.value)">
                                                    <span class="checkbox"></span>
                                                    <h1>1 Month <span>200x333 Size Plan</span></h1>
                                                    <span id="m6_description">
                                                        <ul>
                                                            <li>Your ad will show for selected Country on
                                                                Right                       , for 1 Month</li>
                                                        </ul>
                                                    </span>
                                                    <span id="m6_price" class="price"> 220 EUR</span>

                                                </div>
                                            </label>
                                        </div>
                                        <div style="text-align:center; display:none:float:center" class="paysid">
                                            <a class="buttonGrey" style="width:250px; margin: 0 auto;" onClick="makeSubmitUrl()" id="create_ad" href="javascript:">Create Banner Ad</a>
                                        </div>

                                        <section class="clr"></section>

                                        </section>



                                        <section style="float:right;" class="ad-bot-right">
                                            <div class="bannerSample">
                                                <span class="title">Sample</span>
                                                <img src="<?php echo  $this->Html->url('/') ?>images/sample200x333.jpg" id="sampleImage">
                                                <center>
                                                    <a target="_blank" href="javascript:void(0);">More Info About Banner Advertising</a>
                                                </center>
                                            </div>
                                        </section>
                                        <section class="clr"></section>

                                </form>

                        </div>
                        <div class="clr"></div>
                    </section>
                </section>
            </section>
        </section>
    </div>
</section>
<div class="clr"></div>
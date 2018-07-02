<section id="contentsection">
    <div id="wait-div" class="wait-div">
        <div class="wait-divin"> <span style="background: url('<?php echo $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                    Please wait    ....</span> </span> </div>
    </div>

    <div class="col-left">
        <script type="text/javascript">
            $(document).ready(function () {
                /* default settings */
                $('.venobox').venobox();
                /* auto-open #firstlink on page load */
                $("#firstlink").venobox().trigger('click');
            });
        </script>
        <script type="text/javascript">

            function readReview(id) {
                BootstrapDialog.show({
                    type: BootstrapDialog.TYPE_PRIMARY,
                    title: 'Review Details',
                    message: $('<div></div>').load('#/' + id),
                    onshow: function (dialogRef) {
                    }
                });
            }
        </script>
        <div class="col-left mt-4">
            <section id="container" class="container">
                <section id="middle">
                    <section id="middle-inner">

                        <section class="all-pins-do">
                            <div class="my-account-inner row">
                                <div class="triangleBottomRight firstItem"></div>
                                <style>
                                    .unreadCount {
                                        background: linear-gradient(to bottom, #fdf6ca 0%, #fdf6ca 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
                                        border-radius: 50%;
                                        color: #620c29;
                                        display: inline-block;
                                        font-family: arial;
                                        font-size: 12px;
                                        font-weight: bold;
                                        height: 20px;
                                        line-height: 20px;
                                        text-align: center;
                                        width: 20px;
                                        vertical-align:sub;
                                    }
                                </style>
                                <a style="display:none;" href="javascript:;" class="website_activate"></a>
<?php echo $this->element('stripper_sidebar'); ?>
                                <div class="triangleBottomleft firstItem"></div>

                                <div class="right-my-account col-lg-9">
                                    <div class="right-my-account-blocks">
                                        <div class="detail-heading">
                                            <section class="title-left">
                                                <div class="acntSetting p-1">
                                                    <h2 class="font-weight-normal"> My Followers</h2>
                                                </div>
                                            </section>
                                            <div class="clr"></div>
                                        </div>
                                        <div class="smart-forms">
                                            <div  class="notification alert-success spacer-t10" id="success" style="display:none"></div>                        
                                        </div>

                                        <div class="right-my-account-blocks-inner">
                                            <div class="smart-forms">
                                                <div  class="notification alert-success spacer-t10" id="success" style="display:none"></div>                        
                                            </div>
                                            <div class="no-record">No Record Found</div>		</div>
                                    </div>
                                </div>
                                <div class="clr"></div>
                            </div>
                        </section>
                        <!--<div id="promo-bottom">
                        
                        </div>-->
                    </section>
                </section>
            </section>
        </div>

        <div class="col-right">

        </div>
</section>
<div class="clr"></div>
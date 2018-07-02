

<div class="col-left">
    <script type="text/javascript">
        function showMoreDetail(id)
        {
            $("#more_section_" + id).fadeToggle(300);
        }
    </script>
    <style>
        .more_section {
            background: linear-gradient(to bottom, #FFFFFF 0%, #F6F6F6 47%, #EDEDED 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
            border: 1px solid #DFDFDF;
            border-radius: 3px;
            padding: 10px;
        }
    </style>
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
                                                <h2 class="font-weight-normal">My Booking Requests</h2>
                                            </div>

                                        </section>

                                        <div class="clr"></div>
                                    </div>

                                    <div class="right-my-account-blocks-inner">

                                        <div class="table-responsive for-msg">
                                            <table class="table table-vcenter table-striped">
                                                <thead>
                                                <th style="text-align:center">Escort</th>
                                                <th style="text-align:center">Booking Time</th>
                                                <th style="text-align:center">Duration</th>
                                                <th style="text-align:center">Appointment </th>
                                                <th style="text-align:center;">Status</th>
                                                <th >Option</th>
                                                </thead>
                                                <tbody>


                                                </tbody>
                                                <tr >
                                                    <td class="no-record" colspan="7">No Record Found</td>
                                                </tr>
                                            </table>
                                        </div>



                                        <div class="clr"></div>
                                    </div>
                                </div>


                                <div class="clr"></div>
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
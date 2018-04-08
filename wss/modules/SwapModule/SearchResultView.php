<!-- Top content -->
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text wow fadeInLeft">
				<?php if($total_users > 0){ ?>
                <h1>We found your following friends free between</h1>
				<?php } ?>
                <?php if($total_users == 0){ ?>
                <h1>We could not find any of your friends free between</h1>
				<?php } ?>
				<div class="description">
                    <p class="medium-paragraph">
                        <?php echo $result[0][2] .' and ' .$result[0][3]; ?> <br />
						<?php if($total_users > 0){ ?>
                        <i>To send a swap request please click the "Send Swap Request"</i>
						<?php } ?>
					</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="features-container section-container">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 features section-description wow fadeIn top-margin">
                <div class="col-sm-12 features features-box section-description wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                    <div class="col-sm-12 features-box-icon">
                        <i class="fa fa-sort"></i> <h2>Swap Schedules</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="divider-1"><div class="line"></div></div>
                </div>
                <div class="fadeInLeft">
                    <div class="container-table100">
                        <div class="wrap-table100">
                            <div class="table100 ver1 m-b-110">
                                <div class="table100-head">
                                    <table id="my-table">
                                        <thead>
                                        <tr class="row100 head">
                                            <th class="cell100 column1">Friends Available for a swap or are free</th>
                                            <th class="cell100 column2" style="text-align: center;width: 30%;">Swapping</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="table100-body js-pscroll">
                                    <table>
                                        <tbody>

                                        <?php if($total_users > 0){ foreach($result[1] as $task_result) { ?>
                                            <tr class="row100 body">
                                                <td class="cell100 column1"><?php echo $task_result[0]; ?></td>
                                                <td class="cell100 column4" style="text-align: center;width: 28%;"><a href="<?php echo URL_PATH.'/swap/send/'.$task_result[1].'&task_id='.$result[0][0]; ?>" class="btn btn-link-3 btn-link">Send Swap Request</a></td>
                                            </tr>
                                        <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
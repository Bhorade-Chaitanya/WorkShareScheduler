<!-- Top content -->
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text wow fadeInLeft">
				<h1>Other Members Schedule</h1>
                <div class="description">
                    <p class="medium-paragraph">
                        <?php if($total_users > 0){ ?>
						<i>Click against the Group member's name to view their schedule</i>
						<?php } ?>
						<?php if($total_users == 0){ ?>
						<i>No friend of yours, has a Schedule ready yet</i>
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
                        <i class="fa fa-calendar"></i> <h2>Member Schedules</h2>
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
                                            <th class="cell100 column1">Other Group members</th>
                                            <th class="cell100 column2" style="text-align: center;width: 30%;">Click to see calender</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="table100-body js-pscroll">
                                    <table>
                                        <tbody>

                                        <?php if($total_users > 0){ foreach($result as $task_result) { ?>
                                            <tr class="row100 body">
                                                <td class="cell100 column1"><?php echo $task_result[1]; ?></td>
                                                <td class="cell100 column4 text-center" style="text-align: center;width: 28%;"><a href="<?php echo URL_PATH.'/task/viewschedules/'.$task_result[0]; ?>" class="btn btn-link-3 btn-link text-center">Visit <?php echo $task_result[1].'\'s Schedule'; ?></a></td>
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
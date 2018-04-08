<!-- Top content -->
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text wow fadeInLeft">
                <h1>Notifications</h1>
                <div class="description">
                    <p class="medium-paragraph">
                        <?php if($notifications == 0){ ?>
                            <i>Sorry, there are no notifications for you, <?php echo $_SESSION['username']; ?> <br /></i>
                        <?php } ?>
						<?php if($notifications>0){?>
							<i>Reply to your notifications - Click Accept to add to your task list or hit Cancel to reject</i>
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
                        <i class="fa fa-bell"></i> <h2>Your Notification</h2>
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
                                            <th class="cell100 column1" style="width: 15%;">Request From</th>
                                            <th class="cell100 column2">Task Name</th>
                                            <th class="cell100 column3">Task Start date & time</th>
                                            <th class="cell100 column4">Task End date & time</th>
                                            <th class="cell100 column5">Action</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="table100-body js-pscroll">
                                    <table>
                                        <tbody>

                                        <?php if($notifications > 0){ foreach($result as $notification) { ?>
                                            <tr class="row100 body">
                                                <td class="cell100 column1" style="width: 15%;"><?php echo $notification[1]; ?></td>
                                                <td class="cell100 column2"><?php echo $notification[2]; ?></td>
                                                <td class="cell100 column3"><?php echo $notification[3]; ?></td>
                                                <td class="cell100 column4"><?php echo $notification[4]; ?></td>
                                                <td class="cell100 column5"><a href="<?php echo URL_PATH.'/swap/accept/'.$notification[5]; ?>" class="btn btn-link-3 btn-link">Accept</a><a href="<?php echo URL_PATH.'/swap/reject/'.$notification[5]; ?>" class="btn btn-link-3 btn-link">Cancel</a></td>
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
<!-- Top content -->
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text wow fadeInLeft">
                <h1><?php echo $msg; ?> <?php if(isset($_SESSION['username'])) { echo $_SESSION['username'];} ?></h1>
                <div class="description">
                    <p class="medium-paragraph">
                        <?php if($total_tasks == 0){ ?>
                        <i>Looks like, you haven't added any task to your schedule</i>
                        <?php } ?>
                        <?php if($total_tasks > 0){ ?>
                        <i>Here's your schedule for now</i>
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
                        <i class="fa fa-calendar"></i> <h2>Your Schedules</h2>
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
                                            <th class="cell100 column1">Task Name</th>
                                            <th class="cell100 column2">Start at</th>
                                            <th class="cell100 column3">End at</th>
                                            <th class="cell100 column4">Action</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="table100-body js-pscroll">
                                    <table>
                                        <tbody>

                                        <?php if($total_tasks > 0){ foreach($result as $task_result) { ?>
                                        <tr class="row100 body">
                                            <td class="cell100 column1"><?php echo $task_result[1]; ?></td>
                                            <td class="cell100 column2"><?php echo $task_result[2]; ?></td>
                                            <td class="cell100 column3"><?php echo $task_result[3]; ?></td>
                                            <td class="cell100 column4"><a href="<?php echo URL_PATH.'/task/edit/'.$task_result[0]; ?>" class="btn btn-link-3 btn-link">Edit</a><a href="<?php echo URL_PATH.'/task/delete/'.$task_result[0]; ?>" class="btn btn-link-3 btn-link">Delete</a</td>
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
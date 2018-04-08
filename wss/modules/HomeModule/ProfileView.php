<!-- Top content -->
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text wow fadeInLeft">
                <h1>Hey, <?php echo $_SESSION['username'];?></h1>
                <div class="description">
                    <p class="medium-paragraph">
                        <i>Here's your WorkShare Scheduler account details</i>
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
                        <i class="fa fa-user"></i> <h2>Your Profile</h2>
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
                                            <th class="cell100 column1">ID</th>
                                            <th class="cell100 column2">Name</th>
                                            <th class="cell100 column3">Email ID</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="table100-body js-pscroll">
                                    <table>
                                        <tbody>
                                            <tr class="row100 body">
                                                <td class="cell100 column1"><?php echo $_SESSION['user_id']; ?></td>
                                                <td class="cell100 column2"><?php echo $_SESSION['username']; ?></td>
                                                <td class="cell100 column3"><?php echo $_SESSION['user_email']; ?></td>
                                            </tr>
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
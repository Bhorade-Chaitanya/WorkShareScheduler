<!-- Top content -->
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text wow fadeInLeft">
                <h1>Penalty Home</h1>
                <div class="description">
                    <p class="medium-paragraph">
                        <a href="<?php echo URL_PATH.'/penalty/select'; ?>" class="btn btn-link-3 btn-link">Choose your penalty here</a>
                        <?php if($total_penalties == 0){ ?>
                            <br />Looks like there are no penalties taken at this time..
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
                        <i class="fa fa-glass"></i> <h2>Members Penalties</h2>
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
                                            <th class="cell100 column1">Member</th>
                                            <th class="cell100 column2">Selected Penalty</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="table100-body js-pscroll">
                                    <table>
                                        <tbody>

                                        <?php if($total_penalties > 0){ foreach($result as $penalty) { ?>
                                            <tr class="row100 body">
                                                <td class="cell100 column1"><?php echo $penalty[0]; ?></td>
                                                <td class="cell100 column2"><a class="btn btn-link3 btn-link"><?php echo $penalty[1]; ?></a></td>
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
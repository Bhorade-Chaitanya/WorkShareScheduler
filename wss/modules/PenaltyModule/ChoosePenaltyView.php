<!-- Top content -->
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text wow fadeInLeft">
                <h1>Hey <?php echo $_SESSION['username'].','; ?> It's penalty time..</h1>
                <div class="description">
                    <p class="medium-paragraph">
                        <i>Choose any one option as penalty, by clicking on the appropriate image</i>
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
                        <i class="fa fa-glass"></i> <h2>Select Penalty</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="divider-1"><div class="line"></div></div>
                </div>
                <div class="fadeInLeft">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="col-md-6" style="border: 1px dotted grey;padding: 10px;">
                                <a href="<?php echo URL_PATH.'/penalty/add/chocolates'; ?>">
                                    <img src="<?php echo URL_PATH.'/assets/img/penalty/choclates.jpg'; ?>" style="height: 160px"  />
                                </a>
                            </div>
                            <div class="col-md-6" style="border: 1px dotted grey;padding: 10px;">
                                <a href="<?php echo URL_PATH.'/penalty/add/drink'; ?>">
                                    <img src="<?php echo URL_PATH.'/assets/img/penalty/drink.jpg'; ?>" style="height: 160px"  />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="col-md-6" style="border: 1px dotted grey;padding: 10px;">
                                <a href="<?php echo URL_PATH.'/penalty/add/cleanhome'; ?>">
                                    <img src="<?php echo URL_PATH.'/assets/img/penalty/cleanhome.jpg'; ?>" style="height: 160px"  />
                                </a>
                            </div>
                            <div class="col-md-6" style="border: 1px dotted grey;padding: 10px;">
                                <a href="<?php echo URL_PATH.'/penalty/add/wash'; ?>">
                                    <img src="<?php echo URL_PATH.'/assets/img/penalty/wash.png'; ?>" style="height: 160px" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
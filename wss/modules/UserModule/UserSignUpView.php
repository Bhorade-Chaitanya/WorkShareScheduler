<!-- Top content -->
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text wow fadeInLeft">
                <h1>Welcome to WorkShare Scheduler</h1>
                <div class="description">
                    <p class="medium-paragraph">
                        WorkShare Scheduler is the modern way of sharing and following household activities
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="features-container">
    <div class="container">

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 features section-description wow fadeIn top-margin">
                <div class="col-sm-12 features features-box section-description wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                    <div class="col-sm-12 features-box-icon">
                        <i class="fa fa-user"></i> <h2>User Sign Up</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="divider-1"><div class="line"></div></div>
                </div>
                <div class="fadeInLeft">
                    <div class="container-table100">
                        <div class="wrap-table100">
                            <div class="table100 ver1">
                                <div class="table100-head">
                                    <table id="my-table">
                                        <thead>
                                        <tr class="row100 head">
                                            <th class="cell100 column1 text-center">Enter Following Credentials</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="col-md-12" style="padding: 0">
                                    <form method="post" action="<?php echo URL_PATH .'/user/signup'; ?>">
                                        <div class="goldenforms-pro">
                                        <div>
                                            <div class="goldenforms-container" style="margin: 0">
                                                <div class="frm-body" style="padding-top: 30px;">

                                                    <div class="frm-row">
                                                        <div class="frm-section colm colm6">
                                                            <label class="field">
                                                                <input type="text" name="email" id="email" class="uit-input" placeholder="Email ID" value="<?php if(isset($data['formData']['email'])) { echo $data['formData']['email']; } ?>" />
                                                                <span class="error"><?php if(isset($data['errMessages']['emailErr'])) { echo $data['errMessages']['emailErr']; } ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="frm-section colm colm6">
                                                            <label class="field">
                                                                <input type="text" name="username" id="username" class="uit-input" placeholder="Username" value="<?php if(isset($data['formData']['username'])) { echo $data['formData']['username']; } ?>" />
                                                                <span class="error"><?php if(isset($data['errMessages']['userNameErr'])) { echo $data['errMessages']['userNameErr']; } ?></span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="frm-row">
                                                        <div class="frm-section colm colm12">
                                                            <label class="field">
                                                                <input type="password" name="password" id="password" class="uit-input" placeholder="Password" value="<?php if(isset($data['formData']['password'])) { echo $data['formData']['password']; } ?>" />
                                                                <span class="error"><?php if(isset($data['errMessages']['passwordErr'])) { echo $data['errMessages']['passwordErr']; } ?></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="frm-row">
                                                        <div class="frm-section colm colm12">
                                                            <label class="field">
                                                                <input type="password" name="confirmPassword" id="confirmPassword" class="uit-input" placeholder="Confirm Password" value="<?php if(isset($data['formData']['confirmPassword'])) { echo $data['formData']['confirmPassword']; } ?>" />
                                                                <span class="error"><?php if(isset($data['errMessages']['confirmPasswordErr'])) { echo $data['errMessages']['confirmPasswordErr']; } ?></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="frm-row">
                                                        <div class="frm-section colm colm12" style="margin-bottom: 0">
                                                            Already Have Account? <a href="<?php echo URL_PATH . '/user/login'; ?>">Log in</a> Now
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="frm-footer" style="text-align: center">
                                                    <button type="submit" class="uit-button btn btn-link-3" data-toggle="modal" data-target="#import_purchaser_info" style="padding: 0 30px;font-size: x-large">Sign Up Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
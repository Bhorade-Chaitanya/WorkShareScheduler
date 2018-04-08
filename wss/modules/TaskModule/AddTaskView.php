<!-- Top content -->
<div class="top-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text wow fadeInLeft">
                <h1>Add a new Task</h1>
                <div class="description">
                    <p class="medium-paragraph">
                       <i>All fields are mandatory, Please click Add Now when done..</i>
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
                        <i class="fa fa-plus"></i> <h2>Add Task</h2>
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
                                    <form method="post" action="<?php echo URL_PATH .'/task/add'; ?>">
                                        <div class="goldenforms-pro">
                                            <div>
                                                <div class="goldenforms-container" style="margin: 0">
                                                    <div class="frm-body" style="padding-top: 30px;">
                                                        <div class="frm-row">
                                                            <div class="frm-section colm colm12">
                                                                <label class="field">
                                                                    <input type="text" name="taskName" id="taskName" class="uit-input" placeholder="Task Name" value="<?php if(isset($data['formData']['taskName'])) { echo $data['formData']['taskName']; } ?>" />
                                                                    <span class="error"><?php if(isset($data['errMessages']['taskNameErr'])) { echo $data['errMessages']['taskNameErr']; } ?></span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="frm-row">
                                                            <div class="frm-section colm colm12">
                                                                <label class="field">
                                                                    <input type="text" id="dtimepicker1" name="taskStart" class="uit-input" placeholder="Date timepicker" value="<?php if(isset($data['formData']['taskStart'])) { echo $data['formData']['taskStart']; } ?>" />
                                                                    <span class="error"><?php if(isset($data['errMessages']['taskStartErr'])) { echo $data['errMessages']['taskStartErr']; } ?></span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="frm-row">
                                                            <div class="frm-section colm colm12">
                                                                <label class="field">
                                                                    <input type="text" id="dtimepicker2" name="taskEnd" class="uit-input" placeholder="Date timepicker" value="<?php if(isset($data['formData']['taskEnd'])) { echo $data['formData']['taskEnd']; } ?>" />
                                                                    <span class="error"><?php if(isset($data['errMessages']['taskEndErr'])) { echo $data['errMessages']['taskEndErr']; } ?></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="frm-footer" style="text-align: center">
                                                        <button type="submit" class="uit-button btn btn-link-3" data-toggle="modal" data-target="#import_purchaser_info" style="padding: 0 30px;font-size: x-large">Add Now</button>
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
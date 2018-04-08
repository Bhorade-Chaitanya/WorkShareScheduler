<!-- Top menu -->
<nav class="navbar navbar-fixed-top navbar-no-bg" role="navigation">
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="//localhost/wss/user/login"> WorkShare Scheduler</a>
            </div>
            <div class="collapse navbar-collapse" id="top-navbar-1">
                <ul class="nav navbar-nav navbar-left" style="margin-top: 8px;">
                    <li><a href="<?php echo URL_PATH.'/task/add'; ?>" class="btn btn-link-3"><i class="fa fa-plus"></i> Add New Task</a></li>
                    <li><a href="<?php echo URL_PATH.'/task/listschedule'; ?>" class="btn btn-link-3"><i class="fa fa-calendar"></i> Group Schedule</a></li>
                    <li><a href="<?php echo URL_PATH.'/swap/index'; ?>" class="btn btn-link-3"><i class="fa fa-sort"></i> Swap Task</a></li>
                    <li><a href="<?php echo URL_PATH.'/penalty/index'; ?>" class="btn btn-link-3"><i class="fa fa-glass"></i> Penalties</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-top: 16px;">
                    <li><a href="<?php echo URL_PATH.'/user/login'; ?>" class="btn btn-link-3" style="margin: 0;border-radius: 0;border-right: 1px solid black;"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="<?php echo URL_PATH.'/swap/notification'; ?>" class="btn btn-link-3" style="margin: 0;border-radius: 0;border-right: 1px solid black;"><i class="fa fa-bell"></i> Notification</a></li>
                    <?php if(isset($_SESSION['user_id'])){ ?>
                    <li><a href="<?php echo URL_PATH.'/home/profile'; ?>" class="btn btn-link-3" style="margin: 0;border-radius: 0;border-right: 1px solid black;"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?></a></li>
                    <?php } ?>
                    <?php if(isset($_SESSION['user_id'])){ ?>
                        <li><a href="<?php echo URL_PATH.'/user/logout'; ?>" class="btn btn-link-3" style="margin: 0;border-radius: 0;"><i class="fa fa-sign-out"></i> Log Out</a></li>
                    <?php }else{ ?>
                        <li><a href="<?php echo URL_PATH.'/user/login'; ?>" class="btn btn-link-3" style="margin: 0;border-radius: 0;"><i class="fa fa-sign-in"></i> Log In</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 footer-copyright">
                &copy; WorkShare Scheduler 2018 - All rights reserved
            </div>
        </div>
    </div>
</footer>


<!-- Javascript -->
<script src="<?php echo URL_PATH .'/' ?>assets/js/jquery-1.11.1.min.js"></script><script src="<?php echo URL_PATH .'/' ?>assets/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="<?php echo URL_PATH .'/' ?>assets/js/jquery-ui-timepicker.min.js"></script>
<script src="<?php echo URL_PATH .'/' ?>assets/js/jquery-ui-touch-punch.min.js"></script>
<script>
    $('#dtimepicker1').datetimepicker({
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        dateFormat: "yy-mm-dd",
        timeFormat: "HH:mm:ss",
        beforeShow: function(input, inst) {
            var newclass = 'goldenforms-pro';
            var smartpikr = inst.dpDiv.parent();
            if (!smartpikr.hasClass('goldenforms-pro')){
                inst.dpDiv.wrap('<div class="'+newclass+'"></div>');
            }
        }
    });
    $('#dtimepicker2').datetimepicker({
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        dateFormat: "yy-mm-dd",
        timeFormat: "HH:mm:ss",
        beforeShow: function(input, inst) {
            var newclass = 'goldenforms-pro';
            var smartpikr = inst.dpDiv.parent();
            if (!smartpikr.hasClass('goldenforms-pro')){
                inst.dpDiv.wrap('<div class="'+newclass+'"></div>');
            }
        }
    });
</script>

<script src="<?php echo URL_PATH .'/' ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL_PATH .'/' ?>assets/js/jquery.backstretch.min.js"></script>
<script src="<?php echo URL_PATH .'/' ?>assets/js/wow.min.js"></script>
<script src="<?php echo URL_PATH .'/' ?>assets/js/retina-1.1.0.min.js"></script>
<script src="<?php echo URL_PATH .'/' ?>assets/js/waypoints.min.js"></script>
<script src="<?php echo URL_PATH .'/' ?>assets/js/scripts.js"></script>
<script src="<?php echo URL_PATH .'/' ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function(){
        var ps = new PerfectScrollbar(this);
        $(window).on('resize', function(){
            ps.update();
        })
    });
</script>
<script src="<?php echo URL_PATH .'/' ?>assets/js/main.js"></script>
<!--[if lt IE 10]>
<script src="<?php echo URL_PATH .'/' ?>assets/js/placeholder.js"></script>
<![endif]-->
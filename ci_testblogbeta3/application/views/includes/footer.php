</div> <!--end of div main content-->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Your Website 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <!--<script src="<?php //echo base_url("assets/vendor/jquery/jquery.min.js"); ?>"></script>-->

    

    <script>
    $(document).ready(function () {
        $('.modal').on('show.bs.modal', function () {
            if ($(document).height() > $(window).height()) {
                // no-scroll
                $('body').addClass("modal-open-noscroll");
            }
            else {
                $('body').removeClass("modal-open-noscroll");
            }
        });
        $('.modal').on('hide.bs.modal', function () {
            $('body').removeClass("modal-open-noscroll");
        });
    })
    </script>

    <script src="<?php echo base_url("custom/js/register.js"); ?>"></script>
    <!--<script src="<?php //echo base_url("custom/js/post.js"); ?>"></script>
    

</body>

</html>
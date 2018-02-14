<!-- email Resturant modal -->
<div class="modal fade" id="emailResturant" tabindex="-1" role="dialog" aria-labelledby="emailResturant" aria-hidden="true">
    <div style="max-width: 60%" class="modal-dialog">
        <div class="modal-content modal-popup">
            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
            <form action="<?php echo base_url()?>Login/check_user" class="popup-form" style="max-width: 100%" id="myLogin" method="post">

                <div class="login_icon"><i class="icon_mail_alt"></i></div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                <input type="email" class="form-control form-white" name="email" placeholder="Your Email">
                    </div>
                    <div class="col-md-6 col-sm-6">
                <input type="text" class="form-control form-white" name="name" placeholder="Your Name">
                    </div>
                </div>

                <textarea type="text" id="details" name="details"  class="form-control form-white"  required placeholder="Your Query"></textarea>

                <button type="submit" class="btn btn-submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- email Resturant modal -->
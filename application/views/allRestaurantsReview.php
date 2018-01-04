


            <h2 class="inner"> Write Your Review </h2>
            <br class="box_style_2">
            <form method="post" action="<?php echo base_url() ?>Feedback/newRestuirantreview">
                <div class="form-group">
                    <input type="text" name="name"  class="form-control form-black"  required  placeholder="Give your name ..........." />
                </div>
                <div class="form-group">
                    <textarea name="review_text" id="review_text" class="form-control form-black" style="height:100px" placeholder="write review about Restaurant..........." ></textarea>
                </div>
                <input type="submit" style="color: red" class="form-control form-black"  value="Submit" >
            </form>


            <div class="" style="margin-top: 20px">

                <p style="text-align: center;color: red"><b>Users  Review:</b></p>

                <?php foreach($userFeedback as $f) { ?>

                    <div class="review_strip_single">
                        UserName :<span style="color: red"><?php echo $f->name ?></span>
                        <p><small>  - <?php echo $f->feedbackTime ?></small></p>
                        <b><?php echo $f->feedback ?></b>


                    </div>
                <?php  } ?>
            </div>


        </div>
        <div class="col-md-2"></div>
        <!-- End box_style_1 -->
    </div>
    <!-- End row -->
</div>
<!-- End container -->
<!-- End Content =============================================== -->

<!-- Footer ================================================== -->

<!-- End Footer =============================================== -->



<!-- COMMON SCRIPTS -->

</body>
</html>
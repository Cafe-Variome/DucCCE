<?php

/**
 * @author Umar Riaz
 * Created at 17/03/2021
 * 
 */

?>
<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>

    <form id="msform" action="<?php echo base_url('/ViewCon/gettoken'); ?>" method="post">

        <fieldset id="userinfofield">
            <div class="card-header">
                <h4 class="mb-0 text-center">Please enter user information.</h4>
                <small class="text-muted mr-2"><?php if(isset($message)) echo $message ?></small>
                <small class="text-danger mr-2"><?php if(isset($err_message)) echo $err_message ?></small>
            </div>
            <div id="userinformation">
                <div class="form-row mt-3 p-0" style="display: none;">
                    <div class="form-group col-md-6 col-6 col-12">
                        <label for="u_fname">First Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                        <input type="text" class="form-control"  name="u_fname" id="u_fname" placeholder="Please enter first name">
                    </div>
                    <div class="form-group col-md-6 col-6 col-12">
                        <label for="u_lname">Last Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                        <input type="text" class="form-control"  name="u_lname" id="u_lname" placeholder="Please enter last name">
                    </div>
                </div>
                <div class="form-row mt-1 p-0">
                    <div class="form-group col-md-12 col-12 col-12">
                        <label for="u_email">Email:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                        <input type="email" class="form-control" required name="u_email" id="u_email" placeholder="Please enter email">
                    </div>
                </div>
            </div>
            <hr>
            <input type="button" id="getToken" name="getToken" class="action-button" value="Submit"/>
        </fieldset>
    </form>

    <script>
        
        $('#getToken').on('click', function(){
         
            // $('#msform').submit();

            var form = $('#msform');

            var validator = form.validate({
                debug: true,
                errorElement: "small",
                errorClass: "help-block text-danger has-error",
                focusInvalid: false,
                focusCleanup: true,
                onkeyup: function (element) {

                $(element).parent().find('label').next(".has-error").remove();
             
                return $(element).valid();
                },
                errorPlacement: function(error, element) {
                var e;
                e =$(element).parent().find('label');
                error.insertAfter(e);
                },
                ignore: [],
            });
        if(form.valid()===true){
            document.getElementById("msform").submit();
        }


            
    });

    </script>

<?= $this->endSection() ?>
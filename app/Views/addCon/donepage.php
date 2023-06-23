<?php

/**
 * @author Umar Riaz
 * Created at 19/08/2021
 * 
 */ ?>
<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="card main-card1">
        <div class="card-body">
            <div class="done card">
                <div class="row ">
                    <div class="col-12 text-center"><h3>Thank You!</h3></div>
                    <div class="col-12 text-justify"><p>Your Profile has been successfully saved.
                        An access link to view the Profile has been sent to <b><?= $email ?></b>.</p>
                        <p>You can view your submission or add more profiles using the following options.</p>
                    </div>
                </div>
                <hr>
                <div class="text-center ">
                    <form id="addMoreData" action="<?php echo base_url('/AddCon/addmoredata'); ?>" method="post">
                        <input type="hidden" name="fname" value="<?php echo $fname ?>">
                        <input type="hidden" name="lname" value="<?php echo $lname ?>">
                        <input type="hidden" name="email" value="<?php echo $email ?>">
                        <input type="submit" name="Submit" class="btn mpbtn" id="Submit" value="Add another profile" />
                        <a href="<?php echo base_url('/ViewCon/view/' . $id) ?>" class="btn mpbtn">View submission</a>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>
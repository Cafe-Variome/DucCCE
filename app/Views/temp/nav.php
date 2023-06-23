<nav class="navbar  navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="logo">
        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('public/img/Duc_logo6.png') ?>" class="navbar-brand logo" alt="logo"></a>
    </div>
    <div class="lemar">
        <a class="navbar-brand text-dark nvh" href="<?php echo base_url(); ?>">
            DUC Profile Creator Using CCE
        </a>
    </div>
    <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="max-width: 510px;margin-left: auto; min-width: 300px;">
        <div class="navbarr">
            <ul class="navbar-nav nav ml-auto main-nav">
                <?php $request = service('request'); ?>
                <li><a href="<?php echo base_url() ?>"> Home</a></li>
                <li><a href="<?php echo base_url('/AddCon/index') ?>">Create Profile</a></li>
                <li><a href="<?php echo base_url('/ViewCon/viewdata') ?>">Your Profiles</a></li>
                <li><a href="<?php echo base_url('/Upload/index') ?>">Upload Profile</a></li>
                <li><a href="<?php echo base_url('/Learn/index') ?>">Learn More</a></li>
            </ul>
        </div>

    </div>
</nav>
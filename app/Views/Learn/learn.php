<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>
<div class="cardsLayout mt-3">
    <div class="row ">
        <div class="card">
            <div class="card-title text-center mt-3">
                <h3>DUC Profile Creator and CCE Information </h3>
                <hr>
            </div>
            <div class="card-body">
                The DUC profile creator is an easy to use tool to create a profile of use condition statements for a given resource.
                The process is based upon a series of 'Common Conditions of Use Element' (CCE) concepts, and an online form that gathers this information into a 'Profile'. These profiles can be updated at any time, and you decide what to include or not include in your resource profile.
                As a user, you can choose to leave a copy on the website or download the profile to your own computer. Whether saved on the site or downloaded, profiles can be reopened/uploaded for further editing later.
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-6">
            <div class="card dl text-center">
                <div class="card-title mt-3">
                    <h3>FAQs</h3>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="qnas">
                        <b>1. Is the user email address stored within the profile?</b> <br>
                        <p class="ml-2 mb-0">No, the user email is just used for storing the profile in the tool itself.</p><br>
                        <b>2. What is a Use Condition Statement?</b> <br>
                        <p class="ml-2 mb-0"> A Use Condition Statement consists of: [Use Condition], for which specifically [Condition detail], this use is/has [Rule], and applies to the [Scope].</p><br>
                        <b>3. Do I have to use all the Use Conditions?</b> <br>
                        <p class="ml-2 mb-0">No, It is not necessary to use all of the 19 Use Conditions, just those relevant to the resource can be selected.</p><br>
                        <b>4. Can I use the same Use Condition more than once?</b> <br>
                        <p class="ml-2 mb-0">Yes, a Use Condition can be used more than once as deemed appropriate.</p><br>
                        <b>5. How do I save or download my profile?</b> <br>
                        <p class="ml-2 mb-0">After entering your profile information, you will be given the option to save and/or download your profile.</p><br>
                        <b>6. How can I retrieve or edit a previous created profile?</b> <br>
                        <p class="ml-2 mb-0">Navigate to the Your Profile section and follow the on screen instructions.</p><br>
                        <b>7. Can I upload a previously created profile?</b> <br>
                        <p class="ml-2 mb-0">Yes, click on Upload Profile in menu bar and follow the on screen instructions.</p><br>
                        <b>8. Who can view my profile?</b> <br>
                        <p class="ml-2 mb-0">The user is emailed a temporary access link, only those with the link can view the profile.</p><br>
                        <b>9. Does the profile need to be a full representation of the access requirements for the resource?</b> <br>
                        <p class="ml-2 mb-0">The profile will only be used to help people who are undertaking discovery queries to find resources of interest (so prioritise entering policy items that might be useful for this purpose).</p><br>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-6" style="min-height: auto;">
            <div class="card dl ">
                <div class="card-title text-center mt-3">
                    <h3>Document Library</h3>
                    <hr>
                </div>

                <div class="card-body main">
                    <ul class="cards">

                        <li class="cards_item">
                            <div class="card">
                                <div class="card_image"><img src="<?php echo base_url('assets/img/CCE Explanations.png') ?>"></div>
                                <div class="card_content">
                                    <a target="_blank" href="<?php echo base_url('assets/documents/CCE_explanations_document_terms.pdf') ?>">
                                        <button class="btn card_btn">Explaination of DUC & CCE</button>
                                    </a>

                                </div>
                            </div>
                        </li>
                        <li class="cards_item">
                            <div class="card">
                                <div class="card_image"><img src="<?php echo base_url('assets/img/Manual.png ') ?>"></div>
                                <div class="card_content">
                                    <a target="_blank" href="<?php echo base_url('assets/documents/CCE_instruction_manual.pdf') ?>">
                                        <button class="btn card_btn">How to Guide</button>
                                    </a>

                                </div>
                            </div>
                        </li>
                        <li class="cards_item">
                            <div class="card">
                                <div class="card_image"><img src="<?php echo base_url('assets/img/Examples Thumbnail.PNG') ?>"></div>
                                <div class="card_content">
                                    <a target="_blank" href="<?php echo base_url('assets/documents/Examples_of_DUC_profiles.pdf') ?>">
                                        <button class="btn card_btn">Examples of DUC/CCE statements</button>
                                    </a>

                                </div>
                            </div>
                        </li>
                        <li class="cards_item">
                            <div class="card">
                                <div class="card_image"><img src="<?php echo base_url('assets/img/Manual.png') ?>"></div>
                                <div class="card_content">
                                    <button class="btn card_btn video-btn" data-src="https://www567.lamp.le.ac.uk/Duc_Videos/CCE/video.mp4" data-toggle="modal" data-target="#myModal">How to Video</button>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
</div>

</div>

<!-- Model -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <video id="video" src="" controls autoplay>
                </video>

            </div>
        </div>
    </div>
</div>
<style>

    .close{
        position:absolute;
        right:-30px;
        top:0;
        z-index:999;
        font-size:2rem;
        font-weight: normal;
        color:#fff;
        opacity:1;
    }
    #video{
        width: 100% !important;
    }

</style>
<script>
    $(document).ready(function() {
        var $videoSrc;  
        $('.video-btn').click(function() {
            $videoSrc = $(this).data( "src" );
        });
        console.log($videoSrc);
        // when the modal is opened autoplay it  
        $('#myModal').on('shown.bs.modal', function (e) {

            $("#video").attr('src',$videoSrc);
        })
        // stop playing the youtube video when I close the modal
        $('#myModal').on('hide.bs.modal', function (e) {
        // a poor man's stop video
        $("#video").attr('src',''); 
        }) 
    });

</script>

<?= $this->endSection() ?>
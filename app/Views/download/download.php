<?php

/**
 * @author Umar Riaz
 * Created at 17/09/2021
 * 
 */

$this->session = \Config\Services::session();

?>
<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>
<div>
    <?php $referred_from = $this->session->get('previous_url'); ?>
    <a id="goback" hidden href="<?php echo $referred_from ?>" class="btn btn-small btn-outline-success float-left"><i class="fas fa-arrow-left"></i></a>
</div>
<div class="modal fade" id="profileInfoModal" tabindex="-1" role="dialog" aria-labelledby="UserInfoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Download Profile</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mbody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <div class="dropdown">
                    <button type="dropbtn" id="dson" class="btn dropbtn btn-info">Download Profile</button>
                    <div class="dropdown-content">
                        <a href="#" id="jsdld">JSON</a>
                        <a href="#" id="exdld">Excel</a>
                        <!-- <a href="#">Link 3</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var d = <?php echo json_encode($profile) ?>;
    var profile = JSON.parse(d["p_data"]);

    var JsontoDownload = [];
    _jsontoDownload = {};
    _jsontoDownload["DucProfile"] = profile["profile"];
    _jsontoDownload["DucProfile"]["resource"] = profile["resource"];
    _jsontoDownload["DucProfile"]["Conditions"] = profile["Conditions"];
    _jsontoDownload["DucProfile"]["Comments"] = profile["Comments"];

    JsontoDownload.push(_jsontoDownload);





    // var pinfo = profile["profile"];
    // var rinfo = profile["resource"];
    // var cinfo = profile["Conditions"];
    // var cmnt = profile["Comments"];

    // var p = {};

    // p["profile"] = pinfo;
    // p["resource"] = rinfo;
    // p["Conditions"] = cinfo;
    // p["Comments"] = cmnt;

    // var Json = [];
    // Json.push(p);

    // var x = JSON.stringify(Json[0], null, '\t');
    $(document).ready(function() {
        $('#profileInfoModal').modal({
            show: true
        })

        $("#profileInfoModal").on('hide.bs.modal', function() {
            var a = document.getElementById('goback');
            window.location.href = a.href;
        });

        $('#profileInfoModal').on('shown.bs.modal', function(e) {

            $('.modal-body').append(`
                <pre><code>${library.json.prettyPrint(JsontoDownload[0])}</code></pre>
            `);
        })

        $('#jsdld').on('click', function() {

            J_Download(profile);
            $("#profileInfoModal").modal('hide');

        })
        $('#exdld').on('click', function() {

            xls_Download(profile);
            $("#profileInfoModal").modal('hide');

        })
    })
</script>
<?= $this->endSection() ?>
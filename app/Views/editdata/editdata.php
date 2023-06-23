<?php

/**
 * @author Umar Riaz
 * Created at 19/08/2021
 * 
 */

?>
<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>
<div class="rtable"> <?= $table ?></div>
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="delModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Warning!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you would like to delete the profile?</p>
                <input type="hidden" id="base" value="<?php echo base_url('/ViewCon/delete/'); ?>">
            </div>
            <div class="modal-footer">
                <a type="button" id="dellbtn"  class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="dmodel" tabindex="-1" role="dialog" aria-labelledby="dmodel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Download</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="jbody2">
                <!-- <p id="jn"></p> -->
            </div>
            <div class="modal-footer">
                <a type="button" id="downloadbtn"  class="btn btn-success">Save</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
   
    $('#delModal').on('show.bs.modal', function(e) {
        var rowid = $(e.relatedTarget).data('id');
        var a = document.getElementById('dellbtn');
        var b = $('#base');
        var link = b.val()+'/'+rowid;
        a.href = link;
        console.log(link)
    })

    $('#dmodel').on('show.bs.modal', function(e) {
      var json = $('#dJsn').attr("data-json");
      $('.modal-body').html(json);
    //   console.log(json);
    //   $('#jbody2').empty();
    //   $('#jbody2').append(`
    //   <p style="white-space:wordwrap" name="jn">
    //    ${json}
    //   </p>`);
      console.log("I am here")
  })

</script>
<?= $this->endSection() ?>
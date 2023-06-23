<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>
<div class="cardsLayout mt-3">
  <div class="row ">
    <div class="card" style="width: 100%;">
      <div class="card-title text-center mt-3">
        <h3>Welcome to the Digital Use Conditions Profile Creator</h3>
        <hr>
      </div>
      <div class="card-body">
        This tool can be used to create a Digital Use Conditions profile for a given resource to describe its requirements for third party use. These requirements are based on 'Common Conditions of Use Element' (CCE) concepts.
      </div>
    </div>
  </div>

  <div class="row">
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <div class="row">
          <div class="col-6">
            <div class="card-header">
              <h3>Digital Use Conditions (DUC)</h3>
            </div>
            <div class="card-body text-justify">
              <b>“Digital Use Conditions” (DUC)</b>is an operational data structure designed to standardise the way consent and use conditions (relating to any resource) are computationally represented. A DUC structure that has been populated with asset information and consent and use conditions is called a <b>DUC Profile</b>.<br>
              DUC has been devised and tested by a TaskForce of the International Rare Disease Research Consortium (IRDiRC). <br>
            </div>
          </div>
          <div class="col-6 border-left">
            <div class="card-header">
              <h3>Common Conditions of use Elements (CCE)</h3>
            </div>
            <div class="card-body text-justify">
              <b>“Common Conditions of use Elements” (CCE)</b> comprises core set of “Use Condition Terms”. Each term within the CCE is designed to be atomic and non-directional in nature. As such they can be used as building blocks to construct a Use Conditions “policy” covering the general use conditions for a resource. CCEs are intended to be used in conjunction with DUC structure, allowing a profile to be produced that gives an overview of a resource and its associated use conditions. CCE are being developed and tested for use within Pillar 2 of the European Joint Programme on Rare Disease (EJP-RD).
            </div>
          </div>
        </div>
        <hr>
        
          <div class="text-center">
            <a href="<?php echo base_url() ?>/AddCon/index" class="btn mpbtn">Create Profile</a>
            <a href="<?php echo base_url() ?>/ViewCon/viewdata" class="btn mpbtn">Your Profiles</a>
            <a href="<?php echo base_url() ?>/Upload/index" class="btn mpbtn">Upload Profile</a>
            <a href="<?php echo base_url() ?>/Learn/index" class="btn mpbtn">Learn More</a>
          </div>


        <div class="mt-2 text-center">
          For more information please contact <a href="" id="tonyb">Anthony Brookes</a> or <a href="" id="sgib">Spencer Gibson</a> regarding the DUC and CCE models, or <a id="umar" href="">Umar Riaz</a> regarding supporting software.

        </div>
        <hr>
        <div class="row foo">

          <div class="col-4"><img src="<?php echo base_url('assets/img/IRDiRC-logo-about_edited-285x160.jpg') ?>" alt="img 3"></div>
          <div class="col-4"> <img src="<?php echo base_url('assets/img/RedBlockUoLlogo.png') ?>" alt="img 1"></div>
          <div class="col-4"><img src="<?php echo base_url('assets/img/cropped-EJP-RD-txt-horizontal.png') ?>"  alt="img 2"></div>

        </div>
      </div>
    </div>
  </div>



</div>



<script>
  $(document).ready(function() {

    var sgib = $('#sgib');
    var ts = $('#tims');
    var tob = $('#tonyb');
    var mm = $('#monm');
    var umar = $('#umar')
    sgib.on('click', function(e) {
      window.location.href = "mailto:spencer.gibson@leicester.ac.uk?subject=Duc_Profiler Query!";
    })
    ts.on('click', function(e) {
      window.location.href = "mailto:tim.skelton@uhl-tr.nhs.uk?subject=Duc_Profiler Query!";
    })
    tob.on('click', function(e) {
      window.location.href = "mailto:ajb97@leicester.ac.uk?subject=Duc_Profiler Query!";
    })
    mm.on('click', function(e) {
      window.location.href = "mailto:mm597@leicester.ac.uk?subject=Duc_Profiler Query!";
    })
    umar.on('click', function(e) {
      window.location.href = "mailto:ur13@leicester.ac.uk?subject=Duc_Profiler Query!";
    })
  })
</script>
<?= $this->endSection() ?>
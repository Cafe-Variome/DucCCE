<?php

/**
 * @author Umar Riaz
 * Created at 21/09/2021
 * 
 */

$this->session = \Config\Services::session();

?>
<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>
<form id="msform" action="<?php echo base_url('/Upload/upload'); ?>" method="post">

    <fieldset id="userinfofield">
        <div class="card-header">
            <h4 class="mb-0 text-center">Upload Profile</h4>
            <small class="text-muted mr-2">Please enter user info and upload profile</small>
        </div>
        <div id="userinformation">
            <div class="form-row mt-3 p-0">
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="u_fname">First Name:</label>
                    <input type="text" class="form-control" name="u_fname" id="u_fname" placeholder="Please enter first name">
                </div>
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="u_lname">Last Name:</label>
                    <input type="text" class="form-control" name="u_lname" id="u_lname" placeholder="Please enter last name">
                </div>
            </div>
            <div class="form-row mt-1 p-0">
                <div class="form-group col-md-12 col-12 col-12">
                    <label for="u_email">Email:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                    <input type="email" class="form-control" required name="u_email" id="u_email" placeholder="Please enter email">
                </div>
            </div>
            <div class="form-row mt-1 p-0">
                <div class="form-group col-md-12 col-12">
                    <label for="up_json">Upload Profile:<small class="text-danger"><i class="fas fa-star fa-xs"></i></label>
                    <input type="file" id="up_json" class="ml-4" name="jsonfile">
                    <input type="hidden" name="profile" id="jsn">
                </div>
            </div>
        </div>
        <small class="text-muted mr-2">All fields marked with </small><small class="text-danger">
            <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small>
        <hr>
        <input type="button" id="getJson" name="getJson" class="action-button" value="Submit" />
    </fieldset>
</form>


<script>
    $(document).ready(function() {
        $('#up_json').on('change', function() {
            var file_to_read = document.getElementById("up_json").files[0];

            if (file_to_read.type == 'application/json' || file_to_read.type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {

                if (file_to_read.type == 'application/json') {

                    var fileread = new FileReader();
                    fileread.onload = function(e) {

                        var content = e.target.result;
                        var j = alterJson(content);
                        $('#jsn').val(j);

                    }
                    fileread.readAsText(file_to_read);

                }

                if(file_to_read.type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'){

                    let fileReader = new FileReader();

                    fileReader.onload = function(e){

                        let data = event.target.result;
                        let workbook = XLSX.read(data,{type:"binary"});
                        var arr =[];
                        workbook.SheetNames.forEach(sheet => {

                            let rowObject = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheet]);
                            arr.push(rowObject);

                        });
                        var j = convertToJson(arr);
                        $('#jsn').val(j);

                    }
                    fileReader.readAsBinaryString(file_to_read);

                }

            } else {
                alert('Please select valid JSON only!');
                $('#up_json').val('');
                return;
            }





        });
        $('#getJson').on('click', function() {

            if ($('#u_email').val() == '' || $('#up_json').val() == '') {
                alert("Please fill all mandatory fields")
            } else {
                $('#msform').submit();
            }

        })
    })
</script>
<?= $this->endSection() ?>
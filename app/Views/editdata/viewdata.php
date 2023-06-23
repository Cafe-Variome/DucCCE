<?php

/**
 * @author Umar Riaz
 * Created at 16/03/2021
 * 
 */

$this->session = \Config\Services::session();

?>
<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>

<fieldset class="card" id="sumpage">
    <div class="card-header">
        <?php $referred_from = $this->session->get('previous_url'); ?>
        <a href="<?php echo $referred_from ?>" class="btn btn-small btn-outline-success float-left"><i class="fas fa-arrow-left"></i></a>
        <h4 class="mb-0 text-center">DUC Profile</h4>
        <small class="text-muted">Please download or edit the profile. </small>
    </div>
    <div class="form-row card-body">
        <div id="summary mt-3 mb-2" class="col-12">
            <table class="table table-striped table-bordered col-12">
                <colgroup>
                    <col span="1" style="width: 20%;">
                    <col span="1" style="width: 80%">
                </colgroup>
                <thead class="thead-dark" style="display: none;">
                    <tr class="row">
                        <th scope="col">Input</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <thead class="mt-2">
                        <tr>
                            <td colspan="2">
                                <div class="form-row" colspan=2>
                                    <h4 class="col-11 text-center">User Information</h4>
                                    <i id="edituserinfo" class="fas fa-edit edit btn btn-small btn-outline-success  float-right" data-toggle="modal" data-target="#userInfoModal"></i>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </tbody>
                <tbody id="userinfobody"></tbody>
                <tbody>
                    <thead>
                        <tr>
                            <td colspan="2">
                                <div class="form-row " colspan=2>
                                    <h4 class="col-11 text-center">Profile Information</h4>
                                    <i id="editprofileinfo" data-toggle="modal" data-target="#profileInfoModal" class="fas fa-edit edit btn btn-small btn-outline-success float-right"></i>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </tbody>
                <tbody id="profileinfobody"></tbody>

                <tbody>
                    <thead class="mt-2">
                        <tr>
                            <td colspan="2">
                                <div class="form-row" colspan=2>
                                    <h4 class="col-11 text-center">Resource Information</h4>
                                    <!-- perInfoModal -->
                                    <i id="editassetinfo" data-toggle="modal" data-target="#assetInfoModel" class="fas fa-edit edit btn btn-small btn-outline-success  float-right"></i>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </tbody>
                <tbody id="assetbody"></tbody>
                <tbody>
                    <thead class="mt-2">
                        <tr>
                            <td colspan="2">
                                <div class="form-row" colspan=2>
                                    <h4 class="col-11 text-center">Conditions</h4>
                                    <!-- conInfoModal -->
                                    <i id="editconinfo" data-toggle="modal" data-target="#ConInfoModal" class="fas fa-edit edit btn btn-small btn-outline-success  float-right"></i>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </tbody>
                <tbody id="conditionbody"></tbody>

            </table>
        </div>
    </div>

    <!-- Modal User -->
    <div class="modal fade" id="userInfoModal" tabindex="-1" role="dialog" aria-labelledby="UserInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-content1  ">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Update User Information</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userUpdate" class="mform" action="<?php echo base_url('Update/updateuser'); ?>" method="post">
                        <div class="form-row mt-1 p-0">
                            <!-- <div class="form-group col-md-6 col-6 col-12">
                                <label for="u_role">Role:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                                <input type="text" class="form-control" required name="u_role" id="u_role" placeholder="Please specify you role" value=<?php echo $userinfo->{'u_role'} ?>>
                            </div> -->
                            <div class="form-group col-md-12 col-12 col-12">
                                <label for="u_email">Email:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                                <input type="email" class="form-control" required name="u_email" id="u_email" placeholder="Please enter email" value=<?php echo $userinfo->{'u_email'} ?>>
                            </div>
                        </div>
                        <div class="form-row mt-3 p-0">
                            <div class="form-group col-md-6 col-6 col-12">
                                <input type="number" name="u_id" class="backvalue" value=<?php echo $userinfo->{'u_id'} ?>>
                                <input type="number" class="backvalue" name="p_id" value=<?php echo $profile->{'p_id'} ?>>
                                <label for="u_fname">First Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                                <input type="text" class="form-control" required name="u_fname" id="u_fname" placeholder="Please enter first name" value=<?php echo $userinfo->{'u_fname'} ?>>
                            </div>
                            <div class="form-group col-md-6 col-6 col-12">
                                <label for="u_lname">Last Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                                <input type="text" class="form-control" required name="u_lname" id="u_lname" placeholder="Please enter last name" value=<?php echo $userinfo->{'u_lname'} ?>>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="UpdateUserInfo" class="btn btn-primary">Update</button> </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Model -->
    <div class="modal fade" id="profileInfoModal" tabindex="-1" role="dialog" aria-labelledby="UserInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-content1">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Update Profile Information</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="profileUpdate" class="mform" action="<?php echo base_url('Update/updateprofile'); ?>" method="post">
                        <div class="form-row mt-3 p-0">
                            <div class="form-group col-md-6 col-6 col-12">
                                <input type="number" name="u_id" class="backvalue" value=<?php echo $userinfo->{'u_id'} ?>>
                                <input type="number" class="backvalue" name="p_id" value=<?php echo $profile->{'p_id'} ?>>
                                <label for="p_name">Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                                <input type="text" class="form-control" required name="p_name" id="p_name" placeholder="Please enter profile name">
                                <input type="hidden" name="profile" id="p_jsn">
                                <input type="date" class="form-control" hidden name="p_date" id="p_date" placeholder="Please enter profile created date">
                                <input type="text" hidden class="form-control" name="pr_id" id="pr_id" placeholder="Please enter profile id.">
                            </div>
                            <div class="form-group col-md-6 col-6 col-12">
                                <label for="p_version">Version:</label>
                                <input type="text" class="form-control" name="p_version" id="p_version" placeholder="Please specify profile version">
                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="UpdateProfileInfo" class="btn btn-primary">Update</button> </form>
                </div>
            </div>
        </div>
    </div>
    <!-- pModel End -->

    <!-- resource Model -->
    <div class="modal fade" id="assetInfoModel" tabindex="-1" role="dialog" aria-labelledby="UserInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-content1">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Update Resource Information</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="assetUpdate" class="mform" action="<?php echo base_url('Update/updateasset'); ?>" method="post">
                        <div class="form-row mt-3 p-0">
                            <div class="form-group col-md-6 col-sm-12 col-12">
                                <input type="number" name="u_id" class="backvalue" value=<?php echo $userinfo->{'u_id'} ?>>
                                <input type="number" class="backvalue" name="p_id" value=<?php echo $profile->{'p_id'} ?>>
                                <input type="text" class="backvalue" required name="p_name" value=<?php echo $profile->{'p_name'} ?>>
                                <label for="r_name">Name:</label>
                                <input type="text" name="r_name" id="r_name" placeholder="Please enter resource name." class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 col-12">
                                <label for="r_des">Description:</label>
                                <input type="text" name="r_des" id="r_des" placeholder="Please enter resource description." class="form-control">
                            </div>
                        </div>
                        <div class="form-row mt-1 p-0">
                            <div class="form-group col-md-6 col-sm-12 col-12">
                                <span id="r_Datalevel">
                                    <label for="r_dlevel">Data Level:</label>
                                    <select name="r_dlevel" id="r_dlevel" class="form-control" multiple>
                                        <option></option>
                                        <option>UNKNOWN</option>
                                        <option>DATABASE</option>
                                        <option>METADATA</option>
                                        <option>SUMMARISED</option>
                                        <option>DATASET</option>
                                        <option>RECORDSET</option>
                                        <option>RECORD</option>
                                        <option>RECORDFIELD</option>
                                        <option>MATERIALS</option>
                                        <option>OTHER</option>
                                    </select>

                                </span>

                            </div>
                            <div class="form-group col-md-6 col-sm-12 col-12">
                                <span id="r_contactspan">
                                    <label for="r_contact">Contacts :</label>
                                    <select name="r_contact" id="r_contact" class="form-control" multiple>
                                        <option></option>
                                    </select>

                                </span>

                            </div>

                        </div>
                        <div class="r_org mt-n2">
                            <div class="r_orgroup mb-1">
                                <div class="form-row"><label>Organisations:</label></div>
                                <div class="form-row">
                                    <span class="org col-md-10 col-sm-10 col-12 row">
                                        <div class="col-md-6 col-sm-6 col-12"><input type="text" class="form-control orgn" placeholder="Please enter organisation name." name="org_name[]"></div>
                                        <div class="col-md-6 col-sm-6 col-12"><input type="text" class="form-control orgr" placeholder="Please enter organisation role." name="org_role[]"></div>
                                        <input type="hidden" name="profile" id="a_jsn">
                                    </span>
                                    <div class="col-md-2 col-sm-2 col-2">
                                        <button type="button" id="addorganisation" class="btn addorganisation form-control btn-light"><i class="fas fa-plus"></i></button><small class="text-muted">Add More Organisations</small>
                                    </div>

                                </div>

                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="UpdateAssetInfo" class="btn btn-primary">Update</button> </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Resource Model End -->


    <!-- Condition Model -->

    <div class="modal fade" id="ConInfoModal" tabindex="-1" role="dialog" aria-labelledby="UserInfoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-content1">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Update Conditions</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="conUpdate" class="mform" action="<?php echo base_url('Update/updateconditions'); ?>" method="post">


                        <input type="number" name="u_id" class="backvalue" value=<?php echo $userinfo->{'u_id'} ?>>
                        <input type="number" class="backvalue" name="p_id" value=<?php echo $profile->{'p_id'} ?>>
                        <input type="text" class="backvalue" name="p_name" value=<?php echo $profile->{'p_name'} ?>>


                        <div id="conditions">


                        </div>
                        <div class="form-row mb-4">
                            <div class="col-md-2 col-2"> <button type="button" id="Eaddcon" class="form-control addcon btn btn-light"><i class="fas fa-plus"></i>Condition</button></div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="UpdateConInfo" class="btn btn-primary">Update</button>
                    <input type="hidden" name="profile" id="c_jsn">
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="text-center mb-3">
        <div class="dropdown">
            <button type="dropbtn" id="dson" class="btn dropbtn btn-info">Download Profile</button>
            <div class="dropdown-content">
                <a href="#" id="jsdld">JSON</a>
                <a href="#" id="exdld">Excel</a>
                <!-- <a href="#">Link 3</a> -->
            </div>
        </div>

    </div>


    <hr>


</fieldset>
<script>
    var d = <?php echo json_encode($profile) ?>;
    var u = <?php echo json_encode($userinfo) ?>;
    console.log(JSON.parse(d["p_data"]));

    let terms = [
    //who 
    "Use by a commercial entity",
    //where
    "Geographical area",
    "Regulatory jurisdiction",
    // why
    "Research use",
    "Clinical research",
    "Disease specific use",
    "Clinical care",
    "Use as control",
    "Profit motivated use",
    "Return of results",
    "Return of incidental findings",
    "(Re-)identification of individuals without the involvement of the resource provider",
    "(Re-)identification of individuals mediated by the resource provider",

    // How
    "Time period of use",
    "Collaboration", 
    "Fees", 
    "Publication moratorium", 
    "Publication",
    "User authentication",
    "Ethics Approval"
    ];

    var profile = JSON.parse(d["p_data"]);

    var pinfo = profile["profile"];

    // rinfo.push(profile["resource"])
    var cinfo = profile["Conditions"];
    var cmnt = profile["Comments"];
    var rinfo = [];

    if (Array.isArray(profile["resource"])) {

        rinfo = profile["resource"];
    } else {

        rinfo.push(profile["resource"])
    }


    $('#jsdld').on('click', function() {

        var p = {};

        p["profile"] = pinfo;
        p["resources"] = rinfo;
        p["Conditions"] = cinfo;
        p["Comments"] = cmnt;

        var Json = [];
        Json.push(p);

        var x = JSON.stringify(Json[0], null, '\t');
        J_Download(profile);
    })
    $('#exdld').on('click', function() {

        var p = {};

        p["profile"] = pinfo;
        p["resources"] = rinfo;
        p["Conditions"] = cinfo;
        p["Comments"] = cmnt;

        var Json = [];
        Json.push(p);

        var x = JSON.stringify(Json[0], null, '\t');
        xls_Download(profile);
    })


    // User Info
    $("#userinfobody").append(`
               <tr>
                    <td><b>First Name</b></td>
                    <td class="text-left">${u['u_fname']}</td>
               </tr>
               <tr>
                    <td><b>Last Name</b></td>
                    <td class="text-left">${u['u_lname']}</td>
               </tr>
               <tr>
                    <td><b>Email</b></td>
                    <td class="text-left">${u['u_email']}</td>
               </tr>
    `);

    // Profile Info

    $('#profileinfobody').append(`

        <tr>
            <td><b>Name</b></td>
            <td class="text-left">${pinfo['profileName']}</td>
        </tr>
        <tr>
            <td><b>Version</b></td>
            <td class="text-left">${pinfo['profileVersion']}</td>
        </tr>
    
    
    `);

    $('#p_name').val(pinfo['profileName']);
    $('#p_version').val(pinfo['profileVersion']);
    $('#pr_id').val(pinfo['profileID']);
    $('#p_date').val(pinfo['profileCreateDate']);

    $('#UpdateProfileInfo').on('click', function() {

        var np = {};

        np['profileName'] = $("#p_name").val();
        np['profileVersion'] = $("#p_version").val();
        np['profileID'] = $("#pr_id").val();
        np['profileCreateDate'] = pinfo['profileCreateDate']

        var nj = {};

        nj["profile"] = np;
        nj["resources"] = rinfo;
        nj["Conditions"] = cinfo;

        var j = [];
        j.push(nj);
        var k = JSON.stringify(j[0]);
        $('#p_jsn').val(k);

        console.log($('#p_jsn').val());
        console.log(pinfo['profileCreateDate']);

        // $('#profileUpdate').submit();

        if ($("#profileUpdate").valid()) {
            $('#profileUpdate').submit();
        } else {
            alert("Please fill all mandatory fields")
        }



    });

    // Asset Info

    var d = '';

    if (Array.isArray(rinfo)) {
        var org = rinfo[0]['resourceOrganisations'];
    } else {
        var org = rinfo['resourceOrganisations'];
    }

    if (org != undefined) {
        $.each(org, function(e) {


            d += org[e]['resourceOrganisationName'] + ' (' + org[e]['resourceOrganisationRole'] + ') ;';

        });
    }


    // if (rinfo.length > 0) {

    //     $.each(rinfo, function(k, v) {

    //         $('#assetbody').append(`

    //             <tr>
    //             <td><b>Resource Name</b></td>
    //             <td class="text-left">${v['resourceName']}</td>
    //             </tr>


    //         `);


    //     })
    // }

    // console.log(rinfo)

    if (Array.isArray(rinfo)) {
        $('#assetbody').append(`

<tr>
<td><b>Resource Name</b></td>
<td class="text-left">${rinfo[0]['resourceName']}</td>
</tr>
<tr>
<tr>
<td><b>Description</b></td>
<td class="text-left">${rinfo[0]['resourceDescription']}</td>
</tr>
<tr>
<td><b>Data Level</b></td>
<td class="text-left">${rinfo[0]['resourceDataLevel']}</td>
</tr>
<tr>
<td><b>Contacts</b></td>
<td class="text-left">${rinfo[0]['resourceContacts']}</td>
</tr>



`);



    } else {

        $('#assetbody').append(`

<tr>
<td><b>Resource Name</b></td>
<td class="text-left">${rinfo['resourceName']}</td>
</tr>


<tr>
<td><b>Description</b></td>
<td class="text-left">${rinfo['resourceDescription']}</td>
</tr>
<tr>
<td><b>Data Level</b></td>
<td class="text-left">${rinfo['resourceDataLevel']}</td>
</tr>
<tr>
<td><b>Contacts</b></td>
<td class="text-left">${rinfo['resourceContacts']}</td>
</tr>




`);




    }

    if (d != ' ') {
        $('#assetbody').append(`
        <tr>
            <td><b>Organisations</b></td>
            <td class="text-left">${d}</td>
        </tr>
        `);
    }


    if (Array.isArray(rinfo)) {

        $('#r_name').val(rinfo[0]['resourceName']);
        $('#r_des').val(rinfo[0]['resourceDescription']);
        var d = $('#r_dlevel')
        var c = $('#r_contact');
        setOptions(d, rinfo[0]['resourceDataLevel']);
        setOptions(c, rinfo[0]['resourceContacts']);

    } else {
        $('#r_name').val(rinfo['resourceName']);
        $('#r_des').val(rinfo['resourceDescription']);
        var d = $('#r_dlevel')
        var c = $('#r_contact');
        setOptions(d, rinfo['resourceDataLevel']);
        setOptions(c, rinfo['resourceContacts']);
    }


    if (org != undefined) {
        $('.orgn').val(org[0]['resourceOrganisationName']);
        $('.orgr').val(org[0]['resourceOrganisationRole']);
    }

    $.each(org, function(e) {

        if (e > 0) {

            $(".r_org").append(` 
                <div class="r_orgroup mb-2">
                <div class="form-row">
                <div class="col-md-5 col-sm-5 col-12"><input type="text" class="form-control" placeholder="Please enter organisation name." value="${org[e]['resourceOrganisationName']}" name="org_name[]"></div>
                <div class="col-md-5 col-sm-5 col-10"><input type="text" class="form-control" placeholder="Please enter organisation role." value="${org[e]['resourceOrganisationRole']}" name="org_role[]"></div>
                <div class="col-md-2 col-sm-2 col-2"><button type="button" id="removeorg" class="btn btn-small removeorg btn-danger"><i class="fas fa-minus"></i></button></div>
                </div>
                </div>
            `);
        }
    })


    $('#UpdateAssetInfo').on('click', function(e) {
        var naa = [];
        var na = {};
        na['resourceName'] = $('#r_name').val();
        na['resourceDescription'] = $('#r_des').val();
        na['resourceDataLevel'] = $('#r_dlevel').val();
        na['resourceContacts'] = $('#r_contact').val();

        // org entry
        var Org = [];
        var orgs = document.getElementsByClassName("r_org");
        $.each(orgs, function(r) {
            var x = orgs[r].getElementsByClassName("r_orgroup");

            $.each(x, function(y) {
                var orgItem = {};
                var i = x[y].querySelectorAll("input");
                orgItem['resourceOrganisationName'] = $(i[0]).val();
                orgItem['resourceOrganisationRole'] = $(i[1]).val();
                Org.push(orgItem);
            });


        });

        naa.push(na);


        na['resourceOrganisations'] = Org;
        console.log(na);

        var nj = {};
        nj["profile"] = pinfo;
        nj["resources"] = naa;
        nj["Conditions"] = cinfo;

        var j = [];
        j.push(nj);

        var k = JSON.stringify(j[0]);
        $('#a_jsn').val(k);
        // $('#assetUpdate').submit();
        if ($("#assetUpdate").valid()) {
            $('#assetUpdate').submit();
        } else {
            alert("Please fill all mandatory fields  ")
        }


    });


    // Update Conditions   conditionbody


    setCon();

    $('#UpdateConInfo').click(function() {

        var Condition = [];
        var conDiv = document.getElementsByClassName('congroup');
        $.each(conDiv, (i) => {


            var info = [];
            var conInfo = conDiv[i].getElementsByClassName('conInfo');

            $.each(conInfo, function(x) {

                var inputs = conInfo[x].querySelectorAll("input, select,textarea");
                var Item = {};
                $.each(inputs, function(i) {

                    var input = $(this);
                    var nm = input.attr('name');
                    var name = input.parent().find("label").text().slice(0, -1);
                    var value = input.val();

                    if (name == "Use Condition") {
                        Item["useConditionLabel"] = value;
                    } else if (name == "Rule") {
                        Item["rule"] = value;
                    }
                    if (name == "Condition Detail") {
                        Item["conditionDetailLabel"] = value;
                    }
                    if (name == "Scope") {
                        Item["scope"] = value;
                    }
                    // if (name == "Condition Applicability") {
                    //     Item["ruleApplication"] = value;
                    // }
                    // Condition Applicability
                    else if (name == "Condition Rule Modifier" || name == "Other Considerations") {
                        Item["otherConsiderations"] = value;
                    }

                })

                Condition.push(Item);

            });


        })


        nj = [];

        var nj = {};
        nj["profile"] = pinfo;
        nj["resource"] = rinfo;
        nj["Conditions"] = Condition;

        var j = [];
        j.push(nj);
        var k = JSON.stringify(j[0]);
        $('#c_jsn').val(k);

        if ($("#conUpdate").valid()) {
            if ($('#conditions').children().length == 0) {

                alert("Please add atleast one condition")
            } else {
                $('#conUpdate').submit();
            }

        } else {
            alert("Please fill all mandatory fields  ")
        }



    });

    $(document).on('click', '.EremoveCon', function() {

        $(this).closest('.congroup').remove();

        var ls = $('.ltext');

        if (ls.length > 0) {

            $.each(ls, function(i, v) {

                $(v).text('');
                $(v).text('Statement ' + (i + 1));

            })
        }
    })

    function setCon() {
        console.log(cinfo);
        var c = 1;
        var xyz = [];
        xyz = cinfo.sort(function(a, b) {
            if (a.conditionTermLabel != undefined) {
                var textA = a.conditionTermLabel.toUpperCase();
                var textB = b.conditionTermLabel.toUpperCase();
                return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;

            }

            if (a.useConditionLabel != undefined) {
                var textA = a.useConditionLabel.toUpperCase();
                var textB = b.useConditionLabel.toUpperCase();
                return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;

            }

        });
        $.each(xyz, function(x) {

            console.log(xyz[x])


            var t = '';
            if (xyz[x]["conditionTermLabel"] != undefined) {
                t = xyz[x]["conditionTermLabel"];
            } else {
                if (xyz[x]["useConditionLabel"] != undefined) {
                    t = xyz[x]["useConditionLabel"];

                }
            }

            var d = "";

            if (xyz[x]["conditionDetailLabel"] != undefined) {
                d = xyz[x]["conditionDetailLabel"]
            } else {
                d = d = xyz[x]["ConditionDetailValue"]

            }

            var role = xyz[x]["rule"] != undefined ? xyz[x]["rule"] : '';
            var rm = xyz[x]["otherConsiderations"] != undefined ? xyz[x]["otherConsiderations"] : '';
            var scp = xyz[x]["scope"] != undefined ? xyz[x]["scope"] : '';
            var app = xyz[x]["ruleApplication"] != undefined ? xyz[x]["ruleApplication"] : '';

            $('#conditionbody').append(`

                <tr>
                <td><b>Condition ${xyz[x]["ConditionDetail"] ==undefined ? c: c}</b></td>
                <td class="text-left">Term: ${t},  Detail: ${d},  Scope:${scp},  Rule: ${role}, Other Considerations: ${rm}</td>
                </tr>

                `);

            var b = '';
            var r = '';
            var s = '';
            var togglebtn = '';
            var rtbtn = '';
            var rreq = 'required';
            var rbtn = `<input checked="checked" class="radio-checked_input on" id="on${c}" name="statuscon${c}" type="radio" value="on" />
                    <label class="radio-checked_label radio-checked_label--on" for="on${c}" >Applicable</label>
                    <input class="radio-checked_input off" name="statuscon${c}" id="off${c}" type="radio" value="off" />
                    <label class="radio-checked_label radio-checked_label--off " for="off${c}" >Not Applicable</label>`;
            var applicable = false;
            var appli = 'Applicable';
            if (app == 'Not Applicable') {

                var appli = 'Not Applicable';

                applicable = true
                rreq = '';
                rbtn = `<input  class="radio-checked_input on" id="on${c}" name="statuscon${c}" type="radio" value="on" />
                    <label class="radio-checked_label radio-checked_label--on" for="on${c}" >Applicable</label>
                    <input checked="checked" class="radio-checked_input off" name="statuscon${c}" id="off${c}" type="radio" value="off" />
                    <label class="radio-checked_label radio-checked_label--off " for="off${c}" >Not Applicable</label>`;

            } else {
                r = role;
                s = scp
            }
            if (c > 0) {
                b = '<button type="button" id="removePerson" class=" closebtn  mr-2 btn btn-small EremoveCon btn-danger"><i class="fas fa-times"></i></button>';
                ltext = 'ltext';
            } else {

                // togglebtn = '<small class="text-info ml-3"><a id="showTermModalUp" href="#" ><i class="fas fa-info-circle"></i></a></small>';
                rtbtn = `<small class="text-info ml-3"><a data-toggle="popover" data-trigger="focus" id="infoP" href="#"><i class="fas fa-info-circle"></i></a></small>`;

            }
            let sn = $('#conditions').children().length;

            $("#conditions").append(`

            <div class=" congroup" id="con${c}">
    <div class="form-row mt-3">
        <legend class="col-6 col-md-6 ltext" visible="true">Statement ${sn+1}</legend>
        <button type="button" id="removePerson" class="  closebtn  mr-2 btn btn-small EremoveCon btn-danger"><i
                class="fas fa-times"></i></button>
    </div>
    <div class="conInfo">
        <div class="form-row ml-2 mr-2">
            <div class="form-group form-groupC col-md-4 col-sm-12 col-12">
                <span id="c_term${c}">
                    <label for="r_dlevel">Use Condition:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                    <select name="c_term" required class="form-control c_term">
                    <option selected>${t}</option>
                    </select>
                </span>
            </div>
            <div class="form-group form-groupC col-md-8 col-sm-12 col-12">
                <span id="c_detail${c}">
                    <label for="c_detail">Condition Detail:</label>
                    <textarea type="textarea" rows="1" maxlength="250" class="form-control c_detail" name="c_detail"
                        placeholder="Please enter qualifiers for the condition term (optional)">${d}</textarea>
                </span>
            </div>

        </div>
        <div class="form-row ml-2 mr-2">
            <div class="form-group form-groupC ruleG col-md-4 col-sm-12 col-12 " id="ruleG${c}">
                <span id="c_appli${c}">
                    <input type="text" name="c_ava" class="form-controle backvalue">
                </span>
                <span id="c_rule${c}">
                    <label for="c_rule">Rule:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                    <select name="c_rule" required class="form-control c_rule">
                    <option selected>${role}</option>
                    </select>
                </span>
            </div>
            <div class="form-group form-groupC col-md-8 col-sm-12 col-12">
                <span id="c_ruleScope1">
                    <label for="c_rscope">Scope:</label><small class="text-danger"><i class="fas fa-star fa-xs"></i></small>
                    <select name="c_rscope" required  class="form-control c_rscope">
                    <option selected>${scp}</option>
                    </select>
                </span>
            </div>
        </div>
        <div class="form-row ml-2 mr-2">
            <div class="form-group  col-md-12 col-sm-12 mt-0">
                <span id="r_detail${c}">
                    <label for="r_detail">Other Considerations:</label>
                    <textarea type="textarea" rows="1" maxlength="250" class="form-control r_detail" name="r_detail" placeholder="Please enter any other relevant information for this Condition & Rule (optional)">${rm}</textarea>
                </span>
            </div>
        </div>
    </div>

</div>
   
   
            `);



            c++;

            if ($('#conditions').hasScrollBar()) {

                $('#conditions').get(0).scrollTop = $('#conditions').get(0).scrollHeight;

            }

        })

    }

    $(document).on('click', '#Eaddcon', function() {

        let s = $('#conditions').children().length;
        let c = s + 1;

        $("#conditions").append(`
<div class=" congroup" id="con${c}">
<div class="form-row mt-3">
  <legend class="col-6 col-md-6 ltext" visible="true">Statement ${s+1}</legend>
  <button type="button" id="removePerson" class="  closebtn  mr-2 btn btn-small EremoveCon btn-danger"><i
          class="fas fa-times"></i></button>
</div>
<div class="conInfo">
  <div class="form-row ml-2 mr-2">
      <div class="form-group form-groupC col-md-4 col-sm-12 col-12">
          <span id="c_term${c}">
              <label for="r_dlevel">Use Condition:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
              <select name="c_term" required class="form-control c_term">
                  <option></option>
              </select>
          </span>
      </div>
      <div class="form-group form-groupC col-md-8 col-sm-12 col-12">
          <span id="c_detail${c}">
              <label for="c_detail">Condition Detail:</label>
              <textarea type="textarea" rows="1" maxlength="250" class="form-control c_detail" name="c_detail"
                  placeholder="Please enter qualifiers for the condition term (optional)"></textarea>
          </span>
      </div>

  </div>
  <div class="form-row ml-2 mr-2">
      <div class="form-group form-groupC ruleG col-md-4 col-sm-12 col-12 " id="ruleG${c}">
          <span id="c_appli${c}">
              <input type="text" name="c_ava" class="form-controle backvalue">
          </span>
          <span id="c_rule${c}">
              <label for="c_rule">Rule:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
              <select name="c_rule" required class="form-control c_rule">
                  <option></option>
              </select>
          </span>
      </div>
      <div class="form-group form-groupC col-md-8 col-sm-12 col-12">
          <span id="c_ruleScope1">
              <label for="c_rscope">Scope:</label><small class="text-danger"><i class="fas fa-star fa-xs"></i></small>
              <select name="c_rscope" required  class="form-control c_rscope">
               <option></option>
              </select>
          </span>
      </div>
  </div>
  <div class="form-row ml-2 mr-2">
      <div class="form-group  col-md-12 col-sm-12 mt-0">
          <span id="r_detail${c}">
              <label for="r_detail">Other Considerations:</label>
              <textarea type="textarea" rows="1" maxlength="250" class="form-control r_detail" name="r_detail" placeholder="Please enter any other relevant information for this Condition & Rule (optional)"></textarea>
          </span>
      </div>
  </div>
</div>

</div>

`);

        $(".c_term").select2({
            placeholder: "Please select or enter use condition",
            theme: "bootstrap",
            width: "100%",
            data: terms
        });
        $('.c_rscope').select2({
            placeholder: "Please select condition & rule scope",
            theme: "bootstrap",
            width: "100%",
            data: ["Whole of Resource", "Part of Resource"]
        });

        autosize($('.c_detail'));
        autosize($('.r_detail'));



    })

    function setOptions(selector, arr) {
        if (Array.isArray(arr)) {
            $.each(arr, function(key, value) {
                var o = new Option(value, value, true, true);
                selector.append(o).trigger('change');
                selector.change();
            })
        } else {
            var e = arr;
            var o = new Option(e, e, true, true);
            selector.append(o).trigger('change');
            selector.change();
        }

    }
</script>
<!-- <script id="viewScript" src="<?php echo base_url('assets/js/viewdata.js') ?>"></script> -->
<?= $this->endSection() ?>
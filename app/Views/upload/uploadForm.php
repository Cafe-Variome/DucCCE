<?php

/**
 * @author Umar Riaz
 * Created at 01/07/2020
 * 
 */
?>

<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>

<!-- multistep form -->
<form id="msform" action="<?php echo base_url('/AddCon/sava_profile'); ?>" method="post">
    <!-- progressbar -->
    <ul id="progressbar">
        <li id="uinfo" class="active">User</li>
        <li id="pinfo">Profile</li>
        <li id="rinfo">Resource</li>
        <li id="cinfo">Use Statements</li>
        <!-- <li id="cinfo">Use Conditions</li>
            <li id= "pinfo">Publications</li> -->
        <li id="sinfo">Summary</li>

    </ul>

    <!-- fieldsets -->
    <!-- User Info -->
    <fieldset id="userinfofield">
        <div class="card-header">
            <h3 class="mb-0 text-center">User Information</h3>
            <small class="mb-0 text-center">Please enter details of the person creating the DUC profile</small>
            <!--             <small class="text-muted mr-2">All fields marked with </small><small class="text-danger">
                <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small> -->
        </div>
        <div id="userinformation">

            <div class="form-row mt-3 p-0">
                <!-- <div class="form-group col-md-6 col-6 col-12">
                    <label for="u_role">Role:</label>
                    <input type="text" class="form-control" value="<?php if (isset($role)) echo $role ?>" name="u_role" id="u_role" placeholder="Please specify you role">
                </div> -->
                <div class="form-group col-md-12 col-12 col-12">
                    <label for="u_email">Email:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                    <input type="email" class="form-control" value="<?php if (isset($u_email)) echo $u_email ?>" required name="u_email" id="u_email" placeholder="Please enter email">
                </div>
            </div>
            <div class="form-row mt-1 p-0">
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="u_fname">First Name:</label>
                    <input type="text" class="form-control" value="<?php if (isset($u_fname)) echo $u_fname ?>" name="u_fname" id="u_fname" placeholder="Please enter first name">
                </div>
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="u_lname">Last Name:</label>
                    <input type="text" class="form-control" value="<?php if (isset($u_lname)) echo $u_lname ?>" name="u_lname" id="u_lname" placeholder="Please enter last name">
                </div>
            </div>
        </div>
        <small class="text-muted mr-2">All fields marked with </small><small class="text-danger">
            <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small>
        <hr>

        <input name="next" id="userInfo" class="next btn action-button" value="Next" />
        <input type="button" name="bc" id="userToSum" class="action-button backToSum" value="Summary" />
    </fieldset>
    <!-- Profile Info -->
    <fieldset id="profileinfofield">
        <div class="card-header">
            <h3 class="mb-0 text-center">Profile Information</h3>
            <small class="mb-0 text-center">Please enter a name and version number for this DUC profile</small>

            <!-- <small class="text-muted mr-2">All fields marked with </small><small class="text-danger"> -->
            <!-- <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small> -->
        </div>
        <div id="pinformation">
            <div class="form-row mt-3 p-0">
                <!-- <div class="form-group col-md-6 col-6 col-12 hidden">
                    <label for="p_id">Id:</label> -->

                <!-- </div> -->
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="p_name">Profile Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                    <input type="text" class="form-control" required name="p_name" id="p_name" placeholder="Please create a name for this profile">
                </div>
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="p_version">Profile Version:</label>
                    <input type="text" class="form-control" name="p_version" id="p_version" placeholder="Please create a version for this profile e.g. v1.0">
                </div>
            </div>
            <div class="form-row">
                <input type="text" class="form-control hidden" name="p_id" id="p_id" placeholder="Please enter profile id.">
            </div>
            <div class="form-row mt-1 p-0 hidden">
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="p_date">Date:</label>
                    <input type="date" class="form-control" hidden name="p_date" id="p_date" placeholder="Please enter profile created date">
                </div>
            </div>
            <!-- <div class="form-row mt-1 p-0">
                <span class="form-group col-md-12 col-12 col-12" id="p_reflist">
                    <label for="p_refs">References:</label>
                    <select name="p_refs[]" id="p_refs" class="form-control" multiple="multiple">
                    </select>
                </span>

            </div> -->
        </div>
        <small class="text-muted mr-2">All fields marked with </small><small class="text-danger">
            <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small>
        <hr>
        <input type="button" name="previous" class="previous btn action-button" value="Previous" />
        <input name="next" id="pInfo" class="next btn action-button" value="Next" />
        <input type="button" name="bc" id="profileToSum" class=" action-button backToSum" value="Summary" />
    </fieldset>

    <!-- Resource  -->
    <fieldset id="resoucefield">
        <div class="card-header">
            <h3 class="mb-0 text-center">Resource Information</h3>
            <small class="mb-0 text-center">Please enter details of the resource/asset for this DUC profile</small>

            <!-- <small class="text-muted mr-2">All fields marked with </small><small class="text-danger">
                <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small> -->
        </div>
        <div id="resource">
            <div class="form-row mt-3 p-0">
                <div class="form-group col-md-6 col-sm-12 col-12">
                    <label for="r_name">Resource Name:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small></label>
                    <input type="text" name="r_name" required id="r_name" placeholder="Please enter resource name." class="form-control">
                </div>
                <div class="form-group col-md-6 col-sm-12 col-12">
                    <label for="r_des">Resource Description:</label>
                    <input type="text" name="r_des" id="r_des" placeholder="Please enter resource description." class="form-control">
                </div>
                <!-- <div class="form-group col-md-4 col-sm-12 col-12">
                    <label for="r_att">Attributioin:</label>
                    <input type="text" name="r_att" id="r_att" placeholder="Please enter attribution." class="form-control">
                </div> -->

            </div>
            <!-- <div class="form-row mt-1 p-0">

                <div class="form-group col-md-4 col-sm-12 col-12">
                    <span id="r_disposition">
                        <label for="r_disp">Disposition:</label>
                        <select name="r_disp" id="r_disp" class="form-control">
                            <option></option>
                            <option>DELETE</option>
                            <option>DESTRUCTION_CERTIFICATE</option>
                            <option>RETURN_TO_CONTRIBUTOR</option>

                        </select>

                    </span>

                </div>
                <div class="form-group col-md-4 col-sm-12 col-12">
                    <span id="r_permission">
                        <label for="r_pmode">Permission Mode:</label>
                        <select name="r_pmode" id="r_pmode" class="form-control">
                            <option></option>
                            <option>All unstated conditions permitted</option>
                            <option>All unstated conditions forbidden</option>

                        </select>

                    </span>

                </div>
            </div> -->
            <!-- <div class="form-row mt-1 p-0">
                <div class="form-group col-md-4 col-sm-12 col-12">
                    <label for="r_geography">Geography:</label>
                    <input type="text" class="form-control" id="r_geography" name="r_geography" placeholder="Please enter resource geography.">
                </div>
                <div class="form-group col-md-4 col-sm-12 col-12">
                    <label for="r_reldate">Release Date:</label>
                    <input type="date" name="r_reldate" class="form-control">
                </div>
                <div class="form-group col-md-4 col-sm-12 col-12">
                    <label for="r_rperiod">Retention Period:</label>
                    <input type="text" name="r_rperiod" id="r_rperiod" class="form-control" placeholder="Please enter resource retention period.">
                </div>
            </div> -->

            <div class="form-row mt-1 p-0">
                <div class="form-group col-md-6 col-sm-12 col-12">
                    <span id="r_Datalevel">
                        <label for="r_dlevel">Data Level of Resource:<small class="text-info ml-3"><a data-toggle="modal" id="dmodalS" href="#"><i class="fas fa-info-circle"></i></a></small></label>
                        <select name="r_dlevel" id="r_dlevel" class="form-control">
                            <option></option>
                            <option>Patient Registry</option>
                            <option>Biobank</option>
                            <option>Guideline</option>
                            <option>Dataset</option>
                        </select>

                    </span>

                </div>
                <div class="form-group col-md-6 col-sm-12 col-12">
                    <span id="r_contactspan">
                        <label for="r_contact">Points of Contact :</label>
                        <select name="r_contact" id="r_contact" class="form-control" multiple>
                            <option></option>
                        </select>

                    </span>

                </div>
                <!-- <div class="form-group col-md-6 col-sm-12 col-12">
                    <label for="r_lic">License:</label>
                    <input type="text" name="r_lic" id="r_lic" class="form-control" placeholder="Please enter resource license.">
                </div> -->
            </div>
        </div>
        <div class="r_org mt-n2">
            <div class="r_orgroup mb-1">
                <div class="form-row"><label>Organisations related to Resource:</label></div>
                <div class="form-row">
                    <span class="org col-md-10 col-sm-10 col-12 row">
                        <div class="col-md-6 col-sm-6 col-12"><input type="text" class="form-control " id="orgn1" placeholder="Please enter organisation name." name="org_name[]"></div>
                        <div class="col-md-6 col-sm-6 col-12"><input type="text" class="form-control " id="orgr1" placeholder="Please enter organisation role." name="org_role[]"></div>
                    </span>
                    <div class="col-md-2 col-sm-2 col-2">
                        <button type="button" id="addorganisation" class="btn addorganisation form-control btn-light"><i class="fas fa-plus"></i></button><small class="text-muted">Add More
                            Organisations</small>
                    </div>

                </div>

            </div>
        </div>
        <small class="text-muted mr-2">All fields marked with </small><small class="text-danger">
            <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small>

        <hr>
        <input type="button" name="previous" class="previous btn action-button" value="Previous" />
        <input name="next" id="dataInfo" class="next btn action-button" value="Next" />
        <input type="button" id="dataToSum" name="bc" class="btn action-button backToSum" value="Summary" />
    </fieldset>
    <fieldset id="conField">
        <div class="card-header">
            <h3 class="mb-0 text-center">Condition of Use Statements</h3>
            <p class="nowrap text-center text-muted">Create at least one Condition of Use Statement using the following format: Considering the stated [<b>conditionTerm</b>],this form of use is set by [<b>rule</b>], and applies to the [<b>scope</b>] of the asset.</p>
        </div>
        <div id="conditions">

        </div>
        <div class="form-row mb-4">
            <div class="col-md-2 col-2"> <button type="button" id="Uaddcon" class="form-control addcon btn"><i class="fas fa-plus"></i> Condition</button></div>
        </div>
        <small class="text-muted mr-2">All fields marked with </small><small class="text-danger">
            <i class="fas fa-star fs"> </i></small><small class="text-muted ml-2">are mandatory.</small>
        <hr>
        <input type="button" name="previous" class="btn previous action-button" value="Previous" />
        <input type="button" id="conInfo" name="next" class="btn next action-button" value="Next" />
        <input type="button" name="bc" id="conToSum" name="bc" class="btn action-button backToSum" value="Summary" />
    </fieldset>
    <fieldset id="summaryField">
        <div class="card-header">
            <h3 class="mb-0 text-center">Summary</h3>
            <small class="text-muted">Please review your DUC profile. </small>
        </div>
        <div class="form-row">
            <div id="summary mt-3 mb-2" class="col-12">
                <table class="table table-striped table-bordered col-12">
                    <colgroup>
                        <col span="1">
                        <col span="1">
                        <col span="1">
                        <col span="1">
                        <col span="1">
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
                                <td colspan="5">
                                    <div class="form-row" colspan=2>
                                        <div class="col-1"></div>
                                        <h4 class="col-10 text-center">User Information</h4>
                                        <i id="edituserinfo" class="fas fa-edit edit btn btn-small btn-outline-success  float-right"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    </tbody>
                    <tbody id="userinfobody"></tbody>
                    <tbody>
                        <thead class="mt-2">
                            <tr>
                                <td colspan="5">
                                    <div class="form-row" colspan=2>
                                        <div class="col-1"></div>
                                        <h4 class="col-10 text-center">Profile Information</h4>
                                        <i id="editpinfo" class="fas fa-edit edit btn btn-small btn-outline-success  float-right"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    </tbody>
                    <tbody id="pinfobody"></tbody>
                    <tbody>
                        <thead>
                            <tr>
                                <td colspan="5">
                                    <div class="form-row " colspan=2>
                                        <div class="col-1"></div>
                                        <h4 class="col-10 text-center">Resource Information</h4>
                                        <i id="editdatasetinfo" class="fas fa-edit edit btn btn-small btn-outline-success float-right"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    </tbody>
                    <tbody id="datainfobody"></tbody>

                    <tbody>
                        <thead class="mt-2">
                            <tr>
                                <td colspan="5">
                                    <div class="form-row" colspan=2>
                                        <div class="col-1"></div>
                                        <h4 class="col-10 text-center">Use Statements</h4>
                                        <i id="editconinfo" class="fas fa-edit edit btn btn-small btn-outline-success  float-right"></i>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    </tbody>
                    <tbody id="conditionbody"></tbody>
                </table>

            </div>
        </div>
        <input type="button" name="previous" class="btn previous action-button" value="Previous" />
        <button type="submit" disabled style="display: none" aria-hidden="true"></button>
        <input type="button" name="vjson" class="btn action-button" id="vjson" value="Submit" />


    </fieldset>
    <input type="hidden" name="profile" id="jsn">
    <!-- <input type="hidden" name="p_id" id ="pid"> -->
    <div class="modal" id="viewJson" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content modal-content1 ">
                <div class="modal-header">
                    <h5 class="modal-title">DUC Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="jbody"> </div>
                <div class="modal-footer">
                    <button type="button" id="svjson" class="btn btn-primary">Save Profile</button>
                    <div class="dropdown">
                        <button type="dropbtn" id="dson" class="btn dropbtn btn-info">Download Profile</button>
                        <div class="dropdown-content">
                            <a href="#" id="jsdld">JSON</a>
                            <a href="#" id="exdld">Excel</a>
                            <!-- <a href="#">Link 3</a> -->
                        </div>
                        <div class="dropdown">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DataLevelModal -->



</form>






<!-- <script src="<?php echo base_url('assets/js/getdata.js') ?>"></script> -->
<script>
    let terms = [
    //who 
    "Commercial Entity",
    //where
    "Geographical Area",
    "Regulatory Jurisdiction",
    // why
    "Research Use",
    "Clinical Research Use",
    "Disease Specific Use",
    "Clinical Care Use",
    "Use As Control",
    "Profit Motivated Use",
    "Return Of Results",
    "Return Of Incidental Findings",
    "(Re-)Identification Of Individuals Without The Involvement Of The Resource Provider",
    "(Re-)Identification Of Individuals Mediated By The Resource Provider",

    // How
    "Time Period Of Use",
    "Collaboration", 
    "Fees", 
    "Publication Moratorium", 
    "Publication",
    "User Authentication",
    "Ethics Approval"
    ];
    var d = <?php echo json_encode($profile) ?>;
    console.log(d)
    var profile = JSON.parse(d);
    // console.log(profile);

    var a = profile["profile"];
    var r = profile["resources"];
    var c = profile["conditions"];

    // Assigning values to Profile Page
    if (a["profileName"] != undefined) {
        $('#p_name').val(a["profileName"]);
    }
    if (a["profileVersion"] != undefined) {
        $('#p_version').val(a["profileVersion"]);
    }
    // Assigning Values to Asset page

    // $('#r_name').val(r["resourceName"])

    $.each(r, function(c, v) {

        if (v["resourceName"] != undefined) {
            $('#r_name').val(v["resourceName"])
        }
        if (v["resourceDescription"] != undefined) {
            $('#r_des').val(v["resourceDescription"])
        }
        if (v["resourceDataLevel"] != undefined) {
            // $('#r_dlevel').val(v["resourceDataLevel"])
            setOptions($('#r_dlevel'), v["resourceDataLevel"]);
        }
        if (v["resourceContacts"] != undefined) {
            var pc = v["resourceContacts"];
            var cl = $('#r_contact');
            if (pc.includes(";")) {
                var list = pc.split(" ;");
                setOptions(cl, list);
            } else {
                setOptions(cl, pc);
            }
        }
        if (v["resourceOrganisations"] != undefined) {
            var orgs = v["resourceOrganisations"];
            if (orgs.length > 0) {
                $('#orgn1').val(orgs[0]["resourceOrganisationName"]);
                $('#orgr1').val(orgs[0]["resourceOrganisationRole"]);
            }

            if (orgs.length > 1) {
                for (var i = 1; i < orgs.length; i++) {

                    $(".r_org").append(` 
            <div class="r_orgroup mb-2">
            <div class="form-row">
            <div class="col-md-5 col-sm-5 col-12">
                <input type="text" class="form-control" value="${orgs[i]["resourceOrganisationName"]}" placeholder="Please enter organisation name." name="org_name[]">
            </div>
            <div class="col-md-5 col-sm-5 col-10">
                <input type="text" class="form-control" value="${orgs[i]["resourceOrganisationRole"]}" placeholder="Please enter organisation role." name="org_role[]">
            </div>
            <div class="col-md-2 col-sm-2 col-2"><button type="button" id="removeorg" class="btn btn-small removeorg btn-danger"><i class="fas fa-minus"></i></button></div>
            </div>
            </div>
            `);
                }
            }


        }


    });



    // Setting Conditions 

    console.log(profile["conditions"]);
    if (c.length > 0) {

        $.each(c, function(c, v) {
            var b = '';
            var r = [];
            var set1 = [
        "Commercial entity",
        "Geographical area",
        "Regulatory jurisdiction",
        "Research use",
        "Clinical research use",
        "Disease specific use",
        "Clinical care use",
        "Use as control",
        "Profit motivated use",
        "Return of results",
        "Return of incidental findings",
        "(Re-)identification of individuals without the involvement of the resource provider",
        "(Re-)identification of individuals mediated by the resource provider",
        ];
        var set2 =[
        "Time period of use",
        "Collaboration", 
        "Fees", 
        "Publication moratorium", 
        "Publication",
        "User authentication",
        "Ethics Approval"
        ];

            var s = '';
            var ltext = '';
            var togglebtn = '<small class="text-info ml-3"><a id="utim" href="#" ><i class="fas fa-info-circle"></i></a></small>';
            var rtbtn = `<small class="text-info ml-3"><a data-toggle="modal" data-trigger="focus" id="rib" href="#"><i class="fas fa-info-circle"></i></a></small>`;
            var rreq = 'required';
            var rbtn = `<input checked="checked" class="radio-checked_input on" id="on${c}" name="statuscon${c}" type="radio" value="on" />
                    <label class="radio-checked_label radio-checked_label--on" for="on${c}" >Applicable</label>
                    <input class="radio-checked_input off" name="statuscon${c}" id="off${c}" type="radio" value="off" />
                    <label class="radio-checked_label radio-checked_label--off " for="off${c}" >Not Applicable</label>`;
            // var applicable = false;
            // var appli = 'Applicable';
            // r = v["rule"];
            // s = v["scope"]
            // if (v["ruleApplication"] == 'Not Applicable') {

            //     var appli = 'Not Applicable';

            //     applicable = true
            //     rreq = '';
            //     rbtn = `<input  class="radio-checked_input on" id="on${c}" name="statuscon${c}" type="radio" value="on" />
            //         <label class="radio-checked_label radio-checked_label--on" for="on${c}" >Applicable</label>
            //         <input checked="checked" class="radio-checked_input off" name="statuscon${c}" id="off${c}" type="radio" value="off" />
            //         <label class="radio-checked_label radio-checked_label--off " for="off${c}" >Not Applicable</label>`;

            // } else {

            // }

            var set1 = [
            "Commercial Entity",
            "Geographical Area",
            "Regulatory Jurisdiction",
            "Research Use",
            "Clinical Research Use",
            "Disease Specific Use",
            "Clinical Care Use",
            "Use As Control",
            "Profit Motivated Use",
            "Return Of Results",
            "Return Of Incidental Findings",
            "(Re-)Identification Of Individuals Without The Involvement Of The Resource Provider",
            "(Re-)identification Of Individuals Mediated By The Resource Provider",
            ];
            var set2 =[
            "Time Period Of Use",
            "Collaboration", 
            "Fees", 
            "Publication Moratorium", 
            "Publication",
            "User Authentication",
            "Ethics Approval"
            ];
            var useCon = '';
            if (v["conditionTermLabel"] != undefined) {
                useCon = v["conditionTermLabel"];
            } else {
                if (v["useConditionLabel"] != undefined) {
                    useCon = v["useConditionLabel"];

                }
            }
            if (set1.includes(useCon)) {
             r = ["Obligated","Permitted","Forbidden"]
          
            }

            if (set2.includes(useCon)) {
             r = [ "Obligated","No Requirements"]
          
            }
            console.log(r)
            r.pop(v["rule"]);
            roptions = ``;
            if(r.length>1){
                $.each(r,(i)=>{
                    roptions +=  `<option>${r[i]}</option>`
                })
                
            }else{
                roptions = `<option>${r[0]}</option>`
            }
           
            b = '<button type="button" id="removePerson" class=" closebtn  mr-2 btn btn-small removeCon btn-danger"><i class="fas fa-times"></i></button>';
            ltext = 'ltext';
            let sn = $('#conditions').children().length;
            $("#conditions").append(`
             <div class=" congroup mt-3" id="con${c}">
                <div class="form-row mt-3">
                        <legend class="col-6 col-md-6 ${ltext} " visible="true">Statement ${sn+1}</legend>
                        ${b}
                </div>
   
            <div class="conInfo">
                <div class="form-row ml-2 mr-2 ">
                    <div class="form-group form-groupC col-md-4 col-sm-12 col-12">
                        <span id="c_term${c}">
                            <label for="r_dlevel">Use Condition:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small>${togglebtn}</label>
                            <select name="c_term" required class="form-control c_term">
                                <option selected>${useCon}</option>
                            </select>
                     </span>

                    </div>
                    <div class="form-group form-groupC ruleG col-md-4 col-sm-12 col-12 " id="ruleG${c}">
                        <span id="c_appli${c}">
                            <input type="text" name="c_ava" class="form-controle backvalue">
                            </span>
                            <span >
                            <label for="c_rule">Rule:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small>${rtbtn}</label>
                            <select  name="c_rule" id="c_rule${c}" required class="form-control c_rule">
                            <option selected>${v["rule"]!=undefined?v["rule"]:''}</option>
                            ${roptions}
                            </select>
                        </span>
                    </div>
                    <div class="form-group form-groupC col-md-4 col-sm-12 col-12">
                        <span id="c_ruleScope1">
                            <label for="c_rscope">Scope:</label>
                            <select name="c_rscope"  class="form-control c_rscope">
                            <option selected>${v["scope"]!=undefined?v["scope"]:''}</option>
                            </select>
                        </span>

                    </div>

                </div>

        <div class="form-row ml-2 mr-2">
            <div class="form-group form-groupC col-md-12 col-sm-12 col-12">
            <span id="c_detail${c}">
                <label for="c_detail">Condition Parameter:</label>
                <textarea type="textarea" rows="1" maxlength="250" class="form-control c_detail" name="c_detail" placeholder="Please enter qualifiers for the use condition (optional)">${v["conditionDetailLabel"]!=undefined?v["conditionDetailLabel"]:''}</textarea>
            </span>
            </div>
        </div>
        </div>
    </div>
</div>
      `);

            $("c_rule".c).select2({
                placeholder: 'Please select condition rule.',
                allowClear: true,
                date: {
                    'id': 'r'.c,
                    'data': r
                }
            })

        })
    }



    // $(document).ready(function() {

    //     $('#infoP').popover({
    //         title: "<h6>Condition Rule Information</h6>",
    //         content: `<p>
    //                 <b>• Forbidden</b> – this strictly prohibits the stated use. <br>
    //                 <b>• Permitted </b>– Indicates that the permission is absolute and universal.<br>
    //                 <b>• Obligated </b>– Indicates that not only is a use permitted but that it MUST be performed in practice.<br>
    //                 <b>• No Stated Rule </b>– No rule specified for this term.<br>
    //                 </p>`,
    //         html: true,
    //         animation: true,

    //     })

    //     $('#pinfo').trigger('click');
    // })


    $(document).on('click', '#dmodalS', function() {

        $('#resoucefield').append(`<div class="modal fade " id="Dim" tabindex="-1" role="dialog" aria-labelledby="DataLevelLabel" aria-hidden="true">

<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title " id="DataLevelModal">Definition of Datatype </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body " style="max-height: 50vh !important; overflow-y:scroll">
            <table class="table table-bordered  table-responsive">
                <thead>
                    <tr>
                        <th style="width:25% !important" scope="col">Data Level</th>
                        <th scope="col">Definition</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>DATASET</td>
                        <td>This relates to the direct measurements collected from an experiment or other such observations.</td>
                    </tr>
                    <tr>
                        <td>Patient Registry</td>
                        <td>Patient registries are organised systems that use observational methods to collect uniform data on a population defined by a particular disease, condition, or exposure, and that is followed over time. <a target="_blank" href="https://eur03.safelinks.protection.outlook.com/?url=https%3A%2F%2Fwww.ema.europa.eu%2Fen%2Fhuman-regulatory%2Fpost-authorisation%2Fpatient-registries%23%3A~%3Atext%3DPatient%2520registries%2520are%2520organised%2520systems%2Cthat%2520is%2520followed%2520over%2520time.&data=05%7C01%7Cur13%40leicester.ac.uk%7C383c779b8bd745e94f5008da8a7b9b3e%7Caebecd6a31d44b0195ce8274afe853d9%7C0%7C0%7C637974560724792501%7CUnknown%7CTWFpbGZsb3d8eyJWIjoiMC4wLjAwMDAiLCJQIjoiV2luMzIiLCJBTiI6Ik1haWwiLCJXVCI6Mn0%3D%7C3000%7C%7C%7C&sdata=eEDjsd4uFr2vLfd7gq65rJctW2MkzRhvna7FreX22kc%3D&reserved=0">(EMA - Patient registries | European Medicines Agency (europa.eu))</a></td>
                    </tr>
                    <tr>
                        <td>Biobank</td>
                        <td>A collect and store biological materials that are annotated not only with medical, but often also epidemiological data (e.g., environmental exposures, lifestyle/occupational information). <a href="https://eur03.safelinks.protection.outlook.com/?url=https%3A%2F%2Fwww.coe.int%2Ft%2Fdg3%2Fhealthbioethic%2FActivities%2F10_Biobanks%2Fbiobanks_for_Europe.pdf&data=05%7C01%7Cur13%40leicester.ac.uk%7C383c779b8bd745e94f5008da8a7b9b3e%7Caebecd6a31d44b0195ce8274afe853d9%7C0%7C0%7C637974560724792501%7CUnknown%7CTWFpbGZsb3d8eyJWIjoiMC4wLjAwMDAiLCJQIjoiV2luMzIiLCJBTiI6Ik1haWwiLCJXVCI6Mn0%3D%7C3000%7C%7C%7C&sdata=mhMDSUP5aZJY%2B%2Bt27nZUkonrXgqBs6NKFEbRFfhZqTo%3D&reserved=0" target="_blank">(Biobanks for Europe: A challenge for governance, section 3.1)</a></td>
                    </tr>                      
                    <tr>
                        <td>Guideline</td>
                        <td>A document providing guidance on the scientific or regulatory aspects of the development of medicines and applications for marketing authorisation. Although guidelines are not legally binding, applicants need to provide justification for any deviations. <a href="https://eur03.safelinks.protection.outlook.com/?url=https%3A%2F%2Fwww.ema.europa.eu%2Fen%2Fglossary%2Fguideline&data=05%7C01%7Cur13%40leicester.ac.uk%7C383c779b8bd745e94f5008da8a7b9b3e%7Caebecd6a31d44b0195ce8274afe853d9%7C0%7C0%7C637974560724792501%7CUnknown%7CTWFpbGZsb3d8eyJWIjoiMC4wLjAwMDAiLCJQIjoiV2luMzIiLCJBTiI6Ik1haWwiLCJXVCI6Mn0%3D%7C3000%7C%7C%7C&sdata=yjcI7LLsbzN7ihwDaiek9EKFxzFESUtITfCWfN91Bdc%3D&reserved=0" target="_blank">(Guideline | European Medicines Agency (europa.eu)</a></td>
                    </tr> 
                </tbody>
            </table>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

</div>`);


        $('#Dim').appendTo("body").modal('show');


    })

    $(document).on('click', '#rib', function() {


        $('#conditions').append(`
        <div class="modal fade" id="rim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md"  role="document">
        <div class="modal-content modal content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Condition Rules Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <table class="table table-bordered  table-responsive">
                    <thead>
                        <tr>
                            <th  style="width:30% !important" scope="col">Rule Term</th>
                            <th scope="col">Definition</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Forbidden</td>
                            <td>The stated Use/Requirement is not permitted for some or all of the resource (as per the Scope).</td>
                        </tr>
                        <tr>
                            <td>Permitted </td>
                            <td>The stated Use/Requirement is permitted for some or all of the resource (as per the Scope).</td>
                        </tr>
                        <tr>
                            <td>Obligated</td>
                            <td>The stated Use/Requirement is necessary for some or all of the resource (as per the Scope).</td>
                        </tr>
                        <tr>
                            <td>No Requirements</td>
                            <td>No defined requirement for the stated use condition.</td>
                        </tr>

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        `)


        $('#rim').appendTo("body").modal('show');

        // $(document).find('#rim').modal({
        //     show:true
        // })



    })

    $(document).on('click', '#utim', () => {

        $('body').append(`
        <div class="modal fade " id="UTermModal" tabindex="-1" role="dialog" aria-labelledby="TermModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="TermModalLabel">Definition of Use Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body " style="max-height: 50vh !important; overflow-y:scroll">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:25% !important" scope="col">Use Condition</th>
                            <th style="width:75% !important" scope="col">Definition</th>
                        </tr>
                    </thead>
                    <tbody id="Udeff">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

</div>
        
        `);
        $.each(ConTermArr, function(i,v){
            $('#Udeff').append(`
                <tr><td>${v.Term}</td><td>${v.Def}</td></tr>
            `);    
            })


        $('#UTermModal').modal('show');

    })


    $(document).on('click', '#Uaddcon', function() {

        var togglebtn = '<small class="text-info ml-3"><a id="utim" href="#" ><i class="fas fa-info-circle"></i></a></small>';
        var rtbtn = `<small class="text-info ml-3"><a data-toggle="modal" data-trigger="focus" id="rib" href="#"><i class="fas fa-info-circle"></i></a></small>`;

        let s = $('#conditions').children().length;
        let c = s;
        $("#conditions").append(`
        <div class=" congroup" id="con${c}">
      <div class="form-row mt-3">
          <legend class="col-6 col-md-2 ltext" visible="true">Statement ${s+1}</legend>
          <button type="button" id="removePerson" class="  closebtn  mr-2 btn btn-small removeCon btn-danger"><i
                  class="fas fa-times"></i></button>
      </div>
      <div class="conInfo">
          <div class="form-row ml-2 mr-2">
              <div class="form-group form-groupC col-md-4 col-sm-12 col-12">
                  <span id="c_term${c}">
                      <label for="r_dlevel">Use Condition:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small><small class="text-info ml-3"><a data-toggle="modal"  href="#TermModal"><i class="fas fa-info-circle"></i></a></small></label>
                      <select name="c_term" required class="form-control c_term">
                          <option></option>
                      </select>
                  </span>
              </div>
              <div class="form-group form-groupC ruleG col-md-4 col-sm-12 col-12 " id="ruleG${c}">
              <span id="c_appli${c}">
                  <input type="text" name="c_ava" class="form-controle backvalue">
              </span>
              <span id="c_rule${c}">
                  <label for="c_rule">Rule:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small><small class="text-info ml-3"><a data-toggle="modal" data-trigger="focus" href="#infoModal"><i class="fas fa-info-circle"></i></a></small></label>
                  <select name="c_rule" required class="form-control c_rule">
                      <option></option>
                  </select>
              </span>
          </div>
          <div class="form-group form-groupC col-md-4 col-sm-12 col-12">
          <span id="c_ruleScope1">
              <label for="c_rscope">Scope:</label><small class="text-danger"><i class="fas fa-star fa-xs"></i></small>
              <select name="c_rscope" required  class="form-control c_rscope">
               <option></option>
              </select>
          </span>
      </div>
    
  
          </div>
          <br>
          <div class="form-row ml-2 mr-2">
          <div class="form-group form-groupC col-md-12 col-sm-12 col-12">
          <span id="c_detail${c}">
              <label for="c_detail">Condition Detail:</label>
              <textarea type="textarea" rows="1" maxlength="250" class="form-control c_detail" name="c_detail"
                  placeholder="Please enter qualifiers for the use condition (optional)"></textarea>
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

        c++;

        if ($('#conditions').hasScrollBar()) {

            $('#conditions').get(0).scrollTop = $('#conditions').get(0).scrollHeight;

        }

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
    adduSum();
    addpSum();
    addRSum();
    addCSum();
</script>

<?= $this->endSection() ?>
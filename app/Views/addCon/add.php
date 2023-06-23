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
                    <input type="email" class="form-control" value="<?php if (isset($email)) echo $email ?>" required name="u_email" id="u_email" placeholder="Please enter email">
                </div>
            </div>
            <div class="form-row mt-1 p-0">
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="u_fname">First Name:</label>
                    <input type="text" class="form-control" value="<?php if (isset($fname)) echo $fname ?>" name="u_fname" id="u_fname" placeholder="Please enter first name">
                </div>
                <div class="form-group col-md-6 col-6 col-12">
                    <label for="u_lname">Last Name:</label>
                    <input type="text" class="form-control" value="<?php if (isset($lname)) echo $lname ?>" name="u_lname" id="u_lname" placeholder="Please enter last name">
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
                    <input type="text" class="form-control" name="p_version" id="p_version" placeholder="Please create a version for this profile e.g. 0.0.1">
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
            <small class="mb-0 text-center">Please enter details of the resource for this DUC profile</small>

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
                        <label for="r_dlevel">Data Level of Resource:<small class="text-info ml-3"><a data-toggle="modal" href="#DataLevelModal"><i class="fas fa-info-circle"></i></a></small></label>
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
                        <div class="col-md-6 col-sm-6 col-12"><input type="text" class="form-control " placeholder="Please enter organisation name." name="org_name[]"></div>
                        <div class="col-md-6 col-sm-6 col-12"><input type="text" class="form-control " placeholder="Please enter organisation role." name="org_role[]"></div>
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
        <div id="conditions" class="p4 conClass">

            <?= $this->include('addCon/condition') ?>

        </div>
        <div class="form-row mt-4">
            <div class="col-md-12 col-12"> <button type="button" id="addcon" class="form-control  addcon"><i class="fas fa-plus"></i> Condition </button></div>
        </div>
        <hr style="height:1px;border:none;color:#333;background-color:#333;" />
        <div class="form-row">
            <div class="form-group col-md-12 col-12">
                <span>
                    <label for="cce_comment">Comments Regarding CCE:</label>
                    <textarea name="cce_comment" id="cce_comment" class="form-control" cols="30" rows="3"></textarea>
                </span>

            </div>
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
                                <td colspan ="5" >
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
                                <td colspan ="5" >
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
                                <td colspan ="5" >
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
                                <td colspan ="5" >
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
        <!-- <div class="form-row">
            <div class="form-group col-md-12 col-12">
                <span>
                    <label for="tool_comment">Comments regarding this DUC profile creator:</label>
                    <textarea name="tool_comment" id="tool_comment" class="form-control" cols="30" rows="3"></textarea>
                </span>

            </div>
        </div> -->
        <hr>
        <input type="button" name="previous" class="btn previous action-button" value="Previous" />
        <button type="submit" disabled style="display: none" aria-hidden="true"></button>
        <input type="button" name="vjson" class="btn action-button" id="vjson" value="Submit" />


    </fieldset>
    <input type="hidden" name="profile" id="jsn">
    <!-- <input type="hidden" name="p_id" id ="pid"> -->
    <div class="modal" id="viewJson" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content1 ">
                <div class="modal-header">
                    <h5 class="modal-title">DUC Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div id="jbody"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="svjson" class="btn btn-primary">Save Profile</button>
                    <div class="dropdown">
                        <button type="dropbtn" id="dson" class="btn dropbtn btn-info">Download Profile</button>
                        <div class="dropdown-content">
                            <a href="#" id="jsdld">JSON</a>
                            <a href="#" id="exdld">Excel</a>
                            <!-- <a href="#">Link 3</a> -->
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md " role="document">
        <div class="modal-content modal-content1">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Condition Rules Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th style="width:30% !important" scope="col">Rule Term</th>
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
                            <td>No defined requirement for the stated Use Condition.</td>
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


<div class="modal fade " id="TermModal" tabindex="-1" role="dialog" aria-labelledby="TermModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="TermModalLabel">Definition of Use Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body termModelBodyAdd" style="max-height: 50vh !important; overflow-y:scroll">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:25% !important" scope="col">Use Condition</th>
                            <th style="width:75% !important" scope="col">Definition</th>
                        </tr>
                    </thead>
                    <tbody id="deff"></tbody>
            
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

</div>

<!-- DataLevelModal -->

<div class="modal fade " id="DataLevelModal" tabindex="-1" role="dialog" aria-labelledby="DataLevelLabel" aria-hidden="true">

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
                        <!-- <tr>
                            <td>RECORDSET</td>
                            <td>This is a collection of individual records.</td>
                        </tr> -->
                        <!-- <tr>
                            <td>RECORD</td>
                            <td>A piece of evidence about a past event (such as an observation, experiment, or interview for example) kept in a permanent form.</td>
                        </tr> -->
                        <!-- <tr>
                            <td>RECORDFIELD</td>
                            <td>A container for a specified attribute of the record.</td>
                        </tr> -->
                        <!-- <tr>
                            <td>MATERIALS</td>
                            <td>This relates to any asset that is a physical entity that is available for subsequent use or inspection. </td>
                        </tr> -->
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
                            <!-- <tr>
                            <td>OTHER</td>
                            <td>This type should be used where the “type” of an asset is known but it does not fit any of the other predefined categories.</td>
                            
                        </tr>  -->     

                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

</div>

<!-- <script src="<?php echo base_url('assets/js/getdata.js') ?>"></script> -->
<script>
    $('#reset_query').click(function() {
        location.reload();
    });
    //     var r = ["OBLIGATED", "PERMITTED",  "FORBIDDEN"]


    $(document).ready(function() {
        $('#infoP').popover({
            title: "<h6>Condition Rule Information</h6>",
            content: `<p>
                    <b>• Forbidden</b> – this strictly prohibits the stated use. <br>
                    <b>• Permitted </b>– Indicates that the permission is absolute and universal.<br>
                    <b>• Obligated </b>– Indicates that not only is a use permitted but that it MUST be performed in practice.<br>
                    <b>• No Stated Rule </b>– No rule specified for this term.<br>
                    </p>`,
            html: true,
            animation: true,

        })

        $(document).on('show.bs.modal','#TermModal', function () {
  
 
           $.each(ConTermArr, function(i,v){
                $('#deff').append(`
                    <tr><td>${v.Term}</td><td>${v.Def}</td></tr>
                `);    
            })
        })
    })
</script>

<?= $this->endSection() ?>
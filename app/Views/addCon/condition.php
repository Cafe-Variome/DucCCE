<div class="congroup mt-3 tt" id="con1">



    <div class="form-row mt-3">
        <legend class="col-lg-6 col-md-6 col-12 ltext" visible="true">Statement 1</legend>
        <button type="button" id="removePerson" class="  closebtn  mr-2 btn btn-small removeCon btn-danger"><i class="fas fa-times"></i></button>
    </div>
    <!-- <div class="closebtn row"><button type="button" id="removePerson" class="btn btn-small removeCon btn-danger"><i class="fas fa-times"></i></button></div> -->
    <div class="conInfo">
        <div class="form-row ml-2 mr-2">
            <div class="form-group form-groupC col-md-4 col-lg-4 col-sm-12 col-12">
                <span id="c_term1">
                    <label for="r_dlevel">Use Condition:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small><small class="text-info ml-3"><a data-toggle="modal" href="#TermModal"><i class="fas fa-info-circle"></i></a></small></label>
                    <select name="c_term" required class="form-control c_term">
                        <option></option>
                    </select>
                </span>

            </div>
            <div class="form-group form-groupC col-md-4 col-lg-4  ruleG col-sm-12 col-12" id="ruleG1">

                <span id="c_rule1">
                    <label for="c_rule">Rule:<small class="text-danger"><i class="fas fa-star fa-xs"></i></small><small class="text-info ml-3"><a data-toggle="modal" data-trigger="focus" href="#infoModal"><i class="fas fa-info-circle"></i></a></small></label>
                    <select name="c_rule" required class="form-control c_rule">
                        <option></option>
                    </select>
                </span>
                <span id="c_appli1">
                    <!-- <label for="c_ava">Condition Applicability:</label> -->
                    <input type="text" name="c_ava" value="Applicable" class="form-controle backvalue" />
                </span>
            </div>
            <div class="form-group form-groupC col-md-4 col-lg-4 col-sm-12 col-12">
                <span id="c_ruleScope1">
                    <label for="c_rscope">Scope:</label><small class="text-danger"><i class="fas fa-star fa-xs"></i></small>
                    <select name="c_rscope" required class="form-control c_rscope">
                        <option></option>
                    </select>
                </span>
            </div>

        </div>
        <br>
        
        <div class="form-row mt-0 ml-2 mr-2">

            <div class="form-group form-groupC col-md-12 col-lg-12 col-sm-12 col-12">
                <span id="c_detail1">
                    <label for="c_detail">Condition Parameter:</label>
                    <textarea type="textarea" rows="1" maxlength="250" class="form-control c_detail" name="c_detail" placeholder="Please enter qualifiers for the use condition (optional)"></textarea>
                </span>
            </div>


        </div>
        <br>
        
        <!-- <div class="form-row ml-2 mr-2 ">


            <div class="form-group col-md-12 col-lg-12 col-12">
                <span id="r_detail1">
                    <label for="r_detail">Other Considerations:</label>
                    <textarea type="textarea" rows="1" maxlength="250" class="form-control r_detail" name="r_detail" placeholder="Please enter any other relevant information for this Condition & Rule (optional)"></textarea>
                </span>
            </div>



        </div> -->


    </div>
</div>

<!-- <div class="radio-checked">
    <div class="radio-checked_highlight"></div>
    <div class="radio-checked_container">

        <input checked="checked" class="radio-checked_input on" id="on${c}" name="statuscon${c}" type="radio" value="on" />
        <label class="radio-checked_label radio-checked_label--on" for="on${c}">Applicable</label>
        <input class="radio-checked_input off" name="statuscon${c}" id="off${c}" type="radio" value="off" />
        <label class="radio-checked_label radio-checked_label--off " for="off${c}">Not Applicable</label>

    </div>
</div>
</div> -->
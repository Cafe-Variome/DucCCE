/**
 * summary.js
 * Author: Umar Riaz
 * formating the data for the summary page.
 */
$(function () {
  var form = $("#msform");


  // $('.c_term').on('change',function(){
  //   var sel = $(this);
  //   var val = sel.val();
  //   sel.parent().find('.backvalue').val(val)
  // })

  // $('.c_rule').on('change',function(){
  //   var sel = $(this);
  //   var val = sel.val();
  //   sel.parent().find('.backvalue').val(val)
  // })

  $(document).ready(function () {
    // User Info Summary
    $("#userInfo, #userToSum").on("click", function () {
      adduSum();
    });

    $("#pInfo, #profileToSum").on("click", function () {
      addpSum();
    });

    // Dataset Summary
    $("#dataInfo, #dataToSum").on("click", function () {
      addRSum();
    });

    //Publication Summary pubInfo

    $("#conInfo,#conToSum").on("click", function () {
      addCSum();
    });

    // addComments();

    $("#vjson").on("click", function () {
      addComments();
      var DP = getJson();
      console.log(DP);
      var Json = [];
      var DucProfiler = {};
      var resource = [];
      var Conditions = [];
      var Comments = [];
      var prJ = [];

      DP[1].forEach(function (p) {
        if (p.Name == "Id") {
          DucProfiler["profileId"] = p.Value;
        } else if (p.Name == "Profile Name") {
          DucProfiler["profileName"] = p.Value;
        } else if (p.Name == "Profile Version") {
          DucProfiler["profileVersion"] = p.Value;
        } else if (p.Name == "Date") {
          DucProfiler["creationDate"] = p.Value;
        } else if (p.Name == "References") {
          var list = p.Value.split(" ;");

          DucProfiler["references"] = list;
        }
      });

      DucProfiler["ducVersion"] = "0.0.1";
      DucProfiler["permissionMode"] = null;

      if (DP[2].length > 0) {
        let res ={};
        DP[2].forEach(function (r) {
         
          if (r.Name == "Resource Name") {
            
            res["resourceName"] = r.Value;
            
          }
          else if (r.Name == "Resource Description") {
            res["resourceDescription"] = r.Value;
          } else if (r.Name == "Data Level of Resource") {
            var list = r.Value.split(" ;");
            res["resourceDataLevel"] = r.Value;
          } else if (r.Name == "Disposition") {
            res["resourceDisposition"] = r.Value;
          } else if (r.Name == "Permission Mode") {
            res["permissionMode"] = r.Value;
          } else if (r.Name == "Geography") {
            res["resourceGeography"] = r.Value;
          } else if (r.Name == "Release Date") {
            res["resourceReleaseDate"] = r.Value;
          } else if (r.Name == "Retention Period") {
            res["resourceRetentionPeriod"] = r.Value;
          } else if (r.Name == "Points of Contact ") {
            var list = r.Value.split(" ;");
            res["resourceContacts"] = r.Value;
          } else if (r.Name == "License") {
            res["resourceLicense"] = r.Value;
          } else if (r.Name == "Organisations") {
            // r.Value;
            console.log(r.Value);
            if(r.Value.length>0){
              res["resourceOrganisations"] = r.Value;
            }
          }
          
        });

        resource.push(res)
        
      }
      if (DP[3].length > 0) {
        var Condition = [];
        DP[3].forEach(function (e) {
          var Item = {};
          var con = e[0];

          if (con.length > 0) {
            con.forEach(function (c) {
              if (c.Name == "Use Condition") {
                Item["useConditionLabel"] = c.Value;
              } else if (c.Name == "Rule") {
                Item["rule"] = c.Value;
              }
              if (c.Name == "Condition Parameter") {
                Item["conditionParameter"] = c.Value;
              }
              if(c.Name == "Scope"){
                Item["scope"] = c.Value;
              }
              if(c.Name == "Condition Applicability"){
                Item["ruleApplication"] = c.Value;
              }
              // Condition Applicability

              else if (c.Name == "Condition Rule Modifier" || c.Name ==  "Other Considerations") {
                Item["otherConsiderations"] = c.Value;
              }
            });
          }

          //   var sub = e[1];
          //   if(sub.length>0){

          //     var subc =[];

          //     sub.forEach(function(c){

          //       if(c.length>0){
          //         var s =[];
          //         var Item = {};
          //         c.forEach(function(c){
          //           if(c.Name == "Condition Term"){
          //             Item["ConditionTerm"] = c.Value;
          //           }else if(c.Name == "Condition Rule"){
          //             Item["Rule"] = c.Value;
          //           }
          //           if(c.Name == "Condition Detail"){
          //             Item["ConditionDetail"] = c.Value;
          //           }else if(c.Name == "Detail Value"){
          //             Item["ConditionDetailValue"] = c.Value;
          //           }

          //         })
          //         s.push(Item);
          //       }

          //        subc.push(s);

          //     })
          //   }

          //  Item["SubConditions"]=subc;
          Conditions.push(Item);
        });

        // Conditions =Condition ;
      }

      if (DP[4].length > 0) {
        var item = {};
        var c = DP[4];
        item["Comments Regarding DUC_Profiler"] = c[0].Value;

        item["Comments Regarding CCE"] = c[1].Value;

        Comments.push(item);
      }
      _json = {};


      _json["profile"] = DucProfiler;
      _json["resource"] = resource;
      _json["Conditions"] = Conditions;
      _json["Comments"] = Comments;
      Json.push(_json);

      var JsontoDownload = [];
      _jsontoDownload = {};
      _jsontoDownload["DucProfile"] = DucProfiler;
      _jsontoDownload["DucProfile"]["resources"] = resource;
      _jsontoDownload["DucProfile"]["conditions"] = Conditions;
      // _jsontoDownload["DucProfile"]["Comments"] = Comments;

      JsontoDownload.push(_jsontoDownload);
       
     let j =  MakeJason(_json);


      var c = JSON.stringify(Json[0], null, 2);
      $("#jsn").val(c);

      console.log(Json[0]);

      var form = $("#msform");
      var valid = true;
      if ($('#userinfobody').find('.table-danger').length > 0 || $('#pinfobody').find('.table-danger').length > 0 || $('#datainfobody').find('.table-danger').length > 0 || $('#conditionbody').find('.table-danger').length > 0) {
        valid = false;
      }
      if (valid) {

        $("#viewJson").modal({
          show: true,
        });
        $("#jbody").empty();
        $("#jbody").append(`<pre><code>${library.json.prettyPrint(JsontoDownload[0])}</code></pre>`);

        $("#svjson").click(function () {

           validator = null;
            form.submit();

        });

        // $("#dson").click(function () {
        //   // var j = JSON.stringify(JsontoDownload[0], null, 2);
        //   J_Download(Json[0]);
        //   // $('#viewJson').modal('hide');
        // });
      } else {
        alert("Please fill all required fields");
      }


      $("#jsdld").click(function(){

        J_Download(Json[0]);

      })
      $("#exdld").click(function () {
         console.log(Json[0])
        xls_Download(Json[0])

      })


    });


  });

});

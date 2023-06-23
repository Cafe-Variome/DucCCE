$(function(){
  var current_fs, next_fs, previous_fs; //fieldsets
  var left, opacity, scale; //fieldset properties which we will animate
  var animating; //flag to prevent quick multi-click glitches
  var kids = $("#msform").children();

  //next

  function idRet(fid) {
     var id = '';
    switch(fid){

      case 'userinfofield': 
        id = 'userinformation';
        break;
      case 'profileinfofield':
        id = 'pinformation';
        break;
      case 'resoucefield':
        id = 'resource';
        break;
      case 'conField':
        id = 'conditions'
        break;
      default:
        break;

    }

    return id;
    
  }

  String.prototype.escape = function() {
    var tagsToReplace = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;'
    };
    return this.replace(/[&<>]/g, function(tag) {
        return tagsToReplace[tag] || tag;
    });
  };

  $(".next").click(function () {
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    var id =idRet( $(current_fs).attr('id'));
    if(id !=''){
      validInput(id);
    }
    // if (form.valid() === true) {
      if (animating) return false;
      animating = true;
      $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");;
      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

      //show the next fieldset
      next_fs.show();
      //hide the current fieldset with style

      next_fs.css({
        transform: "scale(" +1+ ")",
        
      });

      go_next(current_fs,next_fs);
  })

  //previous

  function validInput(id) {

    var divElem = document.getElementById(id);
    var inputElements = divElem.querySelectorAll("input, select, textarea");

    $.each(inputElements, function () {
      var input = $(this);
      var value = input.val();
      if(/[^a-z0-9áéíóúñü \.,_-]/.test(value)){
        input.val('')
      }
      // let v = sanitizeString(value);
      // console.log(v)
      // input.val(v);
    });
    
  }

  $(".previous").click(function () {
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    var id =idRet( $(current_fs).attr('id'));
    if(id !=''){
      validInput(id);
    }
    if (animating) return false;
    animating = true;

      $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
      $("#progressbar li").eq($("fieldset").index(previous_fs)).addClass("active");

    //show the next fieldset
    previous_fs.show();

    //hide the current fieldset with style
    previous_fs.css({
      transform: "scale(" +1+ ")",
    });

    go_back(current_fs,previous_fs);
  })

  $(".edit").on("click", function () {
    $(".backToSum").show();
  });

  //editinfo

  $("#edituserinfo").on("click", function () {
    current_fs = $('#summaryField');
    previous_fs = $("#userinfofield");

    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    $("#progressbar li").eq($("fieldset").index(previous_fs)).addClass("active");
    previous_fs.show();
    previous_fs.css({
      transform: "scale(" +1+ ")",
    });

    go_back(current_fs,previous_fs);
  
  })

  $("#editpinfo").on("click", function () {
    current_fs = $('#summaryField');
    previous_fs = $("#profileinfofield");

    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    $("#progressbar li").eq($("fieldset").index(previous_fs)).addClass("active");
    previous_fs.show();
    previous_fs.css({
      transform: "scale(" +1+ ")",
    });

    go_back(current_fs,previous_fs);
  
  })

  //editdataset
  $("#editdatasetinfo").on("click", function () {
    current_fs = $('#summaryField');

    previous_fs = $("#resoucefield");
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    $("#progressbar li").eq($("fieldset").index(previous_fs)).addClass("active");
    previous_fs.show();
    previous_fs.css({
      transform: "scale(" +1+ ")",
    });

    //hide the current fieldset with style
    go_back(current_fs,previous_fs);
  });

  // editconinfo

  $("#editconinfo").on("click", function () {
    current_fs = $('#summaryField');

    previous_fs = $("#conField");
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    $("#progressbar li").eq($("fieldset").index(previous_fs)).addClass("active");

    previous_fs.show();
    //hide the current fieldset with style
    previous_fs.css({
      transform: "scale(" +1+ ")",
    });
    go_back(current_fs,previous_fs);
    var conDiv = document.getElementsByClassName('congroup');
    $.each(conDiv, (i) => {
    var conInfo = conDiv[i].getElementsByClassName('conInfo');
    $.each(conInfo, function (x) {

      var inputs = conInfo[x].querySelectorAll("input, select,textarea");
      $.each(inputs, function (i) {

        var input = $(this);
        // var nm = input.attr('name');
        var name = input.parent().find("label").text().slice(0, -1);
        var value = input.val();

        if (value !='') 
        {
           
         
        
        }else if(input.prop("required")){

          $(this).closest('span').css("background-color","pink");
        
        }

      });

    });

  

  });
})

  //editpersoninfo
    
  $("#editpersoninfo").on("click", function () {
    current_fs = $('#summaryField');
    previous_fs = $("#personinfo");
   
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    $("#progressbar li").eq($("fieldset").index(previous_fs)).addClass("active");

    previous_fs.show();
    previous_fs.css({
      transform: "scale(" + 1+ ")",
      
    });
    go_back(current_fs,previous_fs);
  });
  
  //editpubinfo
    
  $("#editpubinfo").on("click", function () {
    current_fs = $('#summaryField');

    previous_fs = $("#publicationinfo");

    $("#progressbar li")
      .eq($("fieldset").index(current_fs))
      .removeClass("active");
      $("#progressbar li").eq($("fieldset").index(previous_fs)).addClass("active");

      previous_fs.show();
      previous_fs.css({
        transform: "scale(" + 1+ ")",
        
      });
      go_back(current_fs,previous_fs);
  });

  // back to summary

  $(".backToSum").on("click", function () {
    current_fs = $(this).parent();
    var id =idRet( $(current_fs).attr('id'));
    if(id !=''){
      validInput(id);
    }
    next_fs = $("#summaryField");
    if (animating) return false;
    animating = true;
      $("#progressbar li").eq($("fieldset").index(kids[5])).addClass("active");
      $("#progressbar li")
      .eq($("fieldset").index(current_fs))
      .removeClass("active");
    next_fs.show();
    //hide the current fieldset with style

    next_fs.css({
      transform: "scale(" + 1+ ")",
      
    });

    go_next(current_fs,next_fs);
  })

  // li on click 

  $('#progressbar li').click(function(e) 
  { 
    var id = $(this).attr('id');

    for (var i=1; i<=5;i++) {
      if($("#progressbar li").eq($("fieldset").index(kids[i])).hasClass('active')){
        $("#progressbar li").eq($("fieldset").index(kids[i])).removeClass("active");
      }
    }
    var fields = $("#msform").children();
    var index;
    for(var i =1; i<=6;i++){

      var field = fields[i];

      if($(field).is(":visible")){

        current_fs = $(field);
        index = i;

        console.log(index);

      }
    }

    if(id == 'uinfo'){
      $("#progressbar li").eq($("fieldset").index(kids[1])).addClass('active');
      if(index !=1){
        if (animating) return false;
        animating = true;
        previous_fs = $('#userinfofield');
        previous_fs.show();
        previous_fs.css({
          transform: "scale(" +1+ ")",
          left:0+'%'
        });
        go_back(current_fs,previous_fs);
      }
    }
    if(id == 'pinfo'){

      $("#progressbar li").eq($("fieldset").index(kids[2])).addClass('active');
      if(index !=2){
       
        if(index >2){
          previous_fs = $("#profileinfofield");
          if (animating) return false;
          animating = true;
          previous_fs.show();
          previous_fs.css({
            transform: "scale(" +1+ ")",
            left:0+'%'
          });
          go_back(current_fs,previous_fs);
        }
        if(index < 2){
          next_fs = $("#profileinfofield");
          if (animating) return false;
          animating = true;
          next_fs.show();
          next_fs.css({
            transform: "scale(" +1+ ")",
            left:0+'%'
            
          });

         current_fs = $('#userinfofield');
          go_next(current_fs,next_fs);

         $('#userInfo').click();
         document.getElementById("userInfo").click();
        }
      }
      }
    
    if(id == 'rinfo'){
        $("#progressbar li").eq($("fieldset").index(kids[3])).addClass('active');
      if(index !=3){
        if(index>3){
          previous_fs = $("#resoucefield");
          if (animating) return false;
          animating = true;
          previous_fs.show();
          previous_fs.css({
            transform: "scale(" +1+ ")",
            left:0+'%'
          });
          go_back(current_fs,previous_fs);
        }
        if(index<3){
          next_fs = $("#resoucefield");
          if (animating) return false;
          animating = true;
          next_fs.show();
          next_fs.css({
            transform: "scale(" +1+ ")",
            left:0+'%'
          });
          go_next(current_fs,next_fs);
        }
      }
    }

    if(id == 'cinfo'){
      $("#progressbar li").eq($("fieldset").index(kids[4])).addClass('active');
      if(index!=4){
        if(index > 4){
          previous_fs = $("#conField");
          if (animating) return false;
          animating = true;
          previous_fs.show();
          previous_fs.css({
            transform: "scale(" +1+ ")",
            left:0+"%"
          });
          go_back(current_fs,previous_fs);

        }
        if(index < 4){
          next_fs = $("#conField");
          if (animating) return false;
          animating = true;
          next_fs.show();
          next_fs.css({
            transform: "scale(" +1+ ")",
            left:0+'%'
            
          });
          go_next(current_fs,next_fs);
        }
      }
    }
    // if(id == 'pinfo'){
    //     $("#progressbar li").eq($("fieldset").index(kids[5])).addClass('active');
      
    //   if(index!=5){
    //     if(index > 5){
    //       previous_fs = $("#publicationinfo");
    //       if (animating) return false;
    //       animating = true;
    //       previous_fs.show();
    //       go_back(current_fs,previous_fs);

    //     }
    //     if(index < 5){
    //        next_fs = $("#publicationinfo");
    //       if (animating) return false;
    //       animating = true;
    //       next_fs.show();
    //       go_next(current_fs);
    //     }
    //   }
    // }
    if(id == 'sinfo'){
        $("#progressbar li").eq($("fieldset").index(kids[5])).addClass('active');
      if(index!=5){
        
        next_fs = $("#summaryField");
        if (animating) return false;
        animating = true;
        next_fs.show();
        next_fs.css({
          transform: "scale(" +1+ ")",
          left:0+'%'
          
        });
        go_next(current_fs,next_fs);
        adduSum();
        addpSum();
        // addDataSum();
        addRSum();
        addCSum();
        // addPSum();

      }
    }
      
  })

  function go_next(current,next){
    var id =idRet( $(current_fs).attr('id'));
    if(id !=''){
      validInput(id);
    }
    current.animate(
      { opacity: 0 },
      {
        step: function (now, mx) {
          scale = 1 - (1 - now) * 0.2;
          left = now * 50 + "%";
          opacity = 1 - now;
          current.css({
            transform: "scale(" + scale + ")",
            position: "absolute"
          });
          next.css({ left: left, opacity: opacity });
        },
        duration: 800,
        complete: function () {
          current.hide();
          animating = false;
        },
        easing: "easeInOutBack"
      }
    );

  }

  function go_back(current,previous){
    var id =idRet( $(current_fs).attr('id'));
    if(id !=''){
      validInput(id);
    }
    current.animate(
      { opacity: 0 },
      {
        step: function (now, mx) {
          scale = 0.8 + (1 - now) * 0.2;
          left = (1 - now) * 50 + "%";
          opacity = 1 - now;
          current.css({ left: left });
         previous.css({
            transform: "scale(" + scale + ")",
            opacity: opacity
          });
        },
        duration: 800,
        complete: function () {
          current.hide();
          animating = false;
        },
        easing: "easeInOutBack"
      }
    );

  }



 
    
  

  // Formate Names 

  // function formateName(na) {
  //   if (na === "u_lname") {
  //     return "Last Name";
  //   } else if (na === "u_fname") {
  //     return "First Name";
  //   }
  //   if (na === "u_role") {
  //     return "Role";
  //   }
  //   if (na === "u_email") {
  //     return "Email";
  //   } else if (na === "d_studysize") {
  //     return "Study Size";
  //   } else if (na === "d_title") {
  //     return "Data Title";
  //   } else if (na === "d_abstract") {
  //     return "Data Abstract";
  //   } else if (na === "d_datatypevalue") {
  //     return "Datatypes";
  //   } else if (na === "d_researchstudy") {
  //     return "Research Project";
  //   } else if (na === "d_funders[]") {
  //     return "Funders";
  //   } else if (na === "d_geography[]") {
  //     return "Geography";
  //   } else if (na === "d_ethnicity[]") {
  //     return "Ethnicity";
  //   } else if (na === "d_keywordvalue") {
  //     return "Keywords";
  //   } else if (na === "Ar-value") {
  //     return "Age Range";
  //   } else if (na === "p_title[]") {
  //     return "Publication Title";
  //   } else if (na === "p_venue[]") {
  //     return "Publication Venue";
  //   } else if (na === "p_afname[]") {
  //     return "Author";
  //   } else if (na === "p_date[]") {
  //     return "Publication Date";
  //   } else if (na === "p_odi[]") {
  //     return "Publication DOI";
  //   } else if (na === "per_title[]") {
  //     return "Person Title";
  //   } else if (na === "per_forename[]") {
  //     return "Forename";
  //   } else if (na === "per_middlename[]") {
  //     return "Middle";
  //   } else if (na === "per_surname[]") {
  //     return "Surname";
  //   } else if (na === "per_email[]") {
  //     return "Email";
  //   } else if (na === "per_iscontact[]") {
  //     return "Contactable";
  //   } else if (na === "per_issenior[]") {
  //     return "Senior";
  //   } else if (na === "org_department[]") {
  //     return "Daprtment";
  //   } else if (na === "org_name[]") {
  //     return "Oraganization";
  //   } else if (na === "c_allowedcountries[]") {
  //     return "Allowed Countries";
  //   } else if (na === "c_profituse") {
  //     return "Profit Use";
  //   } else if (na === "c_contact") {
  //     return "Recontact";
  //   } else if (na === "c_bru[]") {
  //     return "Broad Research Uses";
  //   } else if (na === "c_sru[]") {
  //     return "Specific Research Uses";
  //   } else if (na === "d_datatheme") {
  //     return "Theme or Department";
  //   } else if (na === "d_arights") {
  //     return "Access Rights";
  //   } //d_legaljurisdiction[]
  //   else if (na === "d_legaljurisdictionvalue") {
  //     return "Legal Jurisdiction";
  //   } //d_controler
  //   else if (na === "d_controler") {
  //     return "Data Controller";
  //   }
  //   //per_iscontactvalue
  //   else if (na === "per_iscontactvalue") {
  //     return "Contact Point";
  //   }   else if (na === "per_affiliationvalue[]") {
  //     return "Affiliations";
  //   }
  //   else if (na === "d_conpoint") {
  //     return "Contact Point";
  //   }else if (na === "d_organisation") {
  //     return "Organisation";
  //   }else {
  //     return na;
  //   }
  // }


  
})
$(function(){

$("#p_refs").select2({
    placeholder: "Please enter reference and press enter",
    tags: true,
    tokenSeparators: [",", ";"],
    theme: "bootstrap",
    width: '100%'

    });

    $("#r_dlevel").select2({
        placeholder: "Please select resource data level",
        tags: false,
        tokenSeparators: [",", ";"],
        theme: "bootstrap",
        width: '100%'
    
    });

    $("#r_disp").select2({
        placeholder: "Please select or add resource disposotion and press enter",
        tags: true,
        tokenSeparators: [",", ";"],
        theme: "bootstrap",
        width: '100%'
    
    });
    // r_pmode
    $("#r_pmode").select2({
        placeholder: "Please select resource permission mode.",
        tags: true,
        tokenSeparators: [",", ";"],
        theme: "bootstrap",
        width: '100%'
    
    });
    


    $("#r_contact").select2({
        placeholder: "Please enter contact email and press enter.",
        tags: true,
        tokenSeparators: [",", ";"],
        theme: "bootstrap",
        width: '100%'
    
    });


  
});

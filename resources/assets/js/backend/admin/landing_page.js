var id= $('#textbox_id').val();


function get_list_image()
{
    var preview = [];
    $.ajax({
        url: '../list_gallery',
        dataType: 'JSON',
        async: false, 
        type: "GET",
        data: {id : id},
        success: function (param) {
            $.each(param, function (index, value)
            {
                console.log('value',value);
                $.each(value, function (index, value2)
                {            
                    preview.push("<img style='height:160px' src='../../../resources/assets/image/landing_page/"+value2.landing_page_id+"/"+value2.original_name+"'/>");
                });
            });
        },
        error: function () {
            alert("something when wrong");
        }
    });
    return preview;
}

function get_list_function()
{
    var funct = [];
    $.ajax({
        url: '../list_gallery',
        dataType: 'JSON',
        async: false, 
        type: "GET",
        data: {id : id},
        success: function (param) {
            $.each(param, function (index, value)
            {
                console.log('value',value);
                $.each(value, function (index, value2)
                {                    
                    funct.push({caption: value2.filename, width: "120px", url: "../delete_image", key: value2.id});
                });
            });
        },
        error: function () {
            alert("something when wrong");
        }
    });
    return funct;
}


$(document).ready(function(){
    var $el2 = $("#input-gallery");
    var footerTemplate = '<div class="file-thumbnail-footer">\n' +
    '   <div style="margin:5px 0">\n' +
    '       <input class="kv-input kv-new form-control input-sm {TAG_CSS_NEW}" value="{caption}" placeholder="Enter caption...">\n' +
    '   </div>\n' +
    '   {actions}\n' +
    '</div>';

    $el2.fileinput({
        uploadUrl: '../upload',
        // uploadAsync: false, // non aktifkan fileuploaded function
        maxFileCount: 5,
        maxFileSize: 1028,
        allowedFileExtensions: ["jpg", "gif", "png"],
        overwriteInitial: false,
        layoutTemplates: {footer: footerTemplate},
        initialPreview: get_list_image(),
        initialPreviewConfig: get_list_function(),
        uploadExtraData :   {id: id}
    });

    $('#input-gallery').on('fileuploaded', function(event) {
        location.reload();
    });

    $('#input-gallery').on('filepredelete', function(event, key) {
        var abort = true;
        if (confirm("Are you sure you want to delete this image?")) {
            abort = false;
        }
        return abort; 
    });

    $('#input-gallery').on('fileimagesloaded', function(event,key) {
        $(".kv-file-upload").hide();
    });

});
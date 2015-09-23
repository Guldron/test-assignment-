$(function () {
    $('#fileupload').fileupload({ //load jQuery Upload Files
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo(document.body);
            });
        }
    });
});


$(function () {
 var editor = new wysihtml5.Editor("textarea", {
    toolbar:        "toolbar",
    parserRules:    wysihtml5ParserRules,
    useLineBreaks:  false
  });
});
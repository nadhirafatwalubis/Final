Dropzone.autoDiscover = false;
$('[data-toggle="tooltip"]').tooltip();
// copy js
$('.btn').tooltip({
    trigger: 'click',
    placement: 'bottom'
});

$(".select2").select2();
$(".select2-tags").select2({
    tags: true,
    tokenSeparators: [','],
});

function setTooltip(btn, message) {
    $(btn).tooltip('hide')
        .attr('data-original-title', message)
        .tooltip('show');
}

function hideTooltip(btn) {
    setTimeout(function () {
        $(btn).tooltip('hide');
    }, 1000);
}


var clipboard = new ClipboardJS('.btn');

clipboard.on('success', function (e) {
    setTooltip(e.trigger, 'Copied!');
    hideTooltip(e.trigger);
});

clipboard.on('error', function (e) {
    setTooltip(e.trigger, 'Failed!');
    hideTooltip(e.trigger);
});
// end copy js

$('table').on('draw.dt', function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('.star').rating({
        theme: 'krajee-fas',
        containerClass: 'is-star',
        showCaption: false,
        displayOnly: true,
        size: 'xs'
    });
})
// Card Progress Controller
$.simpleCardProgress = function (card) {
    var me = $(card);
    me.addClass('card-progress');
}

$.myCodeMirror = function (selector, height = 105) {
    var editor = CodeMirror.fromTextArea(document.getElementById(selector), {
        mode: "javascript",
        theme: "material-darker",
        lineNumbers: true,
        styleActiveLine: true,
        matchBrackets: true,
        scrollbarStyle: "simple"
    })
    editor.setSize(null, height);
}

$.myTinyMce = function (selector, height = 240) {
    var editor_config = {
        path_absolute: "/",
        selector: selector,
        relative_urls: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern quickbars"
        ],
        toolbar_mode: 'sliding',
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 h4 alignleft aligncenter alignright alignjustify blockquote quickimage quicktable',
        quickbars_insert_toolbar: false,
        toolbar: "fullscreen undo redo | fontselect fontsizeselect formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",

        file_picker_callback: function (callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document
                .getElementsByTagName(
                    'body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document
                .getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta
                .fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        },
        image_class_list: [{
            title: 'Image Responsive',
            value: 'img-fluid'
        }],
        height: height
    };

    tinymce.init(editor_config);
}

if (CKEDITOR.env.ie && CKEDITOR.env.version < 9)
    CKEDITOR.tools.enableHtml5Elements(document);

// The trick to keep the editor in the sample quite small
// unless user specified own height.
CKEDITOR.config.height = 200;
CKEDITOR.config.width = 'auto';

const csrf_token = $('meta[name="_token"]').attr('content');
const wysiwygareaAvailable = isWysiwygareaAvailable(),
    isBBCodeBuiltIn = !!CKEDITOR.plugins.get('bbcode');

const route_prefix = "/filemanager";
$(".ckEditor").each(function () {
    const editorElement = CKEDITOR.document.getById(this.id);
    const editor = CKEDITOR.replace(this.id, {
        height: 100,
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token='+csrf_token,
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='+csrf_token
});

    if (wysiwygareaAvailable) {
        CKEDITOR.replace(this.id);
    } else {
        editorElement.setAttribute('contenteditable', 'true');
        CKEDITOR.inline(this.id);

    }
})


function isWysiwygareaAvailable() {
    // If in development mode, then the wysiwygarea must be available.
    // Split REV into two strings so builder does not replace it :D.
    if (CKEDITOR.revision === ('%RE' + 'V%')) {
        return true;
    }

    return !!CKEDITOR.plugins.get('wysiwygarea');
}

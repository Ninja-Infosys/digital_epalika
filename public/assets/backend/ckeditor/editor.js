if (CKEDITOR.env.ie && CKEDITOR.env.version < 9)
    CKEDITOR.tools.enableHtml5Elements(document);

CKEDITOR.config.width = 'auto';

const csrf_token = $('meta[name="csrf-token"]').attr('content');
const wysiwygareaAvailable = isWysiwygareaAvailable(),
    isBBCodeBuiltIn = !!CKEDITOR.plugins.get('bbcode');

$(".ckEditor").each(function () {
    const editorElement = CKEDITOR.document.getById(this.id);
    const editor = CKEDITOR.replace(this.id, {
        height: 350,
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
    if (CKEDITOR.revision === ('%RE' + 'V%')) {
        return true;
    }

    return !!CKEDITOR.plugins.get('wysiwygarea');
}

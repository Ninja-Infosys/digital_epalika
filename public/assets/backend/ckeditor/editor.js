const config = {
    width: 'auto',
    height: 350,
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + data.csrf,
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=' + data.csrf
};
$(".ckEditor").each(function () {
    const elementId = id ? id : $(this).attr('id');
    CKEDITOR.replace(elementId, config);
});

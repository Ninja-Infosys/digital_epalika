class MyUploadAdapterAnswer {
    constructor(loader) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file
            .then(file => new Promise((resolve, reject) => {
                this._initRequest();
                this._initListeners(resolve, reject, file);
                this._sendRequest(file);
            }));
    }

    abort() {
        if (this.xhr) {
            this.xhr.abort();
        }
    }

    _initRequest() {
        const xhr = this.xhr = new XMLHttpRequest();
        xhr.open('POST', uploadFileUrl, true);
        xhr.setRequestHeader('x-csrf-token', document.head.querySelector('[name=csrf-token]').content);
        xhr.responseType = 'json';
    }

    _initListeners(resolve, reject, file) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Couldn't upload file: ${file.name}.`;

        xhr.addEventListener('error', () => reject(genericErrorText));
        xhr.addEventListener('abort', () => reject());
        xhr.addEventListener('load', () => {
            const response = xhr.response;
            if (!response || response.error) {
                return reject(response && response.error ? response.error.message : genericErrorText);
            }
            resolve({
                default: response.url
            });
        });
        if (xhr.upload) {
            xhr.upload.addEventListener('progress', evt => {
                if (evt.lengthComputable) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            });
        }
    }

    // Prepares the data and sends the request.
    _sendRequest(file) {
        // Prepare the form data.
        const data = new FormData();

        data.append('upload', file);
        this.xhr.send(data);
    }
}

function SimpleUploadAdapterAnswerPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return new MyUploadAdapterAnswer(loader);
    };
}
$(document).ready(function () {
    $('.cacheButton').on('click', function (e) {
        const cacheButton = $("#cacheBtn");
        e.preventDefault()
        $.ajax({
            method: "GET",
            url: $(this).attr("data"),
            beforeSend: function() {
                cacheButton.attr('disabled', true);
                cacheButton.html("<i class='fa fa-spinner fa-spin'></i>");
            },
            success: function (response) {
                swal.fire({
                    title: response.message,
                    toast:true,
                    position:'top-right',
                    timer:3000,
                    showConfirmButton:false,
                    timerProgressBar:true,
                    width:400,
                    icon: 'success',
                });
                cacheButton.attr('disabled', false);
                cacheButton.html("<i class='fas fa-brush'></i>");
            }, error: function () {
                cacheButton.attr('disabled', false);
                cacheButton.html("<i class='fas fa-brush'></i>");
            }
        });
    })
})
function copyText(element) {
    navigator.clipboard.writeText(element);
}

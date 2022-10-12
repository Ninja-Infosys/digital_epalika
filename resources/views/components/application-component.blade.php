<div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadApplicationModal"
            data-bs-file_type="{{$applicationType}}">Upload Application
    </button>

    <div class="modal fade" id="uploadApplicationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">File Type:</label>
                            <input type="text" class="form-control" id="recipient-name" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">File:</label>
                            <input type="file" class="form-control" id="recipient-name">
                        </div>

                        <button type="submit" class="btn btn-primary" >Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const exampleModal = document.getElementById('uploadApplicationModal')
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const recipient = button.getAttribute('data-bs-file_type')
                // If necessary, you could initiate an AJAX request here
                // and then do the updating in a callback.
                //
                // Update the modal's content.
                const modalBodyInput = exampleModal.querySelector('.modal-body input')

                modalBodyInput.value = recipient
            })

        </script>
    @endpush
</div>

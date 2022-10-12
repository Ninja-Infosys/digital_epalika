<div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadApplicationModal"  data-bs-file_type="{{$applicationType->value}}"
            data-bs-file_type_label="{{$applicationType->label()}}">
        Upload Application
    </button>
    <div class="modal fade" id="uploadApplicationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{$url}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="file_type" value="{{$applicationType->value}}" name="file_type" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="col-form-label">आबेदन:</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                const label = button.getAttribute('data-bs-file_type_label')
                // If necessary, you could initiate an AJAX request here
                // and then do the updating in a callback.
                //
                // Update the modal's content.
                const modalTitle = exampleModal.querySelector('.modal-title')

                modalTitle.textContent = `${label}`
                modalBodyInput.value = recipient
            })

        </script>
    @endpush
</div>

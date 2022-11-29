<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="header-title">५. उपभोक्ता समिति समुदायमा अधारित संस्था गैरसरकारी संस्थाले प्राप्त गर्ने किस्ता विवरण:</h4>
        <button type="button" wire:click="openCreateModal" class="btn btn-xs btn-outline-primary">
            <i class="fa fa-plus-circle"> Add New</i>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                <tr>
                    <th>किस्ताको क्रम</th>
                    <th>मिति</th>
                    <th>किस्ताको रकम</th>
                    <th>निर्माण समाग्री परिमाण</th>
                    <th>कैफियत</th>
                    <th> #</th>
                </tr>
                </thead>
                <tbody>
                @forelse($installmentDetails as $key=>$installmentDetail)
                    <tr>
                        <td>
                            <button type="button" wire:click="removeProjectGrantDetails({{$key}})"
                                    class="btn btn-xs btn-outline-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="5">
                            तालिकामा कुनै डाटा उपलब्ध छैन !!!
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($createModalOpened)
            <div class="modal fade show" id="bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-modal="true" role="dialog" style="display: block;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        @endif
    </div>
</div>

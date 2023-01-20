<div class="row mx-n1 g-0">
    @if($file['isFile'])
        <div class="col-xl-4 col-lg-6">
            <div class="card m-1 shadow border rounded" data-bs-toggle="tooltip" data-bs-placement="top"
                 title="{{collect($file)->has('label') ? $file['label'] : ''}}">
                <div class="p-2">
                    <div class="row align-items-center">
                        <div class="col-auto pe-0">
                            <div class="avatar-sm">
                                          <span class="avatar-title text-primary rounded">
                                               <i class="fa {{collect($file)->has('detail') ? $file['detail']['icon'] : ''}} fs-1"></i>
                                           </span>
                            </div>
                        </div>
                        <div class="col text-muted fw-bold text-truncate">
                            {{collect($file)->has('label') ? $file['label'] : ''}}
                        </div>
                        <div class="col d-flex justify-content-between">
                            <p class="mb-0 font-13">{{collect($file)->has('detail') ? $file['detail']['size'] : ''}}</p>
                            <a href="{{route('admin.file-url-download',['file_url'=>$file['path']])}}"
                               class="btn btn-sm btn-primary">
                                <i class="fa fa-download text-white"></i>
                            </a>
                        </div>
                    </div> <!-- end row -->
                </div> <!-- end .p-2-->
            </div> <!-- end col -->
        </div> <!-- end col-->
    @else
        <div class="border-bottom d-flex justify-content-between">
            <p class="text-primary fw-semibold fs-5">{{collect($file)->has('label') ? \Illuminate\Support\Str::upper($file['label']) : ''}}</p>

        </div>
    @endif

    @if(collect($file)->has('children'))
        {{--        has Child--}}
        @foreach($file['children'] as $child)
            @include('admin.inc.file', ['file' => $child])
        @endforeach
    @endif
</div> <!-- end row-->

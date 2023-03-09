<div>
    <div class="offcanvas offcanvas-end"
         tabindex="-1" id="offcanvasRight"
         aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h4 class="mb-0 text-truncate" id="offcanvasRightLabel">{{$title}}</h4>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <img class="img-fluid img-thumbnail" src="{{$fileUrl}}" loading="lazy">
        </div>
    </div>

</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Success</h5>
        {!! session('success') !!}
    </div>

    {{-- <div class="alert alert-success fade in">
        <button type="button" class="close pull-right" data-dismiis="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! session('success') !!}
    </div> --}}
@endif
@if (session('error'))
    <div class="alert alert-danger fade in">
        <button type="button" class="close pull-right" data-dismiis="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! session('error') !!}
    </div>
@endif

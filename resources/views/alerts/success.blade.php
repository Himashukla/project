@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" id="success-msg" role="alert" style="position: fixed;">
    <span class="alert-inner--icon"><i class="fa fa-thumbs-up"></i></span>
    <span class="alert-inner--text">{!! session()->get('success')!!}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
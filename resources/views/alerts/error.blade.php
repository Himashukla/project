@if(isset($errors) && count($errors) > 0)
<div class="alert alert-danger alert-dismissible" role="alert" id="danger-msg" style="position: fixed;">
    <div class="row">
	@foreach ($errors->all() as $error)
    <div class="col-md-4">
        <span class="alert-inner--icon"><i class="fa fa-thumbs-down"></i></span>
        <span class="alert-inner--text">{{$error}}<br/></span>
    </div>
    @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
</div>

@endif
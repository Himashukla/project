@if(Session::has('message'))
<div class="alert alert-danger alert-dismissible" role="alert" id="alert-msg" style="position: fixed;">
	 <span class="alert-inner--icon"><i class="fa fa-thumbs-down"></i></span>
    <span class="alert-inner--text">{!! session()->get('message')!!}<br/></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
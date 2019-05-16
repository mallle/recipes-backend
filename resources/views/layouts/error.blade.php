@if(!empty($errors->any()))
    <div class="row col-lg-12">
        <div class="alert alert-danger">
        	@foreach ($errors->all() as $error)
        		 <li>{{ $error }}</li>
        	@endforeach
        </div>
    </div>
@endif

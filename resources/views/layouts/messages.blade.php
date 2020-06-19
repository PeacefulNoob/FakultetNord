@if(count($errors) > 0)
@foreach($errors->all() as $error)
<div class='alert alert-success' style="margin:20px;text-align: center;">
    {{$error}}
</div>
.@endforeach
@endif
@if(session('success'))
<div class='alert alert-success' style="margin:20px;text-align: center;">
    {{session('success')}}
</div>
@endif
@if(session('error'))
<div class='alert alert-success' style="margin:20px;text-align: center;">
    {{session('error')}}
</div>
@endif

@if(session('contact'))
<div class='alert alert-success' style="margin:20px;text-align: center;margin-top: 10%;">
    {{session('contact')}}
</div>
@endif
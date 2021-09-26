@if(count($errors))
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{$error}}
</div>
@endforeach
@endif

@if(session()->exists('error'))
<div class="alert alert-danger" role="alert">
    {{session('error')['body']}}
</div>
@endif

@if(session()->exists('success'))
<div class="alert alert-success" role="alert">
    {{session('success')['body']}}
</div>
@endif

@if(session()->exists('info'))
<div class="alert alert-info" role="alert">
    {{session('info')['body']}}
</div>
@endif

@if(session()->exists('warning'))
<div class="alert alert-warning" role="alert">
    {{session('warning')['body']}}
</div>
@endif
<form action="{{Request::url().'/'.$id}}" , method="POST">
    <!-- csrf protects from hacker and avoid error 419 PAGE EXPIRED-->
    @csrf
    @method('DELETE')
    <!-- danger red color button -->
    <button Type="Submit" class="btn btn-danger">Delete</button>
</form>
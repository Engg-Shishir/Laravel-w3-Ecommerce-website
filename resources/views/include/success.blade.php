
<!--======== If session hs message =========-->
@if(Session::has('success'))
  <div class="alert bg-success text-dark alert-dismissible fade show text-center" role="alert">
  <strong>{{Session::get('success')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
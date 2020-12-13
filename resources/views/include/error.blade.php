
<!--======== If session hs message =========-->
@if(Session::has('error'))
  <div class="alert bg-danger text-dark alert-dismissible fade show text-center" role="alert">
  <strong>{{Session::get('error')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
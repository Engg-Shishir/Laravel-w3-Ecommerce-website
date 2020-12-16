
<div class="card">
  <div class="card-body">
      <div class="row">
          <div class="col-md-8 m-auto">
              <img src="{{asset(Auth::user()->photo)}}" alt="" style="border-radius:50%;" height="100%" width="100%">
          </div>
          <div class="col-md-10 m-auto">
              <div class="row">
                <div class="col-md-3">
                    <a href="{{route('home')}}" class="btn btn-info"><span class="fas fa-home"></span></a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-danger" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <div class="col-md-6">
                    <a href="{{route('user.order')}}" class="btn btn-info"><span class="fas fa-eye"></span>&nbsp;Orders</a>
                </div>
              </div>
            

          </div>
      </div>
  </div>
</div>
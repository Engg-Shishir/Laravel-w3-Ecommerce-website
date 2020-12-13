  <!--========= ########## START: LEFT PANEL ########## =========-->
  <div class="sl-logo">
    <a href="{{url('/admin/home')}}"><i class="icon ion-android-star-outline"></i> Starlight</a>
  </div>
  <!--========= sl-sideleft =========-->
  <div class="sl-sideleft">
    <div class="sl-sideleft-menu">
      <a href="{{url('/admin/home')}}" class="sl-menu-link @yield('dashboard')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label ">Dashboard</span>
        </div><!--========= menu-item =========-->
      </a><!--========= sl-menu-link =========-->
      <a href="{{url('/')}}" target="_blank" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Visit</span>
        </div><!--========= menu-item =========-->
      </a><!--========= sl-menu-link =========-->

      <a href="{{route('admin.categorys')}}" class="sl-menu-link @yield('category')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Category</span>
        </div><!--========= menu-item =========-->
      </a><!--========= sl-menu-link =========-->

      <a href="{{-- {{route('admin.brand')}} --}}" class="sl-menu-link @yield('brand')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Brand</span>
        </div><!--========= menu-item =========-->
      </a><!--========= sl-menu-link =========-->

        
      <a href="#" class="sl-menu-link  @yield('products')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
          <span class="menu-item-label">Products</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!--========= menu-item =========-->
      </a><!--========= sl-menu-link =========-->
      <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{-- {{route('add-products')}} --}}" class="nav-link @yield('add-products')">Add Product</a></li> 
        <li class="nav-item"><a href="{{-- {{route('manage-products')}} --}}" class="nav-link @yield('manage-products')">Manage Product</a></li>
      </ul>

      <a href="{{-- {{route('admin.cupon')}} --}}" class="sl-menu-link @yield('cupon')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Cupon</span>
        </div><!--========= menu-item =========-->
      </a><!--========= sl-menu-link =========-->

      <a href="{{-- {{route('admin.order')}} --}}" class="sl-menu-link @yield('order')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Order</span>
        </div><!--========= menu-item =========-->
      </a><!--========= sl-menu-link =========-->

    </div><!--========= sl-sideleft-menu =========-->
  </div>
<!--========= ########## END: LEFT PANEL ########## =========-->
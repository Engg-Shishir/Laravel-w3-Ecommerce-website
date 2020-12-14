<div class="hero__categories">
  <div class="hero__categories__all">
      <i class="fa fa-bars"></i>
      <span>All Categoris</span>
  </div>
  @php
      $categorys = App\Models\Category::where('status',1)->latest()->get();
  @endphp
  <ul>
      @foreach ($categorys as $row)
        <li><a href="{{url('/category/product_show/'.$row->id)}}">{{$row->cat_name}}</a></li>
      @endforeach
  </ul>
</div>
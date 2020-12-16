
                      <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Brands</span>
                        </div>
                        @php
                          $brands = App\Models\Brand::where('status',1)->latest()->get();
                        @endphp
                        <ul>
                            @foreach ($brands as $row)
                              <li><a href="{{url('/brand/product/'.$row->id)}}">{{$row->brand_name}}</a></li>
                            @endforeach
                        </ul>
                     </div>
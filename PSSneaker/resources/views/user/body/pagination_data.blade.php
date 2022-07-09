                  <div class="grid-container-sp">
                      @foreach($lstproduct as $product)
                      <div class="grid-item-sp">
                          <a href="{{route('productdetail',$product->id)}}" title="{{$product->name}}">
                              <div class="img-sp">
                                  <p class="scale-img img_hover"><img src="{{$product->image}}" alt="{{$product->name}}"></p>
                                  @if(($product->discount)!=0)
                                  <div class="discount-sp">
                                      <p>{{$product->discount}}%</p>
                                  </div>
                                  @else
                                  @endif
                              </div>
                          </a>
                          <div class="info-product">
                              <a href="{{route('productdetail',$product->id)}}" title="{{$product->name}}">
                                  <div class="name-sp">
                                      <p class="text-split-1">{{$product->name}}</p>
                                  </div>
                              </a>
                              <a href="{{route('productdetail',$product->id)}}" title="{{$product->name}}">
                                  <div class="price-sp">
                                      @if(($product->discount)!=0)
                                      <span>Giá: </span>
                                      <span class="sale_price_sp">{{number_format($product->sale_price)}}₫</span>
                                      <span class="regular_price_sp"><del>{{number_format($product->regular_price)}}₫</del></span>
                                      @else
                                      <span>Giá: </span>
                                      <span class="price-new">{{($product->regular_price)!=0 ? number_format($product->regular_price) : 'Liên Hệ'}}{{($product->regular_price)!=0 ? '₫' : ''}}</span>
                                      @endif
                                  </div>
                              </a>
                              <div class="box-cart">
                                  <a href="{{route('productdetail',$product->id)}}">
                                      XEM CHI TIẾT
                                  </a>
                              </div>
                          </div>
                      </div>
                      @endforeach
                  </div>
                  <div class="pagination flex-wrap justify-content-center">
                      {!! $lstproduct->links() !!}
                  </div>
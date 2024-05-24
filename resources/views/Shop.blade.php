@extends('/LayoutDotties/layout')

@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('TrangChu')}}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <form action="Shop">
                            <div class="shop__sidebar__search">
                                <input name="search" value="{{ request ('search') }}" type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </div>
                        </form>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                @foreach($loaisp as $loaisps)
                                                    <li><a href="Shop/{{$loaisps->TenLoai}}">{{$loaisps->TenLoai}}</a></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    <li><a href="#">Louis Vuitton</a></li>
                                                    <li><a href="#">Chanel</a></li>
                                                    <li><a href="#">Hermes</a></li>
                                                    <li><a href="#">Gucci</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="#">$0.00 - $50.00</a></li>
                                                    <li><a href="#">$50.00 - $100.00</a></li>
                                                    <li><a href="#">$100.00 - $150.00</a></li>
                                                    <li><a href="#">$150.00 - $200.00</a></li>
                                                    <li><a href="#">$200.00 - $250.00</a></li>
                                                    <li><a href="#">250.00+</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                    </div>
                                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__size">
                                                <label for="EU8" class="{{request('KichThuoc') == '8UK' ? 'active' : '' }}">EU 8
                                                    <input type="radio" id="8UK" name="KichThuoc" value="8UK" onchange="this.form.submit();" {{request('KichThuoc') == '8UK' ? 'checked' : '' }}>
                                                </label>
                                                <label for="EU9" class="{{request('KichThuoc') == 'EU9' ? 'active' : '' }}">EU 9
                                                    <input type="radio" id="EU9" name="KichThuoc" value="EU 9" onchange="this.form.submit();"{{request('KichThuoc') == 'EU9' ? 'checked' : '' }}>
                                                </label>
                                                <label for="EU10" class="{{request('KichThuoc') == 'EU10' ? 'active' : '' }}">EU 10
                                                    <input type="radio" id="EU10" name="KichThuoc" value="EU 10" onchange="this.form.submit();"{{request('KichThuoc') == 'EU10' ? 'checked' : '' }}>
                                                </label>
                                                <label for="EU11" class="{{request('KichThuoc') == 'EU11' ? 'active' : '' }}">EU 11
                                                    <input type="radio" id="EU 11" name="KichThuoc" value="EU 11" onchange="this.form.submit();"
                                                    {{request('KichThuoc') == 'EU11' ? 'checked' : '' }}>
                                                </label>
                                                <label for="EU12" class="{{request('KichThuoc') == 'EU12' ? 'active' : '' }}">EU 12
                                                    <input type="radio" id="EU12" name="KichThuoc" value="EU 12" onchange="this.form.submit();"{{request('KichThuoc') == 'EU12' ? 'checked' : '' }}>
                                                </label>
                                                <label for="EU13" class="{{request('KichThuoc') == 'EU13' ? 'active' : '' }}"> EU 13
                                                    <input type="radio" id="EU13" name="KichThuoc" value="EU 13" onchange="this.form.submit();"{{request('KichThuoc') == 'EU13' ? 'checked' : '' }}>
                                                </label>
                                                <label for="EU14" class="{{request('KichThuoc') == 'EU14' ? 'active' : '' }}">EU 14
                                                    <input type="radio" id="EU14" name="KichThuoc" value="EU 14" onchange="this.form.submit();"{{request('KichThuoc') == 'EU14' ? 'checked' : '' }}>
                                                </label>
                                                <label for="EU15" class="{{request('KichThuoc') == 'EU 45' ? 'active' : '' }}">EU 15
                                                    <input type="radio" id="EU 45" name="KichThuoc" value="EU45" onchange="this.form.submit();"
                                                    {{request('KichThuoc') == 'EU45' ? 'checked' : '' }}>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFive">Colors</a>
                                    </div>
                                    <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__color">
                                                <label class="c-1" for="sp-1">
                                                    <input type="radio" id="sp-1" name="color" value="Whitewithblack" onchange="this.form.submit();"
                                                    {{request('color') == 'Whitewithblack' ? 'checked' : '' }}>
                                                </label>
                                                <label class="c-2" for="sp-2">
                                                    <input type="radio" id="sp-2" name="color" value="Solar Orange / Cloud White / Wonder Steel" onchange="this.form.submit();">
                                                </label>
                                                <label class="c-3" for="sp-3">
                                                    <input type="radio" id="sp-3" name="color" value="Grey One / Core Black / Grey Five" onchange="this.form.submit();">
                                                </label>
                                                <label class="c-4" for="sp-4">
                                                    <input type="radio" id="sp-4" name="color" value="Summit White/Blue Whisper/Football Grey/White" onchange="this.form.submit();">
                                                </label>
                                                <label class="c-5" for="sp-5">
                                                    <input type="radio" id="sp-5" name="color" value="White/Light Crimson/Platinum Tint/Black" onchange="this.form.submit();">
                                                </label>
                                                <label class="c-6" for="sp-6">
                                                    <input type="radio" id="sp-6" name="color" value="Aura/Barely Green/Vivid Sky/Sail" onchange="this.form.submit();">
                                                </label>
                                                <label class="c-7" for="sp-7">
                                                    <input type="radio" id="sp-7" name="color" value="Xám sói/Xanh sân vận động/Xanh Baltic/Volt" onchange="this.form.submit();">
                                                </label>
                                                <label class="c-8" for="sp-8">
                                                    <input type="radio" id="sp-8" name="color" value="Non Dyed / Silver Violet / Impact Orange" onchange="this.form.submit();">
                                                </label>
                                                <label class="c-9" for="sp-9">
                                                    <input type="radio" id="sp-9" name="color" value="Grey One / Core Black / Grey Five" onchange="this.form.submit();">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                    </div>
                                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__tags">
                                                <a href="#">Product</a>
                                                <a href="#">Bags</a>
                                                <a href="#">Shoes</a>
                                                <a href="#">Fashio</a>
                                                <a href="#">Clothing</a>
                                                <a href="#">Hats</a>
                                                <a href="#">Accessories</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <form action="">
                                    <div class="shop__product__option__right">
                                        <select onchange="this.form.submit();" name="sort_by" class="sorting"> 
                                            <option {{ request('sort_by') == 'latest' ? 'selected' : '' }} value="latest"> Sorting: Latest</option>
                                            <option {{ request('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">Sorting: Oldest</option>
                                            <option {{ request('sort_by') == 'name-asscending' ? 'selected' : '' }} value="name-asscending">Sorting: Name A-Z</option>
                                            <option {{ request('sort_by') == 'name-descending' ? 'selected' : '' }} value="name-descending">Sorting:Name Z-A</option>
                                            <option {{ request('sort_by') == 'price-asscending' ? 'selected' : '' }} value="price-asscending">Sorting: Price Ascending</option>
                                            <option {{ request('sort_by') == 'price-decrease' ? 'selected' : '' }} value="price-decrease">Sorting: Price Decrease</option>
                                        </select>
                                        <select onchange="this.form.submit();" name="show" class="p-show"> 
                                            <option {{ request('show') == '5' ? 'selected' : '' }} value="5">Show: 5 </option>
                                            <option {{ request('show') == '10' ? 'selected' : '' }} value="10">Show: 10 </option>
                                            <option {{ request('show') == '15' ? 'selected' : '' }} value="15">Show: 15 </option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($product as $products)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="/WebsiteDottiesShoes/img/Ues/{{$products->HinhAnh}}">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="/WebsiteDottiesShoes/img/icon/heart.png" ></a></li>
                                        <li><a href="#"><img src="/WebsiteDottiesShoes/img/icon/compare.png"> <span>Compare</span></a></li>
                                        <li><a href="Shop/SanPham/{{$products->ID}}"><img src="/WebsiteDottiesShoes/img/icon/search.png"></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{$products->TenSP}}</h6>
                                    <a action="{{ route ('cart.AddCart') }}" method="POST" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <p>{{number_format($products->DonGia)}} VND</p>
                                    <div class="product__color__select">
                                        <label for="pc-4">  
                                            <input type="radio" id="pc-4">
                                        </label>
                                        <label class="active black" for="pc-5">
                                            <input type="radio" id="pc-5">
                                        </label>
                                        <label class="grey" for="pc-6">
                                            <input type="radio" id="pc-6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $product -> links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
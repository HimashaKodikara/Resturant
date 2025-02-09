<!-- BLOG Section  -->
<div id="blog" class="py-5 text-center container-fluid bg-dark text-light wow fadeIn">
    <h2 class="py-5 section-title">Our all Foods</h2>
    <div class="row justify-content-center">
        <div class="mb-5 col-sm-7 col-md-4">

        </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
                @foreach ($data as $data)
                    <div class="col-md-4">

                        <div class="my-3 bg-transparent border card my-md-0">
                            <img height="300" src="food_img/{{ $data->image }}"
                                alt="template by DevCRID http://www.devcrud.com/"
                                class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="mb-4 text-center"><a href="#"
                                        class="badge badge-primary">{{ $data->price }}</a></h1>
                                <h4 class="pt20 pb20">{{ $data->title }} </h4>
                                <p class="text-white">{{ $data->details }} </p>
                            </div>
                            <form action="{{ url('add_cart', $data->id) }}" method="post">

                                @csrf
                                <input value="1" type="number" min="1" name="quantity" required >
                                <input type="submit" class="btn btn-info" value="Add to Cart">
                            </form>

                            </br></br></br>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</div>
</div>

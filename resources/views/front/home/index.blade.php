@extends('layouts.app')

@section('content')
<!-- =========== explor topics start =========== -->
<div class="bg-area">
    <div class="container">
        <div class="row">
            <div class="heading margin-top">
                <h5>Explore Topics</h5>
            </div>
            <div class="content topics">
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-lg-3 col-md-3 mb-3">
                        <a href="#">
                            <div class="topic">
                                <h5 class="title">{{ $category->name }}</h5>
                                <p class="sub-title">Quotes</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =========== explor topics end =========== -->

<!-- =========== Websites Quotes start =========== -->
<div class="bg-area margin-bottom">
    <div class="container">
        <div class="row">
            <div class="heading margin-top">
                <h5>Top Quotes</h5>
            </div>
            <div class="content quotes">
                <div class="row">

                    @foreach($quotes as $quote)
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="card">
                            <div class="quotes-item">
                                <div class="card-body">
                                    <a href="{{ route('quote.show', $quote->slug)}}">
                                        <p class="card-text">{{ $quote->quote}}
                                        </p>
                                    </a>
                                    <div class="author">
                                        <div class="image">
                                            <img src="{{ url('upload/images', $quote->author['image'])}}" alt="collected.80x80.png">
                                        </div>
                                        <div class="text">
                                            <a href="#">{{ $quote->author['name'] }}</a>
                                            <p>{{ $quote->author['year']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =========== Websites Quotes end =========== -->
@endsection

@extends('layouts.app')

@section('content')

<!-- =========== Websites Quotes start =========== -->
<div class="bg-area margin-bottom">
    <div class="container">

        <div class="heading mb-4">
            <h5>Topic: {{ $category->name }}</h5>
        </div>
        <div class="content quotes">
            <div class="row">


                @foreach($quotes as $quote)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                    <div class="card text-dark bg-light">
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
<!-- =========== Websites Quotes end =========== -->
@endsection

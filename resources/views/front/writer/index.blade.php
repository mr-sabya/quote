@extends('layouts.app')

@section('content')

<!-- =========== Websites Quotes start =========== -->
<div class="bg-area margin-bottom">
    <div class="container">
        <div class="heading margin-top">
            <h5>All Writers</h5>
        </div>
        <div class="content authors">
            <div class="row">
                @foreach($authors as $writer)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#">
                        <div class="card">
                            <div class="author">
                                <div class="image">
                                    <img src="{{ url('upload/images', $writer->image) }}" alt="collected.80x80.png">
                                </div>
                                <div class="text">
                                    <h3 href="#">{{ $writer->name }}</h3>
                                    <p>{{ $writer->year }}</p>
                                </div>


                            </div>
                        </div>
                    </a>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</div>
<!-- =========== Websites Quotes end =========== -->
@endsection

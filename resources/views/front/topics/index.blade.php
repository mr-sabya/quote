@extends('layouts.app')

@section('content')
<!-- =========== explor topics start =========== -->
<div class="bg-area">
    <div class="container">
        <div class="heading margin-top">
            <h5>Explore Topics</h5>
        </div>
        <div class="content topics">
            <div class="row">
                @foreach($categories as $category)
                <div class="col-lg-3 col-md-3">
                    <a href="{{ route('topic.show', $category->slug)}}">
                        <div class="topic text-dark bg-light mb-3">
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
<!-- =========== explor topics end =========== -->

@endsection

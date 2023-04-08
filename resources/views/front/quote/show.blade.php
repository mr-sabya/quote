@extends('layouts.app')

@section('title')
{{ $quote->title }}
@endsection

@section('content')



<!-- =========== Single Quotes  start =========== -->
<section>
    <div class="bg-area margin-top">
        <div class="container">
            <div class="quote">
                <div class="single-quote" id="quote">
                    <div class="web-link">
                        <p>jibonbani.com</p>
                    </div>
                    <div class="quote-body">
                        <p id="text">{{ $quote->quote }}</p>
                        <div class="writer" id="writer">
                            <h3>- {{ $quote->author['name']}}</h3>
                        </div>
                    </div>
                    <div class="share">

                        <div class="icons">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="quote-image">
                    <div class="image">
                        <a href="javascript:void(0)" class="back-img active">
                            <img src="{{ url('front/images/back/blue.jpg') }}" alt="">
                        </a>
                        <a href="javascript:void(0)" class="back-img ">
                            <img src="{{ url('front/images/back/sky.jpg') }}" alt="">
                        </a>
                        <a href="javascript:void(0)" class="back-img ">
                            <img src="{{ url('front/images/back/lake.jpg') }}" alt="">
                        </a>
                        <a href="javascript:void(0)" class="back-img ">
                            <img src="{{ url('front/images/back/back4.jpg') }}" alt="">
                        </a>
                        <a href="javascript:void(0)" class="back-img ">
                            <img src="{{ url('front/images/back/back5.jpg') }}" alt="">
                        </a>
                        <a href="javascript:void(0)" class="back-img ">
                            <img src="{{ url('front/images/back/back6.jpg') }}" alt="">
                        </a>

                    </div>
                </div>
            </div>
            <div class="action">

                <div class="box file">
                    <label>Upload Background</label>
                    <input id='file' type='file' hidden onchange="readURL(event)"/>
                    <button class="file-upload" id="fileButton"><i class="fas fa-upload"></i> Background</button>
                </div>
                <div class="box color">
                    <label>Text Color</label>
                    <input id="text_color" type="color" name="image">
                </div>
                <div class="box color">
                    <label>Writer Color</label>
                    <input id="writer_color" type="color" name="image">
                </div>
                <div class="box download">
                    <label>Download</label>
                    <a type="button" href="javascript:void(0)" class="button" id="download"><i class="fas fa-download"></i> </a>

                    <!-- input id="btn-Preview-Image" type="button" value="Preview" />
                    <a id="btn-Convert-Html2Image" href="#">Download</a>
                    <input type="button" value="Preview & Convert" id="btnConvert" > -->
                    
                </div>

            </div>
        </div>
    </div>

</section>
<!-- =========== Single Quotes  end =========== -->

<!-- =========== Websites Quotes start =========== -->
<div class="bg-area margin-bottom">
    <div class="container">
        <div class="heading margin-top">
            <h5>Related Quotes</h5>
        </div>
        <div class="content quotes">
            <div class="row">

                @foreach($quotes as $quote)
                <div class="col-lg-4 col-md-6-3">
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
<!-- =========== Websites Quotes end =========== -->
@endsection


@section('script')

<script src="{{ asset('front/js/html2canvas.js') }}" type="text/javascript"></script> 

<script>


    document.getElementById('fileButton').addEventListener('click', openDialog);

    function openDialog() {
        document.getElementById('file').click();
    }

    $(document).on('click', ".back-img", function() {
        $('.back-img').removeClass('active');
        $(this).toggleClass('active');
        var image = $(this).find('img').attr('src');
        $('#quote').css({
            "background-image": "url("+image+")", 
        });
    });

    $('#text_color').change(function(event) {
        var text_color = $(this).val();
        $('#text').css({
            color: text_color,
        });
    });

    $('#writer_color').change(function(event) {
        var writer_color = $(this).val();
        $('#writer').css({
            color: writer_color,
        });
    });


    function readURL(event){
        $('.back-img').removeClass('active');
        var getImagePath = URL.createObjectURL(event.target.files[0]);
        $('#quote').css({
            "background-image": "url("+getImagePath+")", 
        });
    }


    $('#download').click(function(e) {
        html2canvas($('#quote')[0], {
            scale:3
        }).then(function(canvas) {
            var a = document.createElement('a');
            a.href = canvas.toDataURL("image/png");
            a.download = 'quote-{{ $quote->title }}.png';
            a.click();
        });

    });

</script>
@endsection

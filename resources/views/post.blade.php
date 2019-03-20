@extends('layouts.blog-post')
@section('content')
    <section class="single-post-area">
        <!-- Single Post Title -->
        <div class="single-post-title bg-img background-overlay" style="background-image: url({{asset('images/bg-img/1.jpg')
    }})">
            <div class="container h-100">
                <div class="row h-100 align-items-end">
                    <div class="col-12">
                        <div class="single-post-title-content">
                            <!-- Post Tag -->
                            <div class="gazette-post-tag">
                                <a href="#">Editorial</a>
                            </div>
                            <h2 class="font-pt">{{$post->title}}</h2>
                            <p>{{$post->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-post-contents">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="single-post-text">
                            <p>{{$post->body}}</p>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single-post-thumb">
                            <img class="mx-auto d-block" src="{{asset($post->photo->file)}}" alt="">
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <section class="gazette-post-discussion-area section_padding_100 bg-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                @if(Session::has('comment_message'))
                    {{session('comment_message')}}
                @endif
                <!-- Comment Area Start -->
                    <div class="comment_area section_padding_50 clearfix">
                        <div class="gazette-heading">
                            <h4 class="font-bold">Discussion</h4>
                        </div>

                        <ol>
                            <!-- Single Comment Area -->
                            @if(count($comments) > 0)
                                @foreach ($comments as $comment)
                                    <li class="single_comment_area">
                                        <div class="comment-wrapper d-md-flex align-items-start">
                                            <!-- Comment Meta -->
                                            <div class="comment-author">
                                                <h5>{{$comment->author}}</h5>
                                            </div>
                                            <!-- Comment Content -->
                                            <div class="comment-content">

                                                <span class="comment-date font-pt">{{$comment->created_at->diffForHumans()}}</span>
                                                <p>{{$comment->body}}</p>
                                                <a class="reply-btn" href="#">Reply <i class="fa fa-reply" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                                @endif
                        </ol>
                    </div>
                    <!-- Leave A Comment -->
                    @if(Auth::check())
                    <div class="leave-comment-area clearfix">
                        <div class="comment-form">
                            <div class="gazette-heading">
                                <h4 class="font-bold">leave a comment</h4>
                            </div>
                            <!-- Comment Form -->
                            {!! Form::open(['method'=>'POST', 'action'=>'PostCommentController@store']) !!}
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <div class="form-group">
                                {!! Form::textarea(
                                'body',
                                null,
                                ['class'=>'form-control','rows'=>'3','placeholder'=>'fill out body' ])
                                 !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Submit Comment',['class'=>'btn btn-primary rounded-0']) !!}
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                        @endif
                    <div id="disqus_thread"></div>
                    <script>

                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://laravelblog-fiyiqgopss.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                    <script id="dsq-count-scr" src="//laravelblog-fiyiqgopss.disqus.com/count.js" async></script>
                </div>
            </div>
        </div>
    </section>
@stop

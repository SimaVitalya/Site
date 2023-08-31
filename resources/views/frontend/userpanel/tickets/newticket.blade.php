@extends('frontend.layouts.auth')

@section('content')

    <section class="blog__area pt-10 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12">
                    <div class="blog__wrapper">
                        <article class="postbox__item format-image mb-40 transition-3">
                            <div class="blog__grid-tag">
                                <a href="javascript:void(0);">{{ __('frontend/user.tickets.ticket_details') }} </a>
                            </div>
                            <h3 class="postbox__title">
                                <a href="javascript:void(0);">{{ ucwords($ticket->subject) }}</a>
                            </h3>
                            <div class="blog__grid-author d-flex align-items-center mb-40">
                                <div class="blog__grid-author-thumb mr-10">
                                    <a href="#">
                                    <!-- <img src="{{asset_dir('newdesign/assets/img/blog/author/blog-author-1.jpg')}}" alt=""> -->
                                        <img src="{{asset_dir('newdesign/assets/img/user/user123.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="blog__grid-author-info">
                                    <h4><a href="#">{{ $ticket->user->name }}</a></h4>
                                    <p>{{ $ticket->created_at->format('F d, Y') . " • " . $ticket->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            {{-- <div class="postbox__thumb m-img mb-30">
                               <a href="blog-details.html">
                                  <img src="{{asset_dir('newdesign/assets/img/user/user123.jpg')}}" alt="">
                               </a>
                            </div> --}}
                            <div class="postbox__content">
                                <div class="postbox__quote">
                                    <blockquote>
                                        <p>{!! nl2br(strlen($ticket->content) > 0 ? e(decrypt($ticket->content)) : '') !!}</p>
                                    </blockquote>
                                </div>
                            </div>
                        </article>

                        @if(count($ticketReplies) > 0)
                            <div class="postbox__comment mb-75">
                                <h3 class="postbox__comment-title">Messages ({{ count($ticketReplies) }})</h3>
                                <div class="chat">
                                    @foreach($ticketReplies as $ticketReply)
                                        <div class="chat__message @if ($ticketReply->user->id == 1) admin @else user @endif">
                                            <div class="info_user">
                                                <div class="chat__avatar">
                                                    @if ($ticketReply->user->id == 1)
                                                        <img src="{{ asset_dir('newdesign/assets/img/blog/comments/Робочий стол картинка.jpeg') }}" alt="">
                                                    @else
                                                        <img src="{{ asset_dir('newdesign/assets/img/blog/comments/shark-in-glassec-on-ukrainian-flag-.png') }}" alt="">
                                                    @endif
                                                </div>
                                                <div class="chat__info">
                                                    <h5 class="name">{{ $ticketReply->user->name }}</h5>
                                                    <span class="chat__timestamp">{{ $ticketReply->created_at->format('F d, Y') . " • " . $ticketReply->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>

                                            <div class="chat__content">
                                                <div class="chat__text">
                                                    <p>{!! nl2br(strlen($ticketReply->content) > 0 ? e(decrypt($ticketReply->content)) : '') !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if(!$ticket->isClosed())
                            <div class="postbox__comment-form">
                                <h3 class="postbox__comment-form-title">{{ __('frontend/user.tickets.reply_title') }}</h3>
                                <form method="POST" action="{{ route('ticket-reply', $ticket->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xxl-12">
                                            <div class="postbox__comment-input-box">
                                                <h4>{{ __('frontend/user.tickets.message') }}</h4>
                                                <div class="postbox__comment-input">
                                                    {{-- <textarea placeholder="Your comment here..."></textarea> --}}
                                                    <textarea class="{{ $errors->has('message') ? ' is-invalid' : '' }}"
                                                              name="message" id="message" rows="3"
                                                              required>{{ old('message') }}</textarea>
                                                </div>
                                                @if ($errors->has('message'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-xxl-12">
                                            <div class="postbox__comment-btn">
                                                <button type="submit"
                                                        class="tp-btn-4 w-100">{{ __('frontend/user.tickets.reply_button') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>
    <style>
        .chat {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .info_user {
            display: flex;
        }

        .chat__avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }

        .chat__avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;

        }

        .chat__timestamp {
            font-size: 12px;
            color: #7b8787;
        }

        .chat__text {
            margin-top: 10px;
        }

        .admin .chat__content {
            background-color: #192124;
            margin-left: auto;
            margin-right: 10px;
            color: white;
        }

        .admin .info_user {
            display: flex;
            flex-direction: row-reverse;
        }

        .chat__content {
            background-color: #222127;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
            padding-left: 20px;
            margin-bottom: 20px;

        }

        .name {
            color: white;
        }

        p {
            color: white;
            font-size: 17px;

        }

        .admin .chat__info {
            text-align: right;
        }

        .admin .chat__avatar {
            margin-left: 10px;
            margin-right: 5px;

        }
    </style>
    <script>
        import Echo from 'laravel-echo';

        window.Pusher = require('pusher-js');

        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: '{{ config('broadcasting.connections.pusher.key') }}',
            cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
            encrypted: true,
            forceTLS: true
        });

        window.Echo.channel('chat')
            .listen('MessageSend', (e) => {
                // Обработка нового сообщения и добавление его в DOM
                const chatMessages = document.querySelector('.chat__messages');
                const newMessage = document.createElement('div');
                newMessage.classList.add('chat__message', 'user');
                newMessage.innerHTML = `<div class="info_user">
                                        <!-- Ваш текущий код информации о пользователе -->
                                    </div>
                                    <div class="chat__content">
                                        <div class="chat__text">
                                            <p>${e.UserTicketReply.content}</p>
                                        </div>
                                    </div>`;
                chatMessages.appendChild(newMessage);
            });
    </script>
    {{--    <style>--}}
    {{--        .admin .display-flex {--}}
    {{--            display: flex;--}}
    {{--            justify-content: end;--}}
    {{--            flex-direction: column;--}}

    {{--        }--}}

    {{--        .admin .display-flex .chat__info-avatar {--}}
    {{--            display: flex;--}}
    {{--            flex-direction: row-reverse;--}}
    {{--        }--}}

    {{--        .chat {--}}
    {{--            list-style-type: none;--}}
    {{--            padding: 0;--}}
    {{--            margin: 0;--}}
    {{--        }--}}

    {{--        .chat__message {--}}
    {{--            display: flex;--}}
    {{--            align-items: flex-start;--}}
    {{--            margin-bottom: 20px;--}}
    {{--        }--}}

    {{--        .chat__avatar {--}}
    {{--            width: 70px;--}}
    {{--            height: 70px;--}}
    {{--            border-radius: 50%;--}}
    {{--            overflow: hidden;--}}
    {{--            margin-right: 10px;--}}
    {{--        }--}}

    {{--        .chat__avatar img {--}}
    {{--            width: 100%;--}}
    {{--            height: 100%;--}}
    {{--            object-fit: cover;--}}
    {{--        }--}}

    {{--        .chat__content {--}}
    {{--            background-color: #222127;--}}
    {{--            padding: 10px;--}}
    {{--            border-radius: 10px;--}}
    {{--            max-width: 70%;--}}

    {{--        }--}}

    {{--        .name {--}}
    {{--            color: white;--}}
    {{--        }--}}

    {{--        .chat__info-avatar {--}}
    {{--            display: flex;--}}
    {{--            align-items: center;--}}
    {{--        }--}}

    {{--        .chat__info {--}}
    {{--            margin-left: 10px;--}}
    {{--            flex-grow: 1;--}}
    {{--        }--}}

    {{--        .chat__info h5 {--}}
    {{--            margin: 0;--}}
    {{--            font-size: 14px;--}}
    {{--        }--}}

    {{--        .chat__timestamp {--}}
    {{--            font-size: 14px;--}}
    {{--            color: #7b8787;--}}
    {{--        }--}}

    {{--        .chat__text {--}}
    {{--            margin-top: 10px;--}}
    {{--        }--}}

    {{--        .admin .chat__content {--}}
    {{--            background-color: #192124;--}}
    {{--            margin-left: auto;--}}
    {{--            margin-right: 10px;--}}
    {{--            color: white;--}}

    {{--        p {--}}
    {{--            color: white;--}}
    {{--            font-size: 18px;--}}
    {{--        }--}}

    {{--        .admin .chat__avatar {--}}
    {{--            margin-left: 10px;--}}
    {{--            margin-right: 5px;--}}
    {{--        }--}}

    {{--        .admin .chat__info {--}}
    {{--            text-align: right;--}}
    {{--        }--}}
    {{--    </style>--}}





@endsection
{{--<ul class="chat">--}}
{{--    @foreach($ticketReplies as $ticketReply)--}}
{{--        <li class="chat__message @if ($ticketReply->user->id == 1) admin @else user @endif">--}}
{{--            <div class="chat__avatar">--}}
{{--                <img src="{{ asset_dir('newdesign/assets/img/blog/comments/comment-1.jpg') }}" alt="">--}}
{{--            </div>--}}
{{--            <div class="chat__content">--}}
{{--                <div class="chat__info">--}}
{{--                    <h5>{{ $ticketReply->user->name }}</h5>--}}
{{--                    <span class="chat__timestamp">{{ $ticketReply->created_at->format('F d, Y') . " • " . $ticketReply->created_at->diffForHumans() }}</span>--}}
{{--                </div>--}}
{{--                <p>{!! nl2br(strlen($ticketReply->content) > 0 ? e(decrypt($ticketReply->content)) : '') !!}</p>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--    @endforeach--}}
{{--</ul>                </div>--}}

<script src="https://js.hcaptcha.com/1/api.js" async defer></script>

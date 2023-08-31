@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/management.tickets.title') )

@section('content')

    <style>
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    </style>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <!-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                            </svg> -->
                        </span>
                            <!--end::Svg Icon-->
                            <!-- <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" /> -->
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <!--begin::Filter-->
                            <!--begin::Menu 1-->
                            <a href="{{ route('shop') }}"
                               class="btn btn-primary">{{ __('backend/management.tickets.go_to_shop') }}</a>

                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
                            @if(!$ticket->isClosed())
                                <a href="{{ route('backend-management-ticket-close', $ticket->id) }}"
                                   class="btn btn-wide btn-bold btn-danger btn-upper"
                                   style="margin-bottom:15px">{{ __('backend/management.tickets.edit.close') }}</a>
                            @else
                                <a href="{{ route('backend-management-ticket-open', $ticket->id) }}"
                                   class="btn btn-wide btn-bold btn-success btn-upper"
                                   style="margin-bottom:15px">{{ __('backend/management.tickets.edit.open') }}</a>
                            @endif

                            <div class="k-portlet k-portlet--height-fluid">
                                <div class="k-portlet__head">
                                    <div class="k-portlet__head-label">
                                        <h3 class="k-portlet__head-title">
                                            {{ $ticket->subject }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="k-portlet__body k-portlet__body--fluid">
                                    <div style="width: 100%">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>{!! nl2br(strlen($ticket->content) > 0 ? e(decrypt($ticket->content)) : '') !!}</p>
                                            </div>
                                            <div class="card-footer text-muted">
                                                {{ $ticket->getDateTime() }} | {{ $ticket->getUser()->name }} |
                                                <b>{{ __('backend/management.tickets.edit.category') }}</b> {{ $ticket->getCategory()->name }}
                                            </div>
                                        </div>

                                        <hr/>

                                        <div class="postbox__comment mb-75">
                                            <h3 class="postbox__comment-title">Messages ({{count($ticketReplies)}})</h3>
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

                                        <h5 class="mb-3 mt-3">{{ __('backend/management.tickets.edit.move_category') }}</h5>

                                        <form method="POST" class="kt-form" action="{{ route('backend-management-ticket-move-form') }}" style="width: 100%">
                                            @csrf

                                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}" class="mb-3 mt-3" />

                                            <div class="form-group" style="width: 100%">
                                                <label class="mb-3 mt-3" for="ticket_move_category">{{ __('backend/management.tickets.edit.move_category') }}</label>
                                                <select style="width: 100%" class="form-control mb-3 mt-3 @if($errors->has('ticket_move_category')) is-invalid @endif" id="ticket_move_category" name="ticket_move_category">
                                                    <option value="0">{{ __('frontend/main.please_choose') }}</option>
                                                    @foreach(\App\Models\UserTicketCategory::orderBy('name')->get() as $userTicketCategory)
                                                        <option value="{{ $userTicketCategory->id }}" @if($ticket->category_id == $userTicketCategory->id) selected @endif>{{ $userTicketCategory->name }}</option>
                                                    @endforeach
                                                </select>

                                                @if($errors->has('ticket_move_category'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
                <strong>{{ $errors->first('ticket_move_category') }}</strong>
            </span>
                                                @endif
                                            </div>

                                            <button type="submit" class="btn btn-primary mb-3 mt-3">{{ __('backend/management.tickets.edit.move') }}</button>
                                        </form>

                                        <hr />

                                        <h5 class="mb-3 mt-3">{{ __('backend/management.tickets.edit.title_reply') }}</h5>

                                        <form method="POST" class="kt-form" action="{{ route('backend-management-ticket-reply-form') }}" style="width: 100%">
                                            @csrf

                                            <input type="hidden" name="ticket_reply_id" value="{{ $ticket->id }}" class="mb-3 mt-3" />

                                            <div class="form-group" style="width: 100%">
                                                <label class="mb-2 mt-3" for="ticket_reply_msg">{{ __('backend/management.tickets.edit.message') }}</label>
                                                <textarea style="width: 100%" class="form-control mb-3 mt-3 @if($errors->has('ticket_reply_msg')) is-invalid @endif" id="ticket_reply_msg" name="ticket_reply_msg" placeholder="{{ __('backend/management.tickets.edit.message') }}">{{ old('ticket_reply_msg') }}</textarea>

                                                @if($errors->has('ticket_reply_msg'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
                <strong>{{ $errors->first('ticket_reply_msg') }}</strong>
            </span>
                                                @endif
                                            </div>

                                            <button type="submit" class="btn btn-primary mb-3 mt-3">{{ __('backend/management.tickets.edit.submit_button') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
`
        }

        .name {
            color: #b72525;
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


{{--        }--}}


{{--        .mess {--}}
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

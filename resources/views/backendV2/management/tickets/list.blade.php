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
                            <a href="{{ route('shop') }}" class="btn btn-primary">{{ __('backend/management.tickets.go_to_shop') }}</a>

                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users" style="overflow-x: auto; overflow-y: hidden;">
                        <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2" rowspan="1" colspan="1" >
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" id="checkAll" type="checkbox" />
                                </div>
                            </th>
                            <th class="min-w-95px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.id') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.user') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.subject') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.category') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.status') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.date') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">

                                        <input class="form-check-input orderCheck" data-id="{{ $ticket->id }}" type="checkbox" />
                                    </div>
                                </td>
                                <td scope="row">{{ $ticket->id }}</td>
                                <td>
                                    {{ $ticket->getUser()->username }}
                                </td>
                                <td>{{ $ticket->subject }}</td>
                                <td>{{ $ticket->getCategory()->name }}</td>
                                <td>
                                    @if($ticket->isClosed())
                                        <span class="kt-badge kt-badge--danger kt-badge--dot kt-badge--md"></span>
                                        <span class="kt-label-font-color-2 kt-font-bold">{{ __('backend/management.tickets.status_data.closed') }}</span>
                                    @elseif($ticket->isReplied())
                                        <span class="kt-badge kt-badge--brand kt-badge--dot kt-badge--md"></span>
                                        <span class="kt-label-font-color-2 kt-font-bold">{{ __('backend/management.tickets.status_data.replied') }}</span>
                                    @else
                                        <span class="kt-badge kt-badge--success kt-badge--dot kt-badge--md"></span>
                                        <span class="kt-label-font-color-2 kt-font-bold">{{ __('backend/management.tickets.status_data.open') }}</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $ticket->created_at->format('d.m.Y H:i') }}
                                </td>
                                <td style="font-size: 20px;">
                                    <a href="{{ route('backend-management-ticket-edit', $ticket->id) }}"><i class="la la-edit"></i></a>
                                    <a href="{{ route('backend-management-ticket-delete', $ticket->id) }}"><i class="la la-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

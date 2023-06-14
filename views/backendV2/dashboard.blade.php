@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/dashboard.title'))

@section('content')
<!-- begin:: Content Head -->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Row-->
        <div class="row gy-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 13-->
                <div class="card card-xl-stretch mb-xl-10 theme-dark-bg-body" style="background-color: #F7D9E3">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <a href="#" class="text-dark text-hover-primary fw-bold fs-3">{{ __('backend/dashboard.tickets_total.widget_title') }}</a>
                            <!--end::Title-->
                            <!--begin::Chart-->
                            <!-- <div class="mixed-widget-13-chart" style="height: 100px"></div> -->
                            <div class="" style="height: 100px"></div>

                            <!--end::Chart-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Stats-->
                        <div class="pt-5">
                            <!--begin::Number-->
                            <span class="text-dark fw-bold fs-3x me-2 lh-0">{{ App\Models\UserTicket::where('status', 'open')->count() }}</span>
                            <!--end::Number-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Mixed Widget 13-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xl-stretch mb-xl-10 theme-dark-bg-body" style="background-color: #CBF0F4">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <a href="#" class="text-dark text-hover-primary fw-bold fs-3">{{ __('backend/dashboard.products_total.widget_title') }}</a>
                            <!--end::Title-->
                            <!--begin::Chart-->
                            <div class="" style="height: 100px"></div>
                            <!-- <div class="mixed-widget-14-chart" style="height: 100px"></div> -->
                            <!--end::Chart-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Stats-->
                        <div class="pt-5">
                            <!--begin::Number-->
                            <span class="text-dark fw-bold fs-3x me-2 lh-0">{{ App\Models\Product::count() }}</span>
                            <!--end::Number-->
                            <!--begin::Text-->
                            <!--end::Text-->
                        </div>
                        <!--end::Stats-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->

            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xxl-stretch mb-5 mb-xl-10 theme-dark-bg-body" style="background-color: #CBD4F4">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column mb-7">
                            <!--begin::Title-->
                            <a href="#" class="text-dark text-hover-primary fw-bold fs-3">{{ __('backend/dashboard.articles_total.widget_title') }} & {{ __('backend/dashboard.newsletter_total.widget_title') }}</a>
                            <!--end::Title-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Row-->
                        <div class="row g-0">
                            <!--begin::Col-->
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-9 me-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-light">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z" fill="currentColor" />
                                                    <path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bold lh-1">{{ App\Models\Article::count() }}</div>
                                        <div class="fs-7 text-gray-600 fw-bold">{{ __('backend/dashboard.articles_total.widget_title') }}</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-9 ">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-light">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs046.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bold lh-1">{{ App\Models\User::where('newsletter_enabled', 1)->count() }}</div>
                                        <div class="fs-7 text-gray-600 fw-bold">{{ __('backend/dashboard.newsletter_total.widget_title') }}</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Row-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xxl-stretch mb-5 mb-xl-10 theme-dark-bg-body" style="background-color: #cdffcd">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column mb-7">
                            <!--begin::Title-->
                            <a href="#" class="text-dark text-hover-primary fw-bold fs-3">{{ __('backend/dashboard.users_total.widget_title') }} & {{ __('backend/dashboard.total_orders.widget_title') }} </a>
                            <!--end::Title-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Row-->
                        <div class="row g-0">

                            <!--begin::Col-->
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-9 ">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-light">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs022.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M11.425 7.325C12.925 5.825 15.225 5.825 16.725 7.325C18.225 8.825 18.225 11.125 16.725 12.625C15.225 14.125 12.925 14.125 11.425 12.625C9.92501 11.225 9.92501 8.825 11.425 7.325ZM8.42501 4.325C5.32501 7.425 5.32501 12.525 8.42501 15.625C11.525 18.725 16.625 18.725 19.725 15.625C22.825 12.525 22.825 7.425 19.725 4.325C16.525 1.225 11.525 1.225 8.42501 4.325Z" fill="currentColor" />
                                                    <path d="M11.325 17.525C10.025 18.025 8.425 17.725 7.325 16.725C5.825 15.225 5.825 12.925 7.325 11.425C8.825 9.92498 11.125 9.92498 12.625 11.425C13.225 12.025 13.625 12.925 13.725 13.725C14.825 13.825 15.925 13.525 16.725 12.625C17.125 12.225 17.425 11.825 17.525 11.325C17.125 10.225 16.525 9.22498 15.625 8.42498C12.525 5.32498 7.425 5.32498 4.325 8.42498C1.225 11.525 1.225 16.625 4.325 19.725C7.425 22.825 12.525 22.825 15.625 19.725C16.325 19.025 16.925 18.225 17.225 17.325C15.425 18.125 13.225 18.225 11.325 17.525Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bold lh-1">{{ App\Models\User::count() }}</div>
                                        <div class="fs-7 text-gray-600 fw-bold">{{ __('backend/dashboard.users_total.widget_title') }}</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-9  ">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-light">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs045.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 11.7127L10 14.1127L22 11.7127L14 9.31274L2 11.7127Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M20.9 7.91274L2 11.7127V6.81275C2 6.11275 2.50001 5.61274 3.10001 5.51274L20.6 2.01274C21.3 1.91274 22 2.41273 22 3.11273V6.61273C22 7.21273 21.5 7.81274 20.9 7.91274ZM22 16.6127V11.7127L3.10001 15.5127C2.50001 15.6127 2 16.2127 2 16.8127V20.3127C2 21.0127 2.69999 21.6128 3.39999 21.4128L20.9 17.9128C21.5 17.8128 22 17.2127 22 16.6127Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bold lh-1">{{ App\Models\Setting::get('shop.total_sells', 0) }}</div>
                                        <div class="fs-7 text-gray-600 fw-bold">{{ __('backend/dashboard.total_orders.widget_title') }}</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xl-stretch mb-xl-10 theme-dark-bg-body" style="background-color: #F7D9E3">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <a href="#" class="text-dark text-hover-primary fw-bold fs-3">{{ __('backend/dashboard.today_profit') }}</a>
                            <!--end::Title-->
                            <!--begin::Chart-->
                            <div class="" style="height: 100px"></div>
                            <!-- <div class="mixed-widget-14-chart" style="height: 100px"></div> -->
                            <!--end::Chart-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Stats-->
                        <div class="pt-5">
                            <!--begin::Number-->
                            <span class="text-dark fw-bold fs-3x me-2 lh-0">{{ App\Models\UserOrder::getFormattedTodayWin() }}</span>
                            <!--end::Number-->

                            <!--begin::Number-->
                            <!--end::Number-->
                            <!--begin::Text-->
                            <span class="text-dark fw-bold fs-6 lh-0">{{ date('d', time()) }} {{ __('backend/dashboard.months_number.' . date('m', time())) }}</span>
                            <!--end::Text-->

                            <!--begin::Text-->
                            <!--end::Text-->
                        </div>
                        <!--end::Stats-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->

            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xl-stretch mb-xl-10 theme-dark-bg-body" style="background-color: #CBF0F4">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column  ">
                            <!--begin::Title-->
                            <a href="#" class="text-dark text-hover-primary fw-bold fs-3">{{ __('backend/dashboard.bestseller.widget_title') }}</a>
                            <!--end::Title-->
                            <!--begin::Chart-->
                            <!-- <div class="" style="height: 100px"></div> -->
                            <!-- <div class="mixed-widget-14-chart" style="height: 100px"></div> -->
                            <!--end::Chart-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Stats-->
                        @foreach(App\Models\Product::orderByDesc('sells')->limit(4)->get() as $bestsellerProduct)
                        <div class="pt-1">
                            <span class=" " style="margin-right: 5px;">
                                {{ $loop->iteration }}.
                            </span>
                            <b> {{ $bestsellerProduct->name }} </b>
                            <br>
                            <b>{{ __('backend/dashboard.bestseller.price') }}</b>
                            {{ $bestsellerProduct->getFormattedPrice() }}
                        </div>
                        @endforeach
                        <!--end::Stats-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->
            </div>
            <!--end::Col-->
        </div>

        <!--end::Row-->
        <!--begin::Tables Widget 9-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">{{ __('backend/dashboard.recent_orders.title') }}</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">{{ __('backend/dashboard.recent_orders.total', ['total' => App\Models\UserOrder::count()]) }}</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <!-- UserOrder::orderByDesc('created_at')->limit(10)->get()->all(); -->

                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th class="w-25px">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                    </div>
                                </th>
                                <th class="min-w-200px">{{ __("backend/dashboard.recent_orders.customer") }}</th>
                                <th class="min-w-150px">{{ __("backend/dashboard.recent_orders.product") }}</th>
                                <th class="min-w-150px">{{ __("backend/dashboard.recent_orders.price") }}</th>
                                <th class="min-w-100px text-end">{{ __("backend/dashboard.recent_orders.date") }}</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach(App\Models\UserOrder::orderByDesc('created_at')->limit(10)->get() as $orders)
                            <?php $userOrderCustomer = App\Models\User::where('id', $orders->user_id)->get()->first();
                            ?>
                            <tr>

                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bold text-hover-primary fs-6">{{$userOrderCustomer->username ?? 'UNKNOWN'}}</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="text-dark fw-bold text-hover-primary d-block fs-6">{{ $orders->$orders->name ?? 'UNKNOWN'}}</a>
                                </td>
                                <td class="text-end">
                                    <div class="d-flex flex-column w-100 me-2">
                                        <div class="d-flex flex-stack mb-2">
                                            <span class="text-  me-2 fs-7 fw-bold">{{$orders->getFormattedPrice()}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bold text-hover-primary fs-6">{{$orders->created_at->format('d.m.Y H:i')}} </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
        <!--end::Tables Widget 9-->
        <!--begin::Row-->
        <div class="row gy-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-xxl-6">
                <!--begin::List Widget 5-->
                <div class="card card-xl-stretch mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header align-items-center border-0 mt-4">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="fw-bold mb-2 text-dark"> {{ __('backend/dashboard.recent_tickets.title') }}</span>
                            <span class="text-muted fw-semibold fs-7">{{ __('backend/dashboard.recent_tickets.total', ['total' => App\Models\UserTicket::count()]) }}</span>
                        </h3>
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor" />
                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_63de77131b758">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Menu separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Menu separator-->
                                <!--begin::Form-->
                                <div class="px-7 py-5  ">
                                    <!--begin::Input group-->
                                    <div class="mb-10 ">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Status:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div class="">
                                            <select class="form-select form-select-solid selectTicketOption " data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_63de77131b758" data-allow-clear="true">
                                                <option></option>
                                                <option value="closed">Closed</option>
                                                <option value="open">Open</option>
                                                <option value="">Replied</option>
                                            </select>
                                        </div>
                                        <!--end::Input-->
                                    </div>

                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                        <button type="button" onclick="changeStatus(this)" class="btn btn-sm btn-primary ticketButton" data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                            <!--end::Menu-->
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::Timeline-->
                        <div class="timeline-label">
                            <!--begin::Item-->
                            @foreach(App\Models\UserTicket::orderByDesc('created_at')->limit(10)->get()->all() as $tickets)
                            <?php $userOrderCustomer = App\Models\User::where('id', $tickets->user_id)->get()->first();
                            if ($tickets->isClosed()) {
                                $userTicketStatus = 'text-danger';
                            } elseif ($tickets->isReplied()) {
                                $userTicketStatus = 'text-warning';
                            } else {
                                $userTicketStatus = 'text-success';
                            }
                            ?>

                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bold text-gray-800 fs-6">{{$tickets->created_at->format('d.m.Y')}}</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless  {{$userTicketStatus}} fs-1"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="fw-mormal timeline-content text-muted ps-3"> {{substr(htmlspecialchars($tickets->subject), 0, 255)}} ({{$userOrderCustomer->username ?? 'UNKNOWN'}})</div>
                                <!--end::Text-->
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input widget-9-check ticketCheck" data-id="{{$tickets->id}}" type="checkbox" value="1" />
                                </div>
                            </div>
                            @endforeach
                            <!--end::Item-->
                        </div>
                        <!--end::Timeline-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end: List Widget 5-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!-- end:: Content Body -->
@endsection

@section('page_scripts')
<script>
    function changeStatus(obj) {
        let status = $('.selectTicketOption').find('option:selected').val()
        let ticket = $('.ticketCheck').attr('checked')
        $.each(ticket, function(i, e) {
            $.ajax({
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/admin/order/change-status",
                data: {
                    status: status,
                    ticket: $(this).attr('data-id')
                },
                dataType: "json",
                success: function(response) {
                    swal({
                        title: "Error!",
                        text: "Here's my error message!",
                        type: "error",
                        confirmButtonText: "Cool"
                    });
                }
            });


        })



    }
</script>
@endsection
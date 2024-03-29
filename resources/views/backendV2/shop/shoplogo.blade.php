@extends('backendV2.layouts.default')
@section('pageTitle', 'Appearance' )

@section('content')

<style>
    table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

    #logo::after {
        content: "Logo";
        position: absolute;
        right: 5%;
    }

    #banner::after {
        content: "Banner";
        position: absolute;
        right: 5%;
    }

    .logosImage {
        max-width: 90px;
    }

    .marqueeLoader{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #fff;
        align-items: center;
    }
</style>
<?php $marque = DB::select('select* from lv_marques where status="1"'); ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header align-items-center border-bottom">
                <h2 class="m-0">Shop</h2>
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
                    <!-- <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base"> -->
                    <!--begin::Filter-->
                    <!--begin::Menu 1-->
                    <!-- <a href="{{ route('shop') }}" class="btn btn-primary">{{ __('backend/management.tickets.go_to_shop') }}</a> -->

                    <!-- </div> -->
                </div>
            </div>

            @if(session()->has("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{session()->get("success")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session()->has("error"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops!</strong> {{session()->get("error")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(isset($errors))

            @if(isset(json_decode($errors)->logo[0]))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops!</strong> {{json_decode($errors)->logo[0]}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @elseif(isset(json_decode($errors)->banner[0]))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops!</strong> {{json_decode($errors)->banner[0]}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @elseif(isset(json_decode($errors)->shop_name[0]))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops!</strong> {{json_decode($errors)->shop_name[0]}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @endif

            @endif






            <div class="card-body py-4">
                <div class="row">
                    <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
                        <div class="kt-portlet">

                            <div class="kt-portlet__head mt-5">
                                <div class="kt-portlet__head-label">
                                    <!-- <h3 class="kt-portlet__head-title">Marque Edit</h3> -->
                                </div>
                            </div>

                            <!-- <form method="POST" class="kt-form" action="{{ route('backend-management-shop-logo-update') }}" enctype="multipart/form-data">
                                @csrf -->

                            <div class="row" style="display: flex; align-items: center;">

                                <div class="col-4 d-flex justify-content-center align-items-center">

                                </div>
                            </div>

                            <div class="row">

                                <div class="col-12">
                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <h3>Shop Name</h3>
                                            <form id="update-shop-name" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="faq_edit_question" class="h5 d-none" style="font-weight: bold; float: right;">Shop Name</label>
                                                    <input type="text" class="form-control files" id="logo" value="{{Auth::user()->shop_name ?? ''}}" placeholder="shop name" data-type="logo" name="shop_name" placeholder="" value="" />
                                                </div>
                                                <div>
                                                    <span>
                                                        <h5 class=" mt-4 showTextShopName"></h5>
                                                    </span>
                                                    <button class="btn btn-primary btn-sm mt-3" type="submit" style="float: right;">
                                                        <span class="spinner-border spinner-border-sm d-none loading_shop_name" role="status" aria-hidden="true"></span>
                                                        <span class="loading_shop_text">Update</span>
                                                        <!-- visually-hidden -->
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">

                                    <div class="clearfix">
                                        <div class="kt-portlet__body">
                                            <div class="kt-section kt-section--first">
                                                <h3>Logo</h3>
                                                <form id="image-upload-logo" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mt-5">
                                                        <label for="faq_edit_question" class="h5 d-none" style="font-weight: bold; float: right;">Logo</label>
                                                        <input type="file" class="form-control files" id="logo" onchange="logoUpload(this)" data-type="logo" name="logo" placeholder="" value="" />
                                                    </div>
                                                    <div>
                                                        <span>
                                                            <h5 class=" mt-4 showTextLogo"></h5>
                                                        </span>
                                                        <button class="btn btn-primary btn-sm mt-3 save_logo" type="submit" style="float: right;">
                                                            <span class="spinner-border spinner-border-sm d-none loading_logo" role="status" aria-hidden="true"></span>
                                                            <span class="loading_logo_text">Update</span>
                                                            <!-- visually-hidden -->
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="clearfix">
                                        <div class="kt-portlet__body">
                                            <div class="kt-section kt-section--first">
                                                <h3>Banner</h3>
                                                <form id="image-upload-banner" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mt-5">
                                                        <label for="faq_edit_question" class="h5 d-none" style="font-weight: bold; float: right;">Banner</label>
                                                        <input type="file" class="form-control files" id="banner" onchange="logoUpload(this)" data-type="banner" name="banner" placeholder="" value="" />
                                                    </div>

                                                    <div>
                                                        <span>
                                                            <h5 class=" mt-4 showTextBanner"></h5>
                                                        </span>
                                                        <button class="btn btn-primary btn-sm mt-3" type="submit" style="float: right;">
                                                            <span class="spinner-border spinner-border-sm d-none loading_banner" role="status" aria-hidden="true"></span>
                                                            <span class="loading_banner_text">Update</span>
                                                            <!-- visually-hidden -->
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!-- <div class="kt-portlet__foot mt-5">
                                        <div class="kt-form__actions mt-5 text-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div> -->
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-10">
            <div class="card-header">
                <div class="row mt-5" style="display: flex; align-items: center;">

                    <div class="col-12 d-flex align-items-center">
                        <h1 class="m-0">Marquee</h1>
                    </div>

                </div>
            </div>
            <div class="card-body">

                <div class="row mt-5" style="margin-top: 5% !important;">

                    <div class="col-12">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="form-group d-flex  justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <label class="form-label" style="margin: 0 5px 0 0;">Status</label>
                                        <div class="form-check form-switch">

                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="marquee_status" @foreach($marque as $value) @for($i=0;$i <=1 ;$i++) @if($value->status == 1)
                                            {{'checked'}}
                                            @else

                                            @endif
                                            @endfor
                                            @endforeach
                                            >
                                            <div class="spinner-border spinner-border-sm marqueLoader d-none" role="status"></div>
                                            <label class="form-check-label flexSwitchCheckCheckedText text-success" for="flexSwitchCheckChecked"></label>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addMarquee">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="row mt-5">
                    <div class="col-12">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                    <thead>
                                        <tr>
                                            <th style="width: 30%;">Sr.No</th>
                                            <th style="width: 30%;">Marquee</th>
                                            <th style="width: 30%;">Status</th>
                                            <th style="width: 30%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($marque) > 0)

                                        @foreach($marque as $key => $value)
                                        <tr>
                                            <th scope="row">{{$value->id}}</th>
                                            <td>{{$value->marque_text}}</td>
                                            <td>{{$value->status}}</td>
                                            <td><a href="javscript:void(0)" data-bs-toggle="modal" data-bs-target="#editMarquee"  onclick="editMarque('{{$value->id}}')"><i class="la la-edit"></i></a> <a href="javscript:void(0)" onclick="deleteMarque('{{$value->id}}')" ><i class="la la-trash"></i></a></td>
                                        </tr>
                                        @endforeach

                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Marquee Edit Model -->

<div class="modal fade" id="editMarquee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="false" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Marquee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateMarqueeForm">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ID</label>
                        <input type="number" class="form-control" id="marquee_id" name="id" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Marquee Text</label>
                        <input type="text" class="form-control" id="marqueeText" name="marqueeText">
                    </div>

                    <div class="d-flex justify-content-center marqueeLoader">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>&nbsp;&nbsp;<span class="h3" style="margin: 0;">feching data...</span>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                <button class="btn btn-primary marqueeSaveBtn" type="button" disabled onclick="updateMarquee()" style="cursor: pointer;s">
                    <span class="spinner-border spinner-border-sm d-none updateLoader" role="status" aria-hidden="false"></span>
                    <label class="marqueeSaveText">Update</label>
                </button>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addMarquee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="false" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Marquee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addMarqueeForm">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Marquee Text</label>
                        <input type="text" class="form-control" id="addmarqueeText" name="addmarqueeText">
                    </div>

                    <!-- <div class="d-flex justify-content-center marqueeLoader">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>&nbsp;&nbsp;<span class="h3" style="margin: 0;">feching data...</span>
                    </div> -->
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                <button class="btn btn-primary marqueeAddBtn" type="button" onclick="addMarquee()" style="cursor: pointer;">
                    <span class="spinner-border spinner-border-sm d-none updateLoader" role="status" aria-hidden="false"></span>
                    <label class="marqueeSaveText">Save</label>
                </button>

            </div>
        </div>
    </div>
</div>

@section('page_scripts')
<script>
    // Declare All Variables

    var logo = document.querySelector(".showLogo");
    var banner = document.querySelector(".showBanner");
    var checkButton = document.getElementById("flexSwitchCheckChecked");
    var ConditionText = document.querySelector(".flexSwitchCheckCheckedText");
    var marqueLoader = document.querySelector(".marqueLoader");
    var loadingLogo = document.querySelector(".loading_logo");
    var loadingLogoText = document.querySelector(".loading_logo_text");
    var loadingBanner = document.querySelector(".loading_banner");
    var loadingBannerText = document.querySelector(".loading_banner_text");
    var loadingShop = document.querySelector(".loading_shop_name");
    var loadingShopText = document.querySelector(".loading_shop_text");

    // On Change File Function Set Image Using Base Path

    function logoUpload(element) {
        var imgUrl = URL.createObjectURL(element.files[0]);
        if (element.getAttribute("data-type") == "banner") {
            banner.src = imgUrl;
        } else {
            logo.src = imgUrl;
        }
    }

    // Set Class Loader & text Swith Button

    $(marqueLoader).removeClass("d-none");
    $(ConditionText).addClass("d-none");

    // Set window Event & Check Swith Button Condition

    window.addEventListener("load", (e) => {
        if (checkButton.checked) {
            // Remove Class Loader & text Swith Button
            $(marqueLoader).addClass("d-none");
            $(ConditionText).addClass("text-success").removeClass("text-danger d-none").html("Activated");

        } else {
            // Set Class Loader & text Swith Button Base Condition
            $(marqueLoader).addClass("d-none");
            $(ConditionText).addClass("text-danger").removeClass("text-success d-none").html("Deactivated");
        }
    });

    // swith button trun on & off Condition function

    checkButton.addEventListener("click", (e) => {

        // Send Request & Set Marquee Status like true,false

        $.post("{{url('marqueStatus')}}", {
            "_token": "{{ csrf_token() }}", // Set CSRF token
            beforeSend: setupBeforeAction, // Call Before function
            "status": e.target.checked // Status true,false
        }).then((response) => {
            if (response.status == true) {
                setupCompleteFunctionAction(); // Call  Response Complete Function here
            }
        });

        // Set Some Condition before Data Response

        function setupBeforeAction() {
            $(ConditionText).addClass("d-none");
            $(marqueLoader).removeClass("d-none");
        }

        // Remove Some Condition after Data Response

        function setupCompleteFunctionAction() {
            $(ConditionText).removeClass("d-none");
            $(marqueLoader).addClass("d-none");

            if (e.target.checked) {
                $(ConditionText).addClass("text-success").removeClass("text-danger").html("Activated");
            } else {
                $(ConditionText).addClass("text-danger").removeClass("text-success").html("Deactivated");
            }
        }

    });

    // Logo Update Jquery Function here.

    $(document).ready(function() {
        $('#image-upload-logo').submit(function(e) {
            e.preventDefault(); // prevent the form from submitting normally
            var formData = new FormData(this);

            $.ajax({
                url: "{{route('backend-management-shop-logo-update')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $(loadingLogo).removeClass("d-none");
                    $(loadingLogoText).addClass("visually-hidden");
                },
                success: function(data) {
                    // handle successful response from server

                    if (data.status == true) {
                        $('#image-upload-logo')[0].reset();
                        $('.showTextLogo').addClass(data.class).html(data.message);
                        $(loadingLogo).addClass("d-none");
                        $(loadingLogoText).removeClass("visually-hidden");
                    } else {
                        $('.showTextLogo').addClass(data.class).html(data.message);
                        $(loadingLogo).addClass("d-none");
                        $(loadingLogoText).removeClass("visually-hidden");
                    }

                    setTimeout(() => {
                        $('.showTextLogo').removeClass(data.class).html("");
                    }, 2000);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('.showTextLogo').addClass(data.class).html(data.message);
                    $(loadingLogo).addClass("d-none");
                    $(loadingLogoText).removeClass("visually-hidden");
                    setTimeout(() => {
                        $('.showTextLogo').html("");
                    }, 2000);
                }
            });
        });
    });

    // Banner Update Jquery Function here.

    $(document).ready(function() {
        $('#image-upload-banner').submit(function(e) {
            e.preventDefault(); // prevent the form from submitting normally
            var formData = new FormData(this);

            $.ajax({
                url: "{{route('backend-management-shop-logo-update')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $(loadingBanner).removeClass("d-none");
                    $(loadingBannerText).addClass("visually-hidden");
                },
                success: function(data) {
                    // handle successful response from server

                    if (data.status == true) {
                        $('#image-upload-banner')[0].reset();
                        $('.showTextBanner').addClass(data.class).html(data.message);
                        $(loadingBanner).addClass("d-none");
                        $(loadingBannerText).removeClass("visually-hidden");
                    } else {
                        $('.showTextBanner').addClass(data.class).html(data.message);
                        $(loadingBanner).addClass("d-none");
                        $(loadingBannerText).removeClass("visually-hidden");
                    }

                    setTimeout(() => {
                        $('.showTextBanner').removeClass(data.class).html("");
                    }, 2000);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('.showTextBanner').addClass(data.class).html(data.message);
                    $(loadingBanner).addClass("d-none");
                    $(loadingBannerText).removeClass("visually-hidden");
                    setTimeout(() => {
                        $('.showTextBanner').html("");
                    }, 2000);
                }
            });
        });
    });

    // Shop Name Update Jquery Function here.

    $(document).ready(function() {
        $('#update-shop-name').submit(function(e) {
            e.preventDefault(); // prevent the form from submitting normally
            var formData = new FormData(this);

            $.ajax({
                url: "{{route('backend-management-shop-logo-update')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $(loadingShop).removeClass("d-none");
                    $(loadingShopText).addClass("visually-hidden");
                },
                success: function(data) {
                    // handle successful response from server

                    if (data.status == true) {
                        $('#image-upload-banner')[0].reset();
                        $('.showTextShopName').addClass(data.class).html(data.message);
                        $(loadingShop).addClass("d-none");
                        $(loadingShopText).removeClass("visually-hidden");
                    } else {
                        $('.showTextShopName').addClass(data.class).html(data.message);
                        $(loadingShop).addClass("d-none");
                        $(loadingShopText).removeClass("visually-hidden");
                    }

                    setTimeout(() => {
                        $('.showTextShopName').html("");
                    }, 2000);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (textStatus == 'error') {
                        console.log(jqXHR.responseJSON.errors.shop_name[0]);
                        $('.showTextShopName').addClass("text-danger").html(jqXHR.responseJSON.errors.shop_name[0]);
                        $(loadingShop).addClass("d-none");
                        $(loadingShopText).removeClass("visually-hidden");
                        setTimeout(() => {
                            $('.showTextShopName').removeClass('text-danger').html("");
                        }, 2000);
                    }
                }
            });
        });
    });

    // Get Marquee With ID

     function editMarque(id){

            $.get("{{url('getMarquee')}}",{
                "_token":"{{csrf_token()}}",
                "id":id,
                before:marqueeBeforeFunction
            }).then((response)=>{
                if(response.status === true){
                    $("#marquee_id").val(response.data.id);
                    $("#marqueeText").val(response.data.marque_text);
                    $(".marqueeLoader").addClass("d-none");
                    $(".marqueeSaveBtn").prop("disabled",false);
                }
            });
    }

    function marqueeBeforeFunction(){
        $(".marqueeLoader").removeClass("d-none");
        $(".marqueeSaveBtn").prop("disabled",true);
    }

    // Update Marquee function

    function updateMarquee(){

        $.post("{{url('updateMarquee')}}",{
                "_token":"{{csrf_token()}}",
                "id": $("#marquee_id").val(),
                "marqueeText": $("#marqueeText").val(),
                before:marqueeUpdateBeforeFunction
        }).then((response)=>{
           if(response.status === true){
                $(".btn-close").click();
                $(".marqueeSaveBtn").prop("disabled",false);
                $(".updateLoader").addClass("d-none");
                $(".marqueeSaveText").html("Update");
           }
        });

    }

    function marqueeUpdateBeforeFunction(){
        $(".marqueeSaveBtn").prop("disabled",true);
        $(".updateLoader").removeClass("d-none");
        $(".marqueeSaveText").html("Updating....");
    }

    function deleteMarque(id){
        $.post("{{url('deleteMarquee')}}",{
                "_token":"{{csrf_token()}}",
            "id":id,
            before:marqueeBeforeFunction
        }).then((response)=>{
            if(response.status === true){
                location.reload();
            }
        });
    }


    function addMarquee(){

        $.post("{{url('addMarquee')}}",{
                "_token":"{{csrf_token()}}",
                "marqueeText": $("#addmarqueeText").val(),
        }).then((response)=>{
            if(response.status === true){
                location.reload();
            }
        });

}



</script>
@endsection

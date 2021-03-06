@extends('admin.layouts.basic')
@section('title')
    تعديل أكاديمية
@stop
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.academies.all')}}"> الأكاديمات </a>
                                </li>
                                <li class="breadcrumb-item active"> تعديل
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> تعديل أكاديمية </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.academies.update',$academy -> id)}}"
                                              method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$academy -> logo}}"
                                                        class="rounded-circle  height-150" alt="شعار الاكاديمية  ">
                                                </div>
                                            </div>


                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> بيانات الأكاديمية </h4>
                                                <div class="form-group">
                                                    <label> شعار الاكاديمية</label>
                                                    <label id="projectinput7" class="file center-block">
                                                        <input type="file" id="file" name="logo">
                                                        <span class="file-custom"></span>
                                                    </label>
                                                    @error('logo')
                                                    <span class="text-danger"> {{$message}}</span>
                                                    @enderror
                                                </div>

                                               {{-- <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput2"> نشاط الاكاديمية </label>
                                                            <select name="categories[]" class="select2 form-control" multiple="multiple">
                                                                <optgroup label="من فضلك أختر  نشاط الاكاديمية ">
                                                                    @if($categories && $categories -> count() > 0)
                                                                        @foreach($categories  as $category)
                                                                            <option
                                                                                value="{{$category -> id }}"
                                                                                @if(in_array($category -> id, $academy -> categories() -> pluck('categories.id') -> toArray())) selected @endif>{{$category -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                        @error('categories')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الاسم بالعربي </label>
                                                            <input type="text" value="{{$academy -> name_ar}}"
                                                                   id="name_ar"
                                                                   class="form-control"
                                                                   placeholder="ادخل الأسم باللغة العربية "
                                                                   name="name_ar">
                                                            @error('name_ar')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> الاسم بالانجليزي </label>
                                                            <input type="text" value="{{$academy -> name_en}}"
                                                                   id="name_en"
                                                                   class="form-control"
                                                                   placeholder="ادخل الأسم باللغة  الانجليزية  "
                                                                   name="name_en">
                                                            @error('name_en')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">العنوان بالعربي </label>
                                                            <input type="text" value="{{$academy -> address_ar}}"
                                                                   id="address_ar"
                                                                   class="form-control"
                                                                   placeholder="أدخل ألعنوان بالعربي   "
                                                                   name="address_ar">
                                                            @error('address_ar')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">العنوان بالانجليزي </label>
                                                            <input type="text" value="{{$academy -> address_ar}}"
                                                                   id="address_en"
                                                                   class="form-control"
                                                                   placeholder="أدخل ألعنوان بالانجليوي  "
                                                                   name="address_en">
                                                            @error('address_en')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group mt-1">
                                                                <input type="checkbox" name="status"
                                                                       id="switcheryColor4"
                                                                       class="switchery" data-color="success"
                                                                       @if($academy -> status == 1)checked @endif/>
                                                                <label for="switcheryColor4" class="card-title ml-1">الحالة </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1"
                                                            onclick="history.back();">
                                                        <i class="ft-x"></i> تراجع
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> تحديث
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@stop

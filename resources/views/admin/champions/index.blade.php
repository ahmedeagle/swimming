@extends('admin.layouts.basic')
@section('title')
    أبطال الفرق
@stop
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> الأبطال </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> ابطال الفرق
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">   {{isset($header) ? $header : 'جميع الابطال'}}</h4>
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
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead>
                                            <tr>
                                                <th> الاسم بالعربي</th>
                                                <th>صورة الطالب</th>
                                                <th>صورة الطالب بالمسابقه</th>
                                                <th> الاكاديمية</th>
                                                <th> القسم</th>
                                                <th> عنوان المسابقة</th>
                                                <th> التفاصيل</th>
                                                <th> التفاصيل بالانجليزي</th>
                                                <th> التاريخ</th>
                                                <th> الاجراءات</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($champions) && $champions -> count() > 0 )
                                                @foreach($champions as $champion)
                                                    <tr>
                                                        <td>{{$champion -> user -> name_ar}}</td>
                                                        <td>
                                                            <div class="chat-avatar">
                                                                <a class="avatar" data-toggle="tooltip" href="#"
                                                                   data-placement="left" title=""
                                                                   data-original-title=""
                                                                   style="width: 60px">
                                                                    <img src="{{$champion -> user -> photo}}"
                                                                         style="height:70px">
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td> @if(isset($champion -> champion_photo) &&  $champion -> champion_photo !="")
                                                                <div class="chat-avatar">
                                                                    <a class="avatar" data-toggle="tooltip" href="#"
                                                                       data-placement="left" title=""
                                                                       data-original-title=""
                                                                       style="width: 60px">
                                                                        <img src="{{$champion  -> champion_photo}}"
                                                                             style="height:70px">
                                                                    </a>
                                                                </div>
                                                            @else 'لم يتم اضافهتا' @endif</td>
                                                        <td>{{$champion -> academy -> name_ar}}</td>
                                                        <td>{{$champion -> category -> name_ar}}</td>
                                                        <td>{{$champion  -> name_ar}}</td>
                                                        <td>{!!  $champion  -> note_ar ?  (strlen($champion -> note_ar) >= 50 ? Str::limit($champion -> note_ar,50) ."<button class='btn btn-success' value='{$champion -> note_ar}' data-toggle='modal' data-target='#rotateInUpRightMore'  onclick='showMorefn(this.value)'>المزيد</button>"  :  $champion -> note_ar) : '---' !!}</td>
                                                        <td>{!!  $champion  -> note_en ?  (strlen($champion -> note_en) >= 50 ? Str::limit($champion -> note_en,50) ."<button class='btn btn-success' value='{$champion -> note_en}' data-toggle='modal' data-target='#rotateInUpRightMore'  onclick='showMorefn(this.value)'>المزيد</button>"  :  $champion -> note_en) : '---' !!}</td>
                                                        <td>   {{ __('messages.'.date('l',strtotime($champion -> created_at)))}}
                                                            - {{ date('d-m-Y',strtotime($champion -> created_at))}}  </td>
                                                        </td>

                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.champions.delete',$champion->id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                                    حذف</a>

                                                                <button type="button"
                                                                        value="{{$champion->id}}"
                                                                        class="btn btn-outline-info btn-min-width box-shadow-3 mr-1 mb-1"
                                                                        data-toggle="modal"
                                                                        data-target="#rotateInUpRightChampion{{$champion->id}}">
                                                                    اضافة تفاصيل وصورة المسابقه
                                                                </button>
                                                            </div>
                                                        </td>
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
                </section>
            </div>
        </div>
    </div>
    @if(isset($champions) && $champions -> count() > 0 )
        @foreach($champions as $champion)
            @include('admin.includes.modals.championInfoModal',['champion' => $champion]);
        @endforeach
    @endif

    @include('admin.includes.modals.moreModal');
@stop


@section('script')
    <script>
        @if(Session::has('modalId'))
        $("#rotateInUpRightChampion{{Session::get('modalId')}}").modal('toggle');
        @endif
    </script>
@stop

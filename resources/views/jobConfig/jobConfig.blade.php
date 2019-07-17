@extends('layouts.base')

@section('content')

    @if(isset($message))
        <div>
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                Cập nhật config thành công.
            </div>
        </div>
    @endif

    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="{{! ($errors->has('job_name') || isset($message)) ? 'active' : ''}}"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> CONFIG WEBSITE</a></li>
            <li class="{{ ($errors->has('job_name')  || isset($message)) ? 'active' : ''}}"><a data-toggle="tab" href="#tab-2" aria-expanded="false">CRAWL JOB DETAIL</a></li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane {{! ($errors->has('job_name') || isset($message)) ? 'active' : ''}}">
                <div class="panel-body">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#addNewLink">
                            <i class="fa fa-plus"></i> Thêm link
                        </button>
                        <br/><br/><br/>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Link bắt đầu  </h5>
                                    <div class="ibox-tools">
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#" class="dropdown-item">Config option 1</a>
                                            </li>
                                            <li><a href="#" class="dropdown-item">Config option 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>URL Link</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i2 = 1 ?>
                                        @foreach($rawDataListUrl as $list)
                                            <tr>
                                                @if(($list->type)==1)
                                                    <td>{{$i2}}</td>
                                                    <td>{{$list->url}}</td>
                                                    <?php $i2++ ?>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Link chặn  </h5>
                                    <div class="ibox-tools">
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#" class="dropdown-item">Config option 1</a>
                                            </li>
                                            <li><a href="#" class="dropdown-item">Config option 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>URL Link</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($rawDataListUrl as $blacklist)
                                            <tr>
                                                @if(($blacklist->type==2))
                                                    <td>{{$i}}</td>
                                                    <td>{{$blacklist->url}}</td>
                                                    <?php $i ++ ?>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div id="tab-2" class="tab-pane {{ ($errors->has('job_name') || isset($message)) ? 'active' : ''}}">
                <form action="{{url('job-config/'.request()->route()->parameters['id'])}}" method="post">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-sm btn-primary pull-left" data-toggle="modal" data-target="#myModal"><i class="fa fa-support"></i> Gợi ý</button>
                                <div class="col-sm-6 pull-right">
                                    <div class="">
                                        <div style="float: left; width: 80%">
                                            <input type="text" class="form-control" value="{{isset($jobConfig->link_url_test) ? $jobConfig->link_url_test : ''}}" name="link_url_test" placeholder="Link url crawler test">
                                        </div>
                                        <div>
                                    <span class="input-group-append pull-right">
                                         <button type="button" class="btn btn-primary" id="crawTest">
                                             <i class="fa fa-send"></i>
                                             Crawler test
                                         </button>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <br>
                            <div class="col-sm-6 m-b-xs">
                                <!--khoi nhap lieu 1-->
                                <div class="form-group">
                                    <label>Tiêu đề - Tên job</label>
                                    <i class="text-info pull-right job_name" style="font-size: 10px"></i>
                                    <input type="text" name="job_name" value="{{isset($jobConfig->job_name) ? $jobConfig->job_name : ''}}" class="form-control">
                                    @if($errors->has('job_name'))
                                        <p class="text-danger pull-right">
                                            {{$errors->first('job_name')}}
                                        </p>
                                    @endif
                                </div>
                                <!--khoi nhap lieu 2-->
                                <div class="form-group">
                                    <label>Tên công ty</label>
                                    <i class="text-info pull-right company_name" style="font-size: 10px"></i>
                                    <input type="text" name="company_name" value="{{isset($jobConfig->company_name) ? $jobConfig->company_name : ''}}" class="form-control">
                                </div>

                                <!--khoi nhap lieu 3-->
                            {{--                        <div class="form-group">--}}
                            {{--                            <label>Địa chỉ</label>--}}
                            {{--                            <i class="text-info pull-right workplace" style="font-size: 10px"></i>--}}
                            {{--                            <input type="text" name="workplace" value="{{ isset($jobConfig->workplace) ? $jobConfig->workplace : ''}}" class="form-control">--}}
                            {{--                        </div>--}}


                            <!--khoi nhap lieu 4-->
                                <div class="form-group">
                                    <label>Địa chỉ công ty
                                    </label>
                                    <i class="text-info pull-right company_address" style="font-size: 10px"></i>
                                    <input type="text" name="company_address" value="{{isset($jobConfig->company_address) ? $jobConfig->company_address : ""}}" class="form-control"></div>


                                <!--khoi nhap lieu 5-->
                                <div class="form-group">
                                    <label>SĐT liên lạc</label>
                                    <i class="text-info pull-right contact" style="font-size: 10px"></i>

                                    <input type="text" name="contact" value="{{isset($jobConfig->contact) ? $jobConfig->contact : ""}}" class="form-control">
                                </div>

                                <!--khoi nhap lieu 6-->
                            {{--                        <div class="form-group">--}}
                            {{--                            <label>Email liên hệ</label>--}}
                            {{--                            <i class="text-info pull-right email" style="font-size: 10px"></i>--}}
                            {{--                            <input type="text" name="email" value="{{isset($jobConfig->email) ? $jobConfig->email : ""}}" class="form-control">--}}
                            {{--                        </div>--}}

                            {{--                        <!--khoi nhap lieu 7-->--}}
                            {{--                        <div class="form-group">--}}
                            {{--                            <label>Website công ty</label>--}}
                            {{--                            <i class="text-info pull-right website" style="font-size: 10px"></i>--}}
                            {{--                            <input type="text" name="website" value="{{isset($jobConfig->website) ? $jobConfig->website : ""}}" class="form-control">--}}
                            {{--                        </div>--}}

                            <!--khoi nhap lieu 8-->
                            {{--                        <div class="form-group">--}}
                            {{--                            <label>Logo</label>--}}
                            {{--                            <i class="text-info pull-right logo" style="font-size: 10px"></i>--}}
                            {{--                            <input type="text" name="logo" value="{{isset($jobConfig->logo) ? $jobConfig->logo : ""}}" class="form-control">--}}
                            {{--                        </div>--}}

                            <!--khoi nhap lieu 9-->
                                {{--                        <div class="form-group">--}}
                                {{--                            <label>Hình ảnh</label>--}}
                                {{--                            <i class="text-info pull-right image" style="font-size: 10px"></i>--}}
                                {{--                            <input type="text" name="image" value="{{isset($jobConfig->image) ? $jobConfig->image : ""}}" class="form-control">--}}
                                {{--                        </div>--}}


                            </div>
                            <div class="col-sm-6">
                                <!--khoi nhap lieu 1-->
                                <div class="form-group">
                                    <label>Ngày đăng tuyển</label>
                                    <i class="text-info pull-right job_posting_date" style="font-size: 10px"></i>
                                    <input type="text" name="job_posting_date" value="{{isset($jobConfig->job_posting_date) ? $jobConfig->job_posting_date : ""}}" class="form-control">
                                </div>

                                <!--khoi nhap lieu 2-->
                                <div class="form-group">
                                    <label>Ngày hết hạn</label>
                                    <i class="text-info pull-right expiration_date" style="font-size: 10px"></i>
                                    <input type="text" value="{{isset($jobConfig->expiration_date) ? $jobConfig->expiration_date : ""}}" name="expiration_date" class="form-control">
                                </div>

                                <!--khoi nhap lieu 3-->
                                <div class="form-group">
                                    <label>Mô tả công việc</label>
                                    <i class="text-info pull-right job_description" style="font-size: 10px"></i>
                                    <input type="text" value="{{isset($jobConfig->job_description) ? $jobConfig->job_description : ""}}" name="job_description" class="form-control">
                                </div>

                                <!--khoi nhap lieu 4-->
                                <div class="form-group">
                                    <label>Yêu cầu công việc</label>
                                    <i class="text-info pull-right job_requirements" style="font-size: 10px"></i>
                                    <input type="text" value="{{isset($jobConfig->job_requirements) ? $jobConfig->job_requirements : ""}}" name="job_requirements" class="form-control">
                                </div>


                                <!--khoi nhap lieu 5-->
                                <div class="form-group">
                                    <label>Quyền lợi được hưởng</label>
                                    <i class="text-info pull-right entitlements" style="font-size: 10px"></i>
                                    <input type="text" value="{{isset($jobConfig->entitlements) ? $jobConfig->entitlements : ""}}" name="entitlements" class="form-control">
                                </div>


                                <!--khoi nhap lieu 6-->
                                <div class="form-group">
                                    <label>Kĩ năng</label>
                                    <i class="text-info pull-right skills" style="font-size: 10px"></i>
                                    <input type="text" value="{{ isset($jobConfig->skills) ? $jobConfig->skills : ""}}" name="skills" class="form-control">
                                </div>


                                <!--khoi nhap lieu 7-->
                                <div class="form-group">
                                    <label>Bằng cấp, Trình độ</label>
                                    <i class="text-info pull-right degree" style="font-size: 10px"></i>
                                    <input type="text" value="{{ isset($jobConfig->degree) ? $jobConfig->degree : ""}}" name="degree" class="form-control">
                                </div>


                                <!--khoi nhap lieu 8-->
                                <div class="form-group">
                                    <label>Thu nhập</label>
                                    <i class="text-info pull-right hard_salary_max" style="font-size: 10px"></i>
                                    <input type="text" value="{{ isset($jobConfig->hard_salary_max) ? $jobConfig->hard_salary_max : ""}}" name="hard_salary_max" class="form-control">
                                </div>

                                <!--khoi nhap lieu 9-->
                                <div class="form-group">
                                    <label>Lương cứng</label>
                                    <i class="text-info pull-right hard_salary_min" style="font-size: 10px"></i>
                                    <input type="text" value="{{isset($jobConfig->hard_salary_min) ? $jobConfig->hard_salary_min : ""}}" name="hard_salary_min" class="form-control">

                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-w-m btn-primary pull-right"><i class="fa fa-save"></i> Save</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- The Modal new domain -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm website</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="" method="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Website:</label>
                            <input type="text" name="website" class="form-control" id="domain-name" placeholder="Enter Website" name="email">
                            <span class="text-danger notificaiton pull-right"></span>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" id="btn-add-new-domain" class="btn btn-w-m btn-primary">
                            Thêm Website
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Model add new link-->
    <div class="modal fade" id="addNewLink">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm link</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">URL Link:</label>
                            <input type="text" name="website" class="form-control" id="url" placeholder="Enter URL Link" name="email">
                            <span class="text-danger notificaiton pull-right"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Lựa chọn</label>
                            <select name="type" id="type" class="form-control" >
                                <option value="1">Link bắt đầu</option>
                                <option value="2">Link chặn</option>
                            </select>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" id="btn-add-new-url" class="btn btn-w-m btn-primary">
                            <i class="fa fa-plus"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('javascript-bottom')
    <script src="{{ asset('js-service/add-new-url.js')}}"></script>
    <script src="/js-service/crawler-test.js"></script>
@endsection
@section('style-top')
    <style>
        .ibox-title{
            background: #6fd1bd;
            font-weight: bold;
            color: white;
        }
    </style>
@endsection

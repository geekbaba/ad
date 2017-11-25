@extends('dashboard_layout')
@section('content')
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> 广告列表
                                </div>
                                <div class="card-block">
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>广告编码</th>
                                                <th>广告名称</th>
                                                <th>广告类型</th>
                                                <th>创建时间</th>
                                                <th>创建时间</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($ads as $ad)
                                        	<tr>
                                                <td>{{ $ad->advertising_id }}</td>
                                                <td>{{ $ad->advertising_name }}</td>
                                                <td>{{ $ad->advertising_type_name }}</td>
                                                <td>{{ $ad->status }}</td>
                                                <td>
                                                    <span class="badge badge-success">{{ $ad->advertising_name }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                            
                                        </tbody>
                                    </table>
                                    <nav>
                                        {{ $ads->links() }}
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                    </div>
                    <!--/.row-->
                </div>


            </div>
            <!-- /.conainer-fluid -->
    @stop
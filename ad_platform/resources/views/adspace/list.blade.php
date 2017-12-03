@extends('dashboard_layout')
@section('content')
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> 广告位列表
                                </div>
                                <div class="card-block">
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>广告位编码</th>
                                                <th>广告位名称</th>
                                                <th>广告位类型</th>
                                                <th>状态</th>
                                                <th>创建时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($advertising_spaces as $advertising_space)
                                        	<tr>
                                                <td>{{ $advertising_space->advertising_space_id }}</td>
                                                <td>{{ $advertising_space->advertising_space_name }}</td>
                                                <td>{{ $advertisingTypeMap[$advertising_space->advertising_type_id]->advertising_type_name }}</td>
                                                <td>{{ $advertising_space->status }}</td>
                                                <td>{!! $advertising_space->created_at !!}</td>
                                                <td>
                                                    <a href="/adspace/edit/{{$advertising_space->advertising_space_id}}"><span class="badge badge-success">编辑</span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                            
                                        </tbody>
                                    </table>
                                    <nav>
                                        {{ $advertising_spaces->links() }}
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
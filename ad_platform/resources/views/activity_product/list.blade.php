@extends('dashboard_layout')
@section('content')
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> 皮肤列表
                                </div>
                                <div class="card-block">
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>皮肤编号</th>
                                                <th>皮肤名称</th>
                                                <th>活动</th>
                                                <th>状态</th>
                                                <th>创建时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($skins as $skin)
                                        	<tr>
                                                <td>{{ $skin->activity_skin_id }}</td>
                                                <td>{{ $skin->activity_skin_name }}</td>
                                                <td>{{ $activityIdMap[$skin->activity_id]->activity_name }}</td>
                                                <td>{{ $skin->status }}</td>
                                                <td>{!! $skin->created_at !!}</td>
                                                <td>
                                                    <a href="/skin/edit/{{$skin->activity_skin_id}}"><span class="badge badge-success">编辑</span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                            
                                        </tbody>
                                    </table>
                                    <nav>
                                        {{ $skins->links() }}
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
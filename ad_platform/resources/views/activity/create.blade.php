@extends('dashboard_layout')
@section('content')
    <div class="container-fluid">
                <div class="animated fadeIn">
                  <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>创建活动</strong>
                                </div>
                                <div class="card-block">
                                    <form id='form' action="/activity/store" method="post" enctype="multipart/form-data" class="form-horizontal ">
                                        
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label" for="text-input">活动名称</label>
                                            <div class="col-md-9">
                                                <input type="text" id="text-input" name="activity_name" class="form-control" placeholder="活动名称">
                                                <span class="help-block">起一个好的活动名称能让你很好的记住它。</span>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button id="save" type="button" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> 保存 </button>
                                </div>
                            </div>

                            
                        </div>
                        
                        <!--/.col-->
                    </div>
                    <!--/.row-->

                    <!--/.row-->

                    
                    </div>
                    <!--/.row-->
                </div>

            </div>
    <!-- /.conainer-fluid -->
@stop
@section('js')

<script type="text/javascript">

$('#save').click(function(){
var formElement = document.getElementById("form");

var formData = new FormData(formElement);

console.log(formData);
$.ajax({
     url: "{{url('activity/store')}}",
     headers: {
         'X-CSRF-TOKEN':'{{ csrf_token() }}'
     },
     type: 'POST',
     data: formData,
     dataType:'json',
     contentType: false,
     processData: false,
     success: function (result) {
            if(result.status==1){
                    swal({
                      title: "保存成功!",
                      text: "点击确定后跳转!",
                      icon: "success",
                      button: "确定!",
                    }).then((willDelete) => {
                       window.location.href = "{{url('activity/list')}}";
                    });
            }else{

                swal({
                      title: "保存失败!",
                      text: "请联系相关技术人员!",
                      icon: "error",
                      button: "确定!",
                    });

            }
            
     },
     error: function (returndata) {

     }
    });	
});
</script>
@stop
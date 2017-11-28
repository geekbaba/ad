@extends('dashboard_layout')
@section('content')
    <div class="container-fluid">
                <div class="animated fadeIn">
                  <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>创建广告</strong>
                                </div>
                                <div class="card-block">
                                    <form id='ad_form' action="/ad/store" method="post" enctype="multipart/form-data" class="form-horizontal ">
                                        
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label" for="text-input">广告名称</label>
                                            <div class="col-md-9">
                                                <input type="text" id="text-input" name="advertising_name" class="form-control" placeholder="广告名称">
                                                <span class="help-block">起一个好的广告名称能让你很好的记忆它。</span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label" for="select">广告类型</label>
                                            <div class="col-md-9">
                                                <select id="select" name="advertising_type_id" class="form-control">
                                                    @foreach ($types as $type)
                                                    <option value="{{$type->advertising_type_id}}">{{$type->advertising_type_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label" for="textarea-input">广告属性</label>
                                            <div class="col-md-9">
                                                <textarea id="textarea-input" name="advertising_attribute" rows="9" class="form-control" placeholder="属性"></textarea>
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
var ad_templates_json = '{{$ad_templates_json}}';

$('#save').click(function(){
var formElement = document.getElementById("ad_form");

var formData = new FormData(formElement);

console.log(formData);
$.ajax({
     url: "{{url('ad/store')}}",
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
                       window.location.href = "{{url('ad/list')}}";
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
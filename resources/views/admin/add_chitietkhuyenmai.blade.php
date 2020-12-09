@extends('admin.admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm chi tiết khuyến mãi
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-chitietkhuyenmai')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phần trăm giảm giá</label>
                                    <input type="text" name="discount" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    <p style="color: red">{!! $errors->first('name') !!}</p>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Tên khuyến mãi</label>
                                      <select name="khuyenmai" class="form-control input-sm m-bot15">
                                        @foreach($khuyenmai as $key => $km)
                                            <option value="{{$km->id}}">{{$km->subject}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên sản phẩm</label>
                                      <select name="sanpham" class="form-control input-sm m-bot15">
                                        @foreach($product as $key => $sp)
                                            <option value="{{$sp->id}}">{{$sp->name}}</option>
                                        @endforeach
                                    </select>
                                </div>                              
                                <button type="submit" name="add_user" class="btn btn-info">Thêm chi tiết khuyến mãi</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
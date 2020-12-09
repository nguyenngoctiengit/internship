@extends('admin.admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm khuyến mãi
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
                                <form role="form" action="{{URL::to('/save-khuyenmai')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên khuyến mãi</label>
                                    <input type="text" name="subject" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    <p style="color: red">{!! $errors->first('name') !!}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung</label>
                                    <input type="text" name="content" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    <p style="color: red">{!! $errors->first('slug') !!}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                    <input type="date" name="ngaybatdau" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    <p style="color: red">{!! $errors->first('email') !!}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày kết thúc</label>
                                    <input type="date" name="ngayketthuc" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    <p style="color: red">{!! $errors->first('phone') !!}</p>
                                </div>                             
                                <button type="submit" name="add_khuyenmai" class="btn btn-info">Thêm khuyến mãi</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
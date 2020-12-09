@extends('admin.admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm phiếu nhập sản phẩm
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
                                <form role="form" action="{{URL::to('/save-phieunhap-product')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề phiếu nhập</label>
                                    <input type="text" name="titlenhap" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề phiếu nhập">
                                    <p style="color: red">{!! $errors->first('titlenhap') !!}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày Nhập</label>
                                    <input type="date" name="ngaynhap" class="form-control" id="exampleInputEmail1" placeholder="Ngày nhập">
                                    <p style="color: red">{!! $errors->first('ngaynhap') !!}</p>
                                </div>                        
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm phiếu nhập</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
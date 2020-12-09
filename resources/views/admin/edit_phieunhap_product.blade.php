@extends('admin.admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật phiếu nhập sản phẩm
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
                                <form role="form" action="{{URL::to('/update-phieunhap-product/'.$edit->id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" value="{{$edit->title}}" name="title" class="form-control" id="exampleInputEmail1" >
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày nhập</label>
                                    <input type="date" value="{{$edit->ngaynhap}}" name="ngaynhap" class="form-control" id="exampleInputEmail1" >
                                </div>       
                                <button type="submit" name="update_phieunhap_product" class="btn btn-info">Cập nhật phiếu nhập</button>
                                </form>
                            </div>
                        </div>
                    </section>

            </div>
@endsection
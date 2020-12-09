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
                            <form role="form" action="{{URL::to('/save-chitiet-phieunhap')}}" method="post">
                                    @csrf
                                <input type="hidden" name="id_phieunhap" value="{{$id}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input value="1" min="1" type="number" name="count" class="form-control" id="exampleInputEmail1" placeholder="Số lượng sản phẩm nhập">
                                    <p style="color: red">{!! $errors->first('count') !!}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sản phẩm</label>
                                     <select name="product" class="form-control input-sm m-bot15">
                                        @foreach($product as $key => $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>                        
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm phiếu nhập</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
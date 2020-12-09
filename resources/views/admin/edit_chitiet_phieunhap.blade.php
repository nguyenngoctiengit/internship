@extends('admin.admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Sửa phiếu nhập sản phẩm
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
                            <form role="form" action="{{URL::to('/update-chitiet-phieunhap')}}" method="post">
                                    @csrf
                                <input type="hidden" name="id_phieunhap" value="{{$ct_phieunhap->id}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input value="{{$ct_phieunhap->quantity}}" min="1" type="number" name="count" class="form-control" id="exampleInputEmail1" placeholder="Số lượng sản phẩm nhập">
                                    <p style="color: red">{!! $errors->first('count') !!}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sản phẩm</label>
                                     <select name="product" class="form-control input-sm m-bot15">
                                        @foreach($product as $key => $item)
                                            @if($item->id==$ct_phieunhap->product_id)
                                            <option selected value="{{$item->id}}">{{$item->name}}</option>
                                            @else
                                              <option value="{{$item->id}}">{{$item->name}}</option>
                                              @endif
                                        @endforeach
                                    </select>
                                </div>                        
                                <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật phiếu nhập</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
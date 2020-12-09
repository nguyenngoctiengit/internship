@extends('admin.admin_layout')
@section('admin_content')
<div class="row">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm tin tức
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
                                <form role="form" action="{{URL::to('/save-news')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subject</label>
                                    <input type="text" name="subject" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    <p style="color: red">{!! $errors->first('name') !!}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    <p style="color: red">{!! $errors->first('slug') !!}</p>
                                </div>   
                                <div class="form-group">
                                    <label for="exampleInputEmail1">content</label>
                                    <input type="text" name="content" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    <p style="color: red">{!! $errors->first('content') !!}</p>
                                </div>   
                                <div class="form-group">
                                    <label for="exampleInputEmail1">image</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    <p style="color: red">{!! $errors->first('image') !!}</p>
                                </div>                              
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm tin tức</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
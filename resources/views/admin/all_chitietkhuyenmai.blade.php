@extends('admin.admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết khuyến mãi
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Mã chi tiết khuyến mãi</th>
            <th>Phần trăm khuyến mãi</th>
            <th>Tên khuyến mãi</th>
            <th>Tên sản phẩm</th>
   
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
         <tbody>
          @foreach($chitietkhuyenmai as $key => $ct)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $ct->id}}</td>
            <td>{{ $ct->discount}}</td>
            <form action="{{URL::to('update-chitietkhuyenmai/'.$ct->id)}}" method="get">
              @csrf
            <td><select name="khuyenmai" class="form-control input-sm m-bot15">
                  @foreach($khuyenmai as $key => $km)
                      @if($km->id==$ct->khuyenmai_id)
                       <option selected value="{{$km->id}}">{{$km->subject}}</option>
                      @else
                      <option value="{{$km->id}}">{{$km->subject}}</option>
                      @endif
                @endforeach
              </select></td>
            </td>
            <td><select name="sanpham" class="form-control input-sm m-bot15">
                  @foreach($product as $key => $p)
                      @if($p->id==$ct->product_id)
                       <option selected value="{{$p->id}}">{{$p->name}}</option>
                      @else
                      <option value="{{$p->id}}">{{$p->name}}</option>
                      @endif
                @endforeach
              </select></td>
            </td>
            <td><button type="submit" >Cập nhật</button></td>
          </form>
          </tr>
          @endforeach
        </tbody>
     </table>
    </div>
    <footer class="panel-footer">
      <div class="row">        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
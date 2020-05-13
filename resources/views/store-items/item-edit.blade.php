<link rel="stylesheet" href="http://34.80.52.246/plusone/backend/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://34.80.52.246/plusone/backend/dist/css/style-main.css">
        <link rel="stylesheet" href="http://34.80.52.246/plusone/backend/dist/css/jquery.mCustomScrollbar.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Style -->



        
       
<style>
    span.logo-lg img {
    width: 26%;
    margin-left: -6px;
}
@media (max-width: 750px)
{span.logo-lg img {
    width:11%;
    margin-left: -6px;
}
    
}
</style>

<section class="content">
<div class="row">
<div class="col-md-4">
<!-- Horizontal Form -->
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Add E-Store Items</h3>
</div><!-- /.box-header -->
<!-- form start -->
<form id="form1" action="{{url('/estore/updateItem')}}" name="" method="post" enctype="multipart/form-data">
    @csrf
<input id="id" name="id" placeholder="" type="hidden" class="form-control" value="@if(!empty($result1[0]->id)){{$result1[0]->id}}@endif">
<div class="box-body">

@if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
       
        @endif
  
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif<div class="form-group">
<label for="exampleInputEmail1">Item Name</label><small class="req"> *</small>
<input autofocus="" id="item_name" name="item_name" placeholder="" type="text" class="form-control" value="@if(!empty($result1[0]->item_name)){{$result1[0]->item_name}}@endif">
<span class="text-danger"></span>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Item Code</label><small class="req"> *</small>
<input id="code" name="code" placeholder="" type="text" class="form-control" value="@if(!empty($result1[0]->code)){{$result1[0]->code}}@endif">
<span class="text-danger"></span>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Description</label>
<textarea class="form-control" id="description" name="description" placeholder="" value="@if(!empty($result1[0]->description)){{$result1[0]->description}}@endif" rows="3">@if(!empty($result1[0]->description)){{$result1[0]->description}}@endif</textarea>
<span class="text-danger"></span>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Item Category</label><small class="req"> *</small>
              <select class="form-control" name="item_category">
                @if(!empty($result1[0]->item_category))
                <option value="{{$result1[0]->item_category}}" selected>{{$result1[0]->item_category}}</option>
                @else
                    <option value="" selected>Select Item Category</option>
                    @endif
                    @foreach($item_cat as $cat)
                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                    @endforeach
                   
                </select>
<span class="text-danger"></span>
</div>

<div class="form-group">
<label for="image">Image</label><small class="req"> *</small>
<input type="file" id="image" name="image" class="form-control" value="@if(!empty($result1[0]->image)){{$result1[0]->image}}@endif" style="opacity:1 !important;">

@if(!empty($result1[0]->image))

<img src="{{asset('uploads/'.$result1[0]->image)}}" style="height: 90; width: 90;">
@endif

<span class="text-danger"></span>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Quantity</label><small class="req"> *</small>
<input id="quantity" name="quantity" placeholder="" type="number" class="form-control" value="@if(!empty($result1[0]->quantity)){{$result1[0]->quantity}}@endif">
<span class="text-danger"></span>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Size</label><small class="req"> *</small>
<input id="size" name="size" placeholder="" type="text" class="form-control" value="@if(!empty($result1[0]->size)){{$result1[0]->size}}@endif">
<span class="text-danger"></span>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Age</label><small class="req"> *</small>
<input id="age" name="age" type="number" class="form-control" value="@if(!empty($result1[0]->age)){{$result1[0]->age}}@endif">
<span class="text-danger"></span>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Color</label><small class="req"> *</small>
<input id="color" name="color" placeholder="" type="text" class="form-control" value="@if(!empty($result1[0]->color)){{$result1[0]->color}}@endif">
<span class="text-danger"></span>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Price</label><small class="req"> *</small>
<input id="price" name="price" placeholder="" type="number" class="form-control" value="@if(!empty($result1[0]->price)){{$result1[0]->price}}@endif">
<span class="text-danger"></span>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Bookbyclass</label><small class="req"> *</small>
<input id="bookbyclass" name="bookbyclass" placeholder="" type="text" class="form-control" value="@if(!empty($result1[0]->bookbyclass)){{$result1[0]->bookbyclass}}@endif">
<span class="text-danger"></span>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Publisher</label><small class="req"> *</small>
<input id="publisher" name="publisher" placeholder="" type="text" class="form-control" value="@if(!empty($result1[0]->publisher)){{$result1[0]->publisher}}@endif">
<span class="text-danger"></span>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Setofbooks</label><small class="req"> *</small>
<input id="setofbooks" name="setofbooks" placeholder="" type="text" class="form-control" value="@if(!empty($result1[0]->setofbooks)){{$result1[0]->setofbooks}}@endif">
<span class="text-danger"></span>
</div>

</div><!-- /.box-body -->
<div class="box-footer">
<button type="submit" id="itemsave" class="btn btn-info pull-right">Save</button>
</div>
</form>
</div>

</div><!--/.col (right) -->
<!-- left column -->
<div class="col-md-8">
<!-- general form elements -->
<div class="box box-primary" id="hroom">
<div class="box-header ptbnull">
<h3 class="box-title titlefix">Category List</h3>
</div><!-- /.box-header -->
<div class="box-body">
<div class="mailbox-controls">
<div class="pull-right">
</div><!-- /.pull-right -->
</div>
<div class="table-responsive mailbox-messages">
<div class="download_label">Items List</div>
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
   
            <table class="table table-striped table-bordered table-hover example dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 715px;">
<thead>
<tr role="row"><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 181px;" aria-label="Room Number / Name: activate to sort column ascending">Category Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 65px;" aria-label="Hostel: activate to sort column ascending">Item Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;" aria-label="Room Type: activate to sort column ascending">Price</th><th class="text-right no-print sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 48px;" aria-label="Action: activate to sort column ascending">Action</th></tr>
</thead>
<tbody>
@if(empty($result))
<tr class="odd">
    <td valign="top" colspan="6" class="dataTables_empty">No data available in table <br> <br>
        <img src="https://smart-school.in/ssappresource/images/addnewitem.svg" width="150"><br><br> 
        <span class="text-success bolds"><i class="fa fa-arrow-left">
            
        </i> Add new record or search with different criteria.</span>
    </td>
</tr>
@else
@foreach($result as $data)
<tr class="odd">
    <td valign="top"  class="">{{$data->item_category}} 
    </td>
     <td valign="top"  class="">{{$data->item_name}} 
    </td>
     <td valign="top" class="">{{$data->price}} 
    </td>
    <td><a href="{{url('/editItems/'.$data->id)}}"><i class="fa fa-edit"></i></a>
        <a href="{{url('/deleteItems/'.$data->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i></i></a>
    </td>
    

</tr>
@endforeach
@endif
</tbody>
</table>
{{$result->links()}}
</div><!-- /.table -->
</div><!-- /.mail-box-messages -->
</div><!-- /.box-body -->
</div>
</div><!--/.col (left) -->
<!-- right column -->

</div>
<div class="row">
<div class="col-md-12">
</div><!--/.col (right) -->
</div>   <!-- /.row -->
</section>



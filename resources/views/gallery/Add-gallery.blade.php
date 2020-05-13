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
<h3 class="box-title">Add Gallery</h3>
</div><!-- /.box-header -->
<!-- form start -->
<form id="form1" action="{{ route('gallery.upload') }}" name="employeeform" method="post" enctype="multipart/form-data">
<div class="box-body">
@csrf
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
<label for="exampleInputEmail1">Class</label><small class="req"> *</small>
<input autofocus="" id="class" name="class" placeholder="" type="text" class="form-control" value="" autocomplete="off">
<span class="text-danger"></span>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Section</label><small class="req"> *</small>
<input id="section" name="section" placeholder="" type="text" class="form-control" value="">
<span class="text-danger"></span>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Session</label><small class="req"> *</small>
<input id="session" name="session" placeholder="" type="text" class="form-control" value="">
<span class="text-danger"></span>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Date</label><small class="req"> *</small>
<input id="date" name="date" placeholder="" type="date" class="form-control" value="">
<span class="text-danger"></span>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Title</label><small class="req"> *</small>
<input id="title" name="title" placeholder="" type="text" class="form-control" value="">
<span class="text-danger"></span>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Description</label>
<textarea class="form-control" id="description" name="description" placeholder="" rows="3"></textarea>
<span class="text-danger"></span>
</div>

<div class="form-group">
<label for="exampleInputEmail1">video url</label><small class="req"> *</small>
<input id="videos" name="videos" placeholder="" type="text" class="form-control" value="">
<span class="text-danger"></span>
</div>


<div class="form-group">
<label for="image">Image</label><small class="req"> *</small>
<input type="file" id="file" name="files[]" class="form-control" value="" style="opacity:1 !important;" multiple>
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
<h3 class="box-title titlefix">Gallery List</h3>
</div><!-- /.box-header -->
<div class="box-body">
<div class="mailbox-controls">
<div class="pull-right">
</div><!-- /.pull-right -->
</div>
<div class="table-responsive mailbox-messages">
<div class="download_label">Gallery List</div>
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
   
            <table class="table table-striped table-bordered table-hover example dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 715px;">
<thead>
<tr role="row"><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 181px;" aria-label="Room Number / Name: activate to sort column ascending">Class</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 65px;" aria-label="Hostel: activate to sort column ascending">Section</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;" aria-label="Room Type: activate to sort column ascending">Session</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;" aria-label="Room Type: activate to sort column ascending">Title</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;" aria-label="Room Type: activate to sort column ascending">Description</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;" aria-label="Room Type: activate to sort column ascending">Date</th>
    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;" aria-label="Room Type: activate to sort column ascending">Video url</th><th class="text-right no-print sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 48px;" aria-label="Action: activate to sort column ascending">Image</th><th class="text-right no-print sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 48px;" aria-label="Action: activate to sort column ascending">Action</th></tr>
</thead>
<tbody>
@if(empty($data1))
<tr class="odd">
    <td valign="top" colspan="6" class="dataTables_empty">No data available in table <br> <br>
        <img src="https://smart-school.in/ssappresource/images/addnewitem.svg" width="150"><br><br> 
        <span class="text-success bolds"><i class="fa fa-arrow-left">
            
        </i> Add new record or search with different criteria.</span>
    </td>
</tr>
@else
@foreach($data1 as $image)

<td valign="top"  class="">{{$image['gallery']->class}}</td>
     <td valign="top"  class="">{{$image['gallery']->section}}</td>
     <td valign="top" class="">{{$image['gallery']->session}}</td>
     <td valign="top" class="">{{$image['gallery']->title}}</td>
     <td valign="top" class="">{{$image['gallery']->description}}</td>
     <td valign="top" class="">{{$image['gallery']->date}}</td>
     <td valign="top" class="">{{$image['gallery']->videos}}</td>
    

<td>    
    @foreach($image['image'] as $photos)
    <img src="{{asset('uploads/'.$photos)}}" style="width: 40px; height: 30px;">
    @endforeach
</td>

    <td>
        <a href="{{url('/deleteGallery/'.$image['gallery']->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i>
        </a>
    </td>



@endforeach

@endif
</tbody>
</table>


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



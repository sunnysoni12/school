<!DOCTYPE html>

<html>

<head>

  <title>Laravel Ajax Multiple Image Upload with Preview Example</title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">


 
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>



  <style type="text/css">

    input[type=file]{

      display: inline;

    }

    #image_preview{

      border: 1px solid black;

      padding: 10px;

    }

    #image_preview img{

      width: 200px;

      padding: 5px;

    }

  </style>



</head>

<body>



<div class="container">

  <h1>Laravel Ajax Multiple Image Upload with Preview Example</h1>

  <form action="{{ route('images.upload') }}" method="post" enctype="multipart/form-data">

      {{ csrf_field() }}

    Select Image Files to Upload:
    <input type="text" name="class" value=""><br>
    <input type="file" name="files[]" multiple >
    <input type="submit" name="submit" value="UPLOAD">
</form>

@foreach($data1 as $image)

<h2>{{$image['gallery']->class}}</h2>

@foreach($image['image'] as $photos)
<img src="{{asset('uploads/'.$photos)}}">
@endforeach
@endforeach


  <br/>

  

</div>

</body>



</html>
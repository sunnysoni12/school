<?php

namespace App\Http\Controllers\Api;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use DB;
use Bitly;

class ApiController extends Controller
{

  public function iHaveArrived(Request $request)
   {
         $data1 = array('student_session_id' =>$request->post('student_session_id'),
          'parent_id'=>$request->post('parent_id'),
          'teacher_id'=>$request->post('teacher_id')
        );
             
         if($request->post('parent_id') != '' || $request->post('student_session_id') || $request->post('teacher_id'))
         {
          return response()->json(['status' => '200',//sample entry
   'message' => 'items found',
   'data'=>$data1]);  
        }
        else{
return response()->json(['status' => '404',//sample entry
   'message' => 'items not found']);  
        }  
   }


    public function genarateQrCode(Request $request)
   {
      $qr_code_id = Str::random(6);
     $data1 = array('student_session_id' =>$request->post('student_session_id'),
          'parent_id'=>$request->post('parent_id'),
          'teacher_id'=>$request->post('teacher_id'),
          'student_id'=>$request->post('student_id'),
          'qr_code_id'=>$qr_code_id
        );    
      $data = DB::table('dispersal')->insert($data1);  
     
       $qr = QrCode::size(300)->generate($qr_code_id);

      $dataupload = file_put_contents('uploads/'. $qr_code_id . '.svg', $qr);

      if(!empty($dataupload && $dataupload != ''))
         {
          return response()->json(['status' => '200',//sample entry
   'message' => 'items found',
   'data'=>url('uploads/'. $qr_code_id . '.svg')]);  
        }
        else{
return response()->json(['status' => '404',//sample entry
   'message' => 'items not found']);  
        }

       
   }

  public function DispersalDetail(Request $request)
   {
         $qr_code_id = $request->post('qr_code_id');
          $data = DB::table('dispersal')
          ->where('qr_code_id', $qr_code_id)
          ->select('dispersal.*')->get();
          
          if(!empty($data[0]) && $data[0] != '')
         {
          return response()->json(['status' => '200',//sample entry
   'message' => 'items found',
   'data'=>$data]);  
        }
        else{
return response()->json(['status' => '404',//sample entry
   'message' => 'items not found']);  
        }
   }

    public function disperseStudent(Request $request)
   {
         $date = date('Y-m-d H:i:s');
         $dispersal_id = $request->post('dispersal_id');
         $data1 = array(
          'dispersed_by'=>$request->post('dispersed_by'),
           'dispersed_on'=>$date
         );
         $data = DB::table('dispersal')->where('dispersal_id', $dispersal_id)->update($data1);
         if(isset($data) && $data != '')
         {
           return response()->json(['status' => '200',//sample entry
   'message' => 'Notification will be sent to parent']);
         }
          return response()->json(['status' => '404',//sample entry
   'message' => 'Notification will not be sent to parent ']);
        
         
   }

   public function delegate(Request $request)
   {

        $first_name = $request->post('first_name');
        $last_name = $request->post('last_name');
        $age = $request->post('age');
        $sex = $request->post('sex');
        $parent_id = $request->post('parent_id');
        $from_date = $request->post('from_date');
        $to_date = $request->post('to_date');
         $qr_code_id = Str::random(7);
                $validextensions = array("jpeg", "jpg", "png","pdf");
                $temporary1 = explode('.', $_FILES["image"]["name"]);
                $file_extension1 = end($temporary1);

               if ((($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "application/pdf") || ($_FILES["image"]["type"] == "image/jpeg")
                        ) && ($_FILES["image"]["size"] < 40000000) && in_array($file_extension1, $validextensions)){

                    $imageType1 = explode('.', $_FILES["image"]["name"]);

                    $image = 'image' . rand() . '.' . $imageType1[1];

                    $sourcePath1 = $_FILES['image']['tmp_name'];

                    $targetPath1 = base_path() . '/uploads/' . $image;

                    if (move_uploaded_file($sourcePath1, $targetPath1) )
                        $record['image'] = $image;
                }
              
                $record['first_name'] = $request->post('first_name');
                $record['last_name'] = $request->post('last_name');
                $record['age'] = $request->post('age');
                $record['sex'] = $request->post('sex');
                $record['from_date'] = $request->post('from_date');
                $record['to_date'] = $request->post('to_date');
                $record['parent_id'] = $request->post('parent_id');
                   
                
                
              

       $result = DB::table('delegates')->insert($record);
       $id = DB::getPdo()->lastInsertId();

       $data1 = array('student_session_id' =>$request->post('student_session_id'),
          'parent_id'=>$request->post('parent_id'),
          'teacher_id'=>$request->post('teacher_id'),
          'student_id'=>$request->post('student_id'),
          'delegate_id'=>$id,
          'qr_code_id'=>$qr_code_id
        );    

      $data2 = DB::table('dispersal')->insert($data1);
                   
                     $qr = QrCode::size(300)->generate($qr_code_id);

                     $dataupload = file_put_contents('uploads/'. $qr_code_id . '.svg', $qr);

      if(!empty($dataupload && $dataupload != ''))
         {
          return response()->json(['status' => '200',//sample entry
   'message' => 'items found',
   'data'=>url('uploads/'. $qr_code_id . '.svg')]);  
        }
        else{
return response()->json(['status' => '404',//sample entry
   'message' => 'items not found']);  
        }
              } 
                
        
    public function teacher_schedule(Request $request)
   {
    $teacher_id = $request->post('teacher_id');
      $data = DB::table('staff')
  ->leftjoin('teacher_subjects','teacher_subjects.teacher_id','=','staff.id')
  ->leftjoin('timetables','timetables.teacher_subject_id','=','teacher_subjects.id')
  ->where('staff.id',$teacher_id )
  ->select('timetables.*')
  ->get();
  
     if(!empty($data[0]) && $data[0] != '')
         {
          return response()->json(['status' => '200',//sample entry
   'message' => 'items found',
   'data'=>$data]);  
        }
        else{
return response()->json(['status' => '404',//sample entry
   'message' => 'items not found']);  
        }

    
   }

   public function galleryUploads(Request $request)
    {
         $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "".$fileName.","; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            $record['photos'] = $insertValuesSQL;
            $record['class'] = $request->post('class');
        $record['section'] = $request->post('section');
        $record['session'] = $request->post('session');
        $record['date'] = $request->post('date');
        $record['title'] = $request->post('title');
        $record['description'] = $request->post('description');
        
        $record['videos'] = $request->post('videos');
            // Insert image file name into database 
            $insert =  DB::table('gallery')->insert($record);
            if($insert){ 
                $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    }

       
            return response()->json(['status' => '200',//sample entry
                                   'message' => $statusMsg
                                   ]
                                   );  
            }
      
         
    


     public function galleryupdate(Request $request)
    {

      $id=$request->post('id');
       

                $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "".$fileName.","; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            $record['photos'] = $insertValuesSQL;
            $record['class'] = $request->post('class');
        $record['section'] = $request->post('section');
        $record['session'] = $request->post('session');
        $record['date'] = $request->post('date');
        $record['title'] = $request->post('title');
        $record['description'] = $request->post('description');
        
        $record['videos'] = $request->post('videos');

         $data = DB::table('gallery')->where('id',$id)->update($record);
  if(isset($data) && $data != '')
            {
            return response()->json(['status' => '200',//sample entry
                                   'message' => 'item updated',
                                   'data'=>$data]
                                   );  
            }
        else{
            return response()->json(['status' => '404',//sample entry
                                    'message' => 'items not inserted']
                                   );  
            }
         
    }

    public function listGallery(Request $request)
   {

      $data = DB::table('gallery')
  ->select('gallery.*')
  ->get();
  
     if(!empty($data[0]) && $data[0] != '')
         {
          return response()->json(['status' => '200',//sample entry
   'message' => 'items found',
   'data'=>$data]);  
        }
        else{
return response()->json(['status' => '404',//sample entry
   'message' => 'items not found']);  
        }

    
   }





         
   }
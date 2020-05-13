<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use  SimpleSoftwareIO\QrCode\Facades\QrCode;
use DB;
use Bitly;

class qrController extends Controller
{
   public function index()
   {
   	$data = DB::table('data')->select('data.*')->get();
   	return view('welcome',['data'=>$data]);

   }
   public function sendqr($id)
   {
   		$data = DB::table('data')->where('id',$id)->select('data.*')->get(); 
     $value= json_encode($data);
   	 $qr = QrCode::size(300)->generate($value);
    
return response()->json($qr);

    
   }

   public function read()
   {

         $data = DB::table('data')->where('add_no',$code)->select('data.*')->get();
          return view('read', ['data'=>$data]);
   }


   public function submit(Request $request)
   {
         $data1 = array('add_no' =>$request->post('add_no'),
          'fname'=>$request->post('fname'),
           'mname'=>$request->post('mname'));
         $data = DB::table('history')->insert($data1);
         echo "submitted sucessfully";
         
   }
    public function upload_submit(Request $request)
   {
   $validextensions = array("jpeg", "jpg", "png","pdf");
                $temporary1 = explode('.', $_FILES["file"]["name"]);
                $file_extension1 = end($temporary1);
            
                if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "application/pdf") || ($_FILES["file"]["type"] == "image/jpeg")
                        ) && ($_FILES["file"]["size"] < 40000000) && in_array($file_extension1, $validextensions)){

                    $imageType1 = explode('.', $_FILES["file"]["name"]);

                    $file = 'file' . rand() . '.' . $imageType1[1];

                    $sourcePath1 = $_FILES['file']['tmp_name'];

                    $targetPath1 = base_path() . '/uploads/' . $file;

                    if (move_uploaded_file($sourcePath1, $targetPath1) )
                        $record['file'] = $file;
                }
                
                $record['stu_id'] = $request->post('stu_id');
                $record['fname'] = $request->post('fname');
                $record['lname'] = $request->post('lname');
                $record['class'] = $request->post('class');
                $record['section'] = $request->post('section');
                $record['status'] = $request->post('status');
                $record['comments'] = $request->post('comments');
                $record['reason'] = $request->post('reason');
                $record['start_date'] = $request->post('start_date');
                $record['end_date'] = $request->post('end_date');

                $result = DB::table('leave')->insert($record);
                return $result;
} 



 public function disciplinehome(Request $request)
   {
          $cdate =  date('Y-m-d');
          $classdata = DB::table('discipline')->select('class')->groupby('class')->get();
          $sessiondata = DB::table('discipline')->select('session')->groupby('session')->get();
          $sectiondata = DB::table('discipline')->select('section')->groupby('section')->get();
          $class = $request->query('class', '');
          $date = $request->query('date', '');
          $section = $request->query('section', '');
          $session = $request->query('session', '');

          $query = DB::table('discipline')->select('discipline.*');
          if($class != '' || $section != '' || $session != '' || $date != '' )
          {

          if ($class != '') {
            $query->where('class', $class);
          }
          if ($section != '') {
            $query->where('section', $section);
          }

         if ($session != '') {
            $query->where('session', $session);
          }
           if ($date != '') {
            $query->where('date', $date);
          }

          $data = $query->paginate(50);
           }
           else {
                  $data = DB::table('student')->select('student.*')->paginate(50);     
                }
    

          $count = DB::table('discipline')->select('discipline.*')->get();
   
    return view('discipline',['data'=>$data, 'sessiondata'=>$sessiondata, 'sectiondata'=>$sectiondata, 'classdata'=>$classdata, 'count'=>$count]);

   }
  
   public function search(Request $request)
   {
          $class = $request->query('class', '');
          $section = $request->query('section', '');
          $session = $request->query('session', '');
          $date = $request->query('date', '');

          $query = DB::table('discipline')->select('discipline.*');

          if ($class != '') {
            $query->where('class', $class);
          }
          if ($section != '') {
            $query->where('section', $section);
          }

         if ($session != '') {
            $query->where('session', $session);
          }
           if ($date != '') {
            $query->where('date', $date);
          }

          $data = $query->paginate(50);
          return response()->json($data);
         
   }

   public function paymentHistory()
   {
        
          return view('paymentHistory');
         
   }


  public function upload(Request $request)
   {
  $data = DB::table('gallery')->select('gallery.*')->get();

$data1 = array();
$i = 0;
foreach ($data as $value) {

  $exploded = explode(",",$value->photos);

  $detail['gallery'] = $value;
  $detail['image'] = $exploded;

  $data1[$i] = $detail;
  $i++;

}

  return view('gallery/Add-gallery',['data1'=>$data1]);
}

public function editGallery($id)
   {
    $data = DB::table('gallery')->select('gallery.*')->get();

$data1 = array();
$i = 0;
foreach ($data as $value) {

  $exploded = explode(",",$value->photos);

  $detail['gallery'] = $value;
  $detail['image'] = $exploded;

  $data1[$i] = $detail;
  $i++;

}
        $result = DB::table('gallery')
        ->where('id',$id)
        ->select('gallery.*')->get();
          $result1 = array();
$i = 0;
foreach ($result as $value) {

  $exploded = explode(",",$value->photos);

  $detail['gallery'] = $value;
  $detail['image'] = $exploded;

  $result1[$i] = $detail;
  $i++;

}
      

          return view('/gallery/edit-gallery',['data1'=>$data1, 'result1'=>$result1]);
         
   }

public function deleteGallery($id)
   {
    
        $result1 = DB::table('gallery') ->where('id',$id)->select('gallery.*')->delete();
   
          return redirect()->back();
         
   }
   

   public function insertGallery(Request $request)
   {
    // File upload configuration 
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
     
    // Display status message 
  return redirect()->back()->with('success','Item Successfully Inserted.');
}

  
  public function updateGallery(Request $request)
   {
    // File upload configuration 
    $id = $request->post('id');

    
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
            $insert =  DB::table('gallery')->where('id', $id)->update($record);
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
     
    // Display status message 
  return redirect()->back()->with('success','Item Successfully Updated.');
}     

         
   public function store_category()
   {
        $result = DB::table('store_category')->select('store_category.*')->paginate(10);
          return view('store-category/category',['result'=>$result]);
         
   }

    public function edit_store_category($id)
   {
    $result = DB::table('store_category')->select('store_category.*')->paginate(10);
        $result1 = DB::table('store_category')
        ->where('id',$id)
        ->select('store_category.*')->get();
          return view('/store-category/category-edit',['result'=>$result, 'result1'=>$result1]);
         
   }
 public function deleteCategory($id)
   {
    
        $result1 = DB::table('store_category')
        ->where('id',$id)
        ->select('store_category.*')->delete();
          return redirect()->back();
         
   }


    public function store_items()
   {

        $result = DB::table('store_items')->select('store_items.*')->paginate(20);
        $item_cat = DB::table('store_category')->select('store_category.*')->get();
          return view('store-items/item-list',['result'=>$result, 'item_cat'=>$item_cat]);
         
   }

    public function edit_store_items($id)
   {
     $result = DB::table('store_items')->select('store_items.*')->paginate(20);
        $item_cat = DB::table('store_category')->select('store_category.*')->get();
        $result1 = DB::table('store_items')
        ->where('id',$id)
        ->select('store_items.*')->get();
          return view('/store-items/item-edit',['result'=>$result, 'result1'=>$result1, 'item_cat'=>$item_cat]);
         
   }
 public function deleteItems($id)
   {
    
        $result1 = DB::table('store_items')
        ->where('id',$id)
        ->select('store_items.*')->delete();
          return redirect()->back();
         
   }

   public function insertItem(Request $request)
   {
               
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
                $record['category_id'] = $request->post('category_id');
                $record['item_name'] = $request->post('item_name');
                $record['code'] = $request->post('code');
                $record['description'] = $request->post('description');
                $record['quantity'] = $request->post('quantity');
                $record['item_category'] = $request->post('item_category');
                $record['size'] = $request->post('size');
                $record['age'] = $request->post('age');
                $record['color'] = $request->post('color');
                $record['price'] = $request->post('price');
                $record['bookbyclass'] = $request->post('bookbyclass');
                $record['publisher'] = $request->post('publisher');
                $record['setofbooks'] = $request->post('setofbooks');

                $result = DB::table('store_items')->insert($record);
          return redirect()->back()->with('success','Successfully inserted.');

         
   }

   public function updateItem(Request $request)
   {
               $id = $request->post('id');
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
                $record['category_id'] = $request->post('category_id');
                $record['item_name'] = $request->post('item_name');
                $record['code'] = $request->post('code');
                $record['description'] = $request->post('description');
                $record['quantity'] = $request->post('quantity');
                $record['item_category'] = $request->post('item_category');
                $record['size'] = $request->post('size');
                $record['age'] = $request->post('age');
                $record['color'] = $request->post('color');
                $record['price'] = $request->post('price');
                $record['bookbyclass'] = $request->post('bookbyclass');
                $record['publisher'] = $request->post('publisher');
                $record['setofbooks'] = $request->post('setofbooks');

        $result = DB::table('store_items')->where('id',$id)->update($record);

       return redirect()->back()->with('success','Successfully updated.');
         
   }

 





}
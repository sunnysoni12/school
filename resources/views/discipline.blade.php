<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

        <nav class="navbar navbar-expand-lg" style="background-color: #357fac;">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <img src="./logo.png" style="width: 50px;" alt="">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active" style="text-align: center;">
                  <h3 style="color: white; padding-left: 10px;">School Name</h3>
                  <h6 style="color: white; padding-left: 10px; margin-top: -10px;">School Address</h6>
                </li>
              </ul>
            </div>
          </nav>

<form action="">
          <div style="margin-top: 10px;">
            <div class="" style="text-align: start; padding-left: 20px;">              
                <i class="fa fa-graduation-cap" aria-hidden="true" style="display: inline; zoom: 1.4"></i>
                <p style="display: inline; font-size: 20px;">Student Discipline</p>
            </div>
              <div class="card" style="border-top: solid 2px black; padding: 10px; margin: 10px;">
                <div class="card-content">
                <div class="grid">
                  <div class="row">
                    <div class="col-sm">
                      <div class="form-group">
                        <label for="" style="font-size: 13.3px; font-weight: 500; padding-left: 8px;">Session</label>
                        <select name="session" class="form-control" style="height: 30px; font-size: 13.3px;">

                          @if(isset($_GET['session']) && $_GET['session'] !='')
                          <!-- <option selected hidden>Session</option> -->
                          <option value="{{$_GET['session']}}">{{$_GET['session']}}</option>
                          @else
                          <option>Select Session</option>
                          @endif
                          @foreach($sessiondata as $sdata)
                          @if($sdata->session != '')
                          <option>{{$sdata->session}}</option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group">
                        <label for="" style="font-size: 13.3px; font-weight: 500; padding-left: 8px;">Class</label>
 <select name="class" class="form-control" style="height: 30px; font-size: 13.3px;">
                          <!-- <option selected hidden>Class</option> -->
                          @if(isset($_GET['class']) && $_GET['class'] !='')
                          <!-- <option selected hidden>Session</option> -->
                          <option value="{{$_GET['class']}}">{{$_GET['class']}}</option>
                          @else
                          <option>Select Class</option>
                          @endif
                          @foreach($classdata as $cdata)
                          @if($cdata->class != '')
                          <option>{{$cdata->class}}</option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group">
                        <label for="" style="font-size: 13.3px; font-weight: 500; padding-left: 8px;">Section</label>
                        <select name="section" class="form-control" style="height: 30px; font-size: 13.3px;">
                           @if(isset($_GET['section']) && $_GET['section'] !='')
                          <!-- <option selected hidden>Session</option> -->
                          <option value="{{$_GET['section']}}">{{$_GET['section']}}</option>
                          @else
                          <option>Select Section</option>
                          @endif
                          @foreach($sectiondata as $scdata)
                          @if($scdata->section != '')
                          <option>{{$scdata->section}}</option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="row">
                        
                        <div class="col-sm">
                          <label for="" style="font-size: 13.3px; font-weight: 500; padding-left: 10px;">Date</label>
                         
                             <input class="form-control" type="date" id="date" name="date" style="width: 30px;"  @if(isset($_GET['date']) && $_GET['date'] !='') value="{{$_GET['date']}}" @endif>

                      </div>
                        <div class="col-sm" style="text-align: end;">
                          <button class="btn btn-sm" style="background-color: black; color: white; margin-top: 35px;"><i class="fa fa-search"></i> Search</button>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-2">
                      <button class="btn btn-sm" style="background-color: black; color: white; margin-top: 35px;"><i class="fa fa-search"></i> Search</button>
                    </div> -->
                  </div>
                </div>
                </div>
              </div>
            </div>
        </form>


          <div id="container" style="margin-top: 2%; margin: 10px;">
            <div id="container2">
              <div class="box one"><div>
                  <div class="card">
                    <div class="card-header" style="text-align: center; background-color: ;">
                      <!-- <button class="btn btn-lg" style="background-color: #1ca0e0; color: white;">Student Name</button> -->
                      <i class="fa fa-users" aria-hidden="true" style="display: inline;"></i>
                      <p style="font-size: 15px; display: inline; font-weight: 500;">Student Name</p>
                    </div>
                    <table class="table table-hover">
                      <thead class="thead-dark">
                          <td style="height: 45px; background-color: #b9dbec;"></td>
                          <td style="height: 45px; background-color: #b9dbec;"></td>
                          <td style="height: 45px; background-color: #b9dbec;"></td>
                      </thead>
                        <tbody style="line-height: 0.8;">
                          @foreach($data as $record)
                          <tr data-toggle="modal" data-target="#exampleModalCenter">
                            <td style="font-size: 15px;">{{$record->firstname}}</td>
                            <td>
                                <img src="{{asset('assets/images/search_logo.png')}}" style="width: 18px;" alt="">
                            </td>
                            <td>{{count((array)$record->card_issued)}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <tfoot>
                        <tr>
                          <button class="btn btn-sm" style="background-color: black; color: white;width: 100%;">Submit</button>
                        </tr>
                      </tfoot>
                  </div>
              </div></div>
              <div class="box two"><div>
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <!-- <button class="btn btn-lg" style="background-color: #1ca0e0; color: white;">Uniform</button> -->
                      <img src="./tshirt-solid.svg" style="width: 22px; margin-bottom: 5px;" alt="">
                      <p style="font-size: 15px; display: inline; font-weight: 500;">Uniform</p>
                    </div>
                    <table class="table table-hover">
                        <thead class="thead" style="background-color: #b9dbec; font-size: 13.3px; font-weight: 500;">
                            <tr>
                              <td scope="col">Dress-Shirt/Pants</td>
                              <td scope="col">Socks</td>
                              <td scope="col">Shoes</td>
                              <td scope="col">Belt</td>
                              <td scope="col">Handkerchief</td>
                              <td scope="col">I-Card</td>
                              <td scope="col">Tie</td>
                              <td scope="col">Blazer</td>
                            </tr>
                        <tbody>
                          @foreach($data as $record1)



                          <tr>
                              <input type="hidden" name="stu_id[]" value="{{$record1->id}}">
                            <input type="hidden" name="stu_name{{$record1->id}}" value="{{$record1->firstname}}">
                            <input type="hidden" name="session{{$record1->id}}" value="{{$record1->session}}">
                            <input type="hidden" name="class{{$record1->id}}" value="{{$record1->class}}">
                  
                            <input type="hidden" name="date{{$record1->id}}" value="{{$_GET['date']}}">
                            <input type="hidden" name="section{{$record1->id}}" value="{{$record1->section}}">
                            <th scope="row">
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record1->id}}" name="dress{{$record1->id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </th>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record1->id}}" name="socks{{$record1->id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record1->id}}" name="shoes{{$record1->id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record1->id}}" name="belt{{$record1->id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record1->id}}" name="handkerchief[]{{$record1->id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record1->id}}" name="icard{{$record1->id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record1->id}}" name="tie{{$record1->id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record1->id}}" name="blazer[]{{$record1->id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
              </div>
            </div>

            <div class="box four"><div>
              <div class="card">
                  <div class="card-header" style="text-align: center;">
                    <!-- <button class="btn btn-lg" style="background-color: #1ca0e0; color: white;">Appearance</button> -->
                    <img src="./id-card-alt-solid.svg" style="width: 20px; margin-bottom: 5px;" alt="">
                    <p style="font-size: 15px; display: inline; font-weight: 500;">Appearance</p>
                  </div>
                  <table class="table table-hover">
                      <thead class="thead" style="background-color: #b9dbec; font-size: 13.3px; font-weight: 500;">
                          <tr>
                            <td scope="col">Nails</td>
                            <td scope="col">Hair</td>
                            <td scope="col">Hygiene</td>
                          </tr>
                      <tbody>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
          </div>

            <div class="box four">
              <div>
              <div class="card">
                  <div class="card-header" style="text-align: center;">
                    <!-- <button class="btn btn-lg" style="background-color: #1ca0e0; color: white;">Conduct Behaviour</button> -->
                    <img src="./accusoft-brands.svg" style="width: 20px; margin-bottom: 5px;" alt="">
                    <p style="font-size: 15px; display: inline; font-weight: 500;">Conduct Behaviour</p>
                  </div>
                  <table class="table table-hover">
                      <thead class="thead" style="background-color: #b9dbec; font-size: 13.3px; font-weight: 500;"">
                          <tr>
                            <td scope="col">Argumentative</td>
                            <td scope="col">Abusive Language</td>
                            <td scope="col">Misconduct with teachers</td>
                            <td scope="col">Misconduct with Students</td>
                            <td scope="col">Fights/Quarrels with students</td>
                            <td scope="col">Defying intructions/orders</td>
                            <td scope="col">Class Bunk</td>
                          </tr>
                      <tbody>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </th>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                          <td>
                            <label class="checkbox-label">
                              <input type="checkbox">
                              <span class="checkbox-custom rectangular"></span>
                            </label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
          </div>

              <div class="box three"><div>
                  <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <!-- <button class="btn btn-lg" style="background-color: #1ca0e0; color: white;">Card Issued</button> -->
                      <img src="./box-tissue-solid.svg" style="width: 18px;" alt="">
                      <p style="font-size: 15px; display: inline; font-weight: 500;">Card Issued</p>
                    </div>
                    <table class="table table-hover">
                        <thead class="thead" style="background-color: #b9dbec; font-size: 13.3px; font-weight: 500;">
                            <tr>
                              <td scope="col">Yellow</td>
                              <td scope="col">Orange</td>
                              <td scope="col">Red</td>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </th>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </th>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </th>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </th>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </th>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </th>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </th>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
              </div>
            </div>
              <div class="box four"><div>
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <!-- <button class="btn btn-lg" style="background-color: #1ca0e0; color: white;">Remedial Measures Taken</button> -->
                      <i class="fa fa-users" aria-hidden="true" style="display: inline;"></i>
                      <p style="font-size: 15px; display: inline; font-weight: 500;">Remedial Measures Taken</p>
                    </div>
                    <table class="table table-hover">
                      <thead class="thead" style="background-color: #b9dbec; font-size: 13.3px; font-weight: 500;">
                        <td style="height: 45px;"></td>
                        <td style="height: 45px;"></td>
                        <td style="height: 45px;"></td>
                    </thead>
                        <tbody>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          
                        </tbody>
                      </table>
                  </div>
              </div></div>
              <div class="box four"><div>
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <!-- <button class="btn btn-lg" style="background-color: #1ca0e0; color: white;">Remarks</button> -->
                      <img src="./poll-solid.svg" style="width: 18px;" alt="">
                      <p style="font-size: 15px; display: inline; font-weight: 500;">Remarks</p>
                    </div>
                    <table class="table table-hover">
                      <thead class="thead" style="background-color: #b9dbec; font-size: 13.3px; font-weight: 500;">
                        <td style="height: 45px;"></td>
                        <td style="height: 45px;"></td>
                        <td style="height: 45px;"></td>
                      </thead>
                        <tbody>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <textarea style="height: 18px;" type="text" class="form-control" placeholder=""></textarea>
                            </td>
                          </tr>
                          
                        </tbody>
                      </table>
                  </div>
              </div>
            </div>
              
              <!-- <div class="box four"><div>Last</div></div>
              <div class="box four"><div>Last</div></div> -->
            </div>
            <div style="transform: rotate(90deg); margin: -30% 50% 0 0;">
              <!-- <button type="submit" class="btn btn-lg" style="background-color: grey; width: 100%; color: white;">Submit</button> -->
              <!-- <button class="btn btn-sm" style="background-color: black; color: white; margin-top: 35px; width: 30%;">Submit</button> -->
            </div>
          </div>



          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background-color: #1ca0e0; color: white;">
                  <h5 class="modal-title" id="exampleModalLongTitle">Student Name, Class, Section</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                      <thead style="text-align: center;">
                        <tr>
                          <th scope="col">Card</th>
                          <th scope="col" style="background-color: red;">Red</th>
                        </tr>
                        <tr>
                          <th scope="col">Uniform</th>
                          <th scope="col">Tie, Pant</th>
                        </tr>
                        <tr>
                          <th scope="col">Behaviour</th>
                          <th scope="col">Good</th>
                        </tr>
                        <tr>
                          <th scope="col">Discipline</th>
                          <th scope="col">Good</th>
                        </tr>
                      </thead>
                    </table>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="background-color: #b9dbec;"><b> Remarks </b></span>
                      </div>
                      <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                  </div>
                  <hr style="width: 100%; height: 20px; background-color: #1ca0e0;">
                
                  <div class="modal-body">
                    <table class="table table-bordered">
                      <thead style="text-align: center;">
                        <tr>
                          <th scope="col">Card</th>
                          <th scope="col" style="background-color: yellow;">Yellow</th>
                        </tr>
                        <tr>
                          <th scope="col">Uniform</th>
                          <th scope="col">Tie, Pant</th>
                        </tr>
                        <tr>
                          <th scope="col">Behaviour</th>
                          <th scope="col">Good</th>
                        </tr>
                        <tr>
                          <th scope="col">Discipline</th>
                          <th scope="col">Good</th>
                        </tr>
                      </thead>
                    </table>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="background-color: #b9dbec;"><b> Remarks </b></span>
                      </div>
                      <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                  </div>
                  <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
              </div>
            </div>
          </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>






















  
                    
                    
                    
                    <div class="col-sm">
                      <label for="" style="font-size: 20px ;font-weight: 500;">Date</label>
                      
                        <input class="form-control" type="date" id="date" name="date" style="width: 200px;"  @if(isset($_GET['date']) && $_GET['date'] !='') value="{{$_GET['date']}}" @endif>
                  
                    </div>
                    <div class="col-2">
                      <button class="btn" style="background-color: #1ca0e0; width: 80px; margin-top: 35px; color: white;">
                          <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
<form action="http://localhost/qrlaravel/api/insert-discipline" method="post">
  @csrf

          
              <div class="box three"><div>
                  <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <button class="btn btn-lg" style="background-color: #1ca0e0; color: white;">Appearance</button>
                    </div>
                    <table class="table table-hover">
                        <thead class="thead" style="background-color: #b9dbec;">
                            <tr>
                              <th scope="col">Hygiene</th>
                              <th scope="col">Nails</th>
                              <th scope="col">Hair</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $record2)
                         
                          <tr>
                            <th scope="row">
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record2->id}}" name="hygiene{{$record2->stu_id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </th>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record2->id}}" name="nails{{$record2->stu_id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record2->id}}" name="hair{{$record2->stu_id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                          </tr>
                          @endforeach
                          
                      
                        </tbody>
                      </table>
                  </div>
              </div>
            </div>
            <div class="box four"><div>
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <button class="btn btn-lg" style="background-color: #1ca0e0; color: white;">Conduct Behaviour</button>
                    </div>
                    <table class="table table-hover">
                        <thead class="thead" style="background-color: #b9dbec;">
                            <tr>
                              <th scope="col">Argumentative</th>
                              <th scope="col">Abusive Language</th>
                              <th scope="col">Misconduct with teachers</th>
                              <th scope="col">Misconduct with Students</th>
                              <th scope="col">Fights/Quarrels with students</th>
                              <th scope="col">Defying intructions/orders</th>
                              <th scope="col">Class Bunk</th>
                            </tr>
                        <tbody>
                          @foreach($data as $record3)
                          <tr>
                            <th scope="row">
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record3->id}}" name="argumentative{{$record3->stu_id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </th>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record3->id}}" name="abusive_lang{{$record3->stu_id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record3->id}}" name="missconduct_teacher{{$record3->stu_id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record3->id}}" name="missconduct_students{{$record3->stu_id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record3->id}}" name="fights{{$record3->stu_id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record3->id}}" name="defying_orders{{$record3->stu_id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record3->id}}" name="class_bunk{{$record3->stu_id}}" value="yes">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                          </tr>
                          @endforeach
                        
                        </tbody>
                      </table>
                  </div>
              </div>
            </div>
            <div class="box four"><div>
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <button class="btn btn-lg" style="background-color: #1ca0e0; color: white;">Card Issue</button>
                    </div>
                    <table class="table table-hover">
                        <thead class="thead" style="background-color: #b9dbec;">
                            <tr>
                              <th scope="col">Yellow</th>
                              <th scope="col">Red</th>
                              <th scope="col">Orange</th>
                            </tr>
                        <tbody>
                          @foreach($data as $record4)
                          <tr>
                            <th scope="row">
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record4->id}}" name="card_issued{{$record4->stu_id}}" value="yellow">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </th>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record4->id}}" name="card_issued{{$record4->stu_id}}" value="red">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                            <td>
                              <label class="checkbox-label">
                                <input type="checkbox" id="{{$record4->id}}" name="card_issued{{$record4->stu_id}}" value="orange">
                                <span class="checkbox-custom rectangular"></span>
                              </label>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
              </div></div>
              <div class="box four"><div>
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <button class="btn btn-lg" style="background-color: #1ca0e0; color: white;">Remedial Measures Taken</button>
                    </div>
                    <table class="table table-hover">
                      <thead class="thead" style="background-color: #b9dbec;">
                        <td style="height: 50px;"></td>
                        <td style="height: 50px;"></td>
                        <td style="height: 50px;"></td>
                    </thead>
                        <tbody>
                          @foreach($data as $record5)
                          <tr>
                            <td>
                                <input type="text" name="remedial_measure{{$record5->stu_id}}" id="{{$record5->id}}" class="form-control" placeholder="for AAYAN" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                  </div>
              </div></div>
              <div class="box four"><div>
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <button class="btn btn-lg" style="background-color: #1ca0e0; color: white;">Remarks</button>
                    </div>
                    <table class="table table-hover">
                      <thead class="thead" style="background-color: #b9dbec;">
                        <td style="height: 50px;"></td>
                        <td style="height: 50px;"></td>
                        <td style="height: 50px;"></td>
                      </thead>
                        <tbody>
                          @foreach($data as $record6)
                          <tr>
                            <td>
                                <input type="text" name="remark{{$record6->stu_id}}" id="{{$record6->id}}" class="form-control" placeholder="for AAYAN" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                  </div>
              </div>
            </div>
              
              
              <!-- <div class="box four"><div>Last</div></div>
              <div class="box four"><div>Last</div></div> -->

            </div>
            <div style="transform: rotate(90deg); margin: -50% 60% 0 0;">
              <button type="submit" class="btn btn-lg" style="background-color: #1ca0e0; width: 100%; color: white;">Submit</button>
            </div>
          </div>
          
          <div style="">
            <button type="submit" class="btn" style="background-color: #1ca0e0;">Submit</button>
          </div>
                      
                             
        </form>
        @foreach($count as $data1)
 <div class="modal fade" id="exampleModalCenter{{$data1->stu_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background-color: #1ca0e0; color: white;">
                  <h5 class="modal-title" id="exampleModalLongTitle">{{$data1->stu_name}}, {{$data1->class}}, {{$data1->section}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                      <thead style="text-align: center;">
                        <tr>
                          <th scope="col">Card</th>

                          @if($data1->card_issued == 'red')<th scope="col" style="background-color: red;">{{$data1->card_issued}}</th>@endif

                          @if($data1->card_issued == 'yellow')<th scope="col" style="background-color: yellow;">{{$data1->card_issued}}</th>@endif

                          @if($data1->card_issued == 'orange')<th scope="col" style="background-color: orange;">{{$data1->card_issued}}</th>@endif
                          
                        </tr>
                         @if($data1->dress == 'Yes')
                        <tr>
                          <th scope="col">Dress-Shirt/Pants</th>
                          <th scope="col">{{$data1->dress}}</th>
                        </tr>
                        @endif
                        @if($data1->socks == 'Yes')
                        <tr>
                          <th scope="col">Socks</th>
                          <th scope="col">{{$data1->socks}}</th>
                        </tr>
                        @endif
                        @if($data1->shoes == 'Yes')
                        <tr>
                          <th scope="col">Shoes</th>
                          <th scope="col">{{$data1->shoes}}</th>
                        </tr>
                        @endif
                        @if($data1->belt == 'Yes')
                        <tr>
                          <th scope="col">Belt</th>
                          <th scope="col">{{$data1->belt}}</th>
                        </tr>
                        @endif
                        @if($data1->handkerchief == 'Yes')
                        <tr>
                          <th scope="col">Handkerchief</th>
                          <th scope="col">{{$data1->handkerchief}}</th>
                        </tr>
                        @endif
                        @if($data1->icard == 'Yes')
                        <tr>
                          <th scope="col">I-Card</th>
                          <th scope="col">{{$data1->icard}}</th>
                        </tr>
                        @endif
                        @if($data1->tie == 'Yes')
                        <tr>
                          <th scope="col">Tie</th>
                          <th scope="col">{{$data1->tie}}</th>
                        </tr>
                        @endif
                        @if($data1->blazer == 'Yes')
                        <tr>
                          <th scope="col">Blazer</th>
                          <th scope="col">{{$data1->blazer}}</th>
                        </tr>
                        @endif
                            
                        @if($data1->hygiene == 'Yes')
                        <tr>
                          <th scope="col">Hygiene</th>
                          <th scope="col">{{$data1->hygiene}}</th>
                        </tr>
                        @endif
                         @if($data1->nails == 'Yes')
                        <tr>
                          <th scope="col">Nails</th>
                          <th scope="col">{{$data1->nails}}</th>
                        </tr>
                        @endif
                         @if($data1->hair == 'Yes')
                        <tr>
                          <th scope="col">Hair</th>
                          <th scope="col">{{$data1->hair}}</th>
                        </tr>
                        @endif
                         @if($data1->argumentative == 'Yes')
                        <tr>
                          <th scope="col">Argumentative</th>
                          <th scope="col">{{$data1->argumentative}}</th>
                        </tr>
                        @endif
                         @if($data1->abusive_lang == 'Yes')
                        <tr>
                          <th scope="col">Abusive Language</th>
                          <th scope="col">{{$data1->abusive_lang}}</th>
                        </tr>
                        @endif
                         @if($data1->missconduct_teacher == 'Yes')
                        <tr>
                          <th scope="col">Misconduct with teachers</th>
                          <th scope="col">{{$data1->missconduct_teacher}}</th>
                        </tr>
                        @endif
                          @if($data1->missconduct_students == 'Yes')
                        <tr>
                          <th scope="col">Misconduct with Students</th>
                          <th scope="col">{{$data1->missconduct_students}}</th>
                        </tr>
                        @endif
                          @if($data1->fights == 'Yes')
                        <tr>
                          <th scope="col">Fights/Quarrels with students</th>
                          <th scope="col">{{$data1->fights}}</th>
                        </tr>
                        @endif
                          @if($data1->defying_orders == 'Yes')
                        <tr>
                          <th scope="col">Defying intructions/orders</th>
                          <th scope="col">{{$data1->defying_orders}}</th>
                        </tr>
                        @endif
                          @if($data1->class_bunk == 'Yes')
                        <tr>
                          <th scope="col">Class Bunk</th>
                          <th scope="col">{{$data1->class_bunk}}</th>
                        </tr>
                        @endif
                      </thead>
                    </table>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="background-color: #b9dbec;"><b> Remedial Measures Taken </b></span>
                      </div>
                      <textarea class="form-control" aria-label="With textarea" value="{{$data1->remark}}">{{$data1->remedial_measure}}</textarea>
                    </div>
                    
                    <hr>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" style="background-color: #b9dbec;"><b> Remarks </b></span>
                      </div>
                      <textarea class="form-control" aria-label="With textarea" value="{{$data1->remark}}">{{$data1->remark}}</textarea>
                    </div>
                  </div>
                  <hr style="width: 100%; height: 20px; background-color: #1ca0e0;">
                
                  
                  <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
              </div>
            </div>
          </div>
             @endforeach        
<script type="text/javascript">
  $(function () {
    $("#datepicker").datepicker({ 
          autoclose: true, 
          todayHighlight: true
    }).datepicker('update', new Date());
  });
  
</script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
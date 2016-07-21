@extends('layouts.app')

@section('content')

            <div class="container contentcontainer bg-white  go-bottom">
                <div class="row shopstats">
                    <h1 class='usercaption text-center'><strong style='margin-left: -50px'>Welcome {{$user->name}}</strong></h1>
                    <p class='row'>
                        <div class="col-lg-4"> 
                            <ul class="list-inline">
                                <li class='icons'><span class='fa fa-map-marker'></span></li>
                                <li> <strong> SHOP ADDRESS </strong> <br/>
                                     <div class='datatext go-bottom'> {{$user->store->address}}  </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                          <ul class="list-inline">
                                <li class='icons'><span class='fa fa-rupee'></span></li>
                                <li> <strong> RATE </strong> <br/>
                                    <div class='datatext go-bottom'><span class='fa fa-rupee'></span> {{$prices->regular_eggs}}  </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <ul class="list-inline">
                                <li class='icons'><span class='fa fa-calendar-check-o'></span></li>
                                <li> <strong> DATE </strong> <br/>
                                     <div id='dateholder' class='datatext go-bottom'> {{$date}} </div>
                                </li>
                            </ul>
                        </div>
                    </p>
                 </div>
                
                <hr class='divider'/>

                <div class='row'>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="panelbox">
                            <h3 class="header">
                                OPENING STOCK
                            </h3>
                            <p class="content">
                                <strong><p class="text-center font16"> Regular </p> </strong> 
                                <div class="rate text-center"> <span> {{$closing->regular}} </span>  </div>
                            </p>
                            <p class="content">
                                <strong><p class="text-center font16"> Damaged </p> </strong> 
                                <div class="rate text-center"> <span> {{$closing->damaged}} </span>  </div>
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="panelbox panelbox-lg">
                            <h3 class="header">
                                STOCK INPUT
                            </h3>
                             <p class="content">
                                <strong><p class="text-center font16"> Regular </p> </strong> 
                                <div class="rate text-center"> <span> {{$live_stock->regular}} </span>  </div>
                            </p> 
                            <p class="content">
                                <strong><p class="text-center font16"> Transport Damage </p> </strong> 
                                <div class="rate text-center"> <span> {{$live_stock->damaged}} </span>  </div>
                            </p>
                            <p class="content">
                                <strong><p class="text-center font16"> Damaged Eggs </p> </strong> 
                                <div class="rate text-center"> <span> {{$live_stock->transport_damage}}</span>  </div>
                            </p> 
                        </div> 
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="panelbox panelbox-lg">
                            <h3 class="header">
                                DAYS SALE
                            </h3>
                            <p class="content">
                                <strong><p class="text-center font16"> Regular </p> </strong> 
                                <div class="rate text-center"> <span> {{$days_sale[0]}} </span>  </div>
                            </p> 
                            <p class="content">
                                <strong><p class="text-center font16"> Damaged </p> </strong> 
                                <div class="rate text-center"> <span> {{$days_sale[1]}} </span>  </div>
                            </p>
                            <p class="content">
                                <strong><p class="text-center font16"> Destroyed </p> </strong> 
                                <div class="rate text-center"> <span> {{$days_sale[2]}} </span>  </div>
                            </p> 
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="panelbox">
                            <h3 class="header">
                                CLOSING STOCK
                            </h3>
                            <p class="content">
                                <strong><p class="text-center font16"> Regular </p> </strong> 
                                <div class="rate text-center"> <span> 24 </span>  </div>
                            </p> 
                            <p class="content">
                                <strong><p class="text-center font16"> Damaged </p> </strong> 
                                <div class="rate text-center"> <span> 24 </span>  </div>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row contentrow stockinputrow">
                    <div class="row rowheader">
                        <div class='col-xs-2 col-lg-1 col-md-2 col-sm-2 iconcol no-sidepad no-sidemargin'>
                            <span class='fa fa-circle icon pointer'></span>
                        </div>
                        <div class='col-xs-9 col-lg-11 col-md-11 col-sm-11 no-sidepad no-sidemargin'>
                            <p class='rowcaption'><strong> STOCK INPUT </strong></p> 
                        </div>
                    </div>
                    <div class='row formcontainer'>
                            <form method="post" name="stockInputForm" id='stockInputForm' class="form-horizontal shopkeeperform" role="form" action="/stock/create">
                            <input type="hidden" name="_token" value={{ csrf_token() }}>
                            <input type="hidden" id="store_id" name="store_id" value={{ $user->store->id }}>
                             <input type="hidden" id="user_id" name="user_id" value={{ $user->id }}>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="vehicle_number">Vehicle Number: </label>
                                <div class="col-sm-10">
                                  <input name="vehicle_no" id="vehicle_no" type='text' class='form-control' placeholder=''>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="regular_eggs">No of Eggs: </label>
                                <div class="col-sm-10">
                                   <input id="regular_eggs" name="regular_eggs" type='number' class='form-control' placeholder=''>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="damaged_eggs">Damaged Eggs: </label>
                                <div class="col-sm-10">
                                   <input id="damaged_eggs" name="damaged_eggs" type='number' class='form-control' placeholder=''>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="transport_damage">Transport Damange: </label>
                                <div class="col-sm-10">
                                   <input id="transport_damage" name="transport_damage" type='number' class='form-control' placeholder=''>
                                </div>
                              </div>
                              
                              <hr class='form-divider'/>

                              <div class="form-group">
                                <label class="control-label col-sm-2"></label>
                                <div class=" col-sm-10">
                                  <button type="submit" class="btn btn-warning">SUBMIT</button>
                                </div>
                              </div>
                            </form>
                    </div>
                    <div class='row tablecontainer no-sidepad no-sidemargin'>
                        <table class="table table-bordered">
                             <thead class='warning'>
                                  <tr>
                                        <th>VEHICLE NUMBER</th>
                                        <th>REGULAR EGGS</th>
                                        <th>DAMAGED EGGS</th>
                                        <th>TRANSPORT DAMAGE</th>
                                  </tr>
                             </thead>
                             <tbody>
                             @foreach ($input_transactions as $input_transaction)
                               <tr>
                                <td>{{$input_transaction->vehicle_no}}</td>
                                <td>{{$input_transaction->regular_eggs}}</td>
                                <td>{{$input_transaction->damaged_eggs}}</td>
                                <td>{{$input_transaction->transport_damage}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="row contentrow regulareggsrow">
                    <div class="row rowheader">
                        <div class='col-xs-2 col-lg-1 col-md-2 col-sm-2 iconcol no-sidepad no-sidemargin'>
                            <span class='fa fa-circle icon pointer' ></span>
                        </div>
                        <div class='col-xs-9 col-lg-11 col-md-11 col-sm-11 no-sidepad no-sidemargin'>
                            <p class='rowcaption'><strong> REGULAR EGGS </strong></p> 
                        </div>
                    </div>
                    <div class='row formcontainer'>
                            <form method="post" id='regulareggsform' class="form-horizontal shopkeeperform" role="form" action="/sell/regular">
                               <input type="hidden" name="_token" value={{ csrf_token() }}>
                            <input type="hidden" id="store_id" name="store_id" value={{ $user->store->id }}>
                             <input type="hidden" id="user_id" name="user_id" value={{ $user->id }}>
                                <div class="row no-sidepad">
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" for="vehicle_no">Vehicle Number:</label>
                                            <div class="col-sm-8">
                                               <input id="vehicle_no" name="vehicle_no" type='text' class='form-control' placeholder=''>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-lg-4" for="buyer">Name of buyer:</label>
                                            <div class="col-lg-8">
                                              <input id="buyer" name="buyer" type='text' class='form-control' placeholder=''>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-lg-4" for="regular_eggs">No of Regular Eggss:</label>
                                            <div class="col-lg-8">
                                              <input name="regular_eggs" id="regular_eggs1" type='number' class='form-control' placeholder=''>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-lg-4" for="pwd">Damaged Eggs:</label>
                                            <div class="col-lg-8">
                                              <input name="damaged_eggs" id="damaged_eggs" type='number' class='form-control' placeholder=''>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-lg-4" for="pwd">Destroyed Eggs:</label>
                                            <div class="col-lg-8">
                                              <input name="destroyed" id="destroyed" type='number' class='form-control' placeholder=''>
                                            </div>
                                          </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="">Rate:</label>
                                            <div class="col-sm-10">
                                               <input id="rate_regular" name="rate" type='number' class='form-control' placeholder='' value={{$prices->regular_eggs}} readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                              <label class="control-label col-sm-2" for="pwd">Amount:</label>
                                              <div class="col-sm-10">
                                                 <input name="amount" id="amount_total" type='number' class='form-control' placeholder='' readonly>
                                              </div>
                                        </div> 
                                    </div>
                                    
                                </div>

                              
                              <hr class='form-divider'/>

                              <div class="form-group">
                                <label class="control-label col-sm-2"></label>
                                <div class=" col-sm-10">
                                  <button type="submit" class="btn btn-warning">SUBMIT</button>
                                </div>
                              </div>
                            </form>
                    </div>
                    <div class='row tablecontainer no-sidepad no-sidemargin'>
                        <table class="table table-bordered">
                             <thead class='warning'>
                                  <tr>
                                        <th>VEHICLE NUMBER</th>
                                        <th>NAME OF BUYER</th>
                                        <th>NO OF EGGS</th>
                                        <th>DAMAGED EGGS</th>
                                        <th>DESTROYED EGGS</th>
                                        <th>RATE</th>
                                        <th>AMT</th>
                                  </tr>
                             </thead>
                             <tbody>
                              @foreach($output_transactions_regular as $output_transaction)
                              <tr>
                                    <td>{{$output_transaction->vehicle_no}}</td>
                                    <td>{{$output_transaction->buyer}} </td>
                                    <td>{{$output_transaction->regular_eggs}}</td>
                                    <td>{{$output_transaction->damaged_eggs}}</td>
                                    <td>{{$output_transaction->destroyed}}</td>
                                    <td>{{$output_transaction->rate}} </td>
                                    <td>{{$output_transaction->amount}} </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>

                    
                </div>
                <div class="row contentrow damagedeggsrow">

                    <div class="row rowheader">
                        <div class='col-xs-2 col-lg-1 col-md-2 col-sm-2 iconcol no-sidepad no-sidemargin'>
                            <span class='fa fa-circle icon pointer'></span>
                        </div>
                        <div class='col-xs-9 col-lg-11 col-md-11 col-sm-11 no-sidepad no-sidemargin'>
                            <p class='rowcaption'><strong> DAMAGED EGGS </strong></p> 
                        </div>
                    </div>
                    <div class='row formcontainer'>
                             <form method="post" id='damagedeggsform' class="form-horizontal shopkeeperform" role="form" action="/sell/damaged">
                               <input type="hidden" name="_token" value={{ csrf_token() }}>
                            <input type="hidden" id="store_id" name="store_id" value={{ $user->store->id }}>
                             <input type="hidden" id="user_id" name="user_id" value={{ $user->id }}>
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="vehicle_no">Vehicle Number:</label>
                                            <div class="col-sm-10">
                                              <input name="vehicle_no"  type='text' class='form-control' placeholder=''>
                                            </div>
                                         </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="buyer">Name of buyer:</label>
                                            <div class="col-sm-10">
                                              <input name="buyer" type='text' class='form-control' placeholder=''>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">No of Damaged Eggs:</label>
                                            <div class="col-sm-10">
                                               <input id="damaged_no" name="damaged_eggs" type='number' class='form-control' placeholder=''>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Rate:</label>
                                            <div class="col-sm-10">
                                               <input type='text' name="rate" class='form-control' placeholder='' readonly="true" id="rate_damaged" value="{{$prices->damaged_eggs}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Amount:</label>
                                            <div class="col-sm-10">
                                               <input name="amount" id="amount_total_damaged" type='text' class='form-control' placeholder='' readonly="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              
                              <hr class='form-divider'/>

                              <div class="form-group">
                                <label class="control-label col-sm-2"></label>
                                <div class=" col-sm-10">
                                  <button type="submit" class="btn btn-warning" >SUBMIT</button>
                                </div>
                              </div>
                            </form>
                    </div>
                    <div class='row tablecontainer no-sidepad no-sidemargin'>
                        <table class="table table-bordered">
                             <thead class='warning'>
                                  <tr>
                                        <th>VEHICLE NUMBER</th>
                                        <th>NAME OF BUYER</th>
                                        <th>NO OF EGGS</th>
                                        <th>RATE</th>
                                        <th>AMT</th>
                                  </tr>
                             </thead>
                             <tbody>
                              @foreach($output_transactions_damaged as $output_transaction)
                              <tr>
                                    <td>{{$output_transaction->vehicle_no}}</td>
                                    <td>{{$output_transaction->buyer}} </td>
                                    <td>{{$output_transaction->damaged_eggs}}</td>
                                    <td>{{$output_transaction->rate}}</td>
                                    <td> {{$output_transaction->amount}} </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                    
                <hr class='divider'/>


                <div class='row' style='padding-top:30px'>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="panelbox">
                            <h3 class="header">
                                OPENING STOCK
                            </h3>
                            <p class="content">
                                <strong><p class="text-center font16"> Regular </p> </strong> 
                                <div class="rate text-center"> <span> 24 </span>  </div>
                            </p>
                            <p class="content">
                                <strong><p class="text-center font16"> Damaged </p> </strong> 
                                <div class="rate text-center"> <span> 24 </span>  </div>
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="panelbox panelbox-lg">
                            <h3 class="header">
                                STOCK INPUT
                            </h3>
                             <p class="content">
                                <strong><p class="text-center font16"> Regular </p> </strong> 
                                <div class="rate text-center"> <span> 24 </span>  </div>
                            </p> 
                            <p class="content">
                                <strong><p class="text-center font16"> Transport Damage </p> </strong> 
                                <div class="rate text-center"> <span> 24 </span>  </div>
                            </p>
                            <p class="content">
                                <strong><p class="text-center font16"> Damaged Eggs </p> </strong> 
                                <div class="rate text-center"> <span> 24 </span>  </div>
                            </p> 
                        </div> 
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="panelbox panelbox-lg">
                            <h3 class="header">
                                DAYS SALE
                            </h3>
                            <p class="content">
                                <strong><p class="text-center font16"> Regular </p> </strong> 
                                <div class="rate text-center"> <span> {{$days_sale[0]}} </span>  </div>
                            </p> 
                            <p class="content">
                                <strong><p class="text-center font16"> Damaged </p> </strong> 
                                <div class="rate text-center"> <span> {{$days_sale[1]}} </span>  </div>
                            </p>
                            <p class="content">
                                <strong><p class="text-center font16"> Destroyed </p> </strong> 
                                <div class="rate text-center"> <span> {{$days_sale[2]}} </span>  </div>
                            </p> 
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="panelbox">
                            <h3 class="header">
                                CLOSING STOCK
                            </h3>
                            <p class="content">
                                <strong><p class="text-center font16"> Regular </p> </strong> 
                                <div class="rate text-center"> <span> 24 </span>  </div>
                            </p> 
                            <p class="content">
                                <strong><p class="text-center font16"> Damaged </p> </strong> 
                                <div class="rate text-center"> <span> 24 </span>  </div>
                            </p>
                        </div>
                    </div>
                </div>

                <div class='row expenserow no-sidemargin'>
                    <p class='title'><h3> Expenses</h3></p>
                    <div class="col-lg-6">
                        <label class='go-bottom'> Total Sales:  Rs 10000 </label> <br/>
                        <label class='go-bottom'> Total Expenses: Rs 4000</label> <br/>
                        <label class='go-bottom'> Amount Deposited in Bank: Rs 6000</label> <br/>
                    </div>
                    <div class="col-lg-6">
                        <p class='go-bottom'>
                            <span class='fa fa-plus-square pointer'> </span> Add Expense
                            <form id='expenseform' role="form" style='display:none'>
                                <div class="form-group">
                                    <label class="control-label" for="email">Details</label>
                                    <div>
                                       <input type='text' class='form-control' placeholder=''>
                                    </div>
                                 </div>
                                <div class="form-group go-bottom">
                                    <label class="control-label" for="pwd">Amount</label>
                                    <div>
                                        <input type='text' class='form-control' placeholder=''>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"></label>
                                    <div>
                                      <button type="submit" class="btn btn-warning">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </p>

                        <p class='expensetable'>
                            <table class="table table-bordered">
                                 <thead class='warning'>
                                      <tr>
                                            <th>Details</th>
                                            <th>Amount</th>
                                      </tr>
                                 </thead>
                                 <tbody>
                                  <tr>
                                    <td>Transport</td>
                                    <td>1500</td>
                                  </tr>
                                </tbody>
                            </table>
                        </p>
                         
                    </div>
                </div>

                <div class="row buttonrow text-center">
                    <button class='btn btn-lg btn-warning'> STOCK MATCHED , SHOP CLOSED </button>
                    <button class='btn btn-lg btn-danger' style='margin-left: 30px'> STOCK NOT MATCHED </button>
                </div>


            </div>


@endsection


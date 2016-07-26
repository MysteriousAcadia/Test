 <?php echo View::make('header') ?>

 <div class="container go-bottom contentcontainer dashboard">
      <div class="row contentrow toprow bg-white">
        <h1 class='adminusercaption text-center'><strong style='margin-left: -50px'>Welcome {{Auth::User()->name}}</strong></h1>
        <p class='row ratecontrolrow'>
            <center>

                 <strong> RATE </strong> 
                 <span class='datatext go-bottom-lg' >

                    <div class="rate text-center"> <span>   @if(! empty($prices)) {{$prices->regular}} @endif</span>  </div>
                 </span>
                 @if(empty($prices) || $prices_today == null)
                 <form method="post" id='setrateform' class="form-horizontal shopkeeperform" role="form" action="/rate/update" style="margin-top: 20px">
                  <input type="hidden" name="_token" value={{ csrf_token() }}>
                <input name="regular" type="number" class="form-control input-lg ratecontrolinput go-bottom-lg" placeholder='Enter Daily Rate' required>
                  <button type="submit" class='btn btn-lg btn-warning go-bottom-lg'> set rate </button>
                  </form>
                  @endif
            </center>
        </p>
      </div>


      <div class='row contentrow tablecontainer'>
          <table class="table table-bordered">
               <thead class='warning'>
                  <tr>
                      <th>Shops</th>
                      <th>Shop Keeper Name</th>
                      <th>Opening Stock</th>
                      <th>Input Stock</th>
                      <th>Sales</th>
                      <th>Closing Stock</th>
                      <th> Amount </th>
                  </tr>
               </thead>
               <tbody>
                @foreach($stores as $store)
                <tr>
                  <td> {{$store->name}}</td>
                  <td> {{$store->user['name']}}</td>
                  <td>Regular - {{$closing_yesterday->where('store_id', $store->id)->first()['stock_regular']}} 
                  <br> Damaged - {{$closing_yesterday->where('store_id', $store->id)->first()['stock_damaged']}}   </td>
                  <td> Regular - {{$days_input[$store->id]['regular']}}<br>
                  Damaged -  {{$days_input[$store->id]['damaged']}} <br>
                  Transport Damage - {{$days_input[$store->id]['damaged']}} </td>
                  <td> Regular - {{$days_output[$store->id][0]}} <br>
                  Damaged -  {{$days_output[$store->id][1]}} <br>
                  Destroyed -  {{$days_output[$store->id][2]}}</td>
                  <td> Regular - {{$closing->where('store_id', $store->id)->first()['stock_regular']}}<br>
                  Damaged - {{$closing->where('store_id', $store->id)->first()['stock_damaged']}} <br>
                  Transport Damage - {{$closing->where('store_id', $store->id)->first()['stock_transport_damage']}}  <br>
                  </td>
                  <td>  {{$days_output[$store->id][3]}}</td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>

    </div>

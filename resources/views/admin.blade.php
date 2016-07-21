 <?php echo View::make('header') ?>

 <div class="container go-bottom contentcontainer dashboard">
      <div class="row contentrow toprow bg-white">
        <h1 class='adminusercaption text-center'><strong style='margin-left: -50px'>WELCOME ADMIN</strong></h1>
        <p class='row ratecontrolrow'>
            <center>

                 <strong> RATE </strong> 
                 <span class='datatext go-bottom-lg' >
                    <div class="rate text-center"> <span> {{$prices->regular_eggs}} </span>  </div>
                 </span>
                 @if($today != $prices->date)
                 <form method="post" id='setrateform' class="form-horizontal shopkeeperform" role="form" action="/rate/update" style="margin-top: 20px">
                  <input type="hidden" name="_token" value={{ csrf_token() }}>
                  <input type="hidden" value={{$today}} name="date"></input>
                  <input name="regular_eggs" type="number" class="form-control input-lg ratecontrolinput go-bottom-lg" placeholder='Enter Daily Rate'>
                  <button type="submit" class='btn btn-lg btn-warning go-bottom-lg'> set rate </button>
                  </form>
                  @endif
            </center>
        </p>
      </div>
       
      <div class="row contentrow statsrow text-center">
          <div class="col-lg-3 no-sidepad">
            <div class="statsbox">
                  <img src="images/icon_shops.png" alt="">
                  <h5> SHOPS </h5>
                  <span class='datatext'>
                    <div class="rate text-center"> <span> {{$stores->count()}} </span>  </div>
                 </span>
            </div>
           </div>
          <div class="col-lg-3 no-sidepad">
            <div class="statsbox">
                  <img src="images/icon_rate.png" alt="">
                  <h5> EGGS SOLD </h5>
                  <span class='datatext'>
                    <div class="rate text-center"> <span> {{$sale[0] + $sale[1]}}</span>  </div>
                 </span>
            </div>
          </div>
          <div class="col-lg-3 no-sidepad">
            <div class="statsbox">
                  <img src="images/icon_brokenegg.png" alt="">
                  <h5> DAMAGED </h5>
                  <span class='datatext'>
                    <div class="rate text-center"> <span> {{$sale[2]}} </span>  </div>
                 </span>
            </div>
          </div>
          <div class="col-lg-3 no-sidepad">
              <div class="statsbox">
                  <img src="images/icon_sale.png" alt="">
                  <h5> RATE </h5>
                  <span class='datatext'>
                    <div class="rate text-center"> <span> {{$sale[3]}} </span>  </div>
                 </span>
              </div>
          </div>
      </div>

      <div class='row contentrow salesrow bg-white'>
        <h4> Sales Chart </h4>
       <center> <img src="images/chart.png" style="width:800px; height: 350px;"> </center>
      </div>


      <div class='row contentrow tablecontainer'>
          <table class="table table-bordered">
               <thead class='warning'>
                  <tr>
                      <th>Shops</th>
                      <th>Shop Keeper Name</th>
                      <th>Input Stock</th>
                      <th>Regular Eggs Sold</th>
                      <th>Damaged Eggs Sold</th>
                      <th>Closing Stock</th>
                  </tr>
               </thead>
               <tbody>
                @foreach($stores as $store)
                <tr>
                  <td> {{$store->name}}</td>
                  <td> {{$store->user['name']}}</td>
                  <td> {{$store->stock['regular']}} </td>
                  <td> Clarify (Date) </td>
                  <td> Clarify (Date) </td>
                  <td> Regular: {{$store->ClosingStock->where("date","2016-07-07")->where('id', $store->id)->first()['regular']}} , Damaged: {{$store->ClosingStock->where("date","2016-07-07")->where('id', $store->id)->first()['damaged']}}, Broken: {{$store->ClosingStock->where("date","2016-07-07")->where('id', $store->id)->first()['damaged']}}  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>

    </div>

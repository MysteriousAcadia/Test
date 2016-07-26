 <?php echo View::make('header') ?>
<div class ="container">

 <div class="col-lg-6">
                        <p class='go-bottom'>
                    <h3> Add a new store </h3>
                    @if (Session::has('message'))
                    <div style="text-align: center" class="alert alert-warning">
                      {!! Session::get('message')!!}
                    </div>
                    @endif
  <form method="post" id='storenewform' class="form-horizontal shopkeeperform" role="form" action="/store/new" style="margin-top: 20px">
                  <input type="hidden" name="_token" value={{ csrf_token() }}>                                <div class="form-group">
                                    <label class="control-label" for="email">Name</label>
                                    <div>
                                       <input type='text' name="name" class='form-control' placeholder='' required>
                                    </div>
                                 </div>
                                <div class="form-group go-bottom">
                                    <label class="control-label" for="pwd">Address</label>
                                    <div>
                                        <input name="address" type='text' class='form-control' placeholder='' required>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label"> Choose shopkeeper </label>
                                  <div>
                                  <select name="user_id" class="js-data-example-ajax select" style="width:100%">
                                      <option value="3620194" selected="selected">Select Shopkeeper</option>
                                  </select>
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
<div class='row contentrow tablecontainer'>
          <table class="table table-bordered">
               <thead class='warning'>
                  <tr>
                      <th>Shop Name</th>
                      <th>Shop Address</th>
                      <th>Shop Keeper</th>
                  </tr>
               </thead>
               <tbody>
               @foreach($shops as $shop)
                <tr>
                  <td> {{$shop->name}}  </td>
                  <td> {{$shop->address}} </td>
                  <td> {{$shop->user['name']}} </td>
                </tr>
                @endforeach

              </tbody>
          </table>
        </div>

    <!-- End of main Body -->

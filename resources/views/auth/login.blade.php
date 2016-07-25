@extends('layouts.app')

@section('content')
<div class="container">
         <div class='container contentcontainer logincontainer bg-white  go-bottom'>
         <form class="form-horizontal text-center" role="form" method="POST" action="{{ url('/login') }}">
           {{ csrf_field() }}
            <h3 class='sub-caption'> <img src='../images/icon_user.png' style='height:80px'></h3>
            <div class='form-group-container' style='margin-top:40px'>
              <div class="form-group">
                  <div class="col-xs-12">
                      <div class="input-group">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                         <input placeholder="Email" class='form-control' id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">
                          </div>
                   </div>
              </div>

              <div class="form-group">
                  <div class="col-xs-12">
                      <div class="input-group"  style='margin-bottom:10px'>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input placeholder="Enter password" id="password" type="password" class="form-control" name="password">
                      </div>
                  </div>
              </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

              <div class="form-group btn-container" style='border:none' style='margin-top:40px; border-radius:0px'>
                  <button type="submit" class="btn btn-lg btn-warning loginbtn">
                      <i class="glyphicon glyphicon-refresh glyphicon-spin spinner" style='display:none'></i>
                      <span> LOGIN </span> 
                  </button>
              </div>

          </div>
        </form>

      </div>


@endsection


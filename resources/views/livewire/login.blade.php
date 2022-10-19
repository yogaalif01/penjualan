<div>
           
        <div class="login-box">
                @if (session()->has('sukses') )
                <div class="alert alert-success text-center">{{ session('sukses') }}</div>
            @endif
                <div class="login-logo">
                  <a href="../../index2.html"><b>LOGIN ADMIN</b></a>
                </div>
                <!-- /.login-logo -->
                <div class="login-box-body">
                  <p class="login-box-msg">Sign in to start your session</p>
              
                  <form wire:submit.prevent="post">
                    <div class="form-group has-feedback">
                      <input wire:model="username" type="text" class="form-control" placeholder="Username">
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror  
                    </div>
                    <div class="form-group has-feedback">
                      <input wire:model="password" type="password" class="form-control" placeholder="Password">
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror 
                    </div>
                    <div class="row">
                      <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                      </div>
                    </div>
                  </form>

              
                </div>
                <!-- /.login-box-body -->
              </div>
</div>

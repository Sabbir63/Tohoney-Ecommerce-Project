@extends('main')
@section('contuct')
active
@endsection
@section('body')
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Contact Us</h2>
                    <ul>
                        <li><a href="{{route('To_Honey')}}">Home</a></li>
                        <li><span>Contact</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-area ptb-100">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-12">
                  <div class="contact-form form-style">
                    @if(session('contact_post'))
                    <div class="alert alert-success">
                      {{session('contact_post')}}
                    </div>
                    @endif
                      <div class="cf-msg"></div>
                      <form action="{{url('contuct/post')}}" method="post">
                        @csrf
                          <div class="row">
                              <div class="col-12 col-sm-6">
                                  <input type="text" placeholder="Name" id="fname" name="user_name">
                                  @error('user_name')
                                  <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="col-12  col-sm-6">
                                  <input type="text" placeholder="Email" id="email" name="email">
                                  @error('email')
                                  <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="col-12">
                                  <input type="text" placeholder="Subject" id="subject" name="user_subject">
                                  @error('user_subject')
                                  <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="col-12">
                                  <textarea class="contact-textarea" placeholder="Message" id="msg" name="user_msg"></textarea>
                                  @error('user_msg')
                                  <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="col-12">
                                  <button id="submit">SEND MESSAGE</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="col-lg-4 col-12">
                  <div class="contact-wrap">
                      <ul>
                          <li>
                              <i class="fa fa-home"></i> Address:
                              <p>{{App\Models\setting::where('setting_name','setting_address')->first()->setting_value}}</p>
;                          </li>
                          <li>
                              <i class="fa fa-phone"></i> Email address:
                              <p>
                                  <span>  {{App\Models\setting::where('setting_name','email')->first()->setting_value}}</span>
                              </p>
                          </li>
                          <li>
                              <i class="fa fa-envelope"></i> phone number:
                              <p>
                                  <span>{{App\Models\setting::where('setting_name','phone')->first()->setting_value}}</span>
                              </p>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

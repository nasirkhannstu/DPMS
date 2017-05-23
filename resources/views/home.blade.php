@extends('app')
@section('title', 'Control Panel')
@section('style')
<style>
  .item img{
    width:100%;
  }
</style>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
          <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="row">
              <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="{{url('images/Image-index.jpg')}}" alt="...">
                      <div class="carousel-caption"></div>
                    </div>
                    <div class="item">
                      <img src="{{url('images/Image-images2.jpg')}}" alt="...">
                      <div class="carousel-caption"></div>
                    </div>
                    <div class="item">
                      <img src="{{url('images/Image-Hasina.jpg')}}">
                      <div class="carousel-caption"></div>
                    </div>
                    <div class="item">
                      <img src="{{url('images/Image-hasina-award-2.jpg')}}" alt="...">
                      <div class="carousel-caption"></div>
                    </div>
                    <div class="item">
                      <img src="{{url('images/Image-images.jpg')}}" alt="...">
                      <div class="carousel-caption"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <h3>খাবারের মাধ্যমে আমরা কী কী স্বাস্থ্যঝুঁকিতে পড়তে পারি?</h3>
                <p>আমাদের কিন্তু সুস্থভাবে বেঁচে থাকার জন্য সুষম খাদ্যদ্রব্য দরকার। কতটুকু প্রোটিন খাব, কতটুকু কার্বোহাইড্রেট খাব, কতটুকু চর্বি খাব এগুলো খেয়াল রাখতে হবে। এখন সমস্যা হচ্ছে ভেজাল জিনিসটি কিন্তু খাদ্যদ্রব্যের মধ্যে আসছে। আবার খাদ্যদ্রব্য সংরক্ষণের জন্য ফরমালিন বা বিভিন্ন উপকরণ দেওয়ার প্রবণতা ব্যবসায়ীদের মধ্যে দেখা যাচ্ছে। <br><br>

                সবচেয়ে বেশি যে সমস্যা এখনো আছে সেটি হলো ফরমালিন। এগুলো স্বাস্থ্যঝুঁকি তৈরি করতে পারে। আমরা কিন্তু খুব সুন্দরভাবে খাবার ফরমালিনমুক্ত করতে পারি। আমরা বাজার থেকে যে শাকসবজিগুলো কিনি, সেগুলো এনে যদি একটি বালতিতে পানি দিয়ে ভিজিয়ে ঘণ্টাখানেক রেখে দেই বা ফল যদি কিনে এনে পানিতে রেখে দেই, তাহলে আমরা ফরমালিন থেকে অনেকটা মুক্ত হতে পারি। আর বিশেষ করে মাছের বেলায় আমরা যদি এক লিটার পানিতে দুই চা চামচ ভিনেগার দিয়ে দেই এবং তার মধ্যে যদি মাছটা রাখি, তাহলে কিন্তু ১৫ মিনিটের মধ্যেই মাছকে ফরমালিনমুক্ত করতে পারব। এটা খুব সহজ। আমরা এভাবেও কিছুটা ভেজাল থেকে মুক্ত হতে পারি। <br>
                </p>
                <h3>পরিবেশের কোন কোন জায়গার কী কী দূষণ আমাদের স্বাস্থ্যকে ক্ষতিগ্রস্ত করছে?</h3>
                <p>
                  আমরা অক্সিজেন গ্রহণ করি বায়ুর মাধ্যমে। যদি বায়ুদূষণ হয়, তাহলে যে বিশুদ্ধ অক্সিজেনটি নেওয়ার কথা ছিল, আমরা কিন্তু সেই জিনিসটি ভালোভাবে পাচ্ছি না।  <br><br>

                  আমরা প্রতিনিয়ত পানি পান করছি। পানিদূষণ হতে পারে। সব সময় সুস্থভাবে বেঁচে থাকার জন্য খাদ্য চাই-এ খাদ্য দূষণ হচ্ছে। সুতরাং পরিবেশের বিভিন্ন দিক, যেগুলো আমরা দেখছি, সেই দূষণগুলো কিন্তু আমরা নিয়ত পাচ্ছি আমাদের এই পরিবেশে, বিশেষ করে যদি নগরের পরিবেশের কথা বলি। <br><br>

                  আমরা সকালবেলা উঠে ঘর থেকে বের হওয়ার সময় দেখি, বর্জ্য রাস্তায় পড়ে আছে। এসব কারণে বাতাসটা কিন্তু দূষিত হচ্ছে। এই বাতাসের মধ্যে কিন্তু বিভিন্ন রোগজীবাণু থাকছে। সকালবেলা যখন আমরা বের হলাম, বের হওয়ার পর এই বাতাস যখন শ্বাসের মাধ্যমে আমাদের ভেতর ঢুকছে, তখন কিন্তু এর মধ্যে জীবাণু থাকতে পারে, ব্যাকটেরিয়া থাকতে পারে। নানা ধরনের জীবাণু থাকতে পারে। ভাইরাস থাকতে পারে। এসব কিছু এর মধ্যে থাকাটা খুবই স্বাভাবিক। সেটি আমরা শ্বাসের মাধ্যমে ভেতরে নিচ্ছি। <br><br>

                  আমাদের দেশে যদি শিশুমৃত্যুর ক্ষেত্রে দেখি এবং প্রবীণদের বিভিন্ন রোগব্যাধি দেখি, দেখব শ্বাসতন্ত্রের মধ্যে সংক্রমণ একটি বড় বিষয়। মানে কাশির মাধ্যমে যেটা আমরা উপলব্ধি করি অনেক সময়। বেশির ভাগ শিশু যে নিউমোনিয়ার কারণে মারা যায়, এটি কিন্তু বাতাস দূষণের কারণে।
                </p>
                <h3>কোলেস্টেরল ও উচ্চ রক্তচাপ কমায় জলপাই</h3>
                  <p>জলপাই আমাদের জন্য স্বর্গীয় এক উপহার- এমন কথাই বলেন বিশেষজ্ঞরা। এই ছোট ফলটি সাধারণত পাওয়া যায় ভুমধ্যসাগরীয় এলাকায়। এটি আম, পিচ ও অন্যান্য পাতা জাতীয় ফলের মতোই। জলপাই কেবল সুস্বাদু নয়, এটা স্বাস্থ্যের জন্যও ভালো। এই সবুজ বা কালো ফলটি আপনার শক্তির উৎস হিসেবে কাজ করতে পারে।
                  <br><br>
                  জলপাইয়ের কিছু গুণের কথা জানিয়েছে স্বাস্থ্য বিষয়ক ওয়েবসাইট ফেমিনা।  
                  <br><br>
                  জলপাই কোলেস্টেরল ও রক্তচাপ নিয়ন্ত্রণে রাখে। নিয়মিত দেহের ভারসাম্য রক্ষা করে। এটি আলজেইমারস,পারকিনসন ও অন্যান্য নিউরো ডিজেনারেটিভ রোগের ঝুঁকি কমায় এবং ক্যানসার প্রতিরোধে সাহায্য করে। হাড়ের গঠনও ভালো করে। রক্তচাপ কমাতেও সাহায্য করে এটি।
                  <br><br>
                  এতে রয়েছে প্রচুর পরিমাণে ভিটামিন, অ্যামাইনো এসিড, আয়রন, পটাসিয়াম, সোডিয়াম, ম্যাগনেসিয়াম ও আয়োডিন । এটি কর্মোদ্দীপনা বাড়ায়। এ ছাড়া উর্বরতা বাড়ায় এবং প্রজননে সহায়তা করে। এর অ্যান্টি অক্সিডেন্ট রোগ প্রতিরোধ প্রক্রিয়ার ভেতর ও বাইরে সমানভাবে কাজ করে। জলপাই সাধারণত টক খাবার হিসেবেই ব্যবহৃত হয়।
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 ">
            <h2 class="text-info">Health News</h2>
              <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"> 
                            <h3 class="panel-title">পায়ে পানি আসছে? কিডনির সমস্যা নাতো?</h3> 
                        </div> 
                        <div class="panel-body"> 
                            পা ফুলে গেলে অনেকেই আতঙ্কিত হয়ে পড়েন। অনেকে ভাবেন হয় তো শরীরে রস নেমেছে অথবা কিডনি খারাপ হয়ে গেছে। তবে পা ফোলা বা পায়ে পানি আসার কারণ কখনো খুব সাধারণ বা জটিল সমস্যার লক্ষণ হতে পারে।
                        </div> 
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading"> 
                            <h3 class="panel-title">গরমে কেন ফল খাবেন? কি ফল খাবেন?</h3> 
                        </div> 
                        <div class="panel-body"> 
                            গরমে কি কি ফল আপনার শরীর ভাল রাখবে, তার একটি তালিকা দেয়া হল। এই ফলগুলো আপনার শরীর কে ঠাণ্ডা অ শীতল রেখে জোগাবে প্রয়োজনীয় পুষ্টি।
                        </div> 
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12" >
                    <h2 class="text-danger">Complains</h2>
                    <div class="row">
                        @foreach ($complains as $co)
                        <div class="col-md-12">
                            <div class="panel panel-danger">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Patient <strong>{{$co['patient']['first_name']}} {{$co['patient']['last_name']}}</strong> Complained to Doctor <strong>{{$co['doctor']['first_name']}} {{$co['doctor']['last_name']}}</strong></h3> 
                                </div> 
                                <div class="panel-body"> 
                                    {{$co['complain']}}
                                </div> 
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
              </div>
          </div>
        </div>
    </div>
</section>
@endsection
@section('script')

@endsection
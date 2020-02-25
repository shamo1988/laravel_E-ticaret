@include('header')
<body>
  <div>
    <div class="container" style="margin-top: 5px;background-color: #313a43;">

  <h5 class="pull-left">
      <h5 class="text-left text-white" style="">@lang('index.welcome')</h5>
      <select name="dil" id="dil" style="width:90px;cursor:pointer">
        <option @if (App::isLocale('aze')) selected @endif value="aze"  data-image="{{ url('images/msdropdown/icons/blank.gif') }}" data-imagecss="flag az" data-title="AZE">Aze</option>
        <option @if (App::isLocale('tr')) selected @endif value="tr" data-image="{{ url('images/msdropdown/icons/blank.gif') }}" data-imagecss="flag tr" data-title="Turk"> Tur</option>
        <option @if (App::isLocale('en')) selected @endif value="en" data-image="{{ url('images/msdropdown/icons/blank.gif') }}" data-imagecss="flag gb" data-title="Eng">Eng</option>
    </select>
    <br>
  </h5>
        <h4 class="pull-right"><span id="goster2" class="text-white" style='margin-right: 47px;position: absolute; top: 32px;right: 0px; cursor:pointer' >@lang('index.sebet') <i id="sebeticon" class="fa fa-shopping-cart"></i></span><span id="goster" class="" style='position: absolute;top: 12px; right: 50px; color:#42ff41'>{{count($session)}}</span> </h4>
        <br>
        </div>


                <div class="container" style="display:none; background-color: rgb(212, 249, 212);" id="gizle">
               <button  style="display:none;" class="btn btn-danger float-right my-2 silall" name="sil" ><i class="fa fa-trash"></i>  @lang('index.sebetsil') </button>
               <div id="divsil">
               
    <br>
  
                  @if(count($session)==0)
                    
                      <div align='center' class='text-center'> @lang('index.sebetbos') </div><br>
                       <script>  jQuery('.silall').hide(); 
                        jQuery('#divsatinal').hide();
    
                       
                       </script>
                  
                   
                    @else
                       <script> jQuery('.silall').show();  </script>
                    
                       @foreach($session as $sessionrow)

                       @php 
                       $row2=DB::table('urunlers')->where(['id'=>$sessionrow['id']])->get();
                       @endphp

                      
                       @foreach($row2 as $row)
        <div class="col-lg-12 f">
                <div class="col-md-4 float-left my-5">
      
              <a href="#">
                <img src="{{url('images/'.$row->resim)}}" width="100" height="100"/>
              </a>
            </div>
            <div class="info">
              <p class="seller"><span class="text-danger">@lang('index.urunismi')</span>{{$row->adi}}</p>
              <p class="seller"><span class="text-danger">@lang('index.fiyat')</span> <span class="fiyat2" id='{{$row->fiyat}}'>{{$sessionrow["fiyat"]}}</span> $</p>
              <label class="seller"><span class="text-danger">@lang('index.adet')</span>
                        <span class=" decrease2 btn btn-info" id="decrease" >-</span>
      <input type="text" id="number2" class="number2  text-danger" disabled name="number" value="{{$sessionrow["adet"]}}" />
      <span class=" increase2 btn btn-info " id="increase2">+</span>
                </label> 
              <p class="seller">{{$row->aciklama}}</p>
              
       <div align="right"><button class="btn btn-danger sil" name="sil" id="{{$row->id}}" value="{{$row->id}}>">@lang('index.sil')</button></div>
    </div>
          
        
         <hr> 
         
          </div>
          @endforeach       
      @endforeach
      @endif
      
        </div>
       
                  @if(count($session)!=0)
             
                     <div align=right id="divsatinal"><p class="alert alert-success text-danger font-weight-bold"> @lang('index.toplam') <span id="toplam"> </span> $</button><p>
    <button class="btn btn-primary" id="satinal"> @lang('index.satinal')</button></div><hr>
                  @endif
         
    
        </div>
        
        
        
     <br>
     <h1 class="text-center text-secondary">@lang('index.urunler')</h1>
      <hr>
     
    
    
     <div id="tema" style="display:none" class="myAlert-bottom alert alert-success float-right "> @lang('index.sebetelave')</div>
       <div id="tema2" style="display:none" class="myAlert-bottom alert alert-danger float-right ">@lang('index.silindi')</div>
    
    
        <div class="col-lg-12 bg-primary ">
  
    @foreach ($urunlers as $urunler)
        
    {{ csrf_field() }}

                <div class="col-md-4 float-left my-5 divurun">
                <img src="{{url('images/'.$urunler->resim)}}" width="150" height="150" class="urunresim"/><br><br>
              <label><span class="text-danger">@lang('index.urunismi')</span> {{$urunler->adi}} </label><br>
                <span class="text-danger">@lang('index.fiyat')</span> <label id="{{$urunler->fiyat}}" class="fiyat">{{$urunler->fiyat}}</label> $ <br>
                        <label><span class="text-danger">@lang('index.adet')</span>
                        <button class=" decrease btn btn-info" id="decrease" >-</button>
      <input type="text" id="number" class="number  text-danger" disabled name="number" value="1" />
      <button class=" increase btn btn-info " id="increase">+</button>
    </label>                
      
    <br>
    
              <label><span class="text-danger">@lang('index.aciklama')</span>{{substr($urunler->aciklama,0,100)}}...</label><br>
       
  <button class="text-center btn btn-primary gonder" name="gonder" data-id="{{$urunler->id}}" id="{{$urunler->id}}" >  @lang('index.sebeteat')</button>
             
              <br>
          </div>
          @endforeach
          </div>

          @include('footer')
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
   <script src="{{ url('js/ajax.js') }}"></script>






















  {{Html::style('css/bootstrap.min.css')}}
  {{Html::style('css/font-awesome.min.css')}}
  {{Html::style('css/animate.min.css')}}
<br/><br/>
 <form method="post" action="{{url('try/setLang')}}">
    {!! csrf_field() !!}
   <select name="lang" class="form-control col-3">
     <option value="ar">Arabic</option>
     <option value="en">English</option>
     <option value="fr">Frensh</option>
   </select>
   <br/>	
   <button type="submit" class="btn btn-primary">Change !</button>
 </form>
</br></br></br>
{{ trans('message.welcome') }}

 

 
 


 








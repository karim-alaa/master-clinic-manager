 
 @foreach($doctor as $doctor)
    {{ $doctor->doctor_id }} 
     {{ $doctor->username }} 
      {{ $doctor->useremail }} 
       {{ $doctor->nation }} 
    @endforeach
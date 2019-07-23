@extends ('layouts.app')

@section ('content')
@include('inc.slider')
  <div class="jumbotron text-center">
  {{-- same as  php echo $title --}}
  {{-- this is the main index page --}}
<h1>{{$title}}</h1>
<p>
 MkulimaBora: Where Farmers and Buyers Interact to Make Business Seamless! 
</p>

@endsection
{{-- this basically means that the whole layout (html,etc) will be extended from
the layouts.app file and the only changes to be made will be the content which
will be dictated in the respective files such as the index, about and services. --}}
</div>
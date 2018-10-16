<a href="{{route('profile')}}">
    <img src="{{ Auth::user()->avatar}}" alt="avatar" width="50">
    {{ Auth::user()->name }}
</a>

 {{ Auth::user()->points }}
@include('users::profile.rise_button')

<a href="{{route('projects.index')}}">projects</a>

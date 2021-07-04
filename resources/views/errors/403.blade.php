Anda tidak punya hak akses

@if(Auth::check())    
<a href="{{ (auth()->user()->is_admin == 1 ? url('admin') : url('users')) }}">Kembali</a>
@else
<a href="{{ url('') }}">Kembali</a>
@endif
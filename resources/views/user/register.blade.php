@extends("layouts.main")

@section("page_title", "Registration")


@section("content")


	<div class="auth login_wrapper">
      <div class="form login">
        <h1>Registration</h1>

        <form action="/user/register" method="post">

        	@csrf


        @if($errors->any())
        <div id="auth_login_errors">
        	<div>
	        	<ul>
		        	@foreach ($errors->all() as $error)
				         <li>{{$error}}</li>
			        @endforeach
		        <ul>
        	</div>
        </div>
        @endif

        <div>
          <input
            type="text"
            name="name"
            placeholder="Name"
          />
        </div>

        <div>
          <input
            type="email"
            name="email"
            placeholder="Email"
          />
        </div>
        <div>
          <input
            type="password"
            name="password"
            placeholder="password"
          />
        </div>

        <div>
          <input
            type="password"
            name="password_confirmation"
            placeholder="password verify"
          />
        </div>

        <div>
          <button>
            Continue
          </button>
        </div>
        <div class="registration">
          <a href="/user/register">Registration</a>
        </div>

    	</form>
      </div>
    </div>


@endsection
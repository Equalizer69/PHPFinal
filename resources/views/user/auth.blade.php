@extends("layouts.main")

@section("page_title", "Login")


@section("content")


	<div class="auth login_wrapper">
      <div class="form login">
        <h1>Log in</h1>

        <form action="/user/auth" method="post">

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
          <div class="reset">
          </div>
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
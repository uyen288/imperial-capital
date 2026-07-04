<h1>Login</h1>

<form method="POST" action="{{ route('login') }}">
     @csrf
     <div>
          <input type="email" name="email" placeholder="Enter your email">
     </div>
     <div>
          <input type="password" name="password" placeholder="Enter your password">
     </div>
     <div>
          <x-primary-button>
               {{ __('Log in') }}
          </x-primary-button>
          <x-primary-button type="button" onclick="history.back()">
               {{ __('Back') }}
          </x-primary-button>
     </div>
</form>
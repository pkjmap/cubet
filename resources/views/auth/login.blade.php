<form method="POST" action="{{ route('login') }}">
    @csrf
    @if($errors->get('password') || $errors->get('email'))
        Email or password not found
    @endif
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" id="form2Example1" name="email" value="test@qubet.com" class="form-control" required/>
        <label class="form-label" for="form2Example1">Email address</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" name="password" id="form2Example2" value="test1234" class="form-control" required/>
        <label class="form-label" for="form2Example2">Password</label>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

</form>
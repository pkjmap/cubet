<form method="POST" action="{{ route('register') }}">
    @csrf
    @if($errors->get('password') || $errors->get('email'))
    Email or password not found
    @endif
    <div class="form-outline mb-4">
        <input type="name" id="form2Example1" name="name" value="" class="form-control" required />
        <label class="form-label" for="form2Example1">Name</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="email" name="email" id="form2Example2" value="" class="form-control" required />
        <label class="form-label" for="form2Example2">Email</label>
    </div>
    <div class="form-outline mb-4">
        <input type="password" name="password" id="form2Example2" value="" class="form-control" required />
        <label class="form-label" for="form2Example2">Password</label>
    </div>
    <div class="form-outline mb-4">
        <input type="password" name="password_confirmation" id="form2Example2" value="" class="form-control" required />
        <label class="form-label" for="form2Example2">Password Confirmation</label>
    </div>
    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

</form>
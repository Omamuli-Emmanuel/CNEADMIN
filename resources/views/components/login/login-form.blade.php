<form method="post" action="{{url('login')}}">
  @csrf
  <label for="email" class="form-text px-1 mt-4">Email</label>
  <input id="email" type="email" name="email" class="form-control mb-3" placeholder="Email" >
  <input id="password" type="password" name="password" class="form-control mb-3" placeholder="password" >
  <button type="sibmit" name="submit" class="btn btn-primary pe-4"><i class="bi bi-lock"></i> Login </button>
</form>

@extends('layouts.layout')

@section('title', 'ارسال ایمیل')

@section('content')
<div class="row justify-content-md-center">
  <div class="col-md-8">
      <div class="card">
          <div class="card-header">
              Card Header
          </div>
          <div class="card-body">
            <form action="" method="POST"></form>
              <div class="form-group ">
                <label for="user">Users</label>
                <select class="form-control" id="test">
                    <option value="">Users</option>
                    <option value="">Users</option>
                    <option value="">Users</option>
                    <option value="">Users</option>
                    <option value="">Users</option>
                </select>
              </div>
              <div class="form-group ">
                <label for="user">Email types</label>
                <select class="form-control" id="test">
                    <option value="">Email types</option>
                    <option value="">Email types</option>
                    <option value="">Email types</option>
                    <option value="">Email types</option>
                    <option value="">Email types</option>
                </select>
              </div>
              <button type="submit" class="btn btn-info">Send</button>
            </form>
          </div>
      </div>
  </div>
</div>
@endsection
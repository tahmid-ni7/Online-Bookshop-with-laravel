@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit user</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class="mr-3"><a href="{{route('users.index')}}" cl><i class="fas fa-long-arrow-alt-left"></i> Back</a></span>
                <span class="m-0 font-weight-bold text-primary">user edit form</span>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="display-img text-center p-4">
                        <img src="{{$user->image? $user->image_url:$user->default_img}}" alt="">
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card-body">
                        {!! Form::model($user,['method'=>'PATCH', 'action'=>['Admin\AdminUsersController@update', $user->id], 'files'=>true]) !!}

                        <div class="form-group">
                            {!! Form::label('name') !!}
                            {!! Form::text('name', null, ['class'=>'form-control '.($errors->has('name')? 'is-invalid': '')]) !!}
                            @if($errors->has('name'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('email') !!}
                            {!! Form::text('email', null, ['class'=>'form-control '.($errors->has('email')? 'is-invalid': '')]) !!}
                            @if($errors->has('email'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('password') !!}
                            {!! Form::password('password',['class'=>'form-control '.($errors->has('password')? 'is-invalid': '')]) !!}
                            @if($errors->has('password'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('password')}}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirm Password') !!}
                            {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('role_id', 'Role') !!}
                            {!! Form::select('role_id', App\Role::pluck('name', 'id'), null, ['placeholder'=>'Select Role','class'=>'form-control '.($errors->has('role_id')? 'is-invalid': '')]) !!}
                            @if($errors->has('role_id'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('role_id')}}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('image_id', 'Image') !!}
                            {!! Form::file('image_id', ['class'=>'form-control '.($errors->has('image_id')? 'is-invalid':''), 'rows'=> 5]) !!}
                            <small>Max size 500 KB</small>
                            @if($errors->has('image_id'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('image_id')}}</strong>
                        </span>
                            @endif
                        </div>
                        <input type="hidden" name="is_active" value="1">

                        <div class="form-group">
                            {!! Form::submit('Update', ['class'=>'btn btn-warning']) !!}
                            {!! Form::reset('Reset', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script type="text/javascript">
        /*
         making slug automatically
        */
        $('#name').on('blur', function() {
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#slug');
            theSlug = theTitle.replace(/&/g, '-and-')
                .replace(/[^a-z$0-9-]+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '')

            slugInput.val(theSlug);
        });
    </script>
@endsection

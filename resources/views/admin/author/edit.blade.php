@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit author</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class="mr-3"><a href="{{route('authors.index')}}" cl><i class="fas fa-long-arrow-alt-left"></i> Back</a></span>
                <span class="m-0 font-weight-bold text-primary">Author edit form</span>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="display-img text-center p-4">
                        <img src="{{$author->image? $author->image_url:$author->default_img}}" alt="">
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card-body">
                        {!! Form::model($author, ['method'=>'PATCH', 'action'=>['Admin\AdminAuthorsController@update', $author->id], 'files'=>true]) !!}
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
                            {!! Form::label('slug') !!}
                            {!! Form::text('slug', null, ['class'=>'form-control '.($errors->has('slug')? 'is-invalid':'')]) !!}

                            @if($errors->has('slug'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('slug')}}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('bio') !!}
                            {!! Form::textarea('bio', null, ['class'=>'form-control '.($errors->has('bio')? 'is-invalid':''), 'rows'=> 5]) !!}

                            @if($errors->has('bio'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('bio')}}</strong>
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

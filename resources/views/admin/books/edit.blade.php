@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit book</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class="mr-3"><a href="{{route('books.index')}}" cl><i class="fas fa-long-arrow-alt-left"></i> Back</a></span>
                <span class="m-0 font-weight-bold text-primary">Book edit form</span>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="display-img text-center p-4">
                        <img src="{{$book->image? $book->image_url:$book->default_img}}" alt="">
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card-body">
                        {!! Form::model($book, ['method'=>'PATCH', 'action'=>['Admin\AdminBooksController@update', $book->id], 'files'=>true]) !!}

                        <div class="form-group">
                            {!! Form::label('title') !!}
                            {!! Form::text('title', null, ['class'=>'form-control '.($errors->has('title')? 'is-invalid': '')]) !!}
                            @if($errors->has('title'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('title')}}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('slug') !!}
                            {!! Form::text('slug', null, ['class'=>'form-control '.($errors->has('slug')? 'is-invalid': '')]) !!}
                            @if($errors->has('slug'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('slug')}}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('description') !!}
                            {!! Form::textarea('description', null, ['class'=>'form-control '.($errors->has('description')? 'is-invalid': ''), 'rows'=>10]) !!}
                            @if($errors->has('description'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('description')}}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('author_id', 'Author') !!}
                            {!! Form::select('author_id', App\Author::pluck('name', 'id'), null,['placeholder'=>'Select author','class'=>'form-control '.($errors->has('author_id')? 'is-invalid': '')]) !!}
                            @if($errors->has('author_id'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('author_id')}}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('category_id', 'Category') !!}
                            {!! Form::select('category_id', App\Category::pluck('name', 'id'), null,['placeholder'=>'Select category','class'=>'form-control '.($errors->has('category_id')? 'is-invalid': '')]) !!}
                            @if($errors->has('category_id'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('category_id')}}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('init_price', 'Regular Price') !!}
                            {!! Form::text('init_price', null, ['class'=>'form-control '.($errors->has('init_price')? 'is-invalid': '')]) !!}
                            @if($errors->has('init_price'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('init_price')}}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('discount_rate', 'Discount Rate') !!}
                            {!! Form::text('discount_rate', null, ['class'=>'form-control '.($errors->has('discount_rate')? 'is-invalid': '')]) !!}
                            @if($errors->has('discount_rate'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('discount_rate')}}</strong>
                        </span>
                            @endif
                        </div>
                        <input type="hidden" name="price">

                        <div class="form-group">
                            {!! Form::label('quantity') !!}
                            {!! Form::text('quantity', null, ['class'=>'form-control '.($errors->has('quantity')? 'is-invalid': '')]) !!}
                            @if($errors->has('quantity'))
                                <span class="invalid-feedback">
                            <strong>{{$errors->first('quantity')}}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('image_id', 'Book Image') !!}
                            {!! Form::file('image_id', ['class'=>'form-control '.($errors->has('image_id')? 'is-invalid': '')]) !!}
                            <small>Max size 1MB</small>
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

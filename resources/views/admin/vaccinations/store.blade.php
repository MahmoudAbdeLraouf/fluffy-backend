<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right section-title" >
                        <li class="breadcrumb-item active"> أضافه تطعيم  </li>
                        <li class="breadcrumb-item"><a href="{{route('vaccinations.index')}}">القائمه</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> أضافه تطعيم جديد </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{isset($vaccination)  ? route('vaccinations.update', $vaccination->id) : route('vaccinations.store')}}">
                            @csrf
                            @if(isset($vaccination))
                                @method('PUT')
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> اسم التطعيم </label>
                                    <input type="text" class="form-control" required value="{{isset($vaccination) ? $vaccination->name : ''}}" id="name" name="name" placeholder="أضف  اسم التطعيم  ">
                                    @if($errors->has('name'))
                                        <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> سعر التطعيم </label>
                                    <input type="number" class="form-control" required value="{{isset($vaccination) ? $vaccination->price : ''}}" id="price" name="price" placeholder="أضف سعر التطعيم  ">
                                    @if($errors->has('price'))
                                        <div class="error">{{ $errors->first('price') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> تفاصيل التطعيم </label>
                                    <textarea class="form-control" name="description" id="description" required>{{isset($vaccination) ? $vaccination->description : ''}}
                                    </textarea>
                                    @if($errors->has('description'))
                                        <div class="error">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> نوع الحيوان </label>
                                    <select name="animal_type_id" id="animal_type_id" class="form-control" required>
                                        @foreach($animalTypes as $animalType)
                                            <option value="{{$animalType->id}}" {{isset($vaccination) && $vaccination->animal_type_id == $animalType->id ? 'selected' : ''}}>{{$animalType->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('animal_type_id'))
                                        <div class="error">{{ $errors->first('animal_type_id') }}</div>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
</x-admin-layout>

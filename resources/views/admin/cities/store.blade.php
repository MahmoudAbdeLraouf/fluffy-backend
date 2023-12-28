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
                        <li class="breadcrumb-item active"> أضافه مدينه  </li>
                        <li class="breadcrumb-item"><a href="{{route('cities.index')}}">القائمه</a></li>
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
                            <h3 class="card-title"> أضافه مدينه جديد </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{isset($city)  ? route('cities.update', $city->id) : route('cities.store')}}">
                            @csrf
                            @if(isset($city))
                                @method('PUT')
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> اسم المدينه </label>
                                    <input type="text" class="form-control" required value="{{isset($city) ? $city->name : ''}}" id="name" name="name" placeholder="أضف  اسم المدينه  ">
                                    @if($errors->has('name'))
                                        <div class="error">{{ $errors->first('name') }}</div>
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

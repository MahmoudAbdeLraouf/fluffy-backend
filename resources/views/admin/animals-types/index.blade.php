<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right section-title" >
                            <li class="breadcrumb-item"><a href="#">القائمه</a></li>
                            <li class="breadcrumb-item active">انواع الحيوان</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('animal-types.create')}}" class="btn btn-primary float-sm-left">اضافه نوع حيوان</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">عرض كل انواع الحيوانات</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>اسم الحيوان</th>
                                        <th>أجراءات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($animal_types as $type)
                                        <tr>
                                            <td>{{$type->name}}</td>
                                            <td>
                                                <a class="btn btn-primary update-btn" href="{{route('animal-types.edit',$type->id)}}">تعديل</a>
                                                <form method="POST" action="{{route('animal-types.destroy',$type->id)}}" class="delete-form">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-danger delete-user" value="حذف">
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>اسم الحيوان</th>
                                        <th>أجراءات</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

</x-admin-layout>

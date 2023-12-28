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
                            <li class="breadcrumb-item active"> انواع التطعيمات </li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('vaccinations.create')}}" class="btn btn-primary float-sm-left">اضافه نوع جديده </a>
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
                                <h3 class="card-title">عرض كل الانواع </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th> نوع التطعيم </th>
                                        <th> نوع الحيوان</th>
                                        <th> السعر </th>
                                        <th>أجراءات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($vaccinations as $vaccination)
                                        <tr>
                                            <td>{{$vaccination->name}}</td>
                                            <td>{{$vaccination->animalType->name}}</td>
                                            <td>{{$vaccination->price}}</td>

                                            <td>
                                                <a class="btn btn-primary update-btn" href="{{route('vaccinations.edit',$vaccination->id)}}">تعديل</a>
                                                <form method="POST" action="{{route('vaccinations.destroy',$vaccination->id)}}" class="delete-form">
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
                                        <th> نوع التطعيم </th>
                                        <th> نوع الحيوان</th>
                                        <th> السعر </th>
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

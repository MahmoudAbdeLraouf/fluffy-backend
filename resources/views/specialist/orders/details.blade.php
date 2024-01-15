<x-specialist-layout>
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
                            <li class="breadcrumb-item active"> طلب جديد  </li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('specialists.orders.status.change', [$order->id, 1])}}" class="btn btn-primary float-sm-left">  قبول الطلب </a>
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
                                <h3 class="card-title">عرض كل الطلبات </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th> نوع الحيوان </th>
                                        <th> عمر الحيوان </th>
                                        <th> التطعيمات </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderItems as $item)
                                        <tr>
                                            <td>{{$item->animalType->name}}</td>
                                            <td>{{$item->animal_type_age}}</td>
                                            <?php
                                                $vaccinationIds =$item->itemVaccination->pluck('vaccination_id')
                                                ?>
                                            <td>{{App\Models\Vaccination::whereIn('id', $vaccinationIds)->get()->pluck('name')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th> نوع الحيوان </th>
                                        <th> عمر الحيوان </th>
                                        <th> التطعيمات </th>
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

</x-specialist-layout>

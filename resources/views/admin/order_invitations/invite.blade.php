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
                            <li class="breadcrumb-item active"> دعوه متخصص  </li>
                            <li class="breadcrumb-item"><a href="{{route('orders.index')}}">القائمه</a></li>
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
                                <h3 class="card-title"> دعوه متخصص للطلب </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{route('orders.invite.send')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <div class="card-body">
                                    @foreach($specialists as $sp)
                                    <div class="form-group">
                                            <input type="checkbox" name = "specialists_ids[]" value="{{$sp->id}}"> {{$sp->name}}
                                            <br>
                                    </div>
                                    @endforeach
                                    @if($errors->has('address'))
                                        <div class="error">{{ $errors->first('address') }}</div>
                                    @endif

                                    <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">دعوه</button>
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

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
                        <li class="breadcrumb-item active"> أضافه طلب  </li>
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
                            <h3 class="card-title"> أضافه طلب جديد </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{isset($item)  ? route('items.update', $item->id) : route('items.store')}}">
                            @csrf
                            @if(isset($item))
                                @method('PUT')
                                <input type="hidden", name="order_id", value="{{$orderId}}">
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> نوع الحيوان </label>
                                    <select name="animal_type_id" id="animal_type_id" class="form-control" required>
                                        <option value="">اختر نوع الحيوان </option>
                                        @foreach($animalTypes as $animalType)
                                            <option value="{{$animalType->id}}" {{isset($item) && $item->animal_type_id == $animalType->id ? 'selected' : ''}}>{{$animalType->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('animal_type_id'))
                                        <div class="error">{{ $errors->first('animal_type_id') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> عمر الحيوان </label>
                                    <input type="text" class="form-control" required value="{{isset($item) ? $item->animal_type_age : ''}}" id="animal_type_age" name="animal_type_age" placeholder="أضف  عمر الحيوان  ">
                                    @if($errors->has('animal_type_age'))
                                        <div class="error">{{ $errors->first('animal_type_age') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> التطعيم </label>
                                    <?php
                                        if(isset($item))
                                        $vaccinationIds = App\Models\OrderItem::find($item->id)->itemVaccination->pluck('vaccination_id')->toArray()
                                    ?>
                                    <select name="vaccination_ids[]" id="vaccination_id" class="form-control" required multiple>
                                        <option value="">اختر تطعيم الحيوان </option>
                                        @foreach($vaccinations as $vaccination)
                                            <option value="{{$vaccination->id}}" {{isset($item) && in_array($vaccination->id, $vaccinationIds) ? 'selected' : ''}}>{{$vaccination->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('vaccination_ids'))
                                        <div class="error">{{ $errors->first('vaccination_ids') }}</div>
                                    @endif
                                </div>
                            </div>

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

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
                        <li class="breadcrumb-item active"> أضافه عميل  </li>
                        <li class="breadcrumb-item"><a href="{{route('clients.index')}}">القائمه</a></li>
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
                            <h3 class="card-title"> أضافه عميل جديد </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{isset($client)  ? route('clients.update', $client->id) : route('clients.store')}}">
                            @csrf
                            @if(isset($client))
                                @method('PUT')
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> اسم العميل </label>
                                    <input type="text" class="form-control" required value="{{isset($client) ? $client->name : ''}}" id="name" name="name" placeholder="أضف  اسم العميل  ">
                                    @if($errors->has('name'))
                                        <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> رقم الجوال </label>
                                    <input type="text" class="form-control" required value="{{isset($client) ? $client->phone : ''}}" id="phone" name="phone" placeholder="أضف رقم الجوال  ">
                                    @if($errors->has('phone'))
                                        <div class="error">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> تاريخ الاشتراك </label>
                                    <input type="date" class="form-control" required value="{{isset($client) ? $client->subscription_date : ''}}" id="subscription_date" name="subscription_date">
                                    @if($errors->has('subscription_date'))
                                        <div class="error">{{ $errors->first('subscription_date') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> الجنس </label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="">اخنر الجنس</option>
                                        <option value = "1">ذكر </option>
                                        <option value = "2">انثى </option>
                                    </select>
                                    @if($errors->has('gender'))
                                        <div class="gender">{{ $errors->first('city_id') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> المدينه </label>
                                    <select name="city_id" id="city_id" class="form-control" required>
                                    <option value="">اخنر مدينه</option>
                                    @foreach($cities as $city)
                                            <option value="{{$city->id}}" {{isset($client) && $client->regions->count() && $client->regions->first()->city_id == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('city_id'))
                                        <div class="error">{{ $errors->first('city_id') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> المنطقه </label>
                                    <select name="region_ids" id="region_id" class="form-control" required>
                                        <option value="">اخنر منطقه</option>
                                    @foreach($regions as $region)
                                            <option value="{{$region->id}}" {{isset($client) && in_array($region->id, $client->regions->pluck('id')->toArray()) ? 'selected' : ''}}>{{$region->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('region_ids'))
                                        <div class="error">{{ $errors->first('region_ids') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> نوع الحيوان </label>
                                    <select name="animal_types" id="city_id" class="form-control" required multiple>
                                        @foreach($animal_types as $animal_type)
                                            <option value="{{$animal_type->id}}" {{isset($client) && in_array($animal_type->id, $client->animal_types()->pluck('id')->toArray()) ? 'selected' : ''}}>{{$region->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('animal_type'))
                                        <div class="error">{{ $errors->first('animal_type') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> كيف عرف عنا </label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="">اخنر كيف عرف عنا</option>
                                        <option value = "1">فيس بوك </option>
                                        <option value = "2">تويتر </option>
                                        <option value = "3">جوجل </option>
                                        <option value = "4">صديق </option>
                                        <option value = "5">اعلان </option>
                                        <option value = "6">اخرى </option>
                                    </select>
                                    @if($errors->has('gender'))
                                        <div class="gender">{{ $errors->first('city_id') }}</div>
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

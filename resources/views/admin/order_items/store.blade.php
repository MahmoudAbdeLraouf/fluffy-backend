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
                        <form method="post" action="{{isset($order)  ? route('orders.update', $order->id) : route('orders.store')}}">
                            @csrf
                            @if(isset($order))
                                @method('PUT')
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> رقم جوال العميل </label>
                                    <select name="client_id" id="client_id" class="form-control" required>
                                        <option value="">اختر عميل </option>
                                    @foreach($clients as $client)
                                            <option value="{{$client->id}}" {{isset($order) && $order->client_id == $client->id ? 'selected' : ''}}>{{$client->phone}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('client_id'))
                                        <div class="error">{{ $errors->first('client_id') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> المدينه </label>
                                    <select name="city_id" id="city_id" class="form-control" required>
                                    <option value="">اخنر مدينه</option>
                                    @foreach($cities as $city)
                                            <option value="{{$city->id}}" {{isset($order) && $client->regions->count() && $client->regions->first()->city_id == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('city_id'))
                                        <div class="error">{{ $errors->first('city_id') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> المنطقه </label>
                                    <select name="region_id" id="region_id" class="form-control" required>
                                        <option value="">اخنر منطقه</option>
                                    @foreach($regions as $region)
                                            <option value="{{$region->id}}" {{isset($order) && in_array($region->id, $client->regions->pluck('id')->toArray()) ? 'selected' : ''}}>{{$region->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('region_id'))
                                        <div class="error">{{ $errors->first('region_id') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> عنوان العميل </label>
                                    <input type="text" class="form-control" required value="{{isset($order) ? $order->client->address : ''}}" id="address" name="address" placeholder="أضف  عنوان العميل  ">
                                    @if($errors->has('address'))
                                        <div class="error">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                                <!-- Date and time -->
                                <div class="form-group">
                                    <label>تاريخ التطعيم </label>
                                    <input type="date" class="form-control" name="date" required/>
                                    @if($errors->has('date'))
                                        <div class="error">{{ $errors->first('date') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                    <label>موعد من الساعه </label>
                                    <input type="time" class="form-control" name="from" required/>
                                    @if($errors->has('from'))
                                        <div class="error">{{ $errors->first('from') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                    <label>موعد الي الساعه </label>
                                    <input type="time" class="form-control" name="to" required/>
                                    @if($errors->has('to'))
                                        <div class="error">{{ $errors->first('to') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label> ملاحظات </label>
                                    <textarea class="form-control" name="notes" rows="3" placeholder="أضف ملاحظات "></textarea>
                                    @if($errors->has('notes'))
                                        <div class="error">{{ $errors->first('notes') }}</div>
                                    @endif
                                </div>
                            </div>
                                <div class = "card card-primary">
                                    <div class="card-header" style="border-radius:0; background-color:blueviolet">
                                        <h3 class="card-title"> اداره التطعيمات </h3>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> نوع الحيوان </label>
                                            <select name="animal_type_id" id="animal_type_id" class="form-control" required>
                                                <option value="">اختر نوع الحيوان </option>
                                                @foreach($animalTypes as $animalType)
                                                    <option value="{{$animalType->id}}" {{isset($order) && $order->client_id == $client->id ? 'selected' : ''}}>{{$animalType->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('animal_type_id'))
                                                <div class="error">{{ $errors->first('animal_type_id') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> عمر الحيوان </label>
                                            <input type="text" class="form-control" required value="{{isset($order) ? $order->client->address : ''}}" id="animal_type_age" name="animal_type_age" placeholder="أضف  عمر الحيوان  ">
                                            @if($errors->has('animal_type_age'))
                                                <div class="error">{{ $errors->first('animal_type_age') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> التطعيم </label>
                                            <select name="vaccination_ids[]" id="vaccination_id" class="form-control" required multiple>
                                                <option value="">اختر تطعيم الحيوان </option>
                                                @foreach($vaccinations as $vaccination)
                                                    <option value="{{$vaccination->id}}" {{isset($order) && $order->client_id == $client->id ? 'selected' : ''}}>{{$vaccination->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('vaccination_ids'))
                                                <div class="error">{{ $errors->first('vaccination_ids') }}</div>
                                            @endif
                                        </div>
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

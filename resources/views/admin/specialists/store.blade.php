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
                        <li class="breadcrumb-item active"> أضافه متخصص  </li>
                        <li class="breadcrumb-item"><a href="{{route('specialists.index')}}">القائمه</a></li>
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
                            <h3 class="card-title"> أضافه متخصص جديد </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{isset($specialist)  ? route('specialists.update', $specialist->id) : route('specialists.store')}}">
                            @csrf
                            @if(isset($specialist))
                                @method('PUT')
                            @endif
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> اسم المتخصص </label>
                                    <input type="text" class="form-control" required value="{{isset($specialist) ? $specialist->name : ''}}" id="name" name="name" placeholder="أضف  اسم المتخصص  ">
                                    @if($errors->has('name'))
                                        <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> البريد الالكتروني </label>
                                    <input type="email" class="form-control" required value="{{isset($specialist) ? $specialist->email : ''}}" id="email" name="email" placeholder="أضف البريد الالكتروني  ">
                                    @if($errors->has('email'))
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> رقم الجوال </label>
                                    <input type="text" class="form-control" required value="{{isset($specialist) ? $specialist->phone : ''}}" id="phone" name="phone" placeholder="أضف رقم الجوال  ">
                                    @if($errors->has('phone'))
                                        <div class="error">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> كلمه المرور </label>
                                    <input type="password" class="form-control" required  id="password" name="password">
                                    @if($errors->has('password'))
                                        <div class="error">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> المدينه </label>
                                    <select name="city_id" id="city_id" class="form-control" required>
                                    <option value="">اخنر مدينه</option>
                                    @foreach($cities as $city)
                                            <option value="{{$city->id}}" {{isset($specialist) && $specialist->regions->count() && $specialist->regions->first()->city_id == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('city_id'))
                                        <div class="error">{{ $errors->first('city_id') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> المنطقه </label>
                                    <select name="region_ids[]" id="region_id" class="form-control" required multiple>
                                        <option value="">اخنر منطقه</option>
                                    @foreach($regions as $region)
                                            <option value="{{$region->id}}" {{isset($specialist) && in_array($region->id, $specialist->regions->pluck('id')->toArray()) ? 'selected' : ''}}>{{$region->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('region_ids'))
                                        <div class="error">{{ $errors->first('region_ids') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> المواعيد المتاحه </label>
                                </div>
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label> السبت </label>
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد من الساعه </label>
                                        <input type="time" class="form-control" name="from"/>
                                        @if($errors->has('from'))
                                            <div class="error">{{ $errors->first('from') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد الي الساعه </label>
                                        <input type="time" class="form-control" name="to"/>
                                        @if($errors->has('to'))
                                            <div class="error">{{ $errors->first('to') }}</div>
                                        @endif
                                    </div>
                            </div>
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label> الحد </label>
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد من الساعه </label>
                                        <input type="time" class="form-control" name="from"/>
                                        @if($errors->has('from'))
                                            <div class="error">{{ $errors->first('from') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد الي الساعه </label>
                                        <input type="time" class="form-control" name="to"/>
                                        @if($errors->has('to'))
                                            <div class="error">{{ $errors->first('to') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label> الاثنين </label>
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد من الساعه </label>
                                        <input type="time" class="form-control" name="from"/>
                                        @if($errors->has('from'))
                                            <div class="error">{{ $errors->first('from') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد الي الساعه </label>
                                        <input type="time" class="form-control" name="to"/>
                                        @if($errors->has('to'))
                                            <div class="error">{{ $errors->first('to') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label> الثلاثاء </label>
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد من الساعه </label>
                                        <input type="time" class="form-control" name="from"/>
                                        @if($errors->has('from'))
                                            <div class="error">{{ $errors->first('from') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد الي الساعه </label>
                                        <input type="time" class="form-control" name="to"/>
                                        @if($errors->has('to'))
                                            <div class="error">{{ $errors->first('to') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label> الاربعاء </label>
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد من الساعه </label>
                                        <input type="time" class="form-control" name="from"/>
                                        @if($errors->has('from'))
                                            <div class="error">{{ $errors->first('from') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد الي الساعه </label>
                                        <input type="time" class="form-control" name="to"/>
                                        @if($errors->has('to'))
                                            <div class="error">{{ $errors->first('to') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label> الخميس </label>
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد من الساعه </label>
                                        <input type="time" class="form-control" name="from"/>
                                        @if($errors->has('from'))
                                            <div class="error">{{ $errors->first('from') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد الي الساعه </label>
                                        <input type="time" class="form-control" name="to"/>
                                        @if($errors->has('to'))
                                            <div class="error">{{ $errors->first('to') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label> الجمعه </label>
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد من الساعه </label>
                                        <input type="time" class="form-control" name="from"/>
                                        @if($errors->has('from'))
                                            <div class="error">{{ $errors->first('from') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6" style="display: inline-block;width:49%">
                                        <label>موعد الي الساعه </label>
                                        <input type="time" class="form-control" name="to"/>
                                        @if($errors->has('to'))
                                            <div class="error">{{ $errors->first('to') }}</div>
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

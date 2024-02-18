@extends('layouts.app')

@section('content')
<div class="container mt-2">
    @if(session('success'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Supplier Code:</strong> <span class="asterisk_required_field"></span>
                    <input type="text" name="supplier_code" class="form-control" placeholder="Supplier Code" value="{{$suppliers->supplier_code}}" readonly>
                    
                    @error('supplier_code')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Supplier Group:</strong> <span class="asterisk_required_field"></span>
                    <input type="text" name="supplier_group" class="form-control" placeholder="Supplier Group"  value="{{$suppliers->supplier_group}}">
                    @error('supplier_group')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Company Name:</strong> <span class="asterisk_required_field"></span>
                    <input type="text" name="company_name" class="form-control" placeholder="Company Name"  value="{{$suppliers->company_name}}">
                    @error('company_name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Address 1:</strong> <span class="asterisk_required_field"></span>
                    <input type="text" name="address_1" class="form-control" placeholder="Add Address Line 1"  value="{{$suppliers['details']['address_1']}}">
                    @error('address_1')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Address 2:</strong> <span class="asterisk_required_field"></span>
                    <input type="text" name="address_2" class="form-control" placeholder="Add Address Line 2" value="{{$suppliers['details']['address_2']}}">
                    @error('address_2')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Country:</strong> <span class="asterisk_required_field"></span>
                    <!-- <input type="text" name="country" class="form-control" placeholder="Company Name"> -->
                    <select class="form-select" aria-label="Default select example" name="country" id="country">
                        <option value="">-- Select Country --</option>
                        @foreach ($country as $data)
                        <option value="{{$data->id}}" {{ $data->id == $suppliers['details']['country']? 'selected' : '' }}>
                            {{($data->name)}}
                        </option>
                        @endforeach
                    </select>
                    @error('country')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>State:</strong> <span class="asterisk_required_field"></span>
                    <select class="form-select" aria-label="Default select example" name="state" id="state">
                        <option value="">-- Select State --</option>
                        @foreach ($states as $data)
                        <option value="{{$data->id}}" {{ $data->id == $suppliers['details']['state'] ? 'selected' : '' }}>
                            {{($data->name)}}
                        </option>
                        @endforeach
                    </select>
                    @error('state')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>City:</strong> <span class="asterisk_required_field"></span>
                    <select class="form-select" aria-label="Default select example" name="city" id="city">
                        <option value="">-- Select City --</option>
                        @foreach ($cities as $data)
                        <option value="{{$data->id}}" {{ $data->id == $suppliers['details']['city'] ? 'selected' : '' }}>
                            {{($data->name)}}
                        </option>
                        @endforeach
                    </select>

                    @error('city')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Postal code:</strong> <span class="asterisk_required_field"></span>
                    <input type="text" name="postal_code" class="form-control" placeholder="Enter Postal code" value="{{$suppliers['details']['postal_code']}}">
                    @error('postal_code')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Email:</strong> <span class="asterisk_required_field"></span>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email Address" value="{{$suppliers['details']['email']}}">
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Mobile Number:</strong> <span class="asterisk_required_field"></span>
                    <input type="text" name="number" class="form-control" placeholder="Enter Mobile Number" value="{{$suppliers['details']['number']}}">
                    @error('number')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Website URL:</strong> <span class="asterisk_required_field"></span>
                    <input type="text" name="url" class="form-control" placeholder="Enter Website url" value="{{$suppliers['details']['url']}}">
                    @error('url')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Credit Period:</strong> <span class="asterisk_required_field"></span>
                    <input type="text" name="period" class="form-control" placeholder="Enter Credit Period" value="{{$suppliers['details']['period']}}">
                    @error('period')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>GST:</strong> <span class="asterisk_required_field"></span>
                    <!-- <input type="text" name="url" class="form-control" placeholder="Enter Website url"> -->
                    <div class="form-check" name=gst id="gst">
                        <label for="yes">Yes</label>
                        <input type="radio" name="gst" id="yes" value="1"{{$suppliers['details']['gst'] == '1' ? 'checked' :''}}>
                        <label for="no">No</label>
                        <input type="radio" name="gst" id="no" value="0"{{$suppliers['details']['gst'] == '0' ? 'checked' :''}}>
                    </div>
                    @error('gst')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group gst_number">
                    <strong>GST Number:</strong> <span class="asterisk_required_field"></span>
                    <input type="text" name="gst_number" id="gst_number" class="form-control" placeholder="Enter GST NUmber" value="{{$suppliers['details']['gst_number']}}">
                    @error('gst_number')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="card mt-2">
                <div class="card-header contact">
                    <div class="row">
                    <b>Conatct Person Details.....</b> 
                    <a href="#" id="show">Show</a>
                    <a href="#" id="hide" style="display:none">Hide</a>
                    </div>
                 
                </div>
                <div class="card-body supplier_contact">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-2">Saluation:</th>
                                <th class="col-md-4">Name:</th>
                                <th class="col-md-2">Designation:</th>
                                <th class="col-md-2">Department:</th>
                                <th class="col-md-3">Email:</th>
                                <th class="col-md-2">Mobile:</th>
                                <th class="col-md-3">Action:</th>
                            </tr>
                        </thead>
                        <tbody class="myTable">
                            <tr>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="saluation" id="saluation">
                                        <option value="">Select Saluation</option>
                                        <option value="Mr"{{$suppliers['contact_person']['saluation'] == 'Mr' ? 'selected' :''}}>Mr</option>
                                        <option value="Mrs" {{$suppliers['contact_person']['saluation'] == 'Mrs' ? 'selected' :''}}>Mrs</option>
                                        <option value="Miss" {{$suppliers['contact_person']['saluation'] == 'Miss' ? 'selected' :''}}>Miss</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="name_1" class="form-control" placeholder="Enter Name" value="{{$suppliers['contact_person']['name_1']}}">

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="designation" class="form-control" placeholder="Enter Designation" value="{{$suppliers['contact_person']['designation']}}">

                                    </div>

                                </td>
                                <td>

                                    <div class="form-group">
                                        <input type="text" name="department" class="form-control" placeholder="Enter Department" value="{{$suppliers['contact_person']['department']}}">

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="email_1" class="form-control" placeholder="Enter Email" value="{{$suppliers['contact_person']['email_1']}}">

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="mobile_number" class="form-control" placeholder="Enter Mobile" value="{{$suppliers['contact_person']['mobile_number']}}">

                                    </div>
                                </td>
                                <td>
                                    <!-- <button type="submit" class="btn btn-primary"> -->
                                    <!-- <i class="fa fa-plus-square" style="font-size:48px;color:red"></i> -->
                                    <a href="#" id="add" class="btn btn-primary">
                                        Add
                                    </a>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button class="btn btn-primary save">save</button>
    </form>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
   $('#country').on('change', function() {
            var idCountry = this.value;
            // alert(idCountry);
            $("#state").html('');
            $.ajax({
                url: "{{route('state')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#state').html('<option value="">-- Select State --</option>');
                    // console.log(result);
                    $.each(result, function(key, value) {

                        $("#state").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    // $('#city').html('<option value="">-- Select City --</option>');
                }
            });
        });


        $('#state').on('change', function() {
            var idState = this.value;
            $("#city").html('');
            $.ajax({
                url: "{{route('city')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#city').html('<option value="">-- Select City --</option>');
                    $.each(res, function(key, value) {
                        $("#city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
        $('#gst').on('change', function() {
            if ($('input[name="gst"]:checked').val() == 1) {
                $number = $(".gst_number").show();

            } else {
                $number = $('.gst_number').hide();
            }
        });
        $('.myTable').on('click','#add',function() {
            $('.myTable').append(' <tr>'+
                                '<td>' +
                                    '<select class="form-select" aria-label="Default select example" name="saluation" id="saluation">'+
                                    '<option value="">Select Saluation</option>'+
                                        '<option value="Mr">Mr</option>'+
                                        '<option value="Mrs">Mrs</option>'+
                                        '<option value="Miss">Miss</option>'+
                                    '</select>'+
                                '</td>'+
                                '<td>'+
                                    '<div class="form-group">'+
                                        '<input type="text" name="name_1" class="form-control" placeholder="Enter Name" >'+

                                    '</div>'+
                                '</td>'+
                                '<td>'+
                                    '<div class="form-group">'+
                                        '<input type="text" name="designation" class="form-control" placeholder="Enter Designation">'+

                                    '</div>'+

                                '</td>'+
                                '<td>'+

                                    '<div class="form-group">'+
                                       ' <input type="text" name="department" class="form-control" placeholder="Enter Department">'+

                                    '</div>'+
                                '</td>'+
                               ' <td>'+
                                    '<div class="form-group">'+
                                        '<input type="text" name="email_1" class="form-control" placeholder="Enter Email" >'+

                                    '</div>'+
                                '</td>'+
                                '<td>'+
                                    '<div class="form-group">'+
                                        '<input type="text" name="mobile_number" class="form-control" placeholder="Enter Mobile" >'+
                                    '</div>'+
                                '</td>'+
                                '<td class="text-center"><a href="#"  id="add" class="btn btn-primary mr-2">Add</a>'+
                                   '<a class="remove btn btn-danger mt-2" href="#" >Remove</a> '+
                                '</td>'+
                            '</tr>');
        });
     
        $('.myTable').on('click','.remove', function () {
            $(this).parent().parent().remove();
        });
        $('.contact').on('click','#hide', function()
        {
           $('.supplier_contact').show();
           $('#show').css({'display':'block'});
           $('#hide').css({'display':'none'});

        })
        $('.contact').on('click','#show', function()
        {
           $('.supplier_contact').hide();
           $('#hide').css({'display':'block'});
           $('#show').css({'display':'none'});
        })
    });
</script>
<style>
    .asterisk_required_field::after {
  content: ' *';
  color: red;
  font-size: 20px;
  margin:2px;
}
 .save{
    margin-top: 10px;
    margin-left: 95%;

 }
    input[type="radio"] {
        display: inline;
        margin-right: 8px;
    }

    input:read-only {
        background-color: silver;
    }

    .gst_number {
        display: none;
    }
    .text-center,#add{
        margin-right: 30px;
    }
</style>
@extends('renter.layout.app')

@section('main-panel')

<div class="card">
    <div class="card-header">
        Your informations
    </div>
    <div class="card-body" >
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" id="name">
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input class="form-control" type="email" id="email">
        </div>

    </div>
    <div class="card-footer d-flex justify-content-end">
        <button class="btn btn-primary" onclick="updateProfile()">Change</button>
    </div>
</div>

@endsection

@section('page-js')
    <script>
        $(function () {
            readProfile()
        })
        function readProfile(){

            $.ajax({
                processData:false,
                contentType:false,
                type:"GET",
                url:"{{ route('readProfile') }}",
                success:function(data){
                    $("#email").val(data.email)
                    $("#name").val(data.name)
                }
            })
        }
        function updateProfile() {
            data = new FormData();
            data.append('name',$("#name").val())
            data.append('email',$("#email").val())
            $.ajax({
                processData:false,
                contentType:false,
                data:data,
                type:"POST",
                url:"{{ route('changeProfile') }}",
                success:function(data){
                    alert("Updated succesfully")
                    readProfile();
                }
            })
        }
    </script>
@endsection

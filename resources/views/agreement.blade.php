@extends('layout.app')

@section('body')
    <div class="row align-items-center m-0" style="height: 100vh">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <p>Apartment : {{$confirmed->apartment->flat_name}}, {{$confirmed->apartment->flat_no}}, {{$confirmed->apartment->address}}, {{$confirmed->apartment->zone}}, {{$confirmed->apartment->district}}</p>
                    <p>Advance Payment : {{$confirmed->advance_payment}} Tk</p>
                    <p>Owner Information : {{$confirmed->owner->name}}, {{$confirmed->owner->phone}}</p>
                    <p>Renter Information : {{$confirmed->renter->name}}, {{$confirmed->renter->phone}}</p>
                    <p>Assigned at : {{ $confirmed->created_at->format('l jS \of F Y h:i:s A') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

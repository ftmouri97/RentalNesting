<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .page-break {
            page-break-after: always;
        }
        .bg-grey {
            background: #F3F3F3;
        }
        .text-right {
            text-align: right;
        }
        .w-full {
            width: 100%;
        }
        .small-width {
            width: 15%;
        }
        .invoice {
            background: white;
            border: 1px solid #CCC;
            font-size: 14px;
            padding: 48px;
            margin: 20px 0;
        }
    </style>
</head>
<body class="bg-grey">

  <div class="container container-smaller">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1" style="margin-top:20px; text-align: right">
        <div class="btn-group mb-4">
          <a href="../../agreement/{{$confirmed->id}}" class="btn btn-success">Downlaod as PDF</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
          <div class="invoice">
            <div class="row">
              <div class="col-sm-6">
                <h4>From:</h4>
                <address>
                <strong>{{$confirmed->owner->name}}</strong>


                </address>
              </div>

              <div class="col-sm-6 text-right">
                <img src="{{ asset('assets') }}/frontend/logo1.png" height="100px" width="100px" alt="logo">
              </div>
            </div>

            <div class="row">

              <div class="col-sm-7">
                <h4>To:</h4>
                <address>
                <strong>{{$confirmed->renter->name}}</strong>
                </address>
              </div>

              <div class="col-sm-5 text-right">
                <table class="w-full">
                  <tbody>
                  <tr>
                      <th>Apartment Address</th>
                      <td> {{$confirmed->apartment->address}}, {{$confirmed->apartment->zone}}, {{$confirmed->apartment->district}}</td>
                    </tr>
                    <tr>
                      <th>Flat Name:</th>
                      <td>{{$confirmed->apartment->flat_name}}</td>
                    </tr>
                    <tr>
                      <th> Date: </th>
                      <td>{{$confirmed->date}}</td>
                    </tr>
                  </tbody>
                </table>

                <div style="margin-bottom: 0px">&nbsp;</div>




              </div>
            </div>

            <div class="table-responsive">
              <table class="table invoice-table">
                <thead style="background: #F5F5F5;">
                  <tr>
                    <th>Item List</th>
                    <th></th>
                    <th class="text-right">Price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <p>Advance Payment</p>
                    </td>
                    <td></td>
                    <td class="text-right">{{$confirmed->advance_payment}}</td>
                  </tr>

                  <tr>
                    <td>
                        <p>Running Month Rent</p>
                    </td>
                    <td></td>
                    <td class="text-right">{{$confirmed->apartment->apartment_rent}}</td>
                  </tr>

                  </tbody>
                </table>
              </div><!-- /table-responsive -->

              <table class="table invoice-total">
                <tbody>
                  <tr>
                    <td class="text-right"><strong>Total :</strong></td>
                    <td class="text-right small-width">{{$confirmed->total}}</td>
                  </tr>
                </tbody>
              </table>

              <hr>
            </div>
        </div>
      </div>
    </div>

  </body>
</html>

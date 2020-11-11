@extends('layouts.admin')
@section('styles')
    <style>
        #header{
            padding-top:20px;
        }

        .white{
            background-color: white;
            color:'#fff';
            color: white;
        }

        .padding{
            padding: 20px;
        }
        .black{
            color: black;
        }
        .ul{
            list-style-type: none;
        }

        .success{
            color: green;
        }

        .red{
            color: red;
        }
    </style>
@endsection
@section('content')



{{--  start  --}}

<div class="container">
<center class="padding">
        <h4 id="header">Upload the status to download it from vendors</h4>

        <h2 id="msg"></h2>
    </center>

    <div class="padding white">
        
            <form action="{{ route('admin-order-update-post', $data->id) }}" id="fileUpdate" class="row" method="POST" enctype="multipart/form-data">
               <input value="{{ csrf_token() }}" name="_token" style="display: none"/>
                <div class="col-md-6">
                    <h6>Invoice update</h6>
                   
                    @if ($data->pdf_one !== null)
                    <br/>

                      <a class="button padding" target="_blank" href="{{ url('/assets/pdf/'.$data->pdf_one) }}">Show the previous File</a>

                      @endif
                    <div class="form-group">
                        <label for="invoice">Invoice</label>
                        <input name="data-one" type="file" accept="application/pdf" class="form-control-file black" name="invoice" id="invoice" placeholder="Invoice" aria-describedby="fileHelpId">
                        <small id="fileHelpId" class="form-text text-muted sr-only">invoice</small>
                      </div>

                      


                </div>
                <div class="col-md-6">
                    <h6>Updating file</h6>

                    @if ($data->pdf_two !== null)
                    <br/>

                    <a target="_blank" class="button padding" href="{{ url('/assets/pdf/'.$data->pdf_two) }}">Show the previous file</a>
                    @endif
                    
                    <div class="form-group">
                        
                      <label for="update-file">Update file</label>
                      <input name="data-two" type="file" accept="application/pdf" class="form-control-file black" name="update-file" id="update-file" placeholder="update-file" aria-describedby="update-file">
                      <small id="update-file" class="form-text text-muted sr-only">update-file</small>
                    </div>
                    
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                    <button type="submit" name="update" id="update" class="btn btn-success btn-lg btn-block">Update</button>
                </div>
            </form>

    </div>


    <div class="padding container-fluid white">
        <h4>Order Details</h4>
        <div class="container">
            <ul class="ul">
              @foreach (JSON_decode($data) as $key => $value)
              @if ($key != 'cart')
                  <li class="black"><b>{{ $key }} : </b> {{ $value }}</li>
              @endif
              @endforeach
            </ul>
        </div>
    </div>

</div>

{{--  end  --}}




@endsection


@section('scripts')
    <script>
        document.getElementById("fileUpdate").addEventListener("submit", async function(e){
            e.preventDefault();
            var myForm = document.getElementById('fileUpdate');
            var a = new FormData(myForm);
            var b = await fetch("{{ route('admin-order-update-post', $data->id) }}", {method:'POST', body:a});
            var c = await b.status == 200 ? await b.json() : {status : 0, message : 'Something error happen'};
            if(c.status == 1){
                console.log("success");
                $.notify(c.message, "success");
                setTimeout(function(){
                window.location.href = "{{ route('admin-order-index') }}";
                }, 1500);
            }else{
                $.notify(c.message, "error");
            }
        });
    </script>
@endsection
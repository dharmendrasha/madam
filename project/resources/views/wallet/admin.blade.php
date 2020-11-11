@extends('layouts.admin')
@section('styles')
    
@endsection

@section('content')
   <div class="container" style="padding: 2%;">
       <center><h4>Wallet Settings</h4></center>
       <form action="{{ route('wallet.update') }}" method="POST" id="wallet_upadate" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group">
          <label for="amount" class="sr-only">Initial amount for new login</label>
          <input type="number" class="form-control" name="amount" value="{{ \App\Models\Generalsetting::All()[0]->wallet_amount }}" id="amount" aria-describedby="initial" placeholder="Initial amount for login in currency">
          <small id="initial" class="form-text text-muted">Initial amount for login</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   </div>   
@endsection

@section('scripts')
    <script>
        document.getElementById('wallet_upadate').addEventListener('submit', async function(e){
            e.preventDefault();
            const data = new FormData(this);
            const a = await fetch("{{ route('wallet.update') }}", {method:'POST', body:data});
            const b = await a.status == 200 ? await a.json() : {};
            console.log(b);
            if(b.status == 0){
            $.notify(b.message, 'error');
            }else{
            $.notify(b.message, 'success');

            }
        })
    </script>
@endsection
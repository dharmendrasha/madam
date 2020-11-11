@extends('layouts.front')
@section('content')

<section class="user-dashbord">
    <div class="container">
      <div class="row">
        @include('includes.user-dashboard-sidebar')
                <div class="col-lg-8">
                    <div class="user-profile-details">
                        <div class="account-info">
                            <div class="header-area">
                                <h4 class="title">
                                    {{ __('Wallet') }}
                                </h4>
                            </div>
                            <div class="edit-info-area">
                                
                                <div class="body">
                                        <div class="edit-info-area-form">
                                                <div class="gocover" style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                                                <h4>Wallet Amount : {{ \Auth::user()->wallet }}</h4>
                                            <hr/>
                                            <form method="post" id="add_wallet" action="{{route('user-wallet-update')}}">
                                                {{csrf_field()}}
                                                <input class="form-control" name="update_wallet" type="number" placeholder="add amount" name="addWalletAmount" value="" />
                                                <br/>
                                                <button type="submit" class="btn btn-success">Success</button>
                                            </form>
                                            </div>


{{--                                    model start--}}
                                    <div class="modal" id="add_amount_model" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add amount via</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
{{--                                                    @include('load.payment')--}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{--                                    mmodel ends--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
      </div>
    </div>
  </section>

@endsection

@section('scripts')
    <script>
        const form = document.getElementById('add_wallet');
        form.addEventListener('submit', async function (e){
            e.preventDefault();
            toastr.info("Checking...");
            const data = new FormData(this);
            const post = await fetch("{{route('user-wallet-update')}}", {method:'POST', body:data});
            const resp = await post.status == 200 ? await post.json() : {};
            toastr.remove();
            if(resp.status == 0){
                toastr.error(resp.message);
            }else{
                toastr.success(resp.message);
                // $('#add_amount_model').modal('show')
            }
        })
    </script>
@endsection
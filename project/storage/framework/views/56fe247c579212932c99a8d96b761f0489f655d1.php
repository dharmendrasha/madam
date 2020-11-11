
<?php $__env->startSection('styles'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <div class="container" style="padding: 2%;">
       <center><h4>Wallet Settings</h4></center>
       <form action="<?php echo e(route('wallet.update')); ?>" method="POST" id="wallet_upadate" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
        <div class="form-group">
          <label for="amount" class="sr-only">Initial amount for new login</label>
          <input type="number" class="form-control" name="amount" value="<?php echo e(\App\Models\Generalsetting::All()[0]->wallet_amount); ?>" id="amount" aria-describedby="initial" placeholder="Initial amount for login in currency">
          <small id="initial" class="form-text text-muted">Initial amount for login</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   </div>   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        document.getElementById('wallet_upadate').addEventListener('submit', async function(e){
            e.preventDefault();
            const data = new FormData(this);
            const a = await fetch("<?php echo e(route('wallet.update')); ?>", {method:'POST', body:data});
            const b = await a.status == 200 ? await a.json() : {};
            console.log(b);
            if(b.status == 0){
            $.notify(b.message, 'error');
            }else{
            $.notify(b.message, 'success');

            }
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
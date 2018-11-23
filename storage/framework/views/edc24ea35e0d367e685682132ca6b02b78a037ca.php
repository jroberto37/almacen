<?php $__env->startSection('title', 'Almacen'); ?>

<?php $__env->startSection('css'); ?>
	<link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu_principal'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('cont_principal'); ?>

    <form class="form-signin text-center" action="/valuser" method="POST">
    	<?php echo csrf_field(); ?>
      <img class="mb-4" src="<?php echo e(asset('svg/php.svg')); ?>" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="email" class="sr-only">Email address</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="pass" class="sr-only">Password</label>
      <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" >Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>


	<?php if($errors->any()): ?>
	    <div class="alert alert-danger">
	        <ul>
	            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <li><?php echo e($error); ?></li>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </ul>
	    </div>
	<?php endif; ?>  

<?php $__env->stopSection(); ?>

  	
    	

<?php echo $__env->make('layouts.almacen', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title' , 'hompage'); ?>
<?php $__env->startSection('content'); ?>
<h1>My Blog</h1> 
<!-- <?php dump($post); ?> -->
<?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<article>
<h2><?php echo e($posts->title); ?></h2>
<p>
<?php echo e($posts->content); ?>

</p>
<p>
    <a href="<?php echo e(route('blog.show',['slug' => $posts->slug , 'id' => $posts->id])); ?>" class="btn btn-primary">More details</a>
</p>
</article>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo e($post->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\_Solicoders\lab-crud-laravel-autoFormation\lab-crud-laravel-basic-Validate-Data\resources\views/blog/index.blade.php ENDPATH**/ ?>
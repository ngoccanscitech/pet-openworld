<?php $__env->startSection('seo'); ?>
<?php

$data_seo = array(
    'title' => $title_head,
);
$seo = WebService::getSEO($data_seo);
?>
<?php echo $__env->make('admin.partials.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 justify-content-end">
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active"><?php echo e($title_head); ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  	<div class="container-fluid">
	    <div class="row">
	      	<div class="col-12">
	        	<div class="card">
		          	<div class="card-header">
		            	<h3 class="card-title"><?php echo e($title_head); ?></h3>
		          	</div> <!-- /.card-header -->
		          	<div class="card-body">
                        <div class="clear">
                            <ul class="nav fl">
                                <li class="nav-item">
                                    <a class="btn btn-danger" onclick="delete_id('document')" href="javascript:void(0)"><i class="fas fa-trash"></i> Delete</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="<?php echo e($url_create); ?>" style="margin-left: 6px;"><i class="fas fa-plus"></i> Add New</a>
                                </li>
                            </ul>
                            <div class="fr">
                                <form method="GET" action="" id="frm-filter-post" class="form-inline">
                                    <input type="text" class="form-control" name="search_title" id="search_title" placeholder="T??? kho??" value="<?php echo e(request('search_title')); ?>">
                                    <button type="submit" class="btn btn-primary ml-2">T??m ki???m</button>
                                </form>
                            </div>
                        </div>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table_index">
                                <thead>
                                    <tr>
                                        <th scope="col"><input type="checkbox" id="selectall" onclick="select_all()"></th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Thumbnail</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><input type="checkbox" id="<?php echo e($data->id); ?>" name="seq_list[]" value="<?php echo e($data->id); ?>"></td>
                                        <td class="">
                                            <a class="row-title" href="<?php echo e(route('admin.document_edit', $data->id)); ?>">
                                                <b><?php echo e($data->name); ?></b>
                                                <br>
                                                <b style="color:#c76805;"><?php echo e($data->slug); ?></b>                                
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <?php if($data->image != ''): ?>
                                                <img src="<?php echo e(asset($data->image)); ?>" style="height: 50px;">
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo e($data->created_at); ?>

                                            <br>
                                            <?php if($data->status == 0): ?>
                                            <span class="badge badge-warning">Draft</span>
                                            <?php else: ?>
                                            <span class="badge badge-success">Public</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="fr">
                            <?php echo $posts->links(); ?>

                        </div>
		        	</div> <!-- /.card-body -->
	      		</div><!-- /.card -->
	    	</div> <!-- /.col -->
	  	</div> <!-- /.row -->
  	</div> <!-- /.container-fluid -->
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/admin/document/index.blade.php ENDPATH**/ ?>
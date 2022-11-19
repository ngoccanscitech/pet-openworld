<?php $__env->startSection('seo'); ?>
<?php
$data_seo = array(
    'title' => 'List User | '.Helpers::get_option_minhnn('seo-title-add'),
    'keywords' => Helpers::get_option_minhnn('seo-keywords-add'),
    'description' => Helpers::get_option_minhnn('seo-description-add'),
    'og_title' => 'List User | '.Helpers::get_option_minhnn('seo-title-add'),
    'og_description' => Helpers::get_option_minhnn('seo-description-add'),
    'og_url' => Request::url(),
    'og_img' => asset('images/logo_seo.png'),
    'current_url' =>Request::url(),
    'current_url_amp' => ''
);
$seo = WebService::getSEO($data_seo);


?>
<?php echo $__env->make('admin.partials.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">List Users</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item active">List Users</li>
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
		            	<h3 class="card-title">List Users</h3>
		          	</div> <!-- /.card-header -->
		          	<div class="card-body">
                        <table class="table table-bordered" id="table_index">
                            <thead>
                                <tr>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(route('admin.userDetail', $user->id)); ?>" title=""><?php echo e($user->fullname); ?></a>
                                        <span class="badge badge-primary"><?php echo e($user->expert==1?'Tác giả':''); ?></span>
                                    </td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td class="text-center">
                                        <?php if($user->avatar): ?>
                                        <img src="<?php echo e(asset($user->avatar)); ?>" alt="" height="70" style="height: 70px;">
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($user->status == 0): ?>
                                        <span class="badge badge-danger">Ngưng hoạt động</span>
                                        <?php else: ?>
                                        <span class="badge badge-success">Hoạt động</span>
                                        <?php endif; ?>
                                        <br>
                                        <?php echo $user->created_at; ?>

                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.userDetail', $user->id)); ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-pen"></i> Edit</a><a href="" title=""></a>
                                        <a href="<?php echo e(route('admin.delUser', $user->id)); ?>" class="btn btn-outline-danger btn-sm btn_deletes"><i class="fa fa-trash"></i> Remove</a><a href="" title=""></a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
		        	</div> <!-- /.card-body -->
	      		</div><!-- /.card -->
	    	</div> <!-- /.col -->
	  	</div> <!-- /.row -->
  	</div> <!-- /.container-fluid -->
</section>
<script type="text/javascript">
    jQuery(document).ready(function ($){
        $('#deleteBtn').click(function() {
            if(confirm('Bạn có chắc muốn xóa tài khoản này?')){
                return true;
            }
            return false;
        });

        $('#table_index').DataTable();
        $('#table_index tbody').on('click', 'tr', function () {
            var data = table.row( this ).data();
            alert( 'You clicked on '+data[0]+'\'s row' );
        } );
        
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/admin/users/index.blade.php ENDPATH**/ ?>
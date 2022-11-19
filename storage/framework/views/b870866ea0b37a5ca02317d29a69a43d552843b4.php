<?php
    if(isset($post)){
        extract($post->toArray());
        if($gallery)
            $gallery = unserialize($gallery);
    }

    $user_id  = $user_id??0;
?>
<?php $__env->startSection('seo'); ?>
<?php
$data_seo = array(
    'title' => $title_head
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
      </div><!-- /.col -->
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
        <form action="<?php echo e($url_action); ?>" method="POST" id="frm-create-post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($id?? 0); ?>">
    	    <div class="row">
    	      	<div class="col-9">
    	        	<div class="card">
    		          	<div class="card-header">
    		            	<h4><?php echo e($title_head); ?></h4>
    		          	</div> <!-- /.card-header -->
    		          	<div class="card-body">
                            <!-- show error form -->
                            <div class="errorTxt"></div>
                            <ul class="nav nav-tabs hidden" id="tabLang" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="vi-tab" data-toggle="tab" href="#vi" role="tab" aria-controls="vi" aria-selected="true">Tiếng việt</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="false">Tiếng Anh</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="vi" role="tabpanel" aria-labelledby="vi-tab">
                                    <div class="form-group">
                                        <label for="name">Tiêu đề</label>
                                        <input type="text" class="form-control title_slugify" id="name" name="name" placeholder="Tiêu đề" value="<?php echo e($name ?? ''); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control slug_slugify" id="slug" name="slug" placeholder="Slug" value="<?php echo e($slug ?? ''); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Trích dẫn</label>
                                        <textarea id="description" name="description"><?php echo $description ?? ''; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Nội dung</label>
                                        <textarea id="content" name="content"><?php echo $content ?? ''; ?></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                                    <div class="form-group">
                                        <label for="name_en">Title</label>
                                        <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Title" value="<?php echo e($name_en ?? ''); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en">Description</label>
                                        <textarea id="description_en" name="description_en"><?php echo $description_en?? ''; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content_en">Content</label>
                                        <textarea id="content_en" name="content_en"><?php echo $content_en??''; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="author" class="title_txt">Tác giả</label>
                                <!-- <input type="text" name="author" id="author" value="<?php echo e($author ?? ''); ?>" class="form-control"> -->
                                <?php
                                    $users = \App\User::where('expert', 1)->get();
                                ?>
                                <?php if($users->count()): ?>
                                    <select name="user_id" class="form-control">
                                        <option>--- Chọn tác giả ---</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>" <?php echo e($user_id == $item->id ? 'selected' : ''); ?>><?php echo e($item->fullname); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="price" class="title_txt">Giá tải</label>
                                        <input type="text" name="price" id="price" value="<?php echo e(number_format($price ?? 0)); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="promotion" class="title_txt">Giá khuyến mãi</label>
                                        <input type="number" name="promotion" id="promotion" value="<?php echo e(number_format($promotion ?? 0)); ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sort" class="title_txt">Sắp xếp (Tăng dần)</label>
                                <input type="text" name="sort" id="sort" value="<?php echo e($sort ?? 0); ?>" class="form-control">
                            </div>
                            <!--SEO-->
                            
    		        	</div> <!-- /.card-body -->
    	      		</div><!-- /.card -->

                    <?php echo $__env->make('admin.partials.image', ['no_thumb'=> 1,'title'=>'File tài liệu', 'id'=>'file_view', 'name'=>'file', 'image'=> ($file ?? '')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="card">
                        <div class="card-header">Gallery</div> <!-- /.card-header -->
                        <div class="card-body">
                            <!--********************************************Gallery**************************************************-->
                            <!--Post Gallery-->
                            <div class="form-group">
                                <?php echo $__env->make('admin.partials.galleries', ['gallery_images'=> $gallery ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <!--End Post Gallery-->
                        </div>
                    </div>

                    <?php echo $__env->make('admin.form-seo.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    	    	</div> <!-- /.col-9 -->
                <div class="col-3">
                    <?php echo $__env->make('admin.partials.action_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('admin.partials.image', ['title'=>'Hình ảnh', 'id'=>'img', 'name'=>'image', 'image'=> ($image ?? '')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.partials.image', ['title'=>'Hình ảnh Banner', 'id'=>'cover-img', 'name'=>'cover', 'image'=> ($cover ?? '')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div> <!-- /.col-9 -->
    	  	</div> <!-- /.row -->
        </form>
  	</div> <!-- /.container-fluid -->
</section>
<script type="text/javascript">
    jQuery(document).ready(function ($){
        // $('.slug_slugify').slugify('.title_slugify');

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD hh:mm:ss'
        });

        editorQuote('description');
        editorQuote('description_en');
        editor('content');
        editor('content_en');

        $('#thumbnail_file').change(function(evt) {
            $("#thumbnail_file_link").val($(this).val());
            $("#thumbnail_file_link").attr("value",$(this).val());
        });
        
        //xử lý validate
        $("#frm-create-post").validate({
            rules: {
                name: "required",
                'category[]': { required: true, minlength: 1 }
            },
            messages: {
                name: "Nhập tiêu đề tin",
                'category[]': "Chọn thể loại tin",
            },
            errorElement : 'div',
            errorLabelContainer: '.errorTxt',
            invalidHandler: function(event, validator) {
                $('html, body').animate({
                    scrollTop: 0
                }, 500);
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/admin/document/single.blade.php ENDPATH**/ ?>
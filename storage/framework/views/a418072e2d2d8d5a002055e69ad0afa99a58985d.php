<?php
if (app()->isLocale('vi')) {
    $variablesGroup = App\Model\Variable::pluck('name', 'id')->all();
} else {
    $variablesGroup = App\Model\Variable::pluck('name_en', 'id')->all();
}

$provinces = \App\Model\LocationProvince::get();
?>

<?php $__env->startSection('seo'); ?>
    <?php
    $title = 'Thông tin thành viên';
    $data_seo = [
        'title' => $title . ' | ' . Helpers::get_option_minhnn('seo-title-add'),
        'keywords' => Helpers::get_option_minhnn('seo-keywords-add'),
        'description' => Helpers::get_option_minhnn('seo-description-add'),
        'og_title' => $title . ' | ' . Helpers::get_option_minhnn('seo-title-add'),
        'og_description' => Helpers::get_option_minhnn('seo-description-add'),
        'og_url' => Request::url(),
        'og_img' => asset('images/logo_seo.png'),
        'current_url' => Request::url(),
        'current_url_amp' => '',
    ];
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
                        <li class="breadcrumb-item active"><?php echo e($title); ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="<?php echo e(route('admin.postUserDetail')); ?>" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($user->id ?? 0); ?>">
                <div class="row">
                    <div class="col-9">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo e($title); ?></h4>
                            </div> <!-- /.card-header -->
                            <div class="card-body">
                                <!-- show error form -->
                                <div class="errorTxt"></div>
                                <?php if(count($errors)>0): ?>
                                    <div class="alert-tb alert alert-danger">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <i class="fa fa-exclamation-circle"></i> <?php echo e($err); ?><br/>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group col-lg-12 mb-3">
                                    <input type="checkbox" name="expert" id="expert" value="1" <?php echo e($user->expert == 1?'checked':''); ?>>
                                  <label for="expert">Người dùng là tác giả</label>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 mb-3">
                                      <label class="mb-2">Tài khoản</label>
                                      <input type="text" class="form-control" name="wallet" value="<?php echo e($user->wallet??0); ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                      <label class="mb-2">Họ và tên</label>
                                      <input type="text" class="form-control" name="fullname" value="<?php echo e($user->fullname); ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                      <label class="mb-2">Email</label>
                                      <input type="text" class="form-control" name="email" value="<?php echo e($user->email); ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                      <label class="mb-2">Điện thoại</label>
                                      <input type="text" class="form-control" name="phone" value="<?php echo e($user->phone); ?>">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                      <label class="mb-2">Slogan</label>
                                      <input type="text" class="form-control" name="slogan" value="<?php echo e($user->slogan); ?>">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                      <label class="mb-2">Giới thiệu</label>
                                      <textarea name="about_me" class="form-control" rows="5"><?php echo $user->about_me??''; ?></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                      <label class="mb-2">Địa chỉ</label>
                                      <input type="text" class="form-control" name="address" value="<?php echo e($user->address); ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 required">
                                        <label for="state_province" class="mb-2">Tỉnh/thành <span class="required-f">*</span></label>
                                        <select name="state" id="state_province" class="form-control">
                                            <option value=""> --- Please Select --- </option>
                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($province->id); ?>" <?php echo e($province->id == $user->province ? 'selected' : ''); ?>><?php echo e($province->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <?php if(isset($user)): ?>
                                <div class="form-group">
                                    <label for="check_pass">Đổi mật khẩu?</label>
                                    <input type="checkbox" name="check_pass" id="check_pass" value="1">
                                </div>
                                <?php endif; ?>
                                <div class="wrap-pass" <?php echo e(!isset($user) ? 'style=display:block' : ''); ?>>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input type="password" class="form-control" id="password" name="password" autocomplete="off" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="repassword">Xác nhận mật khẩu</label>
                                        <input type="password" class="form-control" id="repassword" name="password_confirmation" autocomplete="off" value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 text-center">
                                        <?php if($user->avatar): ?>
                                        <img src="<?php echo e(asset($user->avatar)); ?>" width="100">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('assets/images/placeholder.png')); ?>" width="100">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-8 mb-5">
                                      <h6>Upload avatar</h6>
                                      <p>Your avatar uploads in a square ratio, up to 500px x 500px</p>
                                      <div class="input-group file-upload">
                                        <input type="file" name="avatar_upload" class="form-control" id="customFile">
                                        <label class="input-group-text" for="customFile">Choose file</label>
                                      </div>
                                    </div>

                                    <!-- <div class="form-group col-md-12 mb-3 text-center">
                                      <button type="submit" class="btn btn-primary">Update</button>
                                    </div> -->
                                  </div>
                                
                            </div> <!-- /.card-body -->
                        </div><!-- /.card -->        
                    </div>

                    <div class="col-3">
                        <div class="card">
                        <div class="card-header">
                            <h5>Publish</h5>
                        </div> <!-- /.card-header -->
                        <div class="card-body">
                        <div class="form-group clearfix">
                            <label class="mb-2">Trạng thái hoạt động:</label>
                            <br>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioDraft" name="status" value="0" <?php echo e($user->status == 0 ? 'checked' : ''); ?>>
                                <label for="radioDraft">Ngưng hoạt động</label>
                            </div>
                            <div class="icheck-primary d-inline" style="margin-left: 15px;">
                                <input type="radio" id="radioPublic" name="status" value="1" <?php echo e($user->status == 1 ? 'checked' : ''); ?> >
                                <label for="radioPublic">Hoạt động</label>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group text-right">
                            <button type="submit" name="submit" value="save" class="btn btn-info btn-sm">Save</button>
                            <button type="submit" name="submit" value="apply" class="btn btn-success btn-sm">Save & Edit</button>
                        </div>
                        </div>
                        </div>
                   </div> <!-- /.col-9 -->

                </div>
                
            </form>

        </div> <!-- /.container-fluid -->
    </section>
    <script type="text/javascript">
    jQuery(document).ready(function ($){
        //check change pass
        $('input[name="check_pass"]').click(function() {
            $('.wrap-pass').toggleClass('avtive-wpap-pass');
        });
    });
    editorQuote('about_me');
</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('style'); ?>
<style>
    .wrap-pass{
        display: none;
    }
    .avtive-wpap-pass{
        display: block;
    }
    #frm-create-useradmin .error{
        color:#dc3545;
        font-size: 13px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\expro\Laravel\oppenworld\resources\views/admin/users/detail.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>

<?php if(isset($message)): ?>
    <div>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            Cập nhật config thành công.
        </div>
    </div>
<?php endif; ?>

<div class="tabs-container">
    <ul class="nav nav-tabs">
        <li class="<?php echo e(! ($errors->has('job_name') || isset($message)) ? 'active' : ''); ?>"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> CONFIG WEBSITE</a></li>
        <li class="<?php echo e(($errors->has('job_name')  || isset($message)) ? 'active' : ''); ?>"><a data-toggle="tab" href="#tab-2" aria-expanded="false">CRAWL JOB DETAIL</a></li>
    </ul>
    <div class="tab-content">
        <div id="tab-1" class="tab-pane <?php echo e(! ($errors->has('job_name') || isset($message)) ? 'active' : ''); ?>">
            <div class="panel-body">
               ...
            </div>
        </div>
        <div id="tab-2" class="tab-pane <?php echo e(($errors->has('job_name') || isset($message)) ? 'active' : ''); ?>">
        <form action="<?php echo e(url('job-config/'.request()->route()->parameters['id'])); ?>" method="post">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-sm btn-primary pull-left" data-toggle="modal" data-target="#myModal"><i class="fa fa-support"></i> Gợi ý</button>
                        <div class="pull-right">
                            <button type="button" class="btn btn-w-m btn-info "> <i class="fa fa-cogs"></i> Crawl test</button>
                            <button type="submit" class="btn btn-w-m btn-primary "><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-sm-6 m-b-xs">
                        <!--khoi nhap lieu 1-->
                        <div class="form-group">
                            <label>Tiêu đề - Tên job</label>
                            <input type="text" name="job_name" value="<?php echo e(isset($jobConfig->job_name) ? $jobConfig->job_name : ''); ?>" class="form-control">
                            <?php if($errors->has('job_name')): ?>
                                <p class="text-danger pull-right">
                                    <?php echo e($errors->first('job_name')); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                        <!--khoi nhap lieu 2-->
                        <div class="form-group">
                            <label>Tên công ty</label>
                            <input type="text" name="company_name" value="<?php echo e(isset($jobConfig->company_name) ? $jobConfig->company_name : ''); ?>" class="form-control">
                        </div>

                        <!--khoi nhap lieu 3-->
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="workplace" value="<?php echo e(isset($jobConfig->workplace) ? $jobConfig->workplace : ''); ?>" class="form-control">
                        </div>


                        <!--khoi nhap lieu 4-->
                        <div class="form-group"><label>Địa chỉ công ty</label>

                            <input type="text" name="company_address" value="<?php echo e(isset($jobConfig->company_address) ? $jobConfig->company_address : ""); ?>" class="form-control"></div>


                        <!--khoi nhap lieu 5-->
                        <div class="form-group">  <label>SĐT liên lạc</label>

                            <input type="text" name="contact" value="<?php echo e(isset($jobConfig->contact) ? $jobConfig->contact : ""); ?>" class="form-control">
                        </div>

                        <!--khoi nhap lieu 6-->
                        <div class="form-group"><label>Email liên hệ</label>

                            <input type="text" name="email" value="<?php echo e(isset($jobConfig->email) ? $jobConfig->email : ""); ?>" class="form-control">
                        </div>

                        <!--khoi nhap lieu 7-->
                        <div class="form-group"> <label>Website công ty</label>

                            <input type="text" name="website" value="<?php echo e(isset($jobConfig->website) ? $jobConfig->website : ""); ?>" class="form-control">
                        </div>

                        <!--khoi nhap lieu 8-->
                        <div class="form-group"><label>Logo</label>

                            <input type="text" name="logo" value="<?php echo e(isset($jobConfig->logo) ? $jobConfig->logo : ""); ?>" class="form-control">
                        </div>

                        <!--khoi nhap lieu 9-->
                        <div class="form-group"><label>Hình ảnh</label>

                            <input type="text" name="image" value="<?php echo e(isset($jobConfig->image) ? $jobConfig->image : ""); ?>" class="form-control">
                        </div>


                    </div>
                    <div class="col-sm-6">
                        <!--khoi nhap lieu 1-->
                        <div class="form-group"><label>Ngày đăng tuyển</label>

                            <input type="text" name="job_posting_date" value="<?php echo e(isset($jobConfig->job_posting_date) ? $jobConfig->job_posting_date : ""); ?>" class="form-control">
                        </div>

                        <!--khoi nhap lieu 2-->
                        <div class="form-group"><label>Ngày hết hạn</label>

                            <input type="text" value="<?php echo e(isset($jobConfig->expiration_date) ? $jobConfig->expiration_date : ""); ?>" name="expiration_date" class="form-control">
                        </div>

                        <!--khoi nhap lieu 3-->
                        <div class="form-group"><label>Mô tả công việc</label>

                            <input type="text" value="<?php echo e(isset($jobConfig->job_description) ? $jobConfig->job_description : ""); ?>" name="job_description" class="form-control">
                        </div>

                        <!--khoi nhap lieu 4-->
                        <div class="form-group"> <label>Yêu cầu công việc</label>

                            <input type="text" value="<?php echo e(isset($jobConfig->job_requirements) ? $jobConfig->job_requirements : ""); ?>" name="job_requirements" class="form-control"></div>


                        <!--khoi nhap lieu 5-->
                        <div class="form-group"> <label>Quyền lợi được hưởng</label>

                            <input type="text" value="<?php echo e(isset($jobConfig->entitlements) ? $jobConfig->entitlements : ""); ?>" name="entitlements" class="form-control"></div>


                        <!--khoi nhap lieu 6-->
                        <div class="form-group">  <label>Kĩ năng</label>

                            <input type="text" value="<?php echo e(isset($jobConfig->skills) ? $jobConfig->skills : ""); ?>" name="skills" class="form-control"></div>


                        <!--khoi nhap lieu 7-->
                        <div class="form-group"><label>Bằng cấp, Trình độ</label>

                            <input type="text" value="<?php echo e(isset($jobConfig->degree) ? $jobConfig->degree : ""); ?>" name="degree" class="form-control"></div>


                        <!--khoi nhap lieu 8-->
                        <div class="form-group"><label>Thu nhập</label>

                            <input type="text" value="<?php echo e(isset($jobConfig->hard_salary_max) ? $jobConfig->hard_salary_max : ""); ?>" name="hard_salary_max" class="form-control">
                        </div>

                        <!--khoi nhap lieu 9-->
                        <div class="form-group">  <label>Lương cứng</label>

                            <input type="text" value="<?php echo e(isset($jobConfig->hard_salary_min) ? $jobConfig->hard_salary_min : ""); ?>" name="hard_salary_min" class="form-control">

                        </div>

                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm website</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="" method="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Website:</label>
                            <input type="text" name="website" class="form-control" id="domain-name" placeholder="Enter Website" name="email">
                            <span class="text-danger notificaiton pull-right"></span>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" id="btn-add-new-domain" class="btn btn-w-m btn-primary">
                            Thêm Website
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/datpt/Documents/crawler-app/resources/views/jobConfig/jobConfig.blade.php ENDPATH**/ ?>
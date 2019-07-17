<?php $__env->startSection('content'); ?>
    <!--take table from Dashboard V.4 -->
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Danh sách các Website dùng để crawler data </h5>
                        <div class="ibox-tools">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Thêm Website
                            </button>

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>













                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>#ID</th>
                                    <th>Tên Website</th>
                                    <th>Tình trạng</th>
                                    <th>Số jobs</th>
                                    <th>Thời gian khởi tạo</th>
                                    <th>Thời gian update</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $listUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td>
                                            <a href="<?php echo e(URL::to('job-config/'.$item->id)); ?>"><?php echo e($item->name); ?></a>
                                        </td>
                                        <td>
                                            <?php if($item->status === 1): ?>
                                                <label class="label label-success">
                                                    Đang sử dụng
                                                </label>
                                            <?php endif; ?>

                                            <?php if($item->status === 2): ?>
                                                <label class="label label-danger">
                                                    Chưa kích hoạt
                                                </label>
                                            <?php endif; ?>
                                        </td>
                                        <td> ... </td>
                                        <td><?php echo e($item->created_at); ?></td>
                                        <td><?php echo e($item->updated_at); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>

                    </div>
                    <?php echo e($listUser->links()); ?>

                </div>
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
<?php $__env->startSection('javascript-bottom'); ?>
    <script src="<?php echo e(asset('js-service/add-new-domain.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style-top'); ?>
    <style>
        .glyphicon-refresh-animate {
            -animation: spin .7s infinite linear;
            -webkit-animation: spin2 .7s infinite linear;
        }
        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg);}
            to { -webkit-transform: rotate(360deg);}
        }

        @keyframes  spin {
            from { transform: scale(1) rotate(0deg);}
            to { transform: scale(1) rotate(360deg);}
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/datpt/Documents/crawler-app/resources/views/home/home.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>

						<div class="content-area">
							<div class="add-product-content1">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area">
                        					<?php echo $__env->make('includes.admin.form-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
											<form id="geniusformdata" action="<?php echo e(route('admin-user-edit',$data->id)); ?>" method="POST" enctype="multipart/form-data">
												<?php echo e(csrf_field()); ?>


						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                                <h4 class="heading"><?php echo e(__("Customer Profile Image")); ?> *</h4>
						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <div class="img-upload">
						                            	<?php if($data->is_provider == 1): ?>
						                                <div id="image-preview" class="img-preview" style="background: url(<?php echo e($data->photo ? asset($data->photo):asset('assets/images/noimage.png')); ?>);">
						                            	<?php else: ?>
						                                <div id="image-preview" class="img-preview" style="background: url(<?php echo e($data->photo ? asset('assets/images/users/'.$data->photo):asset('assets/images/noimage.png')); ?>);">
						                                <?php endif; ?>
						                                <?php if($data->is_provider != 1): ?>
						                                    <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i><?php echo e(__("Upload Image")); ?></label>
						                                    <input type="file" name="photo" class="img-upload" id="image-upload">
						                                <?php endif; ?>
						                                  </div>
						                                  <p class="text"><?php echo e(__("Prefered Size: (600x600) or Square Sized Image")); ?></p>
						                            </div>
						                          </div>
						                        </div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading"><?php echo e(__("Name")); ?> *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="name" placeholder="<?php echo e(__("User Name")); ?>" required="" value="<?php echo e($data->name); ?>">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading"><?php echo e(__("Email")); ?> *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="email" class="input-field" name="email" placeholder="<?php echo e(__("Email Address")); ?>" value="<?php echo e($data->email); ?>" disabled="">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading"><?php echo e(__("Phone")); ?> *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="phone" placeholder="<?php echo e(__("Phone Number")); ?>" required="" value="<?php echo e($data->phone); ?>">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading"><?php echo e(__("Address")); ?> *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="address" placeholder="<?php echo e(__("Address")); ?>" required="" value="<?php echo e($data->address); ?>">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading"><?php echo e(__("City")); ?> </h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="phone" placeholder="<?php echo e(__("City")); ?>" value="<?php echo e($data->phone); ?>">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading"><?php echo e(__("Fax")); ?> </h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="fax" placeholder="<?php echo e(__("Fax")); ?>" value="<?php echo e($data->fax); ?>">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading"><?php echo e(__("Postal Code")); ?> </h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="zip" placeholder="<?php echo e(__("Postal Code")); ?>" value="<?php echo e($data->zip); ?>">
													</div>
												</div>

						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                              
						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <button class="addProductSubmit-btn" type="submit"><?php echo e(__("Save")); ?></button>
						                          </div>
						                        </div>

											</form>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.load', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
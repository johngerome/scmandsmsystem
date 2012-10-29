<div class="topcolumn">
						<div class="logo"></div>
                          
					</div>

                    <div class="clear"></div> 
                       <br />
                           <br />
                    <div class="onecolumn" >
                        <div class="header"><span><span class="ico gray administrator"></span>Profile Setting</span></div>
                        <div class="clear"></div>
                        <div class="content" >
                    <div class="boxtitle min">Profile Picture</div>
                            <form id="validation_demo" action="#"> 
                            <div  class="grid1">
                                    <div class="profileSetting" >
                                           <div class="avartar"><img src="<?php echo $this->gtemplate->theme_path() ?>images/default_large.png" width="200" height="200" alt="avatar" /></div>
                                           <div class="avartar">
                                           <input type="file" class="fileupload" />
                                           </div>
                                    </div>
                            </div>
                            <div  class="grid3">
                                    

									<div class="section ">
                                    <label> Full name<small>this field is required</small></label>   
                                    <div> 
                                    <input type="text" class="validate[required] large" name="f_required" id="f_required">
                                    </div>
                                    </div>
                                    
                                    <div class="section">
                                    <label> Login  Account  <small>this field is required</small></label>
                                    <div>
                                        <input type="text"  placeholder="Username" name="username" id="username"  class="validate[required,minSize[3],maxSize[20],] medium"  />
                                        <span class="f_help"> Username login or register. <br />Should be between 3 and not more than 20 characters.</span> 
                                    </div>
                                    <div>
                                        <input type="password" placeholder="Password" class="validate[required,minSize[3]] medium"  name="password" id="password"  />
                                    </div>
									</div>
                                    
                                    <div class="section ">
                                    <label> Email<small>this field is required</small></label>   
                                    <div> 
                                    <input type="text" class="validate[required,custom[email]]  large" name="e_required" id="e_required"/>
                                    </div>
                                    </div>
                                    
                                   
                                    <div class="section last">
                                    <div>
                                      <a class="uibutton submit_form" >submitForm</a>
                                   </div>
                                   </div>
                              
                            </div>
                            </form>
                            <div class="clear"></div>


                        </div>
                    </div>
                    <!-- // End onecolumn -->
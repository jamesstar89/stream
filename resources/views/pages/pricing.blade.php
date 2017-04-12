@extends('layouts.splash')
@section('center')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Pricing</h2>
                    <h4>Plans Terms and Conditions</h4>
                    <p style="margin-bottom:25px;">
                        NB: Plans available by Pre-order
                    </p>
                    <div class="row" style="font-size:22px;">
                        <div class="col-xs-12 col-sm-12 col-md-10">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 text-center">
                                    <span href="javascript:void(0)" class="plans-link-in-active text-muted" data-option="invite" style="display:inline-block;text-decoration:none;border-bottom:2px solid #fff;margin-bottom:5px">By Invite <span style="font-size:12px">(Future)</span></span>
                                </div>
                                <div class="col-xs-12 col-sm-4 text-center">
                                    <a href="javascript:void(0)" class="plans-link" data-option="cloud" style="display:inline-block;text-decoration:none;border-bottom:2px solid #337ab7;margin-bottom:5px">Cloud</a>
                                </div>
                                <div class="col-xs-12 col-sm-4 text-center">
                                    <a href="javascript:void(0)" class="plans-link" data-option="standalone" style="display:inline-block;text-decoration:none;border-bottom:2px solid #fff;margin-bottom:5px">Standalone</a>
                                </div>
                            </div>
                            <hr style="margin-bottom:0" />
                        </div>
                    </div>
                    <h3 class="invite" style="display:none">By Invite</h3>
                    <!--pricing tables 1-->
                    <section class="row invite" style="display:none">
                        <div class="col-xs-12 col-sm-12 col-md-10">
                            <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                    <div class="list-group">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Basic</h4>
                                        <h6>Free to get started</h6>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 100 - more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 2 - this is more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 3 GB</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 4</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Feature</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Feature</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <button class="btn btn-primary btn-lg btn-block">$0 per month Pre-order</button>
                                    </a>
                                    </div>
                            </div><!--/left-->        
                            <div class="col-sm-4 col-xs-12">
                                    <div class="list-group text-center">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Better</h4>
                                        <h6>Most popular plan</h6>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 200 - more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 2 - this is more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 5 GB</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 6</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Feature</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Feature</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <button class="btn btn-primary btn-lg btn-block">$10 per month Pre-order</button>
                                    </a>
                                    </div>
                            </div><!--/middle-->
                            <div class="col-sm-4 col-xs-12">
                                    <div class="list-group text-right">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Best</h4>
                                        <h6>For enterprise grade</h6>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 100 - more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 2 - this is more about this</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 8 GB</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Option 10</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Unlimited</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Unlimited</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <button class="btn btn-primary btn-lg btn-block">$20 per month Pre-order</button>
                                    </a>
                                    </div>
                            </div><!--/right-->
                            </div><!--/row-->
                        </div>
                    </section>   
                    <h3 class="cloud">Cloud</h3>
                    <!--pricing tables 1-->
                    <section class="row cloud">
                        <div class="col-xs-12 col-sm-12 col-md-10">
                            <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                    <div class="list-group">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Free</h4>
                                        <h6>Free to get started</h6>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">One Stream Instance</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Hosted by us</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">3 streams</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">10 posts</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">40 photos</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">3 users</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <button class="btn btn-primary btn-lg btn-block">Free per year Pre-order</button>
                                    </a>
                                    </div>
                            </div><!--/left-->        
                            <div class="col-sm-4 col-xs-12">
                                    <div class="list-group text-center">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Personal</h4>
                                        <h6>Most popular plan</h6>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">One Stream Instance</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Hosted by us</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">20 streams</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">25 posts</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">100 photos</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">5 users</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <button class="btn btn-primary btn-lg btn-block">Pre-order</button>
                                    </a>
                                    </div>
                            </div><!--/middle-->
                            <div class="col-sm-4 col-xs-12">
                                    <div class="list-group text-right">
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Business</h4>
                                        <h6>For enterprise grade</h6>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">One Stream Instance</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">Hosted by us</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">50 streams</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">100 posts</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">400 photos</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <p class="list-group-item-text">20 users</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <button class="btn btn-primary btn-lg btn-block">Pre-order</button>
                                    </a>
                                    </div>
                            </div><!--/right-->
                            </div><!--/row-->
                        </div>
                    </section>         
                    <h3 class="standalone" style="display:none">Standalone</h3>
                    <!--pricing tables 1-->
                    <section class="row standalone" style="display:none">
                        <div class="col-xs-12 col-sm-12 col-md-10">
                            <div class="row">
                                <div class="col-sm-4 col-xs-12">
                                        <div class="list-group">
                                        <a href="#" class="list-group-item active">
                                            <h4 class="list-group-item-heading">We set it up - Personal</h4>
                                            <h6>You pay us to set up</h6>
                                            <h6>Automatic feature updates</h6>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">One Stream Instance</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Hosted by us</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">25 streams</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">50 posts</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">200 photos</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">10 users</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <button class="btn btn-primary btn-lg btn-block" style="white-space: normal;">$99 per year Pre-order</button>
                                        </a>
                                        </div>
                                </div><!--/left-->        
                                <div class="col-sm-4 col-xs-12">
                                        <div class="list-group text-center">
                                        <a href="#" class="list-group-item active">
                                            <h4 class="list-group-item-heading" style="line-height:1.3">We set it up - Business*</h4>
                                            <h6>You pay us to set up</h6>
                                            <h6>Automatic feature updates</h6>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">One Stream Instance</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Hosted by us</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">55 streams</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">200 posts</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">800 photos</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">25 users</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <button class="btn btn-primary btn-lg btn-block" style="white-space: normal;">$129 per year Pre-order</button>
                                        </a>
                                        </div>
                                </div><!--/right-->
                                <div class="col-sm-4 col-xs-12">
                                        <div class="list-group text-right">
                                        <a href="#" class="list-group-item active">
                                            <h4 class="list-group-item-heading" style="line-height:1.3">You set it up - Dev Open Source</h4>
                                            <h6>At your own cost</h6>
                                            <h6>Developing according to MIT License</h6>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">One Stream Instance</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">Hosted by you</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">streams</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">posts</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">photos</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <p class="list-group-item-text">users</p>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <button class="btn btn-primary btn-lg btn-block" style="white-space: normal;">Download from GitHub</button>
                                        </a>
                                        </div>
                                </div><!--/right--> 
                            </div><!--/row-->
                        </div>
                    </section>  
                    <p>
                        * Standalone Dev Business - if you need more capacity, contact <a href="https://twitter.com/puffstream" target="_blank">@puffstream Twitter</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop
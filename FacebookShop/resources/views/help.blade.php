@extends('layout.adminDashboard')

@section('content')
    <div class="title_left">
        <h3><b>User Guide</b></h3>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><b style="color: red;">How To Use The App...</b></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <ul class="list-unstyled timeline">

                    <li>
                        <div class="block">
                            <div class="tags">
                                <a href="" class="tag">
                                    <span style="font-size: large"><b>Step 1</b></span>
                                </a>
                            </div>
                            <div class="block_content">
                                <h2 class="title" style="font-size: x-large">
                                    <a style="color:#00b3ee">Create Shop</a>
                                </h2>

                                <p class="excerpt" style="font-size: large">
                                    When you are successfully registered, you will be redirected to the Dashboard.
                                    Go to the the Shop tab and click on Create Shop. Enter the required details and
                                    create your shop.
                                </p>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="block">
                            <div class="tags">
                                <a href="" class="tag">
                                    <span style="font-size: large"><b>Step 2</b></span>
                                </a>
                            </div>
                            <div class="block_content">
                                <h2 class="title" style="font-size: x-large">
                                    <a style="color:#00b3ee">Choose Template</a>
                                </h2>

                                <p class="excerpt" style="font-size: large">
                                    Your system will be designed based on the template that
                                    you choose. You should select a template once you have created the
                                    shop.
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="tags">
                                <a href="" class="tag">
                                    <span style="font-size: large"><b>Step 3</b></span>
                                </a>
                            </div>
                            <div class="block_content">
                                <h2 class="title" style="font-size: x-large">
                                    <a style="color:#00b3ee">Enjoy adding Products / Photos</a>
                                </h2>

                                <p class="excerpt" style="font-size: large">
                                   Based on the template that you choose add products / photos.
                                </p>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="block">
                            <div class="tags">
                                <a href="" class="tag">
                                    <span style="font-size: large"><b>Step 4</b></span>
                                </a>
                            </div>
                            <div class="block_content">
                                <h2 class="title" style="font-size: x-large">
                                    <a style="color:#00b3ee">Embed with Facebook</a>
                                </h2>

                                <p class="excerpt" style="font-size: large">
                                    Before using this function you should create a Facebook Page if you don't already have one.
                                    Once you click this tab, it will ask for permission to access your Facebook Account. Once you accept
                                    it, you have to select a Facebook Page to which you want to add the tab.
                                </p>
                            </div>
                        </div>
                    </li>


                </ul>

            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><b style="color: red; font-size: large">Tabs Descriptions </b></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="col-xs-3">
                    <!-- required for floating -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#viewMyShop" data-toggle="tab"><span style="font-size: large">View My Shop</span></a>
                        </li>
                        <li><a href="#embedFacebook" data-toggle="tab"><span style="font-size: large">Embed With Facebook</span></a>
                        </li>
                        <li><a href="#account" data-toggle="tab"><span style="font-size: large">Account</span></a>
                        </li>
                        <li><a href="#shop" data-toggle="tab"><span style="font-size: large">Shop</span></a>
                        </li>
                        <li><a href="#products" data-toggle="tab"><span style="font-size: large">Products</span></a>
                        </li>
                        <li><a href="#photos" data-toggle="tab"><span style="font-size: large">Photos</span></a>
                        </li>
                        <li><a href="#templates" data-toggle="tab"><span style="font-size: large">Templates</span></a>
                        </li>
                        <li><a href="#messages" data-toggle="tab"><span style="font-size: large">Messages</span></a>
                        </li>



                    </ul>
                </div>

                <div class="col-xs-9">
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div class="tab-pane active" id="viewMyShop" style="font-size: large;">
                            <p>
                                Once you have created your shop and chosen the template, you can view your created shop
                                by clicking this tab. Modify your shop and view the changes using this tab. It will show
                                how your website will appear to the customers.
                            </p>
                        </div>

                        <div class="tab-pane active" id="embedFacebook" style="font-size: large;">
                            <p>
                                Look at Step 4 mentioned above.

                            </p>
                        </div>

                        <div class="tab-pane active" id="account" style="font-size: large;">
                            <p>
                                Account tab will let you look at your account details. You can view/update your details using the
                                My Details tab. In addition Change Password tab can be used to update your password.

                            </p>
                        </div>

                        <div class="tab-pane active" id="shop" style="font-size: large;">
                            <p>
                                You can create your shop using the Create Shop tab. Shop Details tab can be used to view/update your shop details.

                            </p>
                        </div>

                        <div class="tab-pane active" id="products" style="font-size: large;">
                            <p>
                                Categories tab is used to add categories. Note that you should select a category to add products.
                                Create categories in advance. You can remove categories too.
                                Add Product tab can be used to add products.
                                Product Details tab will show the list of all the products in your shop. You can remove the products
                                from there or can view/update additional details by clicking View More

                            </p>
                        </div>

                        <div class="tab-pane active" id="photos" style="font-size: large;">
                            <p>
                                Photos Tab will be available only if you have chosen the Photography Template. Here also
                                you need to add your categories initially. You can upload multiple photos at a time using the Upload
                                Photos tab.
                                Using the Gallery tab you  can look at the photos that you have uploaded or you can remove them.


                            </p>
                        </div>

                        <div class="tab-pane active" id="templates" style="font-size: large;">
                            <p>
                                Used to design your website. You can configure the slider images which are shown on the top of the
                                website and the text shown on top of them.
                            </p>
                        </div>

                        <div class="tab-pane active" id="messages" style="font-size: large;">
                            <p>
                                Messages tab shows the messages sent to the vendor (you) by the customers. There are two categories,
                                Read Messages and Unread Messages. Mark As Read/Unread button is used to set whether you have read them or not.

                            </p>
                        </div>

                    </div>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
@endsection
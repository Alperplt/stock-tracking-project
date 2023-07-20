<aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
            <!-- User Details -->
            <div class="side-user">
                <div class="col-sm-12 text-center p-0 clearfix">
                    <div class="d-inline-block pos-relative mr-b-10">
                        <figure class="thumb-sm mr-b-0 user--online">
                            <img src="{{asset('images/kullanıcılar/ilkerpolat.png')}}" class="rounded-circle" alt="">
                        </figure><a href="page-profile.html" class="text-muted side-user-link"><i class="feather feather-settings list-icon"></i></a>
                    </div>
                    <!-- /.d-inline-block -->
                    <div class="lh-14 mr-t-5"><a href="page-profile.html" class="hide-menu mt-3 mb-0 side-user-heading fw-500">İlker Polat</a>
                        <br><small class="hide-menu">Ziraat Mühendisi</small>
                    </div>
                </div>
                <!-- /.col-sm-12 -->
            </div>
            <!-- /.side-user -->
            <!-- Sidebar Menu -->
            <nav class="sidebar-nav">
                <ul class="nav in side-menu">
                    <li class="current-page menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon feather feather-check-square"></i> <span class="hide-menu">Stok</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="{{route('admin.stok.gindex')}}">Gruplar</a>
                            </li>
                            <li><a href="{{route('admin.stok.mindex')}}">Markalar</a>
                            </li>
                            <li><a href="{{route('admin.stok.bindex')}}">Birimler</a>
                            </li>
                            <li><a href="{{route('admin.stok.index')}}">Stok Tanımları</a>
                            </li>
                            <li><a href="{{route('admin.depohareket.dhindex')}}">Stok Hareketleri</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon feather feather-user"></i> <span class="hide-menu">Cari</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="../default/app-calender.html">Cari Tanımları</a>
                            </li>
                            <li><a href="../default/app-chat.html">Cari Hareketleri</a>
                            </li>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon feather feather-list"></i> <span class="hide-menu">Sipariş</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="../default/page-profile.html">Yeni Sipariş Kaydı</a>
                            </li>
                            <li><a href="../default/page-login.html">Sipariş Listesi</a>
                            </li>
                            <li><a href="../default/page-login2.html">Sipariş Teslim Raporu</a>
                            </li>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon feather feather-home"></i> <span class="hide-menu">Depo</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="{{route('admin.depo.index')}}">Depolar</a>
                            </li>
                            <li><a href="../default/ui-buttons.html">Depo Envanteri</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon feather feather-file"></i> <span class="hide-menu">Raporlar</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="../default/form-elements.html">Depo Bazlı Stok Raporu</a>
                            </li>
                            <li><a href="../default/form-material.html">Material Design</a>
                            </li>
                            <li><a href="../default/form-validation.html">Form Validation</a>
                            </li>
                            <li><a href="../default/form-dropzone.html">File Upload</a>
                            </li>
                            <li><a href="../default/form-pickers.html">Picker</a>
                            </li>
                            <li><a href="../default/form-select.html">Select and Multiselect</a>
                            </li>
                            <li><a href="../default/form-tags-categories.html">Tags and Categories</a>
                            </li>
                            <li><a href="../default/form-addons.html">Addons</a>
                            </li>
                            <li><a href="../default/form-editors.html">Editors</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon feather feather-settings"></i> <span class="hide-menu">Ayarlar</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="page-blank.html">Blank Page</a>
                            </li>
                            <li class="menu-item-has-children"><a href="javascript:void(0);">Email Templates</a>
                                <ul class="list-unstyled sub-menu">
                                    <li><a href="../default/email-templates/basic.html">Basic</a>
                                    </li>
                                    <li><a href="../default/email-templates/billing.html">Billing</a>
                                    </li>
                                    <li><a href="../default/email-templates/friend-request.html">Friend Request</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="javascript:void(0);">Maps</a>
                                <ul class="list-unstyled sub-menu">
                                    <li><a href="../default/maps-google.html">Google Maps</a>
                                    </li>
                                    <li><a href="../default/maps-vector.html">Vector Maps</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="../default/page-lightbox.html">Lightbox Popup</a>
                            </li>
                            <li><a href="../default/page-sitemap.html">Sitemap</a>
                            </li>
                            <li><a href="../default/page-search-results.html">Search Results</a>
                            </li>
                            <li><a href="../default/page-custom-scroll.html">Custom Scroll</a>
                            </li>
                            <li><a href="../default/page-utility-classes.html">Utility Classes</a>
                            </li>
                            <li><a href="../default/page-animations.html">Animations</a>
                            </li>
                            <li><a href="../default/page-faq.html">FAQ</a>
                            </li>
                            <li><a href="../default/page-pricing-table.html">Pricing</a>
                            </li>
                            <li><a href="../default/page-invoice.html">Invoice</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children"><a href="javascript:void(0);"><i class="list-icon feather feather-book"></i> <span class="hide-menu">Görevler</span></a>
                        <ul class="list-unstyled sub-menu">
                            <li><a href="page-blank.html">Görevler</a>
                            </li>
                            <li><a href="page-blank.html">Yeni Görev Ekle</a>
                            </li>
                            <li><a href="page-blank.html">Yaklaşan Görevler</a>
                            </li>
                            <li><a href="page-blank.html">Notlar</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <!-- /.side-menu -->
            </nav>

</aside>

<main class="main-wrapper clearfix">


<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-text mx-3"> WELLCOME ADMIN </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <!-- <a class="nav-link" href="admin/"> -->
            <a class="nav-link" href="admin/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
    <h5>Trang chủ</h5>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="admin/order">
        <i class="fas fa-fw fa-tachometer-alt"></i>
    <h5>Quản lí đơn hàng</h5>
    </a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    QUẢN LÍ SẢN PHẨM
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Category</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('category.index') }}">Danh sách sản phẩm</a>
            <a class="collapse-item" href="{{ route('category.create') }}">Thêm mới danh mục</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>ProductType</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quản lí loại sản phẩm</h6>
            <a class="collapse-item" href="{{ route('producttype.index') }}">Danh sách loại sản phẩm</a>
            <a class="collapse-item" href="{{ route('producttype.create') }}">Thêm mới loại sản phẩm</a>
        </div>
    </div>
</li>
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#product" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-pro"></i>
        <span>Product</span>
    </a>
    <div id="product" class="collapse " aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('product.index') }}">Danh sách sản phẩm</a>
            <a class="collapse-item" href="{{ route('product.create') }}">Thêm mới sản phẩm</a>
        </div>
    </div>
</li>
<hr class="sidebar-divider">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
</ul>
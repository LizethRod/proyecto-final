  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{route('start')}}">
            <i class="fa fa-home"></i> <span>Inicio</span>
          </a>
        </li>
        <li>
          <a href="{{url('users')}}">
            <i class="fa fa-users"></i> <span>Usuarios</span>
          </a>
        </li>
        <li>
          <a href="{{url('branches')}}">
            <i class="fa fa-building"></i> <span>Sucursales</span>
          </a>
        </li>
        <li>
          <a href="{{url('categorias')}}">
            <i class="fa fa-th"></i> <span>Categorias</span>
          </a>
        </li>
        <li>
          <a href="{{url('products')}}">
            <i class="fa fa-cubes"></i> <span>Productos</span>
          </a>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
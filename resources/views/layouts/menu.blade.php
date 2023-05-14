          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown   active|is_active(^index(.*), page)|safe ">
                  <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                  <ul class="dropdown-menu">
                      <li class="active"|is_active(^index-0.html, page)|safe><a class="nav-link"
                              href="index-0.html">General Dashboard</a></li>
                      <li class="active"|is_active(^index.html(.*), page)|safe><a class="nav-link"
                              href="index.html">Ecommerce Dashboard</a></li>
                  </ul>
              </li>
              <li class="menu-header">Starter</li>

              {{-- <li class=""|is_active(^blank(.*), page)|safe><a class="nav-link" href="blank.html"><i
                          class="far fa-square"></i> <span>Dashboard</span></a></li> --}}
              <li class=" {{ Request::is('product') ? 'active' : '' }}"><a class="nav-link" href="/product"><i
                          class="far fa-bell"></i> <span>Product</span></a></li>
              <li class="{{ Request::is('category') ? 'active' : '' }}"><a class="nav-link" href="/category"><i
                          class="far fa-square"></i> <span>Category Product</span></a></li>

              </li>
              <li class="menu-header">Admin</li>
              <li class="nav-item dropdown  active|is_active(^components-(.*), page)|safe ">
                  <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                      <span>Settings</span></a>
                  <ul class="dropdown-menu">
                      <li class="{{ Request::is('user') ? 'active' : '' }}"><a class="nav-link"
                              href="/user">Management User</a></li>
                  </ul>
              </li>

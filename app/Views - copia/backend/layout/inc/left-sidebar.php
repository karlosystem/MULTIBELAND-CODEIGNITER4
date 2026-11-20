  <div class="left-side-bar">
      <div class="brand-logo">
          <a href="index.html">
              <img src="/images/blog/<?= get_settings()->blog_logo ?>" class="dark-logo" />
              <img src="/images/blog/<?= get_settings()->blog_logo ?>" class="light-logo" />
          </a>
          <div class="close-sidebar" data-toggle="left-sidebar-close">
              <i class="ion-close-round"></i>
          </div>
      </div>

      <div class="menu-block customscroll">
          <div class="sidebar-menu">
              <ul id="accordion-menu">
                  <li>
                      <a href="<?= route_to('admin.home'); ?>" class="dropdown-toggle no-arrow <?= current_route_name() == 'admin.home' ? 'active' : '' ?>">
                          <span class="micon dw dw-home"></span><span class="mtext">Inicio</span>
                      </a>
                  </li>

                  <li>
                      <a href="<?= route_to('categories'); ?>" class="dropdown-toggle no-arrow <?= current_route_name() == 'categories' ? 'active' : '' ?>">
                          <span class="micon dw dw-list"></span><span class="mtext">Categorias</span>
                      </a>
                  </li>

                  <li class="dropdown">
                      <a href="javascript:;" class="dropdown-toggle">
                          <span class="micon dw dw-newspaper"></span><span class="mtext">Mensajes</span>
                      </a>
                      <ul class="submenu">
                          <li><a href="<?= route_to("all-posts") ?>" class="<?= current_route_name() == 'all-posts' ? 'active' : '' ?>">Todos los Mensajes</a></li>
                          <li><a href="<?= route_to('new-post') ?>" class="<?= current_route_name() == 'new-post' ? 'active' : '' ?>">Agregar</a></li>
                      </ul>
                  </li>

                  <li>
                      <a href="<?= route_to('banners'); ?>" class="dropdown-toggle no-arrow <?= current_route_name() == 'banners' ? 'active' : '' ?>">
                          <span class="micon dw dw-list"></span><span class="mtext">Banners</span>
                      </a>
                  </li>

                  <li>
                      <a href="<?= route_to('contactenos'); ?>" class="dropdown-toggle no-arrow <?= current_route_name() == 'contactenos' ? 'active' : '' ?>">
                          <span class="micon dw dw-list"></span><span class="mtext">Contáctenos</span>
                      </a>
                  </li>

                  <li>
                      <div class="dropdown-divider"></div>
                  </li>
                  <li>
                      <div class="sidebar-small-cap">Configuracion</div>
                  </li>

                  <li>
                      <a href="<?= route_to('admin.profile'); ?>" class="dropdown-toggle no-arrow <?= current_route_name() == 'admin.profile' ? 'active' : '' ?>">
                          <span class="micon dw dw-user"></span>
                          <span class="mtext">Perfil de Usuario</span>
                      </a>
                  </li>

                  <li>
                      <a href="<?= route_to('settings'); ?>" class="dropdown-toggle no-arrow <?= current_route_name() == 'settings' ? 'active' : '' ?>">
                          <span class="micon dw dw-settings"></span>
                          <span class="mtext">General</span>
                      </a>
                  </li>

              </ul>
          </div>
      </div>

  </div>
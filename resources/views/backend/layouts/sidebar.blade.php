<nav class="navbar navbar-vertical navbar-expand-lg">
  <script>
    var navbarStyle = window.config.config.phoenixNavbarStyle;
    if (navbarStyle && navbarStyle !== 'transparent') {
      document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
    }
  </script>
  <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <!-- scrollbar removed-->
    <div class="navbar-vertical-content">
      <ul class="navbar-nav flex-column" id="navbarVerticalNav">
        <li class="nav-item">
          <!-- label-->
          <p class="navbar-vertical-label">Mediani boshqarish
          </p>
          <hr class="navbar-vertical-line" />
           <!-- parent pages-->
           <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('file-manager')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="film"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Media menejer</span></span>
              </div>
            </a>
          </div>
           <!-- parent pages-->
           <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('banner.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="tv"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Bannerlar</span></span>
              </div>
            </a>
          </div>
           <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('gallery.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="image"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Galereya</span></span>
              </div>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <!-- label-->
          <p class="navbar-vertical-label">Do'kon
          </p>
          <hr class="navbar-vertical-line" />
        
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('category.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="align-justify"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Kategoriyalar</span></span>
              </div>
            </a>
          </div>
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('product.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="package"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Mahsulotlar</span></span>
              </div>
            </a>
          </div>
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('brand.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="airplay"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Brendlar</span></span>
              </div>
            </a>
          </div>
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('shipping.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="truck"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Yetkazib berish</span></span>
              </div>
            </a>
          </div>
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('order.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="shopping-cart"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Buyurtmalar</span></span>
              </div>
            </a>
          </div>
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('review.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="message-circle"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Sharhlar</span></span>
              </div>
            </a>
          </div>
        
        </li>
        <li class="nav-item">
          <!-- label-->
          <p class="navbar-vertical-label">Aksiyalar
          </p>
          <hr class="navbar-vertical-line" />
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('promotion.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="percent"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Aksiyalar</span></span>
              </div>
            </a>
          </div>

        </li>
        <li class="nav-item">
          <!-- label-->
          <p class="navbar-vertical-label">Vakansiyalar
          </p>
          <hr class="navbar-vertical-line" />
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('job.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="trending-up"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Bo'sh ish o'rinlari</span></span>
              </div>
            </a>
          </div>

        </li>
        <li class="nav-item">
          <!-- label-->
          <p class="navbar-vertical-label">Postlar
          </p>
          <hr class="navbar-vertical-line" />
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('post.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="twitch"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Postlar</span></span>
              </div>
            </a>
          </div>
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('post-category.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="list"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Kategoriyalar</span></span>
              </div>
            </a>
          </div>
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('post-tag.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="tag"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Teglar</span></span>
              </div>
            </a>
          </div>
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('comment.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="message-square"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Post sharhlari</span></span>
              </div>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <!-- label-->
          <p class="navbar-vertical-label">Umumiy sozlamalar
          </p>
          <hr class="navbar-vertical-line" />
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('coupon.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="shopping-bag"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Voucherlar</span></span>
              </div>
            </a>
          </div>
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('users.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="users"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Foydalanuvchilar</span></span>
              </div>
            </a>
          </div>
          <!-- parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="{{route('settings')}}" role="button" data-bs-toggle="" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="settings"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Sozlamalar</span></span>
              </div>
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="navbar-vertical-footer">
    <button class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-8"></span><span class="uil uil-arrow-from-right fs-8"></span><span class="navbar-vertical-footer-text ms-2">Yigʻilgan koʻrinish</span></button>
  </div>
</nav>
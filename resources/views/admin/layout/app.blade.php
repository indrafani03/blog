@include('admin.layout.header')
  @include('admin.layout.topbar')
      @include('admin.layout.sidebar')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
             @yield('header-section')
          </div>
            @yield('conten')
          <div class="section-body">
          </div>
        </section>
      </div>
      {{-- End Content --}}
@include('admin.layout.footer');      
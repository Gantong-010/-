<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">ระบบคัดเมล็ดพันธุ์ข้าวออนไลน์</a> <!--config เป็นส่วนที่กำหนดกับตัว app เช่นชื่อ app-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('registration')}}">Registration</a>
          </li>
        </ul>
        <span class="navbar-text">
         <a href="{{route('logout')}}">Logout</a>
        </span>
      </div>
    </div>
  </nav>
<div class="navigation">
  <ul>
    <li class='list @if(Request::is('home')) active @endif'>
      <b></b>
      <b></b>
      <a href="/home">
        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
        <span class="title">Home</span>
      </a>
    </li>
    <li class='list @if(Request::is('doctor')) active @endif'>
      <b></b>
      <b></b>
      <a href="/doctor">
        <span class="icon"><ion-icon name="medkit-outline"></ion-icon></span>
        <span class="title">Medicos</span>
      </a>
    </li>
    <li class='list @if(Request::is('patient')) active @endif'>
      <b></b>
      <b></b>
      <a href="/patient">
        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
        <span class="title">Pacientes</span>
      </a>
    </li>
    <li class='list @if(Request::is('appointment')) active @endif'>
      <b></b>
      <b></b>
      <a href="/appointment">
        <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
        <span class="title">Citas</span>
      </a>
    </li>
    <li class="list">
      <b></b>
      <b></b>
      <a href="/logout">
        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
        <span class="title">Logout</span>
      </a>
    </li>
  </ul>
</div>

<div class="toggle">
  <ion-icon name="menu-outline" class="open"></ion-icon>
  <ion-icon name="close-outline" class="close"></ion-icon>
</div>
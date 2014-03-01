<div class="head-title">
  <div class="menu-switch"><i class="fa fa-bars"></i></div>
  <!--row start-->
  <div class="row"> 
    <!--col-md-12 start-->
    <div class="col-md-12"> 
      <!--profile dropdown start-->
      <ul class="user-info pull-right">
        <li class="hidden-xs">
          <!-- <input type="text" placeholder=" Buscar" class="form-control page-search"> -->
        </li>
        <li class="profile-info dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <img class="img-circle" alt="" src="/images/avatar.jpg">{{ Auth::user()->nombre }}</a>
          <ul class="dropdown-menu">
            <li class="caret"></li>
            <!--
            <li> <a href="edit-profile.html"> <i class="fa fa-user"></i> Edit Profile </a> </li>
            <li> <a href="mail.html"> <i class="fa fa-inbox"></i> Inbox </a> </li>
            <li> <a href="fullcalendar.html"> <i class="fa fa-calendar"></i> Calendar </a> </li> -->
            <li> <a href="/logout"> <i class="fa fa-clipboard"></i> Salir </a> </li>
          </ul>
        </li>
      </ul>
      <!--profile dropdown end--> 

      <!--top nav start-->
      <ul class="nav top-menu hidden-xs notify-row">


        <!--message start-->
        <li class="dropdown" id="header_inbox_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-gift"></i> <span class="badge bg-important">{{ count($cumples) }}</span> </a>
          @if(count($cumples) > 0)
          <ul class="dropdown-menu extended inbox">
            <div class="notify-arrow notify-arrow-red"></div>
            <li>
              <p class="red">Hoy tenemos {{ count($cumples) }} cumpleañeros.</p>
            </li>
            @foreach($cumples as $cumple)
            <li> <a href="/cliente/{{$cumple->Userid}}"><span class="subject"> <span class="from">{{$cumple->Name}}</span> <span class="time">{{$cumple->anos}} años</span> </span> </a> </li>
            @endforeach
          </ul>
          @endif
        </li>
        <!--message end--> 

        <!--notification start-->
        <li class="dropdown" id="header_notification_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i> <span class="badge bg-warning">{{ count($vencidos) }}</span> </a>
          @if(count($vencidos) > 0) 
          <ul class="dropdown-menu extended notification">
            <div class="notify-arrow notify-arrow-red"></div>
            <li>
              <p class="red">Hoy se vencen {{ count($vencidos) }} clientes.</p>
            </li>
            @foreach($vencidos as $vencido)
            <li> <a href="/cliente/{{$vencido->Userid}}"><span class="subject"> <span class="from">{{$vencido->Name}}</span> <span class="time"></span> </span> </a> </li>
            @endforeach
          </ul>
          @endif
        </li>
        <!--notification end-->
      </ul>
      <!--top nav end--> 
    </div>
    <!--col-md-12 end--> 
  </div>
  <!--row end--> 
</div>
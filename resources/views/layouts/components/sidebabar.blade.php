
 @if(Auth::user()->hasRole('admin'))
 <div class="h-100" data-simplebar>
     <!--- Sidemenu -->
     <div id="sidebar-menu">

         <ul id="side-menu">

             <li class="menu-title">Menu</li>

             <li>
                 <a href="#">
                     <i data-feather="home"></i>
                     <span> Dashboard </span>
                 </a>
             </li>

             <li>
                 <a href="#">
                     <i data-feather="users"></i>
                     @php
                     $countmember = DB::table('users')->count();
                     @endphp
                     <span class="badge badge-success badge-pill float-right">{{ $countmember }}</span>
                     <span> Users </span>
                 </a>
             </li>

             <li>
                <a href="#sidebarUPTKediri" data-toggle="collapse">
                    <i data-feather="airplay"></i>
                    <span class="badge badge-success badge-pill float-right">4</span>
                    <span> UPT Kediri </span>
                </a>
                <div class="collapse" id="sidebarUPTKediri">
                    <ul class="nav-second-level">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                    </ul>
                </div>
            </li>

             <li>
                <a href="#sidebarUPTLumajang" data-toggle="collapse">
                    <i data-feather="airplay"></i>
                    <span class="badge badge-success badge-pill float-right">4</span>
                    <span> UPT Lumajang </span>
                </a>
                <div class="collapse" id="sidebarUPTLumajang">
                    <ul class="nav-second-level">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                    </ul>
                </div>
            </li>

             <li>
                <a href="#sidebarUPTBondowoso" data-toggle="collapse">
                    <i data-feather="airplay"></i>
                    <span class="badge badge-success badge-pill float-right">4</span>
                    <span> UPT Bondowoso </span>
                </a>
                <div class="collapse" id="sidebarUPTBondowoso">
                    <ul class="nav-second-level">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                    </ul>
                </div>
            </li>

             <li>
                <a href="#sidebarUPTPasuruan" data-toggle="collapse">
                    <i data-feather="airplay"></i>
                    <span class="badge badge-success badge-pill float-right">4</span>
                    <span> UPT Pasuruan </span>
                </a>
                <div class="collapse" id="sidebarUPTPasuruan">
                    <ul class="nav-second-level">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                    </ul>
                </div>
            </li>

             <li>
                <a href="#sidebarUPTbojonegoro" data-toggle="collapse">
                    <i data-feather="airplay"></i>
                    <span class="badge badge-success badge-pill float-right">4</span>
                    <span> UPT Bojonegoro </span>
                </a>
                <div class="collapse" id="sidebarUPTbojonegoro">
                    <ul class="nav-second-level">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                    </ul>
                </div>
            </li>

             <li>
                <a href="#sidebarUPTpamekasan" data-toggle="collapse">
                    <i data-feather="airplay"></i>
                    <span class="badge badge-success badge-pill float-right">4</span>
                    <span> UPT Pamekasan </span>
                </a>
                <div class="collapse" id="sidebarUPTpamekasan">
                    <ul class="nav-second-level">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                    </ul>
                </div>
            </li>

         </ul>
     </div>
     <!-- End Sidebar -->

     <div class="clearfix"></div>

 </div>
 @elseif (Auth::user()->hasRole('upt_psda_kediri')){
<div class="h-100"  data-simplebar>
    <div id="sidebar-menu">
        <ul id="side-menu">
            <li class="menu-title">Menu</li>
            <li>
                <a href="#">
                    <i data-feather="home"></i>
                    <span> Dashboard </span>
                </a>
            </li>
        </ul>
    </div>
</div>
}
 @elseif (Auth::user()->hasRole('upt_psda_lumajang')){
<div class="h-100"  data-simplebar>
    <div id="sidebar-menu">
        <ul id="side-menu">
            <li class="menu-title">Menu</li>
            <li>
                <a href="#">
                    <i data-feather="home"></i>
                    <span> Dashboard </span>
                </a>
            </li>
        </ul>
    </div>
</div>
}
 @elseif (Auth::user()->hasRole('upt_psda_bondowoso')){
<div class="h-100"  data-simplebar>
    <div id="sidebar-menu">
        <ul id="side-menu">
            <li class="menu-title">Menu</li>
            <li>
                <a href="#">
                    <i data-feather="home"></i>
                    <span> Dashboard </span>
                </a>
            </li>
        </ul>
    </div>
</div>
}
 @elseif (Auth::user()->hasRole('upt_psda_pasuruan')){
<div class="h-100"  data-simplebar>
    <div id="sidebar-menu">
        <ul id="side-menu">
            <li class="menu-title">Menu</li>
            <li>
                <a href="#">
                    <i data-feather="home"></i>
                    <span> Dashboard </span>
                </a>
            </li>
        </ul>
    </div>
</div>
}
 @elseif (Auth::user()->hasRole('upt_psda_bojonegoro')){
<div class="h-100"  data-simplebar>
    <div id="sidebar-menu">
        <ul id="side-menu">
            <li class="menu-title">Menu</li>
            <li>
                <a href="#">
                    <i data-feather="home"></i>
                    <span> Dashboard </span>
                </a>
            </li>
        </ul>
    </div>
</div>
}
 @elseif (Auth::user()->hasRole('upt_psda_pamekasan')){
<div class="h-100"  data-simplebar>
    <div id="sidebar-menu">
        <ul id="side-menu">
            <li class="menu-title">Menu</li>
            <li>
                <a href="#">
                    <i data-feather="home"></i>
                    <span> Dashboard </span>
                </a>
            </li>
        </ul>
    </div>
</div>
}
@endif





<!-- Sidebar -left -->






<div class="row pl-md-5 pt-5">
    <div class="col pl-5 pr-5">
        <ul class="nav nav-tabs d-flex justify-content-between align-items-center">
           <div class=" d-flex">
                <li class="nav-item">
                        <a class="nav-link {{Route::is('cmsInstitucional') || Route::is('cmsInstitucionalLogo') || Route::is('cmsInstitucionalLogos') || Route::is('cmsInstitucionalTelefonos') || Route::is('cmsInstitucionalSociales') || Route::is('cmsInstitucionalDirecciones')? 'active':''}}" href="{{url('admin/cms/institucional')}}">Institucional</a>
                </li>
                <li>
                        <a class="nav-link {{Route::is('cmsSecciones')   ? 'active':''}}" href="{{url('admin/cms/secciones')}}">Secciones</a>
                </li>
           </div>
           <div class="d-flex align-item-center">
                <a class="nav-link d-flex align-items-center" href="{{url('/')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg>
                </a>
            @if(Route::is('cmsInstitucionalLogos'))
                
                <a class="nav-link d-flex align-items-center" href="#" data-toggle="modal" data-target="#modalCrearLogos">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
           @elseif(Route::is('cmsInstitucionalSociales'))
                <a class="nav-link d-flex align-items-center" href="#" data-toggle="modal" data-target="#modalCrearSociales">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
           @elseif(Route::is('cmsInstitucionalDirecciones'))
                <a class="nav-link d-flex align-items-center" href="#" data-toggle="modal" data-target="#modalCrearDirecciones">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
           @elseif(Route::is('cmsInstitucionalTelefonos'))
                <a class="nav-link d-flex align-items-center" href="#" data-toggle="modal" data-target="#modalCrearTelefonos">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
           @endif
           </div>
        </ul>
    </div>
</div>
<div class="row pl-md-5">
    <div class="col pl-5 pt-2">
        @if(Route::is('cmsInstitucional') || Route::is('cmsInstitucionalLogos') || Route::is('cmsInstitucionalTelefonos') || Route::is('cmsInstitucionalSociales') || Route::is('cmsInstitucionalDirecciones'))
            <a href="{{url('admin/cms/institucional/logos')}}" class="pl-3 pr-5">Logos</a>
            <a href="{{url('admin/cms/institucional/sociales')}}" class="pr-5">Sociales</a>
            <a href="{{url('admin/cms/institucional/direcciones')}}" class="pr-5">direcciones</a>
            <a href="{{url('admin/cms/institucional/telefonos')}}" class="pr-5">Telefonos</a>

        @elseif(Route::is('cmsSecciones'))
            <a href="{{url('admin/cms/secciones')}}" class="pl-3 pr-5">Encabezado</a>
            <a href="{{url('admin/cms/secciones')}}" class="pr-5">Navegación</a>
        @endif
       
    </div>
</div>
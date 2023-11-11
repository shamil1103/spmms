 <!-- Page Header-->
 <header class="page-header">
     <div class="container-fluid">
         <h2 class="no-margin-bottom">{{ $title }} </h2>
     </div>
     <ul class="breadcrumb">
         <div class="container-fluid">
             <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
             @if (isset($menus) && count($menus))
                 @foreach ($menus as $menu)
                     <li class="breadcrumb-item @if ($loop->last) active @endif" aria-current="page">
                         @if (isset($menu['url']) && !empty($menu['url']))
                             <a href="{{ $menu['url'] }}">
                                 {{ $menu['name'] }}
                             </a>
                         @else
                             {{ $menu['name'] }}
                         @endif
                     </li>
                 @endforeach
             @endif
         </div>
     </ul>
 </header>
 <!-- Page Header-->

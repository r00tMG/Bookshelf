{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="sidebar-wrapper-docs">
        <side-bar title="Sidebar" short-title="S" background-color="orange">
             <template slot-scope="props" slot="links">
               <sidebar-link
                       :link="{
                         name: 'Dashboard',
                         icon: 'tim-icons icon-chart-pie-36',
                         path: '#',
                         isRoute: false,
                       }">
     
               </sidebar-link>
             </template>
       </side-bar>        
     </div>
    
</body>
</html>
 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Users Dashboard') }}
        </h2>
  </x-slot>

 <div class="">
        <div class="">

<?php 
$id_seg = request()->segment(3);  
$userInfo = $displayUser->where('id',$id_seg)->first();
$userPodcast = $topPodcast->where('audio_editor',$id_seg)->take(3)->get();
$userFav = $favorite->where('favs_userid',$id_seg)->get();
$userCat = $categoryList->where('category_owner',$id_seg)->get();
$userFollow = $following->where('follow_userid',$id_seg)->get();


?>            


<div class="min-h-screen bg-gray-100">
  <!--
    When the mobile menu is open, add `overflow-hidden` to the `body` element to prevent double scrollbars

    Menu open: "fixed inset-0 z-40 overflow-y-auto", Menu closed: ""
  -->
   @include('layouts.editor.header')

  <div class="py-10">

    <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
      <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
      	<!-- sidebar -->
        @include('layouts.editor.sidebar')
        <!-- sidebar -->
      </div>
      <main class="col-span-10">
        <div class="mt-4 mt-4 bg-gray-300 p-5">
          <div class="mb-5 w-full ">
             <h1 class="font-bold text-gray-800 text-xl"></h1> 
          </div> 
          <div class="grid gap-4 grid-cols-10">
            <div class="col-span-2 bg-white p-2 ">
              <article aria-labelledby="question-title-81614">
                <div class="mt-2 text-sm text-gray-700 space-y-4">
                   <div class="text-white bg-cover h-36">
                       <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                   </div>
                </div>
                <div>
                  <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">
                      <p class="text-md font-bold text-gray-900 mt-2">
                        <a href="#" class="hover:underline">{{ $userInfo->name }}</a>
                      </p>
                      <!-- <p class="text-xs text-gray-500">
                        <a class="hover:underline">
                          Followers <span class="float-right">0,000,000</span>
                        </a>
                      </p> -->
                    </div>
                   
                  </div>
                </div>

              </article>
            </div>




              </div>


        </div>








        <div class="mt-4">
          <div class="mb-5 w-full ">
             <h1 class="font-bold text-gray-800 text-xl">Top</h1> 
          </div>  
              <table class="min-w-full divide-y divide-gray-200">
                <tbody class=" divide-y divide-gray-200">
                  @foreach($userPodcast as $tops)  
                    <tr class="border-b-2">
                      <td class="w-16">
                      <img src="{{ asset('images/slider-img/slide1.jpg') }}" class="w-full"> 
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                         {{ $tops->audio_name }}
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                         {{ $tops->get_like->count()  }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        3:00
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>  
        </div>

        <div class="mt-4">
          <div class="mb-5 w-full ">
             <h1 class="font-bold text-gray-800 text-xl">Favorites</h1> 
          </div>  
              <table class="min-w-full divide-y divide-gray-200">
                <tbody class=" divide-y divide-gray-200">
                  @foreach($favorite as $favs)  
                    <tr class="border-b-2">
                      <td class="w-16">
                      <img src="{{ asset('images/slider-img/slide1.jpg') }}" class="w-full"> 
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                         {{ $favs->get_audio->audio_name }}
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{ $favs->get_audio->get_user->name }}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        3:00
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>  
        </div>

        <div class="mt-4">
          <div class="mb-5 w-full ">
          	 <h1 class="font-bold text-gray-800 text-xl">Popular Category</h1> 
          </div>	
         

          	<div class="grid gap-4 grid-cols-10">
          		
          	@foreach($userCat as $cat)

     


            <div class="col-span-2 bg-white p-2 ">
              <article aria-labelledby="question-title-81614">

                <div class="mt-2 text-sm text-gray-700 space-y-4">
               	  
                   <div class="text-white bg-cover h-36" style="background-image: url('{{ asset('images/slider-img/slide1.jpg') }}');">
					
	                          	
                   </div>
                    
                </div>

                <div>
                  <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">
                      <p class="text-md font-bold text-gray-900 mt-2">
                        <a href="#" class="hover:underline">{{ $cat->category_name }}</a>
                      </p>
                      <p class="text-xs text-gray-500">
                        <a class="hover:underline">
                        	<?php $date = date_create($cat->created_at); ?>
                          <time datetime="2020-12-09T11:43:00">{{ date_format($date,"M, Y") }}</time>  <span class="float-right">SE:{{ $cat->season() }} | EP:{{ $cat->episode() }}</span>
                        </a>
                      </p>
                    </div>
                   
                  </div>
                </div>

              </article>
            </div>




             @endforeach
             	</div>

            <!-- More questions... -->
          
        </div>

        <div class="mt-4">
          <div class="mb-5 w-full ">
             <h1 class="font-bold text-gray-800 text-xl">Following</h1> 
          </div> 

              <div class="grid gap-4 grid-cols-10">
              
            @foreach($userFollow as $follow)

     


            <div class="col-span-2 bg-white p-2 ">
              <article aria-labelledby="question-title-81614">

                <div class="mt-2 text-sm text-gray-700 space-y-4">
                  
                   <div class="text-white bg-cover h-36">
                   
                       <img class="h-full mx-auto my-0 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixqx=cZT0ApgKqn&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                             
                   </div>
                    
                </div>

                <div>
                  <div class="flex space-x-3">
                    <div class="min-w-0 flex-1">
                      <p class="text-md font-bold text-gray-900 mt-2">
                        <a href="#" class="hover:underline">{{ $follow->get_user->name }}</a>
                      </p>
                      <p class="text-xs text-gray-500">
                        <a class="hover:underline">
                          Followers <span class="float-right">0,000,000</span>
                        </a>
                      </p>
                    </div>
                   
                  </div>
                </div>

              </article>
            </div>




             @endforeach
              </div>


        </div>



      </main>
      <!-- aside -->
    
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>







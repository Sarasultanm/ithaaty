 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ads Update') }}
        </h2>
  </x-slot>

   <div class="">
        <div class="">
            


@if(Auth::user()->get_csm('csm_pagebg','active')->count() != 0 )
   <div class="min-h-screen" style="background:{{Auth::user()->get_csm('csm_pagebg','active')->first()->csm_value }};">
@else
   <div class="min-h-screen bg-gray-100">
@endif
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
      <main class="xl:col-span-10 lg:col-span-9">

        <div class="mt-4">
         <!--  <div class="mb-5 w-full ">
             <h1 class="font-bold text-gray-800 text-xl">Create you Ads</h1> 
          </div> -->

          <div class="w-full ">
             <x-auth-session-status-custom class="mb-4 mt-4" :status="session('status')" />
          </div>
          
           <!-- update -->

           <div class="border-b-2 pb-10 border-green-500 ">  
                             <h1 class="flex-1 font-bold text-gray-800 text-xl ">Details</h1> 
                               <p class="mt-1 text-sm text-gray-500">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sodales quis tortor at cursus.
                               </p>
                                <div class="mt-5">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Title</label>
                                        <div class="mt-1">
                                          <input type="text" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md " wire:model="adslist_name">
                                          @error('adslist_name') <span class="text-xs text-red-600">Empty fields</span> @enderror
                                        </div>
                                </div>

                                <div class="mt-5">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Description</label>
                                        <div class="mt-1">
                                          <textarea class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md " wire:model="adslist_desc"></textarea>
                                          @error('adslist_desc') <span class="text-xs text-red-600">Empty fields</span> @enderror
                                        </div>
                                </div>

                                <div class="mt-5">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Website Url</label>
                                        <div class="mt-1">
                                          <input type="text" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md " wire:model="adslist_weblink">
                                          @error('adslist_weblink') <span class="text-xs text-red-600">Empty fields</span> @enderror
                                        </div>
                                </div>
                      </div>

                      <div class="border-b-2 pb-10 border-green-500 mt-4">            
                            <h1 class="flex-1 font-bold text-gray-800 text-xl ">Media</h1> 
                            <p class="mt-1 text-sm text-gray-500">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sodales quis tortor at cursus.
                            </p>

                        <div x-data="{
                                  openTab: 'link',
                                  activeClasses: 'border-custom-pink text-custom-pink font-bold',
                                  inactiveClasses: 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'
                                }" 
                                class="">


                                <div class="border-b border-gray-200">
                                    <ul class="-mb-px flex" >
                                      <li @click="openTab = 'link'"  :class="openTab === 'link' ? activeClasses : inactiveClasses"   class="w-1/2 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                                        <a>Link</a>
                                      </li>
                                      <li @click="openTab = 'upload'" :class="openTab === 'upload' ? activeClasses : inactiveClasses"  class="w-1/2 py-4 px-1 text-center border-b-2 font-medium text-sm cursor-pointer">
                                        <a>Upload</a>
                                      </li>
                                    </ul>
                                </div>


                                <div  x-show="openTab === 'link'" >

                                    <div class="mt-5">
                                          <label for="email" class="block text-sm font-medium text-gray-700">Video Link</label>
                                          <div class="mt-1">
                                            <input type="text" name="website" id="website" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="adslist_videolink">

                                          </div>
                                          <div class="items-center mt-5">
                                            <input id="push" name="notification-method" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 float-left" value="link"  wire:model="adslist_videotype">
                                            <label for="push" class="ml-5 block text-sm font-medium text-gray-700">
                                              Agree for video link
                                            </label>
                                            @error('adslist_videotype') <span class="text-xs text-red-600">Please check this button</span> @enderror
                                          </div>
                                      </div>

                                </div>

                                 <div  x-show="openTab === 'upload'">

                                    <div class="mt-5">
                                             <div x-data="{ isUploading: false, progress: 0, success: false, error:false }" 
                                               x-on:livewire-upload-start="isUploading = true"
                                               x-on:livewire-upload-finish="isUploading = false,success = true" 
                                               x-on:livewire-upload-error="isUploading = false,error= true"
                                               x-on:livewire-upload-progress="progress = $event.detail.progress">

                                                  <label for="email" class="block text-sm font-medium text-gray-700">Upload Logo</label>
                                                  <div class="mt-1">
                                                    <input type="file"  class="" wire:model="adslist_videoupload">
                                                  </div>

                                                  <div class="mt-5">
                                                    <div x-show="isUploading"  class="relative pt-1">
                                                      <div class="text-center text-gray-700">
                                                        Please wait while uploading the file .. <input x-bind:value="`${progress}%`" disabled style="width: 60px;">
                                                      </div>
                                                      <div  class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                                                        <div x-bind:style="`width:${progress}%`"
                                                          class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"
                                                        ></div>
                                                      </div>
                                                    </div>
                                                    <p x-show="success" class="text-center text-custom-pink font-bold text-gray-800 text-sm">File Upload Complete</p> 
                                                     <p x-show="error" class="text-center font-bold text-red-800 text-sm">*Error to upload the file</p> 
                                                  </div>

                                                 </div>

                                                  <div class="items-center mt-5">
                                                    <input id="push" name="notification-method" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 float-left"  value="upload"  wire:model="adslist_videotype">
                                                    <label for="push" class="ml-5 block text-sm font-medium text-gray-700">
                                                      Agree for file upload
                                                    </label>
                                                     @error('adslist_videotype') <span class="text-xs text-red-600">Please check this button</span> @enderror
                                                  </div>

                                          </div>



                                </div>

                             

                            </div>

                            
                      </div>

                      <div class="border-b-2 pb-10 pt-5 border-green-500 ">
                               <h1 class="flex-1 font-bold text-gray-800 text-xl ">Segments</h1> 
                               <p class="mt-1 text-sm text-gray-500">
                                    Please click the link below to see the documents
                               </p>
                                <div class="mt-5">
                                   <label for="email" class="block text-sm font-medium text-gray-700">Country</label>
                                   <div class="flex">
                                     <div class="flex-1 pr-5">
                                      <select class="mt-1 mr-5 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="country_slc" wire:keydown.enter="addCountry()">
                                      <option selected="" disabled="">Select Country</option>
                                      <option value="Afganistan">Afghanistan</option>
                                      <option value="Albania">Albania</option>
                                      <option value="Algeria">Algeria</option>
                                      <option value="American-Samoa">American Samoa</option>
                                      <option value="Andorra">Andorra</option>
                                      <option value="Angola">Angola</option>
                                      <option value="Anguilla">Anguilla</option>
                                      <option value="Antigua-&-Barbuda">Antigua & Barbuda</option>
                                      <option value="Argentina">Argentina</option>
                                      <option value="Armenia">Armenia</option>
                                      <option value="Aruba">Aruba</option>
                                      <option value="Australia">Australia</option>
                                      <option value="Austria">Austria</option>
                                      <option value="Azerbaijan">Azerbaijan</option>
                                      <option value="Bahamas">Bahamas</option>
                                      <option value="Bahrain">Bahrain</option>
                                      <option value="Bangladesh">Bangladesh</option>
                                      <option value="Barbados">Barbados</option>
                                      <option value="Belarus">Belarus</option>
                                      <option value="Belgium">Belgium</option>
                                      <option value="Belize">Belize</option>
                                      <option value="Benin">Benin</option>
                                      <option value="Bermuda">Bermuda</option>
                                      <option value="Bhutan">Bhutan</option>
                                      <option value="Bolivia">Bolivia</option>
                                      <option value="Bonaire">Bonaire</option>
                                      <option value="Bosnia-&-Herzegovina">Bosnia & Herzegovina</option>
                                      <option value="Botswana">Botswana</option>
                                      <option value="Brazil">Brazil</option>
                                      <option value="British-Indian-Ocean-Ter">British Indian Ocean Ter</option>
                                      <option value="Brunei">Brunei</option>
                                      <option value="Bulgaria">Bulgaria</option>
                                      <option value="Burkina-Faso">Burkina Faso</option>
                                      <option value="Burundi">Burundi</option>
                                      <option value="Cambodia">Cambodia</option>
                                      <option value="Cameroon">Cameroon</option>
                                      <option value="Canada">Canada</option>
                                      <option value="Canary-Islands">Canary Islands</option>
                                      <option value="Cape-Verde">Cape-Verde</option>
                                      <option value="Cayman-Islands">Cayman Islands</option>
                                      <option value="Central-African-Republic">Central African Republic</option>
                                      <option value="Chad">Chad</option>
                                      <option value="Channel-Islands">Channel Islands</option>
                                      <option value="Chile">Chile</option>
                                      <option value="China">China</option>
                                      <option value="Christmas-Island">Christmas-Island</option>
                                      <option value="Cocos-Island">Cocos Island</option>
                                      <option value="Colombia">Colombia</option>
                                      <option value="Comoros">Comoros</option>
                                      <option value="Congo">Congo</option>
                                      <option value="Cook-Islands">Cook Islands</option>
                                      <option value="Costa-Rica">Costa-Rica</option>
                                      <option value="Cote-DIvoire">Cote-DIvoire</option>
                                      <option value="Croatia">Croatia</option>
                                      <option value="Cuba">Cuba</option>
                                      <option value="Curaco">Curacao</option>
                                      <option value="Cyprus">Cyprus</option>
                                      <option value="Czech-Republic">Czech Republic</option>
                                      <option value="Denmark">Denmark</option>
                                      <option value="Djibouti">Djibouti</option>
                                      <option value="Dominica">Dominica</option>
                                      <option value="Dominican-Republic">Dominican Republic</option>
                                      <option value="East-Timor">East-Timor</option>
                                      <option value="Ecuador">Ecuador</option>
                                      <option value="Egypt">Egypt</option>
                                      <option value="El-Salvador">El-Salvador</option>
                                      <option value="Equatorial-Guinea">Equatorial Guinea</option>
                                      <option value="Eritrea">Eritrea</option>
                                      <option value="Estonia">Estonia</option>
                                      <option value="Ethiopia">Ethiopia</option>
                                      <option value="Falkland-Islands">Falkland Islands</option>
                                      <option value="Faroe-Islands">Faroe-Islands</option>
                                      <option value="Fiji">Fiji</option>
                                      <option value="Finland">Finland</option>
                                      <option value="France">France</option>
                                      <option value="French-Guiana">French Guiana</option>
                                      <option value="French-Polynesia">French Polynesia</option>
                                      <option value="French-Southern-Ter">French Southern Ter</option>
                                      <option value="Gabon">Gabon</option>
                                      <option value="Gambia">Gambia</option>
                                      <option value="Georgia">Georgia</option>
                                      <option value="Germany">Germany</option>
                                      <option value="Ghana">Ghana</option>
                                      <option value="Gibraltar">Gibraltar</option>
                                      <option value="Great-Britain">Great Britain</option>
                                      <option value="Greece">Greece</option>
                                      <option value="Greenland">Greenland</option>
                                      <option value="Grenada">Grenada</option>
                                      <option value="Guadeloupe">Guadeloupe</option>
                                      <option value="Guam">Guam</option>
                                      <option value="Guatemala">Guatemala</option>
                                      <option value="Guinea">Guinea</option>
                                      <option value="Guyana">Guyana</option>
                                      <option value="Haiti">Haiti</option>
                                      <option value="Hawaii">Hawaii</option>
                                      <option value="Honduras">Honduras</option>
                                      <option value="Hong-Kong">Hong Kong</option>
                                      <option value="Hungary">Hungary</option>
                                      <option value="Iceland">Iceland</option>
                                      <option value="Indonesia">Indonesia</option>
                                      <option value="India">India</option>
                                      <option value="Iran">Iran</option>
                                      <option value="Iraq">Iraq</option>
                                      <option value="Ireland">Ireland</option>
                                      <option value="Isle-of-Man">Isle of Man</option>
                                      <option value="Israel">Israel</option>
                                      <option value="Italy">Italy</option>
                                      <option value="Jamaica">Jamaica</option>
                                      <option value="Japan">Japan</option>
                                      <option value="Jordan">Jordan</option>
                                      <option value="Kazakhstan">Kazakhstan</option>
                                      <option value="Kenya">Kenya</option>
                                      <option value="Kiribati">Kiribati</option>
                                      <option value="Korea-North">Korea North</option>
                                      <option value="Korea-Sout">Korea South</option>
                                      <option value="Kuwait">Kuwait</option>
                                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                                      <option value="Laos">Laos</option>
                                      <option value="Latvia">Latvia</option>
                                      <option value="Lebanon">Lebanon</option>
                                      <option value="Lesotho">Lesotho</option>
                                      <option value="Liberia">Liberia</option>
                                      <option value="Libya">Libya</option>
                                      <option value="Liechtenstein">Liechtenstein</option>
                                      <option value="Lithuania">Lithuania</option>
                                      <option value="Luxembourg">Luxembourg</option>
                                      <option value="Macau">Macau</option>
                                      <option value="Macedonia">Macedonia</option>
                                      <option value="Madagascar">Madagascar</option>
                                      <option value="Malaysia">Malaysia</option>
                                      <option value="Malawi">Malawi</option>
                                      <option value="Maldives">Maldives</option>
                                      <option value="Mali">Mali</option>
                                      <option value="Malta">Malta</option>
                                      <option value="Marshall-Islands">Marshall Islands</option>
                                      <option value="Martinique">Martinique</option>
                                      <option value="Mauritania">Mauritania</option>
                                      <option value="Mauritius">Mauritius</option>
                                      <option value="Mayotte">Mayotte</option>
                                      <option value="Mexico">Mexico</option>
                                      <option value="Midway-Islands">Midway Islands</option>
                                      <option value="Moldova">Moldova</option>
                                      <option value="Monaco">Monaco</option>
                                      <option value="Mongolia">Mongolia</option>
                                      <option value="Montserrat">Montserrat</option>
                                      <option value="Morocco">Morocco</option>
                                      <option value="Mozambique">Mozambique</option>
                                      <option value="Myanmar">Myanmar</option>
                                      <option value="Nambia">Nambia</option>
                                      <option value="Nauru">Nauru</option>
                                      <option value="Nepal">Nepal</option>
                                      <option value="Netherland-Antilles">Netherland Antilles</option>
                                      <option value="Netherlands">Netherlands(Holland,Europe)</option>
                                      <option value="Nevis">Nevis</option>
                                      <option value="New-Caledonia">New Caledonia</option>
                                      <option value="New-Zealand">New Zealand</option>
                                      <option value="Nicaragua">Nicaragua</option>
                                      <option value="Niger">Niger</option>
                                      <option value="Nigeria">Nigeria</option>
                                      <option value="Niue">Niue</option>
                                      <option value="Norfolk-Island">Norfolk Island</option>
                                      <option value="Norway">Norway</option>
                                      <option value="Oman">Oman</option>
                                      <option value="Pakistan">Pakistan</option>
                                      <option value="Palau-Island">Palau Island</option>
                                      <option value="Palestine">Palestine</option>
                                      <option value="Panama">Panama</option>
                                      <option value="Papua-New-Guinea">Papua New Guinea</option>
                                      <option value="Paraguay">Paraguay</option>
                                      <option value="Peru">Peru</option>
                                      <option value="Philippines">Philippines</option>
                                      <option value="Pitcairn-Island">Pitcairn Island</option>
                                      <option value="Poland">Poland</option>
                                      <option value="Portugal">Portugal</option>
                                      <option value="Puerto-Rico">Puerto Rico</option>
                                      <option value="Qatar">Qatar</option>
                                      <option value="Republic-of-Montenegro">Republic of Montenegro</option>
                                      <option value="Republic-of-Serbia">Republic of Serbia</option>
                                      <option value="Reunion">Reunion</option>
                                      <option value="Romania">Romania</option>
                                      <option value="Russia">Russia</option>
                                      <option value="Rwanda">Rwanda</option>
                                      <option value="St-Barthelemy">St Barthelemy</option>
                                      <option value="St-Eustatius">St Eustatius</option>
                                      <option value="St-Helena">St Helena</option>
                                      <option value="St-Kitts-Nevis">St Kitts Nevis</option>
                                      <option value="St-Lucia">St Lucia</option>
                                      <option value="St-Maarten">St Maarten</option>
                                      <option value="St-Pierre-&-Miquelon">St Pierre & Miquelon</option>
                                      <option value="St-Vincent-&-Grenadines">St Vincent & Grenadines</option>
                                      <option value="Saipan">Saipan</option>
                                      <option value="Samoa">Samoa</option>
                                      <option value="Samoa-American">Samoa American</option>
                                      <option value="San-Marino">San Marino</option>
                                      <option value="Sao-Tome-&-Principe">Sao Tome & Principe</option>
                                      <option value="Saudi-Arabia">Saudi Arabia</option>
                                      <option value="Senegal">Senegal</option>
                                      <option value="Seychelles">Seychelles</option>
                                      <option value="Sierra-Leone">Sierra Leone</option>
                                      <option value="Singapore">Singapore</option>
                                      <option value="Slovakia">Slovakia</option>
                                      <option value="Slovenia">Slovenia</option>
                                      <option value="Solomon-Islands">Solomon Islands</option>
                                      <option value="Somalia">Somalia</option>
                                      <option value="South-Africa">South Africa</option>
                                      <option value="Spain">Spain</option>
                                      <option value="Sri-Lanka">Sri Lanka</option>
                                      <option value="Sudan">Sudan</option>
                                      <option value="Suriname">Suriname</option>
                                      <option value="Swaziland">Swaziland</option>
                                      <option value="Sweden">Sweden</option>
                                      <option value="Switzerland">Switzerland</option>
                                      <option value="Syria">Syria</option>
                                      <option value="Tahiti">Tahiti</option>
                                      <option value="Taiwan">Taiwan</option>
                                      <option value="Tajikistan">Tajikistan</option>
                                      <option value="Tanzania">Tanzania</option>
                                      <option value="Thailand">Thailand</option>
                                      <option value="Togo">Togo</option>
                                      <option value="Tokelau">Tokelau</option>
                                      <option value="Tonga">Tonga</option>
                                      <option value="Trinidad-&-Tobago">Trinidad & Tobago</option>
                                      <option value="Tunisia">Tunisia</option>
                                      <option value="Turkey">Turkey</option>
                                      <option value="Turkmenistan">Turkmenistan</option>
                                      <option value="Turks-&-Caicos-Is">Turks & Caicos Is</option>
                                      <option value="Tuvalu">Tuvalu</option>
                                      <option value="Uganda">Uganda</option>
                                      <option value="United-Kingdom">United Kingdom</option>
                                      <option value="Ukraine">Ukraine</option>
                                      <option value="United-Arab-Emirates">United Arab Emirates</option>
                                      <option value="United-States-of-America">United States of America</option>
                                      <option value="Uraguay">Uruguay</option>
                                      <option value="Uzbekistan">Uzbekistan</option>
                                      <option value="Vanuatu">Vanuatu</option>
                                      <option value="Vatican-City-State">Vatican City State</option>
                                      <option value="Venezuela">Venezuela</option>
                                      <option value="Vietnam">Vietnam</option>
                                      <option value="Virgin-Islands-(Brit)">Virgin Islands (Brit)</option>
                                      <option value="Virgin-Islands-(USA)">Virgin Islands (USA)</option>
                                      <option value="Wake-Island">Wake-Island</option>
                                      <option value="Wallis-&-Futana-Is">Wallis & Futana Is</option>
                                      <option value="Yemen">Yemen</option>
                                      <option value="Zaire">Zaire</option>
                                      <option value="Zambia">Zambia</option>
                                      <option value="Zimbabwe">Zimbabwe</option>
                                   </select> 
                                     </div>
                                     <div>
                                        <button wire:click="addCountry()" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
                                         Add Country
                                        </button>
                                     </div>
                                   </div>
                                   <div class="">
                                        <!-- <label  class="block text-sm font-medium text-gray-700">Description</label> -->
                                        <div class="mt-1">
                                          <textarea id="countryList" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md " wire:model="adslist_country"></textarea>
                                          @error('adslist_country') <span class="text-xs text-red-600">Empty fields</span> @enderror
                                        </div>
                                </div>
                                
                                 </div> 

                                 <div class="mt-5">
                                   <label for="email" class="block text-sm font-medium text-gray-700">Age Bracket</label>
                                   <div class="flex">
                                     <div class="flex-1 pr-5">
                                      <select class="mt-1 mr-5 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="agebracket_list" wire:keydown.enter="addBracket()">
                                      <option value="age0">No specific</option>
                                      <option value="age1">18 - 24 years</option>
                                      <option value="age2">25 - 40 years</option>
                                      <option value="age3">41 - 60 years</option>
                                      <option value="age4">61 - 80 years</option>
                                      
                                   </select> 
                                     </div>
                                     <div>
                                        <button wire:click="addBracket()" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
                                         Add Bracket
                                        </button>
                                     </div>
                                   </div>
                                   <div class="">
                                        <!-- <label  class="block text-sm font-medium text-gray-700">Description</label> -->
                                        <div class="mt-1">
                                          <textarea id="countryList" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md " wire:model="adslist_agebracket"></textarea>
                                           @error('adslist_agebracket') <span class="text-xs text-red-600">Empty fields</span> @enderror
                                        </div>
                                </div>
                                
                                 </div> 

                             <!--     <div class="mt-5">
                                   <label for="email" class="block text-sm font-medium text-gray-700">Age Bracket</label>
                                   <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                                   <option>Select</option>
                                      <option value="age0">No specific</option>
                                      <option value="age1">18 - 24 years</option>
                                      <option value="age2">25 - 40 years</option>
                                      <option value="age3">41 - 60 years</option>
                                      <option value="age4">61 - 80 years</option>
                                   </select> 
                                 </div>  -->





                              <div class="mt-5">
                                <h1 class="text-sm font-medium text-gray-700 ">Interest</h1> 
                               <p class="mt-1 text-sm text-gray-500">
                                    Please check the checkbox for the interest.
                               </p>
                                <div class="grid grid-cols-4 gap-4 mt-3">

                                  <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Social Issues, Election or Politics</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>
                                  </div>
                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Housing</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>

                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Employment</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>
                                  </div>
                                   <div class="col-span-2">
                                      <div class="relative flex items-start">
                                        <div class="flex items-center h-5">
                                          <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                          <label for="comments" class="font-bold text-gray-900">Credits</label>
                                          <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                      </div>

                                  </div>
                                </div>




                               

                              </div>


                          </div> 

                          <div class="border-0 pb-10 border-green-500 mt-4">            
                        <h1 class="flex-1 font-bold text-gray-800 text-xl ">Duration</h1> 
                               <p class="mt-1 text-sm text-gray-500">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sodales quis tortor at cursus.
                               </p>             

                                <div class="mt-5">
                                  <div class="flex">
                                        <div class="flex-1 mr-2">
                                                  <label for="email" class="block text-sm font-medium text-gray-700">Skip Duration</label>
                                                  <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:click="adsComputation($event.target.value,'skip')"  wire:model="adslist_adstype">
                                                     <!--  <option>Select</option> -->
                                                      <option value="0">No Skip</option>
                                                      <!-- <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option> -->
                                                      <option value="5">5 sec</option>
                                                  </select> 
                                        </div>
                                        <div class="flex-1 ml-2">
                                                  <label for="email" class="block text-sm font-medium text-gray-700">Display Time</label>
                                                  <div class="mt-1">
                                                    <!-- <input type="text" name="website" id="website" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="adslist_displaytime"> -->
                                                     <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:click="adsComputation($event.target.value,'display')"  wire:model="adslist_displaytime">
                                                          <!-- <option>Select</option> -->
                                                          <option value="1%">1%(Preroll)</option>
                                                          <option value="10%">10%</option>
                                                          <option value="20%">20%</option>
                                                          <option value="30%">30%</option>
                                                          <option value="40%">40%</option>
                                                          <option value="50%">50%(Midroll)</option>
                                                          <option value="60%">60%</option>
                                                          <option value="70%">70%</option>
                                                          <option value="80%">80%</option>
                                                          <option value="90%">90%</option>
                                                          <option value="100%">100%(Postroll)</option>
                                                      </select> 
                                                  </div>
                                        </div>
                                        <div class="flex-1 ml-2">
                                                  <label for="email" class="block text-sm font-medium text-gray-700">Days</label>
                                                  <div class="mt-1">
                                                    <!-- <input type="text" name="website" id="website" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" wire:model="adslist_displaytime"> -->
                                                     <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  wire:model="adslist_days" wire:click="adsComputation($event.target.value,'days')"  >
                                                         <!--  <option>Select</option> -->
                                                          <option value="3">3 days</option>
                                                          <option value="7">7 days</option>
                                                          <option value="9">9 days</option>
                                                          <option value="12">12 days</option>
                                                      </select> 
                                                  </div>
                                        </div>
                                  </div>
                            </div>
                          </div>

                          <div class="border-b-2 pb-10 pt-5 border-green-500 lg:px-0 sm:px-3">
                               <h1 class="flex-1 font-bold text-gray-800 text-xl ">Payment Summary</h1> 
                               <p class="mt-1 mb-3 text-sm text-gray-500">
                                 Your ad will run for {{ $compDays }} days.
                               </p>
                               <div class="bg-white py-2 px-3 rounded-md  lg:w-1/4 sm:w-1/2">
                                 <p class="mt-1 text-sm text-gray-800">
                                   Skip Duration :${{ $compSkip }}
                                 </p>
                                  <p class="mt-1 text-sm text-gray-800">
                                   Display Time :${{ $compDisplay }}
                                 </p>
                                 <p class="mt-1 text-sm text-gray-800">
                                   Days : {{ $compDays }} days 
                                 </p>
                                 <?php 
                                 $date = date_create(now());
                                 date_add($date, date_interval_create_from_date_string($compDays." days"));
                                 //echo date_format($date, "M d, Y");
                                 ?>
                                 <p class="mt-1 text-sm text-gray-800">
                                   End Date : {{ date_format($date, "M d, Y") }}
                                 </p>
                                </div>
                                <p class="mt-3 text-md text-white bg-custom-pink py-2 px-3  rounded-md  lg:w-1/4 sm:w-1/2">
                                 Total Budget : <b class="font-bold float-right">${{ $compTotal }}</b><br>
                                  <small> ${{ $compSkip + $compDisplay }} a day x {{ $compDays }} days</small>
                                  
                              
                               </p>

                          </div>




                          <div class="mt-3 text-right sm:mt-5 mb-5">
                                                
                               <button class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-custom-pink text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-md">
                                Update Ads
                                </button>
                          </div>


           <!-- update -->

          
            <!-- More questions... -->
          
        </div>
      </main>
      <!-- aside -->
    
      <!-- aside -->
    </div>
  </div>
</div>





















        </div>
</div>
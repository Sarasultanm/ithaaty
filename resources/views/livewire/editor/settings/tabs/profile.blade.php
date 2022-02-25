
@if(Auth::user()->get_plan->check_features('o10')->count() == 0 )
<section>
    <form wire:submit.prevent="updateAlias">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Channel</h2>
                    <p class="mt-1 text-sm text-gray-500">Update your personal information.</p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 xl:col-span-2 lg:col-span-2 sm:col-span-3">
                        <h3 class="text-md leading-6 font-medium text-gray-900">Channel Name</h3>
                        <input
                            wire:model="userAlias"
                            type="text"
                            name="first_name"
                            id="first_name"
                            autocomplete="cc-given-name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm"
                        />
                    </div>

                    <div class="col-span-4 xl:col-span-2 lg:col-span-2 sm:col-span-1 text-right"></div>
                </div>
            </div>
        </div>
    </form>
</section>
@endif
<section class="mt-5">
    <div class="mt-6 flex flex-col lg:flex-row shadow sm:rounded-md sm:overflow-hidden bg-white py-6 px-4">
        <div class="flex-grow space-y-6">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">
                    Name
                </label>
                <div class="mt-1 rounded-md shadow-sm flex">
                    <input type="text" class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0  rounded-md sm:text-sm border-gray-300" wire:model="userName" />
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Country
                </label>
                <div class="mt-1">
                    <div class="mt-1 flex">
                        <div class="relative flex items-stretch flex-grow focus-within:z-10">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                            <select wire:model="userCountry" class="block w-full  pl-10 sm:text-sm border-gray-300 mr-3 rounded-md shadow-sm">
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
                    </div>
                </div>
            </div>

            <div>
                <label for="about" class="block text-sm font-medium text-gray-700">
                    About
                </label>
                <div class="mt-1">
                    <!-- <textarea rows="3" class="shadow-sm focus:ring-sky-500 focus:border-sky-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea> -->

                    <div class="flex items-start space-x-4">
                        <div class="min-w-0 flex-1">
                            <div class="relative">
                                <div class="border border-gray-300 rounded-lg shadow-sm overflow-hidden focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
                                    <label for="comment" class="sr-only">Add your comment</label>
                                    <textarea wire:model="userAbout" rows="3" name="comment" id="comment" class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm" placeholder="About"></textarea>

                                    <!-- Spacer element to match the height of the toolbar -->
                                    <div class="py-2" aria-hidden="true">
                                        <!-- Matches height of button in toolbar (1px border + 36px content height) -->
                                        <div class="py-px">
                                            <div class="h-9"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="absolute bottom-0 inset-x-0 pl-3 pr-2 py-2 flex justify-between">
                                    <div class="flex items-center space-x-5"></div>
                                    <div class="flex-shrink-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
            <p class="text-sm font-medium text-gray-700" aria-hidden="true">
                Photo
            </p>

            <div
                x-data="{ isUploading: false, progress: 0, success: false, error:false }"
                x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false,success = true"
                x-on:livewire-upload-error="isUploading = false,error= true"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <div class="hidden relative rounded-full overflow-hidden lg:block">
                    @if(Auth::user()->get_profilephoto->count() == 0) @if($profilePhoto)
                    <img class="relative rounded-full w-40 h-40" src="{{ $profilePhoto->temporaryUrl() }}" alt="" />
                    @else
                    <img class="relative rounded-full w-40 h-40" src="{{ asset('images/default_user.jpg') }}" alt="" />
                    @endif @else @if($profilePhoto)
                    <img class="relative rounded-full w-40 h-40" src="{{ $profilePhoto->temporaryUrl() }}" alt="" />
                    @else
                    <?php 
                    $img_path = Auth::user()->get_profilephoto->first()->gallery_path; ?>
                    <img class="relative rounded-full w-40 h-40" src="{{ asset('users/profile_img/'.$img_path) }}" alt="" />
                    @endif @endif

                    <label for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                        <button>Change</button>
                        <span class="sr-only"> user photo</span>
                        <input type="file" id="desktop-user-photo" name="user-photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md" wire:model="profilePhoto" />
                    </label>
                </div>
                <div class="mt-5">
                    <div x-show="isUploading" class="relative pt-1">
                        <div class="overflow-hidden h-2 text-xs flex rounded bg-purple-200 progress">
                            <div x-bind:style="`width:${progress}%`" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-custom-pink"></div>
                        </div>
                    </div>
                    <center>
                        <button wire:click="savePhoto()" x-show="success" class="py-2 px-4 text-center text-white bg-custom-pink font-bold text-sm">Save Changes</button>
                    </center>

                    <p x-show="error" class="text-center font-bold text-red-800 text-sm">*Error to upload the file</p>
                </div>
            </div>
        </div>
    </div>
</section>
<h2 class="mt-5 font-bold text-gray-900 text-lg">Social Media Links</h2>
<section class="mt-5 bg-white p-5 shadow sm:rounded-md sm:overflow-hidden">
    <div class="grid grid-cols-10 gap-4">
        <div class="col-span-5 flex flex-col lg:flex-row">
            <div class="flex-grow space-y-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                        Facebook Link
                    </label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                        <input
                            type="text"
                            class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0  rounded-md sm:text-sm border-gray-300"
                            wire:model="userFacebook"
                            wire:keydown.enter="updateSocialLink('Facebook')"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-5 flex flex-col lg:flex-row">
            <div class="flex-grow space-y-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                        Twitter Link
                    </label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                        <input
                            type="text"
                            class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0  rounded-md sm:text-sm border-gray-300"
                            wire:model="userTwitter"
                            wire:keydown.enter="updateSocialLink('Twitter')"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-5 flex flex-col lg:flex-row">
            <div class="flex-grow space-y-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                        Instagram Link
                    </label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                        <input
                            type="text"
                            class="focus:ring-sky-500 focus:border-sky-500 flex-grow block w-full min-w-0  rounded-md sm:text-sm border-gray-300"
                            wire:model="userInstagram"
                            wire:keydown.enter="updateSocialLink('Instagram')"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <h2 class="mt-5 font-bold text-gray-900 text-lg">Interest</h2>
    <div class="mt-5 bg-white p-5 shadow sm:rounded-md sm:overflow-hidden">
        <p class="mt-1 text-sm text-gray-500">
            Please check the checkbox for the interest.
        </p>
        <div class="grid grid-cols-4 gap-4 mt-3">
            @foreach($interest_list as $interest_item)
            <div class="col-span-2">
                <div class="relative flex items-start">
                    <div class="flex items-center h-5">
                        @if($interest_item->checkUserInterest(Auth::user()->id)->count() != 0 )
                        <input checked wire:click="updateInterest({{$interest_item->id}})" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                        @else
                        <input type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                        @endif
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="comments" class="font-bold text-gray-900">{{$interest_item->title}}</label>
                        <p id="comments-description" class="text-gray-500">{{$interest_item->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section>
    <button
        wire:click="updateProfile()"
        type="submit"
        class="mt-5 bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 float-right"
    >
        Update
    </button>
</section>

<div class="mt-5">
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
                          <input wire:model="interest_option.{{$interest_item->id}}"  value="{{$interest_item->id}}" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
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


  </div>